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
    public function zan(){
        $Data = M('article');// 实例化Data数据模型
        $id = I('post.id');
        // 获取标题 
        $zan = $Data->where("id = {$id}")->getField('zan');
        $Data->zan= $zan + 1 ;
        $Data->where("id = {$id}")->save(); // 根据条件保存修改的数据      
    }
    public function submit(){
        $Data = M('article');// 实例化Data数据模型
   
		$inid = I('post.inid');
		$user_name = I('post.user_name');
		$user_img = I('post.user_img');
		$title = I('post.title');
		$subtitle = I('post.subtitle');
		$content = I('post.content','',false);
//		I('post.content','',false);
		$yimg = I('post.yimg');
		$yimg2 = I('post.yimg2');
		$yimg3 = I('post.yimg3');
		$yimg4 = I('post.yimg4');
		$time = I('post.time');
		$type = I('post.type');
		$dailyid = I('post.dailyid');
		$browse = 0;
		$comments = 0;
		$zan = 0;
 
						//inid
						//user_name
						//user_img
						//title
						//subtitle
						//content
						//yimg
						//yimg2
						//yimg3
						//yimg4
						//time
						//type
						//dailyid
						//browse
						//comments
						//zan		
		
		     
        $Data->inid  =  $inid;
        $Data->user_name  =  $user_name;
        $Data->user_img  =  $user_img;
        $Data->title  =  $title;
        $Data->subtitle  =  $subtitle;
        $Data->content  =  $content;
        $Data->yimg  =  $yimg;
        $Data->yimg2  =  $yimg2;
        $Data->yimg3  =  $yimg3;
        $Data->yimg4  =  $yimg4;
        $Data->time  =  $time;
        $Data->type  =  $type;
        $Data->dailyid  =  $dailyid;
        $Data->browse  =  $browse;
        $Data->comments  =  $comments;
        $Data->zan =  $zan;
		
        $Data->add(); 

		//作者作品加一
        $User = M('user');
        $article = $User->where("id = {$inid}")->getField('article');
        $User->article = $article + 1 ;
    	$User->where("id = {$inid}")->save();  
    	  
    	        
        //每日一练跟帖加一
        if(empty($dailyid)){
        	
        }else{
	        $Dataw = M('daily');
	        $comments2 = $Dataw->where("id = {$dailyid}")->getField('comments');
	        $Dataw->comments = $comments2 + 1 ;
	    	$Dataw->where("id = {$dailyid}")->save();  	        	
        }




    }  
//  删除作品                      
    public function medelet(){
        $Data = M('article');// 实例化Data数据模型
		$id = I('post.id');
		$user_id = I('post.user_id');
        $Data->where("id = '{$id}' ")->delete();

    	$Dataa = M('user');// 实例化Data数据模型
    	$article = $Dataa->where("id = {$user_id}")->getField('article');
        $Dataa->article = $article - 1 ;
    	$Dataa->where("id = {$user_id}")->save();         

    } 
}

