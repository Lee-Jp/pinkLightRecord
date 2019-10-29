<?php

namespace app\index\controller;


use think\Controller;
use think\Validate;

class Index extends BaseController
{
//    首页
    public function index(){
        return view();
    }
//    登录
    public function login(){
        return view();
    }
//    注册
    public function register(){
        return view();
    }
    //忘记密码
    public function forgetlogin(){
        return view();
    }
//    用户信息
    public function user_info(){
        return view();
    }
    //    个人中心
    public function user_index(){
        return view();
    }
    //    我的喜欢
    public function user_like(){
        return view();
    }
//    上传社区图片
    public function new_photo(){
        return view();
    }
//    社区图片预览
    public function comyulan(){
        return view();
    }
//    用户相册
    public function member_photo(){
        return view();
    }
//    创建用户相册
    public function member_createphoto(){
        return view();
    }
//    用户上传个人相册
    public function member_uploadphoto(){
        return view();
    }
//    用户上传个人相册图片
    public function member_uploadphotocont(){
        return view();
    }
    //    用户评论接收
    public function msg_comment(){
        return view();
    }
    //    用户收藏喜欢接收
    public function msg_like(){
        return view();
    }
    //    用户关注界面
    public function followuser(){
        return view();
    }
    //    用户自己相册图片打开界面
    public function myphotoyulan(){
        return view();
    }
    //    用户预览我的喜欢
    public function user_likeyulan(){
        return view();
    }
    //上传社区图片
    public function upload_comphoto(){
        $validate = new Validate([
            'title'  => 'require',
            'label' => 'require',
        ]);
        $data = input('post.');
        if (!$validate->check($data)) {
            $this->error('您输入的信息不完整，请完整填写');
        }else{
            $creat_time = date("Y-m-d");
            $data['creat_time'] = $creat_time;
            dump($data);
            if(db('comphoto')->insert($data)){
                $this->success('添加成功','index/new_photo');
            }else{
                $this->error('添加失败');
            }
        }
    }

//创建个人相册
    public function create_myphoto(){
        $validate = new Validate([
            'name' => 'require'
        ]);
        $data = input('post.');
        if (!$validate->check($data)) {
            $this->error('您输入的信息不完整，请完整填写');
        }else{
            $file =request()->file('path');
            $pic = $this->upload($file);
            $data['path'] = $pic;
            $creat_time = date("Y-m-d");
            $data['creat_time'] = $creat_time;
            if(db('album')->insert($data)){
                $this->success('添加成功','index/member_photo');
            }else{
                $this->error('添加失败');
            }
        }

    }
//上传个人相册图片
    public function member_uploadphotocontpic(){
        $validate = new Validate([
            'name' => 'require'
        ]);
        $data = input('post.');
        if (!$validate->check($data)) {
            $this->error('您输入的信息不完整，请完整填写');
        }else{
            $creat_time = date("Y-m-d");
            $data['create_time'] = $creat_time;
            if(db('photo')->insert($data)){
                $this->success('上传成功','index/member_uploadphoto');
            }else{
                $this->error('添加失败');
            }
        }
    }
    //修改个人信息
    public function updataUserInfo(){
        $validate = new Validate([
            'intro' => 'require'
        ]);
        $data = input('post.');
        if (!$validate->check($data)) {
            $this->error('您输入的信息不完整，请完整填写');
        }else{
            db('user')->where('uid',$data['user_id'])->update(['avatarSrc' => $data['avatarSrc']]);
            $useri = db('userinfo')->where('user_id',$data['user_id'])->find();
            unset($data['avatarSrc']);
            if(empty($useri)){
                db('userinfo')->insert($data);
                $this->success('保存成功，请重新登陆','index/login');
            }else{
                db('userinfo')->where('user_id',$data['user_id'])->update($data);
                $this->success('修改成功，请重新登录','index/login');
            }
        }
    }
}