<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"/mnt2/data/dayday/public/../application/admin/view/live/play_url.html";i:1525401895;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
<div id="a1" style="width: 1004px;height: 560px;"><?php echo $re['cover_img']; ?></div>
</body>
</html>
<script type="text/javascript" src="/static/chplayer/chplayer.js" charset="utf-8"></script>
<script type="text/javascript">
    var videoObject = {
        container: '#a1',
        variable: 'player',
        volume: 0.6, //默认音量，范围是0-1
        poster: "<?php echo $re['cover_img']; ?>", //封面图片地址
        autoplay: true,
        loop: false,
        live: false, //是否是直播，默认false=点播放，true=直播
        flashplayer: false, //制使用flashplayer
        html5m3u8: true, //是否使用hls，默认不选择，如果此属性设置成true，则不能设置flashplayer:true,
        debug: false, //是否开启调试模式，默认false，不开启
        video: {
            url: "<?php echo $re['url']; ?>",
            type: ['video/avi','video/mp4']
        }
    };
    var player = new chplayer(videoObject); //实例化播放器
</script>