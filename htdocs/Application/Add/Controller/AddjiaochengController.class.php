<?php
namespace Add\Controller;
use Think\Controller;
class AddjiaochengController extends Controller {

    public function index(){
		 $this -> display();;
    }   
	public function oaddjiaocheng() {

		$User = M("article");
		
		$title = $_POST['title'];
		$subtitle = $_POST['subtitle'];
		$content = $_POST['content'];
		$yimg = $_POST['yimg'];
		$time = $_POST['time'];
		$inid = $_POST['inid'];
		$user_name = $_POST['user_name'];
		$user_img = $_POST['user_img'];
		$type = $_POST['type'];
		$browse = $_POST['browse'];
		$comments = $_POST['comments'];
		$zan = $_POST['zan'];
		
		$zying = '?x-oss-process=image/resize,m_fill,h_100,w_100,limit_0';
		$cyimg = $yimg.''.$zying;



		$data['title'] = $title;
		$data['subtitle'] = $subtitle;
		$data['content'] = $content;
		$data['yimg'] = $cyimg;
		$data['time'] = $time;
		$data['inid'] = $inid;
		$data['user_name'] = $user_name;
		$data['user_img'] = $user_img;
		$data['type'] = $type;
		$data['browse'] = $browse;
		$data['comments'] = $comments;
		$data['zan'] = $zan;
	

		$User->add($data);

		if ($User) {
			$this -> success('操作成功！');
		} else {
			$this -> error('写入错误！');
		}
	}
}

