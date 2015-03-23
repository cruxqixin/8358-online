<?php
namespace Keji\Controller;
use Think\Controller;
use Model\Company_KindModel;
use Model\Company_Goods_kindModel;

use Think\FallPage;

use Model\InstrumentModel; 
class InstrumentController extends BaseController{
	public function index(){
		$currentuser=getetcurrentuser();
		$Ins=new InstrumentModel("Instrument");
		$where['userid']=$currentuser['id'];
		$this->assign("user",$currentuser);
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
		$countt=$Ins->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$Ins->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['status']=1;
		$ds=$Ins->where($where)->count();
		$this->assign("ds",$ds);
		
		$where['status']=2;
		$js=$Ins->where($where)->count();
		$this->assign("js",$js);
		$this->display();
	}
	public function indexx(){
		$currentuser=getetcurrentuser();
		$Ins=new InstrumentModel("Instrument");
		$where['userid']=$currentuser['id'];
		$this->assign("user",$currentuser);
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
		$all=$Ins->where($where)->count();
		$this->assign("all",$all);
		
		$where['status']=1;
		$countt=$Ins->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$Ins->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		
		
		$where['status']=2;
		$js=$Ins->where($where)->count();
		$this->assign("js",$js);
		$this->display();
	}
	public function refuse(){
		$currentuser=getetcurrentuser();
		$Ins=new InstrumentModel("Instrument");
		$where['userid']=$currentuser['id'];
		$this->assign("user",$currentuser);
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
		$all=$Ins->where($where)->count();
		$this->assign("all",$all);
		
		$where['status']=2;
		$countt=$Ins->where($where)->count();
		$page=new FallPage($countt,10);
		
		
		
		
		$dataset=$Ins->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['status']=1;
		$ds=$Ins->where($where)->count();
		$this->assign("ds",$ds);
		
		
		$this->display();
	}
	public function edit(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		
		$kind=M('Innovation');
		$list=$kind->where("userid=".$currentuser['id']." and status=0")->select();
		$this->assign("xkind",$list);
		
		
		$Prokind=new Company_Goods_kindModel('CompanyGoods_kind');
		$kind=$Prokind->where('KTYPE=0 ')->select();
		
		
		$this->assign('hy',$kind);
		$com=new Company_Goods_kindModel('CompanyGoods_kind');
		$goodkind=$com->where("KTYPE=1")->select();
		$this->assign("Prokind1",$goodkind);
		$Ins=new InstrumentModel("Instrument");
		if($_GET['id']){
			$vo=$Ins->where("id=".$_GET['id'])->find();
			$this->assign("article",$vo);
			
		}
		if($_POST){
			$data=$_POST;
			if($_POST['id']==''){
				$data['id']=time();
			    $data['addtime']=time();
				$data['userid']=$currentuser['id'];
				$data['status']=1;
				
				$ids="";
				foreach($data['cats'] as $value){
					$ids.=$value;
					$ids.=",";
				}
				$data['cate_id']=$ids;
				$hyid="";
				foreach($data['inds'] as $value){
					$hyid.=$value;
					$hyid.=",";
				}
				$data['industry_id']=$hyid;
				$add=$Ins->add($data);
				if($add){
					$this->success("添加成功",U('Instrument/index'));
				}
			}else{
				$ids="";
				foreach($data['cats'] as $value){
					$ids.=$value;
					$ids.=",";
				}
				$data['cate_id']=$ids;
				$hyid="";
				foreach($data['inds'] as $value){
					$hyid.=$value;
					$hyid.=",";
				}
				$data['industry_id']=$hyid;
				$data['status']=1;
				$save=$Ins->where("id=".$_POST['id'])->save($data);
				if($save){
					$this->success("修改成功",U('Instrument/index'));
				}
			}

		}
		$this->display();
	}
	public function delete(){
		$Ins=new InstrumentModel("Instrument");
		if($_GET['id']){
			$delete=$Ins->where("ID=".$_GET['id'])->delete();
			if($delete){
				$this->success("删除成功");
			}
		}
	}
	
}