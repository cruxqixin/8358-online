<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\CollectModel;
class ajaxController extends BaseController{
	public function collectproject(){
	  	$currentuser=getetcurrentuser();
		$res["type"]="";
		if($currentuser==null){
			$res["type"]=1;
			echo json_encode($res);
			return;
		}
		$collect=new CollectModel('Collect');
		$data["USERID"]=$currentuser["id"];
		$data["TYPEID"]=$_GET["type"];
		$data["OBJID"]=$_GET["objid"];
		$count=$collect->where($data)->count();
		if($count>0){
			$collect->where($data)->delete();
			$res["type"]=2;
			echo json_encode($res);
			return;
		}
		$data["ADDTIME"]=time();
		$collect->add($data);
		$res["type"]=0;
		echo json_encode($res);
	}
	
	public function iscollec(){
	  	$currentuser=getetcurrentuser();
		$res["type"]="";
		if($currentuser==null){
			$res["type"]=1;
			echo json_encode($res);
			return;
		}
		$collect=new CollectModel('Collect');
		$data["USERID"]=$currentuser["id"];
		$data["TYPEID"]=$_GET["type"];
		$data["OBJID"]=$_GET["objid"];
		$count=$collect->where($data)->count();
		if($count>0){
			$res["type"]=0;
			echo json_encode($res);
			return;
		}
		$res["type"]=1;
		echo json_encode($res);
	}
	
	
	
	
	public function isline(){
	  	$currentuser=getetcurrentuser();
		$res["type"]="";
		if($currentuser==null){
			$res["type"]=1;
			echo json_encode($res);
			return;
		}
		$res["type"]=0;
		echo json_encode($res);
		
		//return 123;
	}
}

?>