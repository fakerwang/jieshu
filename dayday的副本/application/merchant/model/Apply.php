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
class Member extends Common
{
    //只读字段
    protected $readonly = ['apply_id','merchants_id'];
    protected $pk = 'apply_id';   //设置主键

    /**
     * @param $data
     * @param string $scene
     */
    public function edit_member($data,$scene=''){
        $validate = validate('Apply');
        $valid = $validate->scene($scene)->check($data,'');
        if(!$valid){
            return error($validate->getError());
        }
        $data['cover_img'] = $this->domain($data['header_img']);
        $data['zi_img'] = $this->domain($data['zi_img']);
        if(empty($data['apply_id'])){
            $data['create_time'] = time();
            $action = '新增';
            $where = [];
        }else{
            if(!empty($data['password']))   $data['password'] = my_encrypt($data['password']);
            $data['uptime'] =   time();
            $action = '编辑';
            $where['member_id'] = $data['mid'];
        }
        $result = $this->allowField(true)->save($data,$where);
        $url = Session::get('url');
        if($result){
            if($type==1){
                return success(['info'=>$action.'用户操作成功','url'=>$url]);
            }elseif ($type==3){
                $anchor["update_time"] = date("Y-m-d H:s:i");
                $anchor["dashang_scale"] = empty($data["dashang_scale"])? $system_change_scale : $data["dashang_scale"];
                if( DB::name("anchor_info")->where(["anchor_id"=>$this->member_id])->find()){
                    DB::name("anchor_info")->where(["anchor_id"=>$this->member_id])->update($anchor);
                }else{
                    $anchor["create_time"]=date("Y-m-d H:s:i");
                    $anchor["anchor_id"] = $this->member_id;
                    DB::name("anchor_info")->insert($anchor);
                }
                return success(['info'=>$action.'主播操作成功','url'=>$url]);
            }
        }else{
            if($type==1){
                return success(['info'=>$action.'用户操作成功','url'=>$url]);
            }elseif ($type==3){
                return success(['info'=>$action.'主播操作成功','url'=>$url]);
            }
        }
    }

}