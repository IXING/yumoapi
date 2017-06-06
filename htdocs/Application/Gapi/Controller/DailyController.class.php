<?php
namespace Gapi\Controller;
use Think\Controller;
class DailyController extends Controller {
    public function index(){
    	$Data     = M('daily');// 实例化Data数据模型
        $result  = $Data->order('id desc')->limit(0,1)->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    }   
    public function detaile(){
    	$Data = M('daily');// 实例化Data数据模型
    	$cid = I('post.id');

        $browse = $Data->where("id = {$cid}")->getField('browse');
        $Data->browse = $browse + 1 ;
    	$Data->where("id = {$cid}")->save();    	
    	
//      $result  = $Data->limit(0,1)->select();
        $result  = $Data->where(" id = {$cid} ")->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
        

    }    
    public function olist(){
    	$Data = M('daily');// 实例化Data数据模型
        $fist = I('post.first');
        $last = I('post.last');
        $result  = $Data->order('id desc')->limit($fist,$last)->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    } 
    public function two(){
    	$Data = M('daily');// 实例化Data数据模型
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid}")->select();
        $this->ajaxReturn($result);
    }             
}