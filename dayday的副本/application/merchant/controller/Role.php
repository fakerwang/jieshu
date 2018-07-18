<?php
/**
 * Created by PhpStorm.
 * User: lx
 * Date: 2018/3/7
 * Time: 下午4:44
 */
namespace app\merchant\controller;
use think\Auth;
use think\captcha\Captcha;
use think\Controller;
use think\Request;
use think\Session;
use think\Db;
use think\Paginator;
use think\Validate;
use lib\Easemob;
class Role extends Base{
    /**
     * 主播列表
     */
    public function index(){
        $merchant = $this->merchant;
        $map=[];
        $map['merchants_id'] = $merchant['gl_merchants_id'];
        !empty($_GET['username']) && $map['anchor_name|anchor_phone'] = ['like','%'.input('username').'%'];
        $map['is_del'] = 0;
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        $map['type'] = '0';
        $count = DB::name("anchor")
            ->where($map)
            ->count();
        $count1 = Db::name('anchor')->where(['is_del'=>'0','is_shenhe'=>'4','type'=>'0','merchants_id'=>$merchant['gl_merchants_id']])->count();
        $this->assign("count",$count);
        $this->assign(["count1"=>$count1]);
        $list = DB::name("anchor")
            ->field("anchor_name,is_shenhe,nick_name,user_img,anchor_id,anchor_phone,card,create_time,jin_type")
            ->where($map)
            ->paginate($num,false,['query' => request()->param()]);
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        $this->assign("list",$list);
        return $this->fetch();
    }
    /**
     *添加主播
     */
    public function add_anchor(){
        $merchant = $this->merchant;
        if(Request::instance()->isAjax()){
            $params = Request::instance()->param();
            $rule = [
                'nick_name'	=> 'require',
                'anchor_name'              => 'require',
                'anchor_phone'      => 'require|number|length:11',
                'card'       =>'require|length:18',
                'zi_title'	=> 'require',
                'anchor_desc'	=> 'require',
                'user_img'	=> 'require',
                'user_img2'	=> 'require',
            ];
            $message = [
                'nick_name.require'	=> '请填写主播名',
                'anchor_name.require'                              => '请输入身份证上的姓名',
                'anchor_phone.require'      => '联系方式必须填写',
                'anchor_phone.number'      => '联系方式必须是数字',
                'anchor_phone.length'      => '联系方式长度为11位',
                'card.require'                             =>"身份证号必须填写",
                'card.length'                             =>"身份证号必须是18位",
                'zi_title.require'	=> '请填写资质名称',
				'anchor_desc.require'	=> '请填写主播介绍',
				'user_img.require'	=> '请上传主播头像',
				'user_img2.require'	=> '资质最少一张',
            ];
            $validate = new Validate($rule,$message);
            $result   = $validate->check($params);
            if(!$result){
                error($validate->getError());
            }
            $domain = config("domain");
            $chars = "abcdefghijklmnopqrstuvwxyz123456789";
            mt_srand(10000000*(double)microtime());
            for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < 12; $i++){
                $str .= $chars[mt_rand(0, $lc)];

            }
            $hx_password="123456";
            $hx = new Easemob();
            $result = $hx->huanxin_zhuce($str,$hx_password); //环信注册
            if(!$result){
                error("授权注册失败");
            }
            $params['hx_username'] = $str;
            $params['hx_password'] = $hx_password;
            $this->judge_img($params['user_img']);
            $this->judge_img($params['user_img2']);
            $params['user_img'] = $domain.$params['user_img'];
            $params['user_img2'] = $domain.$params['user_img2'];
            if($params['user_img3']!==''){
                $this->judge_img($params['user_img3']);
                $params['user_img3'] = $domain.$params['user_img3'];
            }else{
                $params['user_img3'] = '';
            }
            if($params['user_img4']!==''){
                $this->judge_img($params['user_img4']);
                $params['user_img4'] = $domain.$params['user_img4'];
            }else{
                $params['user_img4'] = '';
            }
            if($params['user_img5']!==''){
                $this->judge_img($params['user_img5']);
                $params['user_img5'] = $domain.$params['user_img5'];
            }else{
                $params['user_img5'] = '';
            }
            $params['create_time'] = time();
            $params['merchants_id'] = $merchant['gl_merchants_id'];
            $params['type'] = '0';
            $re = Db::name('anchor')->where(['anchor_phone'=>$params['anchor_phone']])->find();
            if(!$re){
                $res = Db::name('anchor')->insert($params);
            }else{
                return error('号码已存在');
            }
            $url = Session::get('url');
            if ($res) {
                return success(['info' => '操作成功', 'url' => $url]);
            } else {
                return error('操作失败');
            }
        }else{
            $list = Db::name('anchor')->select();
            $this->assign(['res'=>$list]);
            return $this->fetch();
        }
    }
    /**
     *修改主播
     */
    public function edit_anchor(){
        $anchor_id = input("anchor_id");
        if(Request::instance()->isAjax()){
            $params = Request::instance()->param();
            $rule = [
                'anchor_name'              => 'require',
                'anchor_phone'      => 'require|number|length:11',
                'card'       =>'require|length:18',
                'zi_title'	=> 'require',
                'anchor_desc'	=> 'require',
                'nick_name'	=> 'require',
                'user_img'	=> 'require',
                'user_img2'	=> 'require',
            ];
            $message = [
                'anchor_name.require'                              => '请输入身份证上的姓名',
                'anchor_phone.require'      => '联系方式必须填写',
                'anchor_phone.number'      => '联系方式必须是数字',
                'anchor_phone.length'      => '联系方式长度为11位',
                'card.require'                             =>"身份证号必须填写",
                'card.length'                             =>"身份证号必须是18位",
                'zi_title.require'	=> '请填写资质名称',
                'anchor_desc.require'	=> '请填写主播介绍',
                'nick_name.require'	=> '请填写主播名',
                'user_img.require'	=> '请上传主播头像',
                'user_img2.require'	=> '资质最少一张',
            ];
            $validate = new Validate($rule,$message);
            $result   = $validate->check($params);
            if(!$result){
                error($validate->getError());
            }
            $domain = config("domain");
            $this->judge_img($params['user_img']);
            $this->judge_img($params['user_img2']);
            if($params['user_img3']!==''){
                $this->judge_img($params['user_img3']);
                $params['user_img3'] = $domain.$params['user_img3'];
            }else{
                $params['user_img3'] = '';
            }
            if($params['user_img4']!==''){
                $this->judge_img($params['user_img4']);
                $params['user_img4'] = $domain.$params['user_img4'];
            }else{
                $params['user_img4'] = '';
            }
            if($params['user_img5']!==''){
                $this->judge_img($params['user_img5']);
                $params['user_img5'] = $domain.$params['user_img5'];
            }else{
                $params['user_img5'] = '';
            }
            $params['is_shenhe'] ='1';

            $params['update_time'] = time();
            $res = Db::name('anchor')->where(['anchor_id'=>$anchor_id])->update($params);
            $url = Session::get('url');
            if ($res) {
                return success(['info' => '操作成功', 'url' => $url]);
            } else {
                return error('操作失败');
            }

        }else{
            $list = Db::name('anchor')->where(['anchor_id'=>$anchor_id])->find();
            $this->assign(['re'=>$list]);
            return $this->fetch();
        }
    }

    /**
     * 添加账号密码
     */
    public function update_anchor(){
        $anchor_id = input('anchor_id');
        if(Request::instance()->isAjax()){
            $params = Request::instance()->param();
            $rule = [
                'account'                   => 'require',
                'password'                  => 'require',
            ];
            $message = [
                'account.require'           => '账号必须是字母或数字',
                'password.require'          => '密码必须填写',
            ];
            $validate = new Validate($rule,$message);
            $result   = $validate->check($params);
            if(!$result){
                error($validate->getError());
            }
            $control = Db::name('anchor')->where(['account'=>$params['account']])->find();
            $account2 = Db::name('control')->where(['control_account'=>$params['account']])->find();
            if($control || $account2){
               error('账号重复');
            }else{
                $data['account'] = $params['account'];
                $data['password'] = $params['password'];
                $result = Db::name('anchor')->where(['anchor_id'=>$anchor_id])->update($data);
                if ($result) {
                    return success(['info' => '操作成功']);
                } else {
                    return error('操作失败');
                }
            }

        }else{
            $data = Db::name('anchor')->field("anchor_id,anchor_name")->where(['anchor_id'=>$anchor_id])->find();
            $re = Db::name('anchor')->where(['anchor_id'=>$anchor_id])->find();
            $this->assign(['data'=>$data,'re'=>$re]);
            return $this->fetch();

        }

    }

    /**
     *@改变状态
     */
    public function change_anchor_review(){
        if(Request::instance()->isAjax()){
            $id = input('id');
            $status = Db::name('anchor')->where(['anchor_id'=>$id])->value('jin_type');
            $abs = 3 - $status;
            $arr = [];
            $result = Db::name('anchor')->where(['anchor_id'=>$id])->update(['jin_type'=>$abs]);
            if($result){
                return success($arr[3-$status]);
            }else{
                return error('切换状态失败');
            }
        }
    }
    /**
     * @删除主播
     */
    public function del_anchor(){
        $id = input('ids');
        $data['anchor_id'] = ['in',$id];
        $user = DB::name('Anchor')->where($data)->update(['is_del'=>1]);
        if($user){
            echo json_encode(['status'=>"ok",'info'=>'删除记录成功!','url'=>session('url')]);
        }else{
            echo json_encode(['status'=>"error",'info'=>'删除记录失败!']);
        }
    }

    /**
     * 场控列表
     */
    public function control_list(){
        $merchant = $this->merchant;
        $map=[];
        $map['a.merchants_id'] = $merchant['gl_merchants_id'];
        !empty($_GET['username']) && $map['a.anchor_phone'] = ['like','%'.input('username').'%'];
        $map['a.is_del'] = 0;
        $map['a.type'] = 2;
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        $count = DB::name("anchor")->alias('a')
            ->where($map)
            ->count();
        $count1 = Db::name('anchor')->alias('a')
            ->where(['a.is_del'=>'0','a.type'=>'2','a.merchants_id'=>$merchant['gl_merchants_id']])->count();
        $this->assign("count",$count);
        $this->assign(["count1"=>$count1]);
        $list = DB::name("anchor")->alias('a')
            ->field("a.anchor_phone,a.anchor_name,a.type,a.anchor_id,a.create_time,a.status")
            ->where($map)
            ->paginate($num,false,['query' => request()->param()]);
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        $this->assign("list",$list);
        return $this->fetch();
    }

     /**
      *添加场控
      */
     public function add_control(){
         $merchant = $this->merchant;
         if(Request::instance()->isAjax()){
             $params = Request::instance()->param();
             $rule = [
                 'anchor_phone'      => 'require|number|length:11',
                 'anchor_name'       =>'require',
                 'account'       =>'require',
                 'password'       =>'require',
             ];
             $message = [
                 'anchor_phone.require'      => '联系方式必须填写',
                 'anchor_phone.number'      => '联系方式必须是数字',
                 'anchor_phone.length'      => '联系方式长度为11位',
                 'anchor_name.require'       =>'场控名必须填写',
                 'account.require'       =>'场控账号必须填写',
                 'password.require'       =>'场控密码必须填写',

             ];
             $validate = new Validate($rule,$message);
             $result   = $validate->check($params);
             if(!$result){
                 error($validate->getError());
             }
             $domain = config("domain");
             $chars = "abcdefghijklmnopqrstuvwxyz123456789";
             mt_srand(10000000*(double)microtime());
             for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < 12; $i++){
                 $str .= $chars[mt_rand(0, $lc)];

             }
             $hx_password="123456";
             $hx = new Easemob();
             $result = $hx->huanxin_zhuce($str,$hx_password); //环信注册
             if(!$result){
                 error("授权注册失败");
             }
             $data['anchor_phone'] = $params['anchor_phone'];
             $data['anchor_name'] = $params['anchor_name'];
             $data['nick_name'] = $params['nick_name'];
             $data['user_img'] = $domain.$params['user_img'];
             $data['account'] = $params['account'];
             $data['password'] = $params['password'];
             $data['hx_username'] = $str;
             $data['hx_password'] = $hx_password;
             $data['create_time'] = time();
             $data['merchants_id'] = $merchant['gl_merchants_id'];
             $data['type'] = '2';
             $re1 = Db::name('anchor')->where(['anchor_phone'=>$params['anchor_phone']])->find();
             $account1 = Db::name('anchor')->where(['account'=>$params['account']])->find();
             if($account1){
                    error('账号名重复');
             }else{
                 if(!$re1){
                     $res = Db::name('anchor')->insert($data);
                     $url = Session::get('url');
                     if ($res) {
                         return success(['info' => '操作成功', 'url' => $url]);
                     } else {
                         return error('操作失败');
                     }
                 }else{
                     success('你已添加场控');
                 }
             }


         }else{
             $list = Db::name('anchor')->select();
             $re = Db::name('apply')->select();
             $this->assign(['res'=>$list,'re'=>$re]);
             return $this->fetch();
         }
     }

     /**
      *修改场控
      */
     public function edit_control(){
         $anchor_id = input("anchor_id");
         if(Request::instance()->isAjax()){
             $params = Request::instance()->param();
             $rule = [
                 'anchor_phone'      => 'require|number|length:11',
                 'anchor_name'       =>'require',
                 'account'       =>'require',
                 'password'       =>'require',
             ];
             $message = [
                 'anchor_phone.require'      => '联系方式必须填写',
                 'anchor_phone.number'      => '联系方式必须是数字',
                 'anchor_phone.length'      => '联系方式长度为11位',
                 'anchor_name.require'       =>'场控名必须填写',
                 'account.require'       =>'场控账号必须填写',
                 'password.require'       =>'场控密码必须填写',

             ];
             $validate = new Validate($rule,$message);
             $result   = $validate->check($params);
             if(!$result){
                 error($validate->getError());
             }
             $data['anchor_phone'] = $params['anchor_phone'];
             $data['anchor_name'] = $params['anchor_name'];
             $data['account'] = $params['account'];
             $data['password'] = $params['password'];
             $data['update_time'] = time();
             $account1 = Db::name('anchor')->where(['account'=>$params['account']])->find();
             if($account1){
                 error('账号名重复');
             }else{
                 $res = Db::name('anchor')->where(['anchor_id'=>$anchor_id])->update($data);
                 $url = Session::get('url');
                 if ($res) {
                     return success(['info' => '操作成功', 'url' => $url]);
                 } else {
                     return error('操作失败');
                 }

             }
         }else{
             $list = Db::name('anchor')->where(['anchor_id'=>$anchor_id])->find();
             $this->assign(['re'=>$list]);
             return $this->fetch();
         }
     }

     /**
      * @删除场控
      */
     public function del_control(){
         $id = input('ids');
         $data['anchor_id'] = ['in',$id];
         $user = DB::name('anchor')->where($data)->update(['is_del'=>1]);
         if($user){
             echo json_encode(['status'=>"ok",'info'=>'删除记录成功!','url'=>session('url')]);
         }else{
             echo json_encode(['status'=>"error",'info'=>'删除记录失败!']);
         }
     }


    /**
     * 主播列表
     */
    public function auctioneer(){
        $merchant = $this->merchant;
        $map=[];
        $map['merchants_id'] = $merchant['gl_merchants_id'];
        !empty($_GET['username']) && $map['anchor_name|anchor_phone'] = ['like','%'.input('username').'%'];
        $map['is_del'] = 0;
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        $map['type'] = '1';
        $count = DB::name("anchor")
            ->where($map)
            ->count();
        $count1 = Db::name('anchor')->where(['is_del'=>'0','is_shenhe'=>'4','status'=>'1','merchants_id'=>$merchant['gl_merchants_id']])->count();
        $this->assign("count",$count);
        $this->assign(["count1"=>$count1]);
        $list = DB::name("anchor")
            ->field("anchor_name,is_shenhe,nick_name,user_img,anchor_id,anchor_phone,card,create_time")
            ->where($map)
            ->paginate($num,false,['query' => request()->param()]);
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        $this->assign("list",$list);
        return $this->fetch();
    }
    /**
     *添加拍卖
     */
    public function add_auctioneer(){
        $merchant = $this->merchant;
        if(Request::instance()->isAjax()){
            $params = Request::instance()->param();
            $rule = [
                'nick_name'	=> 'require',
                'anchor_name'              => 'require',
                'anchor_phone'      => 'require|number|length:11',
                'card'       =>'require|length:18',
                'zi_title'	=> 'require',
                'anchor_desc'	=> 'require',
                'user_img'	=> 'require',
                'user_img2'	=> 'require',
            ];
            $message = [
                'nick_name'	=> '请填写拍卖师名',
                'anchor_name.require'                              => '请输入身份证上的姓名',
                'anchor_phone.require'      => '联系方式必须填写',
                'anchor_phone.number'      => '联系方式必须是数字',
                'anchor_phone.length'      => '联系方式长度为11位',
                'card.require'                             =>"身份证号必须填写",
                'card.length'                             =>"身份证号必须是18位",
                'zi_title.require'	=> '请填写资质名称',
                'anchor_desc'	=> '请填写拍卖师介绍',
                'user_img'	=> '请上传拍卖师头像',
                'user_img2'	=> '资质最少一张',
            ];
            $validate = new Validate($rule,$message);
            $result   = $validate->check($params);
            if(!$result){
                error($validate->getError());
            }
            $domain = config("domain");
            $chars = "abcdefghijklmnopqrstuvwxyz123456789";
            mt_srand(10000000*(double)microtime());
            for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < 12; $i++){
                $str .= $chars[mt_rand(0, $lc)];

            }
            $hx_password="123456";
            $hx = new Easemob();
            $result = $hx->huanxin_zhuce($str,$hx_password); //环信注册
            if(!$result){
                error("授权注册失败");
            }
            $params['hx_username'] = $str;
            $params['hx_password'] = $hx_password;
            $this->judge_img($params['user_img']);
            $this->judge_img($params['user_img2']);
            $this->judge_img($params['user_img3']);
            $this->judge_img($params['user_img4']);
            $this->judge_img($params['user_img5']);
            $params['user_img'] = $domain.$params['user_img'];
            $params['user_img2'] = $domain.$params['user_img2'];
            if($params['user_img3']!==''){
                $this->judge_img($params['user_img3']);
                $params['user_img3'] = $domain.$params['user_img3'];
            }else{
                $params['user_img3'] = '';
            }
            if($params['user_img4']!==''){
                $this->judge_img($params['user_img4']);
                $params['user_img4'] = $domain.$params['user_img4'];
            }else{
                $params['user_img4'] = '';
            }
            if($params['user_img5']!==''){
                $this->judge_img($params['user_img5']);
                $params['user_img5'] = $domain.$params['user_img5'];
            }else{
                $params['user_img5'] = '';
            }
//            $params['user_img3'] = $domain.$params['user_img3'];
//            $params['user_img4'] = $domain.$params['user_img4'];
//            $params['user_img5'] = $domain.$params['user_img5'];
            $params['create_time'] = time();
            $params['merchants_id'] = $merchant['gl_merchants_id'];
            $params['type'] = '1';
            $re = Db::name('anchor')->where(['anchor_phone'=>$params['anchor_phone']])->find();
            if(!$re){
                $res = Db::name('anchor')->insert($params);
            }else{
                return error('拍卖师已存在');
            }
            $url = Session::get('url');
            if ($res) {
                return success(['info' => '操作成功', 'url' => $url]);
            } else {
                return error('操作失败');
            }
        }else{
            $list = Db::name('anchor')->select();
            $this->assign(['res'=>$list]);
            return $this->fetch();
        }
    }
    /**
     *修改拍卖
     */
    public function edit_auctioneer(){
        $anchor_id = input("anchor_id");
        if(Request::instance()->isAjax()){
            $params = Request::instance()->param();
            $rule = [
                'anchor_name'              => 'require',
                'anchor_phone'      => 'require|number|length:11',
                'card'       =>'require|length:18',
                'zi_title'	=> 'require',
                'anchor_desc'	=> 'require',
                'nick_name'	=> 'require',
                'user_img'	=> 'require',
                'user_img2'	=> 'require',
            ];
            $message = [
                'contact_name.require'                              => '请输入身份证上的姓名',
                'anchor_phone.require'      => '联系方式必须填写',
                'anchor_phone.number'      => '联系方式必须是数字',
                'anchor_phone.length'      => '联系方式长度为11位',
                'card.require'                             =>"身份证号必须填写",
                'card.length'                             =>"身份证号必须是18位",
                'zi_title.require'	=> '请填写资质名称',
                'anchor_desc'	=> '请填写拍卖师介绍',
                'nick_name'	=> '请填写拍卖师',
                'user_img'	=> '请上传拍卖师头像',
                'user_img2'	=> '资质最少一张',
            ];
            $validate = new Validate($rule,$message);
            $result   = $validate->check($params);
            if(!$result){
                error($validate->getError());
            }
            $domain = config("domain");
            $this->judge_img($params['user_img']);
            $this->judge_img($params['user_img2']);
            if($params['user_img3']!==''){
                $this->judge_img($params['user_img3']);
                $params['user_img3'] = $domain.$params['user_img3'];
            }else{
                $params['user_img3'] = '';
            }
            if($params['user_img4']!==''){
                $this->judge_img($params['user_img4']);
                $params['user_img4'] = $domain.$params['user_img4'];
            }else{
                $params['user_img4'] = '';
            }
            if($params['user_img5']!==''){
                $this->judge_img($params['user_img5']);
                $params['user_img5'] = $domain.$params['user_img5'];
            }else{
                $params['user_img5'] = '';
            }
            $params['is_shenhe']='1';
            $params['update_time'] = time();
                $res = Db::name('anchor')->where(['anchor_id'=>$anchor_id])->update($params);
                $url = Session::get('url');
                if ($res) {
                    return success(['info' => '操作成功', 'url' => $url]);
                } else {
                    return error('操作失败');
                }

        }else{
            $list = Db::name('anchor')->where(['anchor_id'=>$anchor_id])->find();
            $this->assign(['re'=>$list]);
            return $this->fetch();
        }
    }

    /**
     * @删除拍卖
     */
    public function del_auctioneer(){
        $id = input('ids');
        $data['anchor_id'] = ['in',$id];
        $user = DB::name('Anchor')->where($data)->update(['is_del'=>1]);
        if($user){
            echo json_encode(['status'=>"ok",'info'=>'删除记录成功!','url'=>session('url')]);
        }else{
            echo json_encode(['status'=>"error",'info'=>'删除记录失败!']);
        }
    }


    /**
     * @活动详情
     */
    public function anchor_view(){
        $merchant = $this->merchant;
        $mid    =   input('mid');
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        $map['d.anchor_id']   =  $mid;
        $map['a.merchants_id']   =  $merchant['gl_merchants_id'];
        $list = Db::name('Apply')->alias("a")
            ->field("a.*,c.title as tag,d.anchor_name,e.share,e.watch_nums")
            ->join("home_class c",'a.status=c.id')
            ->join("anchor d",'a.zhu_phone=d.anchor_phone')
            ->join("live e","a.room_id = e.room_id")
            ->where($map)
            ->order("a.apply_id desc")
            ->paginate($num,false,['query' => request()->param()]);
        $list->toArray();
        foreach ($list as $k=>$v){
            if($v['goods_id_num']=='' || $v['goods_id_num']=='null'){
                $v['goods_id_num'] = '0';
            }
            $data = array();
            $data = $v;
            $list->offsetSet($k,$data);
        }
        $res = Db::name('anchor')->where(['anchor_id'=>$mid])->find();
        $this->assign(['list'=>$list,'re'=>$res]);
        return $this->fetch();
    }

    /**
     * @活动详情
     */
    public function auctioneer_view(){
        $merchant = $this->merchant;
        $mid    =   input('mid');
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        $map['d.anchor_id']   =  $mid;
        $map['a.merchants_id']   =  $merchant['gl_merchants_id'];
        $list = Db::name('Apply')->alias("a")
            ->field("a.*,c.title as tag,d.anchor_name,e.share,e.watch_nums")
            ->join("home_class c",'a.status=c.id')
            ->join("anchor d",'a.zhu_phone=d.anchor_phone')
            ->join("live e","a.room_id = e.room_id")
            ->where($map)
            ->order("a.apply_id desc")
            ->paginate($num,false,['query' => request()->param()]);
        $res = Db::name('anchor')->where(['anchor_id'=>$mid])->find();
        $this->assign(['list'=>$list,'re'=>$res]);
        return $this->fetch();
    }



}