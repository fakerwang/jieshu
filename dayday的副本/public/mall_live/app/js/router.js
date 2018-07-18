var url = "http://dspx.tstmobile.com/";

var app = angular.module("app", ['ng', 'ngRoute', 'ngCookies', "ngTouch",'me-lazyload']);
/*百分比过滤器*/
app.filter('PercentValue', function () {
  return function (o) {
    if (o != undefined && /(^(-)*\d+\.\d*$)|(^(-)*\d+$)/.test(o)) {
      var v = parseFloat(o);
      return Number(Math.round(v * 10000) / 100) + "%";
    } else {
      return "undefined";
    }
  }
});
/* 轮播图指令 */
app.directive('repeatFinish',function(){
  return {
    restrict: 'A',
    repeatFinish : '@',
    link: function(scope,element,attr){
      if(scope.$last == true){
        scope.$eval(attr.repeatFinish);
      }
    }
  }
})

app.run(['$rootScope', '$location', '$http', '$cookieStore',function($rootScope, $location, $http,$cookieStore) {
  /* 监听路由的状态变化 */
  $rootScope.$on('$routeChangeSuccess', function(evt, current, previous) {
    /* 每次切换路由使页面在最顶部 */
    angular.element(document).scrollTop(0);
    console.log($location.path());
  }); 
}])

/*路由*/
app.config(function($routeProvider, $locationProvider) {
  $routeProvider
  /*首页*/
  .when("/", {
    templateUrl: "app/views/home/home.html",
    controller: "home"
  })
  /*首页*/
  .when("/home", {
    templateUrl: "app/views/home/home.html",
    controller: "home"
  })
  /**************************** live start *******************************/
  /*直播间-竖屏*/
  .when("/liveRoom_mobile", {
    templateUrl: "app/views/live/liveRoom_mobile.html",
    controller: "liveRoom_mobile"
  })
  /*直播间-横屏*/
  .when("/liveRoom_pc", {
    templateUrl: "app/views/live/liveRoom_pc.html",
    controller: "liveRoom_pc"
  })
  /**************************** live end *******************************/

  /**************************** goods start *******************************/
  /*商场首页*/
  .when("/mall",{
    templateUrl: "app/views/mall/mall.html",
    controller: "mall"
  })
  /*商品详情*/
  .when("/goodsDetails", {
    templateUrl: "app/views/mall/goods/goodsDetails.html",
    controller: "goodsDetails"
  })
  /**************************** goods end *******************************/

  /**************************** order start *******************************/
  /*确认订单*/
  .when("/confirmOrder", {
    templateUrl: "app/views/mall/order/confirmOrder.html",
    controller: "confirmOrder"
  })
  /*订单列表*/
  .when("/orderList", {
    templateUrl: "app/views/mall/order/orderList.html",
    controller: "orderList"
  })
  /*订单详情*/
  .when("/orderDetails", {
    templateUrl: "app/views/mall/order/orderDetails.html",
    controller: "orderDetails"
  })
  /**************************** order end *******************************/

  /**************************** 个人中心 start *******************************/
  /*个人中心*/
  .when("/me",{
    templateUrl: "app/views/me/me.html",
    controller: "me"
  })
  /*个人信息*/
  .when("/userDetails",{
    templateUrl: "app/views/me/userDetails.html",
    controller: "userDetails"
  })
  /*我的地址*/
  .when("/my_address",{
    templateUrl: "app/views/me/my_address.html",
    controller: "my_address"
  })
  /**************************** 个人中心 end *******************************/
  .otherwise({
    redirectTo: "/"
  })
})


