<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta charset="UTF-8">
	<title>支付完成</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no,email=no,adress=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />  
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="{THEME_PATH}yangs/styles/swiper.min.css">
    <link rel="stylesheet" href="{THEME_PATH}yangs/styles/reset.css">
    <link rel="stylesheet" href="{THEME_PATH}yangs/styles/common.css">
    <link rel="stylesheet" href="{THEME_PATH}yangs/styles/style.css">

    <script src="{THEME_PATH}yangs/js/jquery-1.8.3.min.js"></script>
    <script src="{THEME_PATH}yangs/js/swiper.min.js"></script>
    <script src="{THEME_PATH}yangs/js/public.js"></script>
</head>


<body>

<div class="all_header_out">
	<div class="all_header">
		<a href="/" class="iconfont head_back">&#xe66e;</a>
		<h3>支付完成</h3>
		<!--<a href="" class="iconfont head_right_icon"></a>-->
	</div>
</div>



<div class="success_page">
	<div class="img">
		<img src="{THEME_PATH}yangs/images/icon-10.png" alt="">
	</div>
	<dl>
		<dt>支付成功</dt>
		<dd>￥<?php echo $rs['real_amount'] ?></dd>
	</dl>
	<ul>
		<li><a href="/index.php?m=user&c=index&a=order_show&order_sn=<?php echo $rs['order_sn'] ?>">查看订单</a></li>
		<li><a href="/">返回首页</a></li>
	</ul>
</div>

</body>
</html>