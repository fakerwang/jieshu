<?php
namespace WeChat;
//微信公众号支付
class WechatPubPay
{
    //商户API 密钥
    const KEY = 'gLZZOAlEAFQh5Yc4F4j2X5sM9h5xwP7m';
    //微信授权URL(目的是获取code)
    const CODEURL = 'https://open.weixin.qq.com/connect/oauth2/authorize?';
    //获取用户的openid的URL
    const OPENIDURL = 'https://api.weixin.qq.com/sns/oauth2/access_token?';
    //公众号appID
    const APPID = 'wx0bb583c2e89057d8';
    //公众号AppSecret
    const SECRET = '0ee7ada595ff7197c5e79a62f1b22703';
    //商户号id
    const MCHID = '1231009902';
    //统一下单支付路径
    const UNURL = 'https://api.mch.weixin.qq.com/pay/unifiedorder';
    //微信公众号统一下单
    public function wechatPubOrder($openId,$ordernumber)
    {
        /**
         * 1.构建原始数据
         * 2.加入签名
         * 3.将数据转换为XML
         * 4.发送XML格式的数据到接口地址
         */
        $params = [
            'appid' => self::APPID,
            'mch_id' => self::MCHID,
            'nonce_str' => md5(time()),
            'body' => '公众号支付测试',
            'out_trade_no' => $ordernumber,
            'total_fee' => 2,
            'spbill_create_ip' => $this->get_client_ip(),
            'notify_url' => 'http://dspx.tstmobile.com/api/live/callback',
            'trade_type' => 'JSAPI',
//            'product_id' => $oid,可选参数，商品id
            'openid' => $openId,
        ];
        //设置签名
        $params = $this->setSign($params);
        //设置将数组转化成xml
        $xmldata = $this->ArrToXml($params);
        //写入log日志
        $this->logs('log.txt', $xmldata);
        $resdata = $this->postXml(self::UNURL, $xmldata);
        $arr = $this->XmlToArr($resdata);
        return $arr;

    }
    //获取prepayid
    public function getPrepayId($openid,$ordernumber){
        $arr = $this->wechatPubOrder($openid,$ordernumber);
        return $arr['prepay_id'];
    }
    //获取公众号支付所需要的json数据
    public function getJsParams($prepay_id){
        $params = [
            'appId' => self::APPID,
            'timeStamp' =>time(),
            'nonceStr' => md5(time()),
            'package' =>'prepay_id=' . $prepay_id,
            'signType' =>'MD5',
            //       'paySign' => $this->getSign($params)
        ];
        ///进行签名
        $params['paySign'] = $this->getSign($params);
        return json_encode($params);
    }
    //获取带签名的数组
    public function setSign($arr){
        $arr['sign'] = $this->getSign($arr);;
        return $arr;
    }
    //生成签名
    public function getSign($arr){
        //去除空值
        $arr = array_filter($arr);
        if(isset($arr['sign'])){
            unset($arr['sign']);
        }
        //按照键名字典排序
        ksort($arr);
        //生成url格式的字符串
        $str = $this->arrToUrl($arr) . '&key=' . self::KEY;
        return strtoupper(md5($str));
    }
    //验证签名
    public function chekSign($arr){
        $sign = $this->getSign($arr);
        if($sign == $arr['sign']){
            return true;
        }else{
            return false;
        }
    }
    //参数按照key=value的格式生成url格式
    public function arrToUrl($arr){
        return urldecode(http_build_query($arr));
    }
    //获取openid
    public function getOpenId($openid=null){
        if(isset($_SESSION['openid'])){
            return $_SESSION['openid'];
        }else{
            //1.用户访问一个地址 先获取到code
            if(!isset($_GET['code'])){
                //print_r($_SERVER);
                $redurl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $url = self::CODEURL . "appid=" .self::APPID ."&redirect_uri={$redurl}&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";
                var_dump($url);exit;
                //构建跳转地址 跳转
                header("location:{$url}");
            }else{
                //2.根据code获取到openid
                //调用接口获取openid
                $openidurl = self::OPENIDURL . "appid=" . self::APPID . "&secret=".self::SECRET . "&code=" . $_GET['code'] . "&grant_type=authorization_code";
                $data = file_get_contents($openidurl);
                $arr = json_decode($data,true);
                $_SESSION['openid'] = $arr['openid'];
                return $_SESSION['openid'];
            }
        }
    }
    //以curl的post请求
    public function postXml($url,$postfields){
        $ch = curl_init();
        $params[CURLOPT_URL] = $url;    //请求url地址
        $params[CURLOPT_HEADER] = false; //是否返回响应头信息
        $params[CURLOPT_RETURNTRANSFER] = true; //是否将结果返回
        $params[CURLOPT_FOLLOWLOCATION] = true; //是否重定向
        $params[CURLOPT_POST] = true;
        $params[CURLOPT_POSTFIELDS] = $postfields;
        $params[CURLOPT_SSL_VERIFYPEER] = false;
        $params[CURLOPT_SSL_VERIFYHOST] = false;
        curl_setopt_array($ch, $params); //传入curl参数
        $content = curl_exec($ch); //执行
        curl_close($ch); //关闭连接
        return $content;
    }
    //获取当前服务器的IP
    function get_client_ip()
    {
        if ($_SERVER['REMOTE_ADDR']) {
            $cip = $_SERVER['REMOTE_ADDR'];
        } elseif (getenv("REMOTE_ADDR")) {
            $cip = getenv("REMOTE_ADDR");
        } elseif (getenv("HTTP_CLIENT_IP")) {
            $cip = getenv("HTTP_CLIENT_IP");
        } else {
            $cip = "unknown";
        }
        return $cip;
    }
    //数组转xml
    public function ArrToXml($arr)
    {
        if(!is_array($arr) || count($arr) == 0) return '';

        $xml = "<xml>";
        foreach ($arr as $key=>$val)
        {
            if (is_numeric($val)){
                $xml.="<".$key.">".$val."</".$key.">";
            }else{
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }
    //xml转化成数据
    public function XmlToArr($xml)
    {
        if($xml == '') return '';
        libxml_disable_entity_loader(true);
        $arr = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $arr;
    }
    //写入log日志的方法
    public function logs($filename,$data){
        file_put_contents('./logs/' . $filename, $data);
    }
    //获取post过来的数据
    public function getPost(){
        return file_get_contents('php://input');
    }
}