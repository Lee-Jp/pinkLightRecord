<?php


namespace app\admin\controller;

class User extends BaseController
{
    public function  Userlist(){
        $data = db('User')->select();
        $count = count($data);
        $this->assign('data',$data);
        $this->assign('count',$count);
        return $this->fetch();
    }
    public  function  del($uid){
        $data =db('user')->delete($uid);
        if($data){
            $this->success('删除成功','User/Userlist');
        }else{
            $this->error('删除失败');
        }
    }

}