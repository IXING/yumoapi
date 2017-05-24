<?php
namespace Gapi\Controller;
use Think\Controller;
class ContentController extends Controller {
    public function index(){
    	$Data = M('article');// 实例化Data数据模型
    	$cid = I('post.id');
    	
    	$browse = $Data->where("id = {$cid}")->getField('browse');
        $Data->browse = $browse + 1 ;
    	$Data->where("id = {$cid}")->save();
    	
        $result  = $Data->where(" id = {$cid} ")->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    }             
}