<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Coupons;
use App\Models\Coupons_true;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Goods;
use Illuminate\Support\Facades\Redirect;
use URL;


class IntegralController extends Controller
{
	/**
     * 优惠券列表
     *
     * @param
     * @return
     */
    public function ticketList()
    {
        $data = Coupons::get()->toArray();
//        $num = Coupons_true::groupBy('c_name')->get();
        $num = DB::select('select count(true_id) as num,c_name from sun_coupons_true group by c_name');
       $num =  json_decode(json_encode($num),true);
//        $data =  json_decode(json_encode($data),true);
       foreach($data as $k=>$v){
           foreach($num as $kk=>$vv){
               if($vv['c_name']===$v['coupons_name']){
                   $v['num'] = $vv['num'];break;
               }else{
                   $v['num'] = 0;
               }
           }
           $new[$k]=$v;
       }
        return view('admin/integral/ticket_list',['data'=>$new]);
    }

    /**
     * 优惠券使用状况
     *
     * @param
     * @return
     */
    public function ticketStatus()
    {
        return view('admin/integral/ticket_status');
    }
    
    /**
     * 查看积分商品
     *
     * @param
     * @return
     */

    /**
     * 添加积分商品
     *
     * @param
     * @return
     */
    public function addGoods()
    {
        return view('admin/integral/add_goods');
    }

    /**
     * 积分商品兑换订单
     *
     * @param
     * @return
     */
    public function goodsOrder()
    {
        return view('admin/integral/goods_order');
    }
    /**
     * 添加优惠券
     *
     *
     */
    public function coupons_add(){
        $data = Input::get();
        $user_info = session('admininfo');
        $new = [];
        foreach($data['coupons_name'] as $k => $v){
            $v = strip_tags(trim($v));
            $name = Coupons::where('coupons_name', $v)->first();
            if(!is_null($name)){
                continue;
            }
                $new[$k]['coupons_name'] = $v;
                $new[$k]['coupons_value'] = strip_tags(trim($data['coupons_value'][$k]));
                $new[$k]['coupons_add_time'] = time();
                $new[$k]['user_id'] = $user_info['id'];
        }
           $re = Coupons::insert($new);
            if($re && !empty($new)){
                $data['error'] = 1;
                $data['data'] = $new;
            }else{
                $data['error'] = 0;
            }
            echo json_encode($data);
    }
    /**
     * 删除代金券
     *
     * @param
     * @return
     */
    public function coupons_del(){
        $c_name = Input::get('c_name');
        $re = Coupons::where('coupons_name',$c_name)->delete();
        if($re){
            Coupons_true::where('c_name',$c_name)->delete();
        }
        echo $re;
    }
    /**
     *实体券有效期设置
     * @param
     * @return
     */
    public function true_time(){
        $data = Input::get();
        $num = $data['num'];
        $server_num = $data['server_num'];
        $start = strtotime($data['start']);
        $coupons_name = $data['coupons_name'];
        $end = strtotime($data['end']);
       if($num > $server_num){
           $success['error'] = -1;//数量设置错误
       }else{
           if($start > $end){
               $success['error'] = -2;//时间段顺序错误
           }else{
               $re = DB::table('coupons_true')->limit($num)
                   ->where('is_statues',0)
                   ->where('c_name',$coupons_name)
                   ->where('start_time')
                   ->where('end_time')
                   ->update(['start_time' => $start,'end_time'=>$end]);
               if($re > 0){
                $success['error'] = 1;//设置成功；
                $success['num'] = $re;//返回受影响行数
               }else{
                $success['error'] = 0;//设置失败
               }
           }
       }
        echo json_encode($success);
    }
    /**
     * 查看实体券页面
     *
     * @param
     * @return
     */
    public function coupons_true($name){
        $info = Coupons_true::where('c_name',$name)->paginate(10);
        $nu = Coupons_true::where(['c_name'=>$name,'is_statues'=>0,'start_time'=>null,'end_time'=>null])->count();
        return view('admin/integral/coupons_true',['coupons_name'=>$name,'info'=>$info,'nu'=>$nu]);
    }
    /**
     * 查看优惠券使用情况
     *
     * @param
     * @return
     */
    public function coupons_status(){
        $info = Coupons_true::orderby('c_value')->paginate(10);

        return view('admin/integral/ticket_status',['info'=>$info]);
    }
    /**
     * 根据代金券名称生成设置数量的实体券
     *
     * @param
     * @return
     */
    public function coupons_true_add(){
        $c_num = Input::get('c_num');
        $c_name = Input::get('c_name');
        $user_info = session('admininfo');
        $coupons = Coupons::where('coupons_name', $c_name)->first();
        if($coupons){
            static $data = [];
            for($i=1;$i<=$c_num;$i++){
                $data[$i-1]['c_id'] = $coupons->id;
                $data[$i-1]['c_name'] = $coupons->coupons_name;
                $data[$i-1]['user_id'] = $user_info['id'];
                $data[$i-1]['c_value'] = $coupons->coupons_value;
                $data[$i-1]['CDKEY'] = 'SF'.$coupons->id.$user_info['id'].mt_rand(1111,9999).substr(time(),-4);
            }
            $re = Coupons_true::insert($data);
            if($re){
                $success['error'] = 1;
                $success['num'] = $c_num;
            }else{
                $success['error'] = -1;
            }
        }else{
           $success['error'] = 0;
        }
        echo json_encode($success);
    }
    /**
     * 设置积分商品
     *
     * @param
     * @return
     */
    public function goods_add(){
        $file = Input::file('goods_url');
        $data = Input::get();
        unset($data['_token']);
        if (isset($file)){
           $re = $this->uploads($file);
            if(is_string($re)){
                $data['goods_url'] = $re;
               $re = Goods::insert($data);
                if($re){
                    echo "<script>alert('添加成功');location.href='/aintegral/goods_list'</script>";
                }else{
                    echo "<script>alert('添加失败,检查数据');location.href='/aintegral/goods_add'</script>";
                }
            }elseif($re == 1){
                echo "<script>alert('文件过大或者格式不对');location.href='/aintegral/goods_add'</script>";
            }
        }else{
           $re = Goods::insert($data);
            if($re){
                echo "<script>alert('添加成功');location.href='/aintegral/goods_list'</script>";
            }else{
                echo "<script>alert('添加失败,检查数据');location.href='/aintegral/goods_add'</script>";
            }
        }
    }
    /**
     * 商品展示页面
     *
     * @param
     * @return
     */
    public function goods_list(){
        $info = Goods::paginate(5);
//        print_r($info);die;
        return view('admin/integral/goods_list',['data'=>$info]);
    }
    /**
     * 商品修改页面
     *
     * @param
     * @return
     */
    public function goods_uplist($goods_id){
        $goods_info = Goods::where('goods_id', $goods_id)->first()->toArray();
        return view('admin/integral/up_list',['goods_info'=>$goods_info]);
    }
    /**
     * 商品AJAX修改(属性)
     *
     *
     */
    public function goods_up(){
        $data = Input::get();
        $val = $data['val'];
        if($data['filed'] != 'goods_name'){
            if(!is_numeric($val)){
                $success['error'] = -1;
                echo json_encode($success);die;
            }
        }
        intval($data['val']);
        $re = DB::table('goods')->where('goods_id', $data['goods_id'])
            ->update([$data['filed'] => "$val"]);
        if($re){
            $success['error'] = 1;
        }else{
            $success['error'] = 0;
        }
        echo json_encode($success);
    }
    /**
     * ajax修改商品图片
     *
     * @param
     * @return
     */
    public function goods_ajax_img(){
        $file = Input::file('myfile');
        $goods_id = Input::get('goods_id');
        $old_url = Input::get('goods_url');
        $re = $this->uploads($file);
        if(is_string($re)){
            $res = DB::table('goods')->where('goods_id', $goods_id)
                ->update(['goods_url' => "$re"]);
            if($res){
                if(!empty($old_url)){
                    unlink(public_path($old_url));
                }
                $data['url'] = $re;
                $data['error'] = 1;
            }else{
                $data['error'] = 0;
            }
        }elseif($re == 1){
            $data['error'] = -1;
        }else{
            $data['error'] = 2;
        }
        echo json_encode($data);
    }
    /**
     * ajax删除商品
     *
     * @param
     * @return
     */
    public function goods_del(){
        $goods_id = Input::get('goods_id');
        $url = Goods::where('goods_id', $goods_id)->pluck('goods_url');
        $re = Goods::where('goods_id',$goods_id)->delete();
        if($re){
            if(!empty($url[0])){
                unlink(public_path($url[0]));
            }
            $data['error'] = 1;
        }else{
            $data['error'] = 0;
        }
        echo json_encode($data);
    }
    /**
     * ajax商品状态
     *
     * @param
     * @return
     */
    public function goods_ajax_sta(){
        $goods_id = Input::get('goods_id');
        $is_statues = Input::get('sta');
        $res = DB::table('goods')->where('goods_id', $goods_id)
            ->update(['is_statues' => "$is_statues"]);
        if($res){
            $data['error'] = 1;
        }else{
            $data['error'] = 0;
        }
        echo json_encode($data);

    }
    /**
     * 文件上传
     *
     * @param
     * @return
     */
    public function uploads($file){
        $server_type = ['image/jpeg','image/jpg','image/gif','image/png'];
        $size = $file->getSize();
        $originalName = $file->getClientOriginalName(); // 文件原名
        $ext = $file->getClientOriginalExtension();     // 扩展名
        $realPath = $file->getRealPath();   //临时文件的绝对路径
        $type = $file->getClientMimeType();     // image/jpeg
        //    // 上传文件
        $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
        $file_url = '/uploads/goods_img/'.$filename;
        if(in_array($type,$server_type)||$size>100000){
            // 使用我们新建的uploads本地存储空间（目录）
            $bool = Storage::disk('goods_uploads')->put($filename, file_get_contents($realPath));
            if($bool){
                return $file_url;
            }else{
                return false;
            }
        }else{
            return 1;
        }
    }
}
