<?php
namespace Add\Controller;
use Think\Controller;
class AdddataController extends Controller {

    public function index(){
		 $this -> display();;
    }   
	public function oadddate() {

		$User = M("database");
		
		$name = $_POST['name'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$yimg = $_POST['yimg'];
		$niandai = $_POST['niandai'];
		$type = $_POST['type'];
		$duilian = $_POST['duilian'];
		$shici = $_POST['shici'];
		$sizi = $_POST['sizi'];
		$liangzi = $_POST['liangzi'];
		$danzi = $_POST['danzi'];
		$qita = $_POST['qita'];
		$browse = $_POST['browse'];

		$data['name'] = $name;
		$data['title'] = $title;
		$data['content'] = $content;
		$data['yimg'] = $yimg;		
		$data['niandai'] = $niandai;		
		$data['type'] = $type;		
		$data['duilian'] = $duilian;		
		$data['shici'] = $shici;		
		$data['sizi'] = $sizi;		
		$data['liangzi'] = $liangzi;		
		$data['danzi'] = $danzi;		
		$data['qita'] = $qita;		
		$data['browse'] = $browse;		

		$User->add($data);

		if ($User) {
			$this -> success('操作成功！');
		} else {
			$this -> error('写入错误！');
		}
	}
}

