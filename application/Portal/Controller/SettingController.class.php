<?php
namespace Portal\Controller;
use Common\Controller\AdminbaseController;
class SettingController extends AdminbaseController {
	function index(){
		//返回教师所选的主页类型
		$admincode = sp_get_current_admin_id();
		//首先看他有没有添加过
		if(M('page') -> where("admincode = '".$admincode."'")->find()){
			$type = M('page') -> where("admincode = '".$admincode."'")->select();
			switch ($type[0]['pagetype']) {
				case 1:
					$type[0]['self'] = "checked='checked'";
					break;
				case 2:
					$type[0]['multi'] = "checked='checked'";
					break;
				case 3:
					$type[0]['single'] = "checked='checked'";
					break;
				default:
					
					break;
			}
			$this->assign('type',$type[0]);
		}
		$this->display();
	}

	function save(){
		$admincode = sp_get_current_admin_id();
		if(M('page') -> where("admincode = '".$admincode."'")->find()){
			$save['pagetype'] = $_POST['type'];
			$result = M('page') -> where("admincode = '".$admincode."'") -> save($save);
			if($result == TRUE || $result == 0){
				if($_POST['type']==1){
					uploadwebsite();
    }
				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}
		}else{
			$add['admincode'] = $admincode;
			$add['pagetype'] = $_POST['type'];
			if(M('page') -> where("admincode = '".$admincode."'") ->data($add) -> add()){
				if($_POST['type']==1){
					uploadwebsite();
    }				$this->success("修改成功！");
			}else{
				$this->error("修改失败！");
			}

		}
	}
}
