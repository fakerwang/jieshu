<?php
namespace app\admin\controller;
use Think\Db;
use think\Request;
use think\Session;
use lib\Page;
use think\Validate;
class Merchant extends Base{

    /**
     * 获取天天直播商户
     */
    public function index(){
        $map=[];
        !empty($_GET['username']) && $map['company_user|company_name|company_mobile'] = ['like','%'.input('username').'%'];
        $map['is_del'] = 0;
        $num  = input('num');
        if (empty($num)){
            $num = 10;
        }
        $count = DB::name("Daymer")
            ->where($map)
            ->count();
        $this->assign("count",$count);
        $list = DB::name("Daymer")
            ->where($map)
            ->paginate($num,false);
        $url =$_SERVER['REQUEST_URI'];
        session('url',$url);
        $this->assign("list",$list);
        return $this->fetch();
    }


    /**
     *@改变分类状态
     */
    public function change_review(){
        if(Request::instance()->isAjax()){
            $id = input('id');
            $status = Db::name('daymer')->where(['day_id'=>$id])->value('company_type');
            $abs = 3 - $status;
            $arr = [];
            $result = Db::name('daymer')->where(['day_id'=>$id])->update(['company_type'=>$abs]);
            if($result){
                return success($arr[3-$status]);
            }else{
                return error('切换状态失败');
            }
        }
    }



    /**
     * 添加商户
     */
    public function  add_merchant(){
        if(request()->isAjax()) {
            $params = Request::instance()->param();
            $sheng = input('sheng');
            $shi = input('shi');
            $qu = input('qu');
            $params['company_province'] = Db::name('Areas')->where(array('id' => $sheng))->value('name');
            $params['company_city'] = Db::name('Areas')->where(array('id' => $shi))->value('name');
            $params['company_country'] = Db::name('Areas')->where(array('id' => $qu))->value('name');
            $params['company_province'] ? $params['company_province'] : $params['company_province'] = '';
            $params['company_city'] ? $params['company_city'] : $params['company_city'] = '';
            $params['company_country'] ? $params['company_country'] : $params['company_country'] = '';
            $merchants = model("Merchant");
            $merchants ->add_merchant($params);
        }else{
            $sheng = Db::name('Areas')->where(['level'=>1])->select();
            $re = array();
            $re['province']  = '';
            $re['shi'] = '';
            $re['qu']  = '';
            $this->assign(['sheng'=>$sheng,'re'=>$re]);
            return $this->fetch();
        }
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
