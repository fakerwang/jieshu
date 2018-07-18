<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"/mnt2/data/dayday/public/../application/admin/view/config/account.html";i:1523240471;s:62:"/mnt2/data/dayday/public/../application/admin/view/layout.html";i:1520221433;s:70:"/mnt2/data/dayday/public/../application/admin/view/common/_header.html";i:1528535116;s:70:"/mnt2/data/dayday/public/../application/admin/view/common/_footer.html";i:1520221433;}*/ ?>
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
    <link rel="stylesheet" href="/static/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">

    <!--[if IE 6]>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title><?php echo $system['title']; ?>-后台管理系统</title>
</head>
<body>
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl">
            <a class="logo navbar-logo f-l mr-10 hidden-xs" href="javascript:;"><?php echo $system['title']; ?></a>
            <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="javascript:;"><?php echo $system['title']; ?></a>
            <!--<span class="logo navbar-slogan f-l mr-10 hidden-xs">v2.4</span>-->
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <!--<nav class="nav navbar-nav">-->
                <!--<ul class="cl">-->
                    <!--<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>-->
                        <!--<ul class="dropDown-menu menu radius box-shadow">-->
                            <!--<li><a href="<?php echo url('Member/add_member'); ?>"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>-->
                            <!--<li><a href="<?php echo url('User/add_user'); ?>"><i class="Hui-iconfont">&#xe60d;</i> 导师</a></li>-->
                            <!--<li><a href="<?php echo url('Home/add_notice'); ?>"><i class="Hui-iconfont">&#xe613;</i> 公告</a></li>-->
                            <!--<li><a href="<?php echo url('Goods/add_goods'); ?>"><i class="Hui-iconfont">&#xe620;</i> 商品</a></li>-->
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
                            <li><a href="<?php echo url('Login/live'); ?>">切换环境</a></li>
                        </ul>
                    </li>
                    <!--<li id="Hui-msg"> <a href="javascript:;;" class="check_auth" data-action="<?php echo url('Chat/kefu'); ?>" title="消息">-->
                        <!--<span class="badge badge-danger"></span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a>-->
                    <!--</li>-->
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
<?php echo widget('Base/menu'); ?>
<div class="ml170" id="page-content" style="min-height:100%">
    <?php echo widget('base/breadcrumbs',[
[
['href'=>'','text'=>'基础配置']
]
]); ?>
<div class="page-container">
	<form class="form form-horizontal" id="form"     method="post">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">后台名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="title" placeholder="网站名称" value="<?php echo $tem['title']; ?>" id="title" >
			</div>
		</div>
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-2">微信appid：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<input type="text" class="input-text" name="appid" placeholder="微信appid" value="<?php echo $tem['appid']; ?>" id="wx_appid" >-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-2">微信appsecret：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<input type="text" class="input-text" name="appsecret" placeholder="ping++支付appsecret" value="<?php echo $tem['appsecret']; ?>" id="wx_secretkey" >-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-2">ping++APP_Id：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<input type="text" class="input-text" name="apiid" placeholder="ping++支付appid" value="<?php echo $tem['apiid']; ?>" id="pappid" >-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-2">ping++SecretKey：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<input type="text" class="input-text" name="secretkey" placeholder="ping++支付secretkey" value="<?php echo $tem['secretkey']; ?>" id="psecretkey" >-->
			<!--</div>-->
		<!--</div>-->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">appkey：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="jg_appkey" placeholder="appkey" value="<?php echo $tem['jg_appkey']; ?>" id="jg_appkey" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">secret：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="jg_secret" placeholder="secret" value="<?php echo $tem['jg_secret']; ?>" id="jg_secret" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">环信client_id：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="hx_client_id" placeholder="环信client_id" value="<?php echo $tem['hx_client_id']; ?>" id="hx_client_id" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">环信secret：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="hx_secret" placeholder="环信secret" value="<?php echo $tem['hx_secret']; ?>" id="hx_secret" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">环信appkey_1：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="hx_appkey_1" placeholder="环信appkey_1" value="<?php echo $tem['hx_appkey_1']; ?>" id="hx_appkey_1" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">环信appkey_2：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="hx_appkey_2" placeholder="环信appkey_2" value="<?php echo $tem['hx_appkey_2']; ?>" id="hx_appkey_2" >
			</div>
		</div>
		</label>
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<input type="text" class="input-text" name="zuan_watch_num" placeholder="钻石会员观看导师直播次数" value="<?php echo $tem['zuan_watch_num']; ?>" id="zuan_watch_num" >-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-2">押金金额：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<input type="text" class="input-text" name="deposit" placeholder="体现比例" value="<?php echo $tem['deposit']; ?>" id="deposit" >-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="row cl hidden">-->
			<!--<label class="form-label col-xs-4 col-sm-2">钻石兑换赏票比：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<span>-->
				<!--<input type="text" class="input-text" name="convert_scale1" placeholder="钻石值" value="<?php echo $tem['convert_scale1']; ?>" id="convert_scale1" style="width: 100px" >-->
				<!--:-->
				<!--<input type="text" class="input-text" name="convert_scale2" placeholder="赏票值" value="<?php echo $tem['convert_scale2']; ?>" id="convert_scale2" style="width: 100px" >-->
				<!--</span>-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-2">云点兑换人民币比例：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<span>-->
				<!--<input type="text" class="input-text" name="convert_scale3" placeholder="钻石值" value="<?php echo $tem['convert_scale3']; ?>" id="convert_scale3" style="width: 100px" >-->
				<!--:-->
				<!--<input type="text" class="input-text" name="convert_scale4" placeholder="人民币" value="<?php echo $tem['convert_scale4']; ?>" id="convert_scale4" style="width: 100px" >-->
				<!--</span>-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-2">默认直播打赏比：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<input type="text" class="input-text" name="dashang_scale" placeholder="默认直播打赏比" value="<?php echo $tem['dashang_scale']; ?>" id="dashang_scale" style="width: 50px">%-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-2">平台默认商家提成：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<input type="text" class="input-text" name="sell_scale" placeholder="平台默认商家提成" value="<?php echo $tem['sell_scale']; ?>" id="sell_scale" style="width: 50px">%-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-2">电视台推广提成：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<input type="text" class="input-text" name="tv_sell_scale" placeholder="电视台推广提成" value="<?php echo $tem['tv_sell_scale']; ?>" id="tv_sell_scale" style="width: 50px">%-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-2">默认供货电视台：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<input type="text" class="input-text" name="spread_scale" placeholder="默认供货电视台" value="<?php echo $tem['spread_scale']; ?>" id="spread_scale" style="width: 50px">%-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-2">默认引流方：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<input type="text" class="input-text" name="spread_scale1" placeholder="默认引流方" value="<?php echo $tem['spread_scale1']; ?>" id="spread_scale1" style="width: 50px">%-->
			<!--</div>-->
		<!--</div>-->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">短信默认：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="default_verify" placeholder="短信默认验证码" value="<?php echo $tem['default_verify']; ?>" id="default_verify" >
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button  class="submit btn btn-primary radius"  type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存修改</button>
				<!--<button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>-->
				<button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
				<button onClick="clearCache();" class="btn btn-default radius" type="button">&nbsp;&nbsp;清除缓存&nbsp;&nbsp;</button>
				<input type="hidden" class="input-text" value="<?php echo $_GET['id']; ?>" placeholder=""  name="b_id">
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


			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});
		})

	function clearCache() {
		var url = "<?php echo url('Config/clean_cache'); ?>";
		$.get(url,function(data){
			if(data.status == 'ok'){
                layer.msg('清除缓存成功！',{icon:1,time:1000});
			}
		},'json');
    }


</script>
<!--/请在上方写此页面业务相关的脚本-->
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
<script type="text/javascript" src="/static/zTree/js/jquery.ztree.core.js"></script>
<script type="text/javascript" src="/static/zTree/js/jquery.ztree.excheck.js"></script>
</html>