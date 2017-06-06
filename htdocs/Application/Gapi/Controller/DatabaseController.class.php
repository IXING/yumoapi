<?php
namespace Gapi\Controller;
use Think\Controller;
class DatabaseController extends Controller {
    public function index(){
    	$Data = M('database');// 实例化Data数据模型
        $type = I('post.type');
        $fist = I('post.first');
        $last = I('post.last');
        $result  = $Data->where("type = '{$type}'")->order('id desc')->limit($fist,$last)->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    } 
  
    public function two(){
    	$Data = M('database');// 实例化Data数据模型
        $type = I('post.type');
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid} and type = '{$type}'")->select();
        $this->ajaxReturn($result);
    }
	
	
    public function news(){
    	$Data = M('database');// 实例化Data数据模型
        $fist = I('post.first');
        $last = I('post.last');
        $result  = $Data->limit($fist,$last)->order('id desc')->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    } 

    
	public function content(){
	    	$Data = M('database');// 实例化Data数据模型
	    	$cid = I('post.id');
	    	
	    	//浏览量加一
	    	$browse = $Data->where("id = {$cid}")->getField('browse');
	        $Data->browse = $browse + 1 ;
	    	$Data->where("id = {$cid}")->save();
	    	
	    	
	        $result  = $Data->where(" id = {$cid} ")->select();
	        header('Content-Type:application/json; charset=utf-8'); 
	        $this->ajaxReturn($result);
	} 
//	收藏列表添加数据      
	public function content2(){
	    	$Data = M('database');// 实例化Data数据模型
	    	$cid = I('post.id');
	    	
	    	
	        $result  = $Data->where(" id = {$cid} ")->select();
	        header('Content-Type:application/json; charset=utf-8'); 
	        $this->ajaxReturn($result);
	}       

	
	//诗词列表
	public function index2(){
    	$Data = M('database');// 实例化Data数据模型

       $duilian = I('post.duilian');
       $shici = I('post.shici');
       $sizi = I('post.sizi');
       $liangzi = I('post.liangzi');
       $danzi = I('post.danzi');
       $qita = I('post.qita');
        
        $name = '';
      
        
        if($duilian == '1'){
        	$name = 'duilian';
        }else if($shici == '1'){
        	$name = 'shici';
        }else if($sizi == '1'){
        	$name = 'sizi';
        }else if($liangzi == '1'){
        	$name = 'liangzi';
        }else if($danzi == '1'){
        	$name = 'danzi';
        }else if($qita == '1'){
        	$name = 'qita';
        }
        
        
        $fist = I('post.first');
        $last = I('post.last');
        $result  = $Data->where("$name = '1' ")->order('id desc')->limit($fist,$last)->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    } 
  
  
    public function twow(){
    	$Data = M('database');// 实例化Data数据模型
       $duilian = I('post.duilian');
       $shici = I('post.shici');
       $sizi = I('post.sizi');
       $liangzi = I('post.liangzi');
       $danzi = I('post.danzi');
       $qita = I('post.qita');
        
        $name = '';
      
        
        if($duilian == 1){
        	$name = 'duilian';
        }else if($shici == 1){
        	$name = 'shici';
        }else if($sizi == 1){
        	$name = 'sizi';
        }else if($liangzi == 1){
        	$name = 'liangzi';
        }else if($danzi == 1){
        	$name = 'danzi';
        }else if($qita == 1){
        	$name = 'qita';
        }        
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid} and $name = '1' ")->select();
        $this->ajaxReturn($result);
    }
                       
}

