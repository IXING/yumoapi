<?php
namespace Gapi\Controller;
use Think\Controller;
class VideoController extends Controller {
//  社区文章
    public function index(){
    	$Data = M('video');// 实例化Data数据模型
    	$type = I('post.type');
        $fist = I('post.first');
        $last = I('post.last');
        $result  = $Data->where("type = '$type'")->order('id desc')->limit($fist,$last)->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result); 
    }   
    public function updata(){
    	$Data = M('video');// 实例化Data数据模型
    	$type = I('post.type');
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid} and type = '$type'")->select();
        $this->ajaxReturn($result);
    }
    public function content(){
    	$Data = M('video');// 实例化Data数据模型
    	$inid = I('post.inid');
//  	$inresult  = $Data->where(" inid = {$inid}")->min('id');
//      $result  = $Data->where(" id = {$inresult}")->select();

//  	$inresult  = $Data->where(" inid = {$inid}")->min('id');
        $result  = $Data->where("inid = {$inid}")->select();
        $this->ajaxReturn($result);
    }                     
}