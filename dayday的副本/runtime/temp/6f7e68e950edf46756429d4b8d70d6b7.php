<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"/mnt2/data/dayday/public/../application/admin/view/config/app_version_control.html";i:1530254136;s:62:"/mnt2/data/dayday/public/../application/admin/view/layout.html";i:1520221433;s:70:"/mnt2/data/dayday/public/../application/admin/view/common/_header.html";i:1528535116;s:70:"/mnt2/data/dayday/public/../application/admin/view/common/_footer.html";i:1520221433;}*/ ?>
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
['href'=>'','text'=>'APP版本控制']
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
	<form class="form form-horizontal" id="form"     method="post">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">IOS用户端版本号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="ios_version" placeholder="IOS用户端版本号" value="<?php echo $re['ios_version']; ?>" id="ios_version" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">android用户端版本号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="android_version" placeholder="android用户端版本号" value="<?php echo $re['android_version']; ?>" id="android_version" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">IOS主播端版本号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="ios_merchant_version" placeholder="IOS主播端版本号" value="<?php echo $re['ios_merchant_version']; ?>" id="ios_merchant_version" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">android主播端版本号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="android_merchant_version" placeholder="android主播端版本号" value="<?php echo $re['android_merchant_version']; ?>" id="android_merchant_version" >
			</div>
		</div>
		<!--<div id="upload1" class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-2">安卓用户端下载文件：</label>-->
			<!--<div  class="formControls col-xs-8 col-sm-9">-->
				<!--<div href="javascript:void(0);" class="a-upload" onclick="qiniu_uploader('upload1','btn1','ul_pics1','android_one_path')" rel="external nofollow" id="btn1">-->
					<!--&lt;!&ndash;<input name="video" value="" id="video" type="file" accept="video/*"><?php echo !empty($_GET['id'])?'点击这里更换视频':'点击这里上传视频'; ?>&ndash;&gt;-->
					<!--<?php echo !empty($uid)?'点击这里更换文件':'点击这里上传文件'; ?>-->
				<!--</div>-->
			<!--</div>-->
		<!--</div>-->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"></label>
			<div  class="formControls col-xs-8 col-sm-9">
				<ul id="ul_pics1" class="ul_pics clearfix">
				</ul>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">安卓用户端下载地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="android_one_path" placeholder="android用户端下载地址"  value="<?php echo $re['android_one_path']; ?>" id="android_one_path" >
			</div>
		</div>
		<!--<div id="upload2" class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-2">安卓主播端下载文件：</label>-->
			<!--<div  class="formControls col-xs-8 col-sm-9">-->
				<!--<div href="javascript:void(0);" class="a-upload" onclick="qiniu_uploader('upload2','btn2','ul_pics2','android_two_path')" rel="external nofollow" id="btn2" >-->
					<!--&lt;!&ndash;<input name="video" value="" id="video" type="file" accept="video/*"><?php echo !empty($_GET['id'])?'点击这里更换视频':'点击这里上传视频'; ?>&ndash;&gt;-->
					<!--<?php echo !empty($uid)?'点击这里更换文件':'点击这里上传文件'; ?>-->
				<!--</div>-->
			<!--</div>-->
		<!--</div>-->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"></label>
			<div  class="formControls col-xs-8 col-sm-9">
				<ul id="ul_pics2" class="ul_pics clearfix">
				</ul>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">安卓主播端下载地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="android_two_path" placeholder="android主播端下载地址"  value="<?php echo $re['android_two_path']; ?>" id="android_two_path" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">大屏端下载地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="ping_path" placeholder="大屏端下载地址"  value="<?php echo $re['ping_path']; ?>" id="ping_path" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">IOS用户端下载地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="ios_one_path" placeholder="IOS主播端下载地址" value="<?php echo $re['ios_one_path']; ?>" id="ios_one_path" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">IOS主播端下载地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" name="ios_two_path" placeholder="IOS主播端下载地址" value="<?php echo $re['ios_two_path']; ?>" id="ios_two_path" >
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
<script type="text/javascript" src="/static/plupload/js/moxie.js"></script>
<!--<script type="text/javascript" src="/assets/js/plupload/js/plupload.dev.js"></script>-->
<script type="text/javascript" src="https://cdn.staticfile.org/plupload/2.1.5/plupload.min.js"></script>
<script type="text/javascript" src="/static/plupload/js/i18n/zh_CN.js"></script>
<script type="text/javascript" src="/static/qiniu-js-sdk/dist/qiniu.js"></script>
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

    function qiniu_uploader(a,b,c,d) {

        var uploader = Qiniu.uploader({
            runtimes: 'html5,flash,html4',    //上传模式,依次退化
           // browse_button: 'btn',       //上传选择的点选按钮，**必需**
            browse_button: b,       //上传选择的点选按钮，**必需**
            uptoken_url: "<?php echo url('Tools/get_qiniu_token'); ?>",            //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
            // uptoken : '', //若未指定uptoken_url,则必须指定 uptoken ,uptoken由其他程序生成
            // unique_names: true, // 默认 false，key为文件名。若开启该选项，SDK为自动生成上传成功后的key（文件名）。
            // save_key: true,   // 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK会忽略对key的处理
            domain: 'http://msplay.qqyswh.com',   //bucket 域名，下载资源时用到，**必需**
            get_new_uptoken: false,  //设置上传文件的时候是否每次都重新获取新的token
            //container: 'upload',           //上传区域DOM ID，默认是browser_button的父元素，
            container: a,           //上传区域DOM ID，默认是browser_button的父元素，
            max_file_size: '100mb',           //最大文件体积限制
            flash_swf_url: '/static/plupload/js/Moxie.swf',  //引入flash,相对路径
            silverlight_xap_url: "/static/plupload/js/Moxie.xap",
            max_retries: 3,                   //上传失败最大重试次数
            dragdrop: true,                   //开启可拖曳上传
            drop_element: 'upload',        //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
            unique_names: true,
            chunk_size: '4mb',                //分块上传时，每片的体积
            auto_start: true,                 //选择文件后自动上传，若关闭需要自己绑定事件触发上传
            filters: {
                mime_types: [
                    {title: "Image files", extensions: "apk"}
                ]
            },
            init: {
                'FilesAdded': function (up, files) {
                    //do something
                    //if ($("#ul_pics").children("li").length > 0) {
                    if ($("#"+c).children("li").length > 0) {
                        alert("您上传的内容太多了！");
                        uploader.destroy();
                    } else {
                        console.log(1);
                        var li = '';
                        plupload.each(files, function (file) { //遍历文件
                            li += "<li id='" + file['id'] + "'><div class='progress'><span class='bar'></span></div><div class='percent'>上传中 0%</div></li>";
                        });
                        //$("#ul_pics").append(li);
                        $("#"+c).append(li);
                        uploader.start();
                    }
                },
                'BeforeUpload': function (up, file) {
                    //do something
                },
                'UploadProgress': function (up, file) {
                    //可以在这里控制上传进度的显示
                    //可参考七牛的例子
                    console.log(file)
                    var percent = file.percent;
                    $("#" + file.id).find('.bar').css({"width": percent + "%"});
                    $("#" + file.id).find(".percent").text("上传中 " + percent + "%");
                },
                'UploadComplete': function () {
                    //do something
                },
                'FileUploaded': function (up, file, info) {
                    var str = $.parseJSON(info.response);
                    console.log(str);
                    console.log(str.key);
                    //$('#url').val(str.key);
                    $('#'+d).val('http://play.100ytv.com/'+str.key);
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
                'Error': function (up, err, errTip) {
                    alert(errTip);
                },
                'Key': function (up, file) {
                    //当save_key和unique_names设为false时，该方法将被调用
                    var key = "";
                    $.ajax({
                        url: '/qiniu-token/get-key/',
                        type: 'GET',
                        async: false,//这里应设置为同步的方式
                        success: function (data) {
                            var ext = Qiniu.getFileExtension(file.name);
                            key = data + '.' + ext;
                        },
                        cache: false
                    });
                    return key;
                }
            }
        });
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