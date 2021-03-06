<?php
/**
 * Created by PhpStorm.
 * User: ljy
 * Date: 17/11/27
 * Time: 下午7:00
 */

namespace app\admin\model;

use think\Session;
use  think\Db;
class ArticleClass extends Common
{
    //只读字段
    protected $readonly = ['class_id'];

    protected $pk = 'class_id';   //设置主键
    public function edit($data){
        $validate = validate('ArticleClass');
        $valid = $validate->check($data, '');
        if(!$valid)            error($validate->getError());
        //$data['img'] = $this->domain($data['img']);
        if(empty($data['id'])){
            $data['intime'] = date('Y-m-d H:i:s',time());
            $result = $this->allowField(true)->save($data);
            $last_id = $this->class_id;
            $action = '新增';
            $this->isUpdate(true)->save(['sort'=>$last_id],[$this->pk=>$last_id]);
        }else{
            $data['uptime'] = date('Y-m-d H:i:s',time());
            $result = $this->allowField(true)->save($data,[$this->pk=>$data['id']]);
            $action = '编辑';
        }
        $url = Session::get('url');
        if ($result) {
            return success(['info' => $action . '资讯分类操作成功', 'url' => $url]);
        } else {
            return error($action . '资讯分类操作失败');
        }
    }

    /**
     * 软删除
     */
    public function soft_del($id){
        $data = [
            'is_del'        => '2'
        ];
        $result = $this->save($data,[$this->pk=>['in',$id]]);
        return $result;
    }

    /**
     * 真实删除
     */
    public function del($id){
        $result = $this->where([$this->pk=>['in',$id]])->delete();
        return $result;
    }

    /**
     *恢复数据
     */
    public function restore($id){
        $data = [
            'is_delete'        => '0',
        ];
        $result = $this->save($data,[$this->pk=>['in',$id]]);
        return $result;
    }

    /**
     *修改状态
     */
    public function change_status($id){
        $status = $this->where([$this->pk=>$id])->value('status');
        if(!$status)     return false;
        $abs = 3 - $status;
        //$arr = ['默认状态','开启状态'];
        $result = $this->save(['status'=>$abs],[$this->pk=>$id]);
        if($result){
            return $abs;
        }else{
            return false;
        }
    }

}