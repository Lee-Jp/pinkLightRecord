<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/30
 * Time: 9:13
 */

namespace app\api\controller;


use think\Controller;

class Comment extends Controller
{
    //会员评论接口
    public function ajaxUserComment(){
        $data = input('post.');
        $data['create_time']=date("Y-m-d");
        $res = db('comment')->insert($data);
        if($res!=""){
            $ret =[
                'code' => 200,
                'data' => $data,
                'msg' => '评论成功'
            ];
            return json($ret);
        }else{
            $ret =[
                'code' => 202,
                'data' => $data,
                'msg' => '评论失败'
            ];
            return json($ret);
        }
    }
    //获取评论接口
    public function ajaxGetComment(){
        $photo_id = input('post.photo_id');
        $res = db('comment')
            ->alias('c')
            ->join('user u','c.user_id=u.uid')
            ->field(['c.*','u.username','u.avatarSrc'])
            ->where('photo_id',$photo_id)
            ->order('id','desc')
            ->select();
        if($res!=""){
            $ret =[
                'code' => 200,
                'commentdata' => $res,
                'msg' => '获取成功'
            ];
            return json($ret);
        }else{
            $ret =[
                'code' => 202,
                'commentdata' => $res,
                'msg' => '获取失败'
            ];
            return json($ret);
        }
    }
    //获取评论消息接口
    public function ajaxGetMsgComment(){
        $user_id = input('post.user_id');
        $res = db('comphoto')
            ->alias('c')
            ->join('comment com','c.id=com.photo_id')
            ->join('user u','com.user_id=u.uid')
            ->field(['c.id','c.title','com.content','com.create_time','u.username','u.avatarSrc'])
            ->where('c.user_id',$user_id)
            ->order('com.id','desc')
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
    //获取收藏喜欢消息接口
    public function ajaxGetMsgLike(){
        $user_id = input('post.user_id');
        $res = db('comphoto')
            ->alias('c')
            ->join('collectioin co','c.id=co.photo_id')
            ->join('user u','co.user_id=u.uid')
            ->field(['c.id','c.title','c.path','u.username','u.avatarSrc'])
            ->where('c.user_id',$user_id)
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