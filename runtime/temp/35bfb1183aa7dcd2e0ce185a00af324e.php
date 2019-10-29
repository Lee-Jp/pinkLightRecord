<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"F:\phpStudy\PHPTutorial\WWW\shequTp\public/../application/index\view\index\comyulan.html";i:1564623249;}*/ ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        background-color: #000;
    }

    * {
        margin: 0;
        padding: 0;
    }

    .box {
        background-color: #000;
        width: 100%;
        height: 1200px;
        display: flex;
        flex-flow: row wrap;
        justify-content: space-between;
    }

    .left {
        width: 65%;
    }

    .box-left {
        margin-top: 10px;
        margin-left: 40px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .box-left-bottom {
        margin-left: 40px;
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .left img {
        line-height: 48px;
        width: 26px;
        height: 26px;
    }

    .num {
        color: #7a7a7a;
    }

    .box-right-left span {
        color: #fff;
        margin-left: 4px;
    }

    #mainpic img {
        line-height: 48px;
        width: 700px;
        height: 466px;
    }

    .right {
        width: 34%;
        border-left: 1px solid #1c1d1e;
    }

    .box-right {
        width: 100%;
        margin-top: 10px;
        height: 48px;
        display: flex;
        align-items: center;
        border-bottom: 1px solid #1c1d1e;
    }

    .box-right div {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        margin: 0 15px;
    }

    .box-right-bottombox {

        height: 90px;
        border-bottom: 1px solid #1c1d1e;
        display: flex;
        flex-flow: row wrap;
        align-items: center;
        justify-content: space-between;
        padding-left: 25px;
    }

    .bottombox-leftbox-left img {
        width: 64px;
        height: 64px;
        border-radius: 50%;
    }

    .bottombox-leftbox {

        width: 70%;
        display: flex;
        /* justify-content:flex-start; */
    }

    .bottom-right-top span {
        color: #fff;
    }

    .bottombox-leftbox-right {
        margin-left: 10px;
        margin-top: 6px;
        width: 100%;
        height: 44px;
        display: flex;
        flex-flow: row wrap;
    }

    .bottom-right-bottom {
        color: #7f7f7f;
        display: flex;
        margin-top: 6px;
    }

    .bottom-right-bottom div {
        /* margin-left: 10px; */
    }

    .bottombox-rightbox span {
        margin-right: 20px;
        color: #c99a05;
        border: 1px solid #c99a05;
        padding: 5px 30px;
    }

    .detail {
        color: #fff;
        /* height: 50px; */
        display: flex;
        flex-flow: row wrap;
        padding-left: 35px;
        padding-top: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #1c1d1e;
    }

    .detail span {
        width: 100%;
        font-size: 14px;
    }

    .detail span:nth-of-type(2) {
        font-size: 12px;
    }

    .talking textarea {
        background: #1c1d1e;
        color: #575757;
        font-size: 16px;
        margin: 30px 36px;
        padding: 10px 20px;
    }

    .comment {
        color: #c99a05;
        margin-left: 420px;
    }

    .ask {
        margin: 30px;
    }

    .ask-title {
        width: 250px;
        display: flex;
    }

    .ask-title img {
        width: 44px;
        height: 44px;
        border-radius: 50%;
    }

    .name {
        color: #fff;
        display: block;
        font-size: 14px;
        line-height: 44px;
        height: 44px;
        margin-left: 5px;
    }

    .ask-content {
        margin: 2px 0px 0px 50px;
        color: #878b8d;
        font-size: 14px;
    }

    .ask-footer {
        margin: 6px 0px 0px 50px;
        color: #878b8d;
        display: flex;
        justify-content: space-between;
    }

    .riqi div {
        color: #878b8d;
        font-size: 14px;
    }
</style>

<body>
    <!-- 头部 -->
    <div class="box">
        <div class="left">
            <div class="box-left">
                <img src="/shequTp/public/static/index/image/big.png" alt="" srcset="">
                <span class="num">3/6</span>
                <img onclick="closethis()" style="cursor: pointer;" src="/shequTp/public/static/index/image/close.png" alt=""
                    srcset="">
            </div>
            <!-- 图片显示 -->
            <div class="box-left-bottom">
                <img src="/shequTp/public/static/index/image/left.png" style="cursor: pointer;" onclick="prevphoto()">
                <div id="mainpic">

                </div>
                <img src="/shequTp/public/static/index/image/right.png" style="cursor: pointer;" onclick="nextphoto()">
            </div>
        </div>
        <div class="right">
            <div class="box-right">
                <!-- 右边头部 -->
                <div class="box-right-left">
                    <div>
                        <img src="/shequTp/public/static/index/image/like.png" onclick="lickthis()" style="cursor: pointer;" alt=""
                            srcset="">
                        <span id="score"></span>
                    </div>
                    <div>
                        <img src="/shequTp/public/static/index/image/news.png" alt="" srcset="">
                        <span id="commentlength"></span>
                    </div>
                </div>
            </div>
            <!-- 右边主页信息部分 -->
            <div class="box-right-bottombox">
                <div class="bottombox-leftbox">
                    <div class="bottombox-leftbox-left" id="avatarSrc">
                    </div>
                    <div class="bottombox-leftbox-right">
                        <div class="bottom-right-top">
                            <span id="uploadname"></span>
                        </div>
                        <div class="bottom-right-bottom">
                            <div id="create_time"></div>
                            <div style="margin-left:14px;">
                                <img src="/shequTp/public/static/index/image/see1.png" alt="" srcset="">
                                <span>399</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="follow">

                </div>
            </div>
            <!-- 详情信息部分 -->
            <div class="detail" id="detail">

            </div>
            <!-- 评论部分 -->
            <div class="talking">
                <textarea name="" id="content" cols="44" rows="5" placeholder="别拦我，我想认真和你探讨一下..."></textarea>
                <span class="comment" onclick="setComment()" style="cursor: pointer;">评论</span>
                <div id="commentlist">

                </div>
            </div>
        </div>
</body>

</html>
<script src="/shequTp/public/static/index/js/jquery.min.js"></script>
<script src="/shequTp/public/static/index/js/myjs.js"></script>
<script>
    $(function () {
        getComment();  //进入页面自动获取评论
        var comphotoid = JSON.parse(localStorage.getItem("comphotoid"));
        var user = JSON.parse(localStorage.getItem('user'));
        //获取预览大图
        $.ajax({
            url: httpurl + 'comphoto/ajaxGetComphotoCont',
            type: 'post',
            data: {
                'id': comphotoid
            },
            success(res) {
                console.log(res);
                if (res.code == 200) {
                    var data = res.data;
                    $.each(data, function (i, v) {
                        var mainpic = `<img src="${httppic}${v.path}"  alt="">`;
                        var avatarSrc = ` <img src="${httppic}${v.avatarSrc}" alt="">`;
                        if (v.iso == 0) {
                            var detail = ` <div style="display:flex; width:50%;" ><span>图片名称：${v.title}</span><span>标签：#${v.label}</span></div><span style="padding-top:10px;">描述：${v.intro}</span>;
                                   <div style="font-size: 14px;">相机：${v.camera}</div>`;
                        } else {
                            var detail = ` <div style="display:flex; width:50%;"><span>图片名称：${v.title}</span><span>标签：#${v.label}</span></div><span style="padding-top:10px;">描述：${v.intro}</span>
                                   <div  style="height:20px; line-height:20px;margin-top:10px; display:flex; align-item：center;justify-content:space-between; width:80%;"><div style="font-size: 14px;">相机：${v.camera}</div><div>iso：${v.iso}</div><div>aperture：${v.aperture}</div><div>shutter：${v.shutter}</div></div>`;
                        }
                        var follow = ` <div class="bottombox-rightbox" style="cursor: pointer;" onclick="followUser(${v.user_id})">
                                    <span id="isfollow">关注</span></div>`;
                        $('#mainpic').html(mainpic);    //图片
                        $('#uploadname').html(v.username);  //作者昵称
                        $('#create_time').html(v.creat_time);  //上传时间
                        $('#avatarSrc').html(avatarSrc); //作者头像
                        $('#detail').html(detail);  //作品信息
                        $('#score').html(v.score);  //点赞数
                        $('#follow').html(follow);  //关注
                    });
                } else {
                    alert('没有了~');
                }

            }
        });
    });
    //下一页
    function nextphoto() {
        var comphotoid = JSON.parse(localStorage.getItem("comphotoid"));
        //获取预览大图
        $.ajax({
            url: httpurl + 'comphoto/ajaxGetComphotoCont',
            type: 'post',
            data: {
                'id': comphotoid + 1
            },
            success(res) {
                console.log(res);
                var data = res.data;
                $.each(data, function (i, v) {
                    var mainpic = `<img src="${httppic}${v.path}"  alt="">`;
                    var avatarSrc = ` <img src="${httppic}${v.avatarSrc}" alt="">`;
                    var detail = ` <span>图片名称：${v.title}</span><span>标签：#${v.label}</span><span>描述：${v.intro}</span>
                                   <div>相机：${v.camera}</div><div>iso：${v.iso}</div><div>aperture：${v.aperture}</div><div>shutter：${v.shutter}</div>`;
                    var follow = ` <div class="bottombox-rightbox" style="cursor: pointer;" onclick="followUser(${v.user_id})">
                                    <span id="isfollow">关注</span></div>`
                    $('#mainpic').html(mainpic);    //图片
                    $('#uploadname').html(v.username);  //作者昵称
                    $('#create_time').html(v.creat_time);  //上传时间
                    $('#avatarSrc').html(avatarSrc); //作者头像
                    $('#detail').html(detail);  //作品信息
                    $('#score').html(v.score);  //点赞数
                    $('#follow').html(follow);  //关注
                });
            }
        });
        localStorage.comphotoid = JSON.stringify(comphotoid + 1);
        //清空并获取新的评论
        $('#commentlist').html('');
        $('#commentlength').html('');
        getComment();
    }
    //上一页
    function prevphoto() {
        var comphotoid = JSON.parse(localStorage.getItem("comphotoid"));
        //获取预览大图
        $.ajax({
            url: httpurl + 'comphoto/ajaxGetComphotoCont',
            type: 'post',
            data: {
                'id': comphotoid - 1
            },
            success(res) {
                console.log(res);
                var data = res.data;
                $.each(data, function (i, v) {
                    var mainpic = `<img src="${httppic}${v.path}"  alt="">`;
                    var avatarSrc = ` <img src="${httppic}${v.avatarSrc}" alt="">`;
                    var detail = ` <span>图片名称：${v.title}</span><span>标签：#${v.label}</span><span>描述：${v.intro}</span>
                                   <div>相机：${v.camera}</div><div>iso：${v.iso}</div><div>aperture：${v.aperture}</div><div>shutter：${v.shutter}</div>`;
                    var follow = ` <div class="bottombox-rightbox" style="cursor: pointer;" onclick="followUser(${v.user_id})">
                                    <span id="isfollow">关注</span></div>`;
                    $('#mainpic').html(mainpic);    //图片
                    $('#uploadname').html(v.username);  //作者昵称
                    $('#create_time').html(v.creat_time);  //上传时间
                    $('#avatarSrc').html(avatarSrc); //作者头像
                    $('#detail').html(detail);  //作品信息
                    $('#score').html(v.score);  //点赞数
                    $('#follow').html(follow);  //关注
                });
            }
        });
        localStorage.comphotoid = JSON.stringify(comphotoid - 1);
        //清空并获取新的评论
        $('#commentlist').html('');
        $('#commentlength').html('');
        getComment();  //进入页面自动获取评论
    }
    //点赞同时记录收藏
    function lickthis() {
        var comphotoid = JSON.parse(localStorage.getItem("comphotoid"));
        var user = JSON.parse(localStorage.getItem('user'));
        if (user == undefined) {
            alert('您还没有登录，请先登录再进行此项操作~');
        } else {
            $.ajax({
                url: httpurl + 'comphoto/lickComPhoto',
                type: 'post',
                data: {
                    'photo_id': comphotoid,
                    'user_id': user.uid,
                },
                success(res) {
                    if (res.code == 200) {
                        $('#score').html(res.score);  //更新点赞数
                    } else {
                        alert(res.msg);
                    }
                }
            });
        }
    }
    //关注用户
    function followUser(friend_id) {
        var user = JSON.parse(localStorage.getItem('user'));
        if (user == undefined) {
            alert('您还没有登录，请先登录再进行此项操作~');
        } else {
            $.ajax({
                url: httpurl + 'comphoto/followUser',
                type: 'post',
                data: {
                    'friend_id': friend_id,
                    'user_id': user.uid,
                },
                success(res) {
                    if (res.code == 200) {
                        $('#isfollow').html('已关注');  //更新关注
                    } else {
                        alert(res.msg);
                        $('#isfollow').html('已关注');  //更新关注
                    }
                }
            });
        }

    }
    //发表评论
    function setComment() {
        var user = JSON.parse(localStorage.getItem('user'));
        var comphotoid = JSON.parse(localStorage.getItem("comphotoid"));
        var content = $('#content').val();
        if (content == "") {
            alert("您还没有输入");
            return false;
        }
        if (user == undefined) {
            alert('您还没有登录，请先登录再进行此项操作~');
        } else {
            $.ajax({
                url: httpurl + 'comment/ajaxUserComment',
                type: 'post',
                data: {
                    'photo_id': comphotoid,
                    'user_id': user.uid,
                    'content': content
                },
                success(res) {
                    if (res.code == 200) {
                        getComment();
                    } else {
                        alert(res.msg);
                    }
                }
            });
        }
    }
    //获取评论
    function getComment() {
        var comphotoid = JSON.parse(localStorage.getItem("comphotoid"));
        $.ajax({
            url: httpurl + 'comment/ajaxGetComment',
            type: 'post',
            data: {
                'photo_id': comphotoid
            },
            success(res) {
                if (res.code == 200) {
                    console.log(res);
                    var commentdata = res.commentdata;
                    var commentlist = "";
                    $.each(commentdata, function (i, v) {
                        commentlist += `<div class="ask">
                            <div class="ask-title">
                                <img src="${httppic}${v.avatarSrc}" alt="">
                                <span class="name"> ${v.username}</span>
                            </div>
                            <div class="ask-content">
                               ${v.content}
                            </div>
                            <div class="ask-footer">
                                    <div>${v.create_time}</div>
                                    <img src="/shequTp/public/static/index/image/zan.png" alt="" srcset="">
                                </div>
                        </div>`;
                        var commentlength = res.commentdata.length;
                        $('#commentlist').html(commentlist);
                        $('#commentlength').html(commentlength);
                    });
                } else {
                    alert(res.msg);
                }
            }
        });
    }
    //关闭此页面，返回上一级
    function closethis() {
        window.location.href = "<?php echo url('index/index'); ?>";
    }
</script>