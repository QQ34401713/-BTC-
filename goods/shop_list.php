<!DOCTYPE html>

<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">

    <meta charset="UTF-8">

    <title>商城</title>

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

    <div class="search_href_input_out">

        <a class="search_href_input" href="/index.php?m=goods&c=index&a=shop_lists"><span>搜索您想要的商品</span></a>

    </div>

</div>





<!-- banner -->

<div class="shop_page_index_container_out">

    <div class="swiper-container shop_page_index_container">

        <div class="swiper-wrapper shop_page_index_wrapper">

            <?php foreach ($focus as $key => $value) {?>

            <a href="<?php echo $value['url']?>" class="swiper-slide shop_page_index_slide"><img src="<?php echo $value['pic']?>" alt=""></a>

            <?php }?>

            

        </div>

        <!-- Add Pagination -->

        <!--<div class="swiper-pagination"></div>-->

    </div>

</div>



<script>

    var swiper = new Swiper('.shop_page_index_container', {

        // pagination: '.swiper-pagination',

        autoplay: 4000,//可选选项，自动滑动

        loop : true,

        slidesPerView:1.13,

        centeredSlides: true,

        paginationClickable: true,

        spaceBetween: 6

    });

</script>

<!-- banner  end -->





<!--分类按钮-->

<div class="category_nav_out">

    <div class="swiper-container category_nav_container">

        <div class="swiper-wrapper category_nav_wrapper">

            

            <?php foreach($goods_category as $key=>$val){ ?>

            <a href="index.php?m=goods&c=index&a=shop_lists&cid=<?php echo $val['id']?>" class="swiper-slide category_nav_slide">

                <div class="icon">

                    <img src="<?php echo $val['logo'] ?>" alt="">

                </div>

                <span><?php echo $val['name'] ?></span>

            </a>



          </li>

    <?php }?>





        </div>

        <!-- Add Pagination -->

    </div>

    <div class="swiper-pagination category_nav_pagination"></div>

</div>



<script>

    var swiper = new Swiper('.category_nav_container', {

        pagination: '.category_nav_pagination',

        slidesPerView: 4,

        slidesPerColumn: 2,

        paginationClickable: true,

        spaceBetween:0,

        slidesPerGroup: 4,

    });

</script>

<!--分类按钮 end -->



<!--列表-->

<ul class="shop_page_index_list">

    <?php foreach($goods as $key=>$val){ ?>

    <li>

        <a href="/index.php?m=goods&c=index&a=shop_show&id=<?php echo $val['id']?>" class="clearfix">

            <div class="fl img"><img src="<?php echo $val['img']?>" alt=""></div>



            <h6><?php echo $val['name']?></h6>

            <p><span>￥<?php echo $val['shop_price']?></span><s>￥<?php echo $val['max_price']?></s></p>



        </a>

    </li>

    <?php }?>

</ul>



<!--列表  end-->

{template /common/footer}

