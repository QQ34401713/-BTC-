<!DOCTYPE html>
<head>
<meta charset="UTF-8" />
<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
{if isset($SEO['title']) && !empty($SEO['title'])}{$SEO['title']}{/if}{$SEO['site_title']}
<meta name="Keywords" content="{$SEO['keyword']}" />
<meta name="Description" content="{$SEO['description']}" />
<meta content="telephone=no" name="format-detection" />
<meta content="email=no" name="format-detection" />
<link rel="stylesheet" href="{THEME_PATH}css/swiper.min.css">
<link rel="stylesheet" href="{THEME_PATH}css/style.css" />
<!--[if lt IE 9]>
<script src="{THEME_PATH}js/html5shiv.js"></script>
<![endif]-->
<!-- IOS 主图标 -->
<link rel="apple-touch-icon" href="touch.ico">
<script type="text/javascript">
	var referer = "{__APP__}";
</script>
</head>
<body>
<header class="header">
    <div class="back"><a href="javascript:goback(referer);"><img src="{THEME_PATH}img/ico_1.png" /></a></div>
    <form action="{__APP__}" method="get">
		<input type="hidden" name="m" value="goods"/>
        <input type="hidden" name="c" value="index"/>
		<input type="hidden" name="a" value="lists"/>
	    <div class="search">
			<p class="clearfix">
				<input type="image" src="{THEME_PATH}img/ico_32.png" class="input_img" />
				<input type="search" name="keyword" placeholder="搜索商品标题" value="{$_GET['keyword']}" class="input_ss" />
			</p>
		</div>
	</form>
    <div class="nav">
    	<a><img src="{THEME_PATH}img/ico_2.png" /></a>
    </div>
    <div class="menu clearfix">
        <a href="{__APP__}"><img src="{THEME_PATH}img/ico_11.png" />首页</a>
        <a href="{U('Goods/Index/category')}"><img src="{THEME_PATH}img/ico_12.png" />分类搜索</a>
        <a href="{U('Goods/Cart/index')}"><img src="{THEME_PATH}img/ico_13.png" />购物车</a>
        <a href="{U('User/Index/index')}"><img src="{THEME_PATH}img/ico_14.png" />会员中心</a>
    </div>
</header>
<div class="main">
	<dl class="dldt">
    	
        <dd>
        	<div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" id='waterfall-content'>
						<ul class="picList clearfix" id="container"></ul>
					</div>
					<div class="swiper-slide" id='waterfall-empty'>
                        <div class="none">
                           {loop $goods_list $vo}
                            <li><em><img src="<?php echo $vo['list_img']?>" />
                            </em><p><a href="{U('Goods/Index/detail', array('id'=>$vo['id']))}"><?php echo $vo['name']?></a>
                            <b class="org">￥100</b></p>
                             </li>
                         {/loop}
                        </div>
                    </div>
				</div>
			</div>
		</dd>
	</dl>
	<div id="meiyou">没有更多信息</div>
</div>
{template /User/footer}

</div>
<script src="{THEME_PATH}js/jquery-1.7.2.min.js"></script>
<script src="{THEME_PATH}js/idangerous.swiper.min.js"></script>
<script src="{THEME_PATH}js/script.js"></script>
<script src="{THEME_PATH}js/waterfall.min.js"></script>
<script src="{THEME_PATH}js/handlebars.js"></script>

<script type="text/javascript">
var map = jQuery.parseJSON('{json_encode($_GET)}');
/* 获取列表数据 */
$('#container').waterfall({
    debug:false,//开启debug
    dataType: 'json',//默认返回JSON格式
    path: "{U('Goods/Api/goods_list')}",//接口地址
    params:{
        id:"{$_GET['id']}",
        order:"{$_GET['order']}",
        sort:"{$_GET['sort']}",
        map : map,
        keyword : "{$_GET['keyword']}"
    },//接口或方法
    callbacks: {//回调函数
        loadingFinished: function($loading, isBeyondMaxPage ,data) {
            if ( !isBeyondMaxPage ) {
                $loading.fadeOut();
            } else {
                $loading.hide();
                $('#meiyou').show();
            }
            var _html = '';
            if(!data.lists && $('#container').html().length == 0) {
                $("#waterfall-content").hide();
                $("#waterfall-empty").show();
                return false;
            }
            $.each(data.lists, function(items, item) {
            	_html += '<li><em>';
            	if (!item.thumb && !item.list_img) {
            		_html += '<img src="{THEME_PATH}img/nopic.jpg" />';
            	}else if (!item.thumb){
            		_html += '<img src="'+ item.list_img[0] +'" />';
            	}else{
            		_html += '<img src="'+ item.thumb +'" />';
            	}
                _html += '</em><p><a href="{U("Goods/Index/detail", array("id"=>"'+ item.id +'"))}">'+ item.name +'</a>';
                _html += '<b class="org">￥'+ item.shop_price +'</b></p></li>';
            })
            $('#container').append(_html);
        }
    },
});
/* 筛选确定按钮 */
$('#screening').bind('click',function(){
    $('#form').submit();
})
/* 销量、价格等排序 */
$('.tab_sort').bind('click',function(){
    var order = $(this).attr('order');
    var sort = $(this).attr('sort');
    var url = "{U('Goods/Index/lists')}";
    $.each({json_encode($_GET)},function(n,v) {
        if (typeof(v) == 'object') {
            $.each(v,function(k,y) {
                url += "&"+n+"[" +k+"]="+y;
                return;
            });
        }
        if (typeof(v) != 'object' && n != 'order' && n != 'sort') {
            url += "&"+n+"="+v;
        }
    });
    if (order != 'zh') {
        url += "&order="+order;
        url += "&sort="+sort;
    }
    location.href = {php echo urlencode(url);};
})
</script>
</body>
</html>