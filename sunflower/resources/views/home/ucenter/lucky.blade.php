<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')

    <style type="text/css">
        .wdhb-tab .on  a{color:#fff;}
    </style>
    <style>

        #header {
            width:960px;
            margin:0 auto;
            position:relative;
        }
        #turnplatewrapper {
            height:592px;
            width:592px;
            background:url('{{ URL::asset('lucky/img/turnplate/plate_06.png')}}') top left no-repeat;
            /*_background:url('img/turnplate/plate_06_8.png') top left no-repeat;*/
            left:200px;
            top:20px;
            position:absolute;
            -moz-user-select:none;
            user-select:none;
        }

        #turnplate {
            height:592px;
            width:592px;
            background:url('{{ URL::asset('lucky/img/turnplate/plate_05.png')}}') top left no-repeat;
            /*_background:url('img/turnplate/plate_05_8.png') top left no-repeat;*/
        }

        #turnplate #awards {
            position:absolute;
            width:100%;
            height:100%;
            background:url('{{ URL::asset('lucky/img/turnplate/plate_09.png')}}') top left no-repeat;
            /*_background:url('img/turnplate/plate_03_8.png') top left no-repeat;*/
        }

        #platebtn {
            position:absolute;
            top:218px;
            left:218px;
            background:url('{{ URL::asset('lucky/img/turnplate/plate_04.png')}}') top left no-repeat;
            /*_background:url('img/turnplate/plate_04_8.png') top left no-repeat;*/
            height:155px;
            width:155px;
            cursor:pointer;
        }

        #platebtn.hover {
            background-position:0 -155px
        }

        #turnplate #platebtn.click {
            background-position:0 -310px
        }

        #gift {
            width:398px;
            height:89px;
            background:url('{{ URL::asset('lucky/img/turnplate/plate_gift_01.png')}}') top left no-repeat;
            /*_background:url('img/turnplate/plate_gift_01_8.png') top left no-repeat;*/
            position:absolute;
            left:90px;
            top:720px;
        }

        #msg {
            position:absolute;
            display:none;
            top:130px;
            left:195px;
            border-radius:5px;
            color:#333;
            border:3px solid #FED33f;
            box-shadow:2px 2px 2px rgba(0,0,0,0.6);
            background:#fffcf2;
            width:200px;
            padding:10px;
            text-align:center;
        }

        #content {
            width:960px;
            margin:0 auto;
        }
        #init {
            position:absolute;
            top:50%;
            left:50%;
            width:100px;
            height:30px;
            border-radius:5px;
            color:#333;
            border:3px solid #FED33f;
            box-shadow:2px 2px 2px rgba(0,0,0,0.6);
            background:#fffcf2;
            width:250px;
            padding:10px;
            margin-top:-30px;
            margin-left:-138px;
            text-align:center;
            opacity:0.9;
            filter:alpha(opacity=90);
        }

        #login {
            margin-left:20px;
        }

        #login .tips {
            margin-left:50px;
            font-size:12px;
            margin-bottom:-5px;
        }

        #login .tips a {
            color:#039;
            font-size:16px;
            text-decoration:underline;
        }

        #login .tips a:hover {
        }

        #login .msg {
            color:red;
        }

        #login label {
            height:30px;
            line-height:30px;
            font-size:16px;
        }

        #login .ipt {
            background:#fff;
            border:1px solid #ccc;
            height:28px;
            line-height:28px;
            margin-bottom:10px;
            box-shadow:0 1px 0 #fff;
            border-radius:2px;
            width:200px;
        }

        #login .ipt:focus {
            box-shadow:0 0 3px rgba(86,180,289,0.3);
            border:1px solid #56b4ef;
        }

        #lotteryMsg {

        }

        #lotteryMsg .msg {
            font-size:16px;
            color:red;
            font-weight:bold;
            text-align:center;
            font-size:26px;
            color:#ba0f54;
            line-height:1;
            margin-bottom:10px;
        }

        #lotteryMsg .tips {
            text-align:center;
            font-size:14px;
        }

        #lotteryMsg .sp {
            border-top:1px solid #c3c3c3;
            border-bottom:0 none transparent;
            border-right:0 none transparent;
            border-left:0 none transparent;
            overflow:hidden;
            height:0;
            margin:10px 0;
        }

        #lotteryMsg a {
            color:#138cbe;
        }

        #lotteryMsg a:hover {
            color:#039;
        }

        #lotteryMsg .content {
            border:1px solid #ccc;
            border-radius:5px;
            padding:10px;
            background:#fff;
            line-height:1.5;
        }

        #top-menu-wrapper {
            height:51px;
            background:url('{{ URL::asset('lucky/img/turnplate/bg_02.png')}}') top center repeat-x;
            margin-bottom:-51px;
        }

        #top-menu {
            width:960px;
            margin:0 auto;
        }

        #top-menu a, #top-menu span {
            line-height:50px;
            display:inline-block;
            font-size:16px;
            color:#fff;
            text-decoration:1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        #top-menu .user {
            padding-left:30px;
            display:inline-block;
            height:50px;
            color:#fff;
            background:url('{{ URL::asset('lucky/img/turnplate/bg_03.png')}}') 0 16px no-repeat;
        }

    </style>
    <style>
        /*jquery ui 定制 */
        body .ui-dialog {
            padding:0px;
            background:#ebeae3;
            box-shadow:2px 2px 5px rgba(0,0,0,0.5);
        }

        body .ui-dialog .ui-dialog-titlebar {
            height:23px;
            padding:0;
            margin:0;
            background:none;
            border:0 none transparent;
        }

        body .ui-dialog .ui-dialog-titlebar .ui-dialog-title {
            display:none;
        }

        body .ui-widget-content {
            border:4px solid #F7D102;
        }

        body .ui-dialog .ui-dialog-titlebar-close {
            background:#f6d20d;
            right:0;
            margin-top:-12px;
        }

        body .ui-dialog .ui-dialog-buttonpane {
            border:0 none transparent;
        }

        body .ui-dialog .ui-button-text {
            padding:0.8em 1em;
        }

        body .ui-widget-overlay {
            background:url('{{ URL::asset('lucky/img/turnplate/bg_04.png')}}');
            _filter:alpha(opacity=60);
        }
        .mv5 {
            margin-left:5px;
            margin-right:5px;
        }
    </style>
    <div class="wrapper wbgcolor">
        <div class="w1200 personal">
            <div class="credit-ad"><img src="{{ URL::asset('/images/clist1.jpg')}}" width="1000" height="80"></div>
            <div id="personal-left" class="personal-left">
                <ul>
                    <span><li class="pleft-cur"><span><a href="{{ URL::asset('/ucenter/myaccount') }}"><i class="dot dot1"></i>账户总览</a></span></li></span>
                    <li><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="{{ URL::asset('/ucenter/moneyrecord') }}">资金记录</a></span></li>
                    <li><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="{{ URL::asset('/ucenter/investrecord') }}">投资记录</a></span></li>
                    <li><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="{{ URL::asset('/ucenter/returnedmoney') }}">回款计划</a></span></li>
                    <li class=""><span><a href="{{ URL::asset('/ucenter/openthirdparty') }}"><i class="dot dot02"></i>开通第三方</a> </span> </li>
                    <li><span><a href="{{ URL::asset('/ucenter/recharge') }}"><i class="dot dot03"></i>充值</a></span></li>
                    <li class=""><span><a href="{{ URL::asset('/ucenter/withdrawdeposit') }}"><i class="dot dot04"></i>提现</a></span></li>
                    <li style="position:relative;" class=""> <span> <a href="{{ URL::asset('/ucenter/redpacket') }}"> <i class="dot dot06"></i> 我的红包 </a> </span> </li>
                    <li class=""><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="{{ URL::asset('/ucenter/changehistory') }}">兑换历史</a></span></li>
                    <li style="position:relative;" class="on"> <span> <a href="{{ URL::asset('/ucenter/lucky ') }}"> <i class="dot dot06"></i> 幸运转盘 </a> </span> </li>
                    <li style="position:relative;"> <span> <a href="{{ URL::asset('/ucenter/systeminfo') }}"><i class="dot dot08"></i>系统信息 </a> </span> </li>
                    <li><span><a href="{{ URL::asset('/ucenter/accountset') }}"><i class="dot dot09"></i>账户设置</a></span></li>
                    <li><span><a href="{{ URL::asset('/redpacket/session') }}"><i class="dot dot09"></i>设置session</a></span></li>
                </ul>
            </div>
            <label id="typeValue" style="display:none;"> </label>
            <div id="content">
                <div id="top-menu-wrapper" class="dn bgfix">
                    <div id="top-menu">
                        <div class="l"><a class="user bgfix" href="http://www.jq-school.com"> </a> <span>（今天还有</span><span class="lottery-times">0</span><span>次抽奖机会）</span></div><a class="logout r" href="http://www.jq-school.com">退出</a>
                    </div>
                </div>
                <div id="header">
                    <div id="turnplatewrapper" onselectstart="return false;" class="bgfix">
                        <div id="turnplate" class="bgfix">
                            <div id="awards" class="bgfix">
                            </div>
                            <div id="platebtn" class="bgfix">
                            </div>
                            <p id="msg">
                            </p>
                            <p id="init" class="dn">
                                初始化中，请稍后<span></span>
                            </p>
                        </div>
                    </div>
                    <div id="gift" class="bgfix">
                    </div>
                </div>
                <div id="lotteryMsg" class="dn">
                    <p class="msg"></p>
                    <p class="tips">奖品已经发放，前去使用吧，<a href="{{ URL::asset('/redpacket/exchange') }}" target="_blank">点击查看</a>。</p>
                    <hr class="sp" />
                    <p class="mv5" style="margin-bottom:5px">发送以下内容到推广，推广成功还可额外获得红包哦！</p>
                    <div class="content mv5">
                        “快来钱，来钱快” <span class="option"></span>投资理财，能借贷。想要有钱，快进来-> <a href="{{ URL::asset('/index/index') }}">赚钱发财通道</a> 国内流动资金遥遥领先，致富的平台，值得信赖。
                    </div>
                </div>
                <script type="text/javascript" src="{{ URL::asset('lucky/js/jj.js')}}"></script>
                <script type="text/javascript" src="{{ URL::asset('lucky/js/jqueryui.js')}}"></script>

            </div>

            <div class="clear"></div>
        </div>
    </div>
    <script src="{{ URL::asset('lucky/js/DD_belatedPNG_0.0.8a-min.js')}}"></script>
    <script>
        DD_belatedPNG.fix('.bgfix');
    </script>

    <script>
        var isLogin = false;
    </script>
    <script>

    </script>
    <script>
        $(function(){
            $('#personal-left ul li').hover(function(){
                $(this).attr('class','on')
                $(this).siblings().removeClass()
            })
        })
            var turnplate = {
                turnplateBox : $('#turnplate'),
                turnplateBtn : $('#platebtn'),
                lightDom : $('#turnplatewrapper'),
                freshLotteryUrl : 'http://huodong.kuaipan.cn/ajaxTurnplate/freshLottery/',
                msgBox : $('#msg'),
                lotteryUrl : 'http://huodong.kuaipan.cn/ajaxTurnplate/lottery/',
                height : '592', //帧高度
                lightSwitch : 0, //闪灯切换开关. 0 和 1间切换
                minResistance : 5, //基本阻力
                Cx : 0.01, //阻力系数 阻力公式：  totalResistance = minResistance + curSpeed * Cx;
                accSpeed : 15, //加速度
                accFrameLen : 40, //加速度持续帧数
                maxSpeed : 250, //最大速度
                minSpeed : 20, //最小速度
                frameLen : 10, //帧总数
                totalFrame : 0, //累计帧数,每切换一帧次数加1
                curFrame : 0, //当前帧
                curSpeed : 20, //上帧的速度
                lotteryTime : 0, //抽奖次数
                lotteryIndex : 2, //奖品index
                errorIndex : 2, //异常时的奖品指针
                initBoxEle : $('#turnplate #init'),
                progressEle : $('#turnplate #init span'),
                initProgressContent : '~~~^_^~~~', //初始化进度条的内容
                initFreshInterval : 500, //进度条刷新间隔
                virtualDistance : 10000, //虚拟路程,固定值，速度越快，切换到下帧的时间越快: 切换到下帧的时间 = virtualDistance/curSpeed
                isStop : false, //抽奖锁,为true时，才允许下一轮抽奖
                timer2 : undefined, //计时器
                initTime : undefined,
                showMsgTime : 2000, //消息显示时间
                lotteryChannel: '',
                channelList: {
                    'login': '每日登录',
                    'consume': '购买空间'
                },

                lotteryType : {
                    '一等奖' : 0,
                    '二等奖' : 1,
                    '三等奖' : 2,
                    '四等奖' : 3,
                    'empty' : 4,
                    '特等奖' : 5,
                    '五等奖' : 6,
                    '惠顾奖' : 7,
                    'empty1' : 8,
                    '幸运奖' : 9
                },

                lotteryList : [
                    '100元 红包',
                    '50元 红包',
                    '10元 红包',
                    '5元 红包',
                    '继续攒人品',
                    '200元 红包',
                    '3元 红包',
                    '惠顾奖',
                    '继续攒人品',
                    '11元 红包',
                ],

                lotteryDes : [
                    '厉害厉害，老夫佩服,',
                    '不错，百里挑一,',
                    '还可以，再来试试,',
                    '可以的，年轻人,',
                    '多做善事，多充钱,',
                    '万年难遇,',
                    '将就一下吧,',
                    '宠幸,',
                    '多做善事，多充钱,',
                    '也算好运了,'
                ],

                //初始化
                init : function() {
                    this.initAnimate()
                    this.freshLottery();
                    this.turnplateBtn.click($.proxy(function(){
                        this.click();
                    },this));
                },

                //初始化动画
                initAnimate : function() {
                    this.initBoxEle.show();
                    clearTimeout(this.initTimer);
                    var curLength = this.progressEle.text().length,
                            totalLength = this.initProgressContent.length;

                    if (curLength < totalLength) {
                        this.progressEle.text(this.initProgressContent.slice(0, curLength + 1));
                    }else{
                        this.progressEle.text('');
                    }
                    this.initTimer = setTimeout($.proxy(this.initAnimate, this), this.initFreshInterval);
                },

                //停止初始化动画
                stopInitAnimate : function() {
                    clearTimeout(this.initTimer);
                    this.initBoxEle.hide();
                },

                freshLotteryTime : function() {
                    $('#top-menu').find('.lottery-times').html(this.lotteryTime);
                },

                //更新抽奖次数
                freshLottery : function() {
                    this.stopInitAnimate();
                    this.setBtnHover();
                    this.isStop = true;
                    this.lotteryTime = 1;
                    this.freshLotteryTime();

                },

                //设置按钮三态
                setBtnHover : function() {
                    //按钮三态
                    $('#platebtn').hover(function(){
                        $(this).addClass('hover');
                    },function() {
                        $(this).removeClass('hover click');
                    }).mousedown(function(){
                        $(this).addClass('click');
                    }).mouseup(function(){
                        $(this).removeClass('click');
                    });
                },

                //获取奖品
                lottery : function() {
                    turnplate.errorIndex = parseInt(7*Math.random());
                    c = turnplate.errorIndex
                    this.lotteryIndex = undefined;
                    this.lotteryTime--;
                    this.freshLotteryTime();
                    this.totalFrame = 0;
                    this.curSpeed = this.minSpeed;
                    this.turnAround(c);
                    this.lotteryIndex = typeof this.lotteryType[2] !== 'undefined' ? this.lotteryType[2] : this.errorIndex;
                    this.lotteryChannel = typeof this.channelList[1] !== 'undefined' ? this.channelList[1] : '';

                },

                //点击抽奖
                click : function() {
                    //加锁时
                    if(this.isStop == false) {
                        this.showMsg('现在还不能抽奖哦');
                        return;
                    }
                    var server = '{{$server_m}}';
                    var mem = '{{$member}}';
                    if(server>mem){
                        this.showMsg('积分不够哦，亲！');
                        return;
                    }

                    this.lottery();

                },

                //更新当前速度
                freshSpeed : function() {
                    var totalResistance = this.minResistance + this.curSpeed * this.Cx;
                    var accSpeed = this.accSpeed;
                    var curSpeed = this.curSpeed;
                    if(this.totalFrame >= this.accFrameLen) {
                        accSpeed = 0;
                    }
                    curSpeed = curSpeed - totalResistance + accSpeed;

                    if(curSpeed < this.minSpeed){
                        curSpeed = this.minSpeed;
                    }else if(curSpeed > this.maxSpeed){
                        curSpeed = this.maxSpeed;
                    }

                    this.curSpeed  = curSpeed;
                },

                //闪灯,切换到下一张时调用
                switchLight : function() {
                    this.lightSwitch = this.lightSwitch === 0 ? 1 : 0;
                    var lightHeight = -this.lightSwitch * this.height;
                    this.lightDom.css('backgroundPosition','0 ' + lightHeight.toString() + 'px');
                },

                //旋转,trunAround,changeNext循环调用
                turnAround : function() {
                    //加锁
                    this.isStop = false;
                    var intervalTime = parseInt(this.virtualDistance/this.curSpeed);
                    this.timer = window.setTimeout('turnplate.changeNext()', intervalTime);
                },

                //弹出奖品
                showAwards : function(){
                    var token = '{{csrf_token()}}';
                    $.ajax({
                        type : 'post',
                        url : '{{ URL::asset('redpacket/lucky_do') }}',
                        data : {code:c,_token:token},
                        success : function(data){

                            $('#lotteryMsg').dialog('open');

                        }
                    })

                },

                //显示提示信息
                showMsg : function(msg, isFresh) {
                    isFresh = typeof isFresh == 'undefined' ? false : true;
                    if(typeof msg != 'string'){
                        msg = '今天已经抽过奖了，明天再来吧';
                    }
                    var msgBox = this.msgBox;
                    var display = msgBox.css('display');

                    msgBox.html(msg);

                    window.clearTimeout(this.timer2);
                    msgBox.stop(true,true).show();
                    var fadeOut = $.proxy(function() {
                        this.msgBox.fadeOut('slow');
                    }, this);
                    this.timer2 = window.setTimeout(fadeOut, this.showMsgTime);
                },


                //切换到下帧
                changeNext : function() {
                    //判断是否应该停止
                    if(this.lotteryIndex !== undefined && this.curFrame == this.lotteryIndex && this.curSpeed <= this.minSpeed+10 && this.totalFrame > this.accFrameLen) {
                        this.isStop = true;
                        this.showAwards();
                        return;
                    }
                    var nextFrame =  this.curFrame+1 < this.frameLen ? this.curFrame+1 : 0;
                    var bgTop = - nextFrame * this.height;
                    this.turnplateBox.css('backgroundPosition','0 ' + bgTop.toString() + 'px');
                    this.switchLight();
                    this.curFrame = nextFrame;
                    this.totalFrame ++;
                    this.freshSpeed();
                    this.turnAround();
                }
            }
    </script>
    <script>
        //登录插件
        $('#lotteryMsg').dialog({
            modal: true,
            width: 500,
            height: 350,
            resizable: false,
            title: '获奖信息',
            autoOpen: false,
            open: function(){
                var showMsg = '您抽中了： ' + turnplate.lotteryList[turnplate.lotteryIndex] /*+ ' (来自:' + turnplate.lotteryChannel + ')'*/;
                var options = '今天抽中了' + turnplate.lotteryList[turnplate.lotteryIndex] + '，' + turnplate.lotteryDes[turnplate.lotteryIndex];
                $('#lotteryMsg').find('.msg').html(showMsg);
                $('#lotteryMsg').find('.option').html(options);
            },
            buttons: [{
                text:'前去查看',
                click: function() {
                    var options = '今天抽中了' + turnplate.lotteryList[turnplate.lotteryIndex] + '，' + turnplate.lotteryDes[turnplate.lotteryIndex];
                    var jumpUrl = "{{ URL::asset('/ucenter/redpacket') }}";
                    window.open(jumpUrl, "top", "width=1024,height=750,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
                    $(this).dialog('close');
                }
            }]
        });
        turnplate.init();
    </script>
@endsection