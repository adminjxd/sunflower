(function($, undefined) {
    $(document).ready(function() {
        var flag4 = 1;//是否发送验证码标识
        var _t = 60; // 倒计时时间
        var subFlag = "1";//提交标识
        var flag = 0;//手机号验证
        var wait = 300;
        var verify1 = "";//手机验证码状态
        var verify2 = "";//验证码状态
        var flag1 = false;//手机验证码验证标识
        var flaghave = 0;//倒计时标识
        var flag3 = 0;// 验证码验证状态1通过，0失败
        var isSuccess = false; //手机验证码是否发送标识
        var h_url = $('#h_url').val();//根目录地址
        var uid = $('#uid').val();//第三方唯一标识
        var pwdlevel = 0;//密码等级
        //获取手机验证码
        var $getKey = $("._getkey");
        var $yanzhengma = $("._yanzhengma");//图片验证码
        //更换图片验证码
        var $changeCapcherButton = $("._changeCapcherButton");
        var $phoneMsg = $('#phoneJy');//手机提示标签
        var bind = {
            init: function() {
                bind._bind();
            },
            _bind: function() {
                //获取手机验证码
                $getKey.on('click', function(event) {
                    event.preventDefault();
                    //检测图片验证码是否成功
                    if (flag3 != 1) {
                        $("#phoneJy").text("");
                        $("#phoneJy").append("<span style=color:#ff7800>请先输入正确的验证码</span>");
                        return false;
                    }
                    if (flag4 == 1) {
                        flag4 = 0;
                        bind._ya($(this));
                    }
                    return false;
                });
                // 更换验证码
                $changeCapcherButton.on('click',function(event){
                    event.preventDefault();
                    var b_sign = $(this).attr('b_sign');
                    bind.captchaChange($(this),b_sign);
                    return false;
                })
                //手机号验证
                $("._phoneNum").on('blur keyup', function(event) {
                    event.preventDefault();
                    bind.phoneYz();
                    return false;
                });
                //手机验证码验证
                $("._phonVerify").on('blur', function(event) {
                    event.preventDefault();
                    bind.verify($(this));
                    return false;
                });
                $("._userName").on('blur', function(event) {
                    event.preventDefault();
                    bind.strVerify($(this));
                    return false;
                });
                $("._password").on('blur', function(event) {
                    event.preventDefault();
                    bind.strVerify($(this));
                    return false;
                });
                $("._repeatPassword").on('blur', function(event) {
                    event.preventDefault();
                    bind.strVerify($(this));
                    return false;
                });
                // 验证码验证
                $yanzhengma.on('blur', function(event) {
                    event.preventDefault();
                    bind.verify($(this));
                    return false;
                });
                $("._ajaxSubmit").on('click', function(event) {
                    event.preventDefault();
                    var b_sign = $(this).attr('b_sign');
                    bind.ajaxSubmit(b_sign);
                    return false;
                });

                //绑定已有帐号检测
                $("#b_username").on('blur', function(event) {
                    event.preventDefault();
                    bind.b_strVerify($(this));
                    return false;
                });
                $("#b_password").on('blur', function(event) {
                    event.preventDefault();
                    bind.b_strVerify($(this));
                    return false;
                });
                $("#b_captcha").on('blur', function(event) {
                    event.preventDefault();
                    bind.b_strVerify($(this));
                    return false;
                });
                $("#submitBtn").on('click', function(event) {
                    event.preventDefault();
                    //获取绑定标识
                    var b_sign = $(this).attr('b_sign');
                    bind.b_ajaxSubmit(b_sign);
                    return false;
                });
            },
            b_strVerify: function(event) {
                var strName = event.attr('id');
                var strVal = event.val();
                var ids = '#' + strName + '_sign';
                //验证用户名
                if (strName == 'b_username') {
                    if (strVal == null || strVal == '') {
                        $(ids).text("");
                        $(ids).append("<span style=color:#ff0000>用户名不能为空</span>");
                        return false;
                    } else {
                      $(ids).text("");
                    }
                }
                //验证密码
                if (strName == 'b_password') {
                    if (strVal == null || strVal == '') {
                        $(ids).text("");
                        $(ids).append("<span style=color:#ff0000>密码不能为空</span>");
                        return false;
                    } else {
                        $(ids).text("");
                    }
                }
                //验证验证码
                if (strName == 'b_captcha') {
                    if (strVal == null || strVal == '') {
                        $(ids).text("");
                        $(ids).append("<span style=color:#ff0000>验证码不能为空</span>");
                        return false;
                    } else {
                        $(ids).text("");
                    }
                }
            },
            b_ajaxSubmit: function(b_sign) {
                if ($("#b_username").val() == null || $("#b_username").val() == '') {
                    $('#b_username_sign').text("");
                    $('#b_username_sign').append("<span style=color:#ff0000>用户名不能为空</span>");
                    return false;
                } else if ($('#b_password').val() == null || $('#b_password').val() == '') {
                    $('#b_password_sign').text("");
                    $('#b_password_sign').append("<span style=color:#ff0000>密码不能为空</span>");
                    return false;
                } else if ($('#b_captcha').val() == null || $('#b_captcha').val() == '') {
                    $('#b_captcha_sign').text("");
                    $('#b_captcha_sign').append("<span style=color:#ff0000>验证码不能为空</span>");
                    return false;
                } else {
                    $.ajax({
                        type: "post",
                        dataType: "json",
                        url: h_url + 'login/bind_do', //发送请求地址
                        data: {
                            "username": $('#b_username').val(),
                            "password": $('#b_password').val(),
                            "captcha": $('#b_captcha').val(),
                            "b_sign": b_sign,
                            "uid": uid,
                        },
                        //请求成功后的回调函数有两个参数
                        success: function(data) {
                            alert(data.msg);
                            if (data.retCode == '1') {
                              window.location = h_url + "index/index";
                            } else {
                                $('#look1').trigger('click');
                            }
                        }
                    });
                }
            },
            //手机发送验证码
            _ya: function(o) {
                if (bind.phoneSend(o)) {
                    if (flaghave != "1") {
                        bind._daojishi();
                    }
                } else {
                    flag4 = 1;
                }
            },
            // 更换验证码
            captchaChange: function(event,b_sign) {
                var yzm = $('#yzm');
                var yanzheng = $('#yanzheng');
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: h_url + 'login/change_captcha',
                    data: {},
                    success: function(data) {
                        if (b_sign == '1') {
                            flag3 = 0;
                            var obj = yzm;
                        } else {
                            var obj = yanzheng;
                        }
                        obj.attr('src',data.cap_url);
                    }
                });
            },
            phoneYz: function() { // 手机号验证
                var utel = $("#phone");
                var str = utel.val();
                var regPartton = /^1[3-9]\d{9}$/;
                if (str.length > 11) {
                    $("#phoneJy").text("");
                    $("#phoneJy").append("<span style=color:#ff7800>手机号格式不正确</span>");
                    flag = 1;
                    return false;
                }
                if (!str || str == null) {
                    $("#phoneJy").text("");
                    $("#phoneJy").append("<span style=color:#ff7800>手机号不可为空</span>");
                    flag = 1;
                    return false;
                } else if (!regPartton.test(str)) {
                    $("#phoneJy").text("");
                    $("#phoneJy").append("<span style=color:#ff7800>手机号格式不正确</span>");
                    flag = 1;
                    return false;
                } else {
                    $("#phoneJy").text("");
                    $("#phoneJy").append("<span style=color:green>手机号格式正确</span>");
                    flag = 0;
                    return true;
                }
            },
            phoneSend: function(o) {
                if (!bind.phoneYz()) {
                    return false;
                }
                if (flag == "1") {
                    return false;
                }
                
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: h_url + 'register/phone_send',
                    async: false,
                    data: {
                        phone: $("#phone").val(),
                    },
                    //请求成功后的回调函数有两个参数
                    success: function(data) {
                        flag4 = 1;
                        if (data['retCode'] == "0") { //新号码
                            flag4 = 0;
                            flaghave = 0;
                            isSuccess = true;
                            $phoneMsg.text("");
                            $phoneMsg.html("<span style=color:green>"+data['msg']+"</span>");
                        } else {
                            wait = 300;
                            flaghave = 1;
                            $phoneMsg.text("");
                            $phoneMsg.html("<span style=color:#ff7800>"+data['msg']+"</span>");
                        }
                    },
                    error: function(data, textStatus) {
                        flag4 = 1;
                    }
                });
                if (isSuccess) {
                    // login._changetCapther();
                    o.val("重新发送(" + wait + ")");
                    wait--;
                    return true;
                } else {
                    return false;
                }
            },
            strVerify: function(event) {
                var strName = event.attr('id');
                var strVal = event.val();
                var ids = '#' + strName + 'Alt';
                //验证用户名
                if (strName == 'userName') {
                    if (strVal == null || strVal == '') {
                        $(ids).text("");
                        $(ids).append("<span style=color:#ff7800>用户名不能为空</span>");
                        return false;
                    }
                    if (!/^[a-zA-Z][a-zA-Z0-9_]*$/.test(strVal)) {
                        $(ids).text("");
                        $(ids).append("<span style=color:#ff7800>用户名只能为以字母开头,字母、数字下划线组成</span>");
                        return false;
                    } else if (strVal.length < 6 || strVal.length > 15) {
                        $(ids).text("");
                        $(ids).append("<span style=color:#ff7800>用户名小于6位或者大于15位</span>");
                        return false;
                    } else {
                        $.ajax({
                            type: "post",
                            dataType: "json",
                            url: h_url + 'register/check_name',//发送请求地址
                            data: {'username': strVal},
                            //请求成功后的回调函数有两个参数
                            success: function(data) {
                                var msg1 = data['msg'];
                                if ("1" == data.retCode) {
                                    $(ids).text("");
                                    $(ids).append("<span style=color:green>填入信息可用</span>")
                                } else {
                                    $(ids).text("");
                                    $(ids).append("<span style=color:#ff7800>" + msg1 + "</span>");
                                    return false;
                                }
                            }
                        });
                    }
                }
                //验证密码
                if (strName == 'password') {
                    if (strVal == null || strVal == '') {
                        $(ids).text("");
                        $(ids).append("<span style=color:#ff7800>密码不能为空</span>");
                        return false;
                    } else if (strVal.length < 6 || strVal.length > 15) {
                        $(ids).text("");
                        $(ids).append("<span style=color:#ff7800>密码小于6位或者大于15位</span>");
                        return false;
                    } else if (!/^[a-zA-Z0-9]*$/.test(strVal)) {
                        $(ids).text("");
                        $(ids).append("<span style=color:#ff7800>密码只能是数字和字母</span>");
                        return false;
                    } else {
                        var level_msg = '';
                        if(/^[0-9]{6,15}$/.test(strVal)){
                            level_msg = '<font color=red>密码等级：弱</font>';
                        } else if(/^[0-9a-z]{6,15}$/.test(strVal)){
                            pwdlevel = 1;
                            level_msg = '<font color=orange>密码等级：中</font>';
                        } else if(/^[0-9a-zA-Z]{6,15}$/.test(strVal)){
                            pwdlevel = 2;
                            level_msg = '<font color=green>密码等级：强</font>';
                        }
                        $(ids).text("");
                        $(ids).append("<span style=color:green>填入信息可用&nbsp;&nbsp;&nbsp;"+level_msg+"</span>");
                    }
                }
                //重复密码
                if (strName == 'repeatPassword') {
                    if (strVal == null || strVal == '') {
                        $(ids).text("");
                        $(ids).append("<span style=color:#ff7800>密码不能为空</span>");
                        return false;
                    } else if (strVal != $("#password").val()) {
                        $(ids).text("");
                        $(ids).append("<span style=color:#ff7800>两次输入密码不一样</span>");
                        return false;
                    } else {
                        $(ids).text("");
                        $(ids).append("<span style=color:green>密码输入一致</span>");
                    }
                }
                //结束
            },
            //图片或手机验证码验证
            verify: function(vr) {
                var byName = vr.attr("id");
                var ids = '#' + byName;
                if ($(ids).val() == null || $(ids).val() == '') {
                    $(ids + "s").text("");
                    $(ids + "s").append("<span style=color:#ff0000>验证码不能为空</span>");
                    return false;
                }
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: h_url + 'register/check_yzm',
                    cache: false,
                    async: false,
                    data: {
                        verifyCode: $(ids).val(),
                        byName: byName,
                        phone: $("#phone").val(),
                    },
                    //请求成功后的回调函数有两个参数
                    success: function(data) {
                        $(ids + "s").text("");
                        if (data.retCode == "1") {
                            $(ids + "s").append("<span style=color:green>"+data.msg+"</span>");
                            if (byName == "phonVerify") {
                                flag1 = true;
                                verify1 = "1";
                            } else {
                                flag3 = 1;
                                verify2 = "1";
                            }
                        } else {
                            $(ids + "s").append("<span style=color:#ff7800>"+data.msg+"</span>");
                            if (byName == "phonVerify") {
                                flag1 = false;
                                verify1 = "2";
                            } else {
                                flag3 = 0;
                                verify2 = "2";
                            }
                        }
                    },
                    error: function(data, textStatus) {
                        alert(textStatus);
                    }
                });
            },
            ajaxSubmit: function(b_sign) {
                var selectedItems = new Array();
                $("input[name='protocol']:checked").each(function() {
                    selectedItems.push($(this).val());
                });
                if ($('#userName').val() == null || $('#userName').val() == '') {
                    $('#userNameAlt').text("");
                    $('#userNameAlt').append("<span style=color:#ff7800>用户名不能为空</span>");
                    return false;
                } else if (!/^[a-zA-Z][a-zA-Z0-9_]*$/.test($('#userName').val())) {
                    $('#userNameAlt').text("");
                    $('#userNameAlt').append("<span style=color:#ff7800>用户名只能为以字母开头,字母、数字下划线组成</span>");
                    return false;
                } else if ($('#userName').val().length < 6 ||$('#userName').val().length > 15) {
                    $('#userNameAlt').text("");
                    $('#userNameAlt').append("<span style=color:#ff7800>用户名小于6位或者大于15位</span>");
                    return false;
                } else if ($('#password').val() == null || $('#password').val() == '') {
                    $('#passwordAlt').text("");
                    $('#passwordAlt').append("<span style=color:#ff7800>密码不能为空</span>");
                    return false;
                } else if ($('#password').val().length < 6 || $('#password').val().length > 15) {
                    $('#passwordAlt').text("");
                    $('#passwordAlt').append("<span style=color:#ff7800>密码小于6位或者大于15位</span>");
                    return false;
                } else if (!/^[a-zA-Z0-9]*$/.test($('#password').val())) {
                    $('#passwordAlt').text("");
                    $('#passwordAlt').append("<span style=color:#ff7800>密码只能是数字和字母</span>");
                    return false;
                } else if ($("#repeatPassword").val() != $("#password").val()) {
                    $('#repeatPasswordAlt').text("");
                    $('#repeatPasswordAlt').append("<span style=color:#ff7800>两次密码输入不一致</span>");
                    return false;
                } else if (!flag3) {
                    $("#jpgVerifys").html("<span style=color:#ff7800>验证码错误</span>");
                    return false;
                } else if (flag || ($("#phone").val() == '' || $("#phone").val() == null)) {
                    $("#phoneJy").text("");
                    $("#phoneJy").append("<span style=color:#ff7800>手机号不正确</span>");
                    return false;
                } else if (!/^1[3-9]\d{9}$/.test($('#phone').val())) {
                    $("#phoneJy").text("");
                    $("#phoneJy").append("<span style=color:#ff7800>手机号格式不正确</span>");
                    return false;
                } else if (!flag1) {
                    $("#phonVerifys").html("<span style=color:#ff7800>手机验证失败</span>");
                    return false;
                } else if (selectedItems.length == 0) {
                    $('#protocolAlt').text("");
                    $('#protocolAlt').append("<span style=color:#ff7800>请点击投贷宝注册协议</span>");
                    return false;
                } else {
                    if (subFlag == "1") {
                        $.ajax({
                            type: "post",
                            dataType: "json",
                            url: h_url + 'login/bind_do', //发送请求地址
                            cache: false,
                            async: false,
                            data: {
                                "username": $('#userName').val(),
                                "password": $('#password').val(),
                                "captcha": $('#jpgVerify').val(),
                                "phone": $("#phone").val(),
                                "verifyCode":$("#phonVerify").val(),
                                "b_sign": b_sign,
                                "uid": uid,
                                'pwdlevel':pwdlevel,
                            },
                            //请求成功后的回调函数有两个参数
                            success: function(data) {
                                alert(data.msg);
                                if (data.retCode == '1') {
                                  window.location = h_url + "index/index";
                                } else if (data.retCode == '3') {
                                    $('#look').trigger('click');
                                    flag3 = 0;
                                }
                            }
                        });
                    }
                }
            },
            _daojishi: function() {
                bind._setti(_t);
            },
            _setti: function(i) {
                setTimeout(function() {
                    if (i == 0) {
                        $getKey.html("获取验证码");
                        flag4 = 1;
                    } else {
                        $getKey.html("重新发送(" + i + ")");
                        bind._setti(parseInt(i - 1));
                    }
                }, 1000);
            },
            // _changetCapther: function() {
            //     $changeCapcherButton.trigger('click');
            //     flag3 = 0;
            //     return false;
            // }
        };
        bind.init();
    });
})(jQuery)