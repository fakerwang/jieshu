<?php
/**
 * Created by PhpStorm.
 * User: ljy
 * Date: 17/9/29
 * Time: 下午2:32
 */

namespace app\admin\validate;
use think\Validate;
class Merchants extends Validate
{
    protected $rule = [
        'company_mobile'  => [
            'require',
            'length'=>11,
            'unique'=>'company_mobile',
            'number',
            'regex' => '/^1(3[0-9]|4[57]|5[0-35-9]|8[0-9]|70|71|73|74|75|76|77|78)\d{8}$/'
        ],
        "company_mobile"             =>'require',//联系电话
        "company_name"               =>'require',//公司名称
        "company_user"            =>'require',//公司电话
        'company_province'      => 'require',
        'company_city'      => 'require',
        'company_country'      => 'require',
        "company_img"        =>'require',//公司logo
        "quali_img"            =>'require',//公司资质
        "company_desc"         =>'require',//公司介绍
//        "token"                =>'require',
    ];
    protected  $message = [
        'company_mobile.require'                      => '用户账户不能为空',
        'company_mobile.length'                       => '用户账号字符长度错误',
        'company_mobile.number'                       => '用户账号字符必须是数字',
        'company_mobile.unique'                       => '此手机号已存在',
        'company_mobile.regex'                        => '用户账号不满足手机号规则',
        "company_name.require"           =>"请输入公司名称",
        "company_name.unique"            =>"此公司已存在",
        "company_user.require"             =>"请输入联系姓名",
        "company_img.require"            =>'请上传店铺logo',
        'company_province.require'       => '省份必须选择',
        'company_city.require'       => '城市必须选择',
        'company_country.require'       => '区域必须选择',
        "company_desc.require"        =>'请输入店铺介绍',
//        "token.require"               =>"请输入公司的token",
        "day_id.require"             =>"用户信息错误",
    ];
    //添加验证场景
    protected $scene = [
        'login'   =>  ['company_mobile','password'],
        'add'     =>  [
            'company_mobile'=>  [
                'require',
                'unique'=>'member,phone',
                'length'=>11,
                'number',
                'regex' => '/^1(3[0-9]|4[57]|5[0-35-9]|8[0-9]|70|71|73|74|75|76|77|78)\d{8}$/'
            ]
        ],
        'edit' =>  [
            'company_mobile'=>  [
                'require',
                'unique'=>'member,phone^member_id',
                'length'=>11,
                'number',
                'regex' => '/^1(3[0-9]|4[57]|5[0-35-9]|8[0-9]|70|71|73|74|75|76|77|78)\d{8}$/'
            ]
        ],
        'upgrade' => [
            "day_id"             =>'require',//用户信息
            "company_mobile"             =>'require',//联系电话
            "company_name"               =>'require',//公司名称
            "company_user"            =>'require',//公司电话
            'company_province'      => 'require',
            'company_city'      => 'require',
            'company_country'      => 'require',
            "company_img"        =>'require',//公司logo
            "quali_img"            =>'require',//公司资质
            "company_desc"         =>'require',//公司介绍
        ]
    ];
}