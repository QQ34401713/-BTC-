<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<title>确认支付</title>

<meta name="Keywords" content="{$SEO['keyword']}" />

<meta name="Description" content="{$SEO['description']}" />

<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">

<head>





<body style="background-color:#f0efed;">

<style type="text/css">

	

/*****************  确认支付  ******************/

/***********  饶家伟 2015-06-15  ************/

.safety-notice { width: 100%; height: 50px; line-height: 4.2em; border-bottom: 1px solid #e1e1e1; text-align: center; }

.safety-notice img { width: 5%; margin-right: 2%; }

.safety-notice span { font-size: 12px; color: #1b8a1d; }



.pay-amount { height: 120px; text-align: center; }

.pay-amount em { display: block; margin-top: 15px; margin-bottom: 10px; font-size: 16px; color: #494d51; font-style: normal; line-height: 36px; }

.pay-amount span { font-size: 3em; color: #f15353; }



.order-num { margin-bottom:20px;padding:0 15px; height: 80px; border-top: 1px solid #e1e1e1; border-bottom: 1px solid #e1e1e1; background-color: #fff; }

.order-num strong { display: block; line-height: 45px; font-size: 16px; color: #35393c; }

.order-num span { display: block; font-size: 16px; color: #aaaaaa; }

.pay-btn { margin: 32px 5% 0; width: 90%; height: 3em; line-height: 3em; border: 1px solid #47a2dd; border-radius: 8px; font-size: 1.8em; font-family: "Microsoft yahei"; color: #fff; background-color: #1a8fda; }



.btnBlue{ display:inline-block;font-size:16px;color:#fff; border:1px solid #27B04B;background:#14C143;line-height:50px;padding:0 10px;

	moz-border-radius:3px;

	-webkit-border-radius:53px;

	border-radius:3px;

	-webkit-appearance:none;

	outline:none; width: 100%;

}

.btnBlue.hover{color:#fff; background:#0068b7;border:1px solid #0068b7;

	moz-border-radius:3px;

	-webkit-border-radius:3px;

	border-radius:3px;

}

</style>



<?php 

// p($jsApiData_json);

// print_r($product_info);

// 

// 

// 

		$ss1="验证".serialize($product_info)."\n";

			$fp = fopen("sybwap_pay.log","a+");

			fwrite($fp,$ss1);

			fclose($fp);

		

?>

    <div class="main">

        <div class="safety-notice">

            <span>您正在安全支付环境中，请放心付款</span>

        </div>

        <div class="pay-amount">

            <em>应付金额</em>

            <span>￥<?php echo $product_info['total_fee'] ?></span>

        </div>

        <div class="order-num">

            <strong>支付订单编号：</strong>

            <span><?php echo $product_info['trade_sn']?></span>

        </div>

        <form name="form" method="post" action="#">

            <div class="mar15">

                <input type="button" value="确认支付" class="btnBlue" onclick="callpay()">

            </div>

        </form>

    </div>



    <script type="text/javascript">

        function jsApiCall()

		{

			

			// var jstr = "<?php echo $jsApiData_json?>";

			// if(jstr.length<10){ alert("请重试！") ; return false;}

			WeixinJSBridge.invoke(

				'getBrandWCPayRequest',

				<?php echo $jsApiData_json?>,

				function(res){

					 if(res.err_msg == "get_brand_wcpay_request:ok" ) {

					 	alert('支付成功');

					 	location.href = "/index.php?m=user&c=index&a=index";

					 }else if(res.err_msg == "get_brand_wcpay_request:cancel"){

                        

                     }else{

                        alert('支付失败'+res.err_msg);

                        location.href = "/index.php?m=user&c=index&a=index";

					 }

				}

			);

		}

		function callpay()

		{

			// alert(1);

			if (typeof WeixinJSBridge == "undefined"){

			    if( document.addEventListener ){

			        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);

			    }else if (document.attachEvent){

			        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 

			        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);

			    }

			}else{

			    jsApiCall();

			}

		}

	</script>

	

</body>

</html>

