$(document).ready(function(){
    $('.url').attr("value",window.location.href);
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