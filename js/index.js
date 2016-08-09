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
                    $('#sellHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=sell&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size: 12pt;\">"+item.title+"</a><span style='margin-left: 10px'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+item.time+"&nbsp;<span style='font-size: 13pt'>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
            if (json.passage.buy != 0)
                $.each(json.buy, function(index, item) {
                    $('#buyHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=buy&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size: 12pt;\">"+item.title+"</a><span style='margin-left: 10px'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+item.time+"&nbsp;<span style='font-size: 13pt'>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
            if (json.passage.job != 0)
                $.each(json.ptjb, function(index, item) {
                    $('#jobHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=job&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size: 12pt;\">"+item.title+"</a><span style='margin-left: 10px'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+item.time+"&nbsp;<span style='font-size: 13pt'>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
            if (json.passage.more != 0)
                $.each(json.more, function(index, item) {
                    $('#moreHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=more&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size: 12pt;\">"+item.title+"</a><span style='margin-left: 10px'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+item.time+"&nbsp;<span style='font-size: 13pt'>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
            if (json.passage.other != 0)
                $.each(json.other, function(index, item) {
                    $('#otherHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=other&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size: 12pt;\">"+item.title+"</a><span style='margin-left: 10px'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+item.time+"&nbsp;<span style='font-size: 13pt'>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
            if (json.passage.restaurant != 0)
                $.each(json.restaurant, function(index, item) {
                    $('#restaurantHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=restaurant&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size: 12pt;\">"+item.title+"</a><span style='margin-left: 10px'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+item.time+"&nbsp;<span style='font-size: 13pt'>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
            if (json.passage.house != 0)
                $.each(json.house, function(index, item) {
                    $('#houseHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=house&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size: 12pt;\">"+item.title+"</a><span style='margin-left: 10px'>["+item.commentNum+"]</span><span class='pull-right' style='font-size: 8pt'>["+item.nickname+"&nbsp;"+item.time+"&nbsp;<span style='font-size: 13pt'>"+item.count+"</span>&nbsp;viewed]</span></div>");
                });
        }
    });
    //$('#sellHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=sell&serial=0\" style=\"text-decoration:none;color:black;font-size: 12pt;text-overflow:ellipsis; width: 40%;\">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</a><span style='margin-left: 10px'>[12345]</span><span class='pull-right' style='font-size: 8pt'>[kevin&nbsp;2016-08-09&nbsp;<span style='font-size: 13pt'>1234</span>&nbsp;viewed]</span></div>");
});

function jump(address) {
    window.location.href="topic.html?cate="+address+"&page=1";
}