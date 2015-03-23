<?php
namespace Keji\Controller;
use Think\Controller;
use Model\BusinessModel;

use Think\FallPage;
class BusinessController extends BaseController{
	public function index(){
		$currentuser=getetcurrentuser();
		if(!$currentuser){
			header('location:' . U( 'User/login' ) );
		}
		$zs=new BusinessModel('Business');
		$this->assign("user",$currentuser);
		$where['userid']=$currentuser['id'];
		
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["addtime"]=array("between",array($star,$end));
		  
		
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$where['status']=0;
		$countt=$zs->where($where)->count();//全部
		//echo $goodkindd->getlastsql();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$zs->where($where)->order('ord desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['status']=1;
		$ds=$zs->where($where)->count();
		$this->assign('ds',$ds);
		$where['status']=2;
		$js=$zs->where($where)->count();
		$this->assign('js',$js);
		$this->display();
	}
	public function indexx(){
		$currentuser=getetcurrentuser();
		if(!$currentuser){
			header('location:' . U( 'User/login' ) );
		}
		$zs=new BusinessModel('Business');
		$this->assign("user",$currentuser);
		$where['userid']=$currentuser['id'];
		
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["addtime"]=array("between",array($star,$end));
		  
		
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$where['status']=0;
		$all=$zs->where($where)->count();
		$this->assign('all',$all);
		$where['status']=1;
		
		$countt=$zs->where($where)->count();//全铱
		//echo $goodkindd->getlastsql();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$zs->where($where)->order('ord desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['status']=2;
		$js=$zs->where($where)->count();
		$this->assign('js',$js);
		$this->display();
	}
	public function refuse(){
		$currentuser=getetcurrentuser();
		if(!$currentuser){
			header('location:' . U( 'User/login' ) );
		}
		$zs=new BusinessModel('Business');
		$this->assign("user",$currentuser);
		$where['userid']=$currentuser['id'];
		
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["addtime"]=array("between",array($star,$end));
		  
		
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		
		$where['status']=0;
		$all=$zs->where($where)->count();
		$this->assign('all',$all);
		$where['status']=2;
		$countt=$zs->where($where)->count();//全铱
		//echo $goodkindd->getlastsql();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$zs->where($where)->order('ord desc,id desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['status']=1;
		$ds=$zs->where($where)->count();
		$this->assign('ds',$ds);
		
		$this->display();
	}
	public function edit(){
		$currentuser=getetcurrentuser();
		if(!$currentuser){
			header('location:' . U( 'User/login' ) );
		}
		$this->assign("user",$currentuser);
		
		
		$zs=new BusinessModel('Business');

		if($_GET['id']){
			$vo=$zs->where("ID=".$_GET['id'])->find();
			$this->assign("article",$vo);
			$this->assign("starttime",date("Y-m-d ", $vo['start_time']));
			$this->assign("endtime",date("Y-m-d ", $vo['end_time']));
		}
		if($_POST){
			$data=$_POST;
			if($_POST['id']==''){
				$data['id']=time();
			    $data['addtime']=time();
				$data['status']=1;
				$data['userid']=$currentuser['id'];
				$data['start_time']=strtotime($_POST['start_time']);
				$data['end_time']=strtotime($_POST['end_time']);
				$adds=$zs->add($data);
				
				$this->success('添加成功',U('Business/index'));
						
			}else{
				$da=$_POST;  
				$da['status']=1;
				$da['start_time']=strtotime($_POST['start_time']);
				$da['end_time']=strtotime($_POST['end_time']);	
              			
				$save=$zs->where("id=".$_POST['id'])->save($da);
					 
				
					
				if($save){			    
						$this->success('修改成功',U('Business/index'));
						return;
					}else {
						$this->success('修改失败',U('Business/index'));
						return;
					}
			}
			
			
		}
		$this->display();
	}
	public function delete(){
		$zs=new BusinessModel('Business');
		if($_GET['id']){
			$delete=$zs->where("id=".$_GET['id'])->delete();
			
			if($delete){
				$this->success("删除成功");
			}
		}
	}
	
}