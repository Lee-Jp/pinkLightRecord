<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:89:"F:\phpStudy\PHPTutorial\WWW\shequTp\public/../application/index\view\index\user_info.html";i:1557835504;s:70:"F:\phpStudy\PHPTutorial\WWW\shequTp\application\index\view\layout.html";i:1564554189;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="/shequTp/public/static/index/css/style.css"/>
<link rel="stylesheet" type="text/css" href="/shequTp/public/static/index/css/bootstrap.css"/>
<script type="text/javascript" src="/shequTp/public/static/index/js/jquery.min.js"></script>
		<script type="text/javascript" src="/shequTp/public/static/index/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/shequTp/public/static/webuploader/webuploader.css">
	<!--第二导航栏-->
	<div class="secondaryNav ">
        <ul class="nav-list">
            <li><a href="user_info.html" class="collapse">我的资料</a></li>

        </ul>
   </div>
   <div class="container">
	   <form action="<?php echo url('index/updataUserInfo'); ?>" method="post" enctype="multipart/form-data">
           <!--隐藏的用户id-->
           <div id="user_id"></div>
            <div class="form-inline">
                <div class="col-sm-1">头像</div>
                    <div class="col-sm-6">
                   <div id="picker" >选择文件</div>
                   <!--隐藏的图片路径-->
                   <div id="upcachephoto"></div>
                   <!--图片预览-->
                   <img src="" id="avatar" style="width: 200px;">
               </div>
            </div>
            <div class="form-inline mt-2">
                <div class="col-sm-1">性别</div>
                <div class="col-sm-6">
			   <select class="form-control w-100" name="sex" >
				   <option value="男">男</option>
				   <option value="女" >女</option>
			   </select>
		   </div>
            </div>
			<div class="form-inline mt-3">
	                <div class="col-sm-1">生日</div>
	                <div class="col-sm-6"><input type="date" class="form-control w-100" id="" name="birthday"/></div>
	            </div>
			<div class="form-inline mt-3">
	                <div class="col-sm-1">城市</div>
	                <div class="col-sm-6"><input type="text" class="form-control w-100" id="" name="city"/></div>
	            </div>
			 <div class="form-inline mt-3">
	                <div class="col-sm-1">个人简介</div>
	                <div class="col-sm-6"><textarea name="intro" rows="" cols="15" class="form-control w-100" ></textarea></div>
	            </div>
            <div class="form-inline mt-3">
                <div class="offset-sm-2">
                    <input type="submit" value="修改" class="btn newBtn"/>
                </div>
            </div>
        </form>
	</div>
<script src="/shequTp/public/static/index/js/jquery.min.js"></script>
<script src="/shequTp/public/static/index/js/myjs.js"></script>
<script type="text/javascript" src="/shequTp/public/static/webuploader/webuploader.js"></script>
<script>
    $(function(){
        // 获取用户信息放到表单中
        var user = JSON.parse(localStorage.getItem('user'));
            var userlogined = `<input type="hidden" value="${user.uid}" name="user_id">`;
            $('#user_id').html(userlogined);
    });
    var uploader = WebUploader.create({
        auto: true,
        // swf文件路径
        swf: '/shequTp/public/static/webuploader/js/Uploader.swf',
        // 文件接收服务端。
        server: '<?php echo url("upcache/uploadcache"); ?>',
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#picker',
        // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
        resize: false,
        // 设置文件上传域的name
        fileVal: 'path',
        // 只允许选择图片文件。
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
        }
    });
    // 回调事件
    uploader.on('uploadSuccess', function ($file, response) {
        var upcachehttp = httppic + response.msg;
        if (response.status == 0) {
            $('#avatar').attr('src',upcachehttp).show('slow');
            //把预览图片放到隐藏表单中
            var upcachephoto = `<input type="hidden" value="${response.msg}" name="avatarSrc">`;
            console.log(upcachephoto);
            $('#upcachephoto').html(upcachephoto);
        }
    });
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