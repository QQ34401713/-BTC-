<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta charset="UTF-8">
    <title>商品-详情</title>
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
<div class="home-banner-container-out">
    <a href="javascript:history.back(-1)" class="iconfont shop_details_back">&#xe66e;</a>
    <a href="/" class="iconfont shop_details_home">&#xe62f;</a>
<!--banner-->
<div class="swiper-container home-banner-container">
    <div class="swiper-wrapper home-banner-wrapper">
          <?php foreach($img as $key=>$val){ ?>
        <div class="swiper-slide home-banner-slide">
            <img src="<?php echo $val; ?>" alt="">
        </div>
        
 <?php }?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination home-banner-pagination"></div>
</div>
<!--banner  end-->
</div>

<div class="shop_details_name">
     <h6><?php echo $goods['name']?></h6>
    <p class="clearfix"><span class="fl">￥<?php echo $goods['shop_price']?></span> <s class="fl">￥<?php echo $goods['max_price']?></s> <em class="fr"><?php echo $goods['sales_number']?>人购买</em></p>
</div>

<ul class="clearfix shop_details_ensure">
    <li class="fl alignL"> <span>全球甄选</span> </li>
    <li class="fl alignC"> <span>正品保证</span> </li>
    <li class="fl alignC"> <span>极速发货</span> </li>
    <li class="fl alignR"> <span>无忧退货</span> </li>
</ul>

<div class="shop_details_store_con">
    <div class="title"><span>图文详情</span></div>
    <div class="con">
       <?php echo $goods['descript']?>
    </div>
</div>


<div class="shop_details_purchase_out">
    <div class="shop_details_purchase">
        <a href="/index.php?m=user&c=order&a=buy_order&id=<?php echo $goods['id']?>"><input type="button" value="立即购买"></a>
    </div>

</div>



</body>
</html>