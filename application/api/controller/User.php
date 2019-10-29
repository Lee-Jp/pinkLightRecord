<?php


namespace app\api\controller;


use think\Controller;
use think\Db;
header("Access-Control-Allow-Origin: *");
class User extends Controller
{
    //会员注册接口
    public function ajaxRegisterUser(){
        $data = input('post.');
        $data['password'] = md5($data['password']);
        $res = Db::name('user')->insert($data);
        if(!empty($res)){
                $ret =[
                    'code' => 200,
                    'data' => $data,
                    'msg' => '注册成功'
                ];
                return json($ret);
        }else{
            $ret =[
                'code' => 202,
                'data' => $data,
                'msg' => '注册失败'
            ];
            return json($ret);
        }
    }
    //会员登录接口
    public function ajaxLoginUser(){
        $email = input('post.email');
        $password = input('post.password');
        $data = Db::name('user')->where("email" , $email)->find();
        if(!empty($data)){
            if($data['password'] == md5($password) ){
                $ret =[
                    'code' => 200,
                    'data' => $data,
                    'msg' => '登录成功'
                ];
                return json($ret);
            }else{
                $ret =[
                    'code' => 202,
                    'data' => $data,
                    'msg' => '邮箱或密码错误'
                ];
                return json($ret);
            }
        }else{
            $ret =[
                'code' => 202,
                'data' => $data,
                'msg' => '登录失败'
            ];
            return json($ret);
        }
    }
    //会员重置密码
    public function ajaxforgetlogin(){
        $email = input('post.email');
        $password = input('post.password');
        $question= input('post.question');
        $answer = input('post.answer');
        $data = Db::name('user')
            ->where("email" , $email)
            ->where("question" , $question)
            ->where("answer" , $answer)
            ->find();
        if(!empty($data)){
            $passwordn = md5($password);
            $res = Db::name('user')->where("email" , $email)->update(['password' => $passwordn]);
                $ret =[
                    'code' => 200,
                    'data' => $data,
                    'msg' => '登录成功'
                ];
                return json($ret);
        }else{
            $ret =[
                'code' => 202,
                'data' => $data,
                'msg' => '登录失败'
            ];
            return json($ret);
        }
    }
    //会员APP完善信息接口
    public function ajaxUserInformation(){
        $data = input('post.');
        $res = Db::name('user')->where('uid',$data['uid'])->update($data);
        if(!empty($res)){
            $ret =[
                'code' => 200,
                'data' => $data,
                'msg' => '完善成功'
            ];
            return json($ret);
        }else{
            $ret =[
                'code' => 202,
                'data' => $data,
                'msg' => '完善失败'
            ];
            return json($ret);
        }
    }
    //获取关注的人
    public function ajaxGetFollowUser(){
        $user_id = input('post.user_id');
        $res = db('focus')
            ->alias('f')
            ->join('user u','f.friend_id=u.uid')
            ->field(['u.username','f.friend_id','u.avatarSrc'])
            ->where('f.user_id',$user_id)
            ->order('f.id','desc')
            ->select();
        if($res!=""){
            $ret =[
                'code' => 200,
                'data' => $res,
                'msg' => '获取成功'
            ];
            return json($ret);
        }else{
            $ret =[
                'code' => 202,
                'data' => $res,
                'msg' => '获取失败'
            ];
            return json($ret);
        }
    }
    //取消关注
    public function ajaxDelFollowUser(){
        $user_id = input('post.user_id');
        $friend_id = input('post.friend_id');
        dump($user_id,$friend_id);
        $res = db('focus')
            ->where('user_id',$user_id)
            ->where('friend_id',$friend_id)
            ->delete();
        if($res!=""){
            $ret =[
                'code' => 200,
                'data' => $res,
                'msg' => '删除成功'
            ];
            return json($ret);
        }else{
            $ret =[
                'code' => 202,
                'data' => $res,
                'msg' => '删除失败'
            ];
            return json($ret);
        }
    }
    //个人中心获取所有图片接口
    public function ajaxGetComphoto(){
        $user_id = input('post.user_id');
        $res = db('comphoto')
            ->alias('c')
            ->join('user u','c.user_id=u.uid')
            ->where('user_id',$user_id)
            ->order('id desc')//根据id降序排列
            ->field(['c.*','u.username','u.avatarSrc'])
            ->select();
        if($res!=""){
            $ret =[
                'code' => 200,
                'data' => $res,
                'msg' => '获取成功'
            ];
            return json($ret);
        }else{
            $ret =[
                'code' => 202,
                'data' => $res,
                'msg' => '获取失败'
            ];
            return json($ret);
        }
    }
    //获取我的喜欢图片
    public function ajaxGetMyLike(){
        $user_id = input('post.user_id');
        $res = db('comphoto')
            ->alias('c')
            ->join('collectioin co','c.id=co.photo_id')
            ->join('user u','c.user_id=u.uid')
            ->field(['c.id','c.title','c.path','c.score','u.username','u.avatarSrc'])
            ->where('co.user_id',$user_id)
            ->order('co.id','desc')
            ->select();
        if($res!=""){
            $ret =[
                'code' => 200,
                'data' => $res,
                'msg' => '获取成功'
            ];
            return json($ret);
        }else{
            $ret =[
                'code' => 202,
                'data' => $res,
                'msg' => '获取失败'
            ];
            return json($ret);
        }
    }
}