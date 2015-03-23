<?php
namespace Uc\Controller;
use Think\Controller;
use Model\Company_Goods_kindModel;
use Model\Company_GoodsModel;
use Model\Company_GoodsKindsModel;
use Model\SearchModel;
use Think\FallPage;
class ProController extends BaseController {

	public function addindex()
	{  
		$currentuser=getetcurrentuser();
		$Prokind=new Company_Goods_kindModel('CompanyGoods_kind');
		$goodkindd=new Company_GoodsModel('CompanyGoods');
		//产品选择的类型
		$cok=new Company_GoodsKindsModel('CompanyGoodskinds'); 
		
		if(!$_POST['submit'])
		{ 
			$kind=$Prokind->where('KTYPE=0')->select();
			$kindres;
			foreach($kind as $value){
				$kindres[$value["id"]]=$value;	
			}
			$this->assign('Prokind',$kindres);
					
			$kind1=$Prokind->where('KTYPE=1')->select();
			$kindres1;
			foreach($kind1 as $value){
				$kindres1[$value["id"]]=$value;	
			}
			$this->assign('Prokind1',$kindres1);
			
			if (isset($_GET['ID']) && trim($_GET['ID'])) {
				$id=$_GET['ID'];
				$where['ID']=$id;
				//获取商品选择的类型
				$res=$cok->where(array("GOODID"=>$_GET['ID']))->select();
				$resdata;
				foreach($res as $value){
					$resdata[]=$value["kindid"];
				}
				
				$this->assign("goodkinds",implode(',',$resdata));
			}
			
			if($id!='')
			{
				$god=$goodkindd->where($where)->select();
				$this->assign('Project',$god[0]);
			}
		}
		
		if($_GET['ID']=='')
		{  
			//post回传处理
			if ($_POST['submit'])
			{ 
				//添加或编辑
				if($_POST['ID']=='') 
				{ 		
					// 添加
					$da=$_POST;
					//$da['ADDTIME']=time();
					$da['ID']=time();
					$da['GCODE']=getgoodno();
					$da['GADDTIME']=time();
					$da['USERID']=$currentuser['id'];
					$da['STATUS']=1;
					$row=$goodkindd->add($da);  
					changeprono(8);
					$PRO_KNAMES= $_POST["PRO_KNAMES"];
					$procats="";
					foreach ($PRO_KNAMES as $KINDID){
						$procats=$KINDID;
						$daa=$_POST;
						$daa["KINDID"]=$procats; 
						$daa["GOODID"]=$da['ID'];
						$cok->add($daa);
					}
					
					if ($row){ 
					$search=new SearchModel('Search');
				 $str=$da["ID"].$da["USERID"].$da['GNAME'].$da['GDESC'].$da['GUSER'].$da['GPHONE'].$da['STATUS'].$da['HITS'].$da['GPIC'].$da['GADDTIME'].$da['GCOMNAME'].$da['GCODE'];
				 $data["SEARCHCONTENT"]= strip_tags($str);
				 $strr=substr($da["GDESC"],0,30);
				 $data["SEARCHDESP"]=strip_tags($strr);
				 $data["ID"]=time();
				 $data["TYPEID"]=2;
				 $data["ITEMID"]=$da["ID"];
				  $data["STITLE"]=$da["GNAME"];
				 $search->add($data);
						$this->success('添加成功！',U(''));
						return;
					}else { 
						$this->error($Project->getError());
						return;
					}
					
				}
				else
				{	 
					//编辑		
					$da=$_POST;   
					$da['STATUS']=1;
					$save=$goodkindd->where("ID=".$_POST['ID'])->save($da);
					
					$daa["GOODID"]=$da['ID'];
					$cok->where($daa)->delete();
					$PRO_KNAMES= $_POST["PRO_KNAMES"];
					$procats="";
					foreach ($PRO_KNAMES as $KINDID){
						$procats=$KINDID;
						$daa=$_POST;
						$daa["KINDID"]=$procats; 
						$daa["GOODID"]=$da['ID'];
						$cok->add($daa);
					}
					
					if($save){
					$search=new SearchModel('Search');
				 $str=$da["ID"].$da["USERID"].$da['GNAME'].$da['GDESC'].$da['GUSER'].$da['GPHONE'].$da['STATUS'].$da['HITS'].$da['GPIC'].$da['GADDTIME'].$da['GCOMNAME'].$da['GCODE'];
				 $strr=substr($da["GDESC"],0,30);
				 $datae["SEARCHCONTENT"]= strip_tags($str);
				 $datae["SEARCHDESP"]=strip_tags($strr);
				 $datae["ID"]=time();
				 $datae["TYPEID"]=2;
				 $datae["ITEMID"]=$da["ID"];
				  $datae["STITLE"]=$da["GNAME"];
				 $search->where('ITEMID='.$da["ID"])->save($datae);
						$this->success('修改成功！',U(''));
						return;
					}else {
						$this->error($Project->getError());
						return;
					}
				}
			}
		}
		$this->display();
	}
	
	
	public function listt()
	{
		Load('extend');
		//判断是否完善信息
		$currentuser=getetcurrentuser();
		$good=new Company_GoodsModel('CompanyGoods');
		//获取当前项目信息
		$where["USERID"]=$currentuser["id"];	
		$where["STATUS"]="0";	
		$count[0]=$good->where($where)->count();
		$where["STATUS"]="1";
		$count[1]=$good->where($where)->count();
		$where["STATUS"]="2";
		$count[2]=$good->where($where)->count();
		$where["STATUS"]="10";
		$count[3]=$good->where($where)->count();
		$whe["USERID"]=$currentuser["id"];
		$count1=$good->where($whe)->count();
		$this->assign('count1',$count1[0]);
		
		$type=$_GET["type"];
		if(!$type){
			$type=0;	
		}
		$where["STATUS"]=$type;
		
	
	
		if (isset($_GET['ID']) && trim($_GET['ID'])) {
			$id=$_GET['ID'];
		}
		//搜索	
		if($_POST["keyword"]){
			$where["GNAME"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("keyword",$_POST["keyword"]);
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["GADDTIME"]=array("between",array($star,$end));
		
		}
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		//分页展示
		import("@.ORG.FallPage"); // 导入分页类
		$countt=$good->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		
		$dataset=$good->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		//print_r($page);
		
		//$data=$good->where($where)->order("id desc")->limit("5") ->select();		
		$this->assign('page',$show);	
		$this->assign("COM",$dataset);
		$this->assign("companyname",getcompanyname());
		$this->assign("prostatus",projectstats());
		$this->assign('newproject',$newproject);
		$this->assign('Prochose1',$res1);		
		$this->assign('count',$count);
		
		$this->display();
	}
	
	
}
?>