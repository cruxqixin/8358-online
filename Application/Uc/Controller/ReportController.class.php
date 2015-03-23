<?php
namespace Uc\Controller;
use Think\Controller;
use Think\FallPage;
use Model\ReportModel;
use Model\ConsultationModel;
class ReportController extends BaseController {
	
	public function index() {
	
	  Load('extend');
		//判断是否完善信息
		$currentuser=getetcurrentuser();
	
		$demand=new ReportModel("Report");
		//获取当前项目信息
		$where["USERID"]=$currentuser["id"];	
		
		//$newdemand=$demand->where($where)->order("id desc")->limit("5") ->select();		
	
		$count=$demand->where($where)->count();
		
		$this->assign('count',$count[0]);	
		//$this->assign('newdemand',$newdemand);	
		
	  $c=new ConsultationModel("Consultation");
	 
	   $count1=$c->where($where)->count();
	   
	   $this->assign('count1',$count1[0]);	
	   //搜索	
		if($_POST["keyword"]){
			$where["JBYY"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("keyword",$_POST["keyword"]);
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["ADDTIME"]=array("between",array($star,$end));
		
		}
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
	  //分页
		import("@.ORG.FallPage");
		
		$count=$demand->where($where)->count();
		
		$page=new FallPage($count,10);
		
		$show=$page->show();
		$list=$demand->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();
		
 		$this->assign("newdemand",$list);
		$this->assign("page",$show);
	    $this->display();
	}
	
	public function indexx() {
	 
	 Load('extend');
		//判断是否完善信息
		$currentuser=getetcurrentuser();
	
		$demand=new ReportModel("Report");
		//获取当前项目信息
		$where["USERID"]=$currentuser["id"];	
		$count=$demand->where($where)->count();
		$this->assign('count',$count[0]);	
		$c=new ConsultationModel("Consultation");
	  $data=$c->where($where)->order(' ID desc')->select();
	   $this->assign("zx",$data);
	  $count1=$c->where($where)->count();
	 $this->assign('count1',$count1[0]);
	 //搜索	
		if($_POST["keyword"]){
			$where["OBJNAME"]=array("like","%".$_POST["OBJNAME"]."%");
			
		}
		$this->assign("keyword",$_POST["keyword"]);
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["ADDTIME"]=array("between",array($star,$end));
		
		}
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
	
	   //分页
		import("@.ORG.FallPage");
		
		$count=$c->where($where)->count();
		$page=new FallPage($count,10);
		$show=$page->show();
		$list=$c->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();
 		$this->assign("zx",$list);
		$this->assign("page",$show);
	 $this->display();
	}
	
	}

?>