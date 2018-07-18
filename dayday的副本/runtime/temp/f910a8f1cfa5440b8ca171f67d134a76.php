<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:83:"/mnt2/data/dayday/public/../application/merchant/view/live/merchants_live_list.html";i:1529664284;s:65:"/mnt2/data/dayday/public/../application/merchant/view/layout.html";i:1520221433;s:73:"/mnt2/data/dayday/public/../application/merchant/view/common/_header.html";i:1528536599;s:71:"/mnt2/data/dayday/public/../application/merchant/view/common/_menu.html";i:1520221433;s:73:"/mnt2/data/dayday/public/../application/merchant/view/common/_footer.html";i:1520221433;}*/ ?>
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
['href'=>"",'text'=>'直播设置'],
['href'=>url('Live/merchants_live_list'),'text'=>'商户直播'],
]
]); ?>
<div class="page-container">
    <div class="text-l">
        <form class="search"  method="get">
            <span class="select-box" style="width:150px">
            <select name="live_status"  class="select select-box inlin" style="width:120px" id="live_status">
                <option value="">状态</option>
                <option value="1" <?php if($live_status == 1): ?>selected<?php else: endif; ?>>直播中</option>
                <option value="2" <?php if($live_status == 2): ?>selected<?php else: endif; ?>>已结束</option>
            </select>
            </span>
            <input type="text" class="input-text" style="width:250px" placeholder="搜索直播标题、主播账号、主播昵称" value="<?php echo $_GET['username']; ?>" name="username">
            <input type="text" class="input-text "  id="start_time" style="width:190px" name="start_time" value="<?php echo $_GET['start_time']; ?>"  placeholder="开始时间" readonly>
            <input type="text" class="input-text "  id="end_time" style="width:190px" name="end_time" value="<?php echo $_GET['end_time']; ?>"  placeholder="结束时间" readonly>
            <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
        </form>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="r">共有数据：<strong><?php echo (isset($count) && ($count !== '')?$count:0); ?></strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th width="100">序号</th>
                <!--<th width="100">直播申请ID</th>-->
                <!--<th width="100">大屏MAC</th>-->
                <th width="90">店铺名称</th>
                <th width="100">主播</th>
                <th width="100">账号</th>
                <!--<th width="120">封面</th>-->
                <th width="100">标题</th>
                <th width="70">商品数</th>
                <th width="70">关注数</th>
                <th width="70">分享数</th>
                <th width="70">销售额</th>
                <!--<th width="190">开播时间</th>-->
                <th width="70">观看总人数</th>
                <th width="100">直播状态</th>
                <th width="160">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><?php echo $vo['live_id']; ?></td>
                <!--<td><?php echo $vo['apply_id']; ?></td>-->
                <!--<td><?php echo $vo['Mac_address']; ?></td>-->
                <td><?php echo $vo['company_name']; ?></td>
                <td><?php echo $vo['anchor_name']; ?></td>
                <td><?php echo $vo['anchor_phone']; ?></td>
                <!--<td><img   src="<?php echo $vo['business_img']; ?>" style="width: 50px;height: 50px"/></td>-->
                <td><?php echo $vo['title']; ?></td>
                <td><?php echo $vo['goods_id_num']; ?></td>
                <td><?php echo $vo['follow_num']; ?></td>
                <td><?php echo $vo['share_num']; ?></td>
                <td><?php echo $vo['total_money']; ?></td>
                <!--<td><?php echo date("Y-m-d H:i:s",$vo['start_time']); ?>-&#45;&#45;<?php echo date("Y-m-d H:i:s",$vo['end_time']); ?></td>-->
                <td><?php echo $vo['nums']; ?></td>
                <td class="td-manage">
                    <?php if($vo['live_status'] == 1): ?>
                    <a title="强制下线" href="javascript:;" onclick="offline('<?php echo $vo['live_id']; ?>');"  class="ml-5" style="text-decoration:none">
                        <i class="Hui-iconfont">&#xe6dd;</i>
                        <a title="播放" href="javascript:;" onclick="sel('<?php echo url('Live/play_live',['id'=>$vo[live_id]]); ?>')"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e6;</i></a>
                        <?php else: ?>
                        已结束
                        <?php endif; ?>
                </td>
                <td>
                    <!--<a title="解绑" style="text-decoration:none"  onClick="member_start(this,'<?php echo $vo['apply_id']; ?>')"><i class="Hui-iconfont">&#xe634;</i></a>-->

                    <a title="详情" href="<?php echo url('Live/edit_apply',['apply_id'=>$vo['apply_id']]); ?>"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                    <?php if($vo['is_del'] == 2): ?>
                    <u><a style="text-decoration:none"  onClick="change_review(this,'<?php echo $vo['live_id']; ?>')" href="javascript:;"><span class="label label-defaunt radius">关闭</span></a></u>
                    <?php else: ?>
                    <u><a style="text-decoration:none"  onClick="change_review(this,'<?php echo $vo['live_id']; ?>')" href="javascript:;"><span class="label label-success radius">开启</span></a></u>
                    <?php endif; ?>
                    <!--<?php if($vo['live_status'] == 2): ?>-->

                    <!--<a style="text-decoration:none"  onClick="video_start(this,'<?php echo $vo['live_id']; ?>')" href="javascript:;" title="暂停"><i class="Hui-iconfont">&#xe631;</i></a>-->
                    <!--<?php else: ?>-->
                    <!--<a style="text-decoration:none"  onClick="video_stop(this,'<?php echo $vo['live_id']; ?>')" href="javascript:;" title="播放"><i class="Hui-iconfont">&#xe6e6;</i></a>-->
                    <!--<?php endif; ?>-->
                </td>
            </tr>
            <?php endforeach; endif; else: echo "$empty" ;endif; ?>
            </tbody>
        </table>
    </div>
    <div style="text-align:center">
            <span>
                 <?php echo $page; ?>
            </span>
    </div>
    <div id="made" class="hide" style="display: none;">
        <img style="width:100%" id="zhubo" src="">
    </div>
</div>
<script type="text/javascript" src="/static/layer/2.1/layer.js"></script>
<script type="text/javascript">
    /*	$(document).ready(function(){
     $('.table-sort').dataTable({
     "aaSorting": [[ 1, "desc" ]],//默认第几个排序
     "bStateSave": true,//状态保存
     "aoColumnDefs": [
     {"orderable":false,"aTargets":[0,7]}// 制定列不参与排序
     ]
     });
     });*/

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
        if(kid == ''){
            layer.msg('你没有选择任何选项！', {offset: 95,shift: 6});
            return false;
        }
        layer.confirm('确认要删除吗？',function(index){
            $.post("<?php echo url('Goods/del_goods'); ?>", {ids:kid}, function(data){
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
    function member_show(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-停用*/
    function member_stop(obj,id){
        console.log(1);
        layer.confirm('确认要解绑吗？',function(index){
            $.post("<?php echo url('Live/change_live_hot'); ?>",{id:id},function(data){
                console.log(data);

                if(data.info == 1){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none"  onClick="member_start(this,'+id+')" href="javascript:;" title="解绑"><i class="Hui-iconfont">&#xe634;</i></a>');
                    $(obj).remove();
                    layer.msg('已解绑!',{icon: 5,time:1000});
                }
            },'json')
        });
    }

    /*用户-启用*/
    function member_start(obj,id){
        layer.confirm('确认要解绑吗？',function(index){
            $.post("<?php echo url('Live/change_live_hot'); ?>",{id:id},function(data){
                console.log(data);
                if(data.status == 'ok'){
                    // $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="ml-5" onClick="member_stop(this,'+id+')" href="javascript:;" title="解绑"><i class="Hui-iconfont">&#xe634;</i></a>');
                    $(obj).remove();
                    layer.msg('已解绑!',{icon: 6,time:1000});
                }else if(data.status == 'error'){
                    layer.msg('已解绑过了!',{icon: 6,time:1000});
                }
            },'json');

        });
    }
    /*用户-删除*/
    function del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.post("<?php echo url('Goods/del_goods'); ?>", {ids:id}, function(data){
                if( data.status == 'ok' ){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }else{
                    layer.msg(data.info,{icon:5,time:1000});
                }
            },'json');
        });
    }

    function offline(id) {
        layer.confirm('确定强制下线？',function(index){
            $.post("<?php echo url('Live/offline'); ?>", {id:id}, function(v){
                if( v == 1 ){
                    layer.msg('已强制下线！',{icon:1,time:1000});
                    window.location.href = window.location.href;

                }else{
                    layer.msg('强制下线失败！',{icon:5,time:1000});
                }
            });
        });
    }

    /*图片-发布*/
    function change_review(obj,id){
        layer.confirm('确认要操作吗？',function(index){
            $.post("<?php echo url('Live/change_live_state'); ?>",{id:id},function(data){
                console.log(data);
                if(data.data==2){
                    $(obj).parents("td").html('<u><a href="javascript:;;" onClick="change_review(this,'+id+')"><span class="label label-success radius">已关闭</span></a></u>');
                    layer.msg('操作成功!',{icon: 6,time:1000});
                }else if(data.data == 1){
                    $(obj).parents("td").html('<u><a href="javascript:;;" onClick="change_review(this,'+id+')"><span class="label label-defaunt radius">已开启</span></a></u>');
                    layer.msg('操作成功!',{icon: 6,time:1000});
                }
            },'json')
        });
    }

    function view_play_img(v){
        $("#zhubo").attr('src',v);
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            area: '516px',
            skin: 'layui-layer-nobg', //没有背景色
            shadeClose: true,
            content: $('#made')
        });
    }

    function view_img(v,id){
        var url = "<?php echo url('Live/check_img'); ?>";
        $.post(url,{img:v},function(data){
            if(data.status == 'ok'){
                $("#zhubo").attr('src',v);
                layer.open({
                    type: 1,
                    title: false,
                    closeBtn: 0,
                    area: '384px',
                    skin: 'layui-layer-nobg', //没有背景色
                    shadeClose: true,
                    content: $('#zhubo')
                });
            }else{
                layer.msg('该直播已经结束!',{icon:5,time:1000});
                window.location.href = window.location.href;
            }
        },'json');
        return false;
    }

    function sel(id) {
        layer.open({
            type: 2,
            title: false,
            area: ['1020px', '587px'],
            shade: 0.1,
            closeBtn: 1,
            shadeClose: false,
            content: id,
        });
    }


    /*用户-停用*/
    function video_stop(obj,id){
        layer.confirm('确认要暂停吗？',function(index){
            $.post("<?php echo url('Live/live_state'); ?>",{id:id},function(data){
                console.log(data);
                if(data.data == 2){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none"  onClick="video_stop(this,'+id+')" href="javascript:;" title="暂停"><i class="Hui-iconfont">&#xe631;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已暂停</span>');
                    $(obj).remove();
                    layer.msg('已暂停!',{icon: 5,time:1000});
                }
            },'json')
        });
    }

    /*用户-启用*/
    function video_start(obj,id){
        layer.confirm('确认要播放吗？',function(index){
            $.post("<?php echo url('Live/live_state'); ?>",{id:id},function(data){
                console.log(data);
                if(data.data == 1){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="ml-5" onClick="video_stop(this,'+id+')" href="javascript:;" title="播放"><i class="Hui-iconfont">&#xe6e6;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已播放</span>');
                    $(obj).remove();
                    layer.msg('已播放!',{icon: 6,time:1000});
                }
            },'json');

        });
    }
</script>
<script type="text/javascript" src="/static/layui/lay/dest/layui.all.js"></script>
<script>
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
            min: '1900-01-01 00:00:00', //最小日期
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