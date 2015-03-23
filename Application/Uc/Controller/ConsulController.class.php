<?php
namespace Uc\Controller;
use Think\Controller;
use Model\CollectModel;
use Think\FallPage;
use Model\Project_ChoseModel;
use Model\ProjectModel;
use Model\ExpertsModel;
use Model\Company_GoodsModel;
class ConsulController extends BaseController {
	
	//专家列表
	public function prolist(){
		$currentuser=getetcurrentuser();
		$collect=new CollectModel('Collect');
		//查询当前
		
		if($_GET["type"]&&$_GET["type"]=="1"){
			$sqlwhere=" id in(select objid from TK_COLLECT where USERID=".$currentuser["id"]." and  typeid=1)";	
			$experts=new ExpertsModel("Experts");
			
			import("@.ORG.FallPage"); // 导入分页类
			$count=$experts->where($sqlwhere)->count();	
			$page=new FallPage($count,10);
			$show=$page->show();
			$dataset=$experts->where($sqlwhere)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();	
			
				
			$this->assign('experts',$dataset);
			$this->assign("page",$show);
			
			$this->display("experts");
		}else if($_GET["type"]&&$_GET["type"]=="2"){
		
		$Project=new Company_GoodsModel('CompanyGoods');	
			$sqlwhere=" id in(select objid from TK_COLLECT where USERID=".$currentuser["id"]." and  typeid=0)";	
			//分页展示
			import("@.ORG.FallPage"); // 导入分页类
			$count=$Project->where($sqlwhere)->count();	
			$page=new FallPage($count,10);
			$show=$page->show();
			$dataset=$Project->where($sqlwhere)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();	
			
			$this->assign('product',$dataset);
			$this->assign("page",$show);
			
			
		
		$this->display("product");
			
		}
		else
		{
		   
			$Project=new ProjectModel('project');	
			$sqlwhere=" id in(select objid from TK_COLLECT where USERID=".$currentuser["id"]." and  typeid=0)";	
			//分页展示
			import("@.ORG.FallPage"); // 导入分页类
			$count=$Project->where($sqlwhere)->count();	
			$page=new FallPage($count,10);
			$show=$page->show();
			$dataset=$Project->where($sqlwhere)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();			
			$this->assign('projects',$dataset);
			$this->assign("page",$show);
			
			
			$Prochose=new Project_ChoseModel('project_chose'); 
			$Prochose1=$Prochose->where('TYPEID=0')->select();
			$res1;
			foreach($Prochose1 as $value){
				$res1[$value["id"]]=$value;		
			}
			$this->assign('Prochose1',$res1);
			
			
			$this->display("project");
		}
	}	
}
