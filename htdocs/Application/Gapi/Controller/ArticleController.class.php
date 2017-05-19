<?php
namespace Gapi\Controller;
use Think\Controller;
class ArticleController extends Controller {
//  社区文章 
    public function index(){
    	$Data = M('article');// 实例化Data数据模型
        $fist = I('post.first');
        $last = I('post.last');
        $result  = $Data->order('id desc')->limit($fist,$last)->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result); 
    }   
    public function updata(){
    	$Data = M('article');// 实例化Data数据模型
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid}")->select();
        $this->ajaxReturn($result);
    } 
    public function olist(){
    	$Data = M('article');// 实例化Data数据模型
        $dailyid = I('post.dailyid');
        $fist = I('post.first');
        $last = I('post.last');
//      http://www.zjliang.com/index.php/Gapi/Article/olist.html/?$type=1&dailyid=23&fist=0&last=10
        $result  = $Data->where("type = '1' and dailyid = '{$dailyid}'")->order('id desc')->limit($fist,$last)->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    } 
    public function two(){
    	$Data = M('article');// 实例化Data数据模型
        $dailyid = I('post.dailyid');
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid} and dailyid = '{$dailyid}'")->select();
        $this->ajaxReturn($result);
    }  
//  首页推荐
    public function indextj(){
    	$Data = M('article');// 实例化Data数据模型
        $tuijian = I('post.tuijian');
        $fist = I('post.first');
        $last = I('post.last');
        $result  = $Data->where("tuijian = '$tuijian'")->order('id desc')->limit($fist,$last)->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result); 
    }   
    public function indextjtwo(){
    	$Data = M('article');// 实例化Data数据模型
    	$tuijian = I('post.tuijian');
        $dailyid = I('post.dailyid');
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid} and tuijian = '$tuijian'")->select();
        $this->ajaxReturn($result);
    }  
//  其他推荐
    public function tuijian(){
    	$Data = M('article');// 实例化Data数据模型
        $tuijian = I('post.tuijian');
        $type = I('post.type');
        $fist = I('post.first');
        $last = I('post.last');
        $result  = $Data->where("tuijian = '$tuijian' and type = '$type'")->order('id desc')->limit($fist,$last)->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result); 
    }   
    public function tuijiantwo(){
    	$Data = M('article');// 实例化Data数据模型
    	$tuijian = I('post.tuijian');
    	$type = I('post.type');
        $dailyid = I('post.dailyid');
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid} and tuijian = '$tuijian' and type = '$type'")->select();
        $this->ajaxReturn($result);
    }  
//  我的作品
    public function me(){
    	$Data = M('article');// 实例化Data数据模型
        $inid = I('post.inid');
        $fist = I('post.first');
        $last = I('post.last');
        $result  = $Data->where("inid = $inid")->order('id desc')->limit($fist,$last)->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result); 
    }   
    public function metwo(){
    	$Data = M('article');// 实例化Data数据模型
        $inid = I('post.inid');
        $maxid = I('post.maxid');
        $result  = $Data->where("id > {$maxid} and inid = $inid")->select();
        $this->ajaxReturn($result);
    }                        
}