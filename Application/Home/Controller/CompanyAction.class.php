<?php
class CompanyAction extends BaseAction {
	public function detailes() {
	  Load('extend');
	  if($_GET['id'])
		{
			$id=$_GET["id"];
			$company =new Users_CompanyModel('UsersCompany');
			$com=$company->where('USERID='.$id)->select();
			
			$this->assign("company",$com[0]);
		}
	  
	  $progoods=new Company_GoodsModel('CompanyGoods');
	  $hotproject=$progoods->where("STATUS=0")->order("ID desc")->limit("17") ->select();	
		$this->assign('hotproject',$hotproject);
	  $this->display();
	    
	}
	}
?>