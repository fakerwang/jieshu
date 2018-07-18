<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:74:"/mnt2/data/dayday/public/../application/merchant/view/role/add_anchor.html";i:1529650274;s:65:"/mnt2/data/dayday/public/../application/merchant/view/layout.html";i:1520221433;s:73:"/mnt2/data/dayday/public/../application/merchant/view/common/_header.html";i:1528536599;s:71:"/mnt2/data/dayday/public/../application/merchant/view/common/_menu.html";i:1520221433;s:73:"/mnt2/data/dayday/public/../application/merchant/view/common/_footer.html";i:1520221433;}*/ ?>
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
['href'=>url('Role/index'),'text'=>'主播列表'],
['href'=>'','text'=>$text]
]
]); ?>
<div class="page-container">
    <form class="form form-horizontal" id="form" method="post">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>主播名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" name ="nick_name" value="<?php echo !empty($re['nick_name'])?$re['nick_name']:''; ?>"  id="nick_name" style="width: 50%" />
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>姓名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" name ="anchor_name" value="<?php echo !empty($re['anchor_name'])?$re['anchor_name']:''; ?>"  id="anchor_name" style="width: 50%" />
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>手机号：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" name ="anchor_phone" value="<?php echo !empty($re['anchor_phone'])?$re['anchor_phone']:''; ?>"  id="anchor_phone" style="width: 50%" />
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>身份证：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="card" class="input-text" value="<?php echo !empty($re['card'])?$re['card']:''; ?>"  id="card" style="width: 50%"/>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>主播描述：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="anchor_desc" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,200)"><?php echo $re['anchor_desc']; ?></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资质名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" name ="zi_title" value="<?php echo !empty($re['zi_title'])?$re['zi_title']:''; ?>"  id="zi_title" style="width: 50%" />
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>主播资质：</label>
            <label  id="image_show1" style="margin-left: 10px;">宽高：750px，360px；大小：不超过1M</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="droparea spot" id="logo_img" style="background-image: url('<?php echo !empty($re['user_img'])?$re['user_img']:''; ?>');background-size: 220px 160px;" >
                    <div class="instructions">主播头像</div>
                    <div id="logo"></div>
                    <input type="hidden" name="user_img" id="logo_url" value="<?php echo !empty($re['user_img'])?$re['user_img']:''; ?>" />
                </div>
                <div class="droparea spot" id="image2" style="background-image: url('<?php echo !empty($re['user_img2'])?$re['user_img2']:''; ?>');background-size: 220px 160px;" >
                    <div class="instructions">主播资质</div>
                    <div id="uparea2"></div>
                    <input type="hidden" name="user_img2" id="image_2" value="<?php echo !empty($re['user_img2'])?$re['user_img']:''; ?>" />
                </div>
                <div class="droparea spot" id="image3" style="background-image: url('<?php echo !empty($re['user_img3'])?$re['user_img3']:''; ?>');background-size: 220px 160px;" >
                    <div class="instructions">主播资质</div>
                    <div id="uparea3"></div>
                    <input type="hidden" name="user_img3" id="image_3" value="<?php echo !empty($re['user_img3'])?$re['user_img3']:''; ?>" />
                </div>
                <div class="droparea spot" id="image4" style="background-image: url('<?php echo !empty($re['user_img4'])?$re['user_img4']:''; ?>');background-size: 220px 160px;" >
                    <div class="instructions">主播资质</div>
                    <div id="uparea4"></div>
                    <input type="hidden" name="user_img4" id="image_4" value="<?php echo !empty($re['user_img4'])?$re['user_img4']:''; ?>" />
                </div>
                <div class="droparea spot" id="image5" style="background-image: url('<?php echo !empty($re['user_img5'])?$re['user_img5']:''; ?>');background-size: 220px 160px;" >
                    <div class="instructions">主播资质</div>
                    <div id="uparea5"></div>
                    <input type="hidden" name="user_img5" id="image_5" value="<?php echo !empty($re['user_img5'])?$re['user_img5']:''; ?>" />
                </div>
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button  class="submit btn btn-primary radius"  type="button"><i class="Hui-iconfont">&#xe632;</i> 保存并提交</button>
                <!--<button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>-->
                <button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
                <input type="hidden" class="input-text" value="<?php echo !empty($re['anchor_id'])?$re['anchor_id']:''; ?>" placeholder=""  name="anchor_id">
            </div>
        </div>
    </form>
</div>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    $(document).ready(function(){
        var  content ;
        KindEditor.ready(function(K) {
            content = K.create('#content',{
                allowFileManager : true,
                uploadJson:"<?php echo url('Tools/upload',['dirname'=>'banner']); ?>"
            });
        });

        KindEditor.ready(function(K) {
            K.create();
            var editor = K.editor({
                allowFileManager : true,
                uploadJson:"<?php echo url('Tools/upload',['dirname'=>'banner']); ?>"
                //sdl:false
            });
            K('#logo').click(function() {
                console.log(1);
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        imageUrl : K('#logo_img').val(),
                        clickFn : function(url, title, width, height, border, align) {
                            console.log(url);
                            $('#logo').css('background-image','url('+url+')').css('background-size','220px 160px');
                            K('#logo_url').val(url);
                            // K('#getImgUrl').val(url);
                            editor.hideDialog();
                        }
                    });
                });
            });

            K('#uparea1').click(function() {
                console.log(1);
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        imageUrl : K('#image_1').val(),
                        clickFn : function(url, title, width, height, border, align) {
                            console.log(url);
                            $('#image1').css('background-image','url('+url+')').css('background-size','220px 160px');
                            K('#image_1').val(url);
                            // K('#getImgUrl').val(url);
                            editor.hideDialog();
                        }
                    });
                });
            });

            K('#uparea2').click(function() {
                console.log(1);
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        imageUrl : K('#image_2').val(),
                        clickFn : function(url, title, width, height, border, align) {
                            console.log(url);
                            $('#image2').css('background-image','url('+url+')').css('background-size','220px 160px');
                            K('#image_2').val(url);
                            // K('#getImgUrl').val(url);
                            editor.hideDialog();
                        }
                    });
                });
            });

            K('#uparea3').click(function() {
                console.log(1);
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        imageUrl : K('#image_3').val(),
                        clickFn : function(url, title, width, height, border, align) {
                            console.log(url);
                            $('#image3').css('background-image','url('+url+')').css('background-size','220px 160px');
                            K('#image_3').val(url);
                            // K('#getImgUrl').val(url);
                            editor.hideDialog();
                        }
                    });
                });
            });

            K('#uparea4').click(function() {
                console.log(1);
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        imageUrl : K('#image_4').val(),
                        clickFn : function(url, title, width, height, border, align) {
                            console.log(url);
                            $('#image4').css('background-image','url('+url+')').css('background-size','220px 160px');
                            K('#image_4').val(url);
                            // K('#getImgUrl').val(url);
                            editor.hideDialog();
                        }
                    });
                });
            });

            K('#uparea5').click(function() {
                console.log(1);
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        imageUrl : K('#image_5').val(),
                        clickFn : function(url, title, width, height, border, align) {
                            console.log(url);
                            $('#image5').css('background-image','url('+url+')').css('background-size','220px 160px');
                            K('#image_5').val(url);
                            // K('#getImgUrl').val(url);
                            editor.hideDialog();
                        }
                    });
                });
            });
            K('#uparea6').click(function() {
                console.log(1);
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        imageUrl : K('#image_6').val(),
                        clickFn : function(url, title, width, height, border, align) {
                            console.log(url);
                            $('#image6').css('background-image','url('+url+')').css('background-size','220px 160px');
                            K('#image_6').val(url);
                            // K('#getImgUrl').val(url);
                            editor.hideDialog();
                        }
                    });
                });
            });

            K('#uparea7').click(function() {
                console.log(1);
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        imageUrl : K('#image_7').val(),
                        clickFn : function(url, title, width, height, border, align) {
                            console.log(url);
                            $('#image7').css('background-image','url('+url+')').css('background-size','220px 160px');
                            K('#image_7').val(url);
                            // K('#getImgUrl').val(url);
                            editor.hideDialog();
                        }
                    });
                });
            });

            K('#uparea8').click(function() {
                console.log(1);
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        imageUrl : K('#image_8').val(),
                        clickFn : function(url, title, width, height, border, align) {
                            console.log(url);
                            $('#image8').css('background-image','url('+url+')').css('background-size','220px 160px');
                            K('#image_8').val(url);
                            // K('#getImgUrl').val(url);
                            editor.hideDialog();
                        }
                    });
                });
            });

        });

        $(".submit").click(function(){
            commonAjaxSubmit('','form');
            return false;
        });

        $("#uparea1").mouseover(function(e){
            $("#big").css({top:e.pageY,right:e.pageX});//鼠标定位一个点
            var img = $('#image_1').val();
            if(img.length !== 0) {
                $("#big").html('<img src="' + $('#image_1').val() + '" width=380 height=300>');
                $("#big").show();        //show：显示
            }
        });
        $("#uparea1").mouseout(function(){
            $("#big").hide();
        });

        $("#uparea2").mouseover(function(e){
            $("#big").css({top:e.pageY,right:e.pageX});//鼠标定位一个点
            var img = $('#image_2').val();
            if(img.length !== 0) {
                $("#big").html('<img src="' + $('#image_2').val() + '" width=380 height=300>');
                $("#big").show();        //show：显示
            }
        });
        $("#uparea2").mouseout(function(){
            $("#big").hide();
        });

        $("#uparea3").mouseover(function(e){
            $("#big").css({top:e.pageY,right:e.pageX});//鼠标定位一个点
            var img = $('#image_3').val();
            if(img.length !== 0) {
                $("#big").html('<img src="' + $('#image_3').val() + '" width=380 height=300>');
                $("#big").show();        //show：显示
            }
        });
        $("#uparea3").mouseout(function(){
            $("#big").hide();
        });

        $("#uparea4").mouseover(function(e){
            $("#big").css({top:e.pageY,right:e.pageX});//鼠标定位一个点
            var img = $('#image_2').val();
            if(img.length !== 0) {
                $("#big").html('<img src="' + $('#image_4').val() + '" width=380 height=300>');
                $("#big").show();        //show：显示
            }
        });
        $("#uparea4").mouseout(function(){
            $("#big").hide();
        });

        $("#uparea5").mouseover(function(e){
            $("#big").css({top:e.pageY,right:e.pageX});//鼠标定位一个点
            var img = $('#image_5').val();
            if(img.length !== 0) {
                $("#big").html('<img src="' + $('#image_5').val() + '" width=380 height=300>');
                $("#big").show();        //show：显示
            }
        });
        $("#uparea5").mouseout(function(){
            $("#big").hide();
        });

        $("#uparea6").mouseover(function(e){
            $("#big").css({top:e.pageY,right:e.pageX});//鼠标定位一个点
            var img = $('#image_6').val();
            if(img.length !== 0) {
                $("#big").html('<img src="' + $('#image_6').val() + '" width=380 height=300>');
                $("#big").show();        //show：显示
            }
        });
        $("#uparea6").mouseout(function(){
            $("#big").hide();
        });

        $("#uparea7").mouseover(function(e){
            $("#big").css({top:e.pageY,right:e.pageX});//鼠标定位一个点
            var img = $('#image_7').val();
            if(img.length !== 0) {
                $("#big").html('<img src="' + $('#image_7').val() + '" width=380 height=300>');
                $("#big").show();        //show：显示
            }
        });
        $("#uparea7").mouseout(function(){
            $("#big").hide();
        });

        $("#uparea8").mouseover(function(e){
            $("#big").css({top:e.pageY,right:e.pageX});//鼠标定位一个点
            var img = $('#image_8').val();
            if(img.length !== 0) {
                $("#big").html('<img src="' + $('#image_8').val() + '" width=380 height=300>');
                $("#big").show();        //show：显示
            }
        });
        $("#uparea8").mouseout(function(){
            $("#big").hide();
        });

        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });
    });
    function area_linke1(value){
        $.post("<?php echo url('Merchants/get_area'); ?>", {value:value,type:1}, function(v){
            $("#shi").html(v);
        });
    }
    function area_linke2(value) {
        $.post("<?php echo url('Merchants/get_area'); ?>", {value: value, type: 2}, function (v) {
            $("#qu").html(v);
        });
    }



</script>
<!--/请在上方写此页面业务相关的脚本--><!--/请在上方写此页面业务相关的脚本-->
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