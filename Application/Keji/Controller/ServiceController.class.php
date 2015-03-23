<?php
namespace Keji\Controller;
use Think\Controller;

use Think\FallPage;
use Model\FinancingModel;
class ServiceController extends BaseController{
	public function index(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$ser=M("service");
		$where['email']=$currentuser['email'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["addtime"]=array("between",array($star,$end));
		
		}
		
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		$where['status']=0;
		$countt=$ser->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$ser->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['status']=1;
		$ds=$ser->where($where)->count();
		$this->assign("ds",$ds);
		
		$where['status']=2;
		$js=$ser->where($where)->count();
		$this->assign("js",$js);
		$this->display();
	}
	public function indexx(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$ser=M("service");
		$where['email']=$currentuser['email'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["addtime"]=array("between",array($star,$end));
		
		}
		
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		$where['status']=0;
		$all=$ser->where($where)->count();
		$this->assign("all",$all);
		
		$where['status']=1;
		$countt=$ser->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$ser->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		
		
		$where['status']=2;
		$js=$ser->where($where)->count();
		$this->assign("js",$js);
		$this->display();
	}
	public function refuse(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$ser=M("service");
		$where['email']=$currentuser['email'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["addtime"]=array("between",array($star,$end));
		
		}
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		
		$where['status']=0;
		$all=$ser->where($where)->count();
		$this->assign("all",$all);
		
		$where['status']=2;
		$countt=$ser->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$ser->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['status']=1;
		$ds=$ser->where($where)->count();
		$this->assign("ds",$ds);
		
		
		$this->display();
	}
	public function edit(){
		$ser=M("service");
		$currentuser=getetcurrentuser();
		if($_GET['id']&&trim($_GET['id'])){
			$list=$ser->where('id='.$_GET['id'])->find();
			$this->assign('article',$list);
		}
		if($_POST){
			$da=$_POST;
			if($_POST['id']==''){
				$da['status']=1;
				$da['uemail']=$currentuser['email'];
				$da['addtime']=time();
				$add=$ser->add($da);
				if($add){
					$this->success("提交成功",U('Service/index'));
				}else{
					$this->success("提交失败");
				}
			}else{
				$da['status']=1;
				$ser->where("id=".$_POST['id'])->save($da);
				$this->success("修改成功",U('Service/index'));
			}
		}
		$this->display();
	}
	
	public function delete(){
		$ser=M("service");
		if($_GET['id']){
			$del=$ser->where("ID=".$_GET['id'])->delete();
			if($del){
					$this->success("删除成功",U('Service/index'));
			}else{
				$this->error("删除失败",U('Service/index'));
			}
		}
	}
	
}