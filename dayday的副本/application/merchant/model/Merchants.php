<?php
/**
 * Created by PhpStorm.
 * User: ljy
 * Date: 17/10/31
 * Time: 下午4:14
 */

namespace app\merchant\model;

use think\Db;
use think\Request;
use think\Session;
class Merchants extends Common
{
    //只读字段
    protected $readonly = ['merchants_id','member_id'];

    protected $pk = 'merchants_id';   //设置主键

    public function check($data){
        $validate = validate('Merchants');
        $valid = $validate->check($data);
        if(!$valid){
            return error($validate->getError());
        }

        $data['apply_state'] = '1';
        $data['merchants_img'] = $this->domain($data['merchants_img']);
        $data['legal_img'] = $this->domain($data['legal_img']);
        $data['legal_face_igmg'] = $this->domain($data['legal_face_img']);
        $data['legal_opposite_img'] = $this->domain($data['legal_opposite_img']);
        $data['legal_hand_img'] = $this->domain($data['legal_hand_img']);
        $data['business_img'] = $this->domain($data['business_img']);
        $result = $this->allowField(true)->isUpdate(true)->save($data,['merchants_id'=>$data['merchants_id']]);
        if($result !==false){
//            $member = Merchants::get($data['merchants_id']);
//            Db::name('member')->where(['member_id'=>$member['member_id']])->update(['type'=>1]);
//            $class_id = join(',',$data['goods_class']);
//            $check = Db::name('goods_merchants_class')->where(['member_id'=>$member['member_id']])->find();
//            if($check){
//                Db::name('goods_merchants_class')->where(['member_id'=>$member['member_id']])->update(['class_id'=>$class_id]);
//            }else{
//                $merchants_class['class_id'] = $class_id;
//                $merchants_class['member_id'] = $member['member_id'];
//                $merchants_class['intime'] = date("Y-m-d H:i:s",time());
//                Db::name('goods_merchants_class')->insert($merchants_class);
//            }
            success(array('info'=>'编辑成功','url'=>Session::get('url')));
        }else{
            error("编辑失败");
        }
    }
}