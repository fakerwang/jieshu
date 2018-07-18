var app=angular.module('app',['ng', 'ngRoute', 'ngAnimate','ngTouch','ngCookies','me-lazyload'])//,'ui.bootstrap'
.config(function($routeProvider){
	$routeProvider
	//首页
	.when("/",{
		templateUrl:"index/home.html",
		controller:"homes",
	})
	.when("",{
		templateUrl:"index/home.html",
		controller:"homes",
	})
	.when("/homes",{
		templateUrl:"index/home.html",
		controller:"homes",
	})
	.when("/shoplist",{
		templateUrl:"index/shoplist.html",
		controller:"shoplist"
	})
	.when("/shop",{
		templateUrl:"index/shop.html",
		controller:"shop"
	})
	.otherwise({
	    redirectTo: "/"
	})
})

app.run(['$rootScope', '$location', '$http', '$cookieStore',function($rootScope, $location, $http,$cookieStore) {
	/* 监听路由的状态变化 */
	$rootScope.$on('$routeChangeSuccess', function(evt, current, previous) {
		console.log($location.path())
		$rootScope.listShowHide = true;
		if($location.path() == '/'){
			$rootScope.listShowHide = true;
			console.log($rootScope.listShowHide)
		}else{
			$rootScope.listShowHide = false;
			console.log($rootScope.listShowHide)
		}
		/*$rootScope.listShowHide = true;
		$rootScope.listShow = function(){
			$rootScope.listShowHide = true;
		}
		$rootScope.listShowContentHide = function(){
			$rootScope.listShowHide = false;
		}*/
		// /* 每次切换路由使页面在最顶部 */
		// angular.element(document).scrollTop(0);
		// /*分享权限*/
		// console.log($location.path());
		// if($location.path() != "/goodsDetails" || $location.path() != "/fuPoorDetails"){
		// 	wx.ready(function () {
		// 		wx.showAllNonBaseMenuItem()
		// 	});
		// }else{
		// 	wx.ready(function () {
		// 		wx.hideAllNonBaseMenuItem()
		// 	});
		// }
		/*获取用户信息*/
		/*$http.post(
			url + "memberInterfaces.api?getMemberDetail",$.param({
				member_id : $cookieStore.get("member_id"),
				member_token : $cookieStore.get("member_token")
			}),
			{headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}}
		).success(function(data){
			console.log(data);
			if(data["status"] == 'ok'){
				if(!($location.path() == "/becomeWaiter" || $location.path() == "/fillWaiterInfo" || $location.path() == "/upIdentityID" || $location.path() == "/registerProtocol" || $location.path() == "/becomeWaiterProcess")){
					/!*如果成为小二审核通过*!/
					if(data["data"].distributor_state == "accept"){ // 通过
						console.log("通过")
					}else if(data["data"].distributor_state == ""){ //没有申请过
						$location.path("becomeWaiter");
					}else{
						$location.path("becomeWaiterProcess")
					}
				}
			}
		})*/
	});
}])