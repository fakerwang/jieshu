<?php
/**
 * Created by PhpStorm.
 * User: lx
 * Date: 2018/3/6
 * Time: 上午10:09
 */
namespace app\api\controller;
use lib\Easemob;
use lib\Upload;
use think\Controller;
use think\View;
use think\Db;
use opensearch;
class Merchants extends common{
    /**
     * 添加商户
     */
    public function  add_merchant(){
        $domain =  config("domain");
        $data["company_name"] = input("company_name");
        $data["company_mobile"] = input("company_mobile");
        $data["company_user"] = input("company_user");
        $data["sheng"] = input("sheng");
        $data["city"] = input("city");
        $data["country"] = input("country");
        $company_img = input("company_img");
        $quali_img = input("quali_img");
        $data["company_img"] = $domain.$company_img;
        $data["quali_img"] = $domain.$quali_img;
        $data["company_desc"] = input("company_desc");
        $data["create_time"] = time();
        $res = Db::name("Daymer")->insert($data);
        if($res){
            success("添加成功");
        }else{
            error("添加失败");
        }
    }

}