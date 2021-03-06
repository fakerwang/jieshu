<?php
/**
 * Created by PhpStorm.
 * User: ljy
 * Date: 17/11/7
 * Time: 下午6:00
 */

namespace app\api\model;

use think\Validate;
class OrderRefund extends Common
{
    //只读字段
    protected $readonly = ['refund_id','member_id','order_merchants_id'];

    protected $pk = 'refund_id';   //设置主键

    public function edit($data){
        if(empty($data['refund_id'])){
            $data['refund_state'] = 'wait_review';
            $data['create_time'] = date("Y-m-d H:i:s",time());
            $result = $this->allowField(true)->save($data);
        }
        return $result;
    }

    public function code($logo,$url4){
        $qrcode_path4 = "/qrcode/" . time() . rand(100, 999) . '_qrcode.png';
        $path4 = qrcodeLogo($url4, $logo, './' . $qrcode_path4, 8, 9);
//        $a = 'http://daylive.tstmobile.com' . $path4;
        $b = $this->domain($path4);
        return $b;
    }
}