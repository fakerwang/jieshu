<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:72:"/mnt2/data/dayday/public/../application/admin/view/live/anchor_list.html";i:1525851461;s:62:"/mnt2/data/dayday/public/../application/admin/view/layout.html";i:1520221433;s:70:"/mnt2/data/dayday/public/../application/admin/view/common/_header.html";i:1528535116;s:70:"/mnt2/data/dayday/public/../application/admin/view/common/_footer.html";i:1520221433;}*/ ?>
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
    <?php echo widget('Base/breadcrumbs',[
[
['href'=>url('Live/anchor'),'text'=>'主播列表'],
]
]); ?>
<div class="page-container">
    <div class="text-l">
        <form class="search"  method="get">
            <input type="text" class="input-text" style="width:250px" placeholder="输入名称、电话" value="<?php echo !empty($_GET['username'])?$_GET['username']:''; ?>" name="username">
            <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
        </form>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
            <span style="margin-left: 60px">主播共有<?php echo $count; ?>名</span>
		</span>
        <span class="r">共有数据：<strong><?php echo $count1; ?></strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="40">序号</th>
                <th width="80">关联商家ID</th>
                <th width="80">关联商家名称</th>
                <th width="80">主播名</th>
                <th width="80">主播号</th>
                <th width="80">姓名</th>
                <th width="100">身份证号</th>
                <th width="90">申请时间</th>
                <th width="140">资质图片</th>
                <th width="90">状态</th>
                <th width="90">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><input type="checkbox" value="<?php echo $vo['anchor_id']; ?>" name="checkbox"></td>
                <td><?php echo $vo['anchor_id']; ?></td>
                <td><?php echo $vo['gl_merchants_id']; ?></td>
                <td><?php echo $vo['company_name']; ?></td>
                <td><?php echo $vo['nick_name']; ?></td>
                <td><?php echo $vo['anchor_phone']; ?></td>
                <td><?php echo $vo['anchor_name']; ?></td>
                <td><?php echo $vo['card']; ?></td>
                <td><?php echo date("Y-m-d H:i:s",$vo['create_time']); ?></td>
                <td><img src="<?php echo $vo['user_img']; ?>" style="width:50px; height:50px; border-radius:25px;"></td>
                <td>
                    <?php switch($name=$vo['is_shenhe']): case "1": ?>未审核<?php break; case "2": ?>审核<?php break; case "3": ?>拒绝<?php break; endswitch; ?>
                </td>
                <td>
                    <a title="编辑" href="<?php echo url('Live/edit_anchor',['anchor_id'=>$vo['anchor_id']]); ?>"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <div style="text-align:center">
            <span>
                 <?php echo $list->render(); ?>
            </span>
    </div>
</div>
<script type="text/javascript">
    function getChecked() {
        var gids = new Array();
        $.each($('input[name="checkbox"]:checked'), function(i, n){
            gids.push( $(n).val() );
        });
        return gids;
    }
    function datadel(kid){
        kid = kid ? kid : getChecked();
        kid = kid.toString();
        console.log(kid);
        if(kid == ''){
            layer.msg('你没有选择任何选项！', {offset: 95,shift: 6});
            return false;
        }
        layer.confirm('确认要删除吗？',function(index){
            $.post("<?php echo url('Role/del_anchor'); ?>", {ids:kid}, function(data){
                if( data.status == 'ok' ){
                    layer.msg(data.info,{icon:1,time:1000});
                    window.location.href = data.url;
                }else{
                    layer.msg(data.info,{icon:1,time:1000});
                }
            },'json');
        })
    }
    /*用户-添加*/
    function member_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-查看*/
    function member_show(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-停用*/
    function member_stop(obj,id){
        layer.confirm('确认要停用吗？',function(index){
            $.post("<?php echo url('Member/change_stop_status'); ?>",{id:id},function(data){
                if(data.info == 1){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,'+id+')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
                    $(obj).remove();
                    layer.msg('已停用!',{icon: 5,time:1000});
                }
            },'json')
        });
    }

    /*用户-启用*/
    function member_start(obj,id){
        layer.confirm('确认要启用吗？',function(index){
            $.post("<?php echo url('Member/change_stop_status'); ?>",{id:id},function(data){
                if(data.info == 2){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,'+id+')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                    $(obj).remove();
                    layer.msg('已启用!',{icon: 6,time:1000});
                }
            },'json');

        });
    }
    /*用户-编辑*/
    function member_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*密码-修改*/
    function change_password(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-删除*/
    function del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.post("<?php echo url('Role/del_anchor'); ?>", {ids:id}, function(data){
                if( data.status == 'ok' ){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }else{
                    layer.msg(data.info,{icon:5,time:1000});
                }
            },'json');
        });
    }

    /*用户-删除*/
    function changeType(id,obj){
        layer.confirm('确认要改变状态，变成导师吗？',function(index){
            $.post("<?php echo url('merchants/change_type'); ?>", {ids:id}, function(data){
                if( data.status == 'ok' ){
                    $(obj).parents("tr").remove();
                    layer.msg('已变更为导师!',{icon:1,time:1000});
                }else{
                    layer.msg(data.info,{icon:5,time:1000});
                }
            },'json');
        });
    }
    $(".submit").click(function(){
        layer.open({
            type: 2,
            area: ['1000px', '550px'],
            fixed: false, //不固定
            maxmin: true,
            content: 'http://newshop.tstmobile.com/web-im/index.html#username=ZGQ3MXJmZXJ3Ynhl'
        });

    });

    /*图片-发布*/
    function change_review(obj,id){
        layer.confirm('确认要操作吗？',function(index){
            $.post("<?php echo url('Live/change_anchor_review'); ?>",{id:id},function(data){
                console.log(data);
                if(data.data==2){
                    $(obj).parents("td").html('<u><a href="javascript:;;" onClick="change_review(this,'+id+')"><span class="label label-success radius">已审核</span></a></u>');
                    layer.msg('操作成功!',{icon: 6,time:1000});
                }else if(data.data == 0){
                    $(obj).parents("td").html('<u><a href="javascript:;;" onClick="change_review(this,'+id+')"><span class="label label-defaunt radius">未审核</span></a></u>');
                    layer.msg('操作成功!',{icon: 6,time:1000});
                }
            },'json')
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
<script type="text/javascript" src="/static/zTree/js/jquery.ztree.core.js"></script>
<script type="text/javascript" src="/static/zTree/js/jquery.ztree.excheck.js"></script>
</html>