<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/9
 * Time: 19:21
 */

namespace app\api\controller;


use think\Controller;

class Myphoto extends Controller
{
    //获取自己的相册
    public function ajaxGetMyPhoto(){
        $user_id = input('post.user_id');
        $res = db('album')
            ->where('user_id',$user_id)
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
    //获取自己相册图片
    public function ajaxGetMyPhotoCont(){
        $album_id = input('post.album_id');
        $res = db('photo')
            ->where('album_id',$album_id)
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
    //获取图片内容
    public function ajaxYulan(){
        $id = input('post.id');
        $res = db('photo')
            ->where('id',$id)
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
    //删除相册
    public function dataleMyPhoto(){
        $id = input('post.id');
        $res = db('album')->delete($id);
        //同时删除相册里边的图片
        db('photo')->where('album_id',$id)->delete();
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
    //删除相册里边的图片
    public function dataleMyPhotoCont(){
        $id = input('post.id');
        $res = db('photo')->delete($id);
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
    //删除我的图文
    public function dataleMyTuWen(){
        $id = input('post.id');
        db('collectioin')->where('photo_id',$id)->delete();
        db('comment')->where('photo_id',$id)->delete();
        $res = db('comphoto')->delete($id);
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
}