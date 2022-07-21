<!DOCTYPE html>

<html lang="en">

<head>

	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">

	<meta charset="UTF-8">

	<title>首页</title>

	<meta name="description" content="">

	<meta name="keywords" content="">

	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">

	<meta name="format-detection" content="telephone=no,email=no,adress=no" />

	<meta name="apple-mobile-web-app-capable" content="yes" />  

	<meta name="apple-mobile-web-app-status-bar-style" content="black">



   <link rel="stylesheet" href="{THEME_PATH}yangs/styles/swiper.min.css">

    <link rel="stylesheet" href="{THEME_PATH}yangs/styles/reset.css">

    <link rel="stylesheet" href="{THEME_PATH}yangs/styles/common.css">

    <link rel="stylesheet" href="{THEME_PATH}yangs/styles/animate.min.css">

    <link rel="stylesheet" href="{THEME_PATH}yangs/styles/style.css">



    <script src="{THEME_PATH}yangs/js/jquery-1.8.3.min.js"></script>

    <script src="{THEME_PATH}yangs/js/swiper.min.js"></script>

    <script src="{THEME_PATH}yangs/js/public.js"></script>

</head>



<body id="index">

<div class="index_top_rsc">

	<?php if($user>0){ ?>

	<a href="/index.php?m=user&c=index&a=moneylog&type=1"><span><i><?php echo C('site_bi_name') ?></i> <em id="money"><?php echo  $userinfo['user_money'] ?></em></span></a>



	<a href="/index.php?m=user&c=order&a=miner"><span><i>种植力</i><?php echo  $userinfo['invite_rate'] ?></span></a>

	<?php }else{?>


	<span><i><?php echo C('site_bi_name') ?></i> 0.00</span>

	 <span><i>种植力</i>0.00</span>

	<?php }?>

</div>



<div class="index_collect_operation">

	<div class="index_bj-1">

		<img src="{THEME_PATH}yangs/images/bj-9.png" alt="">

	</div>

	<div class="index_bj-2">

		<img src="{THEME_PATH}yangs/images/bj-10.png" alt="">

	</div>

	<?php if($user>0){ ?>

	<div class="index_bag_ginseng">

		<img src="{THEME_PATH}yangs/images/index-ginseng.png" alt="">

		<?php if($miner_count>0){ ?>

		<p>正在生长中</p>

		<?php }else{?>

		<p>等待种植</p>

		<?php }?>

	</div>

	<?php }else{?>

	<div class="index_bag_ginseng">

		<img src="{THEME_PATH}yangs/images/index-ginseng.png" alt="">

		<p>等待种植</p>

	</div>

	<?php }?>

	<?php if($user>0){ ?>

	<ul class="index-small-ginseng">

		<?php foreach ($canliangs as $key => $value) {?>

		<li style="top: <?php echo rand(0,50)?>%; right: <?php echo rand(0,85)?>%;" data-id='<?php echo $value['id'] ?>' class="shiqu animated">

			<a  href="javascript:void(0);" >

				<div class="img"><img src="{THEME_PATH}yangs/images/index-ginseng-two.png" alt=""></div>

				<span><?php echo $value['money'] ?></span>

			</a>

		</li>

		<?php }?>

        

        

        

      



        

        

        

	</ul>

	<?php }?>



</div>



<script>

$('.shiqu').click(function(){



	var id=$(this).data('id');

	$.ajax( {  

	  	url:'/index.php?m=user&c=index&a=shiqulk',// 跳转到 action  

	  	data:{  

	       	id : id

	  	},  

	  	type:'post',  

	  	cache:false,  

	  	dataType:'json',  

	  	success:function(data) {  

		    if(data.msg =="false" ){   

		      	alert(data.info);  

		    }else{

		    	var money=$('#money').html();

		    	var zhi_money=parseFloat(money)+parseFloat(data.money);

		    	$('#money').html(zhi_money)

		    	//$(this).hidn();

		    }

	   	},  

	   	error : function() {  

	     	// view("异常！");  

	     	alert("异常！");  

	   	}  

	}); 

	//alert(id);

})

</script>

<ul class="index_notice_btn">

	<li><a href="/index.php?m=goods&c=index&a=help_lists"><img src="{THEME_PATH}yangs/images/icon-22.png"></a></li>

	<li><a href="/index.php?m=goods&c=index&a=lists"><img src="{THEME_PATH}yangs/images/icon-23.png"></a></li>

</ul>



<div class="index_shop_hot_container_out">

	<div class="swiper-container index_shop_hot_container">

		<ul class="swiper-wrapper index_shop_hot_wrapper" style="padding-left: 15px;">

			<li class="swiper-slide index_shop_hot_slide">

				<a href="{U('User/index/rankings')}">

					<div class="img">

						<img src="{THEME_PATH}yangs/images/icon-24.png" alt=""/>

					</div>

					<h6>排行榜</h6>

					<p>查看详情</p>

				</a>

			</li>

			<li class="swiper-slide index_shop_hot_slide">

				<a href="/index.php?m=user&c=order&a=miner">

					<div class="img">

						<img src="{THEME_PATH}yangs/images/icon-25.png" alt=""/>

					</div>

					<h6>种植基地</h6>

					<p>查看详情</p>

				</a>

			</li>

			<li class="swiper-slide index_shop_hot_slide">

				<a href="{U('User/index/invite')}">

					<div class="img">

						<img src="{THEME_PATH}yangs/images/icon-26.png" alt=""/>

					</div>

					<h6>推荐有奖</h6>

					<p>查看详情</p>

				</a>

			</li>

			<!-- <li class="swiper-slide index_shop_hot_slide">

				<a href="">

					<div class="img">

						<img src="{THEME_PATH}yangs/images/icon-25.png" alt=""/>

					</div>

					<h6>种植基地</h6>

					<p>查看详情</p>

				</a>

			</li>

			<li class="swiper-slide index_shop_hot_slide">

				<a href="">

					<div class="img">

						<img src="{THEME_PATH}yangs/images/icon-24.png" alt=""/>

					</div>

					<h6>种植基地</h6>

					<p>查看详情</p>

				</a>

			</li>

			<li class="swiper-slide index_shop_hot_slide">

				<a href="">

					<div class="img">

						<img src="{THEME_PATH}yangs/images/icon-25.png" alt=""/>

					</div>

					<h6>种植基地</h6>

					<p>查看详情</p>

				</a>

			</li>

			<li class="swiper-slide index_shop_hot_slide">

				<a href="">

					<div class="img">

						<img src="{THEME_PATH}yangs/images/icon-26.png" alt=""/>

					</div>

					<h6>种植基地</h6>

					<p>查看详情</p>

				</a>

			</li>

			<li class="swiper-slide index_shop_hot_slide">

				<a href="">

					<div class="img">

						<img src="{THEME_PATH}yangs/images/icon-25.png" alt=""/>

					</div>

					<h6>种植基地</h6>

					<p>查看详情</p>

				</a>

			</li>



 -->





			<!-- 此 li 固定不循环-->

			<li class="swiper-slide index_shop_hot_slide" style="width:15px;"></li>

			<!-- 此 li 固定不循环-->

		</ul>

	</div>

</div>





<!--热门商家  end-->



<script>

    var swiper = new Swiper('.index_shop_hot_container', {

        slidesPerView :'auto',

        paginationClickable: true,

        spaceBetween:10,

        freeMode: true,

        freeModeMomentum : false,

//        autoplay:2000,

//         loop: true,

    });

</script>











{template /common/footer}