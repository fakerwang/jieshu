<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:71:"/mnt2/data/dayday/public/../application/admin/view/live/edit_apply.html";i:1530244072;s:68:"/mnt2/data/dayday/public/../application/admin/view/common/_menu.html";i:1520221433;s:74:"/mnt2/data/dayday/public/../application/admin/view/common/breadcrumbs.html";i:1520221433;s:70:"/mnt2/data/dayday/public/../application/admin/view/widget/ueditor.html";i:1520221433;}*/ ?>
<script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/static/ueditor/lang/zh-cn/zh-cn.js"></script>
<div style="width:100%">
    <textarea id="myEditor" name="<?php echo $id; ?>" type="text/plain" style="width:100%;height:350px">
<?php echo $content; ?>
</textarea>
</div>
<script type="text/javascript">
    var editor = new UE.ui.Editor();
    editor.render("myEditor");
</script>
