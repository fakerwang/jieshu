<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:78:"/mnt2/data/dayday/public/../application/merchant/view/apply/add_pai_apply.html";i:1530087942;s:65:"/mnt2/data/dayday/public/../application/merchant/view/layout.html";i:1520221433;s:73:"/mnt2/data/dayday/public/../application/merchant/view/common/_header.html";i:1528536599;s:71:"/mnt2/data/dayday/public/../application/merchant/view/common/_menu.html";i:1520221433;s:73:"/mnt2/data/dayday/public/../application/merchant/view/common/_footer.html";i:1520221433;}*/ ?>
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
['href'=>url('Apply/index'),'text'=>'申请列表'],
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
        <!--<div class="row cl skin-minimal">-->
            <!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>直播标签：</label>-->
            <!--<div class="formControls col-xs-3 col-sm-2">-->
                <!--<span class="select-box">-->
					<!--<select name="class_id"  class="select">-->
                        <!--<option value="">请选择</option>-->
                        <!--<?php if(is_array($live_class) || $live_class instanceof \think\Collection): $i = 0; $__LIST__ = $live_class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                            <!--<option value="<?php echo $vo['live_class_id']; ?>" <?php if($re['class_id'] == $vo['live_class_id']): ?>selected<?php else: endif; ?>><?php echo $vo['tag']; ?></option>-->
                        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                    <!--</select>-->
				<!--</span>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div id="tag1" class="row tag cl <?php echo !empty($re['b_type']) && $re['b_type']==3?'' : 'hiden'; ?>">-->
            <!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>选择主播：</label>-->
            <!--<div class="formControls col-xs-8 col-sm-9">-->
                <!--<span class="select-box" style="width: 33%">-->
                    <!--<select name="zhu_phone1"  class="select">-->
                        <!--<option value="">请选择</option>-->
                        <!--<?php if(is_array($res) || $res instanceof \think\Collection): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                            <!--<option value="<?php echo $vo['anchor_phone']; ?>" <?php if($re['zhu_phone'] == $vo['anchor_phone']): ?>selected<?php else: endif; ?>><?php echo $vo['anchor_name']; ?>&nbsp&nbsp&nbsp<?php echo $vo['anchor_phone']; ?></option>-->
                        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                    <!--</select>-->
				<!--</span>-->
                <!--&lt;!&ndash;<a href="javascript:;;" class="btn btn-primary radius" onclick="add_anchor('添加主播','<?php echo url('Apply/add_anchor'); ?>','4','','510')" >&ndash;&gt;-->
                <!--&lt;!&ndash;<i class="Hui-iconfont">&#xe600;</i><span>添加主播</span>&ndash;&gt;-->
                <!--&lt;!&ndash;</a>&ndash;&gt;-->
                <!--&lt;!&ndash;<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:0px;margin-right: 330px;" id="ajax_data" onclick="ajax_data" title="刷新" >&ndash;&gt;-->
                <!--&lt;!&ndash;<i class="Hui-iconfont">&#xe68f;</i>&ndash;&gt;-->
                <!--&lt;!&ndash;</a>&ndash;&gt;-->
            <!--</div>-->
        <!--</div>-->
        <!--<div id="" class="row tag cl">-->
            <!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择主播：</label>-->
            <!--<div class="formControls col-xs-8 col-sm-9">-->
                <!--<span class="select-box" style="width: 33%">-->
                    <!--<select name="zhu_phone"  class="select">-->
                        <!--<option value="">请选择</option>-->
                        <!--<?php if(is_array($res) || $res instanceof \think\Collection): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                            <!--<option value="<?php echo $vo['anchor_phone']; ?>" <?php if($re['zhu_phone'] == $vo['anchor_phone']): ?>selected<?php else: endif; ?>><?php echo $vo['anchor_name']; ?>&nbsp&nbsp&nbsp<?php echo $vo['anchor_phone']; ?></option>-->
                        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                    <!--</select>-->
				<!--</span>-->
                <!--&lt;!&ndash;<a href="javascript:;;" class="btn btn-primary radius" onclick="add_anchor('添加主播','<?php echo url('Apply/add_anchor'); ?>','4','','510')" >&ndash;&gt;-->
                    <!--&lt;!&ndash;<i class="Hui-iconfont">&#xe600;</i><span>添加主播</span>&ndash;&gt;-->
                <!--&lt;!&ndash;</a>&ndash;&gt;-->
                <!--&lt;!&ndash;<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:0px;margin-right: 330px;" id="ajax_data" onclick="ajax_data" title="刷新" >&ndash;&gt;-->
                    <!--&lt;!&ndash;<i class="Hui-iconfont">&#xe68f;</i>&ndash;&gt;-->
                <!--&lt;!&ndash;</a>&ndash;&gt;-->
            <!--</div>-->
        <!--</div>-->
        <div id="" class="row tag cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择拍卖师：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box" style="width: 33%">
                    <select name="pai_phone"  class="select">
                        <option value="">请选择</option>
                        <?php if(is_array($e) || $e instanceof \think\Collection): $i = 0; $__LIST__ = $e;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['anchor_phone']; ?>" <?php if($re['zhu_phone'] == $vo['anchor_phone']): ?>selected<?php else: endif; ?>><?php echo $vo['anchor_name']; ?>&nbsp&nbsp&nbsp<?php echo $vo['anchor_phone']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
				</span>
                <!--<a href="javascript:;;" class="btn btn-primary radius" onclick="add_anchor('添加主播','<?php echo url('Apply/add_anchor'); ?>','4','','510')" >-->
                    <!--<i class="Hui-iconfont">&#xe600;</i><span>添加拍卖师</span>-->
                <!--</a>-->
                <!--<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:0px;margin-right: 330px;" id="ajax_data" onclick="ajax_data" title="刷新" >-->
                <!--<i class="Hui-iconfont">&#xe68f;</i>-->
                <!--</a>-->
            </div>

        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>直播专场：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box" style="width: 33%">
                    <select name="zhuan_type"  class="select">
                        <option value="">请选择</option>
                        <option value="1">是</option>
                        <option value="2">否</option>
                    </select>
				</span>
            </div>
        </div>
        <!--<div class="row cl">-->
            <!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>选择大屏：</label>-->
            <!--<div class="formControls col-xs-8 col-sm-9">-->
                <!--<span class="select-box" style="width: 33%">-->
                    <!--<select name="screen_class_id" class="select">-->
                        <!--<option value="">请选择</option>-->
                        <!--<?php if(is_array($re1) || $re1 instanceof \think\Collection): $i = 0; $__LIST__ = $re1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                            <!--<option value="<?php echo $vo['screen_class_id']; ?>" <?php if($re['screen_class_id'] == $vo['screen_class_id']): ?>selected<?php else: endif; ?>><?php echo $vo['model']; ?>&nbsp&nbsp&nbsp<?php echo $vo['wid_hei']; ?></option>-->
                        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                    <!--</select>-->
				<!--</span>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="row cl">-->
            <!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>直播类型：</label>-->
            <!--<div class="formControls col-xs-8 col-sm-9">-->
                <!--<span class="select-box" style="width: 33%">-->
                    <!--<select name="status"  class="select">-->
                        <!--<option value="">请选择</option>-->
                        <!--&lt;!&ndash;<option value="0">售卖</option>&ndash;&gt;-->
                        <!--<option value="1">拍卖</option>-->
                    <!--</select>-->
				<!--</span>-->
            <!--</div>-->
        <!--</div>-->
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>直播标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" name ="title" value="<?php echo !empty($re['title'])?$re['title']:''; ?>"  id="title" style="width: 50%" />
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>直播地址：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" name ="address" value="<?php echo !empty($re['address'])?$re['address']:''; ?>"  id="address" style="width: 50%" />
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>开播时间段：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text " placeholder="开始时间" id="start_time" style="width:190px" name="start_time" value="<?php echo $re['start_time']; ?>" readonly>: <input type="text" class="input-text " placeholder="结束时间" id="end_time" style="width:190px" name="end_time" value="<?php echo $re['end_time']; ?>" readonly>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>直播封面：</label>
            <label  id="image_show" style="margin-left: 10px;">宽高：750px，360px；大小：不超过1M</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="droparea spot" id="image1" style="background-image: url('<?php echo $re['cover_img']; ?>');background-size: 220px 160px;" >
                    <div class="instructions" onclick="del_image('1')">删除</div>
                    <div id="uparea1"></div>
                    <input type="hidden" name="cover_img" id="image_1" value="<?php echo $re['cover_img']; ?>" />
                </div>
            </div>
        </div>
        <!--<div class="row cl">-->
            <!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>主播资质：</label>-->
            <!--<div class="formControls col-xs-8 col-sm-9">-->
                <!--<div class="droparea spot" id="logo_img" style="background-image: url('<?php echo $re.['zi_img']; ?>');background-size: 220px 160px;" >-->
                    <!--<div class="instructions">主播资质</div>-->
                    <!--<div id="logo"></div>-->
                    <!--<input type="hidden" name="zi_img" id="logo_url" value="<?php echo !empty($re['zi_img'])?$re['zi_img']:''; ?>" />-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>直播简介：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="apply_content" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,200)"><?php echo $re['apply_content']; ?></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>拍卖证书：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <?php echo widget('Base/ueditor',['content',$re['content']]); ?>
            </div>
        </div>
        <!--<div class="row cl">-->
            <!--<span style="margin-left: 14px;padding:0px 30px 20px 0" >-->
                 <!--<label class="form-label col-xs-4 col-sm-2">添加大屏：</label>-->
                <!--<a href="javascript:;;" class="btn btn-primary radius" onclick="edit_screen('添加大屏（First）','<?php echo url('Apply/add_screen'); ?>','4','','510')" >-->
                    <!--<i class="Hui-iconfont">&#xe600;</i>添加大屏-->
                <!--</a>-->
            <!--</span>-->
        <!--</div>-->


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">添加大屏：</label>
            <input id="screen_class_id" type="hidden" class="input-text" value=""  name="screen_class_id">

            <span>
                <!--<a href="javascript:;;" class="btn btn-primary radius" onclick="add_goods('添加商品（First)','<?php echo url('apply/goods_list'); ?>','4','900','510')" >-->
                <!--<i class="Hui-iconfont">&#xe600;</i>添加商品-->
                <!--</a>-->
                <!-- Button trigger modal -->
                <!--<div>-->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal1">
                添加大屏
                </button>
                <div class="modal fade bs-example-modal-lg" id="myModal1"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel1">添加大屏</h4>
                        </div>
                        <div class="modal-body">
                    <table border="1" cellpadding="0" cellspacing="0" width="100%" class="table_index1" id="table_user_list1">
                        <thead>
               <tr class="text-c">
               <th width="25"><input type="radio" name="" value=""></th>
				<th width="80">序号</th>
				<th width="100">型号</th>
				<th width="100">大尺寸</th>
				<th width="100">颜色</th>
				<th width="40">支持触碰</th>
				<th width="80">图片</th>
				<th width="80">租用单价(单位)</th>
			</tr>
			</thead>
              <tbody>
			<?php if(is_array($re1) || $re1 instanceof \think\Collection): $i = 0; $__LIST__ = $re1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
                <td><input type="radio" model="<?php echo $vo['model']; ?>"  wid_hei="<?php echo $vo['wid_hei']; ?>" screen_color="<?php echo $vo['screen_color']; ?>" touch="<?php echo $vo['touch']; ?>" img="<?php echo $vo['img']; ?>" screen_price="<?php echo $vo['screen_price']; ?>" data-key="<?php echo $key; ?>" value="<?php echo $vo['screen_class_id']; ?>" name="checkbox1" ></td>
				<td><?php echo $vo['screen_class_id']; ?></td>
				<td><?php echo $vo['model']; ?></td>
				<td><?php echo $vo['wid_hei']; ?></td>
				<td><?php echo $vo['screen_color']; ?></td>
				<td>
					<?php switch($name=$vo['touch']): case "0": ?>是<?php break; case "1": ?>否<?php break; endswitch; ?>
				</td>
				<td><img src="<?php echo $vo['img']; ?>" style="width:50px; height:50px; border-radius:25px;"></td>
				<td><?php echo $vo['screen_price']; ?></td>
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
                    <th width="80">序号</th>
                    <th width="100">型号</th>
                    <th width="100">大尺寸</th>
                    <th width="80">颜色</th>
                    <th width="90">支持触碰</th>
                    <th width="80">图片</th>
                    <th width="80">租用单价(单位)</th>
                </tr>
                </thead>
                <tbody id="screen_show">

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
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>视&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp频：</label>
            <label style="margin-left: 10px;">大小：不超过100M；格式：MP4/AVI</label>
            <div  class="formControls col-xs-8 col-sm-9">
                <div href="javascript:void(0);" class="a-upload" rel="external nofollow" id="btn">
                    <?php echo !empty($uid)?'点击这里更换视频':'点击这里上传视频'; ?>
                </div>
                <input name="url" type="hidden" id="url" value="<?php echo $re['url']; ?>" />
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
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品列表：</label>
                <input id="goods" type="hidden" class="input-text" value=""  name="arr">

            <span>
                <!--<a href="javascript:;;" class="btn btn-primary radius" onclick="add_goods('添加商品（First)','<?php echo url('apply/goods_list'); ?>','4','900','510')" >-->
                    <!--<i class="Hui-iconfont">&#xe600;</i>添加商品-->
                <!--</a>-->
                <!-- Button trigger modal -->
            <!--<div>-->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                添加商品
                </button>
                <div class="modal fade bs-example-modal-lg" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">添加商品</h4>
                        </div>
                        <div class="modal-body">
                    <table border="1" cellpadding="0" cellspacing="0" width="100%" class="table_index1" id="table_user_list">
                        <thead>
                <tr class="text-c">
                    <th width="25"><input type="checkbox" name="" value=""></th>
                    <th width="20">序号</th>
                    <th width="50">名称</th>
                    <th width="30">拍品缩略图</th>
                    <th width="40">拍品价格</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($goodes) || $goodes instanceof \think\Collection): $i = 0; $__LIST__ = $goodes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="text-c" id="goods_id<?php echo $vo['paimai_id']; ?>">
                    <td><input type="checkbox" goodname="<?php echo $vo['common_name']; ?>" goodimg="<?php echo $vo['common_image']; ?>" goodprc="<?php echo $vo['onset']; ?>"  data-key="<?php echo $key; ?>" value="<?php echo $vo['paimai_id']; ?>" name="checkbox"></td>
                    <td><?php echo $vo['paimai_id']; ?></td>
                    <td><?php echo $vo['common_name']; ?></td>
                    <td><img src="<?php echo $vo['common_image']; ?>" style="width:60px; height:50px; border-radius:25px;"></td>
                    <td><?php echo $vo['onset']; ?></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
                </table>
                        </div>
                        <div class="modal-footer" >
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="button" class="btn btn-primary"   onclick="dataadd()"  value="">保存</button>
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
                    <th width="20">序号</th>
                    <th width="50">名称</th>
                    <th width="30">拍品缩略图</th>
                    <th width="40">拍品价格</th>
                </tr>
                </thead>
                <tbody id="showthis">

                </tbody>
            </table>
        </div>

        <div class="row cl">
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
            min: '1900-01-01 00:00:00', //最小日期
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
                $("#" + file.id).find(".percent").text("上传完成 "+percent + "%");
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
    function edit_screen(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }
    function add_goods(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }
    function add_anchor(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }
    function changeMk(v){
        $('.tag').hide();
        $('#tag'+v).show();
    }
    //大屏型号选择展示
    var dataes = new Array();
    function Checked(id) {
        var gid = new Array();
        dataes=[];
        gid=[];
        $.each($('input[name="checkbox1"]:checked'), function(i, n){
            gid.push( $(n).val() );
            dataes.push({
                'screen_class_id':$(n).val(),
                'model':$(n).attr('model'),
                'wid_hei':$(n).attr('wid_hei'),
                'screen_color':$(n).attr('screen_color'),
                'touch':$(n).attr('touch'),
                'img':$(n).attr('img'),
                'screen_price':$(n).attr('screen_price')
            })
        });
        console.log(gid);
        $("#screen_class_id").val(gid);
        return gid;
    }
    function screen_add(kid){
        kid = kid ? kid : Checked();
        kid = kid.toString();
        if(kid == ''){
            layer.msg('你没有选择任何选项！', {offset: 95,shift: 6});
            return false;
        }
        layer.confirm('确认要添加商品吗？',function(index){
            $.post("<?php echo url('Apply/add_goods'); ?>", {ids:kid}, function(data){
                if( data.status == 'ok' ){
                    for(var i=0;i<dataes.length;i++){
                            $('#screen_show').append(
                                '<tr class="text-c  check_data">',
                                ' <td style="text-align:center">'+dataes[i].screen_class_id+'</td>',
                                ' <td style="text-align:center">'+dataes[i].model+'</td>',
                                ' <td style="text-align:center">'+dataes[i].wid_hei+'</td>',
                                ' <td style="text-align:center">'+dataes[i].screen_color+'</td>',
                                ' <td style="text-align:center">'+(dataes[i].touch== 1 ?'否':'是')+'</td>',
                                ' <td style="text-align:center"><img src="'+dataes[i].img+'" style="width:60px; height:50px; border-radius:25px;"></td>',
                                ' <td style="text-align:center">'+dataes[i].screen_price+'</td>',
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
    //商品选择展示
    var gidbox = new Array();
    function getChecked(id) {
        var gids = new Array();
        gidbox=[];
        gids=[];
        // var indexs = new Array();
        $.each($('input[name="checkbox"]:checked'), function(i, n){
            gids.push( $(n).val() );
            gidbox.push({
                'goodsid':$(n).val(),
                'goodsname':$(n).attr('goodname'),
                'goodimg':$(n).attr('goodimg'),
                'goodprc':$(n).attr('goodprc')
            })
            // indexs.push($(n)[0].attributes[0].nodeValue);
        });
        $("#goods").val(gids);

        return gids;
    }
    function dataadd(kid){

        kid = kid ? kid : getChecked();
        kid = kid.toString();
        if(kid == ''){
            layer.msg('你没有选择任何选项！', {offset: 95,shift: 6});
            return false;
        }
        layer.confirm('确认要添加商品吗？',function(index){
            $.post("<?php echo url('Apply/add_goods'); ?>", {ids:kid}, function(data){
                if( data.status == 'ok' ){
                    $('#showthis').empty();
                    for(var i=0;i<gidbox.length;i++){
                        // console.log(123);
                        $('#showthis').append(
                            '<tr class="text-c  check_data">',
                                '<td style="text-align:center">'+gidbox[i].goodsid+'</td>',
                                '<td style="text-align:center">'+gidbox[i].goodsname+'</td>',
                                '<td style="text-align:center"><img src="'+gidbox[i].goodimg+'" style="width:60px; height:50px; border-radius:25px;"></td>',
                                '<td style="text-align:center">'+gidbox[i].goodprc+'</td>',
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
</script>
<script>
    // function ajax_data() {
    //     $.ajax({
    //         url: '', //请求的url
    //         type: 'post', //请求的方式
    //         data: '', //form表单里要提交的内容，里面的input等写上name就会提交，这是序列化
    //         error:function (data) {
    //             alert('请求失败');
    //         },
    //         success:function (data) {
    //             alert('请求成功');
    //         }
    //     });
    // }

    // $("#ajax_data").click(function(){
    //
    //     // 第二步：获取你所填写的<form>表单对应的值,然后用一个变量接收：
    //
    //     var name = $("#username").val();
    //
    //     var pass = $("#password").val();
    //
    //     // 第三步：开始编写AJAX：
    //
    //     $.ajax({
    //
    //         type : "post", //提交方式有两种，分别是post和get，我们一般使用post形式进行提交，因为post形式较安全。
    //
    //         url : "点击按钮所提交的Servlet",
    //
    //         data : {username : name,password : pass},  //data是一个属性，由于有多个数据所以用大括号包起来，数据之间用逗号隔开，数据以键值对的形式表示。
    //
    //         statusCode : {404 : function() {
    //                 alert("找不到该页面");
    //             }
    //         },   //statusCode是状态码，如果报404错误的话，就弹出alert里面的内容。
    //
    //     })
    //
    // })





</script>
<!--<script>-->
    <!--$(function () {-->
       <!--alert($("#apply2").attr());-->
    <!--})-->
<!--</script>-->
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