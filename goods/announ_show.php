<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>平台公告(详情)</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no" />

    <link rel="stylesheet" href="{THEME_PATH}styles2/swiper.min.css">
    <link rel="stylesheet" href="{THEME_PATH}styles2/reset.css">
    <link rel="stylesheet" href="{THEME_PATH}styles2/common.css">
    <link rel="stylesheet" href="{THEME_PATH}styles2/style.css">

</head>


<body class="bgWhite">
<!-- S header -->
<header>
    <a href="javascript:history.back(-1)" class="headerL iconfont">&#xe66a;</a>
    <h1>公告详情</h1>
</header>
<!-- E header -->


<div class="newsconten">
	<div class="biaoti">
    	<h3><?php echo $announcement_new['title']?></h3>
        <p class="date">发布时间：<?php echo date('Y-m-d H:i:d',$announcement_new['starttime'])?></p>
    </div>
    <div class="neirong">
    	<?php echo $announcement_new['content']?>
    </div>
</div>

</body>
</html>
