function getQueryString(name) {
    var reg = new RegExp("(^|&)?" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r !== null)return unescape(r[2]);
    return null;
}

$(document).ready(function () {
    $('.url').attr("value",window.location.href);
    if ($.cookie('userid') === null)
        $('#nickName').html("<strong>Nickname：</strong><input class=\"input-small\" type=\"text\" name=\"nickname\"/>");
    $.ajax({//评论
        type: "POST",
        url: "./php/setRead.php",
        data: {
            serial: getQueryString("serial"),
        },
        success: function (json) {
        }
    });

    $.ajax({//浏览量
        type: "POST",
        url: "./php/addskim.php",
        data: {
            serial: getQueryString("serial"),
        },
        success: function (json) {
        }
    });
    $.ajax({
        url: "./php/getArticle.php",
        type: "POST",
        dataType: "json",
        data: {
            serial: getQueryString("serial"),
        },
        success: function (json) {
            $('#article_title').html(json.title);
            $('title').html(json.title);
            //$('#article_text').innerHTML="<p id=\"article_text\">"+json.text+"</p>";
            $('#article_text').html("<p id=\"article_text\">" + json.content + "</p>");
        }
    });
    $.ajax({
        url: "./php/getComments.php",
        type: "POST",
        dataType: "json",
        data: {
            serial: getQueryString("serial"),
        },
        success: function (json) {
            $.each(json, function (index, item) {
                $('.comments').append("<div><span>" + item.writer + "&nbsp</span><br><span>" + item.content + "</span><a href=\"javascript:void(0)\" onclick=\"reply('" + item.writer +"&"+ item.id + "')\" style=\"margin-left:10px;\">Reply</a></div>");
            });
        }
    });
});

function reply(data) {
    var parameter = new Array();
    parameter = data.split('&');
    var writer = parameter[0];
    var id = parameter[1];
    $('#comm').val("To " + writer + " : ");
    $('#replyId').attr("value",id);
    document.comment.com.focus();
}

function publish() {
    var commentContent = $('#comm').val();
    var writer;
    if ($.cookie('userid') === null)
        writer = $('#nickName input').val();
    else
        writer = $.cookie('nickname');
    //alert($('#replyId').val());
    //alert($('#nickName input').val());
    $.ajax({
        url: "./php/publishComment.php",
        type: "POST",
        data: {
            serial: getQueryString("serial"),
            comment: commentContent,
            to: $('#replyId').val(),
            cate: getQueryString("cate"),
            nickname: writer,
        },
        success: function () {
            $('#comm').val("");
            $('#nickName input').val("");
            location.reload();
        }
    });
};