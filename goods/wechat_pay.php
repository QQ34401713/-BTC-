<!--{subtemplate common/header}-->
<script src="{JS_PATH}artDialog/artDialog.js" type="text/javascript"></script>
<script src="{JS_PATH}artDialog/plugins/iframeTools.js" type="text/javascript"></script>
<link rel="stylesheet" href="{JS_PATH}artDialog/skins/default.css">
<!--购物车（有商品）-->
<div class="shopCarbox w1100">
	<div class="shopCar_nav">
		<div class="shopCar_Title-2">收银台</div>
		
	</div>
	<style type="text/css">
			.item {padding: 18px 30px;}
			.money_pay {float:right; display: block;}
			.money_box {height:56px; margin:10px auto 0;cursor: pointer;border: 3px solid #e8e8e8; }
			.money_box:hover {border:3px solid #CAD6EF;}
			.active{border:3px solid #728EC9; }
			.money_box em {font-style:normal;font-size: 16px;}
			em.black {color:#4d4d4d;}
			em.red{color: #F60;}
		</style>
		<script src="{THEME_PATH}js/jquery.qrcode.min.js" type="text/javascript"></script>
		<div class="payway-box" id="pay_type" style="position: relative;">
			<div class="payway-01">
				<ul>
					<li class="payselect-cursor">微信支付</li>
				</ul>
				<em style='float:right;margin-right:40px;font-style:normal;' class="red">
					您还需支付&nbsp;<b style="font-size:16px;" id="need_pay"><?php echo $total_fee?></b>&nbsp;元
				</em>
			</div>
			<div class="pay-bank">
				<!-- 微信支付 -->
				<div class="pay-bank-wechat">
					<dl class="fl">
						<dt><div style="margin:0 auto"><div id="code" style="width:260px;height:260px;margin:0 auto;margin-top:18px"></div></div></dt>
						<div class="pay-bank-sweep">
							<dl>
							<img class="wechat" src="{THEME_PATH}/images/qrcode.gif"/>
								<dt class="fr">请使用微信扫一扫 扫描二维码支付</dt>
							</dl>
						</div>
					</dl>
					<img class="fr" src="{THEME_PATH}images/phone.png">
				</div>
			</div>
		</div>
	<div class="clear"></div>
</div>
<!--{subtemplate common/footer}-->
<!--添加新地址-->
</body>
<script type="text/javascript">
var url = "<?php echo $code_url?>";
$("#code").qrcode({ 
    render: "table", //table方式 
    width: 260, //宽度 
    height:260, //高度 
    text: url //任意内容 
}); 
</script>
<script type="text/javascript">
setInterval("checkStatus()",3000);
function checkStatus(){
	$.ajax({
		type:'post',
		url:'<?php echo U("Goods/Order/getOrderState")?>',
		data:{
          order_sn:'<?php echo $_GET['order_sn']?>'
		},
		success:function(data){
			if(data.pay_status==1){
				location.href = "<?php echo U('Goods/Order/pay_success',array('order_sn'=>$_GET['order_sn']))?>";
			}
		}
	})
}
</script>
</html>