<?php
/**
 * Created by PhpStorm.
 * User: ljy
 * Date: 17/9/22
 * Time: 下午5:20
 */

return [
    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------
    // 定义空控制器
    'empty_controller'      => 'MyError',
    //模版设置
    'template'               => [
        // 模板引擎类型 支持 php think 支持扩展
        'type'         => 'Think',
        // 模板路径
        'view_path'    => '',
        // 模板后缀
        'view_suffix'  => 'html',
        // 模板文件名分隔符
        'view_depr'    => DS,
        // 模板引擎普通标签开始标记
        'tpl_begin'    => '{',
        // 模板引擎普通标签结束标记
        'tpl_end'      => '}',
        // 标签库标签开始标记
        'taglib_begin' => '{',
        // 标签库标签结束标记
        'taglib_end'   => '}',
        'layout_on'    => true,
        'layout_name'  => 'layout'
    ],

    //分页设置
    'paginate'               => [
        'type'      => 'lib\Page',
        'var_page' => 'p',
        'list_rows' => 15,
    ],
    'session'                => [
        'id'             => '',
        // SESSION_ID的提交变量,解决flash上传跨域
        'var_session_id' => '',
        // SESSION 前缀
        'prefix'         => 'dspx_merchant',
        // 驱动方式 支持redis memcache memcached
        'type'           => '',
        // 是否自动开启 SESSION
        'auto_start'     => true,
        'expire'         => '36000'
    ],

    //导航菜单
    'nav' => [
        [
            'menu' => [

                [
                'title' => '店铺信息',
                'name' => 'Index/merchant',
                'icon' => ''
                ],
                [
                    'title' => '粉丝列表',
                    'name' => 'Apply/fans',
                    'icon' => ''
                ],
            ],
            'title'=>'商家管理',
            'icon'=>'',
        ],
        [
            'menu'=>[
                [
                    'title' => '未审列表',
                    'name' => 'Apply/index',
                    'icon' => ''
                ],
                [
                    'title' => '活动列表',
                    'name' => 'Apply/apply_list',
                    'icon' => ''
                ],

            ],
            'title'=>'申请活动',
            'icon'=>'&#xe628;',
        ],
        [
            'menu'=>[
                [
                    'title' => '直播列表',
                    'name' => 'Live/merchants_live_list',
                    'icon' => ''
                ],
                [
                    'title' => '录播列表',
                    'name' => 'Live/merchants_record',
                    'icon' => ''
                ]
            ],
            'title'=>'直播管理',
            'icon'=>'&#xe628;',
        ],
        [
            'menu' => [
                [
                    'title' => '主播列表',
                    'name' => 'Role/index',
                    'icon' => ''
                ],
                [
                    'title' => '拍卖师列表',
                    'name' => 'Role/auctioneer',
                    'icon' => ''
                ],
                [
                    'title' => '场控列表',
                    'name' => 'Role/control_list',
                    'icon' => ''
                ],
            ],
            'title'=>'主播管理',
            'icon'=>'',
        ],


    ]
];