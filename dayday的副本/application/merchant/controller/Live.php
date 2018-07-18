<?php
/**
 * Created by PhpStorm.
 * User: ljy
 * Date: 17/9/26
 * Time: 下午5:25
 */
namespace app\merchant\controller;
use Qiniu\QiniuPili;
use lib\Easemob;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use lib\Page;
class Live extends Base {
    /**
     * @主播直播列表
     */
    public function live_list(){
        header("Content-type:text/html;charset=utf-8");
        $params = Request::instance()->param();
        if (!empty($params['username'])){
            $data['b.username|b.phone|a.title'] = ['like','%'.$params['username'].'%'];
            $this->assign('username',$params['username']);
        }
        if (!empty($params['live_status'])){
            $data['a.live_status'] = $params['live_status'];
            $this->assign('live_status',$params['live_status']);
        }
        if (!empty($params['start_time']) && empty($params['end_time'])){
            $start = strtotime($params['start_time']);
            $data['a.intime'] = ['gt',$start];
            $this->assign('start_time',$params['start_time']);
        }elseif(empty($params['start_time']) && !empty($params['end_time'])){
            $end = strtotime($params['end_time'])+(24*60*60-1);
            $data['a.intime'] = ['lt',$end];
            $this->assign('end_time',$params['end_time']);
        }elseif(!empty($params['start_time']) && !empty($params['end_time'])){
            $start = strtotime($params['start_time']);
            $end = strtotime($params['end_time'])+(24*60*60-1);
            $data['a.intime'] = ['between',[$start,$end]];
            $this->assign('start_time',$params['start_time']);  $this->assign('end_time',$params['end_time']);
        }
        //每页显示几条
        if (isset($_GET['nums'])){
            $num  = intval($_GET['nums']);
        }else {
            $num  = 10;
        }
        $data["b.type"] = 3;
        $domain= config('domain');
        $count = DB::name("live")->alias("a")
                ->join('__MEMBER__ b','a.user_id = b.member_id')
                ->where($data)->count();
        $list = DB::name("live")
                ->alias("a")
                ->field("live_id,a.play_img,a.live_status,a.title,a.intime,a.nums,a.watch_nums,b.header_img,b.username,a.lebel,b.sex,b.phone,header_img as img")
                ->join("__MEMBER__ b","a.user_id = b.member_id")
                ->order('a.intime desc')
                ->where($data)
                ->paginate($num,false,['query' => Request::instance()->param()]
                    );
        $page = $list->render();
        $this->assign('empty','<span class="empty">暂没有主播直播</span>');
        $this->assign(['list'=>$list,'page'=>$page,'count'=>$count]);
        $this->assign('count',$count);
        return view();
    }
    /**
     * @主播录播列表
     */
    public function record(){
        $params = Request::instance()->param();
        $data = [];
        if (!empty($params['username'])){
            $data['b.username|b.phone|a.title'] = ['like','%'.$params['username'].'%'];
            $this->assign('username',$params['username']);
        }
        if (!empty($params['start_time']) && empty($params['end_time'])){
            $start = strtotime($params['start_time']);
            $data['a.intime'] = ['gt',$start];
            $this->assign('start_time',$params['start_time']);
        }elseif(empty($params['start_time']) && !empty($params['end_time'])){
            $end = strtotime($params['end_time'])+(24*60*60-1);
            $data['a.intime'] = ['lt',$end];
            $this->assign('end_time',$params['end_time']);
        }elseif(!empty($params['start_time']) && !empty($params['end_time'])){
            $start = strtotime($params['start_time']);
            $end = strtotime($params['end_time'])+(24*60*60-1);
            $data['a.intime'] = ['between',[$start,$end]];
            $this->assign('start_time',$params['start_time']);  $this->assign('end_time',$params['end_time']);
        }
        //每页显示几条
        if (isset($params['nums'])){
            $nus  = intval($params['nums']);
        }else {
            $nus  = 10;
        }
        $data["b.type"] = 3;
        $this->assign("nus",$nus);
        $count = DB::name('Live_store')->alias('a')
            ->join('__MEMBER__ b', 'a.user_id = b.member_id','left')
            ->join('__LIVE__ c', 'a.live_id = c.live_id','left')
            ->where($data)
            ->count();//一共有多少条记录
        $list =  DB::name('Live_store')->alias('a')
            ->field('a.*,b.username,b.header_img,b.sex,b.phone,b.ID')
            ->join('__MEMBER__ b','a.user_id=b.member_id','left')
            ->join('__LIVE__ c', 'a.live_id = c.live_id','left')
            ->where($data)
            ->order('a.intime desc')
            ->paginate(10,false, ['query' => request()->param()]);
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        $this->assign('list',$list);
        $this->assign ( 'pagetitle', '录播列表' );
        $this->assign('count',$count);
        return view();
    }
    /**
     * @商户直播列表
     */
    public function merchants_live_list(){
        header("Content-type:text/html;charset=utf-8");
//        $merchant = $this->merchant;
        $params = Request::instance()->param();
        if (!empty($params['username'])){
            $data['d.anchor_name|d.anchor_phone|b.title'] = ['like','%'.$params['username'].'%'];
            $this->assign('username',$params['username']);
        }
        if (!empty($params['live_status'])){
            $data['a.live_status'] = $params['live_status'];
            $this->assign('live_status',$params['live_status']);
        }
        if (!empty($params['start_time']) && empty($params['end_time'])){
            $start = strtotime($params['start_time']);
            $data['a.intime'] = ['gt',$start];
            $this->assign('start_time',$params['start_time']);
        }elseif(empty($params['start_time']) && !empty($params['end_time'])){
            $end = strtotime($params['end_time'])+(24*60*60-1);
            $data['a.uptime'] = ['lt',$end];
            $this->assign('end_time',$params['end_time']);
        }elseif(!empty($params['start_time']) && !empty($params['end_time'])){
            $start = strtotime($params['start_time']);
            $end = strtotime($params['end_time'])+(24*60*60-1);
            $data['a.uptime'] = ['between',[$start,$end]];
            $this->assign('start_time',$params['start_time']);  $this->assign('end_time',$params['end_time']);
        }
        //每页显示几条
        if (isset($_GET['nums'])){
            $num  = intval($_GET['nums']);
        }else {
            $num  = 10;
        }
//        $data['a.is_del'] = '1';
//        $data['b.merchants_id'] = $merchant['merchants_id'];
        $count = DB::name("live")->alias("a")
            ->join("apply b","a.room_id = b.room_id")
            ->join("__MERCHANTS__ c","b.merchants_id =c.gl_merchants_id")
            ->join("anchor d","b.zhu_phone = d.anchor_phone")
            ->where($data)
            ->count();
        $list = DB::name("live")
            ->alias("a")
            ->field("c.company_name,b.apply_id,a.live_id,a.start_time,a.end_time,a.nums,a.share,a.watch_nums,b.goods_id_num,a.live_status,a.is_del,b.title,d.anchor_name,d.anchor_phone,b.create_time,b.start_time,b.goods_id_num,c.business_img,c.legal_img")
            ->join("apply b","a.room_id = b.room_id")
            ->join("__MERCHANTS__ c","b.merchants_id =c.gl_merchants_id")
            ->join("anchor d","b.zhu_phone = d.anchor_phone")
            ->order('b.create_time desc')
            ->where($data)
            ->paginate($num,false,['query' => Request::instance()->param()]);
        $list->toArray();
        foreach ($list as $k=>$v){
            if($v['goods_id_num']=='' || $v['goods_id_num']=='null'){
                $v['goods_id_num'] = '0';
            }
            $a= Db::name('follow_merchants')->where(['live_id'=>$v['live_id']])->count();
            if($a=='' || $a=='null'){
                $v['follow_num']= '0';
            }else{
                $v['follow_num'] = $a;
            }
            $v['share_num']= Db::name('share_merchants')->where(['apply_id'=>$v['apply_id']])->count();
            $re = $this->get_shop_sale($v['apply_id']);
            $res = $this->object_array($re);
            $data = array();
            $data = $v;
            $data['total_money'] = $res['data']['total_money'];
            $list->offsetSet($k,$data);
        }
        $page = $list->render();
        $this->assign('empty','<span class="empty">暂没有没有商家直播</span>');
        $this->assign(['list'=>$list,'page'=>$page,'count'=>$count]);
        $this->assign('count',$count);
        return view();
    }

    /**
     * 开启或关闭
     */
    public function change_live_state(){
        if(Request::instance()->isAjax()){
            $id = input('id');
            $status = Db::name('live')->where(['live_id'=>$id])->value('is_del');
            $abs = 3 - $status;
            $arr = ['1','2'];
            $result = Db::name('live')->where(['live_id'=>$id])->update(['is_del'=>$abs]);
            if($result){
                return success($arr[2-$status]);
            }else{
                return error('切换状态失败');
            }
        }
    }

    /**
     * @param $apply_id
     * @return mixed
     * 获取天天展播的这场直播的总销售额
     */
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
     * 添加直播申请
     */
    public function  edit_apply(){
        $apply_id = input("apply_id");
        if(request()->isAjax()) {
            $params = Request::instance()->param();
            $id = $params['screen_id'];
            $screen = Db::name("screen")->where(["screen_id"=>$id])->find();
            $apply_id = $params['apply_id'];
            $data['Mac_address'] = $screen['Mac_address'];
            $data['is_shenhe'] = $params['is_shenhe'];
            $data['screen_id'] = $screen['screen_id'];
            $data['control_num'] = $params['control_num'];
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
            $live_class = Db::name('live_class')->where('is_del','1')->select();
            $goods = Db::name("app_goods")->where(['apply_id'=>$apply_id])->select();
            $screen_list = Db::name("screen")->alias("a")
                ->join("screen_class b","a.screen_class_id = b.screen_class_id")
                ->where(['model'=>$screen['model']])
                ->select();
            $this->assign(['res'=>$re,'live_class'=>$live_class,'re'=>$res,'goods'=>$goods,'data'=>$data,'screen'=>$screen,'screen_list'=>$screen_list]);
            return $this->fetch();
        }
    }
    /**
     * @商户录播列表
     */
    public function merchants_record(){
        $merchant = $this->merchant;
        $params = Request::instance()->param();
        $data = [];
        if (!empty($params['username'])){
            $data['e.anchor_phone|b.title|d.merchants_name'] = ['like','%'.$params['username'].'%'];
            $this->assign('username',$params['username']);
        }
        if (!empty($params['start_time']) && empty($params['end_time'])){
            $start = strtotime($params['start_time']);
            $data['a.intime'] = ['gt',$start];
            $this->assign('start_time',$params['start_time']);
        }elseif(empty($params['start_time']) && !empty($params['end_time'])){
            $end = strtotime($params['end_time'])+(24*60*60-1);
            $data['a.intime'] = ['lt',$end];
            $this->assign('end_time',$params['end_time']);
        }elseif(!empty($params['start_time']) && !empty($params['end_time'])){
            $start = strtotime($params['start_time']);
            $end = strtotime($params['end_time'])+(24*60*60-1);
            $data['a.intime'] = ['between',[$start,$end]];
            $this->assign('start_time',$params['start_time']);  $this->assign('end_time',$params['end_time']);
        }
        $data['b.merchants_id'] = $merchant['gl_merchants_id'];
        //每页显示几条
        if (isset($params['nums'])){
            $nus  = intval($params['nums']);
        }else {
            $nus  = 10;
        }
        $this->assign("nus",$nus);
        $count = DB::name('Live_store')->alias('a')
            ->join('apply b', 'a.room_id=b.room_id')
            ->join('__LIVE__ c', 'a.live_id = c.live_id','left')
            ->join("__MERCHANTS__ d",'b.merchants_id = d.gl_merchants_id')
            ->join("anchor e","b.zhu_phone=e.anchor_phone")
            ->where($data)
            ->count();//一共有多少条记录
        $list =  DB::name('Live_store')
            ->alias('a')
            ->field('a.*,b.title,b.cover_img,b.address,d.business_img,b.goods_id_num,b.apply_id,b.start_time,b.end_time,e.anchor_phone,e.anchor_name,d.company_name')
            ->join('apply b', 'a.room_id=b.room_id')
            ->join('__LIVE__ c', 'a.live_id = c.live_id','left')
            ->join("__MERCHANTS__ d",'b.merchants_id = d.gl_merchants_id')
            ->join("anchor e","b.zhu_phone=e.anchor_phone")
            ->where($data)
            ->order('a.intime desc')
            ->paginate(10,false, ['query' => request()->param()]);
        $list->toArray();
        foreach ($list as $k=>$v){
            if($v['goods_id_num']=='' || $v['goods_id_num']=='null'){
                $v['goods_id_num'] = '0';
            }
            $a= Db::name('follow_merchants')->where(['live_id'=>$v['live_id']])->count();
            if($a=='' || $a=='null'){
                $v['follow_num']= '0';
            }else{
                $v['follow_num'] = $a;
            }
            $v['share_num']= Db::name('share_merchants')->where(['apply_id'=>$v['apply_id']])->count();
            $re = $this->get_shop_sale($v['apply_id']);
            $res = $this->object_array($re);
            $data = array();
            $data = $v;
            $data['total_money'] = $res['data']['total_money'];
            $list->offsetSet($k,$data);
        }
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        $this->assign('list',$list);
        $this->assign ( 'pagetitle', '录播列表' );
        $this->assign('count',$count);
        return view();
    }

    /**
     * 开启或关闭
     */
    public function change_live(){
        if(Request::instance()->isAjax()){
            $id = input('id');
            $status = Db::name('live_store')->where(['live_store_id'=>$id])->value('is_del');
            $abs = 3 - $status;
            $arr = ['1','2'];
            $result = Db::name('live_store')->where(['live_store_id'=>$id])->update(['is_del'=>$abs]);
            if($result){
                return success($arr[2-$status]);
            }else{
                return error('切换状态失败');
            }
        }
    }

    /**
     *@观看视频
     */
    public function play_url(){
        $id = input('id');
        $re = DB::name('apply')->where(['apply_id'=>$id])->find();
        $this->assign('re',$re);
        $this->view->engine->layout(false);
        return $this->fetch();
    }

    /**
     *@观看直播
     */
    public function play_live(){
        $id = input('id');
        $re = DB::name('live')->where(['live_id'=>$id])->find();
        $this->assign('re',$re);
        $this->view->engine->layout(false);
        return $this->fetch();
    }


    /**
     * 强制下线
     */
    public function offline(){
        $id = Request::instance()->param('id');
        $live = DB::name('Live')->where(['live_id'=>$id])->find();
        //直播间状态修改
        $l_rs = DB::name('Live')->where(['live_id'=>$id])->update(['live_status'=>2,'is_normal_exit'=>2,'end_time'=>time(),'is_offline'=>2,'uptime'=>time()]);
        //商户直播间状态修改
//        $c_rs = DB::name("merchants")->where(['member_id'=>$live["user_id"]])->update(["live_id"=>0]);
        //获取七牛对象
        $qn = new QiniuPili();
        //强制下线(并且保存视频)
        $fname = $qn->save_vido($live["stream_key"]);
        $ext = [
            'forced_off'=>"1",
        ];
        $hx = new Easemob();
        $user = DB::name('apply')->alias('a')
            ->field('b.hx_username,a.room_id')
            ->join('anchor b','a.zhu_phone = b.anchor_phone')
            ->where(["a.room_id"=>$live["room_id"],''])
            ->find();
        $hx->sendText($user['hx_username'],$live['room_id'],"已被平台强制下线,如有问题,请联系平台!",$ext);   //给聊天室发消息
        echo $l_rs ? 1 : 2;
    }
    /**
     *@观看录播
     */
    public function play_record(){
        $id = input('id');
        $re = DB::name('LiveStore')->where(['live_store_id'=>$id])->find();
//        pre($re);die;
        $this->assign('re',$re);
        $this->view->engine->layout(false);
        return $this->fetch();
    }

    /**
     *@添加录播
     */
    public function add_play_record(){
        if(Request::instance()->isAjax()){
            $data = Request::instance()->post();
            $model = model('LiveStore');
            $result = $model->edit_record($data);
        }else{
            $anchor = DB::name("member")->field('member_id,username')->where(['is_del'=>1,'type'=>3])->select();
            $this->assign(['anchor'=>$anchor]);
            return $this->fetch();
        }
    }
    /**
     *@添加录播
     */
    public function add_merchants_record(){
        if(Request::instance()->isAjax()){
            $data = Request::instance()->post();
            $model = model('LiveStore');
            $result = $model->edit_record($data);
        }else{
            $anchor = DB::name("member")->alias('a')
                ->field('a.member_id,b.merchants_name')
                ->join('th_merchants b','a.member_id = b.member_id')
                ->where(['a.is_del'=>1,'a.type'=>2])
                ->select();
            $this->assign(['anchor'=>$anchor]);
            return $this->fetch();
        }
    }

    public function getAnchor(){
        $name = input('name');
        !empty($name)    &&  $map['username'] = ['like','%'.$name.'%'];
        $map['is_del'] = 1;
        $map['type'] = 3;
        $list = Db::name('Member')->where($map)->select();
        $code = '<option value="">请选择主播</option>';
        if($list){
            foreach($list as $k=>$v){
                $code .= "<option value=".$v['member_id'].">".$v['username']."</option>";
            }
        }
        echo $code;
    }

    public function getMerchants(){
        $name = input('name');
        !empty($name)    &&  $map['b.merchants_name'] = ['like','%'.$name.'%'];
        $map['a.is_del'] = 1;
        $map['a.type'] = 2;
        $list = DB::name("member")->alias('a')
            ->field('a.member_id,b.merchants_name')
            ->join('th_merchants b','a.member_id = b.member_id')
            ->where($map)
            ->select();
        $code = '<option value="">请选择商家</option>';
        if($list){
            foreach($list as $k=>$v){
                $code .= "<option value=".$v['member_id'].">".$v['merchants_name']."</option>";
            }
        }
        echo $code;
    }
    /**
     * @删除录播视频
     */
    public function del_live_store(){
        $id = input('ids');
        $result = DB::name('LiveStore')->where('live_store_id','in',$id)->delete();
        if($result){
            echo json_encode(array('status'=>'ok','info'=>'删除记录成功','url'=>session('url')));
        }else{
            echo json_encode(array('status'=>'error','info'=>'删除记录失败'));
        }
    }

    /**
     *@导购视频
     */
    public function video(){
        $map = array();
        !empty($_GET['username']) && $map['a.title|c.merchants_name|c.contact_name|c.contact_mobile'] = array("like","%".input('username')."%");
        if(!empty($_GET['start_time'])) $start_time = strtotime(input('start_time')); else $start_time = 0;
        if(!empty($_GET['end_time']))   $end_time = strtotime(input('end_time')); else $end_time = time();
        $map['a.intime'] = ['between',[$start_time,$end_time]];
        $map['a.is_del'] = 1;
        $num  = input('num');
        if (empty($num)){
            $num = 5;
        }
        $this->assign('nus',$num);
        $data= DB::name("Video")->alias('a')
            ->field("a.video_id,a.title,a.video_img,a.url,a.date,a.intime,a.is_shenhe,a.watch_nums,b.phone,b.username,c.merchants_name,c.merchants_img,c.contact_name,c.contact_mobile")
            ->join("__MERCHANTS__ c",'a.member_id = c.member_id',"LEFT")
            ->join("__MEMBER__ b","a.member_id = b.member_id",'LEFT')
            ->where($map)
            ->order('a.intime desc')
            ->paginate($num,false,["query"=>Request::instance()->param()]);
        $count = DB::name("Video")->alias('a')
            ->join("__MERCHANTS__ c",'a.member_id = c.member_id',"LEFT")
            ->join("__MEMBER__ b","a.member_id = b.member_id",'LEFT')
            ->where($map)
            ->count(); // 查询满足要求的总记录数;
        $page = $data->render();
        $this->assign(['list'=>$data,'count'=>$count,'page'=>$page]);
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        return $this->fetch();
    }

    /**
     *@修改审核状态
     */
    public function change_video_shenhe(){
        if(Request::instance()->isPost()){
            $id = input('id');
            $status = DB::name('Video')->where(['video_id'=>$id])->value('is_shenhe');
            $abs = 3 - $status;
            //$arr = ['默认状态','开启状态'];
            $result = DB::name('Video')->where(['video_id'=>$id])->update(['is_shenhe'=>$abs]);
            if($result){
                echo json_encode(array('status'=>'ok','info'=>$abs));
                exit;
            }else{
                echo json_encode(array('status'=>'error','info'=>'切换状态失败'));
                exit;
            }
        }
    }
    /**
     *@删除视频
     */
    public function del_video(){
        $id = input('ids');
        $data['video_id'] = ['in',$id];
        $user = DB::name('Video')->where($data)->update(['is_del'=>2]);
        if($user){
            echo json_encode(['status'=>"ok",'info'=>'删除记录成功!','url'=>session('url')]);
        }else{
            echo json_encode(['status'=>"error",'info'=>'删除记录失败!']);
        }
    }

    /**
     * @return mixed
     */
    public function add_video(){
        if(Request::instance()->isAjax()){
            $data = Request::instance()->post();
            $model = model('Video');
            $result = $model->edit($data);
        }else{
            $merchants = DB::name("member")->alias('a')
                ->field('a.member_id,b.merchants_name')
                ->join('th_merchants b','a.member_id = b.member_id')
                ->where(['a.is_del'=>1,'a.type'=>2])
                ->select();
            $this->assign(['merchants'=>$merchants]);
            return $this->fetch();
        }
    }

    /**
     * @return mixed
     */
    public function edit_video(){
        if(Request::instance()->isAjax()){
            $data = Request::instance()->post();
            $model = model('Video');
            $result = $model->edit($data);
        }else{
            $id = input('id');
            $re = Db::name('video')->where(['video_id'=>$id])->find();
            $this->assign(['re'=>$re]);
            $this->assign(['merchants'=>0]);
            return $this->fetch('live/add_video');
        }
    }
}