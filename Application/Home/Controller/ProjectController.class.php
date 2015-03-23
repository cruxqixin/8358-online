<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\ReportModel;
use Home\Model\ProjectModel;
use Home\Model\Project_kindModel;
use Home\Model\Project_ChoseModel;
use Home\Model\ArticleCateModel;
use Home\Model\LinksModel;
use Home\Model\Company_GoodsModel;
use Think\Model;
use Think\FallPage;
class ProjectController extends BaseController{
	public function indexx(){
	
	   	$xq=new ReportModel('Report');
		$sel=$xq->select();
		$this->assign("cons",$sel);
	//  $this->display();
	}

	public function index(){
	
	  	Load('extend');
		$re=array(
			"id"=>"技术分类",
			"coop"=>"合作方式",
			"inven"=>"发明情况",
			"patent"=>"专利情况",
			"funds"=>"资金需求",
			"cid"=>"企业",
			"sid"=>"学校",
			"sname"=>"企业名称",
			"cname"=>"学校名称"
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
			
			if($res["coop"]&&$value["ID"]==$res["coop"]){
				$whereshow.=" <span>".$re['coop']."<font><a href=\"".U('home/Project/index',getparaurl($res,"coop",""))."\">".$value["title_cn"]."</a></font></span>";
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
				$whereshow.=" <span>".$re['inven']."<font><a href=\"".U('home/Project/index',getparaurl($res,"inven",""))."\">".$value["title_cn"]."</a></font></span>";
			}
		}
		
		$data2;		
		$data2[0]["title_cn"]="全部";
		$data2[0]["url"]=getparaurl($res,"patent","");
		$temp=$Pro_Chose->order('sort desc,ID asc')->where('TYPEID=2')->select();
		foreach($temp as $key=>$value){
			$data2[$value["id"]]=$value;
			$data2[$value["id"]]["url"]=getparaurl($res,"patent",$value["id"]);
			if($res["patent"]&&$value["ID"]==$res["patent"]){				
				$whereshow.=" <span>".$re['patent']."<font><a href=\"".U('home/Project/index',getparaurl($res,"patent",""))."\">".$value["title_cn"]."</a></font></span>";
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
				$whereshow.=" <span>".$re['funds']."<font><a href=\"".U('home/Project/index',getparaurl($res,"funds",""))."\">".$value["title_cn"]."</a></font></span>";
			}
		}
		
		
		//$data2=$Pro_Chose->order(' ID desc')->where('TYPEID=2 and rownum< 6')->select();
		//$data3=$Pro_Chose->order(' ID desc')->where('TYPEID=3 and rownum< 6')->select();
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
		$kind=new Model('');
		//分类ID筛选
		if($_GET["id"]&&$resvalues){
			$resvalues.="0";
		    $str="select proid from(select proid,count(*) as count from TK_PROJECT_KS where KID in(".$resvalues.") or KID in(select id from TK_PROJECT_KIND where parentid in(".$resvalues."))  group by proid ) where count>=".count($ids);
			$list=$kind->query($str);
			if($list){
				$sqlwhere["ID"]=array("exp","in(select proid from(select proid,count(*) as count from TK_PROJECT_KS where KID in(".$resvalues.") or KID in(select id from TK_PROJECT_KIND where parentid in(".$resvalues."))  group by proid ) where count>=".count($ids)."  )");		
			}
		}
		//添加学校筛选
		if($_GET["sid"]){
			$sqlwhere["USERID"]=$_GET["sid"];	
			$whereshow.=" <span>".$re['sid']."<font><a href=\"".U('home/Project/index',getparaurl($res,"sid",""))."\">".$_GET["sname"]."</a></font></span>";	
		}
		//企业信息筛选
		if($_GET["cid"]){
			$sqlwhere["USERID"]=$_GET["cid"];	
			$whereshow.=" <span>".$re['cid']."<font><a href=\"".U('home/Project/index',getparaurl($res,"cid",""))."\">".$_GET["cname"]."</a></font></span>";	
		}
		
		$Project=new ProjectModel('project');		
		//分页展示
		//import("@.ORG.FallPage"); // 导入分页类
		$count=$Project->where($sqlwhere)->count();
		
		$page=new FallPage($count,10);
		$show=$page->show();
		//print_r($sqlwhere);
		$dataset=$Project->where($sqlwhere)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();
		//print_r($Project);		
		//echo $Project->getlastsql();
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
			$whereshow.=" <span>技术分类<font><a href=\"".U('home/Project/index',getparaurl($res,"id",""))."\">".trim($idskind,",")."</a></font></span>";	
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
	
	
	
	
	public function detials(){
	
		Load('extend');
		if (isset($_GET['id']) && trim($_GET['id'])) {
			$where["ID"]=$_GET['id'];
			
			$Pro_Chose=new ProjectModel('Project');  
			//当前ID 数量增加
			$data["HITS"]=array("exp","HITS+1");
			$Pro_Chose->where($where)->save($data);
			
			$data=$Pro_Chose->order(' ID desc')->where($where)->select(); 
			$this->assign('Project',$data[0]);
			$this->assign('Project1',$data[0]);
			
			
		}
		
		$this->display();
	}
	
	public function doexport(){		
		$prochose=new Project_ChoseModel('project_chose'); 
		$proc=$prochose->select();
		$chose=array();
		foreach($proc as $key=>$value){
			$chose[$value["ID"]]=$value["TITLE_CN"];
		}
		
		$prokind=new Project_kindModel("project_kind");
		$prokinds=$prokind->select();
		$kind=array();
		
		foreach($prokinds as $key=>$value){
			$kind[$value["ID"]]=$value["CNNAME"];
		}
		
		$usersdal=new UsersModel('users');
		$users=$usersdal->field("ID,NICKNAME")->select();
		$userarray=array();
		foreach($users as $key=>$value){
			$userarray[$value["ID"]]=$value["NICKNAME"];
		}
		
		
		
		//print_r($kind);
		
		$res=M('')->query("select ID,USERID,PRO_NAME,PRO_COOPTYPE_NAME,PRO_STAGE,PRO_PATENTTYPE,PRO_FUNDS ,PRO_INTRO,PRO_SUPERIORITY,PRO_SPHERE,PRO_BENEFIT,PRO_PRODUCTION,PRO_CONTACT,PRO_PHONE,PRO_EMAIL,PRO_CONUNITADD from TK_PROJECT order by UserID");
		
		$pro_ks=new Project_KsModel("ProjectKs");
		
		//1395646340
		$array_repla=array("\r\n", "\r","\t", "\n","	","　","\ta",chr(9),"	");
		foreach($res as $key=>$value){
		//echo $key;
			$res[$key]["PRO_STAGE"]=$chose[$res[$key]["PRO_STAGE"]];
			$res[$key]["PRO_PATENTTYPE"]=$chose[$res[$key]["PRO_PATENTTYPE"]];
			$res[$key]["PRO_FUNDS"]=$chose[$res[$key]["PRO_FUNDS"]];
			
			$res[$key]["USERID"]=$userarray[$res[$key]["USERID"]];
			
			$ks=$pro_ks->where(array("PROID"=>$value["ID"]))->select();
			
			// $res[$key]["PRO_INTRO"]=str_replace($array_repla, "",strip_tags($res[$key]["PRO_INTRO"]));
		
			// $res[$key]["PRO_SUPERIORITY"]= str_replace($array_repla, "",strip_tags($res[$key]["PRO_SUPERIORITY"]));//strip_tags($res[$key]["PRO_SUPERIORITY"]);
			// $res[$key]["PRO_SPHERE"]=str_replace($array_repla, "",strip_tags($res[$key]["PRO_SPHERE"]));//strip_tags($res[$key]["PRO_SPHERE"]);
			// $res[$key]["PRO_BENEFIT"]= str_replace($array_repla, "",strip_tags($res[$key]["PRO_BENEFIT"]));//strip_tags($res[$key]["PRO_BENEFIT"]);
			// $res[$key]["PRO_PRODUCTION"]=str_replace($array_repla, "",strip_tags($res[$key]["PRO_PRODUCTION"]));//strip_tags($res[$key]["PRO_PRODUCTION"]);
			
			$kstemp="";
			foreach($ks as $k=>$v){
				$kstemp.=$kind[$v["KID"]].",";
			}
			$res[$key]["PRO_KINDS"]=trim($kstemp,",");	
			
		}
		
	
	
		
	$this->doexportexcel($res,array("ID","用户名称","技术名称","合作方式","发明情况","专利情况","资金需求","项目描述","主要优势及技术指标","应用领域","市场前景及经济效益","联系人","电话","邮箱","地址","投产条件","技术类别"),123);

	exit();
	}
	
	
	function doexportexcel($data=array(),$title=array(),$filename='report')
	{
		header ( "Content-type:application/vnd.ms-excel" );
		header ( "Content-Disposition:filename=csat.xls" );
		echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
		<html xmlns='http://www.w3.org/1999/xhtml'>
		<head>
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		<title>excel</title>
		<style>
		
		.title{
			
			font-weight:bold;
		}
		</style>
		</head>
		 
		<body>
		<table width='800' border='1'>
		  ";
		  echo "<tr>";
		foreach($title as $key=>$value){
			echo "<td class='title'>";
			echo $value;
			echo "</td>";
		}
		echo "</tr>";
		foreach($data as $key=>$value){
			echo "<tr>";
			echo "<td>".$value["ID"]."</td>";
			echo "<td>".$value["USERID"]."</td>";
			echo "<td>".$value["PRO_NAME"]."</td>";
			echo "<td>".$value["PRO_COOPTYPE_NAME"]."</td>";
			echo "<td>".$value["PRO_STAGE"]."</td>";
			echo "<td>".$value["PRO_PATENTTYPE"]."</td>";
			echo "<td>".$value["PRO_FUNDS"]."</td>";
			echo "<td>".$value["PRO_INTRO"]."</td>";
			echo "<td>".$value["PRO_SUPERIORITY"]."</td>";
			echo "<td>".$value["PRO_SPHERE"]."</td>";
			echo "<td>".$value["PRO_BENEFIT"]."</td>";
			echo "<td>".$value["PRO_PRODUCTION"]."</td>";
			echo "<td>".$value["PRO_CONTACT"]."</td>";
			echo "<td>".$value["PRO_PHONE"]."</td>";
			echo "<td>".$value["PRO_EMAIL"]."</td>";
			echo "<td>".$value["PRO_CONUNITADD"]."</td>";
			
			
			echo "<td>".$value["PRO_KINDS"]."</td>";
			echo "</tr>";
		}
		
		echo "
		</table>
		</body>
		</html>
		";
    }
	
	
	
}

?>