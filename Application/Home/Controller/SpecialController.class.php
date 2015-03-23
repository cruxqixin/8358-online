<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\AdModel;
use Home\Model\SpecialModel;
use Home\Model\ArticleModel;
use Home\Model\ProjectModel;
use Home\Model\Project_ChoseModel;
use Home\Model\ArticleCateModel;
use Home\Model\LinksModel;
use Home\Model\Company_GoodsModel;
use Home\Model\Project_kindModel;
use Think\Model;
use Think\FallPage;
class SpecialController extends BaseController{

	//列表显示
	public function detailes(){
	 /* if($_GET['pro']!='')
		{ 
		  if($_GET['id']!='')
		{ 
		   header('location:' . U( 'home/Special/detailes?SPID='.$_GET['id'] ) );
		  }
		}*/
		/*if (isset($_GET['pro']) && trim($_GET['pro'])) {
		{
		   print_r($_GET['pro']);
		   exit();
		}*/
		if($_GET['spid']=='')
		{ 
			$this->display();
			return;
		}
		$ggw=new AdModel('Ad');
		 $ggwztcx=$ggw->where(' ADTYPE=1398307762')->select();
		 $this->assign("ggwzt",$ggwztcx);
		Load('extend');
		//专题信息查询赋值
		$com=new SpecialModel('Special');
		$resSpecial=$com->where(array("ID"=>$_GET["spid"]))->find();
		//print_r($_GET['SPID']);
		
		$this->assign("spe",$resSpecial);
		//print_r($resSpecial);
		
		if(!$resSpecial['techkinds']){
		    if(!$resSpecial['techkinds']&&!$resSpecial['expertkinds']&&!$resSpecial['productkinds'])
			{
				$this->redirect($_SERVER['HTTP_HOST']."/home/Special/detailes/spid/".$resSpecial['id']);
			 // header('location:' . U( 'home/Special/detailes?spid='.$resSpecial['id'] ) );
			}
			else if($resSpecial['expertkinds']){
				$this->redirect($_SERVER['HTTP_HOST']."/home/Special/expert/spid/".$resSpecial['id']);
			   //header('location:' . U( 'home/Special/expert?spid='.$resSpecial['id'] ) );
			}else
			{
				$this->redirect($_SERVER['HTTP_HOST']."/home/Special/pro/spid/".$resSpecial['id']);
			  // header('location:' . U( 'home/Special/pro?spid='.$resSpecial['id'] ) );
			}
		}
		
		
		$re=array(
			"id"=>"技术分类",
			"coop"=>"合作方式",
			"inven"=>"发明情况",
			"patent"=>"专利情况",
			"funds"=>"资金需求",
			"cid"=>"企业",
			"sid"=>"学校",
			"sname"=>"企业名称",
			"cname"=>"学校名称",
			"SPID"=>"1"
		);
		//中间变量
		$res;
		foreach($re as $key=>$value){
			$res[$key]=$_GET[$key];	
		}
		
		$sqlwhere;
		if($res["coop"]){
			$sqlwhere["PRO_COOPTYPE"]=	$res["coop"];
		}
		if($res["inven"]){
			$sqlwhere["PRO_STAGE"]=	$res["inven"];
		}
		if($res["patent"]){
			$sqlwhere["PRO_PATENTTYPE"]=$res["patent"];
		}
		if($res["funds"]){
			$sqlwhere["PRO_FUNDS"]=	$res["funds"];
		}
		
		
		//前天展示条件
		$whereshow="";
		$Pro_Chose=new Project_ChoseModel('project_chose');   
 		$data;
		
		$data[0]["title_cn"]="全部";
		$data[0]["url"]=getparaurl($res,"coop","");
		$temp=$Pro_Chose->order('sort desc,ID asc')->where('TYPEID=0')->select();
		foreach($temp as $key=>$value){
			$data[$value["id"]]=$value;
			$data[$value["id"]]["url"]=getparaurl($res,"coop",$value["id"]);
			
			if($res["coop"]&&$value["id"]==$res["coop"]){
				$whereshow.=" <span>".$re['coop']."<font><a href=\"".U('home/Special/detailes',getparaurl($res,"coop",""))."\">".$value["title_cn"]."</a></font></span>";
			}
		}
		
		$data1;		
		$data1[0]["title_cn"]="全部";
		$data1[0]["url"]=getparaurl($res,"inven","");
		$temp=$Pro_Chose->order('sort desc,ID asc')->where('TYPEID=1')->select();
		foreach($temp as $key=>$value){
			$data1[$value["id"]]=$value;
			$data1[$value["id"]]["url"]=getparaurl($res,"inven",$value["id"]);
			if($res["inven"]&&$value["id"]==$res["inven"]){				
				$whereshow.=" <span>".$re['inven']."<font><a href=\"".U('home/Special/detailes',getparaurl($res,"inven",""))."\">".$value["title_cn"]."</a></font></span>";
			}
		}
		
		$data2;		
		$data2[0]["title_cn"]="全部";
		$data2[0]["url"]=getparaurl($res,"patent","");
		$temp=$Pro_Chose->order('sort desc,ID asc')->where('TYPEID=2')->select();
		foreach($temp as $key=>$value){
			$data2[$value["id"]]=$value;
			$data2[$value["id"]]["url"]=getparaurl($res,"patent",$value["id"]);
			if($res["patent"]&&$value["id"]==$res["patent"]){				
				$whereshow.=" <span>".$re['patent']."<font><a href=\"".U('home/Special/detailes',getparaurl($res,"patent",""))."\">".$value["title_cn"]."</a></font></span>";
			}
		}
		
		$data3;		
		$data3[0]["title_cn"]="全部";
		$data3[0]["url"]=getparaurl($res,"funds","");
		$temp=$Pro_Chose->order('sort desc,id asc')->where('TYPEID=3')->select();
		foreach($temp as $key=>$value){
			$data3[$value["id"]]=$value;
			$data3[$value["id"]]["url"]=getparaurl($res,"funds",$value["id"]);
			if($res["funds"]&&$value["id"]==$res["funds"]){				
				$whereshow.=" <span>".$re['funds']."<font><a href=\"".U('home/Special/detailes',getparaurl($res,"funds",""))."\">".$value["title_cn"]."</a></font></span>";
			}
		}
		
		
		$data2=$Pro_Chose->order(' ID desc')->where('TYPEID=2')->limit("6")->select();
		$data3=$Pro_Chose->order(' ID desc')->where('TYPEID=3')->limit("6")->select();
	    $this->assign('Project',$data);
		$this->assign('Project1',$data1);
		$this->assign('Project2',$data2);
		$this->assign('Project3',$data3);
		
		//组装筛选条件
		$sqlwhere["STATUS"]=0;
		$idstemp=split(",",$_GET["id"]);
		$ids;
		foreach($idstemp as $value){
			if($value)
				$ids[$value]=$value;
		}
		
		//获取ID集合
		$resvalues;
		foreach($ids as $value){
			if(is_numeric($value)){
				$resvalues.=$value.",";
			}
		}
		
		//分类ID筛选 此处添加专题分类条件
		if($_GET["id"]&&$resvalues){
			$resvalues.="0";
			//$sqlwhere["ID"]=array("exp","in(select proid from(select proid,count(*) as count from TK_PROJECT_KS where KID in(".$resvalues.") or KID in(select id from TK_PROJECT_KIND where parentid in(".$resvalues."))  group by proid ) where count>=".count($ids)."  ) and id in(select Proid from TK_Project_KS where KID in(".$resSpecial['TECHKINDS']."0)) ");
		}else{
			//$sqlwhere["ID"]=array("exp","in(select Proid from TK_Project_KS where KID in(".$resSpecial['TECHKINDS']."0))");	
		}
		
		//添加学校筛选
		if($_GET["sid"]){
			$sqlwhere["USERID"]=$_GET["sid"];	
			$whereshow.=" <span>".$re['sid']."<font><a href=\"".U('home/Special/detailes',getparaurl($res,"sid",""))."\">".$_GET["sname"]."</a></font></span>";	
		}
		//企业信息筛选
		if($_GET["cid"]){
			$sqlwhere["USERID"]=$_GET["cid"];	
			$whereshow.=" <span>".$re['cid']."<font><a href=\"".U('home/Special/detailes',getparaurl($res,"cid",""))."\">".$_GET["cname"]."</a></font></span>";	
		}
		
		$Project=new ProjectModel('project');	
		if($resSpecial['userid']){
			$sqlwhere["USERID"]=$resSpecial['userid'];
		}
		//分页展示
		import("@.ORG.FallPage"); // 导入分页类
		$count=$Project->where($sqlwhere)->count();
	
		$page=new FallPage($count,10);
		$show=$page->show();
		
		$dataset=$Project->where($sqlwhere)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();
		/*print_r($Project);		
		exit();*/
		$hotproject=$Project->where("STATUS=0")->order("hits desc")->limit("20") ->select();		
		$this->assign('hotproject',$hotproject);
		
		//分类信息
		$Prokind=new Project_kindModel('project_kind');
		$kind=$Prokind->order("sort desc,id desc")->select();
		
		$kindres;
		foreach($kind as $value){
			$kindres[$value["id"]]=$value;
			$kindres[$value["id"]]["url"]=getparaurl2($res,"id",$value["id"],$ids);
		}
		$idskind="";
		foreach($ids as $value){
			if(is_numeric($value)){
				$idskind.=$kindres[$value]["cnname"].",";
			}
		}
		
		if($idskind){
			$whereshow.=" <span>技术分类<font><a href=\"".U('home/Special/detailes',getparaurl($res,"id",""))."\">".trim($idskind,",")."</a></font></span>";	
		}	
		
		if($whereshow){
			$whereshow="<b>已选条件：</b>".$whereshow;	
		}
		$this->assign('page',$show);		
		$this->assign('kindres',$kindres);		
		$this->assign('whereshow',$whereshow);		
		$this->assign('where',$_GET);
		$this->assign('proxx',$dataset);
		$this->assign('ids',$ids);
		
		$this->display();
	}
	public function expert()
	{ 
		if($_GET['SPID']=='')
		{ 
			$this->display();
			return;
		}
		Load('extend');
		//专题信息查询赋值
		$com=new SpecialModel('Special');
		$resSpecial=$com->where(array("ID"=>$_GET["SPID"]))->find();
		$this->assign("spe",$resSpecial);
		
		//print_r($resSpecial);
		$re=array(
			"id"=>"研究领域",
			"area"=>"地区",
			"SPID"=>1	
		);		
		//中间变量
		$res;
		foreach($re as $key=>$value){
			$res[$key]=$_GET[$key];	
		}
		
	  	$experts=new ExpertsModel('Experts');  
		
		$idstemp=split(",",$_GET["id"]);
		$ids;
		foreach($idstemp as $value){
			$ids[$value]=$value;
		}
		
		//获取ID集合
		$resvalues;
		foreach($ids as $value){
			if(is_numeric($value)){
				$resvalues.=$value.",";
			}
		}
		
		//分类ID筛选
		if($_GET["id"]&&$resvalues){
			$resvalues.="0";
			$where["ID"]=array("exp","in(select EXPID from TK_EXPERS_KS where KID in(".$resvalues.") or KID in(select id from TK_PROJECT_KIND where parentid in(".$resvalues."))) and id in(".$resSpecial['EXPERTKINDS']."0)");
		}
		else{
			$where["EKINDS"]=array("exp","in(".$resSpecial['EXPERTKINDS']."0)");
		}
		
		if($res["area"]){
			$whereshow.=" <span>区域<font><a href=\"".U('home/Special/expert',getparaurl($res,"area",""))."\">".$res["area"]."</a></font></span>";
			$where["CPROV"]=array("like","%".$res["area"]."%");
			$where["CCITY"]=array("like","%".$res["area"]."%");
			$where["COUNTY"]=array("like","%".$res["area"]."%");
		}
		
		$this->assign("ids",$ids);
		//print_r($where);
		$where["STATUS"]=0;
		import("@.ORG.FallPage"); // 导入分页类
		$count=$experts->where($where)->count();
		$page=new Page($count,10);
		$show=$page->show();
		$dataset=$experts->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();
		$hotexperts=$experts->where("STATUS=0")->order(' hits desc')->limit("8")->select();
		
		$this->assign("experts",$dataset);
		$this->assign("hotexperts",$hotexperts);
		$this->assign("page",$show);
				
		//分类信息
		$Prokind=new Project_kindModel('project_kind');
		$kind=$Prokind->order("sort desc,id desc")->select();
	
		$kindres;
		foreach($kind as $value){
			$kindres[$value["ID"]]=$value;
			$kindres[$value["ID"]]["url"]=getparaurl2($res,"id",$value["ID"],$ids);
		}
		
		$idskind="";
		foreach($ids as $value){
			if(is_numeric($value)){
				$idskind.=$kindres[$value]["CNNAME"].",";
			
			}
		}
		
		if($idskind){
			$whereshow.=" <span>研究领域<font><a href=\"".U('home/Special/expert',getparaurl($res,"id",""))."\">".trim($idskind,",")."</a></font></span>";	
		}	
		
		if($whereshow){
			$whereshow="<b>已选条件：</b>".$whereshow;	
		}
			
		$this->assign('whereshow',$whereshow);
		
		$this->assign("kindres",$kindres);
		
		$this->display();
	}
	public function pro()
	{
		if($_GET['SPID']=='')
		{ 
			$this->display();
			return;
		}
		Load('extend');
		//专题信息查询赋值
		$com=new SpecialModel('Special');
		$resSpecial=$com->where(array("ID"=>$_GET["SPID"]))->find();
		$this->assign("spe",$resSpecial);
		
		$re=array(
			"id"=>"应用行业类别",
			"gid"=>"产品类别"	,
			"SPID"=>1		
		);	
		
		
		$res;
		foreach($re as $key=>$value){
			$res[$key]=trim($_GET[$key],",");	
		}
		//拼接 查询条件
		$typeid="0";
		if($res["id"]){
			$typeid.=",".$res["id"];
		}
		if($res["gid"]){
			$typeid.=",".$res["gid"];
		}
		if($typeid!="0"){
			$sql["ID"]=array("exp","in (select goodid from tk_company_goodskinds where kindid in(".$typeid.")) and id in (".$resSpecial['PRODUCTKINDS']."0)");
		}else{
		$sql["ID"]=array("exp","in(select GOODID from TK_COMPANY_GOODSKINDS where KINDID in(".$resSpecial['PRODUCTKINDS']."0))");	
			//$sql["ID"]=array("exp","in (".$resSpecial['PRODUCTKINDS']."0)");
		}
		
		$sql["STATUS"]="0";
		
		//获取产品分类和应用类别
		$goodkind=new Company_Goods_kindModel("CompanyGoodsKind");
		$allgoodkind=$goodkind->where("KTYPE=1")->order("id asc")->select();
		$reskind;
		$idstemp=split(",",$res["id"]);
		$gidstemp=split(",",$res["gid"]);
		foreach($idstemp as $value){
			$ids[$value]=$value;	
		}
		foreach($gidstemp as $value){
			$gids[$value]=$value;	
		}
		
		foreach($allgoodkind as $value){
			$reskind[$value["ID"]]=$value;
			$reskind[$value["ID"]]["url"]=getparaurl2($res,"gid",$value["ID"],$gids);
		}
		
		$this->assign("goodkind",$reskind);
		$allgoodkind=$goodkind->where("KTYPE=0")->order("id asc")->select();
		$reskind= array();
		$reskind[0]["KNAME"]="全部";
		$reskind[0]["url"]=getparaurl($res,"id","");
		foreach($allgoodkind as $value){
			$reskind[$value["ID"]]=$value;
			$reskind[$value["ID"]]["url"]=getparaurl($res,"id",$value["ID"]);
		}
		$this->assign("goodkinds",$reskind);
		
		//应用类别_已选条件
		$idstr="";
		foreach($ids as $value){
			$idstr.=$reskind[$value]["KNAME"].",";
		}
		if(trim($idstr,","))
			$whereshow.=" <span>".$re["id"]."<font><a href=\"".U('home/Special/pro',getparaurl($res,"id",""))."\">".trim($idstr,",")."</a></font></span>";	
		$idstrr="";
		foreach($gids as $value){
			$idstrr.=$reskind[$value]["KNAME"].",";
		}
		if(trim($idstrr,","))
			$whereshow.=" <span>".$re["gid"]."<font><a href=\"".U('home/Special/pro',getparaurl($res,"gid",""))."\">".trim($idstrr,",")."</a></font></span>";	
		if($whereshow){
			$whereshow="<b>已选条件：</b>".$whereshow;	
		}
		
		$this->assign("whereshow",$whereshow);
		$this->assign("ids",$ids);
		$this->assign("gids",$gids);
		
		/*$gidstr="";
		foreach($gids as $value){
			$gidstr.=$reskind[$value]["KNAME"];
		}*/
		
		//分页展示
		$progoods=new Company_GoodsModel('CompanyGoods');
		import("@.ORG.FallPage"); // 导入分页类
			
		$count=$progoods->where($sql)->count();
		
		$page=new Page($count,10);
		$show=$page->show();
		//print_r($sql);
		$dataset=$progoods->where($sql)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();
		//print_r($progoods);
		//exit();
		$hotproject=$progoods->where("STATUS=0")->order("ID desc")->limit("20") ->select();		
		
		$this->assign('hotproject',$hotproject);
		$this->assign("page",$show);
		$this->assign("progood",$dataset);
		
		$this->display();
	}
}
?>