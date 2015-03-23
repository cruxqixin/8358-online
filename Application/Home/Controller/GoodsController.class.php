<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\ExpertsModel;
use Home\Model\ProjectModel;
use Home\Model\Project_kindModel;
use Home\Model\Expers_KsModel;
use Home\Model\Project_ChoseModel;
use Home\Model\Company_Goods_kindModel;
use Home\Model\LinksModel;
use Home\Model\Company_GoodsModel;
use Model\UsersModel;
use Model\Users_CompanyModel;
use Think\Model;
use Think\FallPage;
class GoodsController extends BaseController {

	public function index()
	{ 
	
		Load('extend');
		$re=array(
			"id"=>"应用行业类别",
			"gid"=>"产品类别"			
		);	
		
		
       $res;
		foreach($re as $key=>$value){
			$res[$key]=trim($_GET[$key],",");	
		}
		//拼接 查询条件
		$typeid="";
		if($res["id"]){
			$typeid.=$res["id"].",";
		}
		if($res["gid"]){
			$typeid.=$res["gid"].",";
		}
		
		$typeid=trim($typeid,",");
		if($typeid){
			$wh="select goodid from tk_company_goodskinds where (kindid in(".$typeid.") or kindid in(select id from TK_COMPANY_GOODS_KIND where parentid in(".$typeid.")))";
		    
			//$sql["ID"]=array("exp","in ( )");
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
			$reskind[$value["id"]]=$value;
			$reskind[$value["id"]]["url"]=getparaurl2($res,"gid",$value["id"],$gids);
		}
		
		//应用类别_已选条件
		foreach($gids as $value){
			if(is_numeric($value)){
				$idskind.=$reskind[$value]["kname"].",";
			}
		}
		
		if($idskind){
			$whereshow.=" <span>产品类别<font><a href=\"".U('home/Goods/index',getparaurl($res,"gid",""))."\">".trim($idskind,",")."</a></font></span>";	
		}
		
		$this->assign("goodkind",$reskind);
		$allgoodkind=$goodkind->where("KTYPE=0")->order("id asc")->select();
		$reskind= array();
		$reskind[0]["kname"]="全部";
		$reskind[0]["url"]=getparaurl($res,"id","");
		foreach($allgoodkind as $value){
			$reskind[$value["id"]]=$value;
			$reskind[$value["id"]]["url"]=getparaurl($res,"id",$value["id"]);
		}
		$this->assign("goodkinds",$reskind);
		//print_r($reskind);
		
		
		$idstrr="";
		foreach($gids as $value){
			$idstrr.=$reskind[$value]["kname"].",";
		}
		if(trim($idstrr,","))
			$whereshow.=" <span>".$re["gid"]."<font><a href=\"".U('home/Goods/index',getparaurl($res,"id",""))."\">".trim($idstrr,",")."</a></font></span>";	
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
		
		$page=new FallPage($count,10);
		$show=$page->show();
		$dataset=$progoods->where($sql)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();
		
		$hotproject=$progoods->where("STATUS=0")->order("ID desc")->limit("20") ->select();		
		
		$this->assign('hotproject',$hotproject);
		$this->assign("page",$show);
		$this->assign("progood",$dataset);
		
		$this->display();
	}
	
	public function details()
	{   
	    $currentuser=getetcurrentuser();
		$comgood=new Company_GoodsModel('CompanyGoods');
		if($_GET['id'])
		{
			$id=$_GET["id"];
			
			$cx=$comgood->where('ID='.$id)->select();
		
			
			$ids=$_GET['ids'];
			$user=new UsersModel('Users');
			//$lxr=$user->where('ID='.$cx[0]["USERID"])->select();
			$lxr=$user->where('ID='.$cx[0]["userid"])->select();
			
			$this->assign("Project1",$lxr[0]);
			
			
			$usercom=new Users_CompanyModel('UsersCompany');
			$addre=$usercom->where('USERID='.$cx[0]["userid"])->select();
			
			$this->assign("Project2",$addre[0]);
			$kind=new Model('');
			$sql='select KNAME from tk_company_goods_kind where ktype=1 and id in(select kindid from tk_company_goodskinds where goodid='.$id.')';
			$ex=$kind->query($sql);
			$this->assign("kinds",$ex);
			$sqll='select KNAME from tk_company_goods_kind where ktype=0 and id in(select kindid from tk_company_goodskinds where goodid='.$id.')';
			$ee=$kind->query($sqll);
			$this->assign("kindd",$ee);
			
			$this->assign("model",$cx[0]);
			//更新点击量
			$cx[0]['HITS']=$cx[0]['HITS']+1;
			$comgood->save($cx[0]);
		}
		$this->display();
	}
}


?>