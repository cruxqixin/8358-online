<?php
namespace Keji\Controller;
use Think\Controller;
use Think\FallPage; 
class ChxinController extends BaseController{
	public function index(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$chxin=M('Innovation');
		$where['userid']=$currentuser['id'];
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["addtime"]=array("between",array($star,$end));
		}
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["syname"]=array("like","%".$_POST["keyword"]."%");	
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		$where['status']=0;
		$countt=$chxin->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$chxin->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['status']=1;
		$ds=$chxin->where($where)->count();
		$this->assign('ds',$ds);
		$where['status']=2;
		$weishen=$chxin->where($where)->count();
		$this->assign('js',$weishen);
		$this->display();
	}
	public function indexx(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$chxin=M('Innovation');
		$where['userid']=$currentuser['id'];
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["addtime"]=array("between",array($star,$end));
		}
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["syname"]=array("like","%".$_POST["keyword"]."%");	
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		$where['status']=1;
		$countt=$chxin->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$chxin->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['status']=0;
		$all=$chxin->where($where)->count();
		$this->assign('all',$all);
		$where['status']=2;
		$weishen=$chxin->where($where)->count();
		$this->assign('js',$weishen);
		$this->display();
	}
	public function refuse(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$chxin=M('Innovation');
		$where['userid']=$currentuser['id'];
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["addtime"]=array("between",array($star,$end));
		}
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["syname"]=array("like","%".$_POST["keyword"]."%");	
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		$where['status']=2;
		$countt=$chxin->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$chxin->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['status']=1;
		$ds=$chxin->where($where)->count();
		$this->assign('ds',$ds);
		$where['status']=0;
		$all=$chxin->where($where)->count();
		$this->assign('all',$all);
		$this->display();
	}
	public function edit(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		
		 $Prokind=D('project_kind');
		$kind=$Prokind->select();
		$kindres;
		foreach($kind as $value){
			$kindres[$value["id"]]=$value;	
		}
		$this->assign('Prokind',$kindres);
        $sys=M('Innovation');
		
		if($_GET['id']){
			$vo=$sys->where("id=".$_GET['id'])->find();
			$this->assign("article",$vo);
			
		}
		if($_POST){
			$data=$_POST;
			if($_POST['id']==''){
				$arr['syname']=$_POST['syname'];
				$list=$sys->where($arr)->find();
				if($list){
					$this->error("该实验室名称已存在");
				}else{
					$data['addtime']=time();
					$data['userid']=$currentuser['id'];
					$data['status']=1;
					$arr=$_POST['cateid'];
					$ids="";
					foreach($arr as $value){
						$ids.=$value;
						$ids.=",";
					}
					$data['cateid']=$ids;
					$add=$sys->add($data);
					
					if($add){
						$this->success("添加成功");
					}else{
						$this->error("添加失败");
					}
					return;
				}
			    
			}else{
				$data['status']=1;
				$arr=$_POST['cateid'];
				$ids="";
				foreach($arr as $value){
					$ids.=$value;
					$ids.=",";
				}
				$data['cateid']=$ids;
				$save=$sys->where("id=".$_POST['id'])->save($data);

				if($save){
					$this->success("修改成功",U('Chxin/index'));
				}else{
					$this->error("添加失败",U('Chxin/index'));
				}
				return;
			}
			
			
		}
		$this->display();
	}
	public function delete(){
		 $sys=M('Innovation');
		if($_GET['id']){
			$delete=$sys->where("ID=".$_GET['id'])->delete();
			if($delete){
				$this->success("删除成功");
			}
		}
	}
	
}