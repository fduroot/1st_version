function getQueryString(name) {
    var reg = new RegExp("(^|&)?" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r !== null)return unescape(r[2]);
    return null;
}
var content;
$(document).ready(function () {
    if (getQueryString("serial") !== null) {
        $.ajax({
            type: "POST",
            url: "",
            data: {
                serial: getQueryString("serial"),
            },
            dataType: "json",
            success: function (json) {
                /*if ($.cookie('userid') !== json.author) {
                    alert("You are not allowed to edit!");
                    window.location.href = "index.html";
                }*/
            }
        });
    };
    /*if ($.cookie('userid') === null) {
        alert("You are not allowed to edit!");
        window.location.href = "index.html";
    };*/
    $.ajax({
        type: "POST",
        url: "./php/getArticle.php",
        data: {
            serial: getQueryString("serial"),
        },
        dataType: "json",
        async: false,
        success: function (json) {
            $('#topic-name').val(json.title);
            content=json.content;
            $('#categorylist').val(json.cate);
            $('#upfile').val(json.img);
        }
    });
    KindEditor.ready(function(K) {
        editor = K.create('#context-edit');
        editor.html(content);
    });
    $('#categorylist').val(getQueryString("cate"));
});
//获取url和参数
var currentUrl = window.location.search;

//提交时检查标签是否为空
function testSub() {
    var tagStr = $('#topic-name');
    if (tagStr.val() !== "") {
        $('form').attr("action", "./php/publishArticle.php" + currentUrl);
    } else {
        alert("Please set a title for your tip");
    }
}