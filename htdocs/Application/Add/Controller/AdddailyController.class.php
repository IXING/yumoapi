<?php
namespace Add\Controller;
use Think\Controller;
class AdddailyController extends Controller {
//  添加视频页面
    public function index(){
		 $this -> display();;
    }   
	public function adddaily() {

		$User = M("daily");
	
		$title = $_POST['title'];
		$time = $_POST['time'];
//		$yimg = $_POST['yimg'];
		$cimg = $_POST['cimg'];
		$zhuozhe = $_POST['zhuozhe'];
		$browse = $_POST['browse'];
		$comments = $_POST['comments'];
		
//		$zying = '?x-oss-process=image/rotate,90/resize,m_fill,h_361,w_688,limit_0';
//		$yimg = $cimg.''.$zying;

		$data['title'] = $title;
		$data['time'] = $time;
//		$data['yimg'] = $yimg;
		$data['cimg'] = $cimg;
		$data['zhuozhe'] = $zhuozhe;
		$data['browse'] = $browse;
		$data['comments'] = $comments;

	
		$User->add($data);

		if ($User) {
			$this -> success('操作成功！');
		} else {
			$this -> error('写入错误！');
		}
	}
}

