<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/12
 * Time: 17:14
 */

namespace app\index\controller;


class Upcache extends BaseController
{
    //所有图片暂存
    public function uploadcache(){
        $file =request()->file('path');
        $pic = $this->upload($file);
        if(db('upcache')->insert(['path' => $pic])){
            return json(['status' => 0, 'msg' => $pic]);
        }else{
            return json(['status' => 1, 'msg' => $file->getError()]);
        }
    }
}