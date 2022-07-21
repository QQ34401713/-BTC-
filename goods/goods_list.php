<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta charset="UTF-8">
	<title>参地</title>
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
	<script src="/statics/js/mlayer/layer.js"></script>
	<style type="text/css">
		.money{ padding: 0 5px; color: red; font-weight: bold; }
	</style>
<!-- <script type="text/javascript" src="//pub.idqqimg.com/qqun/qun/qqweb/m/qun/confession/js/vconsole.min.js"></script> -->


	<script type="text/javascript">

var tips = function tips(msg,url=""){
	if(url==""){
		layer.open({
			content: msg
			,skin: 'msg'
			,time: 2 
		});
	}else{
		layer.open({
			content: msg
			,skin: 'msg'
			,time: 2 
			,end:function(){
				window.location.href=url;
			}
		});		
	}
}

var hd_alert = function (msg,url=""){
	if(url==""){
		layer.open({
			content: msg
			,btn: '确定'
			,shadeClose:false
		});
	}else{
		layer.open({
			content: msg
			,btn: '确定'
			,shadeClose:false
			,end:function(){
				window.location.href=url;
				window.event.returnValue=false; 
			}
		});
	}
}

var hd_alert1 = function (msg){
	layer.open({
	    content: msg
	    ,time: 2
  	});
}	

</script>
</head>


<body style="background: #180e01;">

<ul class="ginseng_land_list clearfix">
	<?php 
	foreach ($miner as $key => $vo){
	if($key>0){?>
	<li>
		<div class="img">
			<h6>{$vo[name]}</h6>
			<img src="{THEME_PATH}yangs/images/ginseng-land-img-<?php echo $key+1?>.jpg" alt="">
			<!-- <span>体验</span> -->
		</div>
		<div class="txt">
			<p><span>种植力：<i></i></span><em>{$vo[rate]}</em></p>
			<p><span>浮动：<i></i></span><em>24小时产量 <br> {$vo[profit24min]}-{$vo[profit24max]}浮动</em></p>
			<p><span>总收益：<i></i></span><em>{$vo[profitAll]}</em></p>
		</div>
		<div class="btn">
			<?php if($user>0){ 
				if($userinfo['user_money']>=$vo['money']){
				?>
			<a href="javascript:;" class="buy" data-name='{$vo[name]}' data-id='{$vo[id]}'>{$vo[money]} <?php echo C('site_bi_name') ?></a>
			<?php }else{?>
			<span><?php echo C('site_bi_name') ?>不足</span>
			<?php  }}else{?>
			<a href="##" class="deng">{$vo[money]} <?php echo C('site_bi_name') ?></a>
			<?php }?>
		</div>

	</li>
	<?php } }?>
	<input type="hidden" id="order_sn" value="<?php echo build_order_no();?>" >
	<script type="text/javascript">
		$('.deng').click(function(){
			hd_alert1('请登录后在再购买');
		})
		$('.buy').click(function(){
			var order_sn = $("#order_sn").val();
			var name =$(this).data('name');
			var mid =$(this).data('id');
			layer.open({
			    content: '您确定要购买“'+name+'”吗？'
			    ,btn: ['买买买', '不要']
			    ,yes: function(index){
				    $.ajax({
						type:'post',
						url:'/index.php?m=user&c=order&a=buyminer',
						data:{id:mid,order_sn:order_sn},
						dataType:'json',
						success:function(ret){
					  		layer.closeAll();
					  		console.log(ret);
						  	if(ret.status==1){
						  		window.location.href='/index.php?m=user&c=order&a=miner';
						  	}else{
						  		hd_alert(ret.info);
						  	}
						}
					})
			    }
		  	});
		})
	
	</script>
	<!-- <li>
		<div class="img">
			<h6>红条参地</h6>
			<img src="images/ginseng-land-img-2.jpg" alt="">
		</div>
		<div class="txt">
			<p><span>种植力：<i></i></span><em>0.01-0.011kb/s</em></p>
			<p><span>浮动：<i></i></span><em>24小时产量 <br> x-x浮动</em></p>
			<p><span>总收益：<i></i></span><em>x-x RSC</em></p>
		</div>
		<div class="btn">
			<a href="">立即领取</a>
		</div>
	</li>
	<li>
		<div class="img">
			<h6>园艺参地</h6>
			<img src="images/ginseng-land-img-3.jpg" alt="">
		</div>
		<div class="txt">
			<p><span>种植力：<i></i></span><em>0.01-0.011kb/s</em></p>
			<p><span>浮动：<i></i></span><em>24小时产量 <br> x-x浮动</em></p>
			<p><span>总收益：<i></i></span><em>x-x RSC</em></p>
		</div>
		<div class="btn">
			<span>立即领取</span>
		</div>
	</li>
	<li>
		<div class="img">
			<h6>林下参地</h6>
			<img src="images/ginseng-land-img-4.jpg" alt="">
		</div>
		<div class="txt">
			<p><span>种植力：<i></i></span><em>0.01-0.011kb/s</em></p>
			<p><span>浮动：<i></i></span><em>24小时产量 <br> x-x浮动</em></p>
			<p><span>总收益：<i></i></span><em>x-x RSC</em></p>
		</div>
		<div class="btn">
			<span>立即领取</span>
		</div>
	</li>
	<li>
		<div class="img">
			<h6>野山参地</h6>
			<img src="images/ginseng-land-img-5.jpg" alt="">
		</div>
		<div class="txt">
			<p><span>种植力：<i></i></span><em>0.01-0.011kb/s</em></p>
			<p><span>浮动：<i></i></span><em>24小时产量 <br> x-x浮动</em></p>
			<p><span>总收益：<i></i></span><em>x-x RSC</em></p>
		</div>
		<div class="btn">
			<span>立即领取</span>
		</div>
	</li> -->
</ul>
{template /common/footer}