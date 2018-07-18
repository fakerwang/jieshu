<?php
/**
 * Created by PhpStorm.
 * User: lx
 * Date: 2018/3/6
 * Time: 下午4:25
 */
namespace app\merchant\controller;
use think\Auth;
use think\captcha\Captcha;
use think\Controller;
use think\Request;
use think\Session;
use think\Db;
use think\Paginator;
use think\Config;
use think\Validate;
use think\View;
use lib\Page;
use lib\Easemob;
class Apply extends Base{

    /*
     *申请审核直播
     */
    public function index(){
        $merchant = $this->merchant;
        $params = Request::instance()->param();
        !empty($params['username']) && $map['zhu_phone'] = ['like','%'.$params['username'].'%'];
        $map['is_shenhe'] = '1';

        $map['is_del'] = 0;
        $map['merchants_id'] = $merchant['gl_merchants_id'];
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        $count = Db::name('Apply')->where(['is_shenhe'=>'1'])->count();
        $count1 = Db::name('Apply')->where(['is_shenhe'=>'2'])->count();
        $list = Db::name('Apply')
            ->where($map)
            ->order("apply_id desc")
            ->paginate($num,false,['query' => request()->param()]);
        $list->toArray();
        foreach ($list as $k=>$v){
            if($v['screen_class_id']=='0'){
                $screen_class = '未绑定';
            }else{
                $screen_class = '绑定';
            }
            $re = $this->get_shop_sale($v['apply_id']);
            $res = $this->object_array($re);
            $data = array();
            $data = $v;
            $data['screen_class'] = $screen_class;
            $data['total_money'] = $res['data']['total_money'];
            $list->offsetSet($k,$data);
        }
//        echo '<pre>';
//        var_dump($list);die;
        $page = $list->render($count);
        $this->assign(['list'=>$list,'count'=>$count,'count1'=>$count1,'page'=>$page]);
        $url =$_SERVER['REQUEST_URI'];
        Session::set('url',$url);
        return $this->fetch();
    }
    /*
     *通过申请直播
     */
    public function apply_list(){
        $merchant = $this->merchant;
        $params = Request::instance()->param();
        !empty($params['username']) && $map['d.anchor_phone'] = ['like','%'.$params['username'].'%'];
        $map['a.is_shenhe'] = ['in','2,3,4,5,6'];
        $map['a.is_del'] = 0;
        $map['b.apply_state']='2';
        $map['a.merchants_id'] = $merchant['gl_merchants_id'];
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        $count = Db::name('Apply')->where($map)->alias("a")
            ->join("merchants b",'a.merchants_id=b.gl_merchants_id')
            ->join("home_class c",'a.status=c.id')
//            ->join('live e','a.room_id = e.room_id')
            ->join("anchor d",'a.zhu_phone=d.anchor_phone')
            ->count();
        $list = Db::name('Apply')->alias("a")
            ->field("a.*,b.company_name,d.anchor_name")
            ->join("merchants b",'a.merchants_id=b.gl_merchants_id')
            ->join("home_class c",'a.status=c.id')
//            ->join('live e','a.room_id = e.room_id')
            ->join("anchor d",'a.zhu_phone=d.anchor_phone')
            ->where($map)
            ->order("a.apply_id desc")
            ->paginate($num,false,['query' => request()->param()]);
        $list->toArray();
        foreach ($list as $k=>$v){
            if($v['screen_class_id']==''){
                $screen_class = '未绑定';
            }else{
                $screen_class = '绑定';
            }
            if($v['is_shenhe'=='4']){
                $watch_nums = Db::name('live')->field('watch_nums')->where(['live_status'=>'1'])->find();
                $re = $this->get_shop_sale($v['apply_id']);

                $res = $this->object_array($re);
            }
            $data = array();
            $data = $v;
            $data['screen_class'] = $screen_class;
            $a = $res['data']['total_money'];
            if($a=='null' || $a==''){
                $data['total_money'] = '0';
            }else{
                $data['total_money'] = $res['data']['total_money'];
            }
            $b = $watch_nums['watch_nums'];
            if($b=='null' || $b==''){
                $data['watch_nums'] = '0';
            }else{
                $data['watch_nums'] = $watch_nums['watch_nums'];
            }
            $list->offsetSet($k,$data);
        }
//        echo '<pre>';
//        var_dump($list);die;
        $page = $list->render($count);
        $this->assign(['list'=>$list,'count'=>$count,'page'=>$page]);
        $url =$_SERVER['REQUEST_URI'];
        Session::set('url',$url);
        return $this->fetch();
    }


    public function get_shop_sale($apply_id){
        $api_url = 'https://www.ttzxh.com/index.php?ctl=Api_Publicjing&met=liveroom_sales_statistics&typ=json';
        $post_data =array(
            'room_id' => $apply_id,
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
     * 查看直播申请
     */
    public function  edit_apply(){
        $apply_id = input("apply_id");
        if(request()->isAjax()) {
            $params = Request::instance()->param();
            $data['zhu_phone'] = $params['zhu_phone'];
            $data['class_id'] = $params['class_id'];
            $data['title'] = $params['title'];
            $data['start_time'] = $params['start_time'];
            $data['cover_img'] = $params['cover_img'];
            $data['apply_content'] = $params['apply_content'];
            $data['url'] = $params['url'];
            $data['is_shenhe'] = '1';
            $data['screen_id'] = '';
            $url = Session::get('url');
            $res = Db::name("apply")->where(['apply_id'=>$apply_id])->update($data);
            if ($res) {
                return success(['info' => '操作成功', 'url' => $url]);
            } else {
                return error('操作失败');
            }

        }else{
            $data = Db::name("merchants")->alias('a')
                ->field("a.gl_merchants_id,a.company_name")
                ->join("apply b",'a.gl_merchants_id = b.merchants_id')
                ->where(['b.apply_id'=>$apply_id])
                ->find();
            $res = Db::name('apply')->where(['apply_id'=>$apply_id])->find();
            $re = Db::name('anchor')->select();
            $screen = Db::name("screen_class")->where(['screen_class_id'=>$res['screen_class_id']])->find();
            $where['tag'] = ['NEQ','预播'];
            $where['is_del'] = '1';
            $live_class = Db::name('live_class')->where($where)->select();
            if($res['class_id']=='2'){
                $goods = Db::name("app_good")->where(['apply_id'=>$apply_id])->select();
            }else{
                $goods = Db::name("app_paimai")->where(['apply_id'=>$apply_id])->select();
                foreach ($goods as $k=>$v){
                    $goods[$k]['goods_id'] = $v['paimai_id'];
                    $goods[$k]['goods_name'] = $v['common_name'];
                    $goods[$k]['goods_image'] = $v['common_image'];
                    $goods[$k]['goods_price'] = $v['onset'];
                }
            }
            $screen_list = Db::name("screen")->alias("a")
                ->join("screen_class b","a.screen_class_id = b.screen_class_id")
                ->where(['model'=>$screen['model'],'a.is_del'=>'0'])
                ->select();
            $anchor = Db::name('anchor')->where(['anchor_phone'=>$res['zhu_phone']])->find();
            $home_class = Db::name('home_class')->select();
            $this->assign(['res'=>$re,'live_class'=>$live_class,'re'=>$res,'goods'=>$goods,'data'=>$data,'screen'=>$screen,'screen_list'=>$screen_list,'anchor'=>$anchor,'home_class'=>$home_class]);
            return $this->fetch();
        }
    }

    /**
     * 添加场控
     */
    public function update_apply(){
        $merchant = $this->merchant;
        $id = input('apply_id');
        if(Request::instance()->isAjax()){
            $params = Request::instance()->param();
            $count = Db::name('anchor')->where(['apply_id'=>$id])->count();
            if(!empty($count)){
               $control_num = Db::name('Apply')->where(['apply_id'=>$id])->value('control_num');
               if($count < intval($control_num)){
                    $result =Db::name("anchor")->where(['anchor_id'=>$params['anchor_id']])->update(['apply_id'=>$id]);;
                    if ($result) {
                        Db::name("anchor")->where(['anchor_id'=>$params['anchor_id']])->update(['status'=>'1']);
                        return success(['info' => '操作成功']);
                    } else {
                        return error('操作失败');
                    }

               }else{
                  return error('最多添加'.$control_num.'名场控');
               }

            }else{
                $result =Db::name("anchor")->where(['anchor_id'=>$params['anchor_id']])->update(['apply_id'=>$id]);;
                if ($result) {
                    Db::name("anchor")->where(['anchor_id'=>$params['anchor_id']])->update(['status'=>'1']);
                    return success(['info' => '操作成功']);
                 } else {                                                                                    
                     return error('操作失败');                                                                   
                 }

            }

        }else{
          $data = Db::name('Apply')->field("apply_id,title")->where(['apply_id'=>$id])->find();
          $re = Db::name("anchor")->where(['type'=>'2','merchants_id'=>$merchant['gl_merchants_id'],'status'=>'0','is_del'=>'0'])->select();
          $this->assign(['res'=>$re,'data'=>$data]);
          return $this->fetch();

        }
    }

    /**
     * 添加直播申请
     */
    public function  add_apply(){
        $merchant = $this->merchant;
        if(request()->isAjax()) {
            $re6 = Db::name("anchor")->where(['merchants_id'=>$merchant['gl_merchants_id']])->find();
            $re6['username'] ? $name = $re6['username'].rand(100,999) : $name = "直播间" . rand(100, 999);
            $options = [
                'name' => $name,
                'description' => $name,
                'maxusers' => 3000,
                'owner' => $re6['hx_username']
            ];
            $hx = new Easemob();
            $create = $hx->createChatRoom($options);
            (!empty($create['error'])) ? error('创建聊天室失败!') : true;
            $domain = config("domain");
            $params = Request::instance()->param();
            if($params['zhu_phone'] == ''){
                $params['zhu_phone'] = $params['pai_phone'];
            }
            $rule = [
//                'status'       =>'require',
                'cover_img'              => 'require',
                'zhu_phone'      => 'require',
                'title'       =>'require',
                'start_time'       =>'require',
                'end_time'       =>'require',
                'address'	  =>'require',
                'apply_content'  =>'require',
//                'url'  =>'require',
                'arr'  =>'require',
            ];
            $message = [
//                'status.require'                => '请选择直播类型',
                'cover_img.require'            => '请上传直播封面',
                'zhu_phone.require'            => '请选择主播账户',
                'title.require'                 =>"请填写直播标题",
                'start_time.require'            =>"请选择直播开始时间",
                'end_time.require'              =>"请选择直播结束时间",
				'address.require'	  				   =>'请填写直播地址',
                'apply_content.require'                =>'请填写直播简介',
//                'url.require'                          =>'请选择上传视频',
                'arr.require'                          =>'请添加商品',

            ];

            $validate = new Validate($rule,$message);
            $result   = $validate->check($params);
            if(!$result){
                error($validate->getError());
            }
            $params['room_id'] = $create['data']['id'];
            $params['cover_img'] = $domain.$params['cover_img'];
            if($params['url'] !== ''){
                $str = 'http://msplay.qqyswh.com/';
                if(strpos($params['url'],$str) ===false){
                    $params['url'] = $str.$params['url'];
                }
            }
            $params['start_time'] = strtotime($params['start_time']);
            $params['end_time'] = strtotime($params['end_time']);
            $params['merchants_id'] = $merchant['gl_merchants_id'];

            if(empty($params['screen_id'])){
                $params['screen_id'] = '0';
            }else{
                $params['screen_id'] = '1';
            }

//            $id = $params['arr'];
//            $ids = explode(",",$id);
//            $merchant = $merchant['gl_merchants_id'];
//            $list = $this->get_shop_goods($merchant);//获取客户那边接口的商品
//            $res = $list->data;
//            $re = $this->object_array($res);
//            $data = $re['data'];
//            $datas = $data['items'];
//            foreach($datas as $key=>$val){
//                if(in_array($val['goods_id'],$ids)){
//                    $arr[] = $val;
//                }
//            }
//            $params['goods_id_num'] = count($arr);
//            $params['goods_id_num'] = count($a);
//            foreach ($arr as $k=>$v){
//                $arr[$k]['apply_id'] = $apply_id;
//            }
            $a = $this->object_array(json_decode($params['arr']));
            $params['goods_id_num'] = count($a);
            $params['status'] =  '2';
            $apply_id = Db::name('apply')->insertGetId($params);
            foreach ($a as $k=>$v){
                $a[$k]['apply_id'] = $apply_id;
            }
//            $data = Db::name("app_goods")->insertAll($arr);
            $data = Db::name("app_good")->insertAll($a);
            $url = Session::get('url');
            if ($data) {
                return success(['info' => '操作成功','url'=>$url]);
            } else {
                return error('操作失败');
            }
        }else {
            $data = Db::name("merchants")->field("gl_merchants_id,company_name")->where(['gl_merchants_id' => $merchant['gl_merchants_id']])->find();
            $res = Db::name('apply')->select();
            $re = Db::name('anchor')->where(['type' => '0', 'merchants_id' => $merchant['gl_merchants_id'], 'is_del' => '0'])->select();
            $e = Db::name('anchor')->select();
            $res2 = Db::name('screen_class')->select();
            $where['tag'] = ['NEQ', '预播'];
            $where['is_del'] = '1';
            $live_class = Db::name('live_class')->where($where)->select();
            $merchant = $merchant['gl_merchants_id'];
            $listes = $this->get_shop_goods($merchant);
            $res1 = $listes->data;
            $re1 = $this->object_array($res1);
            $data1 = $re1['data'];
            $goodes = $data1['items'];
//	        foreach ($goodes as $k=>$v){
//	            if($v['goods_spec'] !==''){
//
//                }else{

//                }
//            }
//	        pre($goodes);die;
            //$goods = Db::name("app_goods")->select();
            $this->assign(['res'=>$re,'live_class'=>$live_class,'re1'=>$res2,'re'=>$res,'e'=>$e,'goodes'=>$goodes,'data'=>$data]);
            return $this->fetch();
        }
    }


    /**
     * 添加直播拍卖申请
     */
    public function  add_pai_apply(){
        $merchant = $this->merchant;
        if(request()->isAjax()) {
            $re6 = Db::name("anchor")->where(['merchants_id'=>$merchant['gl_merchants_id']])->find();
            $re6['username'] ? $name = $re6['username'].rand(100,999) : $name = "直播间" . rand(100, 999);
            $options = [
                'name' => $name,
                'description' => $name,
                'maxusers' => 3000,
                'owner' => $re6['hx_username']
            ];
            $hx = new Easemob();
            $create = $hx->createChatRoom($options);
            (!empty($create['error'])) ? error('创建聊天室失败!') : true;
            $domain = config("domain");
            $params = Request::instance()->param();
            if($params['zhu_phone'] == ''){
                $params['zhu_phone'] = $params['pai_phone'];
            }
            $rule = [
                'cover_img'              => 'require',
                'zhu_phone'      => 'require',
//                'status'       =>'require',
                'title'       =>'require',
                'start_time'       =>'require',
                'end_time'       =>'require',
                'address'	  =>'require',
                'apply_content'  =>'require',
//                'url'  =>'require',
                'arr'  =>'require',
                'content'  =>'require',
            ];
            $message = [
                'cover_img.require'            => '请上传直播封面',
                'zhu_phone.require'            => '请选择主播账户',
//                'status.length'                => '请选择直播类型',
                'title.length'                 =>"请填写直播标题",
                'start_time.length'            =>"请选择直播开始时间",
                'end_time.length'              =>"请选择直播结束时间",
                'address'	  				   =>'请填写直播地址',
                'apply_content'                =>'请填写直播简介',
                'content'                      =>'请填写拍卖证书',
                'arr.require'                  =>'请添加商品',

            ];
            $validate = new Validate($rule,$message);
            $result   = $validate->check($params);
            if(!$result){
                error($validate->getError());
            }
            (!empty($create['error'])) ? error('创建聊天室失败!') : true;
            $params['room_id'] = $create['data']['id'];
            $params['cover_img'] = $domain.$params['cover_img'];
            if($params['url'] !== ''){
                $str = 'http://msplay.qqyswh.com/';
                if(strpos($params['url'],$str) ===false){
                    $params['url'] = $str.$params['url'];
                }
            }
            $params['start_time'] = strtotime($params['start_time']);
            $params['end_time'] = strtotime($params['end_time']);
            $params['merchants_id'] = $merchant['gl_merchants_id'];

            if(empty($params['screen_id'])){
                $params['screen_id'] = '0';
            }else{
                $params['screen_id'] = '1';
            }
            $id = $params['arr'];
            $ids = explode(",",$id);
            $merchant = $merchant['gl_merchants_id'];
            $list = $this->get_pai_goods($merchant);
            $res = $list->data;
            $re = $this->object_array($res);
            $datas = $re;
            foreach($datas as $key=>$val){
                if(in_array($val['paimai_id'],$ids)){
                    $arr[] = $val;
                }

            }
            $params['goods_id_num'] = count($arr);
            $params['status'] = '3';
            $apply_id = Db::name('apply')->insertGetId($params);
            foreach ($arr as $k=>$v){
                $arr[$k]['apply_id'] = $apply_id;
            }
            $data = Db::name("app_paimai")->insertAll($arr);
            $url = Session::get('url');
            if ($data) {
                return success(['info' => '操作成功','url'=>$url]);
            } else {
                return error('操作失败');
            }
        }else{
            $data = Db::name("merchants")->field("gl_merchants_id,company_name")->where(['gl_merchants_id'=>$merchant['gl_merchants_id']])->find();
            $res = Db::name('apply')->select();
            $re = Db::name('anchor')->where(['type'=>'0','merchants_id'=>$merchant['gl_merchants_id'],'is_del'=>'0'])->select();
            $e = Db::name('anchor')->where(['type'=>'0','merchants_id'=>$merchant['gl_merchants_id'],'is_del'=>'0'])->select();
            $res2 = Db::name('screen_class')->select();
            $where['tag'] = ['NEQ','预播'];
            $where['is_del'] = '1';
            $live_class = Db::name('live_class')->where($where)->select();
            $merchant = $merchant['gl_merchants_id'];
            $listes = $this->get_pai_goods($merchant);
            $res1 = $listes->data;
            $re1 = $this->object_array($res1);
            $goodes = $re1;
            $this->assign(['res'=>$re,'live_class'=>$live_class,'re1'=>$res2,'re'=>$res,'e'=>$e,'goodes'=>$goodes,'data'=>$data]);
            return $this->fetch();
        }
    }


    /**
     * 添加展销直播申请
     */
    public function  add_zhan_apply(){
        $merchant = $this->merchant;
        if(request()->isAjax()) {
            $re6 = Db::name("anchor")->where(['merchants_id'=>$merchant['gl_merchants_id']])->find();
            $re6['username'] ? $name = $re6['username'].rand(100,999) : $name = "直播间" . rand(100, 999);
            $options = [
                'name' => $name,
                'description' => $name,
                'maxusers' => 3000,
                'owner' => $re6['hx_username']
            ];
            $hx = new Easemob();
            $create = $hx->createChatRoom($options);
            (!empty($create['error'])) ? error('创建聊天室失败!') : true;
            $domain = config("domain");
            $params = Request::instance()->param();
            if($params['zhu_phone'] == ''){
                $params['zhu_phone'] = $params['pai_phone'];
            }
            $rule = [
                'cover_img'              => 'require',
                'zhu_phone'      => 'require',
//                'status'       =>'require',
                'title'       =>'require',
                'start_time'       =>'require',
                'end_time'       =>'require',
                'address'	  =>'require',
                'apply_content'  =>'require',
//                'url'  =>'require',
            ];
            $message = [
                'cover_img.require'            => '请上传直播封面',
                'zhu_phone.require'            => '请选择主播账户',
//                'status.length'                => '请选择直播类型',
                'title.length'                 =>"请填写直播标题",
                'start_time.length'            =>"请选择直播开始时间",
                'end_time.length'              =>"请选择直播结束时间",
                'address'	  				   =>'请填写直播地址',
                'apply_content'                =>'请填写直播简介',
            ];
            $validate = new Validate($rule,$message);
            $result   = $validate->check($params);
            if(!$result){
                error($validate->getError());
            }
            (!empty($create['error'])) ? error('创建聊天室失败!') : true;
            $params['room_id'] = $create['data']['id'];
            $params['cover_img'] = $domain.$params['cover_img'];
            if($params['url'] !== ''){
                $str = 'http://msplay.qqyswh.com/';
                if(strpos($params['url'],$str) ===false){
                    $params['url'] = $str.$params['url'];
                }
            }
            $params['start_time'] = strtotime($params['start_time']);
            $params['end_time'] = strtotime($params['end_time']);
            $params['merchants_id'] = $merchant['gl_merchants_id'];

            if(empty($params['screen_id'])){
                $params['screen_id'] = '0';
            }else{
                $params['screen_id'] = '1';
            }
//            $id = $params['arr'];
//            $ids = explode(",",$id);
//            $merchant = $merchant['gl_merchants_id'];
//            $list = $this->get_pai_goods($merchant);
//            $res = $list->data;
//            $re = $this->object_array($res);
//            $datas = $re;
//            foreach($datas as $key=>$val){
//                if(in_array($val['paimai_id'],$ids)){
//                    $arr[] = $val;
//                }
//
//            }
//            $params['goods_id_num'] = count($arr);
            $params['status'] = '1';
            $apply_id = Db::name('apply')->insertGetId($params);
            $url = Session::get('url');
            if ($apply_id) {
                return success(['info' => '操作成功','url'=>$url]);
            } else {
                return error('操作失败');
            }
        }else{
            $data = Db::name("merchants")->field("gl_merchants_id,company_name")->where(['gl_merchants_id'=>$merchant['gl_merchants_id']])->find();
            $res = Db::name('apply')->select();
            $re = Db::name('anchor')->where(['type'=>'0','merchants_id'=>$merchant['gl_merchants_id'],'is_del'=>'0'])->select();
            $e = Db::name('anchor')->select();
            $res2 = Db::name('screen_class')->select();
            $where['tag'] = ['NEQ','预播'];
            $where['is_del'] = '1';
            $live_class = Db::name('live_class')->where($where)->select();
            $this->assign(['res'=>$re,'live_class'=>$live_class,'re1'=>$res2,'re'=>$res,'e'=>$e,'data'=>$data]);
            return $this->fetch();
        }
    }


    public function test(){
        $user_id = '10002';
        $res = $this->get_pai_goods($user_id);
        pre($res);die;
    }

    public function get_pai_goods($user_id){
        $api_url = 'https://www.dev.ttzxh.com/index.php?ctl=Api_Auction&met=curl_getuser_auctionlist&typ=json';
        $post_data =array(
            'user_id' => $user_id,
            'rows' =>'50',
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
     * 刷新数据
     */
    public function ajax_data(){
        $list = Db::name('anchor')->select();
        return $list;

    }


    /**
     *添加主播
     */
    public function add_anchor(){
        $merchant = $this->merchant;
        if(Request::instance()->isAjax()){
            $params = Request::instance()->param();
            $rule = [
                'anchor_name'              => 'require',
                'anchor_phone'      => 'require|number|length:11',
                'card'       =>'require|length:18',
                'zi_title'	=> 'require',
                'anchor_desc'	=> 'require',
                'nick_name'	=> 'require',
            ];
            $message = [
                'contact_name.require'                              => '请输入身份证上的姓名',
                'contact_mobile.require'      => '联系方式必须填写',
                'contact_mobile.number'      => '联系方式必须是数字',
                'contact_mobile.length'      => '联系方式长度为11位',
                'card.require'                             =>"身份证号必须填写",
                'card.length'                             =>"身份证号必须是18位",
                'zi_title'	=> '请填写主播资质名',
                'anchor_desc'	=> '请填写主播介绍',
                'nick_name'	=> '请填写主播介绍',

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
            $params['user_img'] = $domain.$params['user_img'];
            $params['create_time'] = time();
            $params['merchants_id'] = $merchant['gl_merchants_id'];
            $res = Db::name('anchor')->insert($params);
            $url = 'http://daylive.tstmobile.com/merchant/apply/add_apply.html';
            if ($res) {
                return success(['info' => '操作成功','url' => $url]);
            } else {
                return error('操作失败');
            }
        }else{
            $list = Db::name('anchor')->select();
            $this->assign(['res'=>$list]);
            $this->view->engine->layout(false);
            return $this->fetch();
        }
    }





    /**
     * 粉丝列表
     */
    public function fans(){
        $merchant = $this->merchant;
        !empty($_GET['username']) && $map['a.user_phone|a.username'] = ['like','%'.input('username').'%'];
        $map['a.user_id2'] = $merchant['gl_merchants_id'];
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        $map['a.is_delete'] = '1';
        $count = Db::name('follow_merchants')->alias('a')
            ->where($map)
            ->count();
        $list = Db::name('follow_merchants')->alias('a')
            ->where($map)
            ->order("a.follow_id desc")
            ->paginate($num,false,['query' => request()->param()]);
        $list->toArray();
        foreach ($list as $k=>$v){
            if($v['type']=='1'){
                $room_id = Db::name('live')->where(['live_id'=>$v['live_id']])->value('room_id');
                $res = Db::name('apply')->field('title,zhu_phone')->where(['room_id'=>$room_id])->find();
                $anchor_name = Db::name('anchor')->where(['anchor_phone'=>$res['zhu_phone']])->value('anchor_name');
                $data = array();
                $data = $v;
                $data['anchor_name'] = $anchor_name;
                $data['zhu_phone'] = $res['zhu_phone'];
                $data['title'] = $res['title'];
                $data['source'] = '直播';
                $list->offsetSet($k,$data);
            }else{
                $data = array();
                $data = $v;
//                $data['title'] = '排行';
                $data['source'] = '其他';
                $list->offsetSet($k,$data);
            }
        }
        $page = $list->render($count);
        $this->assign(['list'=>$list,'count'=>$count,'page'=>$page]);
        return $this->fetch("apply/fans");
    }


    public function get_shop_goods($user_id){
        $api_url = 'https://www.dev.ttzxh.com/index.php?ctl=Api_Publicjing&met=get_shop_goods_page&typ=json';
        $post_data =array(
            'user_id' => $user_id,
            'rows' =>'25'
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


    /*
    *添加商品列表
    */
    public function goods_list(){
//      $merchant = $this->merchant;
        $merchant = '11';
        $list = $this->get_shop_goods($merchant);
        $res = $list->data;
        $re = $this->object_array($res);
        $data = $re['data'];
        $datas = $data['items'];
        $count = count($datas);
        //$page = $data->render($count);
        $this->assign(['list'=>$datas,'count'=>$count]);
        $url =$_SERVER['REQUEST_URI'];
        Session::set('url',$url);
        $this->view->engine->layout(false);
        return $this->fetch();
    }

    /**
     *
     * 数据转换 stdClass Object转array
     * @access public
     */
    public function object_array($array) {
        if(is_object($array)) {
            $array = (array)$array;
        } if(is_array($array)) {
            foreach($array as $key=>$value) {
                $array[$key] =self::object_array($value);
            }
        }
        return $array;
    }

    /**
     *添加商品
     */
    public function add_goods(){
            $re = Db::name("system")->select();
            if ($re) {
                echo json_encode(['status' => "ok", 'info' => '添加成功!']);
            } else {
                echo json_encode(['status' => "error", 'info' => '添加失败!']);
            }

    }


    /**
     * 添加大屏
     */
    public function add_screen(){
        $order_state = input('model');
        $wid_hei = input('wid_hei');
        !empty($order_state) &&  $map['model'] = ['like', '%' . $order_state . '%'];
        !empty($wid_hei) &&  $map['wid_hei'] = ['like', '%' . $wid_hei . '%'];
        $num = input('num');
        if (empty($num)) {
            $num = 10;
        }
        $this->assign('nus', $num);
        $data = Db::name("screen_class")
            ->where($map)
            ->paginate($num,false,$config = ['query'=>array('model'=>$order_state,'wid_hei'=>$wid_hei)]);
        $page = $data->render();
        $this->assign(['list' => $data, 'page' => $page]);
        $url = $_SERVER['REQUEST_URI'];
        session('url', $url);
        // 临时关闭当前模板的布局功能
        $this->view->engine->layout(false);
        return $this->fetch();
    }






}