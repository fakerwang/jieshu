<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:75:"/mnt2/data/dayday/public/../application/merchant/view/apply/edit_apply.html";i:1530089951;s:65:"/mnt2/data/dayday/public/../application/merchant/view/layout.html";i:1520221433;s:73:"/mnt2/data/dayday/public/../application/merchant/view/common/_header.html";i:1528536599;s:71:"/mnt2/data/dayday/public/../application/merchant/view/common/_menu.html";i:1520221433;s:73:"/mnt2/data/dayday/public/../application/merchant/view/common/_footer.html";i:1520221433;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <LINK rel="Bookmark" href="/favicon.ico" >
    <LINK rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/static/html5.js"></script>
    <script type="text/javascript" src="/static/respond.min.js"></script>
    <script type="text/javascript" src="/static/PIE-2.0beta1/PIE_IE678.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/base.css" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/static/Hui-iconfont/1.0.7/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/static/icheck/icheck.css" />
    <link rel="stylesheet" type="text/css" href="/static/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/base.css" />
    <!--<link rel="stylesheet" href="/assets/js/asyncbox/skins/default.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="/assets/js/bootstrap-datepicker/css/bootstrap-datetimepicker.css"/>-->
    <script src="https://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/static/My97DatePicker/4.8/WdatePicker.js"></script>

    <!--[if IE 6]>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>商户管理后台</title>
</head>
<body>
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl">
            <a class="logo navbar-logo f-l mr-10 hidden-xs" href="javascript:;;">商户管理后台</a>
            <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="javascript:;;">商户管理后台</a>
            <!--<span class="logo navbar-slogan f-l mr-10 hidden-xs">v2.4</span>-->
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <!--<nav class="nav navbar-nav">-->
                <!--<ul class="cl">-->
                    <!--<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>-->
                        <!--<ul class="dropDown-menu menu radius box-shadow">-->
                            <!--<li><a href="<?php echo url('Goods/insert_goods'); ?>"><i class="Hui-iconfont">&#xe620;</i> 商品</a></li>-->
                            <!--<li><a href="<?php echo url('Index/add_video'); ?>"><i class="Hui-iconfont">&#xe60f;</i> 视频</a></li>-->
                            <!--<li><a href="<?php echo url('Index/merchant'); ?>"><i class="Hui-iconfont">&#xe616;</i> 信息</a></li>-->
                        <!--</ul>-->
                    <!--</li>-->
                <!--</ul>-->
            <!--</nav>-->
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>
                            <?php echo $user['title']; ?>
                    </li>
                    <li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo $user['username']; ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <!--<li><a href="#">个人信息</a></li>-->
                            <li><a href="<?php echo url('Login/sign_out'); ?>">切换账户</a></li>
                            <li><a href="<?php echo url('Login/sign_out'); ?>">退出</a></li>
                            <!--<li><a href="<?php echo url('Login/live'); ?>">切换环境</a></li>-->
                        </ul>
                    </li>
                    <li id="Hui-msg"> <a href="javascript:;;" class="check_auth" data-action="<?php echo url('Chat/kefu'); ?>" title="消息">
                        <span class="badge badge-danger"></span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a>
                    </li>
                    <li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="绿色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<aside class="Hui-aside" style="position:fixed;">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">
		<?php if(is_array($nav) || $nav instanceof \think\Collection): $key = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
		<dl id="menu-article">
			<dt menu_key="<?php echo $key; ?>"><i class="Hui-iconfont"><?php echo (isset($vo['icon']) && ($vo['icon'] !== '')?$vo['icon']:"&#xe616;"); ?></i> <?php echo $vo['title']; ?><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd class="hide  _menu<?php echo $key; ?>">
				<ul>
					<?php if(is_array($vo['menu']) || $vo['menu'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo['menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k): $mod = ($i % 2 );++$i;?>
					<li><a href="<?php echo url($k['name']); ?>" title="<?php echo $k['title']; ?>"><?php echo $k['title']; ?></a></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</dd>
		</dl>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<div class="ml170" id="page-content" style="min-height:100%">
    <?php echo widget('base/breadcrumbs',[
[
['href'=>url('Live/apply_list'),'text'=>'审核列表'],
['href'=>'','text'=>$text]
]
]); ?>
<style>
    .ibutton { padding: 3px 15px; *padding: 0 15px; *height: 24px;  font-size: 12px; text-align: center; text-shadow: #CF510B 0 1px 0; border:1px solid #ec5c0d; border-radius: 2px; background: #FC750A; background-image: -webkit-linear-gradient(top, #fc8746, #ec5d0e); color:#FFF; cursor: pointer; display: inline-block; }
    /*a  upload */
    .a-upload {
        padding: 4px 10px;
        /*height: 20px;*/
        line-height: 20px;
        position: relative;
        cursor: pointer;
        color: #888;
        background: #fafafa;
        border: 1px solid #ddd;
        border-radius: 4px;
        overflow: hidden;
        display: inline-block;
        *display: inline;
        *zoom: 1
    }

    .a-upload  input {
        position: absolute;
        font-size: 100px;
        right: 0;
        top: 0;
        opacity: 0;
        filter: alpha(opacity=0);
        cursor: pointer
    }

    .a-upload:hover {
        color: #444;
        background: #eee;
        border-color: #ccc;
        text-decoration: none
    }
    .tan-chuang{
        width: 100px;
        height: 100px;
        position: relative;
    }
    *{ margin:0px; padding:0px; font-family:Microsoft Yahei; box-sizing:border-box; -webkit-box-sizing:border-box;}
    .ul_pics{ float:left;}
    .ul_pics li{float:left; margin:0px; padding:0px; margin-left:5px; margin-top:5px; position:relative; list-style-type:none; border:1px solid #eee;}
    .ul_pics li img{width:80px;height:80px;}
    .ul_pics li i{ position:absolute; top:0px; right:-1px; background:red; cursor:pointer; font-style:normal; font-size:10px; width:14px;
        height:14px; text-align:center; line-height:12px; color:#fff;}
    .progress{position:relative;  background:#eee;height:15px;line-height:15px;}
    .bar {background-color: green; display:block; width:0%; height:15px; }
    .percent{ height:15px;  text-align:center;  left:0px; color:#666; line-height:15px; font-size:12px; }
</style>

<div class="page-container">
    <div id="big"></div>
    <div id="big2"></div>
    <form class="form form-horizontal" id="form" method="post">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>商家ID：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span><?php echo $data['gl_merchants_id']; ?></span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>商家名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span><?php echo $data['company_name']; ?></span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>选择主播：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box" style="width: 33%">
                    <select name="zhu_phone"  class="select">
                        <option value="">请选择</option>
                        <?php if(is_array($res) || $res instanceof \think\Collection): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['anchor_phone']; ?>" <?php if($re['zhu_phone'] == $vo['anchor_phone']): ?>selected<?php else: endif; ?>><?php echo $vo['anchor_name']; ?>&nbsp&nbsp&nbsp<?php echo $vo['anchor_phone']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
				</span>
                <!--<a href="javascript:;;" class="btn btn-primary radius" onclick="add_anchor('添加主播（First）','<?php echo url('Apply/add_anchor'); ?>','4','','510')" >-->
                <!--<i class="Hui-iconfont">&#xe600;</i>添加主播-->
                <!--</a>-->
                <!--<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:0px;margin-right: 330px;" onclick="ajax_data" title="刷新" >-->
                <!--<i class="Hui-iconfont">&#xe68f;</i>-->
                <!--</a>-->
            </div>

        </div>
        <!--<div class="row cl">-->
            <!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>直播专场：</label>-->
            <!--<div class="formControls col-xs-8 col-sm-9">-->
                <!--<span class="select-box" style="width: 33%">-->
                    <!--<select name="zhuan_type"  class="select" disabled>-->
                        <!--<option value="">请选择</option>-->
                        <!--<option value="1">是</option>-->
                        <!--<option value="2">否</option>-->
                    <!--</select>-->
				<!--</span>-->
            <!--</div>-->
        <!--</div>-->
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>场控数：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" disabled class="input-text" name ="control_num" value="<?php echo !empty($re['control_num'])?$re['control_num']:''; ?>"  id="control_num" style="width: 50%" />
            </div>
        </div>
        <!--<div class="row cl">-->
        <!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>选择大屏：</label>-->
        <!--<div class="formControls col-xs-8 col-sm-9">-->
        <!--<span class="select-box" style="width: 33%">-->
        <!--<select name="screen_id" onchange="area_linke2(this.value)" class="select">-->
        <!--<option value="">请选择</option>-->
        <!--<?php if(is_array($re1) || $re1 instanceof \think\Collection): $i = 0; $__LIST__ = $re1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
        <!--<option value="<?php echo $vo['screen_id']; ?>" <?php if($re['screen_id'] == $vo['screen_id']): ?>selected<?php else: endif; ?>><?php echo $vo['position']; ?></option>-->
        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
        <!--</select>-->
        <!--</span>-->
        <!--</div>-->
        <!--</div>-->
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>直播类型：</label>
            <div class="formControls col-xs-8 col-sm-9">
                  <span class="select-box" style="width: 33%">
                    <select name="class_id"  class="select">
                        <option value="">请选择</option>
                        <?php if(is_array($home_class) || $home_class instanceof \think\Collection): $i = 0; $__LIST__ = $home_class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['title']; ?>" <?php if($re['status'] == $vo['id']): ?>selected<?php else: endif; ?>><?php echo $vo['title']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
				</span>
            </div>
        </div>
        <!--<div class="row cl skin-minimal">-->
            <!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>直播标签：</label>-->
            <!--<div class="formControls col-xs-8 col-sm-9">-->
                <!--<?php if(is_array($live_class) || $live_class instanceof \think\Collection): $i = 0; $__LIST__ = $live_class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                <!--<div class="check-box">-->
                    <!--<input type="radio" id="checkbox-2" name="class_id" value="<?php echo $vo['live_class_id']; ?>"<?php if($vo['live_class_id'] == $re['class_id']): ?>checked<?php endif; ?>><?php echo $re['tag']; ?>-->
                    <!--<label for="checkbox-2"><?php echo $vo['tag']; ?></label>-->
                <!--</div>-->
                <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
            <!--</div>-->
        <!--</div>-->
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>直播标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" name ="title" value="<?php echo !empty($re['title'])?$re['title']:''; ?>"  id="title" style="width: 50%" />
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>开播时间段：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text " placeholder="开始时间" id="start_time" style="width:190px" name="start_time" value="<?php echo date('Y-m-d H:i:s',$re['start_time']); ?>" readonly>: <input type="text" class="input-text " placeholder="结束时间" id="end_time" style="width:190px" name="end_time" value="<?php echo date('Y-m-d H:i:s',$re['end_time']); ?>" readonly>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>直播封面：</label>
            <label  id="image_show" style="margin-left: 10px;">宽高：750px，300px；大小：不超过1M</label>

            <div class="formControls col-xs-8 col-sm-9">
                <div class="droparea spot" id="image1" style="background-image: url('<?php echo $re['cover_img']; ?>');background-size: 220px 160px;" >
                    <div class="instructions" onclick="del_image('1')">删除</div>
                    <div id="uparea1"></div>
                    <input type="hidden" name="cover_img" id="image_1" value="<?php echo $re['cover_img']; ?>" />
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>主播资质：</label>
            <label  id="image_show1" style="margin-left: 10px;">宽高：750px，300px；大小：不超过1M</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="droparea spot" id="logo_img" style="background-image: url('<?php echo !empty($anchor['user_img'])?$anchor['user_img']:''; ?>');background-size: 220px 160px;" >
                    <div class="instructions">主播资质</div>
                    <div id="logo"></div>
                    <input type="hidden" name="user_img" id="logo_url" value="<?php echo !empty($anchor['user_img'])?$anchor['user_img']:''; ?>" />
                </div>
                <div class="droparea spot" id="image6" style="background-image: url('<?php echo !empty($anchor['user_img2'])?$anchor['user_img2']:''; ?>');background-size: 220px 160px;" >
                    <div class="instructions">主播资质</div>
                    <div id="uparea6"></div>
                    <input type="hidden" name="user_img2" id="image_6" value="<?php echo !empty($anchor['user_img2'])?$anchor['user_img']:''; ?>" />
                </div>
                <div class="droparea spot" id="image3" style="background-image: url('<?php echo !empty($anchor['user_img3'])?$anchor['user_img3']:''; ?>');background-size: 220px 160px;" >
                    <div class="instructions">主播资质</div>
                    <div id="uparea3"></div>
                    <input type="hidden" name="user_img3" id="image_3" value="<?php echo !empty($anchor['user_img3'])?$anchor['user_img3']:''; ?>" />
                </div>
                <div class="droparea spot" id="image4" style="background-image: url('<?php echo !empty($anchor['user_img4'])?$anchor['user_img4']:''; ?>');background-size: 220px 160px;" >
                    <div class="instructions">主播资质</div>
                    <div id="uparea4"></div>
                    <input type="hidden" name="user_img4" id="image_4" value="<?php echo !empty($anchor['user_img4'])?$anchor['user_img4']:''; ?>" />
                </div>
                <div class="droparea spot" id="image5" style="background-image: url('<?php echo !empty($anchor['user_img5'])?$anchor['user_img5']:''; ?>');background-size: 220px 160px;" >
                    <div class="instructions">主播资质</div>
                    <div id="uparea5"></div>
                    <input type="hidden" name="user_img5" id="image_5" value="<?php echo !empty($anchor['user_img5'])?$anchor['user_img5']:''; ?>" />
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">直播简介：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="apply_content" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,200)"><?php echo $re['apply_content']; ?></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
            </div>
        </div>
        <?php if($re['status'] == '3'): ?>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>拍卖证书：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <?php echo widget('Base/ueditor',['content',$re['content']]); ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>大屏地址：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span><?php echo $re['address']; ?></span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">大屏型号：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span><?php echo $screen['model']; ?></span>
                <span style="margin-left: 50px;">大屏尺寸：<?php echo $screen['wid_hei']; ?></span>
                <span style="margin-left: 50px;">大屏颜色：<?php echo $screen['screen_color']; ?></span>
                <span style="margin-left: 50px;">支持触碰：
                    <?php switch($name=$screen['touch']): case "0": ?>否<?php break; case "1": ?>是<?php break; endswitch; ?></span>
                <span style="margin-left: 50px;">大屏数：1个</span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span></label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="droparea spot" id="image2" style="background-image: url('<?php echo $screen['img']; ?>');background-size: 220px 160px;" >
                    <div class="instructions">大屏图片</div>
                    <div id="uparea2"></div>
                    <input type="hidden"  name="" id="image_2" value="<?php echo $screen['img']; ?>" />
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">大屏MAC：</label>
            <input id="screen_id" type="hidden" class="input-text" value=""  name="screen_id">
            <span>
                <button type="button" class="btn btn-primary btn-lg" disabled data-toggle="modal" data-target="#myModal">
                选择大屏
                </button>
                <div class="modal fade bs-example-modal-lg" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">选择大屏(单选)</h4>
                        </div>
                        <div class="modal-body">
                    <table border="1" cellpadding="0" cellspacing="0" width="100%" class="table_index1" id="table_user_list">
                        <thead>
                <tr class="text-c">
                    <th width="20" style="text-align: center"><input type="radio" name="" value=""></th>
                    <th width="20" style="text-align: center">序号</th>
                    <th width="50" style="text-align: center">型号</th>
                    <th width="30" style="text-align: center">大屏尺寸</th>
                    <th width="40" style="text-align: center">支持触摸</th>
                    <th width="40" style="text-align: center">MAC地址</th>
                    <th width="40" style="text-align: center">租用价格(单位)</th>
                    <!--<th width="40">商家名称</th>-->
                    <th width="40" style="text-align: center">备注</th>
                    <!--<th width="40">状态</th>-->
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($screen_list) || $screen_list instanceof \think\Collection): $i = 0; $__LIST__ = $screen_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="text-c" id="goods_id<?php echo $vo['screen_id']; ?>">
                    <td><input type="radio" model="<?php echo $vo['model']; ?>" wid_hei="<?php echo $vo['wid_hei']; ?>" touch="<?php echo $vo['touch']; ?>" Mac_address="<?php echo $vo['Mac_address']; ?>" screen_price="<?php echo $vo['screen_price']; ?>" desc="<?php echo $vo['desc']; ?>" value="<?php echo $vo['screen_id']; ?>" name="checkbox"></td>
                    <td><?php echo $vo['screen_id']; ?></td>
                    <td><?php echo $vo['model']; ?></td>
                    <td><?php echo $vo['wid_hei']; ?></td>
                    <td>
                        <?php switch($name=$screen['touch']): case "1": ?>否<?php break; case "2": ?>是<?php break; endswitch; ?>
                    </td>
                    <td><?php echo $vo['Mac_address']; ?></td>
                    <td><?php echo $vo['screen_price']; ?></td>
                    <!--<td><?php echo $vo['desc']; ?></td>-->
                    <td><?php echo $vo['desc']; ?></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
                </table>
                        </div>
                        <div class="modal-footer" >
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="button" class="btn btn-primary"   onclick="screen_add()"  value="">保存</button>
                        </div>
                        </div>
                    </div>
                </div>
            </span>
        </div>
        <div class="cl pd-30 bg-1 bk-gray mt-10" style="margin-left: 100px">
            <table class="table table-border table-bordered table-hover table-bg table-sort">
                <thead>
                <tr class="text-c">
                    <th width="20" style="text-align: center">序号</th>
                    <th width="50" style="text-align: center">型号</th>
                    <th width="30" style="text-align: center">大屏尺寸</th>
                    <th width="40" style="text-align: center">支持触摸</th>
                    <th width="40" style="text-align: center">MAC地址</th>
                    <th width="40" style="text-align: center">租用价格(单位)</th>
                    <th width="40" style="text-align: center">备注</th>
                </tr>
                </thead>
                <tbody id="showthis">
                <?php if(is_array($screen_list) || $screen_list instanceof \think\Collection): $i = 0; $__LIST__ = $screen_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="text-c">
                    <td><?php echo $vo['screen_id']; ?></td>
                    <td><?php echo $vo['model']; ?></td>
                    <td><?php echo $vo['wid_hei']; ?></td>
                    <td>
                        <?php switch($name=$screen['touch']): case "1": ?>否<?php break; case "2": ?>是<?php break; endswitch; ?>
                    </td>
                    <td><?php echo $vo['Mac_address']; ?></td>
                    <td><?php echo $vo['screen_price']; ?></td>
                    <td><?php echo $vo['desc']; ?></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
        <!--<div class="row cl">-->
        <!--<label class="form-label col-xs-4 col-sm-2">图片：</label>-->
        <!--<div class="formControls col-xs-8 col-sm-9">-->
        <!--<div class="droparea spot" id="image2" style="background-image: url('<?php echo $re['video_img']; ?>');background-size: 220px 160px;" >-->
        <!--<div class="instructions" onclick="del_image('1')">删除</div>-->
        <!--<div id="uparea2"></div>-->
        <!--<input type="hidden" name="video_img" id="image_2" value="<?php echo $re['video_img']; ?>" />-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <div id="upload" class="row cl">
            <label class="form-label col-xs-4 col-sm-2">视频：</label>
            <label style="margin-left: 10px;">大小：不超过100M；格式：MP4/AVI</label>
            <div  class="formControls col-xs-8 col-sm-9">
                <div href="javascript:void(0);" class="a-upload" rel="external nofollow" id="btn">
                    <?php echo !empty($uid)?'点击这里更换视频':'点击这里上传视频'; ?>
                </div>
                <a title="播放" href="javascript:;" onclick="sel('<?php echo url('Live/play_url',['id'=>$re['apply_id']]); ?>')"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e6;</i></a>
                <input name="url" type="hidden" id="url" value="<?php echo $re['url']; ?>" /><?php echo $re['url']; ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"></label>
            <div  class="formControls col-xs-8 col-sm-9">
                <ul id="ul_pics" class="ul_pics clearfix">
                </ul>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">商品列表：</label>

        </div>
        <div style="margin-left: 100px">
            <table class="table table-border table-bordered table-hover table-bg table-sort">
                <thead>
                <tr class="text-c">
                    <th width="20">序号</th>
                    <th width="50">名称</th>
                    <th width="30">商品缩略图</th>
                    <th width="40">商品价格</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($goods) || $goods instanceof \think\Collection): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="text-c">
                    <td><?php echo $vo['goods_id']; ?></td>
                    <td><?php echo $vo['goods_name']; ?></td>
                    <td><img src="<?php echo $vo['goods_image']; ?>" style="width:60px; height:50px; border-radius:25px;"></td>
                    <td><?php echo $vo['goods_price']; ?></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>审核状态：</label>
            <div class="formControls col-xs-8 col-sm-9" style="display: inline-block">
                <select name="is_shenhe" class="select input-text" disabled>
                    <option value="2" <?php if($re['is_shenhe'] == 2): ?>selected<?php endif; ?>>审核通过</option>
                    <option value="3" <?php if($re['is_shenhe'] == 3): ?>selected<?php endif; ?>>拒绝</option>
                    <option value="4" <?php if($re['is_shenhe'] == 4): ?>selected<?php endif; ?>>正在直播</option>
                </select>
            </div>
        </div>
        <div id="tag3" class="row tag cl <?php echo !empty($re['is_shenhe']) && $re['is_shenhe']==3?'' : 'hiden'; ?>">
            <label class="form-label col-xs-4 col-sm-2">拒绝理由：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea disabled name="refusal" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入20个字符" datatype="*10-100" dragonfly="true" nullmsg="拒绝理由不能为空！" onKeyUp="textarealength(this,50)"><?php echo $re['refusal']; ?></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/50</p>
            </div>
        </div>
        <div id="tag3" class="row tag cl <?php echo !empty($re['is_shenhe']) && $re['is_shenhe']==3?'' : 'hiden'; ?>">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button  class="submit btn btn-primary radius"  type="button"><i class="Hui-iconfont">&#xe632;</i> 保存并提交</button>
                <button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
                <input type="hidden" class="input-text" value="<?php echo !empty($re['apply_id'])?$re['apply_id']:''; ?>" placeholder=""  name="apply_id">
            </div>
        </div>
    </form>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    $(document).ready(function() {
        var goods_id = localStorage.getItem("goods_id");
        // var datas= document.getElementById("goodes_data");
        // console.log(datas.val);
        // document.getElementById("goods").value = goods_id;
        $("#goods").val(goods_id);
        var content;
        KindEditor.ready(function (K) {
            content = K.create('#content', {
                allowFileManager: true,
                uploadJson: "<?php echo url('Tools/upload',['dirname'=>'banner']); ?>"
            });
        });

        KindEditor.ready(function (K) {
            K.create();
            var editor = K.editor({
                allowFileManager: true,
                uploadJson: "<?php echo url('Tools/upload',['dirname'=>'banner']); ?>"
                //sdl:false
            });
            K('#logo').click(function () {
                console.log(1);
                editor.loadPlugin('image', function () {
                    editor.plugin.imageDialog({
                        imageUrl: K('#logo_img').val(),
                        clickFn: function (url, title, width, height, border, align) {
                            console.log(url);
                            $('#logo').css('background-image', 'url(' + url + ')').css('background-size', '220px 160px');
                            K('#logo_url').val(url);
                            // K('#getImgUrl').val(url);
                            editor.hideDialog();
                        }
                    });
                });
            });

            K('#uparea1').click(function () {
                console.log(1);
                editor.loadPlugin('image', function () {
                    editor.plugin.imageDialog({
                        imageUrl: K('#image_1').val(),
                        clickFn: function (url, title, width, height, border, align) {
                            console.log(url);
                            $('#image1').css('background-image', 'url(' + url + ')').css('background-size', '220px 160px');
                            K('#image_1').val(url);
                            // K('#getImgUrl').val(url);
                            editor.hideDialog();
                        }
                    });
                });
            });

            K('#uparea2').click(function () {
                console.log(1);
                editor.loadPlugin('image', function () {
                    editor.plugin.imageDialog({
                        imageUrl: K('#image_2').val(),
                        clickFn: function (url, title, width, height, border, align) {
                            console.log(url);
                            $('#image2').css('background-image', 'url(' + url + ')').css('background-size', '220px 160px');
                            K('#image_2').val(url);
                            // K('#getImgUrl').val(url);
                            editor.hideDialog();
                        }
                    });
                });
            });


            $(".submit").click(function () {
                commonAjaxSubmit('', 'form');
                return false;
            });

            $("#uparea1").mouseover(function (e) {
                $("#big").css({top: e.pageY, right: e.pageX});//鼠标定位一个点
                var img = $('#image_1').val();
                if (img.length !== 0) {
                    $("#big").html('<img src="' + $('#image_1').val() + '" width=380 height=300>');
                    $("#big").show();        //show：显示
                }
            });
            $("#uparea1").mouseout(function () {
                $("#big").hide();
            });

            $("#logo").mouseover(function (e) {
                $("#big").css({top: e.pageY, right: e.pageX});//鼠标定位一个点
                var img = $('#logo_url').val();
                if (img.length !== 0) {
                    $("#big").html('<img src="' + $('#logo_url').val() + '" width=380 height=300>');
                    $("#big").show();        //show：显示
                }
            });
            $("#logo").mouseout(function () {
                $("#big").hide();
            });


            $("#uparea2").mouseover(function (e) {
                $("#big").css({top: e.pageY, right: e.pageX});//鼠标定位一个点
                var img = $('#image_2').val();
                if (img.length !== 0) {
                    $("#big").html('<img src="' + $('#image_2').val() + '" width=380 height=300>');
                    $("#big").show();        //show：显示
                }
            });
            $("#uparea2").mouseout(function () {
                $("#big").hide();
            });

            $('.skin-minimal input').iCheck({
                checkboxClass: 'icheckbox-blue',
                radioClass: 'iradio-blue',
                increaseArea: '20%'
            });
        });


    });




</script>
<!--/请在上方写此页面业务相关的脚本--><!--/请在上方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/plupload/js/moxie.js"></script>
<script type="text/javascript" src="https://cdn.staticfile.org/plupload/2.1.5/plupload.min.js"></script>
<script type="text/javascript" src="/static/plupload/js/i18n/zh_CN.js"></script>
<script type="text/javascript" src="/static/qiniu-js-sdk/dist/qiniu.js"></script>
<script type="text/javascript" src="/static/layui/lay/dest/layui.all.js"></script>
<script>
    var d = new Date();
    var YMDHMS = d.getFullYear() + "-" +(d.getMonth()+1) + "-" + d.getDate() + " " +
        d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
    console.log(YMDHMS);
    layui.use('laydate', function(){
        var laydate = layui.laydate;
        var start = {
            elem: '#start_time',
            event: 'click', //触发事件
            format: 'YYYY-MM-DD hh:mm:ss', //日期格式
            istime: true, //是否开启时间选择
            isclear: true, //是否显示清空
            istoday: true, //是否显示今天
            issure: true, //是否显示确认
            festival: true,//是否显示节日
            min: YMDHMS, //最小日期
            max: '2099-12-31 23:59:59', //最大日期
            choose: function(datas){
                $("#start_time").attr("value",datas);
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };
        var end = {
            elem: '#end_time',
            event: 'click', //触发事件
            format: 'YYYY-MM-DD hh:mm:ss', //日期格式
            istime: true, //是否开启时间选择
            isclear: true, //是否显示清空
            istoday: true, //是否显示今天
            issure: true, //是否显示确认
            festival: true,//是否显示节日
            min: YMDHMS, //最小日期
            max: '2099-12-31 23:59:59', //最大日期
            choose: function(datas){
                $("#end_time").attr("value",datas);
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        document.getElementById('start_time').onclick = function(){
            start.elem = this;
            laydate(start);
        }
        document.getElementById('end_time').onclick = function(){
            end.elem = this
            laydate(end);
        }
    });

    var uploader = Qiniu.uploader({
        runtimes: 'html5,flash,html4',    //上传模式,依次退化
        browse_button: 'btn',       //上传选择的点选按钮，**必需**
        uptoken_url: "<?php echo url('Tools/get_qiniu_token'); ?>",            //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
        // uptoken : '', //若未指定uptoken_url,则必须指定 uptoken ,uptoken由其他程序生成
        // unique_names: true, // 默认 false，key为文件名。若开启该选项，SDK为自动生成上传成功后的key（文件名）。
        // save_key: true,   // 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK会忽略对key的处理
        domain: 'http://msplay.qqyswh.com',   //bucket 域名，下载资源时用到，**必需**
        get_new_uptoken: false,  //设置上传文件的时候是否每次都重新获取新的token
        container: 'upload',           //上传区域DOM ID，默认是browser_button的父元素，
        max_file_size: '1000mb',           //最大文件体积限制
        flash_swf_url: '/static//plupload/js/Moxie.swf',  //引入flash,相对路径
        silverlight_xap_url: "/static/plupload/js/Moxie.xap",
        max_retries: 3,                   //上传失败最大重试次数
        dragdrop: true,                   //开启可拖曳上传
        drop_element: 'upload',        //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
        unique_names: true,
        chunk_size: '4mb',                //分块上传时，每片的体积
        auto_start: true,                 //选择文件后自动上传，若关闭需要自己绑定事件触发上传
        filters: {
            mime_types : [
                {title : "Image files", extensions: "mp4,3gp,mp3,flv,avi,m3u8"}
            ]
        },
        init: {
            'FilesAdded': function(up, files) {
                //do something
                if ($("#ul_pics").children("li").length > 0) {
                    alert("您上传的内容太多了！");
                    uploader.destroy();
                } else {
                    var li = '';
                    plupload.each(files, function(file) { //遍历文件
                        li += "<li id='" + file['id'] + "'><div class='progress'><span class='bar'></span></div><div class='percent'>上传中 0%</div></li>";
                    });
                    $("#ul_pics").append(li);
                    uploader.start();
                }
            },
            'BeforeUpload': function(up, file) {
                //do something
            },
            'UploadProgress': function(up, file) {
                //可以在这里控制上传进度的显示
                //可参考七牛的例子
                var percent = file.percent;
                $("#" + file.id).find('.bar').css({"width": percent + "%"});
                $("#" + file.id).find(".percent").text("上传中 "+percent + "%");
            },
            'UploadComplete': function() {
                //do something
            },
            'FileUploaded': function(up, file, info) {
                var str = $.parseJSON(info.response);
                console.log(str);
                console.log(str.key);
                $('#url').val(str.key);
                //每个文件上传成功后,处理相关的事情
                //其中 info 是文件上传成功后，服务端返回的json，形式如
                //{
                //  "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                //  "key": "gogopher.jpg"
                //}
//                var domain = up.getOption('domain');
//                var res = eval('(' + info + ')');
//                var sourceLink = domain + res.key;//获取上传文件的链接地址
                //do something
            },
            'Error': function(up, err, errTip) {
                alert(errTip);
            },
            'Key': function(up, file) {
                //当save_key和unique_names设为false时，该方法将被调用
                var key = "";
                $.ajax({
                    url: '/qiniu-token/get-key/',
                    type: 'GET',
                    async: false,//这里应设置为同步的方式
                    success: function(data) {
                        var ext = Qiniu.getFileExtension(file.name);
                        key = data + '.' + ext;
                    },
                    cache: false
                });
                return key;
            }
        }
    });
</script>
<script type="text/javascript">
    //大屏型号选择展示
    var gidbox = new Array();
    function Checked(id) {
        var gid = new Array();
        $.each($('input[name="checkbox"]:checked'), function(i, n){
            gid.push( $(n).val() );
            gidbox.push({
                'screen_id':$(n).val(),
                'model':$(n).attr('model'),
                'wid_hei':$(n).attr('wid_hei'),
                'touch':$(n).attr('touch'),
                'Mac_address':$(n).attr('Mac_address'),
                'screen_price':$(n).attr('screen_price'),
                'desc':$(n).attr('desc')
            })
        });
        console.log(gid);
        $("#screen_id").val(gid);

        return gid;
    }
    function screen_add(kid){
        kid = kid ? kid : Checked();
        kid = kid.toString();
        if(kid == ''){
            layer.msg('你没有选择任何选项！', {offset: 95,shift: 6});
            return false;
        }
        layer.confirm('确认选择吗？',function(index){
            $.post("<?php echo url('live/add_goods'); ?>", {ids:kid}, function(data){
                if( data.status == 'ok' ){
                    for(var i=0;i<gidbox.length;i++){
                        // console.log(123);
                        $('#showthis').append(
                            '<tr class="text-c  check_data">',
                            '<td style="text-align:center">'+gidbox[i].screen_id+'</td>',
                            '<td style="text-align:center">'+gidbox[i].model+'</td>',
                            '<td style="text-align:center">'+gidbox[i].wid_hei+'</td>',
                            '<td style="text-align:center">'+(gidbox[i].touch=='1'?'否':'是')+'</td>',
                            '<td style="text-align:center">'+gidbox[i].Mac_address+'</td>',
                            '<td style="text-align:center">'+gidbox[i].screen_price+'</td>',
                            '<td style="text-align:center">'+gidbox[i].desc+'</td>',
                            '</tr>'
                        )
                    }
                    layer.msg(data.info,{icon:1,time:1000});
                }else{
                    layer.msg(data.info,{icon:1,time:1000});
                }
            },'json');
        })
    }
    function sel(data) {
        layer.open({
            type: 2,
            title: false,
            area: ['1020px', '587px'],
            shade: 0.1,
            closeBtn: 1,
            shadeClose: false,
            content: data,
        });
    }

</script>

</div>
</body>
<script type="text/javascript" src="/static/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/common/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/static/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/static/layer/2.1/extend/layer.ext.js"></script>
<script type="text/javascript" src="/static/jquery/jquery.form.js"></script>
<script type="text/javascript" src="/static/icheck/jquery.icheck.min.js"></script>
<!--<script type="text/javascript" src="/static/jquery.validation/1.14.0/jquery.validate.min.js"></script>-->
<!--<script type="text/javascript" src="/static/jquery.validation/1.14.0/validate-methods.js"></script>-->
<!--<script type="text/javascript" src="/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>-->
<!--<script type="text/javascript" src="/assets/js/asyncbox/asyncbox.js"></script>-->
<script type="text/javascript" src="/static/kindeditor/kindeditor-all-min.js"></script>
<script type="text/javascript" src="/static/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/static/common.js"></script>
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/layui/lay/dest/layui.all.js"></script>
<!--<script type="text/javascript" src="/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>-->
<script type="text/javascript" src="/static/Highcharts/4.1.7/js/highcharts.js"></script>
<script type="text/javascript" src="/static/Highcharts/4.1.7/js/modules/exporting.js"></script>

</html>