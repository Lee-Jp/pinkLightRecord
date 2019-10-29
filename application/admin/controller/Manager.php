<?php


namespace app\admin\controller;

use think\Db;
use think\Controller;

class Manager extends  Controller
{
    public function  managerlist(){
        $data = model('Manager')->select();
        $count = count($data);
        $this->assign('data',$data);
        $this->assign('count',$count);
        return $this->fetch();
    }
    public  function  manageradd(){
        $manager = new \app\admin\model\Manager();
        $data = input('post.');
        if(!empty($data)){
            $password = md5($data['password']);
            $data['password'] = $password;
            $rs = $manager->save($data);
            if($rs){
                $this->success('添加成功','manager/managerlist');
            }else{
                $this->error('添加失败');
            }
        }else{
            return $this->fetch();
        }
    }

    public function manageredit($id){
        $manager = new \app\admin\model\Manager();
        $data = input('post.');
        if(!empty($data)){
            $password = md5($data['password']);
            $data['password'] = $password;
            $rs =$manager->where('id',$data['id'])->find()->save($data);
            if($rs){
                $this->success('修改成功','manager/managerlist');
            }else{
                $this->error('修改失败');
            }
        }else{
            $data  = $manager->where('id',$id)->find();
            $this->assign('data',$data);
            return $this->fetch();
        }
    }
    public  function  del($id){
        $data = model('Manager')->where('id',$id)->find()->delete();
        if($data){
            $this->success('删除成功','manager/managerlist');
        }else{
            $this->error('删除失败');
        }
    }
}
