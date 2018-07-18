<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/mnt2/data/dayday/public/../application/merchant/view/common/breadcrumbs.html";i:1522054598;}*/ ?>
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i><a href="<?php echo url('Index/index'); ?>"> 网站首页</a>
	<?php if(is_array($action) || $action instanceof \think\Collection): if( count($action)==0 ) : echo "" ;else: foreach($action as $key=>$v): ?>
			<span class="c-gray en">&gt;</span><a href="<?php echo $v['href']; ?>"><?php echo $v['text']; ?></a>
	<?php endforeach; endif; else: echo "" ;endif; ?>
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
		<i class="Hui-iconfont">&#xe68f;</i>
	</a>
</nav>