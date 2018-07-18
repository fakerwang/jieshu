<?php
/**
 * Created by PhpStorm.
 * User: lx
 * Date: 2018/3/6
 * Time: 下午2:58
 */
namespace app\admin\controller;
use think\Db;
use think\Request;
use think\Session;
use lib\Page;
use lib\Easemob;
use think\Validate;
class Screen extends Base{
    /*
     * 屏幕列表
     *
     */
    public function screen_list(){
        $map = [];
        $name = input('wid_hei');
        $model = input('model');
        !empty($name) &&  $map['b.wid_hei'] = ['like', '%' . $name . '%'];
        !empty($model) &&  $map['b.model'] = ['like', '%' . $model . '%'];
        $map['a.is_del'] = '0';
        $num = input('num');
        if (empty($num)) {
            $num = 10;
        }
        $this->assign('nus', $num);
        $count = Db::name('screen')->alias('a')
            ->join("screen_class b",'a.screen_class_id = b.screen_class_id')
            ->where($map)->count();
        $data = Db::name("screen")->alias('a')
            ->join("screen_class b",'a.screen_class_id = b.screen_class_id')
            ->where($map)
            ->paginate($num,false,$config = ['query'=>array('name'=>$name,'model'=>$model)]);
        $page = $data->render();
		$re = Db::name("screen_class")->select();
        $this->assign(['list' => $data, 'page' => $page,'re'=>$re,'count'=>$count]);
        $url = $_SERVER['REQUEST_URI'];
        session('url', $url);
        return $this->fetch();
    }

    /**
     *添加屏幕
     */
	public function add_screen(){
		if(Request::instance()->isPost()){
			$params = Request::instance()->param();
            $rule = [
                'screen_class_id'              => 'require',
                'Mac_address'      => 'require',
                'desc'       =>'require',
            ];
            $message = [
                'screen_class_id.require'            => '请选择型号',
                'Mac_address.require'            => '请填写大屏mac',
                'desc.require'                => '请填写备注',

            ];
            $validate = new Validate($rule,$message);
            $result   = $validate->check($params);
            if(!$result){
                error($validate->getError());
            }
			$params["create_time"] = time();
            $chars = "abcdefghijklmnopqrstuvwxyz123456789";
            mt_srand(10000000*(double)microtime());
            for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < 12; $i++){
                $str .= $chars[mt_rand(0, $lc)];

            }
            $hx_password="123456";
            $hx = new Easemob();
            $result = $hx->huanxin_zhuce($str,$hx_password); //环信注册
            if(!$result){
                error("授权注册失败");
            }
            $params['hx_username'] = $str;
            $params['hx_password'] = $hx_password;
            $re = Db::name('screen')->where(['Mac_address'=>$params['Mac_address']])->find();
            if(!$re){
                $res = DB::name("screen")->insert($params);
                if($res){
                    success(array('status'=>'ok','info'=>'添加成功','url'=>session('url')));
                }else{
                    success(array('status'=>'ok','info'=>'添加失败','url'=>session('url')));
                }
            }else{
                error('MAC地址重复');
            }

		}else{
		   $res = Db::name("screen_class")->select();
		   $this->assign(["res"=>$res]);
		   return $this->fetch();
		}
	}

	/**
	 * 编辑屏幕
	 */
	public function edit_screen(){
		$id = input("screen_id");
		if(Request::instance()->isPost()){
			$params = Request::instance()->param();
			$params['update_time'] = time();
			$res = DB::name("screen")->where("screen_id",$id)->update($params);
			if($res){
				success(array('status'=>'ok','info'=>'修改成功','url'=>session('url')));
			}else{
				success(array('status'=>'ok','info'=>'修改失败','url'=>session('url')));
			}
		}else{
			$list = DB::name("screen")->where("screen_id",$id)->find();
			$screen = DB::name("screen_class")->select();
			$this->assign("re",$list);
			$this->assign("screen",$screen);
			return $this->fetch("");
		}
	}
	/**
	 *@删除屏幕列表
	 */
	public function del_screen(){
		if(Request::instance()->isPost()) {
			$id = input('ids');
			$result = DB::name('screen')->where('screen_id','in',$id)->update(['is_del'=>1]);
			if ($result) {
				echo json_encode(['status' => "ok", 'info' => '删除记录成功!', 'url' => session('url')]);
			} else {
				echo json_encode(['status' => "error", 'info' => '删除记录失败!']);
			}
		}
	}

    /**
	 * 直播标签管理
	 */
	public function screen_class(){
		$count = DB::name("screen_class")->where("is_del",0)->count();
		$list= DB::name("screen_class")->where("is_del",0)->select();
		$this->assign("count",$count);
		$this->assign("list",$list);
		$url = $_SERVER['REQUEST_URI'];
		session("url",$url);
		return $this->fetch();
	}
	/**
	 * 添加直播标签
	 */
	public function add_class_tag(){
		if(Request::instance()->isPost()){
			$params = Request::instance()->param();
            $rule = [
                'model'              => 'require',
                'wid_hei'      => 'require',
                'touch'       =>'require',
                'screen_price'       =>'require',
                'screen_color'       =>'require',
                'img'       =>'require',
            ];
            $message = [
                'model.require'            => '请填写型号',
                'wid_hei.require'            => '请填写大屏尺寸',
                'touch.require'                => '请选择是否支持触摸',
                'screen_price.require'                => '请填写价格',
                'screen_color.require'                => '请填写大屏颜色',
                'img.require'                => '请上传大屏图片',

            ];
            $validate = new Validate($rule,$message);
            $result   = $validate->check($params);
            if(!$result){
                error($validate->getError());
            }
			$params["create_time"] = time();
			if($params['img'] == ''){
			    $params['img'] = 'http://daylive.tstmobile.com/uploads//image/goods/20180530/03ecfe0609d1ba4641b977fc312ad030.png';
            }
			$res = DB::name("screen_class")->insert($params);
			if($res){
				success(array('status'=>'ok','info'=>'添加成功','url'=>session('url')));
			}else{
				success(array('status'=>'ok','info'=>'添加失败','url'=>session('url')));
			}
		}else{
		   return $this->fetch();
		}
	}
	/**
	 * 编辑直播标签
	 */
	public function edit_class_tag(){
		$id = input("screen_class_id");
		if(Request::instance()->isPost()){
			$params = Request::instance()->param();
            $rule = [
                'model'              => 'require',
                'wid_hei'      => 'require',
                'touch'       =>'require',
                'screen_price'       =>'require',
                'screen_color'       =>'require',
                'touch'       =>'require',
            ];
            $message = [
                'model.require'            => '请填写型号',
                'wid_hei.require'            => '请填写大屏尺寸',
                'touch.require'                => '请选择是否支持触摸',
                'screen_price.require'                => '请填写价格',
                'screen_color.require'                => '请填写大屏颜色',
                'touch.require'                => '请选择大屏触摸方式',

            ];
            $validate = new Validate($rule,$message);
            $result   = $validate->check($params);
            if(!$result){
                error($validate->getError());
            }
			$params['update_time'] = time();
			$res = DB::name("screen_class")->where("screen_class_id",$id)->update($params);
			if($res){
				success(array('status'=>'ok','info'=>'修改成功','url'=>session('url')));
			}else{
				success(array('status'=>'ok','info'=>'修改失败','url'=>session('url')));
			}
		}else{
			$list = DB::name("screen_class")->where("screen_class_id",$id)->find();
			$this->assign("re",$list);
			return $this->fetch("screen/add_class_tag");
		}
	}
	/**
	 * 删除标签
	 */
	public function del_live_tag(){
		$id = input("ids");
		$result = DB::name('screen_class')->where("screen_class_id","in",$id)->delete();
		if($result){
			echo json_encode(array('status'=>'ok','info'=>'删除记录成功','url'=>session('url')));
		}else{
			echo json_encode(array('status'=>'error','info'=>"删除记录失败"));
		}
	}
}