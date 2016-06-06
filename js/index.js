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
                        $('#sellHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=sell&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size:20px;\">"+item.title+"</a></div>");
                    });
                if (json.passage.buy != 0)
                    $.each(json.buy, function(index, item) {
                        $('#buyHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=buy&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size:20px;\">"+item.title+"</a></div>");
                    });
                if (json.passage.intern != 0)
                    $.each(json.intern, function(index, item) {
                        $('#internHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=intern&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size:20px;\">"+item.title+"</a></div>");
                    });
                if (json.passage.ptjb != 0)
                    $.each(json.ptjb, function(index, item) {
                        $('#ptjbHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=ptjb&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size:20px;\">"+item.title+"</a></div>");
                    });
                if (json.passage.stuff != 0)
                    $.each(json.stuff, function(index, item) {
                        $('#stuffHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=stuff&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size:20px;\">"+item.title+"</a></div>");
                    });
                if (json.passage.other != 0)
                    $.each(json.other, function(index, item) {
                        $('#otherHot').append("<div style=\"margin:5px 0;\"><a href=\"article.html?cate=other&serial="+item.serial+"\" style=\"text-decoration:none;color:black;font-size:20px;\">"+item.title+"</a></div>");
                    });
            }
        });
});

function jump(address) {
    window.location.href="topic.html?cate="+address+"&page=1";
}
