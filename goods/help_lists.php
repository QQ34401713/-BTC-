<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta charset="UTF-8">
	<title>公告</title>
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


<body style="background: #f1f4f7;">

<div class="all_header_out">
	<div class="all_header">
		<a href="javascript:history.back(-1)" class="iconfont head_back">&#xe66e;</a>
		<h3>公告</h3>
	</div>
</div>

<ul class="notice_page_list">
	<?php $data = M("article")->where("category_id=7")->order("id desc")->limit("10")->select();?>
    {php $i = 0;}
    {loop $data $r}
    {php $i++;}
	<li class="active">
		<a href="{U('Article/Index/detail', array('id'=> $r[id]))}">
			<h6 class="clearfix"> <span>{msubstr($r[title],27)}</span><em><?php echo date("y-m-d h:i:s",$r[create_time])?></em></h6>
			<p>{msubstr(ClearHtml($r[content]),27)}</p>
		</a>
	</li>
	{/loop}
	<!-- <li class="active">
		<a href="">
			<h6> <span>邀请id154254514消费者成功</span><em>2018.07.14</em></h6>
			<p>恭喜您，邀请id154254514消费者成功,获得500元奖金邀请消费者成功,获得500元奖金。</p>
		</a>
	</li>
	<li>
		<a href="">
			<h6> <span>邀请id154254514消费者成功</span><em>2018.07.14</em></h6>
			<p>恭喜您，邀请id154254514消费者成功,获得500元奖金邀请消费者成功,获得500元奖金。</p>
		</a>
	</li>
	<li>
		<a href="">
			<h6> <span>邀请id154254514消费者成功</span><em>2018.07.14</em></h6>
			<p>恭喜您，邀请id154254514消费者成功,获得500元奖金邀请消费者成功,获得500元奖金。</p>
		</a>
	</li> -->
</ul>






</body>
</html>