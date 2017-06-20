<?php
namespace Add\Controller;
use Think\Controller;
class AddvideoController extends Controller {
//  添加视频页面
    public function index(){
		 $this -> display();;
    }   
	public function addvideo() {

		$User = M("video");
		
		$title = $_POST['title'];
		$yimg = $_POST['yimg'];
		$type = $_POST['type'];
		$browse = $_POST['browse'];
		$comments = $_POST['comments'];
		$zan = $_POST['zan'];

		$data['title'] = $title;
		$data['yimg'] = $yimg;
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
//	视频内容添加页面
	public function content(){
		 $this -> display();;
    }   
	public function addcontent() {

		$User = M("video");
		
		$inid = $_POST['inid'];
		$title = $_POST['title'];
		$name = $_POST['name'];
		$curl = $_POST['curl'];
		$type = $_POST['type'];
		
		$zurl = 'http://www.zjliang.com/index.php/Gapi/Cvideo/?ourl=';
		$ocurl = $zurl.''.$curl;
		$data['inid'] = $inid;
		$data['title'] = $title;
		$data['name'] = $name;
		$data['curl'] = $ocurl;
		$data['type'] = $type;

	
		$User->add($data);

		if ($User) {
			$this -> success('操作成功！');
		} else {
			$this -> error('写入错误！');
		}
	}

}

