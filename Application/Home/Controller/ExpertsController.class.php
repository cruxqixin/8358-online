<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\ExpertsModel;
use Home\Model\ProjectModel;
use Home\Model\Project_kindModel;
use Home\Model\Expers_KsModel;
use Home\Model\Project_ChoseModel;
use Home\Model\ArticleCateModel;
use Home\Model\LinksModel;
use Home\Model\Company_GoodsModel;
use Think\Model;
use Think\FallPage;
class ExpertsController extends BaseController{
	
	public function index(){
	  	Load('extend');
		$re=array(
			"id"=>"研究领域",
			"area"=>"地区"			
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
		/*if($_GET["id"]&&$resvalues){
			$resvalues.="0";
			$where["ID"]=array("exp","in(select EXPID from TK_EXPERS_KS where KID in(".$resvalues.") or KID in(select id from TK_PROJECT_KIND where parentid in(".$resvalues.")))");
		}
		if($res["area"]){
			$whereshow.=" <span>区域<font><a href=\"".U('home/Experts/index',getparaurl($res,"area",""))."\">".$res["area"]."</a></font></span>";
			$where["CPROV"]=array("like","%".$res["area"]."%");
			$where["CCITY"]=array("like","%".$res["area"]."%");
			$where["COUNTY"]=array("like","%".$res["area"]."%");
		}*/
		
		$this->assign("ids",$ids);
		//print_r($where);
		$where["STATUS"]=0;
		import("@.ORG.FallPage"); // 导入分页类
		$count=$experts->where($where)->count();
		$page=new FallPage($count,10);
		$show=$page->show();
		$dataset=$experts->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();
		
		$hotexperts=$experts->where("STATUS=0")->order(' hits desc')->limit("8")->select();
		
		$this->assign("experts",$dataset);
		$this->assign("exp",$dataset[0]);
		$this->assign("hotexperts",$hotexperts);
		$this->assign("page",$show);
		
		
		//分类信息
		$Prokind=new Project_kindModel('project_kind');
		$kind=$Prokind->order("sort desc,id desc")->select();
	
		$kindres;
		foreach($kind as $value){
			$kindres[$value["id"]]=$value;
			$kindres[$value["id"]]["url"]=getparaurl2($res,"id",$value["id"],$ids);
			$kindres[$value["id"]]["url"]=getparaurl2($res,"id",$value["id"],$ids);
			
		}
		
		$idskind="";
		foreach($ids as $value){
			if(is_numeric($value)){
				$idskind.=$kindres[$value]["cnname"].",";
			
			}
		}
		
		if($idskind){
			$whereshow.=" <span>研究领域<font><a href=\"".U('home/Experts/index',getparaurl($res,"id",""))."\">".trim($idskind,",")."</a></font></span>";	
		}	
		
		if($whereshow){
			$whereshow="<b>已选条件：</b>".$whereshow;	
		}
			
		$this->assign('whereshow',$whereshow);
		
		$this->assign("kindres",$kindres);
		
		$this->display();
	}
	
	public function indexx(){
	  /*	$experts=new ExpertsModel('Experts');  
		
		$where["STATUS"]=0;
		import("@.ORG.FallPage"); // 导入分页类
		$count=$experts->where($where)->count();
		$page=new Page($count,10);
		$show=$page->show();
		$dataset=$experts->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();
		
		$hotexperts=$experts->where("STATUS=0")->order(' hits desc')->limit("8")->select();
		
		$this->assign("experts",$dataset);
		$this->assign("hotexperts",$hotexperts);
		$this->assign("page",$show);*/
		$this->display();
	}
	
	public function details(){
		if (isset($_GET['id']) && trim($_GET['id'])) {
			$where["ID"]=$_GET['id'];	
			
			
			//$where["STATUS"]=0;		
			$experts=new ExpertsModel('Experts'); 
			
		
			 
			//当前ID 数量增加
			$data["HITS"]=array("exp","HITS+1");
			$experts->where($where)->save($data);		
			$data=$experts->where($where)->find(); 
			
			//发布者信息
			$user=M("Users");
			$this->assign("user",$user->where(array("ID"=>$data["USERID"]))->find());
			$this->assign('model',$data);
			
			//获取研究领域
			$projectkind=M("project_kind");
			$prokind=$projectkind->where(" id in (select KID from tk_expers_ks where expid=".$data["id"].")")->select();
			//print_r($prokind);
			$this->assign("prokind",$prokind);
			$this->assign("usertype",getusertype());
		}
		$this->display();
	}
	
	
}

?>