$(function(){

    // 价格列表
    $.ajax({
        url: "http://www.longmaitv.com/Pc/Index/price_list", //接口
        method: 'post',
        data: {  //读取内容所需条件
        },
        success: function (data) {
            data=JSON.parse(data);
            console.log(data);
            if(data["status"] == "ok"){
                for(var l=0;l<data['data'].length;l++){
                    $(".rechargelists").append('<li class="rechargelistli" price_id='+data['data'][l]['price_id']+'>' +
                        '<p class="rechargelistli_dia">'+data['data'][l]['meters']+'钻石</p>' +
                        '<p class="rechargelistli_price">¥<span>'+data['data'][l]['price']+'</span>元</p>' +
                        '</li>')
                }
                $(".rechargelistli").click(function(){
                    $(this).addClass("act").siblings().removeClass("act");
                    $(".total_price span").html($(".rechargelists .act .rechargelistli_price span").html())
                })
            }else {
                console.log(data['error']);
            }

        },
        error: function (data) {
            //console.log(data);
        }
    });
    
    $(".pays_titlistli").click(function(){
        $(this).addClass("act").siblings().removeClass("act");
    })
    // 支付
    $(".paybtn").click(function(){
        if(!$.cookie("uuId")||$.cookie("uuId")=='null'){
            $("#et").html('输入龙脉号');
        }else if($(".rechargelistli").hasClass("act")==false){
            $("#et").html('请选择选择充值金额');
        }else if($(".pays_titlists li").hasClass("act")==false){
            $("#et").html('请选择支付方式');
        }else if($(".pays_titlists li").hasClass("act")==true){
            console.log($(".rechargelists .act").attr("price_id"));
            console.log($(".pays_titlists .act").attr("type"))
            $.ajax({
                url: "http://www.longmaitv.com/Pc/Index/pay_to", //接口
                method: 'post',
                data: {  //读取内容所需条件
                    user_id:$.cookie("uuId"),
                    price_id:$(".rechargelists .act").attr("price_id"),
                    type:$(".pays_titlists .act").attr("type")
                },
                success: function (data) {
                    data=JSON.parse(data);
                    console.log(data);
                    if(data["status"] == "ok"){
                        $("#et").html('');
                        $("#ewm").attr("src",data['data']);
                        $(".ewmbox").fadeIn();
                        
                    }else {
                        console.log(data['error']);
                    }
                },
                error: function (data) {
                    //console.log(data);
                }
            });
        }
    })
    // 龙脉号
    $(".confirmbutton").click(function(){
        if($(".dl_id input").val()==''){
            $("#er").html('请输入龙脉号');
        }else{
            $.ajax({
                url: "http://www.longmaitv.com/Pc/Index/get_user_ID ", //接口
                method: 'post',
                data: {  //读取内容所需条件
                    ID:$("#lmId").val(),
                },
                success: function (data) {
                    data=JSON.parse(data);
                    console.log(data);
                    if(data["status"] == "ok"){
                        $.cookie("uuId",data["data"]["user_id"]);
                        $("#er").html('');
                        $('.diamond_Recharge_top img').attr("src",data['data']['img']);
                        $('.diamond_Recharge_top .name_state2 .name').html(data['data']['username']);
                        $('.diamond_Recharge_top .name_state2 .id span').html(data['data']['id']);
                        $(".name_state1").css("display",'none');
                        $(".name_state2").css("display",'block');
                        $(".paybox").fadeOut();
                    }else {
                        $("#er").html(data['error']);
                    }

                },
                error: function (data) {
                    //console.log(data);
                }
            });
        }
    })
    
})