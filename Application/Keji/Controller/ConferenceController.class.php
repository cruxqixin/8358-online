<?php
namespace Keji\Controller;
use Think\Controller;
use Model\ConferenceModel;

use Think\FallPage;
class ConferenceController extends BaseController{
	public function index(){
		$currentuser=getetcurrentuser();
		if(!$currentuser){
			header('location:' . U( 'User/login' ) );
		}
		$confere=new ConferenceModel('Conference');
		$this->assign("user",$currentuser);
		$where['userid']=$currentuser['id'];
		
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["addtime"]=array("between",array($star,$end));
		  
		
		}
		
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["title"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		$where['status']=0;
		$countt=$confere->where($where)->count();//ȫҿ
		//echo $goodkindd->getlastsql();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$confere->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['status']=1;
		$ds=$confere->where($where)->count();
		$this->assign('ds',$ds);
		$where['status']=2;
		$js=$confere->where($where)->count();
		$this->assign('js',$js);
		$this->display();
	}
	public function indexx(){
		$currentuser=getetcurrentuser();
		if(!$currentuser){
			header('location:' . U( 'User/login' ) );
		}
		$confere=new ConferenceModel('Conference');
		$this->assign("user",$currentuser);
		$where['userid']=$currentuser['id'];
		
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["addtime"]=array("between",array($star,$end));
		  
		
		}
		
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["title"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		
		$where['status']=0;
		$all=$confere->where($where)->count();
		$this->assign('all',$all);
		
		$where['status']=1;
		$countt=$confere->where($where)->count();//ȫҿ
		//echo $goodkindd->getlastsql();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$confere->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['status']=2;
		$js=$confere->where($where)->count();
		$this->assign('js',$js);
		$this->display();
	}
	public function refuse(){
		$currentuser=getetcurrentuser();
		if(!$currentuser){
			header('location:' . U( 'User/login' ) );
		}
		$confere=new ConferenceModel('Conference');
		$this->assign("user",$currentuser);
		$where['userid']=$currentuser['id'];
		
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["addtime"]=array("between",array($star,$end));
		  
		
		}
		
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["title"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		
		$where['status']=0;
		$all=$confere->where($where)->count();
		$this->assign('all',$all);
		
		$where['status']=2;
		$countt=$confere->where($where)->count();//ȫҿ
		
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$confere->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['status']=1;
		$ds=$confere->where($where)->count();
		$this->assign('ds',$ds);
		
		$this->display();
	}
	public function edit(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		

		if(!$currentuser){
			header('location:' . U( 'User/login' ) );
		}
		
		$confere=new ConferenceModel('Conference');
		
		if($_GET['id']){
			$vo=$confere->where("id=".$_GET['id'])->find();
			$this->assign("article",$vo);
		   $this->assign("starttime",date("Y-m-d ", $vo['starttime']));
		   $this->assign("endtime",date("Y-m-d ", $vo['endtime']));
		}
		if($_POST){
			$data=$_POST;
			if($_POST['id']==''){
				$data['id']=time();
			    $data['addtime']=time();
				$data['status']=1;
				$data['userid']=$currentuser['id'];
				$data['starttime']=strtotime($_POST['starttime']);
				$data['endtime']=strtotime($_POST['endtime']);
				$row=$confere->add($data);
					if ($row){ 
						
						$this->success('添加成功',U('Conference/index'));
						return;
					}else { 
						$this->success('添加失败',U('Conference/index'));
						return;
					}
			}else{
				$da=$_POST;
				$da['status']=1;
				$da['starttime']=strtotime($_POST['starttime']);
				$da['endtime']=strtotime($_POST['endtime']);				
				$save=$confere->where("id=".$_POST['id'])->save($da);
				if($save){				    
						$this->success('修改成功',U('Conference/index'));
						return;
					}else {
						$this->success('修改失败',U('Conference/index'));
						return;
					}
			}
			
			
		}
		$this->display();
	}
	public function delete(){
		$confere=new ConferenceModel('Conference');
		if($_GET['id']){
			$delete=$confere->where("ID=".$_GET['id'])->delete();
			
			if($delete){
				$this->success("删除成功");
			}
		}
	}
	
}