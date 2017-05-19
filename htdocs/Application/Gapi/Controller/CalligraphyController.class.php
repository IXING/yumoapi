<?php
namespace Gapi\Controller;
use Think\Controller;
class CalligraphyController extends Controller {  
    public function olist(){
    	$Data = M('article');// 实例化Data数据模型
        $fist = I('post.first');
        $last = I('post.last');
        $result  = $Data->where("type = '2'")->order('id desc')->limit($fist,$last)->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    } 
    public function two(){
    	$Data = M('article');// 实例化Data数据模型
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid} and type = '2'")->select();
        $this->ajaxReturn($result);
    }             
}