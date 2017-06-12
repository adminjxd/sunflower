;
var _baseServer = $('#h_url').val(),
_www = 'https://www.yirendai.com/LandingPage/mhd/success/index.html',
cookieUrl = '.yirendai.com',
path = '/',
configUrl = {
    activityMark: '79779557-562c-3edb-a24e-1c8ca12fabab',
    wapRegisterUrl: _baseServer + '/loan/wapRegister',
    wapSendMsg: _baseServer + '/loan/wapSendMsg',
    wapReSendMsg: _baseServer + '/loan/wapSendMsg',
    getVerify: _baseServer + '/loan/getVerify',
};
var uuid = new Date().getTime();
function setCookie(i, a, t, n) {
    var e = new Date(),
    r = '';
    e.setTime(e.getTime() + (60 * 365 * 60 * 24 * 1000));
    r = ';expires=' + e.toUTCString();
    t = t || '.yirendai.com';
    i = i || '_uid';
    n = '/';
    document.cookie = i + '=' + a + r + ';domain=' + t + ';path=' + n
};
function isMobile(i) {
    var t = /^1\d{10}$/;
    if (t.test(i)) {
        return ! 0
    } else {
        return ! 1
    }
};
function UrlSearch() {
    var r, a, n = location.href,
    t = n.indexOf('?');
    n = n.substr(t + 1);
    var e = n.split('&');
    for (var i = 0; i < e.length; i++) {
        t = e[i].indexOf('=');
        if (t > 0) {
            r = e[i].substring(0, t);
            a = e[i].substr(t + 1);
            this[r] = a
        }
    }
};
$(function() {
    var o = null,
    t = 60,
    e, r = new UrlSearch(),
    a = r.utm_source;
    $('#lp-input-span-type, #loan_type a').on('click',
    function() {
        $('#lp_type').slideToggle(300)
    });

    $('#lp-input-span-method, #loan_method a').on('click',
    function() {
        $('#lp_method').slideToggle(300)
    });


    $('#lp_type p').on('click',
    function() {
        $('#lp-input-type').val($(this).attr('data-v'));
        $('#lp-input-span-type').text($(this).text());
        $('#lp_type').slideUp(300)
    });

     $('#lp_method p').on('click',
    function() {
        $('#lp-input-method').val($(this).attr('data-v'));
        $('#lp-input-span-method').text($(this).text());
        $('#lp_method').slideUp(300)
    });

    $('.lp-input-subimt-btn').on('click',
    function() {
        $('.lp-input-tips').text('');
        var a = $.trim($('#lp-amount').val());
        var m = $.trim($('#lp-month').val());
        var o = $('#lp-input-type').val();
        var p = $('#lp-input-method').val();
        var t = $.trim($('#lp-mobile').val());
        var token = $("#token").val();
        if (a=='') {
            $('.lp-input-tips').text('贷款金额必须填');
             return
        }
        if (m=='') {
            $('.lp-input-tips').text('贷款时常必须填');
             return
        }
         if (!isMobile(t)) {
             $('.lp-input-tips').text('手机号格式不正确');
             return
         };     
        $.ajax({
            url: configUrl.wapSendMsg,//发送短信
            data: {
                "_token": token,
                phone: $.trim(t),
                //秘钥
            },
            dataType: 'json',
            type: 'POST',
            success: function(e) {
                if (e.error.code == 0) {
                    //发送短信成功进行验证用户
                    $('.lp-d-main').fadeIn(300);
                    $('.lp-control_group span').text(l(t));
                    n()
                } else {
                    alert(e.error.msg);
                }
            },
            error: function() {}
        })
    });
    function n() {
        e = setInterval(function() {
            if (t == 0) {
                clearInterval(e);
                t = 60;
                $('.lp-fixed-input a').show().css({
                    'display': 'inline-block'
                });
                $('.lp-fixed-input b').hide()
            };
            t--;
            $('.lp-fixed-input b').text(t + '秒后再次获取')
        },
        1000)
    };
    function l(i) {
        var t = /(\d{3})\d{4}(\d{4})/;
        i = i.replace(t, '$1****$2');
        return i
    };
    $('#fixCodeBtn').on('click',
    function() {
        $('.lp-input-tips').text('');
        var i = $.trim($('#lp-mobile').val()),
        t = $('#lp-pw').val(),
        e = $.trim($('#lp-imgCode').val());
        $.ajax({
            url: configUrl.wapReSendMsg,
            data: {
                phone: $.trim(i),
                activityMark: configUrl.activityMark,
                uuid: uuid
            },
            dataType: 'jsonp',
            type: 'POST',
            success: function() {
                n();
                $('.lp-fixed-input a').hide();
                $('.lp-fixed-input b').show().css({
                    'display': 'inline-block'
                })
            }
        })
    });
    $('#fixCode').focus(function() {
        $('.lp-fixed-input i').hide().text('')
    });
    $('#lp-fixed-submit').on('click',
    function() {
        if ($('#fixCode').val() == '') {
            $('.lp-fixed-input i').show().text('请输入验证码');
            return
        };
        //发送贷款信息
        var msg = $('#fixCode').val();
        var a = $.trim($('#lp-amount').val());
        var m = $.trim($('#lp-month').val());
        var o = $('#lp-input-type').val();
        var p = $('#lp-input-method').val();
        if (o=='') {
            o = $('#lp-input-span-type').attr('data-v');
        }
        if (p=='') {
            p = $('#lp-input-span-method').attr('data-v');
        }
        var t = $.trim($('#lp-mobile').val());
        var token = $("#token").val();
        $.ajax({
            url: configUrl.wapRegisterUrl,
            data: {
               "_token": token,
                phone: $.trim(t),
                loan_amount:$.trim(a),
                loan_period:$.trim(m),
                loan_type:$.trim(o),
                payment_method:$.trim(p),
                msg:msg,
            },
            dataType: 'json',
            type: 'post',
            success: function(t) {
                if (t.error.code != 0) {
                    $('.lp-fixed-input i').show().text(t.error.msg)
                } else {
                    alert('验证成功，请您耐心等待工作人员与您联系');
                    $('#fixedClose').trigger('click');
                }
            }
        })
    });
    function i() {
        uuid = new Date().getTime();
        var i = configUrl.getVerify + '?uuid=' + uuid + '&activityMark=' + configUrl.activityMark;
        $('#lpCode').attr('src', i)
    };
    $('#lpCode').on('click',
    function() {
        i()
    });
    i();
    $('#fixedClose').on('click',
    function() {
        $('.lp-d-main').fadeOut(300);
        clearInterval(e);
        t = 60;
        $('.lp-fixed-input a').hide();
        $('.lp-fixed-input b').show().css({
            'display': 'inline-block'
        })
    });
    $('.lp-register, #pc-lp-banner3a, .pc-lp-calculator-cont-a').on('click',
    function() {
        if ($('html').scrollTop()) {
            $('html').animate({
                scrollTop: 100
            },
            500);
            return ! 1
        };
        $('body').animate({
            scrollTop: 100
        },
        500);
        return ! 1
    })
})