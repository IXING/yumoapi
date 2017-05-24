<?php
namespace Gapi\Controller;
use Think\Controller;
class LoginController extends Controller {
//  登录
	
    public function index(){
    	$Data = M('user');// 实例化Data数据模型
        $openid = I('post.openid');
        $rukou = I('post.rukou');
        $name = I('post.name');
        $user_img = I('post.user_img');
        $user_img2 = I('post.user_img2');
        $result  = $Data->where("openid = '{$openid}' and rukou = '{$rukou}'")->select();
//      $name = $result.openid;
        if(empty($result)){    
	        $Data->openid  =  $openid;
	        $Data->rukou  =  $rukou;
	        $Data->name  =  $name;
	        $Data->user_img  =  $user_img;
	        $Data->user_img2  =  $user_img2;
	        $Data->browse  =  0;
	        $Data->article  =  0;
	        $Data->focus  =  0;
	        $Data->add();       	
			$result2  = $Data->where("openid = '{$openid}' and rukou = '{$rukou}'")->select();
			$this->ajaxReturn($result2); 
        }else{
//      	echo $result[0]['openid'];
        	$this->ajaxReturn($result); 
        }
        header('Content-Type:application/json; charset=utf-8'); 
//      $this->ajaxReturn($result); 
    } 
    public function user(){
    	$Data = M('user');// 实例化Data数据模型
    	$id = I('post.id');
        $result  = $Data->where(" id = {$id} ")->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    }                              
}