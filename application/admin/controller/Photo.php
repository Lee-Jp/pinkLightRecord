<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/3
 * Time: 16:46
 */

namespace app\admin\controller;


use think\Controller;

class Photo extends Controller
{
    public function photolist(){
        $data = db('comphoto')
            ->alias('c')
            ->join('user u','c.user_id=u.uid')
            ->field(['c.*','u.username'])
            ->where('check',"<>",'未审核')
            ->order('id','desc')
            ->select();
        $count = count($data);
        $this->assign('data',$data);
        $this->assign('count',$count);
        return $this->fetch();
    }

    public function photocheck(){
        $data = db('comphoto')
            ->alias('c')
            ->join('user u','c.user_id=u.uid')
            ->field(['c.*','u.username'])
            ->where('check',"=",'未审核')
            ->order('id','desc')
            ->select();
        $count = count($data);
        $this->assign('data',$data);
        $this->assign('count',$count);
        return $this->fetch();
    }

    public function photoedity($id){
        $rs =db('comphoto')
            ->where('id',$id)
            ->update(['check' => '审核通过']);
        if($rs){
            $this->success('修改成功','photo/photocheck');
        }else{
            $this->error('修改失败');
        }
    }
    public function photoeditn($id){
        $rs =db('comphoto')
            ->where('id',$id)
            ->update(['check' => '审核未通过']);
        if($rs){
            $this->success('修改成功','photo/photocheck');
        }else{
            $this->error('修改失败');
        }
    }
    public  function  del($id){
        $data = db('comphoto')->delete($id);
        if($data){
            $this->success('删除成功','photo/photolist');
        }else{
            $this->error('删除失败');
        }
    }
}