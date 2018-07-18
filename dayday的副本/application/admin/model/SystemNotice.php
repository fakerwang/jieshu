<?php
/**
 * Created by PhpStorm.
 * User: ljy
 * Date: 17/11/16
 * Time: 上午11:51
 */

namespace app\admin\model;

use think\Db;
use think\Session;
class SystemNotice extends Common
{
    //只读字段
    protected $readonly = ['id'];
    protected $pk = 'id';   //设置主键

    public function edit($data){
        if(!is_array($data['object'])){
            $data['object'] = explode(',',$data['object']);
        }
        foreach ($data['object'] as $v) {
            if (!empty($v)) {
                $object[] = $v;
            }
        }
        $data['object'] = join(',', $object);
        $validate = validate('SystemNotice');
        $valid = $validate->check($data,'');
        if(!$valid){
            return error($validate->getError());
        }

        if(empty($data['id'])){
            $data['intime'] = date("Y-m-d H:i:s",time());
            $id = Db::name('system_notice')->insertGetId($data);
            $action = '新增';
        }else{
            $data['uptime'] = date("Y-m-d H:i:s",time());
            $result = $this->allowField(true)->save($data,['id'=>$data['id']]);
            $action = '编辑';
        }
        $url = Session::get('url');
        if ($result || $id) {
            $res = Db::name('read_system')->select();
            if(isset($id)){
                foreach ($res as $k=>$v){
                    $a = json_decode($v['system_id']);
                    array_push($a,$id);
                    $d['system_id'] =json_encode($a);
                    $re = Db::name('read_system')->where(['user_id'=>$v['user_id']])->update($d);
                }
            }
            return success(['info' => $action . '公告操作成功', 'url' => $url]);
        } else {
            return error($action . '公告操作失败');
        }
    }

}