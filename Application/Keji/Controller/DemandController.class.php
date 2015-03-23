<?php
namespace Keji\Controller;
use Think\Controller;
use Model\User_IndustryModel;
use Model\KjuserModel;
use Model\Company_KindModel;
use Model\ArticleModel;
use Think\FallPage;
use Model\DemandModel; 
class DemandController extends BaseController{
	public function index(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$demand=new DemandModel("Demand");
		$where['DUSERID']=$currentuser['id'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["ADDTIME"]=array("between",array($star,$end));
		
		}
		if($_POST["keyword"]){
			$where["PRO_NAME"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		$where['DSTATUS']=0;
		$countt=$demand->where($where)->count();
		//echo $demand->getlastsql();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$demand->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['DSTATUS']=1;
		$ds=$demand->where($where)->count();
		$this->assign("ds",$ds);
		
		$where['DSTATUS']=2;
		$js=$demand->where($where)->count();
		$this->assign("js",$js);
		$this->display();
	}
	public function indexx(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$demand=new DemandModel("Demand");
		$where['DUSERID']=$currentuser['id'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["ADDTIME"]=array("between",array($star,$end));
		
		}
		if($_POST["keyword"]){
			$where["PRO_NAME"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		$where['DSTATUS']=0;
		$all=$demand->where($where)->count();
		$this->assign("all",$all);
		
		$where['DSTATUS']=1;
		$countt=$demand->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$demand->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		
		
		$where['DSTATUS']=2;
		$js=$demand->where($where)->count();
		$this->assign("js",$js);
		$this->display();
	}
	public function refuse(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$demand=new DemandModel("Demand");
		$where['DUSERID']=$currentuser['id'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["ADDTIME"]=array("between",array($star,$end));
		
		}
		if($_POST["keyword"]){
			$where["PRO_NAME"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		$where['DSTATUS']=0;
		$all=$demand->where($where)->count();
		$this->assign("all",$all);
		
		$where['DSTATUS']=2;
		$countt=$demand->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$demand->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['DSTATUS']=1;
		$ds=$demand->where($where)->count();
		$this->assign("ds",$ds);
		
		
		$this->display();
	}
	public function edit(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		
		$demand=new DemandModel("Demand");
		if($_GET['id']){
			$vo=$demand->where("ID=".$_GET['id'])->find();
			$this->assign("article",$vo);
			
		}
		if($_POST){
			$data=$_POST;
			if($_POST['ID']==''){
				$data['ID']=time();
			    $data['DADDTIME']=time();
				$data['DUSERID']=$currentuser['id'];
				$data['DSTATUS']=1;
				$data['DCOMPANY']=$currentuser['companyname'];
				$data['DEMAIL']=$currentuser['email'];
				
			   $da["DEADLINE"]=time();
			   
				$add=$demand->add($data);
				if($add){
					$this->success("添加成功",U('Demand/index'));
				}
			}else{
				$data['DSTATUS']=1;
				$save=$demand->where("ID=".$_POST['ID'])->save($data);
				if($save){
					$this->success("修改成功",U('Demand/index'));
				}
			}

		}
		$this->display();
	}
	public function delete(){
		$demand=new DemandModel("Demand");
		if($_GET['id']){
			$del=$demand->where("ID=".$_GET['id'])->delete();
			if($del){
					$this->success("删除成功",U('Demand/index'));
			}else{
				$this->error("删除失败",U('Demand/index'));
			}
		}
	}
	
}