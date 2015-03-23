<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\ProjectModel;
use Home\Model\Project_ChoseModel;
use Think\Page;
use Think\Model;
use Think\FallPage;
class SearchController extends BaseController {
	public function index(){
		Load('extend');
		$Project=new ProjectModel('project');		
		//条件	
		
		if($_GET["key"]=="输入关键词")
		{
		  $_GET["key"]='';
		}
		$kind=new Model('');
		$sql="select proid from TK_PROJECT_KS where KID in(select id from tk_project_kind where CNNAME like '%".$_GET["key"]."%')";
		$id=$kind->query($sql);
		
		$ids="";
		foreach($id as $value){
			if($value['proid']){
				$ids.=$value['proid'];
			$ids.=",";
			}
			
		}
		$ids=trim($ids,",");
		$sqlwhere="(";
		if($id){
			$sqlwhere.="id in(".$ids.") ";
			$sqlwhere.=" or PRO_NAME like '%".$_GET["key"]."%'";
		}else{
			$sqlwhere.="PRO_NAME like '%".$_GET["key"]."%'";
		}

		$sqlwhere.=" or PRO_INTRO like '%".$_GET["key"]."%'";
		$sqlwhere.=" or PRO_SUPERIORITY like '%".$_GET["key"]."%'";
		$sqlwhere.=" or PRO_SPHERE like '%".$_GET["key"]."%'";
		$sqlwhere.=" or PRO_BENEFIT like '%".$_GET["key"]."%'";
		$sqlwhere.=" or PRO_PRODUCTION like '%".$_GET["key"]."%'";
		$sql1="select id from TK_PROJECT_CHOSE where TITLE_CN like '%".$_GET["key"]."%'";
		$id1=$kind->query($sql1);
		if($id1){
			$sqlwhere.=" or PRO_COOPTYPE in (select id from TK_PROJECT_CHOSE where TITLE_CN like '%".$_GET["key"]."%')";
		}
		$sql2="select USERID from tk_USERS_SCHOOLE where CNAME like'".$_GET["key"]."'";
		$id2=$kind->query($sql2);
		if($id2){
			$sqlwhere.=" or USERID in(select USERID from tk_USERS_SCHOOLE where CNAME like'".$_GET["key"]."')";
		}
		
		$sqlwhere.=")";
		$sqlwhere.=" and STATUS =0 ";
		
		import("@.ORG.FallPage"); // 导入分页类
		$count=$Project->where("$sqlwhere")->count();
		//ECHO $Project->getlastsql();
		$page=new Page($count,10);
		$show=$page->show();
		$dataset=$Project->where($sqlwhere)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();
		$hotproject=$Project->where(" STATUS=0 ")->order('hits desc')->limit("20")->select();
		//print_r($sqlwhere);
		$Pro_Chose=new Project_ChoseModel('project_chose');   
		$temp=$Pro_Chose->select();
		$kind=array();
		foreach($temp as $key=>$value){
			$kind[$value["ID"]]=$value;	
		}
		if($dataset==null&&$dataset=='')
		{
		  $erro='未搜索到相关信息!';
		  $this->assign('whereshow',$erro);
		}
		else
		{
		  $count=$Project->where($sqlwhere)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->count();
		  $suss='共搜索到'.$count.'条相关信息';
		  $this->assign('whereshow',$suss);
		  
		}
		$this->assign('kind',$kind);		
		$this->assign('hotproject',$hotproject);	
		$this->assign('proxx',$dataset);	
		$this->assign('page',$show);
		
		$this->display();
	}
	
	public function experts(){
	if($_GET["key"]=="输入关键词")
		{
		  $_GET["key"]='';
		}
		Load('extend');
		$experts=new ExpertsModel('Experts'); 
		$sqlwhere="";
		$sqlwhere="(id in(select EXPID from TK_EXPERS_KS where KID in(select id from tk_project_kind where CNNAME like '%".$_GET["key"]."%')) ";
		$sqlwhere.=" or ENAME like '%".$_GET["key"]."%'";
		$sqlwhere.=" or EINTRO like '%".$_GET["key"]."%'";
		$sqlwhere.=" or ENITNAME like '%".$_GET["key"]."%'";
		$sqlwhere.=" or EDEPARTMENT like '%".$_GET["key"]."%'";
		$sqlwhere.=" or EADDRESS like '%".$_GET["key"]."%'";
		$sqlwhere.=" or ESCIENTIFIC like '%".$_GET["key"]."%'";
		
		//$sqlwhere.=" or EBOOKS in (select id from TK_PROJECT_CHOSE where TITLE_CN like '%".$_GET["key"]."%')";
		//$sqlwhere.=" or USERID in(select USERID from tk_USERS_SCHOOLE where CNAME like'".$_GET["key"]."')";
		
		$sqlwhere.=")";
		$sqlwhere.=" and STATUS =0 ";
		import("@.ORG.FallPage"); // 导入分页类
		$count=$experts->where($sqlwhere)->count();
		$page=new Page($count,10);
		$show=$page->show();
		$dataset=$experts->where($sqlwhere)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($dataset==null&&$dataset=='')
		{
		  $erro='未搜索到相关信息!';
		  $this->assign('whereshow',$erro);
		}
		else
		{
		  $count=$experts->where($sqlwhere)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->count();
		  $suss='共搜索到'.$count.'条相关信息';
		  $this->assign('whereshow',$suss);
		  
		}
		$hotexperts=$experts->where("STATUS=0")->order(' hits desc')->limit("8")->select();
		$this->assign("experts",$dataset);
		$this->assign("hotexperts",$hotexperts);
		$this->assign("page",$show);
		$this->display();
	}
	public function goods(){
	if($_GET["key"]=="输入关键词")
		{
		  $_GET["key"]='';
		}
	   Load('extend');
		$experts=new Company_GoodsModel('CompanyGoods'); 
		$sqlwhere="";
		$sqlwhere="(id in(select GOODID from TK_COMPANY_GOODSKINDS where KINDID in(select ID from TK_COMPANY_GOODS_KIND where KNAME like '%".$_GET["key"]."%')) ";
		$sqlwhere.=" or GNAME like '%".$_GET["key"]."%'";
		$sqlwhere.=" or GDESC like '%".$_GET["key"]."%'";
		$sqlwhere.=" or GUSER like '%".$_GET["key"]."%'";
		$sqlwhere.=" or GCOMNAME like '%".$_GET["key"]."%'";
		$sqlwhere.=" or GCODE like '%".$_GET["key"]."%'";
		//$sqlwhere.=" or EBOOKS in (select id from TK_PROJECT_CHOSE where TITLE_CN like '%".$_GET["key"]."%')";
		//$sqlwhere.=" or USERID in(select USERID from tk_USERS_SCHOOLE where CNAME like'".$_GET["key"]."')";
		
		$sqlwhere.=")";
		$sqlwhere.=" and STATUS =0 ";
		import("@.ORG.FallPage"); // 导入分页类
		$count=$experts->where($sqlwhere)->count();
		$page=new Page($count,10);
		$show=$page->show();
		$dataset=$experts->where($sqlwhere)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();
		if($dataset==null&&$dataset=='')
		{
		  $erro='未搜索到相关信息!';
		  $this->assign('whereshow',$erro);
		}
		else
		{
		  $count=$experts->where($sqlwhere)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->count();
		  $suss='共搜索到'.$count.'条相关信息';
		  $this->assign('whereshow',$suss);
		  
		}
		$hotexperts=$experts->where("STATUS=0")->order(' hits desc')->limit("8")->select();
		$this->assign("proxx",$dataset);
		$this->assign("hotproject",$hotexperts);
		$this->assign("page",$show);
		$this->display();
	}
	public function all()
	{  
	  //查询技术逐条添加
	  $code=new ProjectModel('Project');
	  $ui=$code->where('STATUS=0')->select();
	  $search=new SearchModel('Search');
	   foreach ($ui as $com){
	 		$search=new SearchModel('Search');
			
			    $str=implode('@',$com);
				 $data["SEARCHCONTENT"]= strip_tags($str);
				 $strr=substr(strip_tags($ui["PRO_INTRO"]),0,2000);
				 $data["SEARCHDESP"]=strip_tags($strr);
				 $data["ID"]=time();
				 $data["TYPEID"]=0;
				 $data["ITEMID"]=$com["ID"];
				 $data["STITLE"]=$com["PRO_NAME"];
				 $pdcf=$search->where('ITEMID='.$com['ID'])->count();
				 if($pdcf>0)
				 {
				   break;
				 }
				 else
				 {
				  $search->add($data);
				  sleep(1);
				 }
			}
			
		//查询专家逐条添加
	$expert=new ExpertsModel('Experts');
	  $exp=$expert->where('STATUS=0')->select();
	   foreach ($exp as $ex){
	 		$search=new SearchModel('Search');
			
			    $str=implode('@',$ex);
				 $data["SEARCHCONTENT"]= strip_tags($str);
				 $strr=substr(strip_tags($ex["EINTRO"]),0,2000);
				 $data["SEARCHDESP"]=strip_tags($strr);
				 $data["ID"]=time();
				 $data["TYPEID"]=1;
				 $data["ITEMID"]=$ex["ID"];
				 $data["STITLE"]=$ex["ENAME"];
				 $pdcf=$search->where('ITEMID='.$ex['ID'])->count();
				 if($pdcf>0)
				 {
				   break;
				 }
				 else
				 {
				  $search->add($data);
				  sleep(1);
				 }
			}
			
			//查询产品逐条添加
	$good=new Company_GoodsModel('CompanyGoods');
	  $pro=$good->where('STATUS=0')->select();
	   foreach ($pro as $pr){
	 		$search=new SearchModel('Search');
			
			    $str=implode('@',$pr);
				 $data["SEARCHCONTENT"]= strip_tags($str);
				 $strr=substr(strip_tags($pr["GDESC"]),0,2000);
				 $data["SEARCHDESP"]=strip_tags($strr);
				 $data["ID"]=time();
				 $data["TYPEID"]=2;
				 $data["ITEMID"]=$pr["ID"];
				 $data["STITLE"]=$pr["GNAME"];
				 $pdcf=$search->where('ITEMID='.$pr['ID'])->count();
				 if($pdcf>0)
				 {
				   break;
				 }
				 else
				 {
				  $search->add($data);
				  sleep(1);
				 }
			}
         
	    import("@.ORG.FallPage"); // 导入分页类
		$count=$search->where('')->count();
		$page=new Page($count,10);
		$show=$page->show();
		$dataset=$search->where('TYPEID in(0,1,2)')->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();
		
		//$hotexperts=$experts->where("STATUS=0")->order(' hits desc')->limit("8")->select();
		$this->assign("search",$dataset);
		//$this->assign("hotproject",$hotexperts);
		$this->assign("page",$show);
	
	  $this->display();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
