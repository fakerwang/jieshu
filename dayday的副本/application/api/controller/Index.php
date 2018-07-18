<?php
namespace app\api\controller;
use think\Controller;
use think\View;
use think\Db;
use opensearch;
use \think\Session;
use \think\Request;

class Index extends Common
{
    //轮播
    public function banner_list(){
        /****轮播****/
        $type = input('type');
        $type ? $map['type'] = $type : $map['type'] = '1';
        $map['is_del'] = '1';
        $map['status'] = '2';
        $map['is_del'] = '1';
        $list = Db::name('Banner')->field("b_id,b_img,url,b_type,title,jump")
            ->where($map)->order("sort asc")->select();
        if(!empty($list)){
            foreach($list as &$v){
                switch($v['b_type']){
                    case 1:
                        $v['jump'] = '';
                        break;
                    case 2:
                        $v['jump'] = $v['url'];
                        break;
                    case 3:
                        $v['jump'] = $v['url'];
                        break;
                    case 4:
                        $v['jump'] = $v['value'];
                        break;
                }
            }
        }else{
            $list = [];
        }
        return success($list);
    }


    /**
     *@轮播web跳转页
     */
    public function banner_url(){
        $b_id = input('id');
        $content = Db::name('Banner')->where(['b_id'=>$b_id])->value('content');
        $this->assign(['content'=>htmlspecialchars_decode($content)]);
        return $this->fetch();
    }


    public function share_live(){
        $apply_id = input('apply_id');
        if(empty($apply_id))        error("参数错误");
        $re = Db::name('apply')->field('is_shenhe')->where(['apply_id'=>$apply_id])->find();
        if($re['is_shenhe']=='2'){
            $live = Db::name('apply')->alias('a')
                ->field('a.*,d.contact_name,d.business_img,d.gl_merchants_id,d.company_name')
                ->join("th_merchants d","a.merchants_id = d.gl_merchants_id")
                ->where(['a.apply_id'=>$apply_id])
                ->find();
            $live['play_address_m3u8'] = $live['url'];
            if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')||strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')){
                $url = 'https://itunes.apple.com/cn/app/天天展播/id1230012812?mt=8';
            }else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android')){
                $url = 'http://daylive.tstmobile.com/download/daylive-user.apk';
            }
            $live['down_url'] =$url;
            $this->assign(['live'=>$live]);
            return $this->fetch();
        }elseif ($re['is_shenhe']=='4'){
            $live = Db::name('live')->alias('a')
                ->field('a.*,b.*,d.contact_name,d.business_img,d.gl_merchants_id,d.company_name')
                ->join('th_apply b','a.room_id = b.room_id')
                ->join("th_merchants d","b.merchants_id = d.gl_merchants_id")
                ->where(['b.apply_id'=>$apply_id])
                ->find();
            if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')||strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')){
//                $url = 'https://itunes.apple.com/cn/app/天天展播/id1230012812?mt=8';
                $url = 'https://itunes.apple.com/us/app/id1405349268';
            }else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android')){
                $url = 'http://daylive.tstmobile.com/download/daylive-user.apk';
            }
//            $live['down_url'] = 'http://file.qqyswh.com/daylive-user.apk';
            $live['down_url'] = $url;
            $this->assign(['live'=>$live]);
            return $this->fetch();
        }elseif ($re['is_shenhe']=='6'){
            $live = Db::name('live_store')->alias('a')
                ->field('a.*,b.*,d.contact_name,d.business_img,d.gl_merchants_id,d.company_name')
                ->join('th_apply b','a.room_id = b.room_id')
                ->join("th_merchants d","b.merchants_id = d.gl_merchants_id")
                ->where(['b.apply_id'=>$apply_id])
                ->find();
            $live['play_address_m3u8'] = $live['url'];
            if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')||strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')){
                $url = 'https://itunes.apple.com/us/app/id1405349268';
//                $url = 'https://itunes.apple.com/cn/app/天天展播/id1230012812?mt=8';
            }else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android')){
                $url = 'http://daylive.tstmobile.com/download/daylive-user.apk';
            }
//            $live['down_url'] = 'http://file.qqyswh.com/daylive-user.apk';
            $live['down_url'] = $url;
            $this->assign(['live'=>$live]);
            return $this->fetch();
        }

    }



}
