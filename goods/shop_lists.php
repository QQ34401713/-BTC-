<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta charset="UTF-8">
	<title>商城-列表</title>

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
		<a href="javascript:history.back(-1)" class="iconfont head_back">&#xe66e;</a>
		<div class="div_search"><input onkeyup="sousuo()" type="text"  id="spooo" value="" placeholder="要搜索的商品"></div>
		<!--<a href="" class="iconfont head_right_icon"></a>-->
	</div>
</div>


<ul class="shop_list_page_out clearfix">
	<?php foreach($goods as $key=>$val){ ?>
	<li>
		<a href="/index.php?m=goods&c=index&a=shop_show&id=<?php echo $val['id']?>">
			<div class="img"><img src="<?php echo $val['img']?>" alt=""></div>
			<div class="title">
				<h6><?php echo $val['name']?></h6>
				<p><span>￥<?php echo $val['shop_price']?></span><s>￥<?php echo $val['max_price']?></s></p>
			</div>
		</a>
	</li>
	 <?php }?>
</ul>
<script type="text/javascript">

	function sousuo(){

		var spooo=$('#spooo').val();
		$.ajax( {  
            url:"/index.php?m=goods&c=index&a=wordkey",// 跳转到 action  
            data:{  
                spooo : spooo
            },  
            type:'post',  
            
            cache:false,  
            dataType:'json',  
            success:function(data) {  
            	console.log(data)
                if(data.msg =="true" ){
                	var str='';
                	var arr = eval(data);
                	if(arr.list!=''){
                		var str='';
	                	$.each(arr.list, function(i, n) {
	                		//str+='<li><a href="/index.php?m=union&c=union&a=union_detail_show&id='+n.id+'"><div class="img"><img src="'+n.list_img+'" alt=""></div><div class="txt"><h6>'+n.name+'</h6><p> <em>'+n.shop_price+'</em> <i>积分</i></p></div></a></li>';
	                		str+='<li><a href="/index.php?m=goods&c=index&a=shop_show&id='+n.id+'"><div class="img"><img src="'+n.list_img+'" alt=""></div><div class="title"><h6>'+n.name+'</h6><p><span>￥'+n.shop_price+'</span><s>￥26.00</s></p></div></a></li>';
	                	});
	                	$('.shop_list_page_out').html(str)
	                }else{
	                	$('.shop_list_page_out').html('')
	                }                  
                }else{  
                    layer.open({
                        content: data.info

                        ,skin: 'msg'

                        ,time: 2 //2秒后自动关闭

                    });

                    //window.location.reload(); 

                }  

            },  

            // error : function() {  

            //     // view("异常！");  

            //     alert("异常！");  

            // }  

        });

	}



</script>

{template /common/footer}