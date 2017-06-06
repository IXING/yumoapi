<?php
namespace Gapi\Controller;
use Think\Controller;
class ContentController extends Controller {
    public function index(){
    	$Data = M('article');// 实例化Data数据模型
    	$cid = I('post.id');
    	
    	//浏览量加一
    	$browse = $Data->where("id = {$cid}")->getField('browse');
        $Data->browse = $browse + 1 ;
    	$Data->where("id = {$cid}")->save();
    	
    	//作者人气加一
    	$User = M('user');
    	$inid = $Data->where("id = {$cid}")->getField('inid');//获取作者id
    	$ubrowse = $User->where("id = {$inid}")->getField('browse');//获取作者人气
        $User->browse = $ubrowse + 1 ;
    	$User->where("id = {$inid}")->save();
    	
        $result  = $Data->where(" id = {$cid} ")->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    }             
}