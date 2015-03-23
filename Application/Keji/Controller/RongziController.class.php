<?php
namespace Keji\Controller;
use Think\Controller;

use Think\FallPage;
use Model\FinancingModel;
class RongziController extends BaseController{
	public function index(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$rz=new FinancingModel("Financing");
		$where['email']=$currentuser['email'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["addtime"]=array("between",array($star,$end));
		
		}
		
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		$where['status']=0;
		$countt=$rz->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$rz->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['status']=1;
		$ds=$rz->where($where)->count();
		$this->assign("ds",$ds);
		
		$where['status']=2;
		$js=$rz->where($where)->count();
		$this->assign("js",$js);
		$this->display();
	}
	public function indexx(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$rz=new FinancingModel("Financing");
		$where['email']=$currentuser['email'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["addtime"]=array("between",array($star,$end));
		
		}
		
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		$where['status']=0;
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
		
		
		
		$where['status']=2;
		$js=$rz->where($where)->count();
		$this->assign("js",$js);
		$this->display();
	}
	public function refuse(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$rz=new FinancingModel("Financing");
		$where['email']=$currentuser['email'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["addtime"]=array("between",array($star,$end));
		
		}
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		$where['status']=0;
		$all=$rz->where($where)->count();
		$this->assign("all",$all);
		
		$where['status']=2;
		$countt=$rz->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$rz->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['status']=1;
		$ds=$rz->where($where)->count();
		$this->assign("ds",$ds);
		
		
		$this->display();
	}
	
	public function delete(){
		$demand=new FinancingModel("Financing");
		if($_GET['id']){
			$del=$demand->where("ID=".$_GET['id'])->delete();
			if($del){
					$this->success("删除成功",U('Rongzi/index'));
			}else{
				$this->error("删除失败",U('Rongzi/index'));
			}
		}
	}
	
}