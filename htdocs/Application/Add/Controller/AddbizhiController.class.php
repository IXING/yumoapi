<?php
namespace Add\Controller;
use Think\Controller;
class AddbizhiController extends Controller {

    public function index(){
		 $this -> display();;
    }   
	public function addbizhi() {

		$User = M("bizhi");
		
		$cimg = $_POST['cimg'];

		$data['cimg'] = $cimg;
	

		$User->add($data);

		if ($User) {
			$this -> success('操作成功！');
		} else {
			$this -> error('写入错误！');
		}
	}
}

