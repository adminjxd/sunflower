<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')

<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><img src="{{ URL::asset('/images/clist1.jpg') }}" width="1200" height="96"></div>
    <div id="personal-left" class="personal-left">
      <ul>
        <li class="pleft-cur"><span><a href="{{ URL::asset('/ucenter/myaccount') }}"><i class="dot dot1"></i>账户总览</a></span></li>
        <li><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="{{ URL::asset('/ucenter/moneyrecord') }}">资金记录</a></span></li>
        <li><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="{{ URL::asset('/ucenter/investrecord') }}">投资记录</a></span></li>
        <li><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="{{ URL::asset('/ucenter/returnedmoney') }}">回款计划</a></span></li>
        <li class=""><span><a href="{{ URL::asset('/ucenter/openthirdparty') }}"><i class="dot dot02"></i>开通第三方</a> </span> </li>
        <li><span><a href="{{ URL::asset('/ucenter/recharge') }}"><i class="dot dot03"></i>充值</a></span></li>
        <li class=""><span><a href="{{ URL::asset('/ucenter/withdrawdeposit') }}"><i class="dot dot04"></i>提现</a></span></li>
        <li style="position:relative;" class=""> <span> <a href="{{ URL::asset('/ucenter/redpacket') }}"> <i class="dot dot06"></i> 我的红包 </a> </span> </li>
        <li class=""><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="{{ URL::asset('/ucenter/changehistory') }}">兑换历史</a></span></li>
        <li style="position:relative;"> <span> <a href="{{ URL::asset('/ucenter/systeminfo') }}"><i class="dot dot08"></i>系统信息 </a> </span> </li>
        <li><span><a href="{{ URL::asset('/ucenter/accountset') }}"><i class="dot dot09"></i>账户设置</a></span></li>
      </ul>
   
    </div>
    <div class="personal-main">
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/fileupload.less.css') }}">
      <style type="text/css">
		.ui-fileupload-choose{
			background:none;
			width: 90px; height: 90px;
			border:0px none;
		}
		.ui-fileupload-choose npiut{
			width:100%;height:100%;
		}
		.ui-icon{
			background:none;
			width:0px;height:0px;
		} 
	</style>
      <div class="pmain-profile">
        <div class="pmain-welcome"> <span class="fl"><span id="outLogin">晚上好，</span>{{$userInfo['real_name']}} 喝一杯下午茶，让心情放松一下~</span> <span class="fr">上次登录时间：
          {{$userInfo['last_logintime']}} </span> </div>
        <div class="pmain-user">
          <div class="user-head"> <span id="clickHeadImage" class="head-img" title="点击更换头像">
            <form  method="post" action="">
                {{ csrf_field() }}
              <input type="hidden" name="userPhotoUploadForm" value="userPhotoUploadForm">
              <span id="userPhotoUploadForm:photo"><img id="touxiang" src="{{ URL::asset($userInfo['head'])}}" alt="" style="width:88px;height:88px;z-index:0;"> <i class="headframe" style="z-index:0;"></i>-
              <div id="userPhotoUploadForm:shangchuan-btn" class="ui-fileupload ui-widget" style="z-index:0;">
                <div class="ui-fileupload-buttonbar ui-corner-top">
                <span class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left"  role="button">
                <span class="ui-button-icon-left ui-icon ui-c ui-icon-plusthick"></span>
                <span class="ui-button-text ui-c"></span>
                  <input type="file" class="up" id="userPhotoUploadForm:shangchuan-btn_input" name="userPhotoUploadForm:shangchuan-btn_input" style="z-index:0;display:none;">
                  </span>
                  </div>
                <div class="ui-fileupload-content ui-widget-content ui-corner-bottom">
                  <table class="ui-fileupload-files">
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              </span>
              <input type="hidden" name="javax.faces.ViewState" id="javax.faces.ViewState" value="2696547217205030168:-301641994240890871" autocomplete="off">
            </form>
            </span> <span class="head-icon"> <a href="#"><i title="第三方资金账户未认证" class="headiconbg headicon01"></i></a> <a href="#"><i class="headiconbg headicon2"></i></a> <a href="#"><i class="headiconbg headicon03"></i></a> </span> </div>
          <div class="user-info user-info1">
            <ul>
              <li>用户名<span>{{$userInfo['username']}}</span></li>
              <li>安全级别

              <span><i class="safe-level"><i class="onlevel" style="width:40%;"></i></i></span> <a href="#">[{{$userInfo['pwdlevel']}}]</a>

              </li>
              <li>您还未开通第三方支付账户，请 <a class="pmain-log" href="#">立即开通</a>以确保您的正常使用和资金安全。 </li>
            </ul>
          </div>
        </div>
        <div class="pmain-money">
          <ul>
            <li class="none"><span><em>账户总额</em><i id="zhze" class="markicon"></i><span class="arrow-show1" style="display:none;">可用余额+待收本息</span><span class="icon-show1" style="display:none;"></span></span> <span class="truemoney"><i class="f26 fb">{{$userInfo['balance']}} </i> 元</span> </li>
            <li><span><em>待收本息</em><i id="dsbx" class="markicon"></i><span class="arrow-show2" style="display:none;">未到账的投资项目的本金、利息总额</span><span class="icon-show2" style="display:none;"></span></span> <span class="truemoney"><i class="f26 fb">0.00 </i>元</span> </li>
            <li><span><em>累计收益</em><i id="ljsy" class="markicon"></i><span class="arrow-show3" style="display: none;">已到账的投资收益+未到账的投资收益</span><span class="icon-show3" style="display: none;"></span></span> <span class="truemoney"><i class="f26 fb c-pink">0.00 </i> 元</span> </li>
          </ul>
        </div>
      </div>
      <script type="text/javascript">
			//<![CDATA[
			       $(function(){
			    	   $("#clickHeadImage").click(function(){
			    		   $(this).find('span').removeClass('ui-state-hover');
			    		   document.getElementById("userPhotoUploadForm:shangchuan-btn_input").click();
			    	   });
			    	   var safeLevel = "高";
			    	   if(safeLevel=="高"){
			    		   $(".pmain-user .user-info li .safe-level .onlevel").css("background-color","#f1483c");
			    	   }
			    	   
			    	   $("#clickHeadImage span").hover(function(){
			    		   $(this).removeClass('ui-state-hover');
			    	   });
			    	   
			    	   var myDate = new Date();
			    	   var h = myDate.getHours();
			    	   if(h>11 && h<19){
			    	   	 $("#outLogin").html("下午好，");
			    	   }else if(h>18){
			    	   	 $("#outLogin").html("晚上好，");
			    	   }else{
			    	   	 $("#outLogin").html("上午好，");
			    	   }
			       });
			//]]>           
		</script>
      <div class="pmain-connent">
        <div id="pmain-contab" class="pmain-contab">
          <ul>
            <li id="pmain-contab1" class="on">贷款记录</li>
            <li id="pmain-contab2">还款记录</li>
            <li id="pmain-contab3">滞纳金</li>
            <li class="li-other"></li>
          </ul>
        </div>
        <div class="pmain-conmain" id="pmain-conmain">
          <div class="pmain-conmain1">
            <div class="pmain-contitle"> <span class="pmain-titledate">贷款类型</span><span class="pmain-titleproject">贷款时间</span><span class="pmain-titletype">贷款期限(月)</span><span class="pmain-titlemoney">贷款金额(元)</span> </div>
            <ul style="float:left;">
              <?php foreach($loanInfo as $k=>$v): ?>
              <li><span class="pmain-titledate"><?php echo $v['type_name'] ?></span><span class="pmain-titleproject"><?php echo date("Y-m-d H:i:s",$v['loan_addtime']) ?></span><span class="pmain-titletype"><?php echo $v['loan_period'] ?>月</span><span class="pmain-titlemoney"><?php echo $v['loan_amount'] ?></span></li>
              <?php endforeach; ?>
              <!--<div style=" width:
										760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
										 <img src="images/nondata.png" width="60" height="60"><br><br>
										   暂无回款计划</div>-->
            </ul>
            <div class="pmain-morebtn" style="border-top:0;margin-top:0"></div>
          </div>
          <div class="pmain-conmain2" style=" display:none;">
           <div class="pmain-contitle"> <span class="pmain-titledate">还款项</span><span class="pmain-titleproject">还款时间</span><span class="pmain-titletype">还款类型</span><span class="pmain-titlemoney">实际还款</span> </div>
            <ul style="float:left;">
            <?php foreach($reloanInfo as $k=>$v): ?>
              <li><span class="pmain-titledate"><?php echo $v['type_name'] ?></span><span class="pmain-titleproject"><?php echo date("Y-m-d H:i:s",$v['time']) ?></span><span class="pmain-titletype"><?php  if($v['repayment_status'] == 1){ ?> 已还款 <?php  }else{ ?> 未还款 <?php } ?></span><span class="pmain-titlemoney"><?php echo $v['repayment_amount'] ?></span></li>
            <?php endforeach; ?>
              <!--<div style=" width:760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
										 <img src="images/nondata.png" width="60" height="60"><br><br>
										   暂无资金记录</div>-->
            </ul>
            <div class="pmain-morebtn" style="border-top:0;margin-top:0"></div>
          </div>
          <div class="pmain-conmain3" style=" display:none;">
            <div class="pmain-contitle"> <span class="pmain-titledate">创建时间</span><span class="pmain-w210">还款状态</span><span class="pmain-w80">本月应还款</span><span class="pmain-whb200">超出时间(天)</span><span class="pmain-whb110">滞纳金额</span> </div>
            <ul style="float:left;">
            <?php foreach($overdueInfo as $k=>$v): ?>
              <li><span class="pmain-titledate"><?php echo  date("Y-m-d",$v['addtime']); ?></span><span class="pmain-w210"><?php if($v['status']==0){ ?>未还款 <?php }else{ ?> 已还款 <?php } ?></span><span class="pmain-w80 pmain-money"><?php echo $v['amount'] ?></span><span class="pmain-whb200 pmain-money"><?php echo $v['overtime'] ?>天</span><span class="pmain-whb110"><?php echo $v['overdue_amount'] ?></span></li>
            <?php endforeach; ?>
              <!--	<div style=" width:760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
										    <img src="images/nondata.png" width="60" height="60"><br><br>
										   暂无投资记录</div>-->
            </ul>
            <div class="pmain-morebtn" style="border-top:0;margin-top:0"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<script type="text/javascript">
  $(document).on('change','.up',function(){
    var pub = '{{asset("")}}';   
    $('#touxiang').attr('src',pub);
    var check_pub = $('#touxiang').attr('src');
    var formData = new FormData();
    //提交url
    var url = check_pub + 'ucenter/upload';
    formData.append("upload", $(".up").get(0).files[0]);
     $.ajax({
     url: url,
     type: "post",
     processData: false,
     contentType: false,
     data: formData,
     dataType:'json',
     success: function(data) {
        var imgpath = 'uploads/' + data.msg;
          var img = check_pub + imgpath;
          $('#touxiang').attr('src',img);
       }
     });
  })
</script>
@endsection
