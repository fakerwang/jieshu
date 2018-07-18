/** 
* 删除数组指定下标或指定对象 
**/ 
Array.prototype.remove=function(obj){ 
  for(var i =0;i <this.length;i++){ 
    var temp = this[i]; 
    if(!isNaN(obj)){ 
    temp=i; 
  } 
  if(temp == obj){ 
    for(var j = i;j <this.length;j++){ 
      this[j]=this[j+1]; 
    } 
    this.length = this.length-1; 
    } 
  } 
}
/* 具体用法 */
// var str ="vvvvvvv"; 
// arr.remove(3);//删除下标为3的对象 
// arr.remove(str);//删除对象值为“vvvvvvv” 

/*删除数组中的指定元素*/
Array.prototype.indexOf = function(val) {
  for (var i = 0; i < this.length; i++) {
    if (this[i] == val) return i;
  }
  return -1;
};
Array.prototype.removeOf = function(val) {
  var index = this.indexOf(val);
  if (index > -1) {
    this.splice(index, 1);
  }
};
/*主控制器*/
app.controller('mainCtrl', ['$scope', '$rootScope', '$location', '$timeout', '$http', '$cookies', '$cookieStore', '$sce', function($scope, $rootScope, $location, $timeout, $http, $cookies, $cookieStore, $sce) {
  console.log('主控制器');
  // $cookieStore.put("token","59c3366953629")
  // $cookieStore.put("uid","8233")
  /*获取用户信息*/
  $scope.userInfoFun = function(){
    $http.post(
      url + "api/user/user_info",$.param({
        uid : $cookieStore.get("uid"),
        token : $cookieStore.get("token")
      }),
      {headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}}
    ).success(function(data){
      console.log(data);
      if(data["status"] == 'ok'){
        $scope.userInfo = data["data"];
      }else if(data["status"] == 'error'){
        console.log(data['error']);
      }else if (data['error'] == 'token failed') {
        $scope.loginFun(); // 调用登录失效方法
      }
    })
  }
  /*微信登录*/
  if ($cookieStore.get("user", {path: "/"})) {
    var member = $cookies.get("user", {path: "/"});
    console.log(JSON.parse(member));
    if (member.indexOf("{") == 0) {
      $scope.member = JSON.parse(member);
    } else {
      $scope.member = JSON.parse(member.slice(6));
    }
    $cookieStore.put('uid', $scope.member.member_id);
    $cookieStore.put('token', $scope.member.app_token);
    $cookieStore.put('hx_username', $scope.member.hx_username);
    $cookieStore.put('hx_password', $scope.member.hx_password);
    $scope.userInfoFun();
  } else {
    $cookies.put("url", window.location.href, {path: "/"});
    window.location.href = url + "api/login/weixin"
  }

  /***************
  * 提示方法
  * 用于显示提示信息
  ***************/
  $scope.promptFun = function(txt, time) { //txt(提示文本)，time(时间)
    $scope.promptTxt = txt;
    angular.element("#promptBox").fadeIn(300);
    $timeout(function() {
      angular.element("#promptBox").fadeOut(300);
    }, time)
  }
  /***************
  * 提示方法
  * 用于提示后返回上一页
  ***************/
  $scope.promptBackFun = function(txt, time) { //txt(提示文本)，time(时间)
    $scope.promptTxt = txt;
    angular.element("#promptBox").fadeIn(300);
    $timeout(function() {
      angular.element("#promptBox").fadeOut(300);
      history.back();
    }, time)
  }
  /***************
  * 提示方法
  * 用于提示后返回上上一页
  ***************/
  $scope.promptBackTwoFun = function(txt, time) { //txt(提示文本)，time(时间)
    $scope.promptTxt = txt;
    angular.element("#promptBox").fadeIn(300);
    $timeout(function() {
      angular.element("#promptBox").fadeOut(300);
      history.go(-2);
    }, time)
  }
  /*调用轮播图插件*/
  $scope.flexsliders=function(dom) {
    angular.element(dom).flexslider({
      slideshowSpeed: 3000, //展示时间间隔ms
      animationSpeed: 300, //滚动时间ms
      pauseOnAction:false,
      touch: true //是否支持触屏滑动(比如可用在手机触屏焦点图)
    });
  }
  /****************
  * 返回上一页
  ****************/
  $scope.backFun = function(){
    history.back();
  }
  /* 登录失效方法 */
  $scope.loginFun = function(){
    $cookies.put("url", window.location.href, {path: "/"});
    window.location.href = url + "api/login/weixin"
  }

  /* banner */
  $http.post(
    url + "api/index/banner_list",
    {headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}}
  ).success(function(data){
    console.log(data);
    if(data["status"] == 'ok'){
      $scope.bannerInfo = data["data"];
    }else if(data["status"] == 'error'){
      console.log(data['error']);
    }
  })
  
  //获得微信权限
  // $http.post(
  //   url+"settingInterfaces.api?getWxAutho",$.param({
  //       // url: encodeURIComponent(location.href.split("#")[0]) 
  //       url: location.href.split("#")[0]
  //   }),
  //   {headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}}
  // ).success(function(data){
  //   console.log(data);
  //   if(data["status"]=="ok"){
  //     wx.config({
  //       debug: false,
  //       appId:data['data']['appId'],
  //       timestamp:data['data']['timestamp'],
  //       nonceStr:data['data']['nonceStr'],
  //       signature:data['data']['signature'],
  //       jsApiList: [
  //         // 所有要调用的 API 都要加到这个列表中
  //         'checkJsApi',
  //         'onMenuShareTimeline',
  //         'getLocation',
  //         'onMenuShareAppMessage',
  //         'openLocation',
  //         'hideOptionMenu',
  //         'showOptionMenu',
  //         'hideMenuItems',
  //         'showMenuItems',
  //         'hideAllNonBaseMenuItem',
  //         'showAllNonBaseMenuItem'
  //       ],
  //       success: function(res) {

  //       },
  //       error : function (res) {

  //       }
  //     });
  //   }
  // });
}])
/*首页*/
.controller('home', ['$scope', '$rootScope', '$location', '$timeout', '$http', '$cookies', '$cookieStore', '$sce', function($scope, $rootScope, $location, $timeout, $http, $cookies, $cookieStore, $sce) {
  console.log('首页');
  $rootScope.footerType = 1; // 底部导航切换使用
  
  /*动态设置列表的高度*/
  $scope.setLiveListH = function (dom) {
    angular.element(dom).css("height",angular.element(dom).width())
  }

  /* 直播列表 */
  $scope.liveListInfo = [];
  $scope.liveListFun = function (page) {
    $scope.page = page || 1;
    $http.post(
      url + "api/LIve/live_list",$.param({
        uid : $cookieStore.get("uid"),
        token : $cookieStore.get("token"),
        p : $scope.page
      }),
      {headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}}
    ).success(function(data){
      console.log(data);
      if(data["status"] == 'ok'){
        $scope.allPage = data["data"]["page"]
        $scope.liveListInfo.push.apply($scope.liveListInfo, data["data"]["list"]);
      }else if(data["status"] == 'error'){
        console.log(data['error']);
      }
    })
  }
  $scope.liveListFun();
  /*滚动加载*/
  angular.element(window).scroll(function() {
    var wTop = null,bTop = null,dTop = null;
    wTop = angular.element(window).scrollTop();
    bTop = angular.element("body").height();
    dTop = angular.element(document).height();
    if (wTop + bTop >= dTop) { //下拉到底部加载
      if ($scope.allPage > $scope.page) {
        $scope.liveListFun(++$scope.page);
      }
    }
  })

  /*进入直播间*/
  $scope.goLiveRoomClick = function (index) {
    $scope.liveInfoObj = $scope.liveListInfo[index];
    $location.path("liveRoom_mobile");
    sessionStorage.setItem("liveInfo",JSON.stringify($scope.liveInfoObj));
  }
}])
/*直播间-竖屏*/
.controller('liveRoom_mobile', ['$scope', '$rootScope', '$location', '$timeout', '$http', '$cookies', '$cookieStore', '$sce', function($scope, $rootScope, $location, $timeout, $http, $cookies, $cookieStore, $sce) {
  console.log('直播间-竖屏');
  console.log(JSON.parse(sessionStorage.getItem("liveInfo")))
  $scope.liveInfo = JSON.parse(sessionStorage.getItem("liveInfo"));

  /**************** 视频播放部分 start *****************/
  $scope.video = document.querySelector('video'); // 获取video
  /* 设置播放流*/
  angular.element("#vieoPlayer").attr('src',$scope.liveInfo.play_address_m3u8)
  /*触摸事件*/
  document.getElementById("videoBody").addEventListener("touchstart", function(){
    console.log("触摸了屏幕")
    angular.element("#playImgBox").hide(); // 隐藏封面图
    $scope.video.play() // 播放
  });
  /**************** 视频播放部分 start *****************/

  /***************** 环信相关 start *******************/
  /*创建环信链接*/
  $scope.conn = new WebIM.connection({
    https: WebIM.config.https,
    url: WebIM.config.xmppURL,
    isAutoLogin: WebIM.config.isAutoLogin,
    isMultiLoginSessions: WebIM.config.isMultiLoginSessions
  });

  /*环信登录配置*/
  $scope.options = {
    apiUrl: WebIM.config.apiURL,
    user: $cookieStore.get('hx_username'),
    pwd: $cookieStore.get('hx_password'),
    appKey: WebIM.config.appkey,
    success: function(e) {
      console.log('登录成功！');
      $timeout(function() {
        $scope.joinRoom(); //加入聊天室
      }, 800);
    },
    error: function() {
      console.log("登录失败！");
    }
  }
  
  /*加入聊天室*/
  $scope.joinRoom = function () {
    $scope.sendRoomText(1);
    $scope.conn.joinChatRoom({
        roomId: $scope.liveInfo.room_id // 聊天室id
    });
  };
  /*退出聊天室*/
  $scope.quitRoom = function () {
    $scope.sendRoomText(2); //给聊天室发送离开消息
    $scope.conn.quitChatRoom({
      roomId: $scope.liveInfo.room_id // 聊天室id
    });
  }

  /*环信回调函数*/
  $scope.conn.listen({
    onOpened: function ( message ) {          //连接成功回调
      console.log('连接成功')
      $scope.conn.setPresence(); // 设置手动上线
    },  
    onClosed: function ( message ) {          //连接关闭回调
      console.log("连接关闭")
    },         
    onTextMessage: function ( message ) {     //收到文本消息
      console.log(message)
      /*****聊天室*****/
      if (message.type == 'chatroom' && message.to == $scope.liveInfo.room_id) {
        console.log(message);
        if (message.ext.intoroom == '1' || message.ext.intoroom == '2') {
          //如果有这两个值，刷新直播间人数
          $scope.liveRoomUserListFun();
        }
        console.log("普通消息")
        $scope.chatInfo.append('<div class="f12 pb5"><span class="col_e4c931">' + message.ext.username + '：</span><span class="col_fff">' + message.data + '</span></div>');
        angular.element('#msgBox').scrollTop($scope.bottomBox.offsetTop);//消息显示在最底部
      }
    },    
    onCmdMessage: function ( message ) {      //收到命令消息
      console.log(message.action);
    },     
    onPresence: function ( message ) {         // 聊天室相关回调
      $scope.handlePresence(message);
    },
    onPresence: function ( message ) {},       //处理“广播”或“发布-订阅”消息，如联系人订阅请求、处理群组、聊天室被踢解散等消息
    onOnline: function () {},                  //本机网络连接成功
    onOffline: function () {},                 //本机网络掉线
    onError: function ( message ) {
      console.log('连接失败')
    },          //失败回调
    onReceivedMessage: function(message){},    //收到消息送达服务器回执
    onDeliveredMessage: function(message){},   //收到消息送达客户端回执
    onReadMessage: function(message){},        //收到消息已读回执
    onMutedMessage: function(message){}        //如果用户在A群组被禁言，在A群发消息会走这个回调并且消息不会传递给群其它成员
  });

  /*处理聊天室回调方法*/
  $scope.handlePresence = function(e) {
    console.log(e.type);
    if (e.type === 'joinChatRoomSuccess') { //加入成功
      console.log("加入成功");
      $scope.joinChatRoomSuccess = 1
      $scope.sendRoomText(1);
    }
    if (e.type === 'deleteGroupChat') { //聊天室被删除
      console.log("聊天室已解散");
    }
    if (e.type === 'joinChatRoomFailed') { //加入失败
      console.log("加入失败");
    }
  };

  /*获取聊天室DOM元素*/
  $scope.msgBox = document.getElementById("msgBox");
  $scope.chatInfo = angular.element("#chatInfo"); //聊天室信息内容框
  $scope.bottomBox = document.getElementById("bottomBox");
  /*发送普通文本消息*/
  $scope.sendRoomText = function(inChat) {
    var id = $scope.conn.getUniqueId(); // 生成本地消息id
    $scope.msg = new WebIM.message("txt", id); // 创建文本消息
    if (inChat == 1) {
      $scope.text = '进入了直播间';
      $scope.intoroom = 1;
    } else if (inChat == 2) {
      $scope.text = '离开了直播间';
      $scope.intoroom = 2;
    } else {
      $scope.text = $scope.liveMsg;
    }
    $scope.option = {
        msg: $scope.text, // 消息内容
        to: $scope.liveInfo.room_id, // 接收消息对象(聊天室id)
        roomType: true,
        chatType: 'chatRoom',
        /*用户自扩展的消息内容（群聊用法相同）*/
        ext: {
          /******用户信息扩展字段*******/
          username: $scope.userInfo.username, //用户名
          user_id: $scope.userInfo.member_id, //用户id
          userimg: $scope.userInfo.header_img, //用户头像
          intoroom: $scope.intoroom,
          /******* 礼物消息扩展字段 ********/
          // giftimg: gift.giftImg,
          // giftname: gift.giftName,
          // gift_id: gift.giftId,
          // num: gift.num
        },
        success: function() {
          console.log('普通消息发送成功');
          $scope.chatInfo.append('<div class="f12 pb5"><span class="col_e4c931">' + $scope.userInfo.username + '：</span><span class="col_fff">' + $scope.text + '</span></div>');
          angular.element('#msgBox').scrollTop($scope.bottomBox.offsetTop);//消息显示在最底部
        },
        fail: function() {
          console.log('普通消息发送失败');
        }
      }
      //发送成功清除输入框
    $scope.liveMsg = null;
    $scope.msg.set($scope.option);
    $scope.msg.setGroup('groupchat');
    $scope.conn.send($scope.msg.body);
  };
  /*普通消息发送按钮*/
  $scope.sendMsgClick = function() {
    if ($scope.liveMsg == null) {
      return false;
    }
    $scope.sendRoomText();
  }

  /*监听$destory事件，这个事件会在页面发生跳转的时候触发。*/
  $scope.$on("$destroy", function() {
    console.log('页面发生跳转')
    $scope.outListRoom(); // 退出直播间
  });
  /***************** 环信相关 end *******************/

  /*进入直播间*/
  $http.post(
    url + "api/live/into_live",$.param({
      uid : $cookieStore.get("uid"),
      token : $cookieStore.get("token"),
      live_id : $scope.liveInfo.live_id
    }),
    {headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}}
  ).success(function(data){
    console.log(data);
    if(data["status"] == 'ok'){
      $scope.into_liveInfo = data["data"];
      $scope.conn.open($scope.options);// 登录
      $scope.chatInfo.append('<div class="f12 pb5"><span class="col_fff">直播消息：</span><span class="col_d55343">'+ data["data"].prompt +'</span></div>');
    }else if(data["status"] == 'error'){
      console.log(data['error']);
    }else if (data['error'] == 'token failed') {
      $scope.loginFun(); // 调用登录失效方法
    }
  })

  /*退出直播间*/
  $scope.outListRoom = function () {
    $http.post(
      url + "api/live/out_live",$.param({
        uid : $cookieStore.get("uid"),
        token : $cookieStore.get("token"),
        live_id : $scope.liveInfo.live_id
      }),
      {headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}}
    ).success(function(data){
      console.log(data);
      if(data["status"] == 'ok'){
        console.log(data["data"])
        $scope.quitRoom(); //调用退出聊天室方法
        $scope.conn.close(); //退出登录／断开连接
      }else if(data["status"] == 'error'){
        console.log(data['error']);
      }else if (data['error'] == 'token failed') {
        $scope.loginFun(); // 调用登录失效方法
      }
    })
  }

  /*直播间用户列表*/
  $scope.liveRoomUserListFun = function () {
    $http.post(
      url + "api/live/show_viewer",$.param({
        uid : $cookieStore.get("uid"),
        token : $cookieStore.get("token"),
        live_id : $scope.liveInfo.live_id,
        page: 1,
        pagesize: 5
      }),
      {headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}}
    ).success(function(data){
      console.log(data);
      if(data["status"] == 'ok'){
        $scope.liveRoomCount = data["data"]["count"];
        $scope.liveRoomUserListInfo = data["data"]["list"];
      }else if(data["status"] == 'error'){
        console.log(data['error']);
      }else if (data['error'] == 'token failed') {
        $scope.loginFun(); // 调用登录失效方法
      }
    })
  }
  $scope.liveRoomUserListFun();

  /*直播间商品列表*/
  $scope.getGoodsListState = 0;
  $scope.liveGoodsListFun = function() {
    $http.post(
      url + "api/merchant/live_goods",$.param({
        uid : $cookieStore.get("uid"),
        token : $cookieStore.get("token"),
        live_id : $scope.liveInfo.live_id
      }),
      {headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}}
    ).success(function(data){
      console.log(data);
      if(data["status"] == 'ok'){
        $scope.getGoodsListState = 1;
        $scope.liveGoodsListInfo = data["data"];
      }else if(data["status"] == 'error'){
        console.log(data['error']);
        $scope.getGoodsListState = 0;
      }else if (data['error'] == 'token failed') {
        $scope.loginFun(); // 调用登录失效方法
      }
    })
  }

  /*输入框与商品列表model事件*/
  $scope.inputModelClick = function (t,dom){ // t=1(打开),t=2(关闭)
    if(t==1){
      angular.element(dom).show();
      angular.element("#bottomFunBox").hide();
      if(dom=='#bottomInputBox'){ // 打开输入框
        angular.element("#liveRoomInput").focus();
      }else if(dom=='#liveRoomGoodsListBox' && $scope.getGoodsListState == 0){ // 打开商品列表box
        $scope.liveGoodsListFun();
      }
    }else{
      angular.element(dom).hide();
      angular.element("#bottomFunBox").show();
    }
  }

  /************** 礼物相关 **************/
  /*直播间礼物列表*/
  $http.post(
    url + "api/live/gift_list",$.param({
      uid : $cookieStore.get("uid"),
      token : $cookieStore.get("token")
    }),
    {headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}}
  ).success(function(data){
    console.log(data);
    if(data["status"] == 'ok'){
      $scope.giftListInfo = data["data"]
    }else if(data["status"] == 'error'){
      console.log(data['error']);
    }else if (data['error'] == 'token failed') {
      $scope.loginFun(); // 调用登录失效方法
    }
  })
  /* 礼物弹窗打开关闭事件 */
  $scope.giftModelClick = function (t) {
    if(t==1){
      angular.element("#liveRoomGiftBox").show();
    }else{
      angular.element("#liveRoomGiftBox").hide();
    }
  }

  /*礼物点击事件*/
  $scope.giftClick = function (id) {
    $scope.gift_id = id;
    console.log($scope.gift_id)
  }
  /*送礼*/
  $scope.giveGiftClick = function () {
    $http.post(
      url + "api/live/give_gift",$.param({
        uid : $cookieStore.get("uid"),
        token : $cookieStore.get("token"),
        live_id : $scope.liveInfo.live_id,
        gift_id : $scope.gift_id
      }),
      {headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}}
    ).success(function(data){
      console.log(data);
      if(data["status"] == 'ok'){
        $scope.giftModelClick(2);
        $scope.promptFun(data["data"],1300);
      }else if(data["status"] == 'error'){
        $scope.promptFun(data["data"],1300);
        console.log(data['error']);
      }else if (data['error'] == 'token failed') {
        $scope.loginFun(); // 调用登录失效方法
      }
    })
  }
  /************** 礼物相关 **************/
}])
/*直播间-横屏*/
.controller('liveRoom_pc', ['$scope', '$rootScope', '$location', '$timeout', '$http', '$cookies', '$cookieStore', '$sce', function($scope, $rootScope, $location, $timeout, $http, $cookies, $cookieStore, $sce) {
  console.log('直播间-横屏');
}])

/*商城首页*/
.controller('mall', ['$scope', '$rootScope', '$location', '$timeout', '$http', '$cookies', '$cookieStore', '$sce', function($scope, $rootScope, $location, $timeout, $http, $cookies, $cookieStore, $sce) {
  console.log('商城首页');
  $rootScope.footerType = 3;
  /*好货分类*/
  $http.post(
    url + "api/Mall/showGoodsClass",
    {headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}}
  ).success(function(data){
    console.log(data);
    if(data["status"] == 'ok'){
      $scope.showGoodsClassInfo = data["data"]
    }else if(data["status"] == 'error'){
      console.log(data['error']);
    }
  })
  /* 推荐商品 */
  $http.post(
    url + "api/Mall/showGoods",
    {headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}}
  ).success(function(data){
    console.log(data);
    if(data["status"] == 'ok'){
      $scope.showGoodsInfo = data["data"]
    }else if(data["status"] == 'error'){
      console.log(data['error']);
    }
  })
}])
/*商品详情*/
.controller('goodsDetails', ['$scope', '$rootScope', '$location', '$timeout', '$http', '$cookies', '$cookieStore', '$sce', function($scope, $rootScope, $location, $timeout, $http, $cookies, $cookieStore, $sce) {
  console.log('商品详情');
  /*获取商品详情*/
  $http.post(
    url + "api/Mall/goods_info",$.param({
      uid: $cookieStore.get("uid"),
      token: $cookieStore.get("token"),
      goods_id : $location.search()["goods_id"]
    }),
    {headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}}
  ).success(function(data){
    console.log(data);
    if(data["status"] == 'ok'){
      $scope.goodsInfo = data["data"]
      $scope.goods_detail = $sce.trustAsHtml(data["data"].goods_detail);
      for(var i=0;i<data["data"].goodsSpecificationBeans.length;i++){
        $scope.specOption(data["data"].goodsSpecificationBeans[i].specificationBeans[0].specification_id,data["data"].goodsSpecificationBeans[i].specificationBeans[0].specification_value,i)
      }
    }else if(data["status"] == 'error'){
      console.log(data['error']);
    }
  })

  /*规格model事件*/
  $scope.specificationModelClick = function(t,type){
    $scope.confirmType = type || '';
    console.log($scope.confirmType);
    if(t==1){
      angular.element("#specificationBox").show()
    }else{
      angular.element("#specificationBox").hide()
    }
  }

  /*计算规格价格*/
  $scope.specInfoFun = function () {
    $http.post(
      url + "api/Mall/get_specification",$.param({
        goods_id : $location.search()["goods_id"],
        specification_ids : $scope.specObj.paIdArr.join(","),
      }),
      {headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}}
    ).success(function(data){
      console.log(data);
      if(data["status"] == 'ok'){
        $scope.specInfo = data["data"];
      }else if(data["status"] == 'error'){
        console.log(data['error']);
      }
    })
  }

  /* 初始化规格参数 */
  $scope.specObj = {
    paIdArr:[], // 初始化规格ID
    paNameArr:[] // 初始化规格名称
  }
  /*选择规格*/
  $scope.specOption = function(id,name,paIndex){ // id:规格ID，name:规格名称 ，外层循环下标
    $scope.specObj.paIdArr[paIndex] = id;
    $scope.specObj.paNameArr[paIndex] = name;
    $scope.specInfoFun();
  }

  /*数量加减*/
  $scope.gmnum = 1; //初始化数量
  $scope.numberfn = function (num, max, type) {//下限，上限（库存），type:2加 1:减
    if (type == 1 && num > 1) {
      $scope.gmnum = (--num);
    } else if (type == 2 && num < max) {
      $scope.gmnum = (++num);
    } else {
      isNaN(num * 1) || num < 0 || num == "" ? $scope.gmnum = 1 : num > max ? $scope.gmnum = max : $scope.gmnum = num;
    }
  }

  /*确认*/
  $scope.determineFun = function (type) {
    $scope.confirmOrderObj = {
      specObj : $scope.specObj,
      gmnum : $scope.gmnum,
      goods_id : $location.search()["goods_id"]
    }
    sessionStorage.setItem("confirmOrderObj",JSON.stringify($scope.confirmOrderObj))
    if(type=='pay'){ // 立即购买
      $location.path("confirmOrder");
    }
  }

}])
/*确认订单*/
.controller('confirmOrder', ['$scope', '$rootScope', '$location', '$timeout', '$http', '$cookies', '$cookieStore', '$sce', function($scope, $rootScope, $location, $timeout, $http, $cookies, $cookieStore, $sce) {
  console.log('确认订单');

}])
/*订单列表*/
.controller('orderList', ['$scope', '$rootScope', '$location', '$timeout', '$http', '$cookies', '$cookieStore', '$sce', function($scope, $rootScope, $location, $timeout, $http, $cookies, $cookieStore, $sce) {
  console.log('订单列表');
}])
/*订单详情*/
.controller('orderDetails', ['$scope', '$rootScope', '$location', '$timeout', '$http', '$cookies', '$cookieStore', '$sce', function($scope, $rootScope, $location, $timeout, $http, $cookies, $cookieStore, $sce) {
  console.log('订单详情');
}])

/*个人中心*/
.controller('me', ['$scope', '$rootScope', '$location', '$timeout', '$http', '$cookies', '$cookieStore', '$sce', function($scope, $rootScope, $location, $timeout, $http, $cookies, $cookieStore, $sce) {
  console.log('个人中心');
  $rootScope.footerType = 2; // 底部导航切换使用
}])
/*个人资料*/
.controller('userDetails', ['$scope', '$rootScope', '$location', '$timeout', '$http', '$cookies', '$cookieStore', '$sce', function($scope, $rootScope, $location, $timeout, $http, $cookies, $cookieStore, $sce) {
  console.log('个人资料');
}])
/*我的地址列表*/
.controller('my_address', ['$scope', '$rootScope', '$location', '$timeout', '$http', '$cookies', '$cookieStore', '$sce', function($scope, $rootScope, $location, $timeout, $http, $cookies, $cookieStore, $sce) {
  console.log('我的地址列表');
}])
/**/
.controller('', ['$scope', '$rootScope', '$location', '$timeout', '$http', '$cookies', '$cookieStore', '$sce', function($scope, $rootScope, $location, $timeout, $http, $cookies, $cookieStore, $sce) {
  console.log('');
}])


