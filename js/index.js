$(document).ready(function(){
    $('.url').attr("value",window.location.href);
    $.ajax({
            url:"./php/getHottest.php",
            dataType:"json",
            data: {
            },
            success:function(json){
                var img;
                if (json.passage.sell != 0)
                    $.each(json.sell, function(index, item) {
                        $('#sellHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=sell&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size:20px;\">"+item.title+"<span class='pull-right' style='font-size: 16px'>["+item.nickname+"&nbsp;"+item.time+"&nbsp;"+item.count+"&nbsp;viewed]</span></a></div>");
                    });
                if (json.passage.buy != 0)
                    $.each(json.buy, function(index, item) {
                        $('#buyHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=buy&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size:20px;\">"+item.title+"<span class='pull-right' style='font-size: 16px'>["+item.nickname+"&nbsp;"+item.time+"&nbsp;"+item.count+"&nbsp;viewed]</span></a></div>");
                    });
                if (json.passage.job != 0)
                    $.each(json.ptjb, function(index, item) {
                        $('#jobHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=job&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size:20px;\">"+item.title+"<span class='pull-right' style='font-size: 16px'>["+item.nickname+"&nbsp;"+item.time+"&nbsp;"+item.count+"&nbsp;viewed]</span></a></div>");
                    });
                if (json.passage.more != 0)
                    $.each(json.more, function(index, item) {
                        $('#moreHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=more&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size:20px;\">"+item.title+"<span class='pull-right' style='font-size: 16px'>["+item.nickname+"&nbsp;"+item.time+"&nbsp;"+item.count+"&nbsp;viewed]</span></a></div>");
                    });
                if (json.passage.other != 0)
                    $.each(json.other, function(index, item) {
                        $('#otherHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=other&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size:20px;\">"+item.title+"<span class='pull-right' style='font-size: 16px'>["+item.nickname+"&nbsp;"+item.time+"&nbsp;"+item.count+"&nbsp;viewed]</span></a></div>");
                    });
                if (json.passage.restaurant != 0)
                    $.each(json.restaurant, function(index, item) {
                        $('#restaurantHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=restaurant&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size:20px;\">"+item.title+"<span class='pull-right' style='font-size: 16px'>["+item.nickname+"&nbsp;"+item.time+"&nbsp;"+item.count+"&nbsp;viewed]</span></a></div>");
                    });
                if (json.passage.house != 0)
                    $.each(json.house, function(index, item) {
                        $('#houseHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=house&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size:20px;\">"+item.title+"<span class='pull-right' style='font-size: 16px'>["+item.nickname+"&nbsp;"+item.time+"&nbsp;"+item.count+"&nbsp;viewed]</span></a></div>");
                    });
            }
        });
});

function jump(address) {
    window.location.href="topic.html?cate="+address+"&page=1";
}
