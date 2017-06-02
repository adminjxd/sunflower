@extends('home.layouts.layout')

@section('content')

    <!-- 页面内容 -->
    <!--列表-->
    <div class="page-filter wrap">
        <div class="breadcrumbs"><a href="{{asset('/')}}">首页</a>&gt;<span class="cur">散标投资列表</span></div>
        <!--阳光存-->
        <div style="margin-bottom: 30px" class="invest-filter" data-target="sideMenu">
            <div class="filter-inner clearfix">
                <div class="filter-item">
                    <div class="hd">
                            <h3>Sun 存宝  </h3><span class="min-span">   <?=$msg?></span> <a  class="min-a" href="">了解详情></a>
                    </div>
                    <div>

                        <ul class="min">
                            <li>昨日年化收益</li>
                            <li class="min-lv"><?=$rate?>%</li>
                            <li>按日计息</li>
                            <li>自动复投</li>
                            <li>免费存转</li>
                            <li>
                                <a style="background-color: #ffffff" href="{{asset('invest/zfb')}}?project=Sun 存宝">
                                <img class="deposit"  src="{{asset('images/zfb.png')}}" alt="立即存入"/></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="common-problem">
                    <h3>常见问题</h3>
                    <ul>
                        <li><a href="#">什么是债权贷？</a></li>
                        <li><a href="#">关于"债权贷"产品的说明</a></li>
                        <li><a href="#">易贷网P2P理财收费标准</a></li>
                        <li><a href="#">债权贷和房易贷、车易贷有什么区别？</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="invest-list mrt30 clearfix">
            <div class="hd">
                <h3>投资列表</h3>
                <div class="count">
                    <ul>
                        <li class="line">散标投资交易金额&nbsp;&nbsp;<span class="f20 bold"><?=$invest_total?>元</span></li>
                        <li>累计赚取收益&nbsp;&nbsp;<span class="f20 bold"><?=$return_total?>元</span></li>
                    </ul>
                </div>
            </div>
            <div class="bd">
                <div class="invest-table clearfix">
                    <div class="title clearfix">
                        <ul>
                            <li class="col-330">借款标题</li>
                            <li class="col-180"><a href="javascript:url('order','account_up');" class="">借款金额</a> </li>
                            <li class="col-110"><a href="javascript:url('order','apr_up');" class="">年利率</a> </li>
                            <li class="col-150"><a href="javascript:url('order','period_up');" class="">借款期限</a> </li>
                            <li class="col-150">还款方式</li>
                            <li class="col-120"><a href="javascript:url('order','scale_up');" class="">借款进度</a></li>
                            <li class="col-120-t">操作</li>
                        </ul>
                    </div>
                    <!------------投资列表-------------->
                <?php foreach ($loan as $k=>$v) { ?>
                    <div class="item">
                        <ul>
                            <li class="col-330 col-t"><a href="{{asset('invest/infor')}}" target="_blank">
                                    <?php if($v->loan_type=='车贷'){?>
                                    <i class="icon icon-che" title="车易贷"></i>
                                    <?php }else{?>
                                     <i class="icon icon-fang" title="房易贷"></i>
                                    <?php }?>
                                </a><a class="f18" href="{{asset('invest/infor')}}?l=<?=$v->loan_id?>" title="<?=$v->user.$v->mortgage?>贷" target="_blank"><?=$v->user.$v->mortgage?>贷</a></li>
                            <li class="col-180"><span class="f20 c-333"><?=$v->loan_amount?></span>元</li>
                            <li class="col-110 relative"><span class="f20 c-orange"><?=$v->gain_rate?>% </span></li>
                            <li class="col-150"> <span class="f20 c-333"><?=$v->loan_period?></span>个月 </li>
                            <li class="col-150">按月付息,到期还本</li>
                            <li class="col-120">
                                <div class="circle">
                                    <div class="left progress-bar">
                                        <div class="progress-bgPic progress-bfb<?=floor($v->bar/10)?>">
                                            <div class="show-bar"> <?=$v->bar?>% </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-120-2">
                                <?php if($v->bar>=100){?>
                                <a class="ui-btn btn-gray" href="{{asset('invest/infor')}}?l=<?=$v->loan_id?>">还款中</a>
                                <?php }else{?>
                                    <div id="zf" style="display: none">
                                        <a href="javascript:void(0);" class="ui-btn btn-orange zh" loan_id="<?=$v->loan_id?>" >账户余额</a>
                                        <a href="{{asset('invest/zfb')}}?project=invest/<?=$v->loan_id?>" class="ui-btn btn-orange">支付宝</a>
                                    </div>
                                    <a class="ui-btn btn-orange zf"  href="javascript:void(0);">立即投资</a>
                                    <?php }?>
                            </li>
                        </ul>
                    </div>

                    <script>
                        $(function () {
                            //支付
                            $('.zf').click(function () {
                               $('#zf').show();
                                $(this).hidden();
                            });
                            //账户余额支付
                            $('.zh').click(function () {
                                var obj=$(this);
                                var p=prompt('投资金额：');
                                var method='zh';
                                var loan_id=obj.attr('loan_id');

                                if(p){
                                    $.ajax({
                                        type:'post',
                                        url:'{{asset('invest/zhInvest')}}',
                                        data:{
                                            money:p,
                                            method:method,
                                            loan_id:loan_id,
                                            _token:'{{ csrf_token() }}'
                                        },
                                        success: function (num) {
                                            $('#zf').hide();
                                            $('.zf').show();
                                            if(num==1){
                                                alert('恭喜您投资成功，请查看投资记录')
                                            }else{
                                                alert('哎呀~投资失败了，重新试试吧')
                                            }
                                        }
                                    })
                                }
                            })
                        })
                    </script>

                    <?php }?>

                    <!------------投资列表-------------->
                </div>
                {{--<div class="pagination clearfix mrt30">--}}
                    {{--<span class="page"><a href="javascript:void(0);" onclick="">首页</a><a href="javascript:void(0);" onclick="">上一页</a>&nbsp;<a class="curr" href="javascript:;">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="javascript:void(0);" onclick="#">下一页</a><a href="javascript:void(0);" onclick="#">尾页</a>&nbsp;<em>共2297页&nbsp;</em></span>--}}
                    {{--<dl class="page-select">--}}
                        {{--<dt><span>1</span><i class="icon icon-down"></i></dt>--}}
                        {{--<dd style="display: none;">--}}
                            {{--<ul name="nump" id="jsnump">--}}
                                {{--<li><a href="##" onclick="page_jump(&quot;this&quot;,1)">1</a></li>--}}
                                {{--<li><a href="##" onclick="page_jump(&quot;this&quot;,2)">2</a></li>--}}
                                {{--<li><a href="##" onclick="page_jump(&quot;this&quot;,3)">3</a></li>--}}
                            {{--</ul>--}}
                        {{--</dd>--}}
                    {{--</dl>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>

<!--网站底部-->
    <script>

       $(function () {

       })

    </script>
@endsection


