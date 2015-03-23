<?php

class DetailesAction extends BaseAction{
	public function index(){
	   if (isset($_POST['id']) && trim($_POST['id'])) {
			$where .= " AND ID = '".$_POST['id']."'";
			$this->assign('ID', $_POST['id']);
		}
	   
			$Pro_Chose=new ProjectModel('project');   
 		$data=$Pro_Chose->order(' ID desc')->where($where)->select(); 
		$this->assign('project',$data);
	}
}


?>