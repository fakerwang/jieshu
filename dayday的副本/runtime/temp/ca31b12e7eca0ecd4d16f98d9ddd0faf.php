<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"/mnt2/data/dayday/public/../application/api/view/index/share_live.html";i:1530782465;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta charset="UTF-8">
    <title>体验购直播</title>
    <!--<link rel="stylesheet" href="./share_live/css/reset.css"/>-->
    <link rel="stylesheet" href="http://daylive.tstmobile.com/share_live/css/reset.css"/>
    <link rel="stylesheet" href="http://daylive.tstmobile.com/share_live/css/share.css"/>
    <script src="http://daylive.tstmobile.com/share_live/js/pulice.js"></script>
</head>
<body>
<!-- 播放器 -->
<div id="Player" >
    <script type="text/javascript" src="http://daylive.tstmobile.com/admin/player/sewise.player.min.js"></script>
    <script type="text/javascript">
        SewisePlayer.setup({
            server: "vod",
            type: "m3u8",
            autostart: 'false',    /*是否自动播放*/
            poster: "<?php echo $live['cover_img']; ?>",    /*此处可填写封面地址*/
            videourl: "<?php echo $live['play_address_m3u8']; ?>",    /*此处填写购买获取到的m3u8地址 必填*/
            skin: 'vodOrange',
            title: '<?php echo $live['title']; ?>',
            claritybutton: 'disable',
            lang: 'zh_CN',
            fallbackurls:{
                ogg: "http://jackzhang1204.github.io/materials/mov_bbb.ogg",
                webm: "http://jackzhang1204.github.io/materials/mov_bbb.webm"
            }
        });
    </script>
</div>
<!-- 内容 -->
<div class="messages">
    <div class="message">
        <img class="anchor_img" src="<?php echo $live['cover_img']; ?>" alt=""/>
        <div class="anchor_message">
            <p class="anchor_names">
                <span class="anchor_name"><?php echo $live['company_name']; ?></span>
                <span class="follow"></span>
            </p>
            <!--<p class="anchor_remarks"><?php echo $live['business_img']; ?></p>-->
        </div>
    </div>
    <p class="room_num">ID: <?php echo $live['live_id']; ?></p>
</div>
<div class="bottombtn">
    <div class="w2h2 information"></div>
    <div class="w2h2 gift"></div>
    <div class="w2h2 report"></div>
    <div class="download">
        <a href="<?php echo $live['down_url']; ?>">用体验购APP观看</a>
    </div>
</div>
</body>
</html>