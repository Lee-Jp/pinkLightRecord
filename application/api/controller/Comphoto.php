<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/8
 * Time: 14:48
 */

namespace app\api\controller;


use think\Controller;

class Comphoto extends Controller
{
    //获取所有图片接口
    public function ajaxGetComphoto(){
        $res = db('comphoto')
            ->alias('c')
            ->join('user u','c.user_id=u.uid')
            ->order('id desc')//根据id降序排列
            ->where('check',"=",'审核通过')
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
    //获取关注的人发表的图片
    public function ajaxGetComFollowphoto(){
        $user_id = input('post.user_id');
        $res = db('comphoto')
            ->alias('c')
            ->join('user u','c.user_id=u.uid')
            ->join('focus f','f.friend_id=u.uid')
            ->where('f.user_id',$user_id)
            ->field(['c.*','u.username','u.avatarSrc'])
            ->order('c.id desc')//根据id降序排列
            ->select();
        if(!empty($res)){
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
    //获取专业（手动档）照片
    public function ajaxGetComMajorphoto(){
        $res = db('comphoto')
            ->alias('c')
            ->join('user u','c.user_id=u.uid')
            ->where('c.state','手动档')
            ->field(['c.*','u.username','u.avatarSrc'])
            ->order('c.id desc')//根据id降序排列
            ->select();
        if(!empty($res)){
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
    //获取图片内容
    public function ajaxGetComphotoCont(){
        $id = input('post.id');
        $res = db('comphoto')
            ->alias('c')
            ->join('user u','c.user_id=u.uid')
            ->where('id',$id)
            ->order('id desc')//根据id降序排列
            ->field(['c.*','u.username','u.avatarSrc'])
            ->select();
        if(!empty($res)){
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
    //获取标签对应图片
    public function searchComPhoto(){
        $label = input('post.label');
        $res = db('comphoto')
            ->alias('c')
            ->join('user u','c.user_id=u.uid')
            ->field(['c.*','u.username','u.avatarSrc'])
            ->where('label','like','%'.$label.'%')
            ->order('id','desc')
            ->select();
        if(!empty($res)){
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
    //点赞同时记录喜欢
    public function lickComPhoto(){
        $user_id = input('post.user_id');
        $photo_id = input('post.photo_id');
        $res = db('collectioin')
            ->where('user_id',$user_id)
            ->where('photo_id',$photo_id)
            ->find();
        if(empty($res)){
//            插入收藏表
            db('collectioin')->insert(['user_id' => $user_id, 'photo_id' => $photo_id]);
//            计算点赞数并保存
            $score = db('comphoto')->where('id',$photo_id)->field('score')->find();
            $newscore = array_sum($score) + 1;
            db('comphoto')->where('id',$photo_id)->update(['score' => $newscore]);
            $ret =[
                'code' => 200,
                'score' =>$newscore,
                'msg' => '收藏成功'
            ];
            return json($ret);
        }else{
            $ret =[
                'code' => 202,
                'msg' => '您已收藏，请不要重复操作'
            ];
            return json($ret);
        }
    }
    //关注
    public function followUser(){
        $user_id = input('post.user_id');
        $friend_id = input('post.friend_id');
        $res = db('focus')
            ->where('user_id',$user_id)
            ->where('friend_id',$friend_id)
            ->find();
        if(empty($res)){
//            插入数据
            db('focus')->insert(['user_id' => $user_id, 'friend_id' => $friend_id]);
            $ret =[
                'code' => 200,
                'msg' => '关注成功'
            ];
            return json($ret);
        }else{
            $ret =[
                'code' => 202,
                'msg' => '您已关注，请不要重复操作'
            ];
            return json($ret);
        }
    }
    //判断是否关注
    public function isFollowUser(){
        $user_id = input('post.user_id');
        $friend_id = input('post.friend_id');
        $res = db('focus')
            ->where('user_id',$user_id)
            ->where('friend_id',$friend_id)
            ->find();
        if(!empty($res)){
            $ret =[
                'code' => 200,
                'msg' => '已关注'
            ];
            return json($ret);
        }else{
            $ret =[
                'code' => 202,
                'msg' => '关注'
            ];
            return json($ret);
        }
    }
}