<?php
namespace app\admin\controller;
use think\Request;
use think\Db;
use lib\Dbase;
use think\Validate;
class Config extends Base{
    /**
     * @数据库备份
     */
    public function index(){
        if(Request::instance()->isPost()){
            $db_config = config("database");
            $database = $db_config['database'];//数据库名
            $options = array(
                'hostname' => $db_config['hostname'],//ip地址
                'charset'  => $db_config['charset'],//编码
                'filename' =>input('name').'.sql',//文件名
                'username' => $db_config['username'],
                'password' => $db_config['password']      //密码
            );
            mysql_connect($options['hostname'],$options['username'],$options['password'])or die("不能连接数据库!");
            mysql_select_db($database) or die("数据库名称错误!");
            mysql_query("SET NAMES '{$options['charset']}'");
            $db = new Dbase();
            $tables = $db->list_tables($database);
            $filename = sprintf($options['filename'],$database);
            $fp = fopen($filename, 'w');
            foreach ($tables as $table) {
                $db->dump_table($table, $fp);
            }

            fclose($fp);
            $file_name=$options['filename'];
            Header("Content-type:application/octet-stream");
            Header("Content-Disposition:attachment;filename=".$file_name);
            readfile($file_name);
            exit;
        }else{
            return view();
        }
    }
    /**
     * @账号配置（映射）
     */
    public function account(){
        if(Request::instance()->isPost()){
            $data = array(
                "title"          =>  input('title'),
                "appid"          =>  input('appid'),
                "appsecret"      =>  input('appsecret'),
                "apiid"          =>  input('apiid'),
                "secretkey"      =>  input('secretkey'),
                "jg_appkey"      =>  input('jg_appkey'),
                "jg_secret"      =>  input('jg_secret'),
                "hx_client_id"   =>  input('hx_client_id'),
                "hx_secret"      =>  input('hx_secret'),
                "hx_appkey_1"    =>  input('hx_appkey_1'),
                "hx_appkey_2"    =>  input('hx_appkey_2'),
                "convert_scale1"  =>  input('convert_scale1'),
                "convert_scale2"  =>  input('convert_scale2'),
                "convert_scale3"  =>  input('convert_scale3'),
                "convert_scale4"  =>  input('convert_scale4'),
                "default_verify"  =>  input('default_verify'),
                'deposit'          => input('deposit'),
                'change_scale'    =>input("change_scale"),
                'dashang_scale'    =>input("dashang_scale"),
                'sell_scale'    =>input("sell_scale"),
                'tv_sell_scale'    =>input("tv_sell_scale"),
                'spread_scale'    =>input("spread_scale"),
                'spread_scale1' => input('spread_scale1'),

            );
            $result = DB::name('System')->where(['id'=>1])->update($data);
            if ($result) {
                $data= ['status' => "ok", 'info' => '修改账号配置成功!'];
                echo success($data);
                die;
            } else {
                echo error('修改账号配置失败!');
                die;
            }
        }else{
            $system = DB::name('System')->where(array('id'=>1))->find();
            $this->assign('tem',$system);
            return $this->fetch();
        }
    }
    /**
     * @礼物列表
     */
    public function gift_list(){
        $params = Request::instance()->request();
        $p= empty($params["p"]) ? 1 : $params["p"];
        if (empty($num)){
            $num = 10;
        }
        $data = array();
        !empty($_GET['name']) ? $data["name"]=['like','%'.input('name').'%']:'';
        $this->assign('nus',$num);
        $count =DB::name("Gift")->where($data)->count(); // 查询满足要求的总记录数
        $list=DB::name("Gift")->where($data)->order('intime desc')->paginate(10,false,$config = Request::instance()->param());
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        $this->assign('empty','<span class="empty">暂没有没有商家直播</span>');
        $this->assign('list',$list);
        $this->assign ( 'pagetitle', '礼物列表');
        $this->assign('count',$count);
        return view();
    }
    /**
     * @添加礼物
     */
    public function add_gift(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->request();
            return json_encode(model("Gift")->auth($data));
        }else{
            return $this->fetch();
        }
    }
    /**
     * @添加(修改礼物)
     */
    public function edit_gift(){
        $gift_id = input('gift_id');
        if(Request::instance()->isPost()){
            $data = Request::instance()->request();
            $data["gift_id"] = $gift_id;
            return json_encode(model("Gift")->auth($data));
        }else{
            $re = DB::name('Gift')->where(['gift_id'=>$gift_id])->find();
            $this->assign(['re'=>$re,'url'=>session('url')]);
            return $this->fetch('config/add_gift');
        }
    }
    /**
     * @删除礼物
     */
    public function del_gift(){
        $id = input("ids");
        $result = DB::name('Gift')->where('gift_id','in',$id)->delete();
        if($result){
            echo json_encode(array('status'=>'ok','info'=>'删除记录成功','url'=>session('url')));
        }else{
            echo json_encode(array('status'=>'error','info'=>'删除记录失败'));
        }
    }


    /**
     *@银行卡设置
     */
    public function bank_card(){
        $map=[];
        $name = input('name');
        !empty($name) && $map['name'] = ['like','%'.$name.'%'];
        $map['is_delete'] = 0;
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        $this->assign('nus',$num);
        $count = Db::name('Bank')->where($map)->count();
        $data = Db::name("Bank")->where($map)->order('intime desc')->paginate(10,false,$config = Request::instance()->param());
        $page = $data->render();
        $this->assign(['list'=>$data,'page'=>$page,'count'=>$count]);
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        return $this->fetch();
    }

    /**
     *@添加银行信息
     */
    public function add_bank(){
        if(Request::instance()->isAjax()){
            $data = Request::instance()->post();
            $model = model('Bank');
            $result = $model->edit($data);
        }else{
            return $this->fetch();
        }
    }

    /**
     *@编辑银行卡
     */
    public function edit_bank(){
        $id = input('id');
        if(Request::instance()->isAjax()){
            $data = Request::instance()->post();
            $model = model('Bank');
            $result = $model->edit($data);
        }else{
            $re = Db::name('Bank')->where(['bank_id'=>$id])->find();
            $this->assign(['re'=>$re]);
            return $this->fetch('config/add_bank');
        }
    }

    /**
     *@删除银行卡
     */
    public function del_bank(){
        $ids = input('ids');
        $model = model('Bank');
        $result = $model->soft_del($ids);
        if($result){
            success(['info'=>'删除记录成功','url'=>session('url')]);
        }else{
            error('删除记录失败');
        }
    }

    /**
     * @充值列表
     */
    public function price_list(){
        $params = Request::instance()->request();
        $p= empty($params["p"]) ? 1 : $params["p"];
        if (empty($num)){
            $num = 10;
        }
        $data=DB::name("Price_list")->order('intime asc')->paginate($num,false,$config = Request::instance()->param());
        $count = DB::name("Price_list")->count(); // 查询满足要求的总记录数
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        $this->assign('empty','<span class="empty">暂没有没有商家直播</span>');
        $this->assign('list',$data);
        $this->assign(['count'=>$count]);
        return $this->fetch();
    }
    /**
     * @添加礼物
     */
    public function add_price_list(){
        if(Request::instance()->isPost()){
            $params = Request::instance()->param();
            $data["diamond"] = $params["diamond"];
            $data["price"] = $params["price"];
            $validate = validate('PriceList');
            if(!$validate->check($data)){
                success(array('status'=>'ok','info'=>$validate->getError()));
            }
            $data["sign"] = date("YmdH");
            $data["intime"] = time();
            $data["uptime"] =time();
            if(DB::name("Price_list")->insert($data)){
                success(array('status'=>'ok','info'=>'添加成功','url'=>session('url')));
            }else{
                success(array('status'=>'ok','info'=>'添加失败','url'=>session('url')));
            }
        }else{
            return $this->fetch();
        }
    }
    /**
     * @添加(修改充值)
     */
    public function edit_price_list(){
        $id = input('id');
        if(Request::instance()->isPost()){
            $params = Request::instance()->request();
            $data["diamond"] = $params["diamond"];
            $data["price"] = $params["price"];
            $data["zeng"] = $params["zeng"];
            $validate = validate('PriceList');
            if(!$validate->check($data)){
                success($validate->getError());
            }
            $data["uptime"] =time();
            if(DB::name("Price_list")->where("price_list_id",$id)->update($data)){
                success(array('status'=>'ok','info'=>'修改成功','url'=>session('url')));
            }else{
                success(array('status'=>'ok','info'=>'修改失败','url'=>session('url')));
            }
        }else{
            $re = DB::name('PriceList')->where(['price_list_id'=>$id])->find();
            $this->assign(['re'=>$re]);
            return $this->fetch('config/add_price_list');
        }
    }
    /**
     * @删除充值
     */
    public function del_price_list(){
        $id = input('ids');
        $result = DB::name('Price_list')->where('price_list_id','in',$id)->delete();
        if($result){
            echo json_encode(array('status'=>'ok','info'=>'删除记录成功','url'=>session('url')));
        }else{
            echo json_encode(array('status'=>'error','info'=>'删除记录失败'));
        }
    }

    /**
     *@敏感词
     */
    public function sensitive_word(){
        if(Request::instance()->isPost()){
            $word = input('word');
            $result = DB::name('System')->where(['id'=>1])->update(['sensitive_word'=>$word]);
            if($result){
                echo success(array('status'=>'ok','info'=>'编辑记录成功'));
            }else{
                echo success(array('status'=>'error','info'=>'编辑记录失败'));
            }
        }else{
            $word = DB::name('System')->where(['id'=>1])->value('sensitive_word');
            $this->assign(['word'=>$word]);
            return $this->fetch();
        }
    }
    /**
     * 等级管理
     */
    public function grade(){
        $count =  DB::name("level")->count();
        $list = DB::name("level")->order("level asc")->paginate(20,false,$config = Request::instance()->param());
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        $this->assign("list",$list);
        $this->assign("count",$count);
        return $this->fetch();
    }
    /**
     * @删除等级管理
     */
    public function del_grade(){
        $id = input("ids");
        $result = DB::name('level')->where("level_id","in",$id)->delete();
        if($result){
            echo json_encode(array('status'=>'ok','info'=>'删除记录成功','url'=>session('url')));
        }else{
            echo json_encode(array('status'=>'error','info'=>"删除记录失败"));
        }
    }
    /**
     * @添加等级
     */
    public function add_grade(){
        if(Request::instance()->isPost()){
            $params = Request::instance()->request();
            $data["experience"] = $params["experience"];
            $data["level"] = $params["level"];
            $data["intime"] =time();
            if(DB::name("Level")->insert($data)){
                success(array('status'=>'ok','info'=>'添加成功','url'=>session('url')));
            }else{
                success(array('status'=>'ok','info'=>'添加失败','url'=>session('url')));
            }
        }else{
            return $this->fetch();
        }
    }
    /**
     * 用户反馈信息
     */
    public function feedback_list(){
        $map=[];
        $nickname = input('username');
        !empty($nickname) && $map['a.member_phone|a.member_name'] = ['like','%'.$nickname.'%'];
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        $this->assign('nus',$num);
        $count = DB::name('Feedback')->alias('a')
            ->where($map)->count();
        $data = DB::name('Feedback')
            ->alias('a')
            ->field('a.feedback_id,a.content,a.intime,a.member_name,a.member_phone')
            ->order("a.intime desc")
            ->where($map)
            ->paginate($num,false,$config = Request::instance()->param());
        $this->assign(['list'=>$data,'count'=>$count]);
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        return $this->fetch();
    }

    /**
     *反馈详情
     */
    public function feedback_view(){
        $id = input('id');
        $feedback = Db::name('Feedback')->where(['feedback_id'=>$id])->find();
        success($feedback);
    }

    /**
     * 删除反馈
     */
    public function del_feedback(){
        $id = input("ids");
        $result = DB::name('Feedback')->where("feedback_id","in",$id)->delete();
        if($result){
            echo json_encode(array('status'=>'ok','info'=>'删除记录成功','url'=>session('url')));
        }else{
            echo json_encode(array('status'=>'error','info'=>"删除记录失败"));
        }
    }
    /**
     * 直播标签管理
     */
    public function live_class(){
        $count = DB::name("live_class")->where("is_del",1)->count();
        $list= DB::name("live_class")->where("is_del",1)->select();
        $this->assign("count",$count);
        $this->assign("list",$list);
        $url = $_SERVER['REQUEST_URI'];
        session("url",$url);
        return $this->fetch();
    }
    /**
     * 添加直播标签
     */
    public function add_live_tag(){
        if(Request::instance()->isPost()){
            $params = Request::instance()->param();
            $rule = [
                'tag'       =>'require',
                'img'              => 'require',
                'sort'      => 'require',
            ];
            $message = [
                'tag.require'                => '请填写标签名',
                'img.require'            => '请上传标签封面',
                'sort.require'            => '请填写权重',

            ];
            $validate = new Validate($rule,$message);
            $result   = $validate->check($params);
            if(!$result){
                error($validate->getError());
            }
            $this->judge_img($params['img']);
            $params["intime"] = time();
            $res = DB::name("live_class")->insert($params);
            if($res){
                success(array('status'=>'ok','info'=>'添加成功','url'=>session('url')));
            }else{
                success(array('status'=>'ok','info'=>'添加失败','url'=>session('url')));
            }
        }else{
            return $this->fetch();
        }
    }
    /**
     * 编辑直播标签
     */
    public function edit_live_tag(){
        $id = input("id");
        if(Request::instance()->isPost()){
            $params = Request::instance()->param();
            $rule = [
                'tag'       =>'require',
                'img'              => 'require',
                'sort'      => 'require',
            ];
            $message = [
                'tag.require'                => '请填写标签名',
                'img.require'            => '请上传标签封面',
                'sort.require'            => '请填写权重',

            ];
            $validate = new Validate($rule,$message);
            $result   = $validate->check($params);
            if(!$result){
                error($validate->getError());
            }
            $this->judge_img($params['img']);
            $data["tag"] = $params["tag"];
            $data["img"] = $params["img"];
            $data["sort"] = $params["sort"];
            $res = DB::name("live_class")->where("live_class_id",$id)->update($data);
            if($res){
                success(array('status'=>'ok','info'=>'修改成功','url'=>session('url')));
            }else{
                success(array('status'=>'ok','info'=>'修改失败','url'=>session('url')));
            }
        }else{
            $list = DB::name("live_class")->where("live_class_id",$id)->find();
            $this->assign("re",$list);
            return $this->fetch("config/add_live_tag");
        }
    }
    /**
     * 删除标签
     */
    public function del_live_tag(){
        $id = input("ids");
        $result = DB::name('live_class')->where("live_class_id","in",$id)->delete();
//        file_put_contents('23.txt',$result);
        if($result){
            echo json_encode(array('status'=>'ok','info'=>'删除记录成功','url'=>session('url')));
        }else{
            echo json_encode(array('status'=>'error','info'=>"删除记录失败"));
        }
    }
    /**
     * 修改标签权重
     */
    public function edit_sort(){
        $params = Request::instance()->param();
        $data["sort"]= $params["sort"];
        $data["intime"] = time();
        $result = DB::name("live_class")->where("live_class_id",$params["id"])->update($data);
        if($result){
            success(array('status'=>'ok','info'=>"修改成功",'url'=>session('url')));
        }else{
            success(array('status'=>'error','info'=>"修改失败",'url'=>session('url')));
        }
    }
    /**
     * 修改标签权重
     */
    public function edit_gift_sort(){
        $params = Request::instance()->param();
        $data["sort"]= $params["sort"];
        $data["uptime"] = time();
        $result = DB::name("gift")->where("gift_id",$params["id"])->update($data);
        if($result){
            success(array('status'=>'ok','info'=>"修改成功",'url'=>session('url')));
        }else{
            success(array('status'=>'error','info'=>"修改失败",'url'=>session('url')));
        }
    }

    /**
     * @城市
     */
    public function city(){
        $map=[];
        $name = input('name');
        !empty($name) && $map['city|shouzimu'] = ['like','%'.$name.'%'];
        $map['is_delete'] = 0;
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        $this->assign('nus',$num);
        $count = Db::name('city')->where($map)->count();
        $data = Db::name("city")->where($map)->order('shouzimu asc')->paginate($num,false,$config = Request::instance()->param());
        $page = $data->render();
        $this->assign(['list'=>$data,'page'=>$page,'count'=>$count]);
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        return $this->fetch();
    }

    /**
     *@添加城市
     */
    public function add_city(){
        if(Request::instance()->isAjax()){
            $data = Request::instance()->post();
            $obj = model('City');
            $result = $obj->edit($data);
        }else{
            return $this->fetch();
        }
    }

    /**
     *@编辑城市
     */
    public function edit_city(){
        if(Request::instance()->isAjax()){
            $data = Request::instance()->post();
            $obj = model('City');
            $result = $obj->edit($data);
        }else{
            $id = input('id');
            $re = Db::name('city')->where(['id'=>$id])->find();
            $this->assign(['re'=>$re]);
            return  $this->fetch('config/add_city');
        }
    }

    public function del_city(){
        $id = input('ids');
        $obj = model('City');
        $result = $obj->soft_del($id);
        if ($result) {
            return success([ 'info' => '删除记录成功!', 'url' => session('url')]);
        } else {
            return error('删除记录失败!');
        }
    }

    public function clean_cache(){
        function rmdirr($dirname) {

            if (!file_exists($dirname)) {
                return false;
            }

            if (is_file($dirname) || is_link($dirname)) {
                return unlink($dirname);
            }

            $dir = dir($dirname);

            while (false !== $entry = $dir->read()) {

                if ($entry == '.' || $entry == '..') {
                    continue;
                }

                rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
            }

            $dir->close();

            return rmdir($dirname);
        }

        if(isset($_GET['all'])){
            $dirs	=	array('./runtime');
        }else{
//缓存目录
            $dirs	=	array('./runtime');
        }
//清理缓存
        foreach($dirs as $value)
        {
            $result = rmdirr($value);
            if(!$result){
                echo json_encode(array('status'=>'error'));
                die;
            }

            //echo "<div style='border:2px solid green; background:#f1f1f1; padding:20px;margin:20px;width:800px;font-weight:bold;color:green;text-align:center;'><!--\"".$value."\"--> 清除成功! </div> <br /><br />";

            @mkdir($value,0777,true);

        }

        echo json_encode(array('status'=>'ok'));
        die;

    }

    public function app_version_control(){
        $re = Db::name('app_version_control')->where(['id'=>1])->find();
        if(Request::instance()->isAjax()){
            $data['android_merchant_version']   = input('android_merchant_version');
            $data['ios_merchant_version']       = input('ios_merchant_version');
            $data['android_version']       = input('android_version');
            $data['ios_version']       = input('ios_version');
            $data['android_one_path']       = input('android_one_path');
            $data['android_two_path']       = input('android_two_path');
            $data['ios_one_path']       = input('ios_one_path');
            $data['ios_two_path']       = input('ios_two_path');
            $data['ping_path']       = input('ping_path');
            if(!empty($data['android_one_path'])){

                if($data['android_one_path'] != $re['android_one_path']){
                    $data['android_one_img'] = "/qrcode/" . time() . rand(100, 999) . '_android_one_img.png';
                    qrcode($data['android_one_path'],'./'.$data['android_one_img'],8,9);
                    $data['android_one_img'] = $this->domain($data['android_one_img']);
                }
            }

            if(!empty($data['android_two_path'])){
                if($data['android_two_path'] != $re['android_two_path']){
                    $data['android_two_img'] = "/qrcode/" . time() . rand(100, 999) . '_android_two_img.png';
                    qrcode($data['android_two_path'],'./'.$data['android_two_img'],8,9);
                    $data['android_two_img'] = $this->domain($data['android_two_img']);
                }
            }
            if(!empty($data['ios_one_path'])) {
                if($data['ios_one_path'] != $re['ios_one_path']){
                    $data['ios_one_img'] = "/qrcode/" . time() . rand(100, 999) . 'ios_one_img.png';
                    qrcode($data['ios_one_path'],'./'.$data['ios_one_img'],8,9);
                    $data['ios_one_img'] = $this->domain($data['ios_one_img']);
                }
            }

            if(!empty($data['ios_two_path'])) {
                if($data['ios_two_path'] != $re['ios_two_path']){
                    $data['ios_two_img'] = "/qrcode/" . time() . rand(100, 999) . 'ios_two_img.png';
                    qrcode($data['ios_two_path'],'./'.$data['ios_two_img'],8,9);
                    $data['ios_two_img'] = $this->domain($data['ios_two_img']);
                }
            }

            $result = Db::name('app_version_control')->where(['id'=>'1'])->update($data);
            if ($result !== false) {
                $data= ['status' => "ok", 'info' => '配置成功!'];
                echo success($data);
                die;
            } else {
                echo error('配置失败!');
                die;
            }

        }else{
            $this->assign(['re'=>$re]);
            return $this->fetch();
        }
    }

    public function refund_reason(){
        $params = Request::instance()->request();
        $p= empty($params["p"]) ? 1 : $params["p"];
        if (empty($num)){
            $num = 10;
        }
        $data = array();
        !empty($_GET['name']) ? $data["name"]=['like','%'.input('name').'%']:'';
        $data['is_delete'] = '0';
        $this->assign('nus',$num);
        $count =DB::name('order_refund_reason')->where($data)->count(); // 查询满足要求的总记录数
        $list=DB::name("order_refund_reason")->where($data)->order('sort asc')->paginate(10,false,$config = Request::instance()->param());
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        $this->assign('list',$list);
        $this->assign ( 'pagetitle', '退换货原因');
        $this->assign('count',$count);
        return view();
    }

    /**
     * 添加直播标签
     */
    public function add_refund_reason(){
        if(Request::instance()->isPost()){
            $params = Request::instance()->param();
            if(empty($params['reason_name'])){
                error('原因不能为空');
            }else{
                $data['reason_name'] = $params['reason_name'];
            }
            $data["create_time"] = date('Y-m-d H:i:s',time());
            $id = DB::name("order_refund_reason")->insertGetId($data);
            $res = Db::name('order_refund_reason')->where(['refund_reason_id'=>$id])->update(['sort'=>$id]);
            if($res){
                success(array('status'=>'ok','info'=>'添加成功','url'=>session('url')));
            }else{
                success(array('status'=>'ok','info'=>'添加失败','url'=>session('url')));
            }
        }else{
            return $this->fetch();
        }
    }
    /**
     * 编辑直播标签
     */
    public function edit_refund_reason(){
        $id = input("id");
        if(Request::instance()->isPost()){
            $params = Request::instance()->param();
            if(empty($params['reason_name'])){
                error('原因不能为空');
            }else{
                $data['reason_name'] = $params['reason_name'];
            }
            $res = DB::name("order_refund_reason")->where(['refund_reason_id'=>$params['id']])->update($data);
            if($res !== false){
                success(array('status'=>'ok','info'=>'修改成功','url'=>session('url')));
            }else{
                success(array('status'=>'ok','info'=>'修改失败','url'=>session('url')));
            }
        }else{
            $re = DB::name("order_refund_reason")->where("refund_reason_id",$id)->find();
            $this->assign("re",$re);
            return $this->fetch("config/add_refund_reason");
        }
    }
    /**
     * 删除标签
     */
    public function del_refund_reason(){
        $id = input("ids");
        $result = DB::name('order_refund_reason')->where("refund_reason_id","in",$id)->update(['is_delete'=>'1']);
        if($result){
            echo json_encode(array('status'=>'ok','info'=>'删除记录成功','url'=>session('url')));
        }else{
            echo json_encode(array('status'=>'error','info'=>"删除记录失败"));
        }
    }

    /**
     *@上移排序
     */
    public function plus_refund_sort(){
        if(Request::instance()->isAjax()){
            $id = input('id');
            $check = Db::name('order_refund_reason')->where(['refund_reason_id'=>$id])->find();
            $map['sort'] = ['lt',$check['sort']];
            $map['is_delete'] = '0';

            $last = Db::name('order_refund_reason')->where($map)
                ->order("sort desc")->limit(1)->select();
            if(empty($last)){
                error('不能移动');
            }else{
                $sort = $last[0]['sort'];
                $result = Db::name('order_refund_reason')->where(['refund_reason_id'=>$id])->update(['sort'=>$sort]);
                Db::name('order_refund_reason')->where(['refund_reason_id'=>$last[0]['refund_reason_id']])->update(['sort'=>$check['sort']]);
            }
            if($result){
                success('操作成功');
            }else{
                error('操作失败');
            }
        }
    }

    /**
     *@下移排序
     */
    public function minus_refund_sort(){
        if(Request::instance()->isAjax()){
            $id = input('id');
            $check = Db::name('order_refund_reason')->where(['refund_reason_id'=>$id])->find();
            $map['sort'] = ['gt',$check['sort']];
            $map['is_delete'] = '0';

            $last = Db::name('order_refund_reason')->where($map)
                ->order("sort asc")->limit(1)->select();
            if(empty($last)){
                error('不能移动');
            }else{
                $sort = $last[0]['sort'];
                $result = Db::name('order_refund_reason')->where(['refund_reason_id'=>$id])->update(['sort'=>$sort]);
                Db::name('order_refund_reason')->where(['refund_reason_id'=>$last[0]['refund_reason_id']])->update(['sort'=>$check['sort']]);
            }
            if($result){
                success('操作成功');
            }else{
                error('操作失败');
            }
        }
    }



}