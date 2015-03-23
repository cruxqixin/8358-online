<?php
namespace Home\Controller;
use Think\Controller;
use Model\ReportModel;
class ReportController extends BaseController {
	public function index() {
	 
	 $currentuser=getetcurrentuser();
	 if (isset($_GET['type']) && trim($_GET['type'])) {
	
	    $ty=$_GET['type'];
	  
	 }
	 
	 if (isset($_GET['cat']) && trim($_GET['cat'])) {
	   
	     $cat=$_GET['cat'];
		 

	      if( $cat==3)
	   {
	      $lx="专家";
	   }
	   else
	   {
	     $lx="项目";
	   }
	   $this->assign("cat",$cat);
	 }
	 
	 if (isset($_GET['ID']) && trim($_GET['ID'])) {
	   
	     $ID=$_GET['ID'];
		 
		 }
	if($_POST["submit"])
	{  
	  if($_POST["cat"]!='')
	  {
	   $rep=new ReportModel('Report');
	  
	   $data=$_POST;
	  
	    $data["USERID"]=$currentuser["id"];
	
	   $data["ID"]=time();
       $data["STATUS"]="0";
	   $data["ADDTIME"]=time();
	   $data["UTYPE"]=$currentuser["utype"];
	   if($_POST["cat"]==3)
	   {
		   $data["CATEGORY"]="专家";
		   }
		   else if($_POST["cat"]==2)
		   {
		     $data["CATEGORY"]="项目";
		   }
		   else
		   {
		     $data["CATEGORY"]="产品";
		   }
		
	   $row=$rep->add($data);
	 
	   if($row)
	   {
	     $this->success('申请举报成功！');
		exit();
	   }
	    }
	 }
		$this->display();
	}
	
	
	}


?>