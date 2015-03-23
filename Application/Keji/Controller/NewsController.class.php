<?php
namespace Keji\Controller;
use Think\Controller;
use Model\User_IndustryModel;
use Model\KjuserModel;
use Model\Company_KindModel;
use Model\ArticleModel;
use Think\FallPage; 
class NewsController extends BaseController{
	public function index(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		
		$art=new ArticleModel('Article');
		$where['USERID']=$currentuser['id'];
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["ADD_TIME"]=array("between",array($star,$end));
		}
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["TITLE"]=array("like","%".$_POST["keyword"]."%");	
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		$where['STATUS']=0;
		$countt=$art->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$art->where($where)->order('ID desc,ORD desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['STATUS']=1;
		$ds=$art->where($where)->count();
		$this->assign('daishen',$ds);
		$where['STATUS']=2;
		$weishen=$art->where($where)->count();
		$this->assign('weishen',$weishen);
		$this->display();
	}
	public function indexx(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		if(!$currentuser){
			header('location:' . U( 'User/login' ) );
		}
		$art=new ArticleModel('Article');
		$where['USERID']=$currentuser['id'];
		
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["ADD_TIME"]=array("between",array($star,$end));
		  
		
		}
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["TITLE"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		
		$where['STATUS']=0;
		$ds=$art->where($where)->count();
		$this->assign('all',$ds);//全部
		
		
		$where['STATUS']=1;//待审
		$countt=$art->where($where)->count();//全部
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$art->where($where)->order(' ID desc,ORD desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['STATUS']=2;
		$weishen=$art->where($where)->count();
		$this->assign('weishen',$weishen);
		$this->display();
	}
	public function refuse(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		if(!$currentuser){
			header('location:' . U( 'User/login' ) );
		}
		$art=new ArticleModel('Article');
		$where['USERID']=$currentuser['id'];
		
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["ADD_TIME"]=array("between",array($star,$end));
		  
		
		}
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["TITLE"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		
		$where['STATUS']=0;
		$ds=$art->where($where)->count();
		$this->assign('all',$ds);//全部
		
		
		$where['STATUS']=2;//拘审
		$countt=$art->where($where)->count();//全部
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$art->where($where)->order('ID desc,ORD desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['STATUS']=1;
		$ds=$art->where($where)->count();
		$this->assign('daishen',$ds);
		
		$this->display();
	}
	public function edit(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		$kind=M('Innovation');
		$list=$kind->where("userid=".$currentuser['id']." and status=0")->select();
		$this->assign("xkind",$list);
		
		$hy=M('CompanyKind');
		$art=M('Article');
		$list=$hy->select();
		$this->assign('hy',$list);
		if($_GET['id']){
			$vo=$art->where("ID=".$_GET['id'])->find();
			$this->assign("article",$vo);
			$list=explode(",",$vo['keyword']);
			$this->assign("key",$list);
		}
		if($_POST){
			$data=$_POST;
			if($_POST['ID']==''){
				$data['ID']=time();
			    $data['ADD_TIME']=time();
				$data['USERID']=$currentuser['id'];
				$data['STATUS']=1;
				$data['KEYWORD']=$_POST['KEYWORD1'].",".$_POST['KEYWORD2'].",".$_POST['KEYWORD3'];
				
				$add=$art->add($data);
				if($add){
					$this->success("添加成功");
				}else{
					$this->error("添加失败");
				}
				return;
			}else{
				$data['STATUS']=1;
				$data['KEYWORD']=$_POST['KEYWORD1'].",".$_POST['KEYWORD2'].",".$_POST['KEYWORD3'];
				
				$save=$art->where("ID=".$_POST['ID'])->save($data);
			   $this->success("修改成功");
				
				return;
			}
			
			
		}
		$this->display();
	}
	public function delete(){
		$art=new ArticleModel('Article');
		if($_GET['id']){
			$delete=$art->where("ID=".$_GET['id'])->delete();
			if($delete){
				$this->success("删除成功");
			}
		}
	}
	
}