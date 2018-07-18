<?php
/**
 * Created by PhpStorm.
 * User: ljy
 * Date: 17/9/29
 * Time: 下午2:11
 */

namespace app\admin\model;
use lib\Easemob;
use think\Db;
use think\Session;
use lib\Page;
class Merchant extends Common
{
    //只读字段
    protected $readonly = 'day_id';
    protected $pk = 'day_id';   //设置主键
    public function add_merchants($params,$scene='')
    {
        $validate = validate('Merchant');
        $result = $validate->check($params);
        if (!$result) {
            error($validate->getError());
        }
        $merchant['company_province'] = Db::name('Areas')->where(array('id' => $params['sheng']))->value('name');
        $merchant['company_city'] = Db::name('Areas')->where(array('id' => $params['shi']))->value('name');
        $merchant['company_country'] = Db::name('Areas')->where(array('id' => $params['qu']))->value('name');
        //进行添加编辑判断
        $domain =  config("domain");
        $merchant['company_province'] ? $merchant['company_province'] : $merchant['company_province'] = '';
        $merchant['company_city'] ? $merchant['company_city'] : $merchant['company_city'] = '';
        $merchant['company_country'] ? $merchant['company_country'] : $merchant['company_country'] = '';
        if (empty($params['day_id'])) {
            $action = '新增';
            //商户扩展信息
            $merchant["company_user"] = $params["company_user"];//联系姓名
            $merchant["company_mobile"] = $params["company_mobile"];//联系电话
            $merchant["company_name"] = $params["company_name"];//公司名称
            $merchant["company_img"] = $domain.$params["company_img"];//店铺名称
            $merchant["quali_img"] = $domain.$params["quali_img"];//店铺名称
            $merchant["company_desc"] = $params["company_desc"];//店铺介绍
            $merchant['create_time'] = date("Y-m-d H:i:s");
            //商家经营分类
            $where = [];
        } else {
            empty($params["company_user"]) ? true : $merchant["company_user"] = $params["company_user"];//法人
            empty($params["company_name"]) ? true : $merchant["company_name"] = $params["company_name"];//公司名称
            empty($params["company_mobile"]) ? true : $merchant["company_mobile"] = $params["company_mobile"];//公司电话
            empty($params["company_img"]) ? true : $merchant["company_img"] = $params["company_img"];//公司logo
            empty($params["company_desc"]) ? true : $merchant["company_desc"] = $params["company_desc"];//店铺地址
            empty($params["quali_img"]) ? true : $merchant["quali_img"] = $params["quali_img"];//法人照片
            $merchant['update_time'] = date("Y-m-d H:i:s");
            $action = '编辑';
        }
        $url = Session::get('url');
        if(empty($params["day_id"])){
            Db::startTrans();
            try{
                $mres = DB::name("Daymer")->insert($merchant);
                Db::commit();
                return success(['info'=>$action.'用户操作成功','url'=>$url]);
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
                return error($action.'用户操作失败');
            }
        }else{
            $ares = DB::name("Daymer")->where(["day_id"=>$params["day_id"]])->update($merchant);
            if($ares){
                return success(['info'=>$action.'用户操作成功','url'=>$url]);
            }else{
                return error($action.'用户操作失败');
            }
        }
    }

    public function upgrade_merchants($param){
        $validate = validate('Merchants');
        $result = $validate->scene('upgrade')->check($param,'');
        if (!$result) {
            error($validate->getError());
        }
        $param['merchants_img'] = $this->domain($param['merchants_img']);
        $param['legal_img'] = $this->domain($param['legal_img']);
        $param['legal_face_img'] = $this->domain($param['legal_face_img']);
        $param['legal_opposite_img'] = $this->domain($param['legal_opposite_img']);
        $param['legal_hand_img'] = $this->domain($param['legal_hand_img']);
        $param['business_img'] = $this->domain($param['business_img']);
        $param['apply_state'] = '2';
        $result = $this->allowField(true)->save($param);
        if($result){
            Db::name('member')->where(['member_id'=>$param['member_id']])->update(['type'=>'2']);
            $url = Session::get('url');
            return success(['info'=>'用户升级操作成功','url'=>$url]);
        }else{
            return error('用户操作失败');
        }
    }

    /**
     * @param string $where
     * @param string $num
     * @return \think\paginator\Collection
     */

    //根据相关条件查询并分页
    public function queryMember($where = '',$num = ''){
        $list = $this->where($where)->order('intime desc')->paginate($num,false);
        return $list;
    }

    //查询单条会员数据
    public function queryMemberById($id){
        $re = $this->where(['member_id'=>$id])->find();
        return $re;
    }
}