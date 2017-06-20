<?php
namespace Gapi\Controller;
use Think\Controller;
class CvideoController extends Controller {
//  社区文章
    public function index(){
    	$name = I('get.ourl');
		$this->assign('name',$name);
        $this->display();
    }                           
}