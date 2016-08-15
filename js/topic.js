function getQueryString(name) {
    var reg = new RegExp("(^|&)?"+ name +"=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if(r!==null)return  unescape(r[2]); return null;
}

$(document).ready(function(){
    $('#searchBar').submit(function () {
        searchTopic();
        return false;
    });
    $('.url').attr("value",window.location.href);
    $('#'+getQueryString("cate")).attr("class","active");
    if(getQueryString("cate")==="buy") {
        $('h1 span').html("Buy");
    }
    if(getQueryString("cate")==="sell") {
        $('h1 span').html("Sell");
    }
    if(getQueryString("cate")==="inform") {
        $('#inform').attr("class","active nav-header");
        $('h1 span').html("Information");
    }
    if(getQueryString("cate")==="job")
        $('h1 span').html("Job Postings");
    if(getQueryString("cate")==="qa") {
        $('#qa').attr("class","active nav-header");
        $('h1 span').html("Q&A");
    }
    if(getQueryString("cate")==="more")
        $('h1 span').html("More About Fudan");
    if(getQueryString("cate")==="other")
        $('h1 span').html("Other");
    if(getQueryString("cate")==="survive") {
        $('#survive').attr("class","active nav-header");
        $('h1 span').html("Survive");
    }
    if(getQueryString("cate")==="restaurant")
        $('h1 span').html("Restaurant");
    if(getQueryString("cate")==="house")
        $('h1 span').html("Rent House");
    if(getQueryString("cate")==="search") {
        $('h1 span').html("Search");
        $('thead tr').append("<th class=\"span2\"><span class=\"lead\" style=\"color:black;font-weight:bold\">Page View</span><span class=\"glyphicon glyphicon-sort\" onclick=\"sort('browsed')\"></span></th><th class=\"span2\"><span class=\"lead\" style=\"color:black;font-weight:bold\">Category</span></th>");
    }
    $.ajax({
        url:"./php/searchart.php",
        type:"POST",
        dataType:"json",
        data: {
            page : getQueryString("page"),
            arr : getQueryString("arr"),
            category : getQueryString("cate"),
            search : getQueryString("search")//document.getElementsByName("search")[0].value,
        },
        success:function(json){
            var page = parseInt(getQueryString("page"));
            var cate = getQueryString("cate");
            $('#firstPage').attr("onclick","jump('"+1+"')");
            $('#lastPage').attr("onclick","jump('"+json.pageNum+"')");
            $('#prevPage').attr("onclick","jump('"+(page-1)+"')");
            $('#nextPage').attr("onclick","jump('"+(page+1)+"')");
            if (page==1) {
                $('#prevLi').attr("class","disabled");
                $('#firstLi').attr("class","disabled");
            }
            if(page==json.pageNum) {
                $('#nextLi').attr("class","disabled");
                $('#lastLi').attr("class","disabled");
            }
            for(var i=page-2; i-page<3; i++)
                if(i>=1 && i<=json.pageNum) {
                    if(i!==page)
                        $("<li><a href=\"#\" onclick=\"jump('"+i+"')\">"+i+"</a></li>").insertBefore('#nextLi');
                    else
                        $("<li><a href=\"#\" onclick=\"jump('"+i+"')\" style=\"color:rgb(255,255,255);background:rgb(130,200,255)\">"+i+"</a></li>").insertBefore('#nextLi');
                }
            var is_admin = false;
            if (admin())
                is_admin=true;
            var time;
            $.each(json.notify, function(index, item) {
                time = item.time;
                time = time.substr(0,time.length-3);
                $('tbody').append("<tr class='admin'><th class=\"span5\"><div style='white-space:nowrap;display:inline-block; max-width:80%;text-overflow:ellipsis;overflow:hidden;float:left'><a href=\"article.html?cate="+item.cate+"&serial="+item.serial+"\" style='white-space:nowrap;'>"+item.title+"</a><span style='margin-left: 10px'>["+item.commentNum+"]</span><span class='glyphicon glyphicon-flag'></span></div></th><th class='span2'>"+item.nickname+"</th><th class=\"span2\">"+time+"</th><th class=\"span2\">"+item.readAmount+"</th></tr>");
                if(is_admin) {
                    $('tbody tr:last-child th:first-child').append("<a class=\"btn btn-small pull-right\" style=\"margin-left:5px;margin-bottom:2px;\" onclick=\"deleteTopic("+item.serial+")\">Delete</a>");
                    $('tbody tr:last-child th:first-child').append("<a class=\"btn btn-small pull-right\" style=\"margin-left:5px;margin-bottom:2px;\" onclick=\"edit("+item.serial+")\">Edit</a>");
                }
            });
            $.each(json.detail, function(index, item) {
                time = item.time;
                time = time.substr(0,time.length-3);
                $('tbody').append("<tr><th class=\"span5\"><div style='white-space:nowrap;display:inline-block; max-width:80%;text-overflow:ellipsis;overflow:hidden;float:left'><a href=\"article.html?cate="+item.cate+"&serial="+item.serial+"\" style='white-space:nowrap;'>"+item.title+"</a><span style='margin-left: 10px'>["+item.commentNum+"]</span></div></th><th class='span2'>"+item.nickname+"</th><th class=\"span2\">"+time+"</th><th class=\"span2\">"+item.readAmount+"</th></tr>");
                if($.cookie('userid')===item.author) {
                    $('tbody tr:last-child th:first-child').append("<a class=\"btn btn-small pull-right\" style=\"margin-left:5px;margin-bottom:2px;\" onclick=\"deleteTopic("+item.serial+")\">Delete</a>");
                    $('tbody tr:last-child th:first-child').append("<a class=\"btn btn-small pull-right\" style=\"margin-left:5px;margin-bottom:2px;\" onclick=\"edit("+item.serial+")\">Edit</a>");
                }
                else if (is_admin) {
                    $('tbody tr:last-child th:first-child').append("<a class=\"btn btn-small pull-right\" style=\"margin-left:5px;margin-bottom:2px;\" onclick=\"deleteTopic("+item.serial+")\">Delete</a>");
                }
            });
        }
    });
    /*for test*/
    /*
     var page = parseInt(getQueryString("page"));
     var cate = getQueryString("cate");
     $('#firstPage').attr("onclick","jump('"+1+"')");
     $('#lastPage').attr("onclick","jump('"+4+"')");
     $('#prevPage').attr("onclick","jump('"+(page-1)+"')");
     $('#nextPage').attr("onclick","jump('"+(page+1)+"')");
     if (page===1) {
     $('#prevLi').attr("class","disabled");
     $('#firstLi').attr("class","disabled");
     }
     if(page===4) {
     $('#nextLi').attr("class","disabled");
     $('#lastLi').attr("class","disabled");
     }
     for(var i=page-2; i<=page+2; i++)
     if(i>=1 && i<=4) {
     if(i!==page)
     $("<li><a href=\"#\" onclick=\"jump('"+i+"')\">"+i+"</a></li>").insertBefore('#nextLi');
     else
     $("<li><a href=\"#\" onclick=\"jump('"+i+"')\" style=\"color:rgb(255,255,255);background:rgb(130,200,255)\">"+i+"</a></li>").insertBefore('#nextLi');
     }
     for (i=0;i<=40;i++) {
     if (Math.floor(i/10)+1==page) {
     if(getQueryString("search")===null)
     $('tbody').append("<tr class='admin'><th class=\"span5\"><a href=\"article.html?cate="+getQueryString("cate")+"&serial="+i+"\">"+"test"+i+"</a><span class='glyphicon glyphicon-flag'></span></th><th class=\"span2\">"+"2000/1/1"+"</th></tr>");
     else
     $('tbody').append("<tr><th class=\"span5\"><a href=\"article.html?cate="+getQueryString("cate")+"&serial="+i+"\">"+"test"+i+"</a></th><th class=\"span2\">"+"2000/1/1"+"</th><th class=\"span2\">0</th><th class=\"span2\">Sell</th></tr>");
         $('tbody tr:last-child th:first-child').append("<a class=\"btn btn-small pull-right\" style=\"margin-left:5px;margin-bottom:2px;\" onclick=\"deleteTopic(1)\">Delete</a>");
         $('tbody tr:last-child th:first-child').append("<a class=\"btn btn-small pull-right\" style=\"margin-left:5px;margin-bottom:2px;\" onclick=\"edit(1)\">Edit</a>");

     }
     }
     if ($.cookie('userid')===null) {
     $('#edit_btn').attr("href","#loginModal");
     $('#edit_btn').attr("data-toggle","modal");
     $('#edit_btn').attr("data-target","#loginModal");
     } else {
     $('#edit_btn').attr("href", "write.html?targetId=" + para[0][1] + "&style=new&type=buy");
     }
    var commentNum=5;
    $('tbody').append("<tr><th class=\"span5\"><a href=\"article.html?cate=buy&serial=1\">hhh</a><span style='margin-left: 10px'>["+commentNum+"]</span></th><th class='span2'>Kevin</th><th class=\"span2\">2016-07-31</th><th class=\"span2\">1</th></tr>");
     */
});

function admin() {
    var admin_bool;
    $.ajax({
        type: "POST",
        url: "./php/getAdmin.php",
        data: {
            id: $.cookie('userid')
        },
        dataType:"json",
        async: false,
        success: function (json) {
            admin_bool=json.admin;
        }
    });
    return admin_bool;
}


function jump(address) {
    if(getQueryString("search")===null && getQueryString("arr")===null)
        window.location.href="topic.html?cate="+getQueryString("cate")+"&page="+address;
    if(getQueryString("search")!==null && getQueryString("arr")===null)
        window.location.href="topic.html?cate=search&search="+getQueryString("search")+"&page="+address;
    if(getQueryString("search")!==null && getQueryString("arr")!==null)
        window.location.href="topic.html?cate=search&search="+getQueryString("search")+"&arr="+getQueryString("arr")+"&page="+address;
    if(getQueryString("search")===null && getQueryString("arr")!==null)
        window.location.href="topic.html?cate="+getQueryString("cate")+"&arr="+getQueryString("arr")+"&page="+address;
}

function searchTopic() {
    window.location.href="topic.html?cate=search&search="+document.getElementsByName("search")[0].value+"&page=1";
}

function sort(arr) {
    if(getQueryString("search")===null)
        window.location.href="topic.html?cate="+getQueryString("cate")+"&arr="+arr+"&page=1";
    else
        window.location.href="topic.html?cate=search&search="+getQueryString("search")+"&arr="+arr+"&page=1";
}
function edit(serial) {
    window.location.href="write.html?serial="+serial;
}

function deleteTopic(serial) {
    if(confirm("Are you sure to delete?")) {
        $.ajax({
            type : "POST",
            url : "./php/deleteArticle.php",
            data : {
                serial : serial
            },
            success : function() {
                alert('Success');
                location.reload();
            }
        });
    }
}

function newTopic() {
    if ($.cookie('userid')===null) {
        $('#edit_btn').attr("href","#loginModal");
        $('#edit_btn').attr("data-toggle","modal");
        $('#edit_btn').attr("data-target","#loginModal");
        $('.write').val(getQueryString("cate"));
    } else {
        $('#edit_btn').attr("href", "write.html?cate="+getQueryString("cate"));
    }
}