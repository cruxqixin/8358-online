<?php
namespace Keji\Controller;
use Think\Controller;
use Model\Company_KindModel;
use Model\TrainModel;
use Think\FallPage;
use Model\Company_Goods_kindModel;

class TrainController extends BaseController{
	public function index(){
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
		
		$where['status']=2;
		$js=$train->where($where)->count();
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
		
		
		$this->display();
	}
	public function edit(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		
		$Prokind=new Company_Goods_kindModel('CompanyGoods_kind');
		$kind=$Prokind->where('KTYPE=0 ')->select();
		
		
		$this->assign('hy',$kind);
		$train=new TrainModel("Train");
		if($_GET['id']){
			$vo=$train->where("id=".$_GET['id'])->find();
			$this->assign("article",$vo);
			$this->assign("starttime",date("Y-m-d ", $vo['starttime']));
			$this->assign("endtime",date("Y-m-d ", $vo['endtime']));
		}
		if($_POST){
			$data=$_POST;
			if($_POST['ID']==''){
				$data['id']=time();
			    $data['addtime']=time();
				$data['userid']=$currentuser['id'];
				$data['status']=1;
				$data['starttime']=strtotime($_POST['starttime']);
				$data['endtime']=strtotime($_POST['endtime']);
				
				$ids="";
				foreach($data['cateids'] as $value){
					$ids.=$value;
					$ids.=",";
				}
				$data['cateids']=$ids;
				$add=$train->add($data);
				
				if($add){
					$this->success("添加成功",U('Train/index'));
				}
			}else{
				$ids="";
				foreach($data['cateids'] as $value){
					$ids.=$value;
					$ids.=",";
				}
				$data['cateids']=$ids;
				$data['status']=1;
				$data['starttime']=strtotime($_POST['starttime']);
				$data['endtime']=strtotime($_POST['endtime']);
				$save=$train->where("id=".$_POST['ID'])->save($data);
				if($save){
					$this->success("修改成功",U('Train/index'));
				}
			}

		}
		$this->display();
	}
	public function delete(){
		$train=new TrainModel("Train");
		if($_GET['id']){
			$delete=$train->where("id=".$_GET['id'])->delete();
			
			if($delete){
				$this->success("删除成功");
			}
		}
	}
	
}