$(document).ready(function(){
    $('.url').attr("value",window.location.href);
    if (isPc()) {
        $('.pic-content-div').addClass("pull-left");
    }
    else {
        $('.pic-content-div').css({"width":"98%"});
    }
    var app = angular.module('hotPicApp', []);
    app.controller('hotPicCtrl', function($scope, $http) {
        let json;
        let cateNum = 0;
        const MAX_CATE = 9;
        const categoryName = ["Sell","Buy","Fudan","Other","Restaurant","House","Jobs","Classes","Partners"];
        const category = ["sell","buy","more","other","restaurant","house","job","classes","partners"];
        let jsonHot;
        $http.get("./php/getHottest.php")
            .then(function (response) {
                json = response.data;
                jsonHot = [json.sell,json.buy,json.more,json.other,json.restaurant,json.house,json.job,json.classes,json.partners];
                $scope.cate = categoryName[cateNum];
                $scope.picHot = jsonHot[cateNum];
            });
        $scope.cateRedirect = function () {
            window.location.href="topic.html?cate="+category[cateNum]+"&page=1";
        }
        $scope.catePrev = function() {
            if (cateNum==0)
                cateNum = MAX_CATE-1;
            else
                cateNum--;
            $scope.cate = categoryName[cateNum];
            $scope.picHot = jsonHot[cateNum];
        }
        $scope.cateNext = function() {
            if (cateNum==MAX_CATE-1)
                cateNum = 0;
            else
                cateNum++;
            $scope.cate = categoryName[cateNum];
            $scope.picHot = jsonHot[cateNum];
        }
        $scope.redirect = function(serial) {
            window.location.href="article.html?cate="+category[cateNum]+"&serial="+serial;
        }
    });
    app.directive('errSrc', function() {
        return {
            link: function(scope, element, attrs) {
                element.bind('error', function() {
                    if (attrs.src != attrs.errSrc) {
                        attrs.$set('src', attrs.errSrc);
                    }
                });
            }
        }
    });
    $.ajax({
        url:"./php/getHottest.php",
        dataType:"json",
        data: {
        },
        success:function(json){
            if (json.passage.sell != 0)
                $.each(json.sell, function(index, item) {
                    var time = item.time;
                    time = time.substring(5,time.length-3);
                    $('#sellHot').append("<div style=\"margin:5px 0;min-height: 20px\"><div style='white-space:nowrap;text-overflow:ellipsis;overflow:hidden; float: left'><a href=\"article.html?cate=sell&serial="+item.serial+"\" style=\"text-decoration:none;color:black;\">"+item.title+"</a></div><span style='margin-left: 10px; float: left'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+time+"&nbsp;<span>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
            if (json.passage.buy != 0)
                $.each(json.buy, function(index, item) {
                    var time = item.time;
                    time = time.substring(5,time.length-3);
                    $('#buyHot').append("<div style=\"margin:5px 0;min-height: 20px\"><div style='white-space:nowrap;text-overflow:ellipsis;overflow:hidden; float: left'><a href=\"article.html?cate=buy&serial="+item.serial+"\" style=\"text-decoration:none;color:black;\">"+item.title+"</a></div><span style='margin-left: 10px; float: left'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+time+"&nbsp;<span>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
            if (json.passage.job != 0)
                $.each(json.job, function(index, item) {
                    var time = item.time;
                    time = time.substring(5,time.length-3);
                    $('#jobHot').append("<div style=\"margin:5px 0;min-height: 20px\"><div style='white-space:nowrap;text-overflow:ellipsis;overflow:hidden; float: left'><a href=\"article.html?cate=job&serial="+item.serial+"\" style=\"text-decoration:none;color:black;\">"+item.title+"</a></div><span style='margin-left: 10px; float: left'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+time+"&nbsp;<span>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
            if (json.passage.more != 0)
                $.each(json.more, function(index, item) {
                    var time = item.time;
                    time = time.substring(5,time.length-3);
                    $('#moreHot').append("<div style=\"margin:5px 0;min-height: 20px\"><div style='white-space:nowrap;text-overflow:ellipsis;overflow:hidden; float: left'><a href=\"article.html?cate=more&serial="+item.serial+"\" style=\"text-decoration:none;color:black;\">"+item.title+"</a></div><span style='margin-left: 10px; float: left'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+time+"&nbsp;<span>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
            if (json.passage.other != 0)
                $.each(json.other, function(index, item) {
                    var time = item.time;
                    time = time.substring(5,time.length-3);
                    $('#otherHot').append("<div style=\"margin:5px 0;min-height: 20px\"><div style='white-space:nowrap;text-overflow:ellipsis;overflow:hidden; float: left'><a href=\"article.html?cate=other&serial="+item.serial+"\" style=\"text-decoration:none;color:black;\">"+item.title+"</a></div><span style='margin-left: 10px; float: left'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+time+"&nbsp;<span>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
            if (json.passage.restaurant != 0)
                $.each(json.restaurant, function(index, item) {
                    var time = item.time;
                    time = time.substring(5,time.length-3);
                    $('#restaurantHot').append("<div style=\"margin:5px 0;min-height: 20px\"><div style='white-space:nowrap;text-overflow:ellipsis;overflow:hidden; float: left'><a href=\"article.html?cate=restaurant&serial="+item.serial+"\" style=\"text-decoration:none;color:black;\">"+item.title+"</a></div><span style='margin-left: 10px; float: left'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+time+"&nbsp;<span>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
            if (json.passage.house != 0)
                $.each(json.house, function(index, item) {
                    var time = item.time;
                    time = time.substring(5,time.length-3);
                    $('#houseHot').append("<div style=\"margin:5px 0;min-height: 20px\"><div style='white-space:nowrap;text-overflow:ellipsis;overflow:hidden; float: left'><a href=\"article.html?cate=house&serial="+item.serial+"\" style=\"text-decoration:none;color:black;\">"+item.title+"</a></div><span style='margin-left: 10px; float: left'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+time+"&nbsp;<span>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
            if (json.passage.classes != 0)
                $.each(json.classes, function(index, item) {
                    var time = item.time;
                    time = time.substring(5,time.length-3);
                    $('#classesHot').append("<div style=\"margin:5px 0;min-height: 20px\"><div style='white-space:nowrap;text-overflow:ellipsis;overflow:hidden; float: left'><a href=\"article.html?cate=classes&serial="+item.serial+"\" style=\"text-decoration:none;color:black;\">"+item.title+"</a></div><span style='margin-left: 10px; float: left'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+time+"&nbsp;<span>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
            if (json.passage.partners != 0)
                $.each(json.partners, function(index, item) {
                    var time = item.time;
                    time = time.substring(5,time.length-3);
                    $('#partnersHot').append("<div style=\"margin:5px 0;min-height: 20px\"><div style='white-space:nowrap;text-overflow:ellipsis;overflow:hidden; float: left'><a href=\"article.html?cate=partners&serial="+item.serial+"\" style=\"text-decoration:none;color:black;\">"+item.title+"</a></div><span style='margin-left: 10px; float: left'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+time+"&nbsp;<span>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
        }
    });

});

function jump(address) {
    window.location.href="topic.html?cate="+address+"&page=1";
}

function isPc() {
    let userAgentInfo = navigator.userAgent;
    let Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");
    let flag = true;
    for (let v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = false; break; }
    }
    return flag;
}