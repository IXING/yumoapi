<?php
namespace Gapi\Controller;
use Think\Controller;
class PictureController extends Controller {
    public function index(){
    	$Data = M('picture');// 实例化Data数据模型
    	$cid = I('post.id');
        $result  = $Data->where(" inid = {$cid} ")->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    }   
//  public function detaile(){
//  	$Data = M('daily');// 实例化Data数据模型
//  	$cid = I('post.id');
////      $result  = $Data->limit(0,1)->select();
//      $result  = $Data->where(" id = {$cid} ")->select();
//      header('Content-Type:application/json; charset=utf-8'); 
//      $this->ajaxReturn($result);
//  }    
//  public function olist(){
//  	$Data = M('article');// 实例化Data数据模型
//      $dailyid = I('post.dailyid');
//      $fist = I('post.first');
//      $last = I('post.last');
////      http://www.zjliang.com/index.php/Gapi/Article/olist.html/?$type=1&dailyid=23&fist=0&last=10
//      $result  = $Data->where("type = '1' and dailyid = '{$dailyid}'")->order('id desc')->limit($fist,$last)->select();
//      header('Content-Type:application/json; charset=utf-8'); 
//      $this->ajaxReturn($result);
//  } 
//  public function two(){
//  	$Data = M('article');// 实例化Data数据模型
//      $maxid = I('post.maxid');
//      $result  = $Data->where("id > {$maxid} and dailyid = '{$dailyid}'")->select();
//      $this->ajaxReturn($result);
//  }             
}