<?php
namespace Keji\Controller;
use Think\Controller;
use Model\ZhkindModel;
use Model\HkinfoModel;
use Think\FallPage;
class CaiwuController extends BaseController{
	public function index(){
		$currentuser=getetcurrentuser();
		$info=new HkinfoModel('Hkinfo');
		$where['userid']=$currentuser['id'];
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["addtime"]=array("between",array($star,$end));
		  
		
		}
		
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["name"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		$where['status']=0;
		$countt=$info->where($where)->count();//??
		//echo $goodkindd->getlastsql();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$info->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['status']=1;
		$ds=$info->where($where)->count();
		$this->assign('ds',$ds);
		$where['status']=2;
		$js=$info->where($where)->count();
		$this->assign('js',$js);
		$this->display();
		
	}
	public function indexx(){
		$currentuser=getetcurrentuser();
		$info=new HkinfoModel('Hkinfo');
		$where['userid']=$currentuser['id'];
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["addtime"]=array("between",array($star,$end));
		  
		
		}
		
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["name"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		$where['status']=1;
		$countt=$info->where($where)->count();//??
		//echo $goodkindd->getlastsql();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$info->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['status']=0;
		$all=$info->where($where)->count();
		$this->assign('all',$all);
		$where['status']=2;
		$js=$info->where($where)->count();
		$this->assign('js',$js);
		$this->display();
		
	}
	public function refuse(){
		$currentuser=getetcurrentuser();
		$info=new HkinfoModel('Hkinfo');
		$where['userid']=$currentuser['id'];
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["addtime"]=array("between",array($star,$end));
		  
		
		}
		
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["name"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		$where['status']=2;
		$countt=$info->where($where)->count();//??
		//echo $goodkindd->getlastsql();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$info->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['status']=0;
		$all=$info->where($where)->count();
		$this->assign('all',$all);
		$where['status']=1;
		$ds=$info->where($where)->count();
		$this->assign('ds',$ds);
		$this->display();
		
	}
	public function edit(){
		$currentuser=getetcurrentuser();
		$kind=new ZhkindModel('Zhkind');
		$list=$kind->select();
		$this->assign("zh",$list);
		
		$info=new HkinfoModel('Hkinfo');
		if($_GET['id']){
			$vo=$info->where("id=".$_GET['id'])->find();
			$this->assign("article",$vo);
			$this->assign("hktime",date("Y-m-d",$vo['hktime']));
			
		}
		if($_POST){
			if($_POST['id']==''){
				$data=$_POST;
				$data['status']=1;
				$data['addtime']=time();
				$data['userid']=$currentuser['id'];
				$data['hktime']=strtotime($_POST['hktime']);
				$row=$info->add($data);
				if($row){
					$this->success("发布成功",U('Caiwu/index'));
				}
			}else{
				$data=$_POST;
				$data['hktime']=strtotime($_POST['hktime']);
				$save=$info->where("id=".$_POST['id'])->save($data);
				$this->success("修改成功",U('Caiwu/index'));
			}
		}
		$this->display();
	}
	public function delete(){
		$info=new HkinfoModel('Hkinfo');
		if($_GET['id']){
			$delete=$info->where("id=".$_GET['id'])->delete();
		
			if($delete){
				$this->success("删除成功");
			}
		}
	}
	
}