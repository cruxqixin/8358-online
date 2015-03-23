<?php
namespace Keji\Controller;
use Think\Controller;

use Think\FallPage;
use Model\HkinfoModel;
class HkinfoController extends BaseController{
	public function index(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$rz=new FinancingModel("Financing");
		$where['userid']=$currentuser['id'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["addtime"]=array("between",array($star,$end));
		
		}
		
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		$countt=$rz->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$rz->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['status']=0;
		$ds=$rz->where($where)->count();
		$this->assign("ds",$ds);
		
		$where['status']=1;
		$js=$rz->where($where)->count();
		$this->assign("js",$js);
		$this->display();
	}
	public function indexx(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$rz=new FinancingModel("Financing");
		$where['userid']=$currentuser['id'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["addtime"]=array("between",array($star,$end));
		
		}
		
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		
		$all=$rz->where($where)->count();
		$this->assign("all",$all);
		
		$where['status']=0;
		$countt=$rz->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$rz->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		
		
		$where['status']=1;
		$js=$rz->where($where)->count();
		$this->assign("js",$js);
		$this->display();
	}
	public function refuse(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$rz=new FinancingModel("Financing");
		$where['userid']=$currentuser['id'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["addtime"]=array("between",array($star,$end));
		
		}
		
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		
		$all=$rz->where($where)->count();
		$this->assign("all",$all);
		
		$where['status']=1;
		$countt=$rz->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$rz->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['status']=0;
		$ds=$rz->where($where)->count();
		$this->assign("ds",$ds);
		
		
		$this->display();
	}
	public function edit(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$demand=new HkinfoModel("Hkinfo");
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
				$data['DTYPE']=0;
				$data['DCOMPANY']=$currentuser['companyname'];
				$data['DEMAIL']=$currentuser['email'];
				if($da["ISSHOW"]=="0"){
				$da["DSTATUS"]="10";
				}else{
					$da["DSTATUS"]="1";
				}
			   $da["DEADLINE"]=time();
			   
				$add=$demand->add($data);
				if($add){
					$this->success("添加成功",U('Demand/index'));
				}
			}else{
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