<?php
namespace Gapi\Controller;
use Think\Controller;
class ContentController extends Controller {
    public function index(){
    	$Data = M('article');// 实例化Data数据模型
    	$cid = I('post.id');
        $result  = $Data->where(" id = {$cid} ")->select();
        header('Content-Type:application/json; charset=utf-8'); 
        $this->ajaxReturn($result);
    }             
}