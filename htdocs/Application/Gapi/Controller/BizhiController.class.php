<?php
namespace Gapi\Controller;
use Think\Controller;
class BizhiController extends Controller {  
    public function index(){
    	$Data = M('bizhi');// 实例化Data数据模型
    	$cid = I('post.id');
        $result  = $Data->where(" id = {$cid} ")->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    } 
    public function olist(){
    	$Data = M('bizhi');// 实例化Data数据模型
        $fist = I('post.first');
        $last = I('post.last');
        $result  = $Data->order('id desc')->limit($fist,$last)->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    } 
    public function two(){
    	$Data = M('bizhi');// 实例化Data数据模型
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid}")->select();
        $this->ajaxReturn($result);
    }             
}