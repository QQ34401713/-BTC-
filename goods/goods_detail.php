{template user/header}
<script type="text/javascript" src="{THEME_PATH}js/swiper.min.js"></script>
<script src="{JS_PATH}artTemplate/artTemplate.js" type="text/javascript"></script>
<script src="{JS_PATH}artTemplate/artTemplate-plugin.js" type="text/javascript"></script>
<script type="text/javascript" src="{THEME_PATH}js/goods_detail.js"></script>
<script src="{JS_PATH}common.js" type="text/javascript"></script>
<script type="text/javascript">
var goods = {
    "goods_id"      : "{$id}",
    "product_id"    : 0,
    "title"         :"{$title}",
    // 促销类型
    "prom_type"     :"{$prom_type}"
};
var theme_path = "{THEME_PATH}";
var referer = -1;
setTitle('商品详情');
</script>
    <div class="main">
        {if $list_img}
        <div class="banner">
            <div class="swiper-container swiper1">
                <div class="swiper-wrapper">
                    {loop $list_img $img}
                    <div class="swiper-slide"><img src="{$img}" /></div>
                    {/loop}
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        {/if}
        <div class="phtt">
            <strong>{$name}</strong>
            
            {if $prom_type == 'timed' && $prom_id > 0 && $promotion[$prom_type]}
                <p class="org" style="font-size:18px;">
                    {MONUNIT}{$shop_price}&nbsp;&nbsp;<span class="old_price">原价：{MONUNIT}{$max_shop_price}</span></p>
                <a class='timed'>促销</a>
                <span id="timed">
                    <script type="text/javascript">count_down('{$promotion[$prom_type][end_time]}');</script>
                </span>
                <style type="text/css">
                    .old_price {color:#888;text-decoration:line-through;font-size:12px;}
                    .timed {display: inline-block;color: #444;font-size: 13px;line-height: 1.6em;padding: 0 6px;border: 1px solid #f62265;margin-right: 8px;moz-border-radius: 3px;-webkit-border-radius: 3px;border-radius: 3px;background-color: #f62265;color: #ffffff;}
                    #timed {color: #666;font-size: 12px;}
                    #timed em {font-style: normal;font-size: 14px;color: red;}                    
                </style>
            {else}
                <p class="org" id="data_shop_price" style="font-size:18px;">{MONUNIT}{$cruuent_price}</p>
            {/if}            
        </div>
        {if $prom_type == 'goods' && $prom_id > 0}
            <div class="chu"><strong class="org">促　　销</strong>：{$promotion[$prom_type][description]}</div>
        {/if}
        {if $rs[spec_array]}
        <div class="color">
            <ul id="goods_specs">
                <?php foreach(unserialize($rs['spec_array']) as $k=>$v):?>
                <li class="goods_specs_col"><strong><?php echo $v['name']?>：</strong><p><?php foreach(str2arr($v[ 'value']) as $kk=>$vv):?><a href="javascript:;" data-id="<?php echo $v['id']?>" data-name="<?php echo $v['name']?>" data-value="<?php echo $vv?>" ><?php echo $vv?></a><?php endforeach;?></p></li>
                <?php endforeach;?>
            </ul>
        </div>
        {/if}
        {hd:goods action="lists" num="15" order="rand()"}
        <div class="like">
            <h3>猜您喜欢</h3>
            <div class="swiper-container swiperb">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <ul class="clearfix">
                            {loop $data $r}
                            <li><a href="{U('Goods/Index/detail', array('id' => $r[id]))}"><img src="{$r[thumb]}" /></a><p><div class="tall"><a href="{U('Goods/Index/detail', array('id' => $r[id]))}">{$r[name]}</a></div></p><strong>{MONUNIT}{$r[shop_price]}</strong></li>
                            {if ($n % 5 == 0 && $n != 15)}
                            </ul>
                        </div>
                        <div class="swiper-slide">
                            <ul class="clearfix">
                            {/if}
                            {/loop}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {/hd}
        <dl class="dldt2">
            <dt class="relR">
                <strong><span>商品详情</span></strong>
                <strong data-load="comment"><span>商品评价</span></strong>
                <strong data-load="consult"><span>商品咨询</span></strong>
            </dt>
            <dd>
                <div class="ph">{$descript}</div>
            </dd>
            <dd>
                <div class="zixun clearfix"><p>只有购买过该商品的用户才能评论</p></div>
                <div class="ping" id="comment_result"><ul></ul></div>
                <div class="zixun clearfix"><p class="more" data-load="comment">点击查看更多</p></div>
            </dd>
            <dd>
                <div class="zixun clearfix"><p>对商品有任何疑问可在线咨询</p><a href="{U('Goods/Consult/add',array('goods_id' => $id))}">我要咨询</a></div>
                <div class="ping" id="consult_result"><ul></ul></div>
                <div class="zixun clearfix"><p class="more" data-load="consult">点击查看更多</p></div>
            </dd>
            <script id="loadTemplate" type="text/html">
            <%for (var i=0;i<lists.length;i++) {%>
            <li>
                <em><img src="<% if(lists[i]['ico']){ %><%=lists[i]['ico']%><% }else{ %>{ROOT_PATH}uploadfile/avatar/default.jpg<% } %>"/></em>
                <strong><%=lists[i]['user_name']%></strong>
                <p><% if(lists[i]['contents']) {%><%=lists[i]['contents']%><% }else{ %><%=lists[i]['question']%><% } %></p>
                <span><%=lists[i]['dataline']%></span>
            </li>
            <% } %>
            </script>
        </dl>
    </div>
	<div class="shopa clearfix">
		<div class="shouc fl" id="collect"><a href="javascript:;"><em></em>收藏</a></div>
		<div class="che fl"><a href="{U('Goods/Cart/index')}"><b id="cart_total">0</b><img src="{THEME_PATH}img/ico_13.png" />购物车</a></div>
		<div class="adds fr"><a href="javascript:;" id="btn_cart" class="btnBlue1 hover">加入购物车</a></div>
	</div>
<script type="text/javascript">
var swiper1 = new Swiper('.swiper1', {
    pagination: '.swiper-pagination',
    paginationClickable: true,
});
var swiperb = new Swiper('.swiperb');
// 收藏
$("#collect a").click(function(){
    var collect_url = "",collect_params = {goods_id : "{$id}"};
    var domCollect = $(this);
    var hasCollect = domCollect.hasClass("hover");
    if(hasCollect) {
        collect_url = "{U('User/Collect/delone')}";
    } else {
        collect_url = "{U('User/Collect/add')}";
    }
    $.post(collect_url, collect_params, function(ret) {
        if(ret.status == 1) {
            if(hasCollect) {
                domCollect.removeClass("hover");
            } else {
                domCollect.addClass("hover");
            }
        } else {
            alert(ret.info);
            return false;
        }
    }, "JSON");
})
var allow_buy = false, cart_nums = 0, goods_number = {intval($rs[goods_number])};
$(function(){
    var elm = $('.relR');
    var startPos = $(elm).offset().top;
    $.event.add(window, "scroll", function() {
        var p = $(window).scrollTop();
        $(elm).css('position',((p) > startPos) ? 'fixed' : 'static');
        $(elm).css('top',((p) > startPos) ? '46px' : '');
    });
    goods_detail.init();
    $("#btn_cart").click(function() {
        goods_detail.cart_add();
    });
    if($("#goods_specs").length == 0) {
        if(goods_number < 1) {
            $("#btn_cart").text('商品库存缺货').removeClass('hover').addClass('disabled');
        } else {
            allow_buy = true;
        }
    } else {
        $("#btn_cart").text('请选择规格').removeClass('hover').addClass('disabled');
    }
    $("#goods_specs a").on("click",function() {
        /* 不能选择 */
        if($(this).hasClass('disabled')) {
            return;
        }
        $(this).siblings("a").removeClass("selected");
        if($(this).hasClass('selected')){
            $(this).removeClass('selected');
        }else{
            $(this).addClass('selected');
        }
        /* 开始更改状态 */
        var product_json = <?php echo json_encode($products_arr)?>;
        var symbol  = '<?php echo $cruuent_symbol?>';
        var specs_array = new Array();
        var regexp = '';
        $("#goods_specs li").each(function(i){
            var selected = $(this).find("a.selected");
            if(selected.length>0) specs_array[i] = selected.attr("data-id") + ':' + selected.attr("data-value");
            else specs_array[i] = "\\\d+:\.+";
        })
        $("#goods_specs li").each(function(k){
            var selected = $(this).find("a.selected");
            /* 遍历属性 */
            $(this).find("a").each(function(){
                $(this).removeClass('disabled');
                var flage = false;
                var temp = specs_array.slice();
                temp[k] = $(this).attr('data-id') + ':' + $(this).attr('data-value');
                for(gi in product_json){
                    var item = product_json[gi];
                    var item_text = JSON.stringify(item);
                    var reg = new RegExp(temp.join(";"));
                    flage = reg.test(item_text);
                    if(flage) break;
                }
                if(!flage) $(this).addClass("disabled");
            });
        })
        var specKey = '';
        $('.goods_specs_col').each(function() {
            spec_id = $(this).find('a.selected').attr('data-id');
            spec_name = $(this).find('a.selected').attr('data-name');
            spec_value = $(this).find('a.selected').attr('data-value');
            //选择值 加入数组
            if ($(this).find('a.selected').length === 0) {
                return false;
            } else {
                specKey += spec_id+':'+spec_value+';' ;
            }
        });
        goods.product_id = 0;
        $("#btn_cart").text('请选择规格').removeClass('hover').addClass('disabled');
        if($('.specCol').length == $('.specCol .goods-color-choose').length){
            if(product_json[specKey] != undefined){
                var item = product_json[specKey];
                //限时促销的不需要更改价格
                var prom_name = "{$promotion[$prom_type]['name']}";
                if (goods.prom_type != 'timed' || prom_name.length == 0) {
                    $('#data_shop_price').text(symbol + item.shop_price);
                }
                $('#data_goodsNumber').text(item.goods_number);
                $('input[name="data_specKey"]').val(specKey);
                goods.product_id = item.id;
                //根据库存显示操作
                if (item.goods_number > 0) {
                    $("#btn_cart").text('加入购物车').removeClass('disabled').addClass('hover');
                    allow_buy = true;
                } else {
                    $("#btn_cart").text('商品库存缺货').removeClass('hover').addClass('disabled');
                    allow_buy = false;
                }
            }
        }
    })
    $(".dldt2 dt strong, p.more").click(function() {
        if($(this).attr('data-load') == 'comment') {
            goods_detail.loadComment();
        } else if($(this).attr('data-load') == 'consult') {
            goods_detail.loadConsult();
        }
    });
})
</script>
</body>
</html>