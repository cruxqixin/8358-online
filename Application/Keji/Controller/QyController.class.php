<?php
namespace Keji\Controller;
use Think\Controller;
use Model\Company_KindModel;
use Model\TrainModel;
use Think\FallPage;
use Model\Company_Goods_kindModel;

class QyController extends BaseController{
	public function index(){
		$currentuser=getetcurrentuser();
		$qy=M("Company");
		$where['userid']=$currentuser['id'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["addtime"]=array("between",array($star,$end));
		
		}
		
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["title"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		//$where['status']=0;
		$countt=$qy->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$qy->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['status']=1;
		$ds=$qy->where($where)->count();
		$this->assign("ds",$ds);
		
		$where['status']=2;
		$js=$qy->where($where)->count();
		$this->assign("js",$js);
		$this->display();
	}
	public function indexx(){
		$currentuser=getetcurrentuser();
		$train=new TrainModel("Train");
		$where['userid']=$currentuser['id'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["addtime"]=array("between",array($star,$end));
		
		}
		
		
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["title"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		
		$where['status']=0;
		$all=$train->where($where)->count();
		$this->assign("all",$all);
		$where['status']=1;
		$countt=$train->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$train->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		
		$where['status']=2;
		$js=$train->where($where)->count();
		$this->assign("js",$js);
		$this->display();
	}
	public function refuse(){
		$currentuser=getetcurrentuser();
		$train=new TrainModel("Train");
		$where['userid']=$currentuser['id'];
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["addtime"]=array("between",array($star,$end));
		
		}
		
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["title"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		
		$where['status']=0;
		$all=$train->where($where)->count();
		$this->assign("all",$all);
		
		$where['status']=2;
		$countt=$train->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$train->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['status']=1;
		$ds=$train->where($where)->count();
		$this->assign("ds",$ds);
		$this->assign("prostatus",projectstats());
		
		$this->display();
	}
	public function intro(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$qy=M('Company');
		if($_GET['id']){
			$vo=$qy->where("id=".$_GET['id'])->find();
			$this->assign("article",$vo);
			
		}
	    $manu=$qy->where("userid=".$currentuser['id'])->find();
		
			if($_POST){
				if(!$manu){
					$data=$_POST;
					if($_POST['id']==''){
						$data['id']=time();
						$data['addtime']=time();
						$data['userid']=$currentuser['id'];
						$add=$qy->add($data);
						
						if($add){
							$this->success("添加成功",U('Qy/index'));
						}
					}else{
						
						$save=$train->where("id=".$_POST['ID'])->save($data);
						$this->success("修改成功",U('Qy/index'));
						
					}

				}else{
					$this->error("一个用户只能发布一个企业站",U('Qy/index'));
			}
		}
		
		$this->display();
	}
	public function delete(){
		$qy=M("Company");
		if($_GET['id']){
			$delete=$qy->where("id=".$_GET['id'])->delete();
			
			if($delete){
				$this->success("删除成功");
			}
		}
	}
	
}