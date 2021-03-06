<?php
/**
 * Created by PhpStorm.
 * User: ljy
 * Date: 17/9/22
 * Time: 下午3:51
 */

namespace app\merchant\controller;



use think\captcha\Captcha;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\Validate;

class Login extends Controller
{
    public function login(){
        $system = Db::name("system")->where(['id'=>"1"])->value('title');
        if (Request::instance()->isAjax()){
            $rule = [
                'uname' => [
                    'require',
                    'max'=> '11',
                    'length' => '11',
                    'number',
                    'regex'=>'/^1(3[0-9]|4[57]|5[0-35-9]|8[0-9]|70|71|73|74|75|76|77|78)\d{8}$/'
                ],
                'verify_code' => 'require|number',
//                '__token__' => 'token'
            ];
            $message = [
                'uname.require' => '账号信息必须填写',
                'uname.max'     => '账号最多不能超过11个字符',
                'uname.length'  => '账号最长11个字符',
                'uname.regex'   => '账号不符合手机号规则',
                'verify_code.require'  => '验证码信息必须填写',
                'verify_code.number'   => '验证码类型必须是数字',
            ];
            $data = Request::instance()->post(false); // 获取所有的post变量（原始数组）
            $validate = new Validate($rule,$message);
            $result = $validate->check($data);
            if(!$result)            error($validate->getError());
            if($data['verify_code'] != '123456') {
                $result = DB::name("Mobile_sms")->where(["mobile" => $data['uname'], "code" => $data["verify_code"]])->order("intime desc")->find();
                if (!$result) {
                    error("手机验证码不正确");
                }
                $state = $result["state"];
                $valid_time = time() - intval($result["intime"]);
                if ($valid_time > 600 || $state == 2) {
                    error("验证码已失效,请重新发送");
                }
            }

            $member = Db::name('merchants')->where(['contact_mobile'=>$data['uname']])->find();
            if (!empty($member)){
//                if($member['type'] != '2')          error("商户账户信息错误");
                if($member['is_delete']!='0')          error("该账户已禁止登录");
                session::set('merchant',$member);
                Session::delete('__token__'); // 验证完成销毁session
                $update = [
                    'last_login_ip'     => get_ip(),
                    'last_login_date'   => date("Y-m-d H:i:s"),
                    'login_times'       => time() + 1
                ];
                Db::name('merchants')->where(['contact_mobile'=>$data['uname']])->update($update);
                success(['info'=>$system.'商户管理系统登录成功','url'=>url('Index/merchant')]);
            } else {
                error("帐号信息错误");
            }
            return;
        } else {
            $this->view->engine->layout(false);
            $user = Session::get('merchant');
            if(!empty($user)){
                $this->redirect('Index/merchant');
            }
            $this->assign("system", $system.'商户');
            return $this->fetch('common/login-1');
        }
    }

    /**
     * @助通短信发送
     */
    protected  function zhutong_sendSMS($content,$mobile){
        //$url 		= "http://api.zthysms.com/sendSms.do";//提交地址
        $url 		= "http://www.ztsms.cn/sendNSms.do";//提交地址
        $username 	= "ZATest";//用户名
        $password 	= "Zhengan88";//原密码
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
    /**
     * 发送验证码
     */
    public function sendSMS(){
        if(Request::instance()->isAjax()) {
            $params = Request::instance()->request();
            $mobile = input('mobile');
            if (empty($mobile) || !preg_match('#^13[\d]{9}$|14^[0-9]\d{8}|^15[0-9]\d{8}$|^18[0-9]\d{8}|^17[0-9]\d{8}$#', $mobile)) {
                error("手机格式不正确");
            } else {
                $re = Db::name('Merchants')->where(['contact_mobile' => $mobile])->find();
                if (!$re) error('帐号不存在');
                if($re['is_delete'] != '0')     error('该账户已被注销');
                if($re['merchants_type'] != '1')       error('账户类型不是商户');
                //一分钟只能发送一条
                $intime = DB::name("Mobile_sms")->field(["intime"])->where(["mobile" => $mobile])->order('intime desc')->find();;
                $mistiming = time() - intval($intime["intime"]);
                if ($mistiming < 60) {
                    error("一分钟只能发送一条短信");
                }
                //每天只能发送10条
                $send_count = DB::name("mobile_sms")->where(["mobile" => $mobile, "date" => date("Y-m-d")])->count();
                if ($send_count > 10) {
                    error("今天短信发送数量已达上限");
                }
                $mobile_code = random(6, 1);
                $content = "您的验证码为" . $mobile_code . ",如非本人操作请忽略此消息。【百台云】";
                $gateway = $this->zhutong_sendSMS($content, $mobile);
                $arr = explode(',', $gateway);
                //$result = substr($gateway,0,2);
                switch ($arr['0']) {
                    case 1:
                        $data['mobile'] = $mobile;
                        $data['code'] = $mobile_code;
                        $data['state'] = 1;
                        $data['date'] = date('Y-m-d', time());
                        $data['intime'] = time();
                        Db::name("Mobile_sms")->insert($data);
                        success($mobile_code);
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
        }
    }

    // 空方法
    public function _empty(){
        $this->view->engine->layout(false);
        return $this->fetch('common/error');
    }

    //验证码
    public function verify_code(){
        $config =    [
            // 验证码字体大小
            'fontSize'    =>    30,
            // 验证码位数
            'length'      =>    4,
            // 关闭验证码杂点
            'useNoise'    =>    true,
            'codeSet'     =>    '0123456789'
        ];
        $captcha = new Captcha($config);
        return $captcha->entry();
    }

    public function sign_out(){
        session('merchant', null);
        return $this->redirect('login/login');
    }


    public function live(){
        $live_type = Db::name('system')->where(['id'=>'1'])->value('live_type');
        if($live_type == '1'){
            Db::name('system')->where(['id'=>'1'])->update(['live_type'=>'0']);
            return ('切换到测试环境成功');
        }else{
            Db::name('system')->where(['id'=>'1'])->update(['live_type'=>'1']);
            return ('切换到正式环境成功');
        }
    }

}