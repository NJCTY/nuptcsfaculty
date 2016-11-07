<?php
namespace Demo\Controller;
use Common\Controller\HomebaseController;

class IndexController extends HomebaseController{
	
	function index(){
		$this->display();
	}
	function sample(){
		$data = M('content') -> where("id = $_GET[id] and type =$_GET[type]")->select();
		$this->assign('content',$data[0]);
		$this->display();
	}
	// function get(){
	// 			$data = M('content') -> where("id = $_GET[id] and type =$_GET[type]")->select();
	// 	$this->ajaxReturn($data);
	// }
}