$(document).ready(function(){
    if ($.cookie('userid') !== null) {
        $('.navbar-text').append("<span style=\"margin-left:10px\">Hello, "+$.cookie('nickname')+"</span>");
        $('.navbar-text').append("<a class=\"btn\" style=\"margin-left:10px;margin-top:0;\" href=\"#\" onclick=\"quit()\">Quit</a>");
        $.ajax({
            url:"./php/getCommentNumber.php",
            type:"POST",
            dataType:"json",
            data: {
                userid : $.cookie('userid'),
            },
            success: function(json) {
                $('.navbar-text').append("<ul class=\"nav navbar-nav\" id=\"unreadMessage\"></ul>");
                if(json.newMessageNum === "0")
                    $('#unreadMessage').append("<li><span class=\"glyphicon glyphicon-envelope\"></span> "+json.newMessageNum+" new message</li>");
                else if(json.newMessageNum === "1")
                    $('#unreadMessage').append("<li class=\"dropdown\"><a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><span class=\"glyphicon glyphicon-envelope\"></span> "+json.newMessageNum+" new message</a></li>");
                else
                    $('#unreadMessage').append("<li class=\"dropdown\"><a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><span class=\"glyphicon glyphicon-envelope\"></span> "+json.newMessageNum+" new messages</a></li>");
                $('#unreadMessage li').append("<ul class=\"dropdown-menu\" role=\"menu\"></ul>");
                $.each(json.detail, function(index, item) {
                    $('#unreadMessage li ul').append("<li style=\"width:200px;\"><a href=\"article.html?cate="+item.cate+"&serial="+item.serial+"\">"+item.title+"</li>");
                });
            },
        });
    }
    else {
        $('.navbar-text').append("<a href=\"#loginModal\" class=\"btn\" data-toggle=\"modal\" data-target=\"#loginModal\" style=\"margin-left:10px;margin-top:0\">Login</a>&nbsp<a href=\"#registerModal\" class=\"btn\" data-toggle=\"modal\" data-target=\"#registerModal\" style=\"margin-left:10px;margin-top:0\">Register</a>");
    }
    $('li.dropdown').mouseover(function() {
         $(this).addClass('open');}).mouseout(function() {
            $(this).removeClass('open');
    });
});

function quit() {
    if(confirm("Are you sure to quit?")){
        $.cookie('userid',null);
        $.cookie('nickname',null);
    }
    window.location.reload();
}

function login() {
    $.ajax({
        url:"./php/login.php",
        type:"POST",
        data : {
            account : $('#loginInputAccount').val(),
            password : $('#loginInputPassword').val(),
            url : window.location.href,
            write : $('.write').val(),
        },
        success: function() {
        }
    });
}
