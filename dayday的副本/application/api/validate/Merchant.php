<?php
/**
 * Created by PhpStorm.
 * User: ljy
 * Date: 17/10/11
 * Time: 上午9:32
 */
namespace app\api\validate;
use think\Validate;
class Merchant extends Validate{
    protected $rule =   [
        //|regex:/^[\x{4e00}-\x{9fa5}]{2,10}$/u',
        'contact_name'              => 'require',//商户姓名
        'contact_mobile'         =>[
            "require",
            'unique'=>"merchants,contact_mobile",
            "length"=>11,
            "alphaNum"
        ],
        'company_name'           =>[
            'require',
            'unique'=>'merchants,company_name'
                                        ],
        'merchants_province'       =>'require',//店铺地址
        'merchants_city'           =>'require',//店铺地址
        'merchants_country'        =>'require',//店铺地址
        'company_desc'        =>'require',//公司简介
    ];
    protected $message  =   [
        'contact_name.require'                              => '请输入身份证上的姓名',

        'contact_mobile.unique'                             => '手机号已被使用',
        'contact_mobile.length'                             => '手机号码为11位数字1',
        'contact_mobile.num'                                => '手机号码为11位数字2',
        'contact_mobile.regex'                              => '请输入正确的手机号码',

        'company_name.require'                            =>'请输入公司名称',
        'company_name.unique'                             =>"公司名称已被使用",
        'merchants_province'                                =>'省份不能为空',
        'merchants_city'                                    =>'城市不能为空',
        'merchants_country'                                 =>'区县不能为空',
        'company_desc.require'                         =>"请输入公司简介",
    ];
}