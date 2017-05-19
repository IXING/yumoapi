<?php
namespace Gapi\Controller;
use Think\Controller;
class CommentController extends Controller {
    public function index(){
    	$Data = M('comment');// 实例化Data数据模型
        $contentid = I('post.contentid');
        $last = I('post.last');
        $fist = I('post.first');
        $result  = $Data->where("contentid = {$contentid} and type = '1'")->order('id desc')->limit($fist,$last)->select();
        $this->ajaxReturn($result);
    }
    public function two(){
        $Data = M('comment');// 实例化Data数据模型
        $contentid = I('post.contentid');
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid} and contentid = {$contentid}  and type = '1'")->select();
        $this->ajaxReturn($result);  
    }   
    public function videoindex(){
    	$Data = M('comment');// 实例化Data数据模型
        $contentid = I('post.contentid');
        $last = I('post.last');
        $fist = I('post.first');
        $result  = $Data->where("contentid = {$contentid} and type = '2'")->order('id desc')->limit($fist,$last)->select();
        $this->ajaxReturn($result);
    }
    public function videotwo(){
        $Data = M('comment');// 实例化Data数据模型
        $contentid = I('post.contentid');
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid} and contentid = {$contentid}  and type = '2'")->select();
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
        $leixing = I('post.leixing');
        $aid = I('post.aid');
        $time = I('post.time');
        $name = I('post.name');
        $iimg = I('post.iimg');
        $zan = I('post.zan');
        $addcontent = I('post.addcontent');
        
        $Data->leixing  =  $leixing;
        $Data->inid  =  $aid;
        $Data->time  =  $time;
        $Data->name  =  $name;
        $Data->iimg  =  $iimg;
        $Data->zan  =  $zan;
        $Data->dtaile    =  $addcontent;
        $Data->add();
    }
    public function newcomment(){
        $Data = M('comment');// 实例化Data数据模型
        $leixing = I('post.leixing');
        $mid = I('post.mid');
        $inid = I('post.inid');
        $result  = $Data->where("inid = {$inid} and id > {$mid} and leixing = '$leixing'")->select();
        $this->ajaxReturn($result);
    }             
}