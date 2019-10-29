<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"F:\phpStudy\PHPTutorial\WWW\shequTp\public/../application/index\view\index\index.html";i:1564623564;s:70:"F:\phpStudy\PHPTutorial\WWW\shequTp\application\index\view\layout.html";i:1564554189;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>拾光纪  -  社区</title>
    <link rel="stylesheet" href="/shequTp/public/static/index/css/bootstrap.css">
    <link rel="stylesheet" href="/shequTp/public/static/index/css/style.css">
</head>
<style>

</style>
<body>
<!--导航栏-->
<header>
    <div class="container">
        <!-- 首导航栏 -->
        <div class="nav-wide">
            <div class="nav-left fl">
                <div class="nav-logo fl"><img src="/shequTp/public/static/index/img/logo/logo.png" class="" alt="摄趣"></div>
                <ul class="nav-page fl">
                    <li><a href="<?php echo url('index/index'); ?>">首页</a></li>
                    <li><a href="<?php echo url('index/followuser'); ?>">关注</a></li>
                    <!--<li><a href="">发现</a></li>-->
                    <li><a href="<?php echo url('index/msg_comment'); ?>">消息</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="nav-right fr">
                <ul class="user-list">
                    <!--头像昵称-->
                    <li class="user-info"  id="userinfo">
                    </li>
                    <li class="user-message">
                        <a href="<?php echo url('index/msg_comment'); ?>"><span class="fa fa-envelope"></span></a>
                    </li>
                    <li class="user-publish">
                        <a href="javascript:;" onclick="upImage()">发布</a>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</header>
<style>
    * body {
        background-color: #edeff0;
    }

    .pic .dapic {
        height: 250px;
        width: 250px;
        left: 50%;
        position: relative;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
    }
</style>

<!--主页搜索banner部分-->
<div class="main-banner">
    <div class="container">
        <div class="shequTitle">社区</div>
        <div class="shequIntro">按下快门的瞬间，不是你留住了时间，而是时间记住了你。</div>
        <div class="search-input">
            <input type="text" id="searchcont" placeholder="在这里搜索你喜欢的吧！" style="color:#666;">
            <a href="javascript:void(0);" id="search" class="fa fa-search"></a>
        </div>
        <div class="hotWord">
            <a href="javascript:;" class="word" onclick="serchKey('风景')">风景</a>
            <a href="javascript:;" class="word" onclick="serchKey('人像')">人像</a>
            <a href="javascript:;" class="word" onclick="serchKey('静物')">静物</a>
            <a href="javascript:;" class="word" onclick="serchKey('相机')">相机</a>
            <a href="javascript:;" class="word" onclick="serchKey('花卉')">花卉</a>
        </div>
    </div>
</div>

<!--第二导航栏-->
<div class="secondaryNav">
    <ul class="nav-list">
        <li><a href="javascript:void(0);" onclick="ajaxGetTop()">推荐</a></li>
        <li><a href="javascript:void(0);" onclick="ajaxGetFollow()">关注</a></li>
        <li><a href="javascript:void(0);" onclick="ajaxGetMajor()">专业</a></li>
        <li><a href="javascript:void(0);" onclick="ajaxGetTop()">最新</a></li>
    </ul>
</div>

<!--图片-->
<div class="container pic" id="compic">

</div>
<script src="/shequTp/public/static/index/js/jquery.min.js"></script>
<script src="/shequTp/public/static/index/js/myjs.js"></script>
<script>
    $(function () {
        ajaxGetTop();
    });
    function ajaxGetTop() {
        //获取推荐以及最新图片
        $.ajax({
            url: httpurl + 'comphoto/ajaxGetComphoto',
            type: 'post',
            data: {},
            success(res) {
                console.log(res);
                var str = "";
                var data = res.data;
                $.each(data, function (i, v) {
                    str += `<div class="col-xs-6 col-md-3" onclick="comyulan(${v.id})">
                            <a href="#" class="thumbnail">
                                <img src="${httppic}${v.path}"alt="..." class="dapic">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge">评${v.score}</span>
                                        <span class="badge">赞${v.score}</span>
                                        <img src="${httppic}${v.avatarSrc}" style="width: 26px;height: 26px;border-radius: 50%;" alt="...">
                                        ${v.username}
                                    </li>
                                </ul>
                            </a>
                        </div>`;
                });
                $('#compic').html(str);
            }
        });
    }
    function ajaxGetFollow() {
        var user = JSON.parse(localStorage.getItem('user'));
        //获取关注人发布的图片
        $.ajax({
            url: httpurl + 'comphoto/ajaxGetComFollowphoto',
            type: 'post',
            data: {
                'user_id': user.uid
            },
            success(res) {
                console.log(res);
                var str = "";
                var data = res.data;
                $.each(data, function (i, v) {
                    str += `<div class="col-xs-6 col-md-3" onclick="comyulan(${v.id})">
                            <a href="#" class="thumbnail">
                                <img src="${httppic}${v.path}"alt="..." class="dapic">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge">评${v.score}</span>
                                        <span class="badge">赞${v.score}</span>
                                        <img src="${httppic}${v.avatarSrc}" style="width: 26px;height: 26px;border-radius: 50%;" alt="...">
                                        ${v.username}
                                    </li>
                                </ul>
                            </a>
                        </div>`;
                });
                $('#compic').html(str);
            }
        });
    }
    function ajaxGetMajor() {
        //获取专业(手动档)照片
        $.ajax({
            url: httpurl + 'comphoto/ajaxGetComMajorphoto',
            type: 'post',
            data: {
            },
            success(res) {
                console.log(res);
                var str = "";
                var data = res.data;
                $.each(data, function (i, v) {
                    str += `<div class="col-xs-6 col-md-3" onclick="comyulan(${v.id})">
                            <a href="#" class="thumbnail">
                                <img src="${httppic}${v.path}"alt="..." class="dapic">
                                <ul class="list-group">
                                    <li class="list-group-item"  style="height:20px !important;line-height:50px !important;">
                                       <div>
                                        <img src="${httppic}${v.avatarSrc}" style="width: 26px;height: 26px;border-radius: 50%;" alt="...">
                                        ${v.username}
                                        </div>
                                        <div>
                                        <span class="badge"  >评${v.score}</span>
                                        <span class="badge" >赞${v.score}</span>
                                    </div>
                                       
                                    </li>
                                </ul>
                            </a>
                        </div>`;
                });
                $('#compic').html(str);
            }
        });
    }
    //搜索
    $('#search').click(function () {
        var searchcont = $('#searchcont').val();
        if (searchcont == "") {
            alert('您还没有输入哦~');
        } else {
            $.ajax({
                url: httpurl + 'comphoto/searchComPhoto',
                type: 'post',
                data: {
                    'label': searchcont
                },
                success(res) {
                    console.log(res);
                    if (res.code == 200) {
                        var str = "";
                        var data = res.data;
                        $.each(data, function (i, v) {
                            str += `<div class="col-xs-6 col-md-3" onclick="comyulan(${v.id})">
                            <a href="#" class="thumbnail">
                                <img src="${httppic}${v.path}"alt="..." class="dapic">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge">评${v.score}</span>
                                        <span class="badge">赞${v.score}</span>
                                        <img src="${httppic}${v.avatarSrc}" style="width: 26px;height: 26px;border-radius: 50%;" alt="...">
                                        ${v.username}
                                    </li>
                                </ul>
                            </a>
                        </div>`;
                        });
                        $('#compic').html(str);
                    } else {
                        alert('当前本标签下没有相应图片，我们会尽快完善~');
                    }
                }
            });
        }
    });
    function serchKey(key) {
        $.ajax({
            url: httpurl + 'comphoto/searchComPhoto',
            type: 'post',
            data: {
                'label': key
            },
            success(res) {
                console.log(res);
                if (res.code == 200) {
                    var str = "";
                    var data = res.data;
                    $.each(data, function (i, v) {
                        str += `<div class="col-xs-6 col-md-3" onclick="comyulan(${v.id})">
                            <a href="#" class="thumbnail">
                                <img src="${httppic}${v.path}"alt="..." class="dapic">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge">评${v.score}</span>
                                        <span class="badge">赞${v.score}</span>
                                        <img src="${httppic}${v.avatarSrc}" style="width: 26px;height: 26px;border-radius: 50%;" alt="...">
                                        ${v.username}
                                    </li>
                                </ul>
                            </a>
                        </div>`;
                    });
                    $('#compic').html(str);
                } else {
                    alert('当前本标签下没有相应图片，我们会尽快完善~');
                }
            }
        });
    }
    //预览照片
    function comyulan(id) {
        localStorage.comphotoid = JSON.stringify(id);
        window.location.href = "<?php echo url('index/comyulan'); ?>";
    }
</script>
</body>
</html>
<script src="/shequTp/public/static/index/js/jquery.min.js"></script>
<script src="/shequTp/public/static/index/js/myjs.js"></script>
<script>
    $(function(){
        // $('#imgzz').hide();
        // 获取用户头像用户名
        var user = JSON.parse(localStorage.getItem('user'));
        if(user==undefined){
            $('#userinfo').html("<a href=\"<?php echo url('index/login'); ?>\">登录</a>");
        }else{
            var userlogined = `<a href="">
                                <img src="${httppic}${user.avatarSrc}" class="user-avatar" alt="">
                                <span class="user-name">${user.username}</span>
                            </a>
                            <a href="<?php echo url('index/user_info'); ?>" >&nbsp 修改信息</a>
                            <a href="<?php echo url('index/user_index'); ?>" >&nbsp 我的空间</a>
                            <a href="javascript:;" onclick ="logout()">&nbsp 退出登录</a>`;
            $('#userinfo').html(userlogined);
        }
    });

    //没有登录禁止上传图片
    function upImage(){
        var user = JSON.parse(localStorage.getItem('user'));
        if(user==undefined){
            alert('您还没有登录，请先登录再进行上传~');
            window.location.href="<?php echo url('index/login'); ?>";
        }else{
            window.location.href="<?php echo url('index/new_photo'); ?>";
        }
    }
    //退出登录
    function logout(){
        localStorage.clear();
        location.reload();
    }
</script>