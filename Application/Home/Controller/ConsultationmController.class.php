<?php
namespace Home\Controller;
use Think\Controller;
use Model\ConsultationModel;
class ConsultationmController extends BaseController {
	public function project()
	{
		$c=new ConsultationModel("Consultation");
		//print_r($_POST);
		//添加留言
		$currentuser=getetcurrentuser();
		$data["TYPEID"]=$_POST["type"];
		$data["OBJID"]=$_POST["id"];
		
		$data["USERID"]=$currentuser["id"];
		$data["CCONTENT"]=$_POST["ccontent"];
		
		$data["OBJNAME"]=$_POST["pname"];
		$data["STATUS"]=0;
		$data["IP"]=get_client_ip();
		$data["ID"]=time();
		$data["UTYPE"]=$currentuser["utype"];
		$data["ADDTIME"]=time();
		
		$c->add($data);
		
		if($data["TYPEID"]==3){
			$this->success("操作成功",U('home/Project/detials',array("id"=>$data["OBJID"])));
		}else if($data["TYPEID"]==1){
			$this->success("操作成功",U('home/Experts/details',array("id"=>$data["OBJID"])));
		}
		else
		{
		  $this->success("操作成功",U('home/Goods/details',array("id"=>$data["OBJID"])));
		}
	}
}
