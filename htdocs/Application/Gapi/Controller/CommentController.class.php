<?php
namespace Gapi\Controller;
use Think\Controller;
class CommentController extends Controller {
    public function index(){
    	$Data = M('comment');// 实例化Data数据模型
        $content_id = I('post.content_id');
        $last = I('post.last');
        $fist = I('post.first');
        $result  = $Data->where("content_id = {$content_id} and type = '1'")->order('id desc')->limit($fist,$last)->select();
        $this->ajaxReturn($result);
    }
    public function two(){
        $Data = M('comment');// 实例化Data数据模型
        $content_id = I('post.content_id');
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid} and content_id = {$content_id}  and type = '1'")->select();
        $this->ajaxReturn($result);  
    }   
    public function videoindex(){
    	$Data = M('comment');// 实例化Data数据模型
        $content_id = I('post.content_id');
        $last = I('post.last');
        $fist = I('post.first');
        $result  = $Data->where("content_id = {$content_id} and type = '2'")->order('id desc')->limit($fist,$last)->select();
        $this->ajaxReturn($result);
    }
    public function videotwo(){
        $Data = M('comment');// 实例化Data数据模型
        $content_id = I('post.content_id');
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid} and content_id = {$content_id}  and type = '2'")->select();
        $this->ajaxReturn($result);  
    }      
    public function update(){
        $Data = M('comment');// 实例化Data数据模型
        $id = I('post.id');
        // 获取标题 
        $zan = $Data->where("id = {$id}")->getField('zan');
        $Data->zan= $zan + 1 ;
        $Data->where("id = {$id}")->save(); // 根据条件保存修改的数据      
    }
    public function addcomment(){
        $Data = M('comment');// 实例化Data数据模型
		$content_id = I('post.content_id');
		$user_id = I('post.user_id');
		$time = I('post.time');
		$content = I('post.content');
		$zan = I('post.zan');
		$type = I('post.type');
		$user_img = I('post.user_img');
		$user_name = I('post.user_name');        
        $Data->content_id  =  $content_id;
        $Data->user_id  =  $user_id;
        $Data->time  =  $time;
        $Data->content  =  $content;
        $Data->zan  =  $zan;
        $Data->type  =  $type;
        $Data->user_img  =  $user_img;
        $Data->user_name  =  $user_name;
        $Data->add();
        
    	$Dataa = M('article');// 实例化Data数据模型
    	$comments = $Dataa->where("id = {$content_id}")->getField('comments');
        $Dataa->comments = $comments + 1 ;
    	$Dataa->where("id = {$content_id}")->save();        
        
        
        
        
    }
    public function newcomment(){
        $Data = M('comment');// 实例化Data数据模型
        $mid = I('post.mid');
        $content_id = I('post.content_id');
        $type = I('post.type');
        $result  = $Data->where("content_id = {$content_id} and id > {$mid} and type = {$type}")->select();
        $this->ajaxReturn($result);
    }             
}