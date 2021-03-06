<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"/mnt2/data/dayday/public/../application/admin/view/common/login-1.html";i:1520221433;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>登录-<?php echo $system; ?></title>
    <meta name="author" content="DeathGhost" />
    <link rel="stylesheet" type="text/css" href="/static/plugs/css/style.css" />
    <link rel="stylesheet"  href="/static/asyncbox/skins/default.css" />
    <link rel="stylesheet" type="text/css" href="/static/layui/css/layui.css" />
    <style>
        body{height:100%;background:#16a085;overflow:hidden;}
        canvas{z-index:-1;position:absolute;}
        .box{
            display: flex;
        }
        .box_start{
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
        .box_center{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box_between{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .box_arou{
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        .box_end{
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
    </style>
    <script src="/static/plugs/js/jquery.js"></script>
    <script src="/static/jquery/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/static/layer/2.1/layer.js"></script>
    <script type="text/javascript" src="/static/layer/2.1/extend/layer.ext.js"></script>
    <script src="/static/common.js"></script>
    <script src="/static/jquery/jquery.form.js"></script>
    <script src="/static/jquery/jquery-ui.min.js"></script>
    <!--<script src="/static/asyncbox/asyncbox.js"></script>-->
    <!--<script src="/Public/plugs/js/verificationNumbers.js"></script>-->
    <script src="/static/plugs/js/Particleground.js"></script>
    <script src="/static/kindeditor/kindeditor.js"></script>
    <script src="/static/kindeditor/lang/zh_CN.js"></script>
    <script>
        $(document).ready(function() {
            //粒子背景特效
            $('body').particleground({
                dotColor: '#5cbdaa',
                lineColor: '#5cbdaa'
            });
            //验证码
//            createCode();
            //测试提交，对接程序删除即可
            $(".submit_btn").click(function(){
                $("#op_type").val("1");
                if($("#uname").val()==''||$("#password").val()==''||$("#verify_code").val()==''){
                    console.log(1);
                    layer.msg("登录信息填写完整方可登录系统！",{icon:5,time:1000});
                    return false;
                }
                commonAjaxSubmit();
            });
        });
    </script>
</head>
<body>
<div style="float:right;margin-right: 3%;margin-top:10px;">
</div>
<dl class="admin_login">
    <form id="form1"  method="post">
        <dt>
            <strong><?php echo $system; ?>管理系统</strong>
            <em>Management System</em>
        </dt>
        <dd class="user_icon">
            <input type="text" autocomplete="off" name="uname" id="uname"  placeholder="账号" class="login_txtbx"/>
        </dd>
        <dd class="pwd_icon">
            <input type="password" autocomplete="off" name="password" id="password" placeholder="密码" class="login_txtbx"/>
        </dd>
        <dd class="val_icon">
            <div>
                <input type="text" name="verify_code" id="verify_code" placeholder="验证码" maxlength="4" class="login_txtbx" style="width:130px;">
                <img src="<?php echo url('Login/verify_code',['code'=>date('YmdHis').rand(100000,999999)]); ?>" id="verify" title="看不清？单击此处刷新" onclick="this.src='<?php echo url('Login/verify_code',['code'=>date('YmdHis').rand(100000,999999)]); ?>'"  style="margin-left:35px;height:41px;width:100px;cursor: pointer; vertical-align: middle;"/>
            </div>
        </dd>
        <dd>
            <input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
            <input type="hidden" name="op_type" id="op_type" value="1"/>
            <input type="button" value="立即登陆" class="submit_btn"/>
        </dd>
        <dd>
            <!--<p>© 2015-2016 DeathGhost 版权所有</p>-->
            <!--<p>陕B2-20080224-1</p>-->
        </dd>
    </form>
</dl>
</body>
</html>