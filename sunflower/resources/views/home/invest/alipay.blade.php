<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>支付宝即时到账交易接口接口</title>
    <style>
        .new-btn-login{
            background-color: #ff8c00;
            color: #FFFFFF;
            font-weight: bold;
            border: medium none;
            width:82px;
            height:28px;
        }
        .new-btn-login:hover{
            background-color: #ffa300;
            width: 82px;
            color: #FFFFFF;
            font-weight: bold;
            height: 28px;
        }
    </style>
</head>
<body>
<?php
//付款金额
$total_fee = $_POST['WIDtotal_fee'];
//截去alipay
$path=substr(__PATH__,0,-6);
/************************************************************/
//构造要请求的参数数组，无需改动
$parameter = array(
        "service" => "create_direct_pay_by_user",
        "partner" => '2088121321528708', // 合作身份者id
        "seller_email" => 'itbing@sina.cn', // 收款支付宝账号
        "payment_type"	=> '1', // 支付类型
        "notify_url"	=> $path."notify", // 服务器异步通知页面路径
        "return_url"	=> $path."returns", // 页面跳转同步通知页面路径
        "out_trade_no"	=> "gh141m134277ghm454117", // 商户网站订单系统中唯一订单号
        "subject"	=> "Sun 存宝", // 订单名称
        "total_fee"	=> $total_fee, // 付款金额
        "body"	=> "Sun 存宝", // 订单描述 可选
        "_input_charset"	=> 'utf-8', // 字符编码格式
);
// 参数排序
ksort($parameter);
reset($parameter);

// 拼接获得sign
$str = "";
foreach ($parameter as $k => $v) {
    if (empty($str)) {
        $str .= $k . "=" . $v;
    } else {
        $str .= "&" . $k . "=" . $v;
    }
}
$parameter['sign'] = md5($str . '1cvr0ix35iyy7qbkgs3gwymeiqlgromm');	// 签名
$parameter['sign_type'] = strtoupper('MD5');
$sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='https://mapi.alipay.com/gateway.do?_input_charset=utf-8' method='get'>";
foreach ($parameter as $k => $v) {
        $sHtml.= "<input type='hidden' name='" . $k . "' value='" . $v . "'/>";
}

$sHtml .= '<input class="new-btn-login" type="submit" value="确认支付">';

echo $sHtml;
?>
</body>
</html>