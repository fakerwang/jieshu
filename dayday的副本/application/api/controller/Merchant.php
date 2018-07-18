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
class Merchant extends Common{
    /**
     * 提交申请资料
     * @param
     * @param legal_img ; //法人照片
     * @param legal_hand_img; //手持身份证照
     * @param  legal_face_img //身份证正面
     * @params legal_opposite_img; //身份证反面
     */
    /**
     *用户提交信息验证
     */
    public function  message_authentication(){
        $user = $this->checklogin();
        //用户信息验证
        $params = Request::instance()->request();
        $validate = validate('Merchant');
        if(!$validate->check($params)){
            error($validate->getError());
        }else{
            success("验证成功");
        }
    }

    /**
     * 提交用户信息
     */
    public function  sub_material(){
        $domain =  config("domain");
        //用户信息验证
        $params = Request::instance()->request();
            $validate = validate('Merchant');
        if(!$validate->check($params)){
           error($validate->getError());
        }
        //证件验证
        $params["apply_state"] = 1;
        $params["create_time"] = date("Y-m-d H:i:s");
        $model = model('Merchants');
        if(!empty($params["business_img"])){
            $params['business_img']=$domain.$params["business_img"];
            $params['legal_img']=$domain.$params["legal_img"];
            $re = $model->edit_merchants($params);
            if($re){
                success("提交成功，请等待审核");
            }else{
                error("提交失败，请核对信息");
            }
        }else{
            if($params["legal_img"]){
                $re = $model->edit_merchants($params);
                if($re){
                    success("提交成功，请等待审核");
                }else{
                    error("提交失败，请核对信息");
                }
            }else{
                error("提交失败，请核对信息");
            }
        }
    }

    /**
     *获取提交信息
     */
    public function  material_info(){
        $user = $this->checklogin();
        $list = DB::name("merchants")->where('member_id',$user["member_id"])
                                ->column('business_number,merchants_id,merchants_name,contact_name,contact_mobile,merchants_address,business_img,legal_img,legal_hand_img,legal_face_img,legal_opposite_img,apply_state,pay_state','member_id');
        //押金支付信息
        $deposit = DB::name("system")->where("id",1)->value("deposit");
        $data = $list[$user["member_id"]];
        $data["deposit"] = $deposit;
        success($data);
    }
    /**
     * 上传证件
     */
    public function upload(){
        $up = new Upload();
        $up->upload("Documen");
    }
    /**
     * 经营分类
     */
    public function operate_class(){
        $user = $this->checklogin();
        $params = Request::instance()->param();
        //全部分类
        $data = ["class_state"=>1,'is_delete'=>0];
        $all_list = DB::name("goods_class")->field("class_name,class_id")->where($data)->select();
        if(!empty($params["operate_class"])){
            //修改商户经营分类
            $update["class_id"]=$params['operate_class'];
            $update['intime'] = date("Y-m-d H:i:s", time());
            if(DB::name("goods_merchants_class")->where("member_id",$user["member_id"])->find()){
                $res = DB::name("goods_merchants_class")->where("member_id",$user["member_id"])->update($update);
            }else{
                $update["member_id"]=$user["member_id"];
                $res = DB::name("goods_merchants_class")->where("member_id",$user["member_id"])->insert($update);
            }
            if(!$res){
                error("修改分类失败，请重新尝试修改");
            }
        }
        //商家选择已选的分类
        $class_id = DB::name("goods_merchants_class")->where("member_id",$user["member_id"])->value('class_id');
        $class_array = explode(",",$class_id);
        foreach ($all_list as $k=>$v){
            if(in_array($v["class_id"],$class_array)){
                $all_list[$k]["type"] = 1;
            }else{
                $all_list[$k]["type"] = 2;
            }
        }
        //$oper_list = DB::name("goods_class")->field("class_name,class_id")->where('class_id','in',$class_id)->select();
        success($all_list);
    }
    /**
     *清除已选经营分类
     */
    public function clean_class(){
        $user = $this->checklogin();
        $re = DB::name("goods_merchants_class")->where("member_id",$user["member_id"])->update(["class_id"=>0]);
        if($re){
            success("经营分类已清除完，建议您重新选择");
        }else{
            error("经营分类清除失败,请重新新尝试清除");
        }
    }
    /**
     * 商户入驻协议
     */
    public function agreement(){
        $id = input("id");
        $data = ["id"=>$id,'is_del'=>1];
        $content = DB::name("notice")->where($data)->value('content');
        $content = htmlspecialchars_decode($content);
        $this->assign(['content'=>$content]);
        return $this->fetch();
    }

    public function ajax_agreement(){
        $id = input("id");
        $data = ['id'=>$id,'is_del'=>1];
        $content = DB::name("notice")->where($data)->value('content');
//        $content = htmlspecialchars_decode($content);
        success($content);
    }

    /**
     *商户商品分类
     */
    public function merchants_class()
    {
        if (Request::instance()->isPost()) {
            $member = $this->checklogin();
            $array[] = ['class_id'=>'','class_name'=>'全部','class_uuid'=>''];
            $merchants_id = $member['member_id'];//商家商户id
            if (!$merchants_id) error("商户店铺id不能为空");
            $list = Db::name('goods_merchants_class')->alias('a')
                ->field('b.class_id,b.class_name,b.class_uuid')
                ->join('th_goods_class b', 'FIND_IN_SET(b.class_id,a.class_id)')
                ->where(['a.member_id' => $merchants_id, 'b.is_delete' => 0])
                ->select();
            if(!empty($list)){
                $list = array_merge($array,$list);
            }
            return success($list);
        }
    }

    /**
     *商户分类商品
     */
    public function merchants_class_goods()
    {
        if (Request::instance()->isPost()) {
            $member = $this->checklogin();
            $merchants_id = $member['member_id'];//商家商户id
            if (!$merchants_id) error("商户店铺id不能为空");
            $p = input('p');
            empty($p) && $p = 1;
            $pageSize = input('pagesize');
            $pageSize ? $pageSize : $pageSize = 10;
            $class_uuid = input('class_uuid');
            if ($class_uuid){
                $class = Db::name('goods_class')->where(['class_uuid' => $class_uuid])->find();
                if (!$class) error("商户分类id错误");
                $where['parent_class|seed_class'] = $class['class_id'];
            }
//            $where['b.merchants_id'] = $merchants_id;
            $where['is_delete'] = '0';
            $where['goods_state'] = '1';
            $where['is_review'] = '1';
            $list = Db::name('goods')
                ->field('goods_id,goods_name,goods_img,goods_origin_price,goods_pc_price,goods_now_price')
                ->where($where)->order('is_tuijian desc,sort desc,create_time asc')
                ->page($p, $pageSize)->select();
            $count = Db::name('goods')->where($where)->count();
            $page = ceil($count / $pageSize);
            return success(['page' => $page, 'list' => $list]);
        }
    }

    /**
     *直播商品
     */
    public function live_goods(){
        $apply_id = input('apply_id');
        if(!$apply_id)       error("直播错误");
        $list = Db::name('app_good')
            ->where(['apply_id'=>$apply_id])
            ->select();
        success($list);
    }

    /**
     *商品置顶与取消
     */
    public function operateGoodsTop(){
        $apply_id = input('apply_id');
        $goods_id = input('goods_id');
        $check = Db::name('app_good')->where(['goods_id'=>$goods_id,'apply_id'=>$apply_id])->find();
        if(!$check)        error("直播错误");
        if($check['goods_type'] == '0'){
            $is_top = '1';
        }else{
            $is_top = '0';
        }
        $result = Db::name('app_good')->where(['apply_id'=>$apply_id,'goods_id'=>$goods_id])->update(['goods_type'=>$is_top,'uptime'=>time()]);
        if($result){
            $map['apply_id'] = $apply_id;
            $map['goods_id'] = ['<>',$goods_id];
            Db::name('app_good')->where($map)->update(['goods_type'=>'0']);
            success("操作成功");
        }else{
            error("操作失败");
        }
    }
    public function delGoods(){
        $goods_id = input('goods_id');
        $apply_id = input('apply_id');
        $result = Db::name('app_good')->where(['goods_id'=>$goods_id,'apply_id'=>$apply_id])->delete();
        if($result){
            success("操作成功");
        }else{
            error("操作失败");
        }
    }

    /**
     * 重新加载商品列表
     */
    public function app_goods(){
        $apply_id = input('apply_id');
        if(empty($apply_id))  error("apply_id传值错误");
        $goods = Db::name('app_paimai')->where(['apply_id'=>$apply_id])->select();
        $arr = [];
        foreach ($goods as $a=>$b){
            $arr[] = $b['paimai_id'];
        }
        $goods = implode(',',$arr);
        if($goods){
            success($goods);
        }else{
            error('没有拍卖商品');
        }
    }

    /**
     * 删除拍卖商品
     */
    public function del_pai_goods(){
        $apply_id = input('apply_id');
        if(empty($apply_id))  error("apply_id传值错误");
        $paimai_id = input('paimai_id');
        if(empty($paimai_id))  error("paimai_id传值错误");
        $res = Db::name('app_paimai')->where(['apply_id'=>$apply_id,'paimai_id'=>$paimai_id])->delete();
        if($res){
            success('删除成功');
        }else{
            error('删除失败');
        }

    }


    /**
     * 删除拍卖商品2
     */
    public function del_pai_good(){
        $paimai_id = input('paimai_id');
        if(empty($paimai_id))  error("paimai_id传值错误");
        $res = Db::name('app_paimai')->where(['paimai_id'=>$paimai_id])->delete();
        if($res){
            success('删除成功');
        }else{
            error('删除失败');
        }

    }

    /**
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */

    public function delAllGoods(){
        $member = $this->checklogin();
        $live_id = input('live_id');
        $result = Db::name('live_goods')->where(['live_id'=>$live_id,'member_id'=>$member['member_id']])->update(['is_delete'=>'1']);
        if($result){
            success("操作成功");
        }else{
            error("操作失败");
        }
    }

    /**
     * 添加商户
     */
    public function  add_merchant(){
            $data["gl_merchants_id"] = input("merchants_id");
            if(!$data['gl_merchants_id'])  error("请填写公司ID");
            $re = Db::name('merchants')->where(['gl_merchants_id'=>$data['gl_merchants_id'],'is_delete'=>'0'])->find();
            if(!$re){
                $data["company_name"] = input("company_name");
                if(!$data['company_name'])  error("请填写公司名");
                $data["contact_name"] = input("contact_name");
                if(!$data['contact_name'])  error("请填写公司联系人");
                $data["contact_mobile"] = input("contact_mobile");
                if(!$data['contact_mobile'])  error("请填写公司联系人号码");
                $data["merchants_province"] = input("merchants_province");
                if(!$data['merchants_province'])  error("请填写公司所在省");
                $data["merchants_city"] = input("merchants_city");
                if(!$data['merchants_city'])  error("请填写公司所在城市");
                $data["merchants_country"] = input("merchants_country");
                if(!$data['merchants_country'])  error("请填写公司所在区");
                $data['merchants_address'] = $data['merchants_province'].''.$data['merchants_city'].''.$data['merchants_country'];
                $company_img = input("business_img");
                if(!$company_img)  error("请选择公司logo");
                $quali_img = input("legal_img");
                if(!$quali_img)  error("legal_img请选择公司资质图片");
                $quali_img2 = input("legal_img2");
                $quali_img3 = input("legal_img3");
                $quali_img4 = input("legal_img4");
                $quali_img5 = input("legal_img5");
                $data["business_img"] = $company_img;
                $data["legal_img"] = $quali_img;
                if(!empty($quali_img2)){
                    $data["legal_img2"] = $quali_img2;
                }else{
                    $data["legal_img2"] = '';
                }
                if(!empty($quali_img3)){
                    $data["legal_img3"] = $quali_img3;
                }else{
                    $data["legal_img3"] = '';
                }
                if(!empty($quali_img4)){
                    $data["legal_img4"] = $quali_img4;
                }else{
                    $data["legal_img4"] = '';
                }
                if(!empty($quali_img5)){
                    $data["legal_img5"] = $quali_img5;
                }else{
                    $data["legal_img5"] = '';
                }
                $data["company_desc"] = input("company_desc");
                if(!$data['company_desc'])  error("请填写公司描述");
                $data["create_time"] = time();
                $re1 = Db::name('merchants')->where(['contact_mobile'=>$data['contact_mobile']])->find();
                if(!$re1){
                    $res = Db::name("merchants")->insert($data);
                    if($res){
                        success("添加成功");
                    }else{
                        error("添加失败");
                    }
                }else{
                    error('商家重复');
                }

            }else{
                error('您已添加申请过了');
            }



    }

     /**
	 * 添加商户
	 */
	public function  merchant_data(){
		$merchants_id = input('merchants_id');
		if(!$merchants_id)       error("merchants_id参数错误");
		$list = Db::name('merchants')
			->field("company_name,contact_name,contact_mobile,merchants_province,merchants_city,merchants_country,business_img,legal_img,company_desc,gl_merchants_id")
			->where(['gl_merchants_id'=>$merchants_id])
			->select();
		success($list);
	}

	/**
     * 审核商户的结果
     */
	public function merchant_result(){
	    $merchants_id = input('uid');
	    if(!$merchants_id)  error('参数错误');
	    $re = Db::name('merchants')->field('apply_state')->where(['gl_merchants_id'=>$merchants_id,'is_delete'=>'0'])->find();
	    if($re){
	        success($re);
        }else{
	        error('没有这个商家');
        }
    }

    public function apply_info(){
	    $apply_id = input('apply_id');
        if(!$apply_id)  error('参数错误');
        $list = Db::name('apply')
                ->field('apply_id,title')
                ->where(['is_shenhe'=>['in','2,4,6'],'apply_id'=>$apply_id])
                ->find();
	     if($list){
	         success($list);
         }else{
	         error('活动不存在');
         }
    }



    //生成带logo的二维码
    public function qcode_dong(){
	    $logo = 'https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=3431633315,3276770162&fm=27&gp=0.jpg';
        $url4 = 'http://daylive.tstmobile.com/uploads//image/banner/20180712/f54ea3e83f80e91861eeea5c5db41e54.jpeg';
        $model = model('OrderRefund');
        $re = $model->code($logo,$url4);
        pre($re);die;
    }

}