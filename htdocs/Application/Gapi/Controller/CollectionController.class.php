<?php
namespace Gapi\Controller;
use Think\Controller;
class CollectionController extends Controller {
    public function index(){
    	$Data = M('collection');// 实例化Data数据模型
    	$uesr_id = I('post.uesr_id');
    	$fist = I('post.first');
        $last = I('post.last');
        $result  = $Data->order('id desc')->where("user_id = '{$uesr_id}' ")->limit($fist,$last)->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    } 
    public function addcollection(){
        $Data = M('collection');// 实例化Data数据模型
		$user_id = I('post.user_id');
		$content_id = I('post.content_id');
        $Data->user_id  =  $user_id;
        $Data->content_id  =  $content_id;
        $Data->add();
        
    	$Dataa = M('user');// 实例化Data数据模型
    	$focus = $Dataa->where("id = {$user_id}")->getField('focus');
        $Dataa->focus = $focus + 1 ;
    	$Dataa->where("id = {$user_id}")->save();         
    }   
//  判断是否收藏             
    public function addpd(){
        $Data = M('collection');// 实例化Data数据模型
		$user_id = I('post.user_id');
		$content_id = I('post.content_id');
        $result  = $Data->where("user_id = '{$user_id}' and content_id = '{$content_id}' ")->select();
        $this->ajaxReturn($result);
    }                
//  判断是否收藏             
    public function delet(){
        $Data = M('collection');// 实例化Data数据模型
		$user_id = I('post.user_id');
		$content_id = I('post.content_id');
//      $delet_id  = $Data->where("user_id = '{$user_id}' and content_id = '{$content_id}' ")->getField('id');
        $Data->where("user_id = '{$user_id}' and content_id = '{$content_id}' ")->delete();
//      $User->where('status=1 and id=1')->delete();
//      $this->ajaxReturn($result);
    	$Dataa = M('user');// 实例化Data数据模型
    	$focus = $Dataa->where("id = {$user_id}")->getField('focus');
        $Dataa->focus = $focus - 1 ;
    	$Dataa->where("id = {$user_id}")->save();         

    }                
}