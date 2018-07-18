<?php
namespace WeChat;
include 'phpqrcode/phpqrcode.php';
//微信扫码支付功能
Class WechatCodePay{
    //商户API 密钥
    const KEY = 'gLZZOAlEAFQh5Yc4F4j2X5sM9h5xwP7m';
    //公众号appID
    const APPID = 'wx0bb583c2e89057d8';
    //公众号AppSecret
    const SECRET = '0ee7ada595ff7197c5e79a62f1b22703';
    //商户号id
    const MCHID = '1231009902';
    //统一下单API地址(固定写法)
    const UNURL = 'https://api.mch.weixin.qq.com/pay/unifiedorder';
    //支付通知地址需要更改成你自己服务器的地址（回调地址）商户后台设置回调地址
    const NOTIFY = 'https://www.liminghulian.com/pay/notify.php';
    //生成e
    //统一下单
    public function wechatCodeOrder($params,$orderNum){
        $orderNum = 'ZA'.time().rand(1000,9999);
        //调用统一下单API
        $params = [
            'appid'=> self::APPID,
            'mch_id'=> self::MCHID,
            'nonce_str'=>md5(time()),
            'body'=> '扫码支付模式一',
            'out_trade_no'=> $orderNum,
            'total_fee'=> 2,
            'spbill_create_ip'=>$this->get_client_ip(),
            'notify_url'=> self::NOTIFY,
            'trade_type'=>'NATIVE',
            'product_id'=>$params['product_id']
        ];
        //设置签名
        $params = $this->setSign($params);
        //将数组转为xml
        $xml = $this->ArrToXml($params);
        //发送数据到统一下单API地址
        $data = $this->postStr(self::UNURL,$xml);
        $arr = $this->XmlToArr($data);
        if($arr['result_code'] == 'SUCCESS' && $arr['return_code'] == 'SUCCESS'){
            return $arr;
        }else{
            $this->logs('error.txt', $data);
            return false;
        }
    }
    //获取prepayid
    public function getPrepayId($openid,$ordernumber){
        $arr = $this->wechatCodeOrder($openid,$ordernumber);
        return $arr['prepay_id'];
    }
    //获取扫码支付所需要的xml数据
    public function getJsParams($prepay_id){
        $return_params = [
            'return_code'  => 'SUCCESS',
            'appid'  => self::APPID,
            'mch_id'  => self::MCHID,
            'nonce_str'  => md5(time()),
            'prepay_id'  => $prepay_id,
            'result_code'=> 'SUCCESS'
        ];
        //返回的xml
        $return_params = $this->setSign($return_params);
        $return_xml = $this->ArrToXml($return_params);
        echo $return_xml;
    }
    //生成二维码
    public function getCode(){
        echo \QRcode::png($this->getQRurl(12121));exit;
    }
    //获取构建二维码的URL地址
    public function getQRurl($oid){
        $params = [
            'appid'             => self::APPID,
            'mch_id'            => self::MCHID,
            'product_id' 	=> $oid,//订单号(产品ID)
            'time_stamp' 	=> time(),
            'nonce_str' 	=> md5(time()),
        ];
        return 'weixin://wxpay/bizpayurl?' . $this->arrToUrl($this->setSign($params));
    }
    //设置签名
    public function setSign($arr){
        $arr['sgin'] = $this->getSign($arr);
        return $arr;
    }
    //获得签名
    public function getSign($arr){
        //去除属数组的空值
        array_filter($arr);
        //去除sgin的值
        if(isset($arr['sgin'])){
            unset($arr['sgin']);
        }
        //ASCII码从小到大排序
        ksort($arr);
        //进行url参数格式组装排序
        $str = $this->arrToUrl($arr).'&key='.self::KEY;
        //使用md5加密转化为大写
        return strtoupper(md5($str));
    }
    //防止中文和网址的转义(反转义),生成不带key的URL
    public function arrToUrl($arr){
        return urldecode(http_build_query($arr));
    }
    //校验签名
    public function checkSgin($arr){
        //获取新的签名
        $sgin = $this->getSign($arr);
        if($sgin==$arr['sgin']){
            return true;
        }else{
            return false;
        }
    }
    //接收微信返回的post数据
    public function getPost(){
        return file_get_contents('php://input');
    }
    //记录到文件
    public  function logs($file,$data){
        $data = is_array($data) ? print_r($data,true) : $data;
        file_put_contents('./logs/' .$file, $data);
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
    //Xml 文件转数组
    public function XmlToArr($xml)
    {
        if($xml == '') return '';
        libxml_disable_entity_loader(true);
        $arr = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $arr;
    }
    //数组转XML
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
    //post 字符串到接口
    public function postStr($url,$postfields){
        $ch = curl_init();
        $params[CURLOPT_URL] = $url;    //请求url地址
        $params[CURLOPT_HEADER] = false; //是否返回响应头信息
        $params[CURLOPT_RETURNTRANSFER] = true; //是否将结果返回
        $params[CURLOPT_FOLLOWLOCATION] = true; //是否重定向
        $params[CURLOPT_POST] = true;
        $params[CURLOPT_SSL_VERIFYPEER] = false;//禁用证书校验
        $params[CURLOPT_SSL_VERIFYHOST] = false;
        $params[CURLOPT_POSTFIELDS] = $postfields;
        curl_setopt_array($ch, $params); //传入curl参数
        $content = curl_exec($ch); //执行
        curl_close($ch); //关闭连接
        return $content;
    }

}