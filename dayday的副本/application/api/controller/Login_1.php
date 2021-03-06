<?php
namespace app\api\controller;
use lib\Easemob;
use lib\Upload;
use think\Controller;
use think\View;
use think\Db;
use opensearch;
use \think\Session;
use \think\Request;
use WeChat\Jssdk;

class Login_1 extends Common
{
    private $cdkey = "";
    private $password = "";
    protected $system = array();
    public function _initialize()
    {
        $this->system = Db::name('system')->where(['id'=>'1'])->find();
        parent::_initialize(); // TODO: Change the autogenerated stub
    }


    /**
     * @助通短信发送
     */
    protected  function zhutong_sendSMS($content,$mobile){
        //$url 		= "http://api.zthysms.com/sendSms.do";//提交地址
        $url 		= "http://www.ztsms.cn/sendNSms.do123";//提交地址
        $username 	= "ZATest1";//用户名
        $password 	= "Zhengan888";//原密码
        // 初始化
        vendor('zhutong.zhutong');
        $data = array(
            'content' 	=> $content,//短信内容
            'mobile' 	=> $mobile,//手机号码
            'productid' => '676767',//产品id
            'xh'		=> ''//小号
        );
        $sendAPI = new \sendAPI($url, $username, $password);
        $sendAPI->data = $data;//初始化数据包
        $return = $sendAPI->sendSMS('POST');//GET or POST
        return $return;
    }

    public function sendSMS1(){
        $params = Request::instance()->request();
        $mobile = $params["mobile"];
        if (empty($mobile) || !preg_match('#^13[\d]{9}$|14^[0-9]\d{8}|^15[0-9]\d{8}$|^18[0-9]\d{8}|^17[0-9]\d{8}$#', $mobile)) {
            error("手机格式不正确");
        }else{
            $re = $this->get_ym($mobile);
            $res = $this->object_array($re);
            if($res['status']=='200'){
                success('发送成功');
            }else{
                error('发送失败');
            }
        }

    }

    public function get_ym($mobile){
        $api_url = 'https://www.ttzxh.com//index.php?ctl=Api_Publicjing&met=curl_sendmobile_code&typ=json';
        $post_data =array(
            'mobile' => $mobile,
        );
        $json_data = json_encode($post_data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        $output = curl_exec($ch);
        $json_encode = json_decode($output);
        return ($json_encode);
        /*
         * DO SOMETHING
         */
        curl_close($ch);
    }

    public function yz_ym(){
        $params = Request::instance()->request();
        $mobile = $params["mobile"];
        $ym = $params['code'];
        $re = $this->zhu_yz_ym($mobile,$ym);
//        $res = $this->object_array($re);
//        if($res['status']=='200'){
        $a = '200';
        if($a=='200'){
            success('验证成功');
        }else{
            error('验证失败');
        }
    }

    public function zhu_yz_ym($mobile,$ym){
        $api_url = 'https://www.ttzxh.com//index.php?ctl=Api_Publicjing&met=curl_validate_mobilecode&typ=json';
        $post_data =array(
            'mobile' => $mobile,
            'code' => $ym,
        );
        $json_data = json_encode($post_data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        $output = curl_exec($ch);
        if(curl_exec($ch) === false)
        {
            echo 'Curl error: ' . curl_error($ch);
        }
        else
        {
            $json_encode = json_decode($output);
            return ($json_encode);
            /*
             * DO SOMETHING
             */
        }
        curl_close($ch);
    }

    /**
     *
     * 数据转换 stdClass Object转array
     * @access public
     */
    public function object_array($array) {
        if(is_object($array)) {
            $array = (array)$array;
        }
        if(is_array($array)) {
            foreach($array as $key=>$value) {
                $array[$key] =self::object_array($value);
            }
        }
        return $array;
    }
    /**
     * 发送验证码
     */
    public function sendSMS($mobile=""){
        $params = Request::instance()->request();
        $mobile = $params["mobile"];
        if(!empty($params["state"])){
            switch ($params["state"]){
                case 1: $openid= "wx_openid";break;
                case 2:$openid = "qq_openid";break;
                case 3:$openid = "wo_openid";break;
            }
            $m_res = DB::name("Member")->where(["phone"=>$mobile])->value($openid);
            if($m_res){
                error("该手机已被其他账号绑定");
            }
        }
        if(!empty($params['type'])){
            $member = DB::name("Member")->where(['phone'=>$mobile])->find();
            if($member){
                error("该手机已注册不能绑定");
            }
        }

        if (empty($mobile) || !preg_match('#^13[\d]{9}$|14^[0-9]\d{8}|^15[0-9]\d{8}$|^18[0-9]\d{8}|^17[0-9]\d{8}$#', $mobile)) {
            error("手机格式不正确");
        }else{
            //一分钟只能发送一条
            $intime = DB::name("Mobile_sms")->field(["intime"])->where(["mobile"=>$mobile])->order('intime desc')->find();;
            $mistiming = time()-intval($intime["intime"]);
            if($mistiming<60){
                error("一分钟只能发送一条短信");
            }
            //每天只能发送10条
            $send_count = DB::name("mobile_sms")->where(["mobile"=>$mobile,"date"=>date("Y-m-d")])->count();
            if($send_count>10) {
                error("今天短信发送数量已达上限");
            }

            $mobile_code = random(6, 1);
            $content = "您的验证码为".$mobile_code.",如非本人操作请忽略此消息。【百台云】";
        }
        $gateway = $this->zhutong_sendSMS($content,$mobile);
        $arr = explode(',',$gateway);
        //$result = substr($gateway,0,2);
        switch ($arr['0']){
            case 1:
                $data['mobile'] = $mobile;
                $data['code'] = $mobile_code;
                $data['state'] = 1;
                $data['date'] = date('Y-m-d',time());
                $data['intime'] = time();
                Db::name("Mobile_sms")->insert($data);
                success('验证码发送成功');
                break;
            case 12:
                error('提交号码错误!');
                break;
            case 13:
                error('短信内容为空!');
                break;
            case 17:
                error('一分钟内一个手机号只能发两次!');
                break;
            case 19:
                error('号码为黑号!');
                break;
            case 26:
                error('一小时内只能发五条!');
                break;
            case 27:
                error('一天一手机号只能发20条');
                break;
            default:
                error('发送失败!');
        }
    }
    /**
     * 注册和登录
     */
    public function message_login(){
        $param = Request::instance()->request();
        $state = $param['state'];
        $log = empty($param["log"]) ? '116.42669': $param["log"];
        $lag = empty($param["lag"]) ? '39.917149': $param["lag"];
        if(empty($param["mobile"]) || !(preg_match("/^1[34578]{1}\d{9}$/",$param["mobile"])) || empty($param["yzm"])){
            error("验证不正确");
        }
        $mobile = $param["mobile"];
        $tv_id = $param['tv_id'];
        //获取默认验证码
        $default_verify = DB::name("system")->where(["id"=>1])->value("default_verify");
        //判断验证码是否有效期
        if($param['yzm'] != $default_verify) {
            $result = DB::name("Mobile_sms")->where(["mobile" => $mobile, "code" => $param["yzm"]])->order("intime desc")->find();
            if (!$result) {
                error("验证码不正确");
            }
            $state = $result["state"];
            $valid_time = time() - intval($result["intime"]);
            if ($valid_time > 600 || $state == 2) {
                error("验证码已失效,请重新发送");
            }
        }
        /**
         * 用户定位
         */
        if($log && $lag){
            $gwd = $lag.','.$log;
            $baidu_apikey =DB::name('system')->where(['id'=>'1'])->value('baidu_apikey');
            $file_contents = file_get_contents('http://api.map.baidu.com/geocoder/v2/?ak='.$baidu_apikey.'&location='.$gwd.'&output=json');
            $rs = json_decode($file_contents,true);
        }
        $re = DB::name("anchor")->where(["anchor_phone"=>$mobile])->find();
        if($re){
            $state = '1';
        }else{
            $state = '2';
        }
        if($state =='1'){
            $user = DB::name("anchor")->where(["anchor_phone"=>$mobile])->find();
            $user['type'] ='1';
            $user['phone'] = $user['anchor_phone'];
        }else{
            $user = DB::name("control")->where(["control_phone"=>$mobile])->find();
            $user['type'] ='2';
            $user['phone'] = $user['control_phone'];
        }

        if($user){
            //用户存在的时候
            if($user['is_del']==1){
                error('账号被限制,请联系平台!');
            }else{
                $member_token = uniqid();
                $user["app_token"] = $member_token;
                $user["img"] = $user["user_img"];
                DB::name("member")->where(["member_id"=>$user["merchants_id"]])->update(["app_token"=>$member_token,'log'=>$log,'lag'=>$lag]);
                DB::name("mobile_sms")->where(["mobile_sms_id"=>$result['mobile_sms_id']])->update(["state"=>2]);
                success($user);
            }
        }
    }

    public function test_faker(){
        $param = Request::instance()->request();
        $account = $param('account');
        $password = $param('password');
        pre($account);die;
        $re = DB::name("anchor")->where(['account'=>$account,'password'=>$password,'is_shenhe'=>['in','2,4']])->find();
        pre($re);die;
       

    }

    public function getjssdk()
    {
        $url = input('url');
        $url = urldecode($url);
        $jssdk = new Jssdk($this->system['appid'], $this->system['appsecret']);
        $signPackage = $jssdk->GetSignPackage($url);
        success($signPackage);
    }

    /**
     *图片上传
     * @dirname //头像上传路径
     */
    public function upload(){
        $up = new Upload();
        $up->upload('touxiang');
    }

    public function upload_img(){
        $up = new Upload();
        $up->upload_img('touxiang');
    }

    public function edit_huanxin(){
        $count = Db::name('Member')->where(['hx_username'=>['eq','']])->count();
        $number = ceil($count / 50);
        for ($a = 0; $a < $number; $a++) {
            $user = Db::name('Member')->where(['hx_username'=>['eq','']])->limit($a * 50, 50)->select();
            foreach ($user as $k => $v) {
                $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
                for ($i = 0, $str = '', $lc = strlen($chars) - 1; $i < 12; $i++) {
                    $str .= $chars[mt_rand(0, $lc)];
                }
                for ($i = 0, $str1 = '', $lc = strlen($chars) - 1; $i < 13; $i++) {
                    $str1 .= $chars[mt_rand(0, $lc)];
                }
                $hx_password = "123456";
                $data['hx_password'] = $hx_password;
                $data['hx_username'] = $str;
                $data['alias'] = $str;
                $hx = new Easemob();
                $result = $hx->huanxin_zhuce($str,$hx_password); //环信注册
                if ($result) {
                    $result = Db::name('Member')->where(['member_id' => $v['member_id']])->update($data);
                }else{
                    error("错误");
                    die;
                }
            }
        }
    }
}
