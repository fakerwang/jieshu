<?php
/**
 * Created by PhpStorm.
 * User: ljy
 * Date: 17/9/29
 * Time: 下午2:10
 */

namespace app\admin\controller;
use Think\Db;
use think\Request;
use think\Session;
use lib\Page;
class Anchor extends Base
{
    /**
     *@主播列表
     * 主播 type:3
     */
    public function index(){
        $params = Request::instance()->param();
        !empty($params['username']) && $map['username|phone'] = ['like','%'.$params['username'].'%'];
        $map['type'] = 3;
        $map['is_del'] = 1;
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        $count = Db::name('Member')->where($map)->count();
        $list = model('Member')->queryMember($map,$num,$params);
        $page = $list->render($count);
        $this->assign(['list'=>$list,'count'=>$count,'page'=>$page]);
        $url =$_SERVER['REQUEST_URI'];
        Session::set('url',$url);
        return $this->fetch();
    }
    /**
     * 主播type:3
     */
    public function is_del_anchor(){
        $params = Request::instance()->param();
        !empty($params['nickname']) && $map['username|phone'] = $params['nickname'];
        $map['is_del'] = 2;
        $map['type'] = 3;
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        $count = Db::name('Member')->where($map)->count();
        $list = model('Member')->queryMember($map,$num,$params);
        $page = $list->render($count);
        $this->assign(['list'=>$list,'count'=>$count,'page'=>$page]);
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        return $this->fetch();

    }
    /**
     *@添加主播,
     */
    public function add_anchor(){
        if(request()->isAjax()) {
            $data = Request::instance()->post();
            $tag=implode(',',$data["tag"]);
            $model = model('Member');
            $data['uuid'] = get_guid();
            $data["live_tag"] = $tag;
            $result = $model->edit_member($data,3);
        }else{
            $sheng = Db::name('Areas')->where(['level'=>1])->select();
            $re = array();
            $re['province']  = '';
            $re['shi'] = '';
            $re['qu']  = '';
            //获取主播直播标签
            $list= DB::name("live_class")->where("is_del",1)->order("sort desc")->select();
            $this->assign('class',$list);
            $this->assign(['sheng'=>$sheng,'re'=>$re]);
            return $this->fetch();
        }
    }
    /**
     *@编辑主播
     */
    public function edit_anchor(){
        $id = input('mid');
        $re = model('Member')->queryMemberById($id);
        if(request()->isAjax()) {
            $data = Request::instance()->post();
            $tag=implode(',',$data["tag"]);
            $re['uuid']     ?   $data['uuid'] = $re['uuid'] :   $data['uuid'] = get_guid();
            $model = model('Member');
            $data['member_id'] = $data['mid'];
            $data["live_tag"] = $tag;
            $result = $model->edit_member($data,3,'edit');
        }else{
            //省
            $sheng = Db::name('Areas')->where("level=1")->select();
            $this->assign('sheng',$sheng);
            if(!empty($re)) {
                $fid = Db::name('Areas')->where(array('name' => $re['province'], 'level' => 1))->value('id');
                if ($fid) {
                    $data['pid'] = $fid;
                    $data['level'] = 2;
                    $re['shi'] = Db::name('Areas')->where($data)->select();  //市
                } else {
                    $re['shi'] = null;
                }
                $fid2 = Db::name('Areas')->where(array('name' => $re['city'], 'level' => 2))->value('id');
                if ($fid2) {
                    $date['pid'] = $fid2;
                    $date['level'] = 3;
                    $re['qu'] = Db::name('Areas')->where($date)->select();  //区
                } else {
                    $re['qu'] = null;
                }
                $re['city_id'] = Db::name('Areas')->where(array('name' => $re['city'], 'level' => 2))->value('id');
                $re['area_id'] = Db::name('Areas')->where(array('name' => $re['area'], 'level' => 3))->value('id');
            }
            //获取主播直播标签
            $list= DB::name("live_class")->field("live_class_id,tag")->where("is_del",1)->order("sort desc")->select();
            $live_tag = explode(',',$re["live_tag"]);
            foreach ($list as $k=>$v){
                if(in_array($v["live_class_id"],$live_tag)){
                    $list[$k]["is_selected"] = 1;
                }else{
                    $list[$k]["is_selected"] = 0;
                }
            }
            $this->assign("class",$list);
            $this->assign(['re'=>$re]);
            return $this->fetch('anchor/add_anchor');
        }
    }

    /**
     * @删除主播
     */
    public function del_anchor(){
        $id = input('ids');
        $data['member_id'] = ['in',$id];
        $anchor = DB::name('Member')->where($data)->update(['is_del'=>2]);
        if($anchor){
            echo json_encode(['status'=>"ok",'info'=>'删除记录成功!','url'=>session('url')]);
        }else{
            echo json_encode(['status'=>"error",'info'=>'删除记录失败!']);
        }
    }
    /**
     * @恢复主播
     */
    public function recovery_anchor(){
        $id = input('ids');
        $data['member_id'] = ['in',$id];
        $anchor = DB::name('Member')->where($data)->update(['is_del'=>1]);
        if($anchor){
            echo success(['status'=>"ok",'info'=>'恢复成功!','url'=>session('url')]);
        }else{
            echo success(['status'=>"error",'info'=>'恢复失败!']);
        }
    }
    /**
     * 真删除主播
     */
    public function del_anchor_true(){
        $id = input("ids");
        $data["member_id"] = ["in",$id];
        $anchor = DB::name('Member')->where($data)->delete();
        if($anchor){
            echo json_encode(['status'=>"ok",'info'=>'商户删除后无法恢复!','url'=>session('url')]);
        }else{
            echo json_encode(['status'=>"error",'info'=>'删除失败!']);
        }
    }
    /**
     * @会员详情
     */
    public function anchor_view(){
        $mid    =   input('mid');
        $view = DB::name('Member')->find($mid);
        //主播
        $view["get_ticket"] = DB::name("give_gift")->where(["user_id2"=>$view["member_id"]])->sum("e_ticket");
        $system = DB::name("system")->where(["id"=>1])->find();
        $withdraw_scale = $system["convert_scale4"]/$system["convert_scale3"];
        $view["get_money"] = $view["e_ticket"]*$withdraw_scale;
        $view["withdraw_money"] = DB::name("withdraw")->where(["status"=>3,"user_id"=>$view["member_id"]])->sum("money");
        $this->assign(['view'=>$view]);
        $type = input('type');
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        switch($type){
            case 1:       //充值
                $map['member_id'] = $mid;
                $page=input("get.p");
                $data=DB::name("Recharge")
                    ->field('pay_number,amount,pay_type,intime,meters')
                    ->where($map)
                    ->order('intime desc')
                    ->paginate(10,false);
                $count =DB::name("Recharge")->where($map)->count(); // 查询满足要求的总记录数
                $sum = DB::name('Recharge')->where($map)->sum('amount');
                $tag = '充值总额';
                $this->assign(['list'=>$data,'sum'=>$sum,'tag'=>$tag,'mid'=>$mid,'type'=>$type]);
                break;
            case 2://提现
                $count = DB::name('Withdraw')->where(['user_id' => $mid])->count();//一共有多少条记录
                $data = DB::name('Withdraw')->where(['user_id' => $mid])->order('intime desc')->paginate(10,false);
                $tag = '提现总额';
                $this->assign(['list'=>$data,'tag'=>$tag,'mid'=>$mid,'type'=>$type]);
                break;
            case 6:       // 粉丝
                $map=[];
                $map['a.user_id2']   =  $mid;
                $count = DB::name('Follow')->alias('a')
                    ->join('__MEMBER__ b', 'a.user_id2=b.member_id')
                    ->where($map)
                    ->count();//一共有多少条记录
                $list = DB::name('Follow')->alias('a')
                    ->field('a.*,b.username,b.phone')
                    ->join('__MEMBER__ b','a.user_id2=b.member_id')
                    ->where($map)
                    ->order('a.intime desc')
                    ->paginate($num,false);
                $this->assign(['list'=>$list,"mid"=>$mid,'type'=>$type]);
                break;
            case 5:         //关注
                $map=[];
                $map['a.user_id']   =  $mid;
                $count = DB::name('Follow')->alias('a')
                    ->join('__MEMBER__ b','a.user_id2=b.member_id')
                    ->where($map)
                    ->count();//一共有多少条记录
                $data = DB::name('Follow')->alias('a')
                    ->field('a.*,b.username,b.phone')
                    ->join('__MEMBER__ b', 'a.user_id2=b.member_id')
                    ->order('a.intime desc')
                    ->paginate(10,false);
                $tag = "关注总人数";
                $this->assign(['list'=>$data,'tag'=>$tag,'mid'=>$mid,'type'=>$type]);
                break;
            case 7:        //送礼
                $map=[];
                $map['a.user_id']   =  $mid;
                $count = DB::name('Give_gift')->alias('a')
                    ->join('__LIVE__ b','a.live_id=b.live_id','LEFT')
                    ->join('__MEMBER__ c','a.user_id2=c.member_id','LEFT')
                    ->join('__GIFT__ d','a.gift_id=d.gift_id','LEFT')
                    ->where($map)
                    ->count();//一共有多少条记录
                $list = DB::name('Give_gift')->alias('a')
                    ->field('a.*,b.title,c.username,c.phone,d.name')
                    ->join('__LIVE__ b','a.live_id=b.live_id','LEFT')
                    ->join('__MEMBER__ c','a.user_id2=c.member_id','LEFT')
                    ->join('__GIFT__ d','a.gift_id=d.gift_id','LEFT')
                    ->where($map)
                    ->order('a.intime desc')
                    ->paginate(10,false);
                $sum = DB::name('Give_gift')->alias('a')
                    ->join('__LIVE__ b','a.live_id=b.live_id','LEFT')
                    ->join('__MEMBER__ c','a.user_id2=c.member_id','LEFT')
                    ->join('__GIFT__ d','a.gift_id=d.gift_id','LEFT')
                    ->where($map)->sum('a.jewel');
                $tag = '送礼总额';
                $this->assign(['list'=>$list,'tag'=>$tag,'mid'=>$mid,'type'=>$type]);
                break;
            case 8:       //收礼
                $map=[];
                $map['a.user_id2']   =  $mid;
                $count = DB::name('Give_gift')->alias('a')
                    ->join('__LIVE__ b','a.live_id=b.live_id','LEFT')
                    ->join('__MEMBER__ c', 'a.user_id=c.member_id','LEFT')
                    ->join('__GIFT__ d' ,'a.gift_id=d.gift_id','LEFT')
                    ->where($map)
                    ->count();//一共有多少条记录
                $list = DB::name('Give_gift')->alias('a')
                    ->join('__LIVE__ b','a.live_id=b.live_id','LEFT')
                    ->join('__MEMBER__ c', 'a.user_id=c.member_id','LEFT')
                    ->join('__GIFT__ d' ,'a.gift_id=d.gift_id','LEFT')
                    ->where($map)
                    ->order('a.intime desc')
                    ->paginate($num,false);
                $sum = DB::name('Give_gift')->alias('a')
                    ->join('__LIVE__ b','a.live_id=b.live_id','LEFT')
                    ->join('__MEMBER__ c', 'a.user_id=c.member_id','LEFT')
                    ->join('__GIFT__ d' ,'a.gift_id=d.gift_id','LEFT')
                    ->where($map)->sum('a.jewel');
                $tag = '收礼总额';
                $this->assign(['list'=>$list,'sum'=>$sum,'tag'=>$tag,"type"=>$type]);
                break;
            case 9://直播列表
                $map=[];
                $map['a.user_id']   =  $mid;
                $count = DB::name('Live')->alias('a')
                    ->join('__MEMBER__ b on a.user_id=b.member_id')
                    ->where($map)->count();//一共有多少条记录
                $list = DB::name('Live')->alias('a')
                    ->field("a.*")
                    ->join('__MEMBER__ b on a.user_id=b.member_id')
                    ->where($map)
                    ->order('a.intime desc')
                    ->paginate($num,false);
                foreach ($list as $k => $v) {
                    $gift_count = DB::name('Give_gift')->where(['live_id' => $v['live_id']])->sum('jewel');
                    $gift_count ? $list[$k]['gift_count'] = $gift_count : $list[$k]['gift_count'] = '0';
                }
                $this->assign(['list'=>$list]);
                break;
            case 10://录播列表
                $map = [];
                $map['a.user_id'] = $mid;
                $map['a.is_del'] = '1';
                $count = DB::name('Live_store')->alias('a')
                    ->join('__MEMBER__ b','a.user_id=b.member_id','LEFT')
                    ->join('__LIVE__ c','a.live_id=c.live_id','LEFT')
                    ->where($map)
                    ->count();//一共有多少条记录
                $list = DB::name('Live_store')->alias('a')
                    ->field('a.*,b.username,b.header_img,b.sex,b.phone,b.ID,c.title')
                    ->join('__MEMBER__ b','a.user_id=b.member_id','LEFT')
                    ->join('__LIVE__ c','a.live_id=c.live_id','LEFT')
                    ->where($map)
                    ->order('a.intime desc')
                    ->paginate($num,false);
                $this->assign(['list'=>$list,'type'=>$type]);
                break;
        }
        $this->assign(["type"=>$type,'mid'=>$mid]);
        return $this->fetch();
    }
    /**
     * @获取市
     */
    public function get_area(){
        $value = input('value');
        $type = input('type');
        if (isset($value)){
            if ($type==1){
                $data['level'] = 2;
                $data['pid'] = array('eq',$value);
                $type_list="<option value=''>请选择（市）</option>";
                $shi = Db::name('Areas')->where($data)->select();
            }else {
                $data['level'] = 3;
                $data['pid'] = array('eq',$value);
                $type_list="<option value=''>请选择（区/县）</option>";
                $shi = Db::name('Areas')->where($data)->select();
            }
            foreach($shi as $k=>$v){
                $type_list.="<option value=".$shi[$k]['id'].">".$shi[$k]['name']."</option>";
            }
            echo $type_list;
        }
    }
}