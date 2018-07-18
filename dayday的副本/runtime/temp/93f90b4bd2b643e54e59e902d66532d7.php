<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:73:"/mnt2/data/dayday/public/../application/admin/view/home/add_carousel.html";i:1529893481;s:62:"/mnt2/data/dayday/public/../application/admin/view/layout.html";i:1520221433;s:70:"/mnt2/data/dayday/public/../application/admin/view/common/_header.html";i:1528535116;s:70:"/mnt2/data/dayday/public/../application/admin/view/common/_footer.html";i:1520221433;}*/ ?>
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
    <?php 
	$uid = input('get.uid');
	$uid?$text='编辑轮播':$text='添加轮播';
 ?>
<?php echo widget('base/breadcrumbs',[
[
['href'=>url('Home/index'),'text'=>'首页轮播'],
['href'=>'','text'=>$text]
]
]); ?>
<link rel="stylesheet" href="/static/zTree/css/demo.css" type="text/css">
<div class="page-container">
	<div id="big"></div>
	<div id="big2"></div>
	<form class="form form-horizontal" id="form" method="post">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>轮播标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="title" class="input-text" value="<?php echo $re['title']; ?>" placeholder="轮播标题" id="title" />
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>轮播图片：</label>
			<label  id="image_show" style="margin-left: 10px;">宽高：750px，360px；大小：不超过1M</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="droparea spot" id="image1" style="background-image: url('<?php echo $re['b_img']; ?>');background-size: 220px 160px;" >
					<div class="instructions" onclick="del_image('1')">删除</div>
					<div id="uparea1"></div>
					<input type="hidden" name="b_img" id="image_1" value="<?php echo $re['b_img']; ?>" />
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>场景：</label>
			<div class="formControls col-xs-8 col-sm-9"><span class="select-box">
				<select name="type" class="select">
					<option value="1" <?php echo !empty($re['type']) && $re['type']==1?'selected' : ''; ?>>直播首页</option>
					<!--<option value="2" <?php echo !empty($re['type']) && $re['type']==2?'selected' : ''; ?>>商城首页</option>-->
					<option value="3" <?php echo !empty($re['type']) && $re['type']==3?'selected' : ''; ?>>直播列表</option>
					<!--<option value="4" <?php echo !empty($re['type']) && $re['type']==4?'selected' : ''; ?>>优惠券</option>-->
				</select>
				</span></div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>跳转属性：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					<select name="b_type" class="select" onchange="changeMk(this.value)">
						<option value="1" <?php echo !empty($re['b_type']) && $re['b_type']==1?'selected' : ''; ?>>无跳转</option>
						<option value="2" <?php echo !empty($re['b_type']) && $re['b_type']==2?'selected' : ''; ?>>WEB链接</option>
						<!--<option value="3" <?php echo !empty($re['b_type']) && $re['b_type']==3?'selected' : ''; ?>>分类页</option>-->
						<!--<option value="4" <?php echo !empty($re['b_type']) && $re['b_type']==4?'selected' : ''; ?>>商家</option>-->
						<!--<option value="5" <?php echo !empty($re['b_type']) && $re['b_type']==5?'selected' : ''; ?>>商品</option>-->
						<!--<option value="6" <?php echo !empty($re['b_type']) && $re['b_type']==6?'selected' : ''; ?>>优惠券</option>-->
						<!--<option value="6" <?php echo !empty($re['b_type']) && $re['b_type']==7?'selected' : ''; ?>>标签</option>-->
					</select>
				</span>
			</div>
		</div>
		<div id="tag2" class="row tag cl <?php echo !empty($re['b_type']) && $re['b_type']==2?'' : 'hiden'; ?>">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>跳转值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo !empty($re['jump'])?$re['jump'] : ''; ?>" placeholder="跳转WEB页"  name="url" />
			</div>
		</div>
		<!--<div id="tag3" class='row tag cl <?php echo !empty($re['type']) && $re['type']==3?'' : 'hiden'; ?>'>-->
		<!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>导师ID：</label>-->
		<!--<div class="formControls col-xs-8 col-sm-9">-->
		<!--<input type="text" class="input-text" value="<?php echo !empty($banner['value'])?$banner['value'] : ''; ?>" placeholder="导师ID"  name="user" />-->
		<!--</div>-->
		<!--</div>-->
		<div id="tag3" class="row tag cl <?php echo !empty($re['b_type']) && $re['b_type']==3?'' : 'hiden'; ?>">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品分类：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="" class="input-text select" id="citySel" value="<?php echo $class['class_name']; ?>" onclick="checkMenu();" placeholder="选择分类"  />
				<input type="hidden" name="class_uuid" class="input-text select" id="class" value="<?php echo $class['class_uuid']; ?>"   />
				<div id="menuContent" class="menuContent" style="display:none; position:relative;">
					<ul id="treeDemo" class="ztree" style="margin-top:0; width:180px; max-height: 200px;"></ul>
				</div>
			</div>
		</div>
		<div id="tag4" class="row tag cl <?php echo !empty($re['b_type']) && $re['b_type']==4?'' : 'hiden'; ?>">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商家：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box" style="width: 55%">
					<select id="merchant" name="merchant" class="select">
						<?php if(is_array($merchants) || $merchants instanceof \think\Collection): $i = 0; $__LIST__ = $merchants;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $vo['member_id']; ?>" <?php echo !empty($re['b_type']) && $re['b_type']==4 && $re['jump'] == $vo['member_id']?'selected' : ''; ?>><?php echo $vo['merchants_name']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</span>
				<input type="text"  class="input-text" style="width: 30%" value="" placeholder="商家店铺名"  />
				<button type="button" onclick="searchMerchant($(this))" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索 </button>
			</div>
		</div>
		<div id="tag5" class="row tag cl <?php echo !empty($re['b_type']) && $re['b_type']==5?'' : 'hiden'; ?>">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品：</label>
			<div  class="formControls col-xs-8 col-sm-9">
				<span class="select-box" style="width: 55%">
					<select id="goods" name="goods" class="select">
						<?php if(is_array($goods) || $goods instanceof \think\Collection): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $vo['goods_id']; ?>" <?php echo !empty($re['b_type']) && $re['b_type']==4 && $re['jump'] == $vo['goods_id']?'selected' : ''; ?>><?php echo $vo['goods_name']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</span>
				<input type="text"  class="input-text" style="width: 30%" value="" placeholder="商品名称"  />
				<button type="button" onclick="searchGoods($(this))" class="btn btn-success radius"  name=""><i class="Hui-iconfont">&#xe665;</i> 搜索 </button>
			</div>
		</div>
		<div id="tag6" class="row tag cl <?php echo !empty($re['b_type']) && $re['b_type']==6?'' : 'hiden'; ?>">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>跳转值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" readonly value="<?php echo config('domain') ?>/webh5/coupon.html?uid=&token=" placeholder="优惠券页"  name="coupon" />
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo (isset($banner['remark']) && ($banner['remark'] !== '')?$banner['remark']:0); ?>" placeholder="" id="remark" name="remark">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button  class="submit btn btn-primary radius"  type="button"><i class="Hui-iconfont">&#xe632;</i> 保存并提交</button>
				<!--<button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>-->
				<button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
				<input type="hidden" class="input-text" value="<?php echo $re['b_id']; ?>" placeholder=""  name="b_id">
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
					uploadJson:"<?php echo url('Tools/upload'); ?>"
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

		function changeMk(v){
			$('.tag').hide();
			$('#tag'+v).show();
		}



</script>
<script>
    var setting = {
        check: {
            enable: true,
            chkStyle: "radio",
            radioType: "all"
        },
        view: {
            dblClickExpand: true
        },
        data: {
            simpleData: {
                enable: true
            }
        },
        callback: {
            onClick: onClick,
            onCheck: onCheck
        }
    };

    zNodes = new Array();
    function get_zNodes() {
        $.ajax({
            url: "<?php echo url('Home/getClass'); ?>",
            type: "POST",
            async: false,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.status == 'ok') {
                    var arr = data.data;
                    for (var i = 0; i < arr.length; i++) {
                        var object = new Object();
                        object.id = parseInt(arr[i].class_id);
                        object.pId = 0;
                        object.name = arr[i].class_name;
                        object.class_uuid = arr[i].class_uuid;
                        object.isParent = true;
                        zNodes.push(object);
                        if (arr[i].seed.length > 0) {
                            for (var j = 0; j < arr[i].seed.length; j++) {
                                var object = new Object();
                                object.id = parseInt(arr[i].seed[j].class_id);
                                object.pId = parseInt(arr[i].seed[j].parent_id);
                                object.name = arr[i].seed[j].class_name;
                                object.class_uuid = arr[i].seed[j].class_uuid;
                                object.isParent = false;
                                zNodes.push(object);
                            }
                        }
                    }
                }
            },
            error: function (data) {

            }

        });
    }
    get_zNodes();



    function onClick(e, treeId, treeNode) {
        var zTree = $.fn.zTree.getZTreeObj("treeDemo");
        zTree.checkNode(treeNode, !treeNode.checked, null, true);
        return false;
    }

    function onCheck(e, treeId, treeNode) {
        var zTree = $.fn.zTree.getZTreeObj("treeDemo"),
            nodes = zTree.getCheckedNodes(true),
            v = "";
        class_uuid = '';
        console.log(nodes);
        for (var i=0, l=nodes.length; i<l; i++) {
            console.log(nodes[i]);
            v += nodes[i].name + ",";
            class_uuid = nodes[i].class_uuid + ",";
        }
        if (v.length > 0 ) v = v.substring(0, v.length-1);
        if (class_uuid.length > 0 ) class_uuid = class_uuid.substring(0, class_uuid.length-1);
        var cityObj = $("#citySel");
        cityObj.attr("value", v);
        $('#class').val(class_uuid)
    }

    function checkMenu(){
        if($("#menuContent").is(":hidden")){
            showMenu();    //如果元素为隐藏,则将它显现
        }else{
            hideMenu();     //如果元素为显现,则将其隐藏
        }
    }

    function showMenu() {
//        $("#menuContent").css({left:cityOffset.left + "px", top:cityOffset.top + cityObj.outerHeight() + "px"}).slideDown("fast");
        $("#menuContent").slideDown("fast");
        $("body").bind("mousedown", onBodyDown);
    }
    function hideMenu() {
        $("#menuContent").fadeOut("fast");
        $("body").unbind("mousedown", onBodyDown);
    }
    function onBodyDown(event) {
        if (!(event.target.id == "menuBtn" || event.target.id == "citySel" || event.target.id == "menuContent" || $(event.target).parents("#menuContent").length>0)) {
            hideMenu();
        }
    }

    $(document).ready(function(){
        console.log(zNodes);
        $.fn.zTree.init($("#treeDemo"), setting, zNodes);
    });
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