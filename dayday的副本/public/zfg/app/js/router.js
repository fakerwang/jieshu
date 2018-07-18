var url = "httt:dspx1.tstmobile.com"
var app = angular.module("app", ['ng', 'ngRoute', 'ngCookies', "ngTouch"]);

   /*定义路由*/
  app.config(function($routeProvider, $locationProvider) {
  $routeProvider
   /*默认路由*/
  .when("/", {
    templateUrl: "app/views/index/home.html",
    controller: "home"
  })
  /*****************************首页（index）start*********************************/
   /*首页*/
      .when("/home", {
        templateUrl: "app/views/index/home.html",
        controller: "home"
      })
   /*猜你喜欢*/
        .when("/cnxh", {
          templateUrl: "app/views/index/cnxh.html",
          controller: "cnxh"
        })
   /*店铺头条*/
      .when("/dptt", {
          templateUrl: "app/views/index/dptt.html",
          controller: "dptt"
      })
   /*发现好货*/
      .when("/fxhh", {
          templateUrl: "app/views/index/fxhh.html",
          controller: "fxhh"
      })
   /*购物车*/
      .when("/gwc", {
          templateUrl: "app/views/index/gwc.html",
          controller: "gwc"
      })
   /*核酸分离*/
      .when("/hsfl", {
          templateUrl: "app/views/index/hsfl.html",
          controller: "hsfl"
      })
   /*金秋与礼同行*/
      .when("/jqyltx", {
          templateUrl: "app/views/index/jqyltx.html",
          controller: "jqyltx"
      })
  /*排行榜*/
      .when("/phb", {
          templateUrl: "app/views/index/phb.html",
          controller: "phb"
      })
   /*品牌馆*/
      .when("/ppg", {
          templateUrl: "app/views/index/ppg.html",
          controller: "ppg"
      })
   /*试剂*/
      .when("/shiji", {
          templateUrl: "app/views/index/shiji.html",
          controller: "shiji"
      })
   /*商品求购*/
      .when("/spqg", {
          templateUrl: "app/views/index/spqg.html",
          controller: "spqg"
      })
   /*详情*/
      .when("/xiangqing", {
          templateUrl: "app/views/index/xiangqing.html",
          controller: "xiangqing"
      })
   /*品牌心动惠*/
      .when("/xindong", {
          templateUrl: "app/views/index/xindong.html",
          controller: "xindong"
      })
  /*****************************首页（index）end*********************************/

  /*****************************登录start*********************************/
  /*登录界面*/
  .when("/login", {
      templateUrl: "app/views/login/login.html",
      controller: "login"
  })
  /*注册界面*/
  .when("/register", {
      templateUrl: "app/views/login/register.html",
      controller: "register"
  })
  /*忘记密码界面*/
    .when("/forgetpswd", {
        templateUrl: "app/views/login/forgetpswd.html",
        controller: "forgetpswd"
    })
    /*****************************登录end*********************************/

    /*****************************导航（daohang）start*********************************/

      /*活动促销*/
      .when("/cxhd", {
          templateUrl: "app/views/daohang/cxhd.html",
          controller: "cxhd"
      })
      /*公司简介*/
      .when("/gsjj", {
          templateUrl: "app/views/daohang/gsjj.html",
          controller: "gsjj"
      })
      /*购物指南*/
      .when("/gwzn", {
          templateUrl: "app/views/daohang/gwzn.html",
          controller: "gwzn"
      })
      /*合作伙伴*/
      .when("/hzhb", {
          templateUrl: "app/views/daohang/hzhb.html",
          controller: "hzhb"
      })
      /*加入我们*/
      .when("/jrwm", {
          templateUrl: "app/views/daohang/jrwm.html",
          controller: "jrwm"
      })
      /*联系我们*/
      .when("/lxwm", {
          templateUrl: "app/views/daohang/lxwm.html",
          controller: "lxwm"
      })
      /*买家-常见问题*/
      .when("/mjcjwt", {
          templateUrl: "app/views/daohang/mjcjwt.html",
          controller: "mjcjwt"
      })
      /*配送说明*/
      .when("/pssm", {
          templateUrl: "app/views/daohang/pssm.html",
          controller: "pssm"
      })
      /*配送异常*/
      .when("/psyc", {
          templateUrl: "app/views/daohang/psyc.html",
          controller: "psyc"
      })
      /*签收说明*/
      .when("/qssm", {
          templateUrl: "app/views/daohang/qssm.html",
          controller: "qssm"
      })
      /*企业购申请*/
      .when("/qygsq", {
          templateUrl: "app/views/daohang/qygsq.html",
          controller: "qygsq"
      })
      /*入驻指南*/
      .when("/rzzn", {
          templateUrl: "app/views/daohang/rzzn.html",
          controller: "rzzn"
      })
      /*商家-常见问题*/
      .when("/sjcjwt", {
          templateUrl: "app/views/daohang/sjcjwt.html",
          controller: "sjcjwt"
      })
      /*商家入驻*/
      .when("/sjrz", {
          templateUrl: "app/views/daohang/sjrz.html",
          controller: "sjrz"
      })
      /*商家守则*/
      .when("/sjsz", {
          templateUrl: "app/views/daohang/sjsz.html",
          controller: "sjsz"
      })
      /*商家资质*/
      .when("/sjzz", {
          templateUrl: "app/views/daohang/sjzz.html",
          controller: "sjzz"
      })
      /*退换货规则*/
      .when("/thhgz", {
          templateUrl: "app/views/daohang/thhgz.html",
          controller: "thhgz"
      })
      /*网点加盟*/
      .when("/wdjm", {
          templateUrl: "app/views/daohang/wdjm.html",
          controller: "wdjm"
      })
      /*信用付申请*/
      .when("/xyfsq", {
          templateUrl: "app/views/daohang/xyfsq.html",
          controller: "xyfsq"
      })
      /*运费说明*/
      .when("/yfsm", {
          templateUrl: "app/views/daohang/yfsm.html",
          controller: "yfsm"
      })
      /*隐私条例*/
      .when("/ystl", {
          templateUrl: "app/views/daohang/ystl.html",
          controller: "ystl"
      })
      /*支付服务*/
      .when("/zffw", {
          templateUrl: "app/views/daohang/zffw.html",
          controller: "zffw"
      })
      /*****************************导航（daohang）end*********************************/

      /*****************************个人页面（me）start*********************************/

      /*添加快捷支付卡*/
      .when("/addkjzfk", {
          templateUrl: "app/views/me/addkjzfk.html",
          controller: "addkjzfk"
      })
      /*添加银行卡*/
      .when("/addyhk", {
          templateUrl: "app/views/me/addyhk.html",
          controller: "addyhk"
      })
      /*安全设置*/
      .when("/aqsz", {
          templateUrl: "app/views/me/aqsz.html",
          controller: "aqsz"
      })
      /*店铺收藏*/
      .when("/dpsc", {
          templateUrl: "app/views/me/dpsc.html",
          controller: "dpsc"
      })
      /*个人资料*/
      .when("/grzl", {
          templateUrl: "app/views/me/grzl.html",
          controller: "grzl"
      })
      /*个人中心*/
      .when("/grzx", {
          templateUrl: "app/views/me/grzx.html",
          controller: "grzx"
      })
      /*帮助中心*/
      .when("/help", {
          templateUrl: "app/views/me/help.html",
          controller: "help"
      })
      /*评价晒单*/
      .when("/pjsd", {
          templateUrl: "app/views/me/pjsd.html",
          controller: "pjsd"
      })
      /*收货地址*/
      .when("/shdz", {
          templateUrl: "app/views/me/shdz.html",
          controller: "shdz"
      })
      /*商品收藏*/
      .when("/spsc", {
          templateUrl: "app/views/me/spsc.html",
          controller: "spsc"
      })
      /*退款订单*/
      .when("/tkdd", {
          templateUrl: "app/views/me/tkdd.html",
          controller: "tkdd"
      })
      /*我的订单*/
      .when("/wddd", {
          templateUrl: "app/views/me/wddd.html",
          controller: "wddd"
      })
      /*我的积分*/
      .when("/wdjf", {
          templateUrl: "app/views/me/wdjf.html",
          controller: "wdjf"
      })
      /*我的钱包*/
      .when("/wdqb", {
          templateUrl: "app/views/me/wdqb.html",
          controller: "wdqb"
      })
      /*我的钱包-充值*/
      .when("/wdqbcz", {
          templateUrl: "app/views/me/wdqbcz.html",
          controller: "wdqbcz"
      })
      /*我的钱包-提现*/
      .when("/wdqbtx", {
          templateUrl: "app/views/me/wdqbtx.html",
          controller: "wdqbtx"
      })
      /*我的认证*/
      .when("/wdrz", {
          templateUrl: "app/views/me/wdrz.html",
          controller: "wdrz"
      })
      /*信用额度*/
      .when("/xyed", {
          templateUrl: "app/views/me/xyed.html",
          controller: "xyed"
      })
      /*信用申请*/
      .when("/xysq", {
          templateUrl: "app/views/me/xysq.html",
          controller: "xysq"
      })
      /*银行卡*/
      .when("/yhk", {
          templateUrl: "app/views/me/yhk.html",
          controller: "yhk"
      })
      /*优惠中心*/
      .when("/yhzx", {
          templateUrl: "app/views/me/yhzx.html",
          controller: "yhzx"
      })
      /*****************************个人页面（me）end*********************************/
  .otherwise({
    redirectTo: "/"
  })
})


