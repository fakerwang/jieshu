<?php
/**
 * Created by PhpStorm.
 * User: ljy
 * Date: 17/9/27
 * Time: 上午10:19
 */

namespace app\admin\model;


use think\Db;
use think\Model;

class Common extends Model
{
    // 设置当前模型的数据库连接
    // 设置当前模型的数据库连接
//    protected $connection = [
//        // 数据库类型
//        'type'        => 'mysql',
//        // 服务器地址
//        'hostname'    => '127.0.0.1',
//        // 数据库名
//        'database'    => 'thinkphp',
//        // 数据库用户名
//        'username'    => 'root',
//        // 数据库密码
//        'password'    => '',
//        // 数据库编码默认采用utf8
//        'charset'     => 'utf8',
//        // 数据库表前缀
//        'prefix'      => 'think_',
//        // 数据库调试模式
//        'debug'       => false,
//    ];
    protected $domain_url;
    protected function initialize(){
        parent::initialize();
        $this->domain_url = config('domain');
    }

    protected function domain($url){
        if(strpos($url,'http://') !== false){
            return $url;
        }else{
            return $this->domain_url.$url;
        }
    }

    /**
     * 判断上传文件的宽高
     */
    public function judge_img($url){
        $live_type = Db::name('system')->where(['id'=>'1'])->value('live_type');
        if($live_type == '1'){
            $size = getimagesize($url);
            $width = $size[0];
            $height = $size[1];
            if($width > 750 | $width < 750){
                error('图片宽长度超过限制或低于这个限制');
            }
            if($height > 300 | $height < 300){
                error('图片高长度超过限制或低于这个限制');
            }
        }

    }
}