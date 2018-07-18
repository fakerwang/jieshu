<?php
session_start();
include './Base.php';
/* 
 * 黎明互联
 * https://www.liminghulian.com/
 */

/**
 *  获取用户openid
 *  构建原始数据
 *  加入签名
 *  调用统一下单API
 *  获取到prepay_id
 */
class WeiXinPay extends Base
{
    public function __construct() {
    
    }
    
}

$obj = new WeiXinPay();
// $obj->getOpenId();
//$obj->unifiedOrder();
$prepay_id = $obj->getPrepayId('1120');
//echo $prepay_id;
$json = $obj->getJsParams($prepay_id);
?>
<script>
function onBridgeReady(){
   WeixinJSBridge.invoke(
       'getBrandWCPayRequest', <?php echo $json;?>,
       function(res){     
           if(res.err_msg == "get_brand_wcpay_request:ok" ) {}     // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回    ok，但并不保证它绝对可靠。 
       }
   ); 
}
if (typeof WeixinJSBridge == "undefined"){
   if( document.addEventListener ){
       document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
   }else if (document.attachEvent){
       document.attachEvent('WeixinJSBridgeReady', onBridgeReady); 
       document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
   }
}else{
   onBridgeReady();
}
</script>