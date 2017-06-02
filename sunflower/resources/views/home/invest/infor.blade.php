@extends('home.layouts.layout')

@section('content')
<!--信息详细-->
<div class="item-detail wrap">
    <div class="breadcrumbs"> <a href="{{asset('/')}}">首页</a>&gt; <a href="#">散标投资列表</a>&gt; <span class="cur">项目详情</span> </div>
    <div class="item-detail-head clearfix" data-target="sideMenu">
        <div class="hd">
            <?php if($info->loan_type=='车贷'){?>
            <i class="icon icon-che" title="车易贷"></i>
            <?php }else{?>
            <i class="icon icon-fang" title="房易贷"></i>
            <?php }?>
            <h2><?=$info->user.$info->mortgage?>贷</h2>
        </div>
        <div class="bd clearfix">
            <div class="data">
                <ul>
                    <li> <span class="f16">借款金额</span><br>
                        <span class="f30 c-333" id="account"><?=$info->loan_amount?></span>元 </li>
                    <li class="relative"><span class="f16">年利率</span><br>
                        <span class="f30 c-orange"><?=$info->gain_rate?>% </span> </li>
                    <li><span class="f16">借款期限</span><br>
                        <span class="f30 c-333"><?=$info->loan_period?></span>个月 </li>
                    <li><span class="c-888">借款编号：</span>20150921617</li>
                    <li><span class="c-888">发标日期：</span><?=date('Y-m-d',$info->loan_addtime)?></li>
                    <li><span class="c-888">保障方式：</span>100%本息垫付</li>
                    <li><span class="c-888">还款方式：</span>按月付息,到期还本</li>
                    <li><span class="c-888">需还本息：</span> <?=$info->total?>元 </li>
                    <li><span class="c-888">借款用途：</span>临时周转</li>
                    <li class="colspan"> <span class="c-888 fl">投标进度：</span>
                        <div class="progress-bar fl"  style="margin-top: 28px">
                            <span style="width:<?=$bar?>%;"></span>
                        </div>
                        <span class="c-green" style="line-height: 62px"><?=$bar?>%</span>
                    </li>
                    <?php if($bar<100){?>
                    <li style="margin:3px 0 ;width:180px; height: 40px; line-height: 40px;" class="ui-btn btn-orange">

                            <a style="font-size: 20px" class="ui-btn" href="{{asset('invest/zfb')}}?project=deposit/<?=$info->loan_id?>">投  资</a>

                    </li>

                    <li> <span >投资范围：</span> <span id="account_range"> 50元~

            不限 </span> </li><?php }?>
                </ul>
            </div>
            <div class="mod-right mod-status">
                <div class="inner">
                    <div class="text"> 待还本息：<span class="f24 c-333"><?=$info->total?></span>元<br>
                        剩余期限：<span class="f24 c-333"><?php $last=$record;$last=array_pop($last); echo $last->residue?>天</span> <br>
                        下期还款日： <span class="f20 c-333"><?=$last->last_day;?></span> </div>
                    <i class="icon icon-status icon-status1"></i> </div>
            </div>
        </div>
    </div>
    <div class="item-detail-body clearfix mrt30 ui-tab">
        <div class="ui-tab-nav hd"> <i class="icon-cur" style="left: 39px;"></i>
            <ul>
                <li class="nav_li active" id="nav_1"><a href="javascript:;">借款信息</a></li>
                <li class="nav_li" id="nav_2"><a href="javascript:;">投资记录</a> <i class="icon icon-num1" style="margin-left: -15px;"> <span id="tender_times">23</span> <em></em> </i> </li>
                <li class="nav_li" id="nav_3"><a href="javascript:;">还款列表</a></li>
            </ul>
        </div>
        <div class="bd">
            <div class="ui-tab-item active" style="display: block;">
                <div class="borrow-info">
                    <dl class="item">
                        <dt>
                        <h3>借款人介绍</h3>
                        </dt>
                        <dd>
                            <div class="text">
                                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 借款人信息介绍： 借款人<?=$info->user?></p>
                                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 借款人资产介绍： <?=$info->user?>有<span>一</span><?=$info->mortgage?>。</p>
                                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 详细资金用途：借款人申请<?php if($info->loan_type=='车贷'){?>车辆<?php }else{?>房屋<?php }?>质押贷款，贷款用于资金周转。</p>
                            </div>
                        </dd>
                    </dl>
                    <dl class="item">
                        <dt>
                        <h3>审核信息</h3>
                        </dt>
                        <dd>
                            <div class="verify clearfix">
                                <ul>
                                    <li><i class="icon icon-4"></i><br>
                                        身份证</li>
                                    <li><i class="icon icon-5"></i><br>
                                        户口本</li>
                                    <li><i class="icon icon-6"></i><br>
                                        结婚证</li>
                                    <li><i class="icon icon-7"></i><br>
                                        工作证明</li>
                                    <li><i class="icon icon-8"></i><br>
                                        工资卡流水</li>
                                    <li><i class="icon icon-9"></i><br>
                                        收入证明</li>
                                    <li><i class="icon icon-10"></i><br>
                                        征信报告</li>
                                    <li><i class="icon icon-11"></i><br>
                                        亲属调查</li>
                                    <li><i class="icon icon-19"></i><br>
                                        行驶证</li>
                                    <li><i class="icon icon-20"></i><br>
                                        车辆登记证</li>
                                    <li><i class="icon icon-21"></i><br>
                                        车辆登记发票</li>
                                    <li><i class="icon icon-22"></i><br>
                                        车辆交强险</li>
                                    <li><i class="icon icon-23"></i><br>
                                        车辆商业保险</li>
                                    <li><i class="icon icon-24"></i><br>
                                        车辆评估认证</li>
                                </ul>
                            </div>
                        </dd>
                    </dl>
                    <dl class="item">
                        <dt>
                        <h3>风控步骤</h3>
                        </dt>
                        <dd>
                            <div class="text">
                                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 调查：风控部对借款人各项信息进行了全面的电话征信，一切资料真实可靠。<span></span> </p>
                                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 抵押物：全款<?=$info->mortgage?>。 </p>
                                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 权证：抵押物已办理相关手续等。 </p>
                                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 担保：质押物担保。 </p>
                                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 结论：此客户为老客户，上笔贷款<span>4</span>万元，标的号为<span>20150745682</span>，已结清，现因资金周转，再次申请贷款。借款人居住稳定，收入来源可靠，经风控综合评估，同意放款<span><?=$info->loan_amount?></span>元。 </p>
                                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 保障：借款逾期<span>48</span>小时内，易贷风险准备金先行垫付。 </p>
                            </div>
                            <div class="step clearfix">
                                <ul>
                                    <li><i class="icon icon-1"></i>资料审核</li>
                                    <li><i class="icon icon-2"></i>实地调查</li>
                                    <li><i class="icon icon-3"></i>资产评估</li>
                                    <li class="no"><i class="icon icon-4"></i>发布借款</li>
                                </ul>
                            </div>
                            <div class="conclusion f16"> 结论：经风控部综合评估， <span class="c-orange">同意放款<?=$info->loan_amount?>元；</span> <i class="icon icon-status icon-status1"></i> </div>
                        </dd>
                    </dl>
                    <dl class="item">
                        <dt>
                        <h3>权证信息</h3>
                        </dt>
                        <dd>
                            <div class="warrant"> <span class="f14 c-888">（注：为保护借款人的个人隐私信息，实物材料对部分信息进行了隐藏处理）</span>
                                <div class="album" id="album">
                                    <div class="album-show">
                                        <div class="loading" style="display: none;"></div>
                                        <img src="{{asset('images')}}/news.jpg"> </div>
                                    <div class="album-thumb"> <a href="javascript:;" class="btn btn-prev"></a> <a href="javascript:;" class="btn btn-next"></a>
                                        <div style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; width: 1070px;" class="container" id="albumThumb">
                                            <ul style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; width: 1926px; left: 0px;">
                                                <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{asset('images')}}/news.jpg"></a></li>
                                                <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{asset('images')}}/news.jpg"></a></li>
                                                <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{asset('images')}}/news.jpg"></a></li>
                                                <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{asset('images')}}/news.jpg"></a></li>
                                                <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{asset('images')}}/news.jpg"></a></li>
                                                <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{asset('images')}}/news.jpg"></a></li>
                                                <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{asset('images')}}/news.jpg"></a></li>
                                                <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{asset('images')}}/news.jpg"></a></li>
                                                <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{asset('images')}}/news.jpg"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="ui-tab-item" style="display: none;">
                <div class="repayment-list"> 目前投标总额：<span class="c-orange"><?=$invest_total?> 元</span>&nbsp;&nbsp;
                    剩余投标金额：<span class="c-orange"><?=$info->loan_amount-$invest_total?> 元</span>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                        <tr>
                            <th>投标人</th>
                            <th>投标金额</th>
                            <th>投标时间</th>
                            <th>投标方式</th>
                        </tr>
                        </tbody>
                        <tbody id="repayment_content">
                        <?php foreach ($invest as $k=>$v ) {?>
                        <tr>
                            <td><?=$v->user_name?>***</td>
                            <td><span class="c-orange">￥<?=$v->invest_money?></span></td>
                            <td><?=$v->invest_time?></td>
                            <td>手动投资</td>
                        </tr>
                        <?php }?>
                        </tbody>
                        {{--<tfoot>--}}
                        {{--<tr class="page-outer">--}}
                            {{--<td colspan="4" align="center"><div class="pagination clearfix"><span class="page" id="repayment_content_pager"><a class="disabled"> 上一页 </a><a class="curr">1</a><a href="javascript:void(0)">2</a><a href="javascript:void(0)" next="2">下一页</a><em>共2页</em>--}}
                    {{--<dl class="page-select">--}}
                        {{--<dt><span>1</span><i class="icon icon-down"></i></dt>--}}
                        {{--<dd style="display: none;"><a href="javascript:;" total="23" spaninterval="2" content="repayment_content">1</a><a href="javascript:;" total="23" spaninterval="2" content="repayment_content">2</a></dd>--}}
                    {{--</dl>--}}
                    {{--</span></div></td>--}}
                        {{--</tr>--}}
                        {{--</tfoot>--}}
                    </table>
                </div>
            </div>
            <div class="ui-tab-item" style="display: none;">
                <div class="repayment-list"> 已还本息：<span class="c-orange"><?=$info->repayment_amount?>元</span>&nbsp;&nbsp;
                    待还本息：<span class="c-orange"><?=$info->total-$info->repayment_amount?>元</span>&nbsp;&nbsp;(待还本息因算法不同可能会存误差，实际金额以到账金额为准！)
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <th>合约还款日期</th>
                            <th>期数</th>
                            <th>应还金额</th>
                            <th>还款状态</th>
                        </tr>
                        <?php foreach ($record as $k=>$v ) {?>
                        <tr>
                            <td><?=$v->last_day?></td>
                            <td><?=$v->month?></td>
                            <td><?=$v->payment_amount?>元</td>
                            <td>
                                <?php if($v->repayment_status==1){?>
                                    已还
                                <?php }else{?>
                                    还款中
                                <?php }?>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--网站底部-->
<script>

    $(function () {

    })

</script>
@endsection