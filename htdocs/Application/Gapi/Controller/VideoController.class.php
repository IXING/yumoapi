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
    	
    	//浏览量加一
    	$User = M('video');
    	$ubrowse = $User->where("id = {$inid}")->getField('browse');//获取作者人气
        $User->browse = $ubrowse + 1 ;
    	$User->where("id = {$inid}")->save();

        $result  = $Data->where("inid = {$inid}")->select();
        $this->ajaxReturn($result);
    }
	//  获取浏览量评论赞个数
    public function contentna(){
    	$Data = M('video');// 实例化Data数据模型
    	$inid = I('post.content_id');
        $result  = $Data->where("id = {$inid}")->select();
        $this->ajaxReturn($result);
    }
    public function icontent(){
    	$Data = M('video');// 实例化Data数据模型
    	$oid = I('post.oid');
    	
    	    	//浏览量加一
    	$User = M('video');
    	$ubrowse = $User->where("id = {$oid}")->getField('browse');//获取作者人气
        $User->browse = $ubrowse + 1 ;
    	$User->where("id = {$oid}")->save();

    	
        $result  = $Data->where("id = {$oid}")->select();
        $this->ajaxReturn($result);
        
        
    }   
    public function zan(){
        $Data = M('video');// 实例化Data数据模型
        $id = I('post.id');
        // 获取标题 
        $zan = $Data->where("id = {$id}")->getField('zan');
        $Data->zan= $zan + 1 ;
        $Data->where("id = {$id}")->save(); // 根据条件保存修改的数据      
    }                          
}