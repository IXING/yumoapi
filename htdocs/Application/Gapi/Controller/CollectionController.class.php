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
}