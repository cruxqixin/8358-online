<?php
namespace Keji\Controller;
use Think\Controller;
use Model\User_IndustryModel;
use Model\KjuserModel;
use Model\Company_KindModel;
use Model\Company_Goods_kindModel;
use Model\Company_GoodsKindsModel;
use Model\Company_GoodsModel;
use Model\SearchModel;
use Think\FallPage;
class EquipmentController extends BaseController{
	public function index(){
		$currentuser=getetcurrentuser();
		if(!$currentuser){
			header('location:' . U( 'User/login' ) );
		}
		$goodkindd=new Company_GoodsModel('CompanyGoods');
		$this->assign("user",$currentuser);
		$where['USERID']=$currentuser['id'];
		$where['TYPE']=2;
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["GADDTIME"]=array("between",array($star,$end));
		  
		
		}
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["GNAME"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		$where['STATUS']=0;
		$countt=$goodkindd->where($where)->count();//ȫҿ
		//echo $goodkindd->getlastsql();
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$goodkindd->where($where)->order('ORD desc,ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['STATUS']=1;
		$ds=$goodkindd->where($where)->count();
		$this->assign('ds',$ds);
		$where['STATUS']=2;
		$js=$goodkindd->where($where)->count();
		$this->assign('js',$js);
		$this->display();
	}
	public function indexx(){
		$currentuser=getetcurrentuser();
		if(!$currentuser){
			header('location:' . U( 'User/login' ) );
		}
		$this->assign("user",$currentuser);
		$goodkindd=new Company_GoodsModel('CompanyGoods');
		$where['USERID']=$currentuser['id'];
		$where['TYPE']=2;
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["GADDTIME"]=array("between",array($star,$end));
		  
		
		}
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["GNAME"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		
		$where['STATUS']=0;
		$ds=$goodkindd->where($where)->count();
		$this->assign('all',$ds);//ȫҿ
		
		
		$where['STATUS']=1;//սʳ
		$countt=$goodkindd->where($where)->count();//ȫҿ
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$goodkindd->where($where)->order('ORD desc, ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		
		$where['STATUS']=2;
		$weishen=$goodkindd->where($where)->count();
		$this->assign('js',$weishen);
		$this->display();
	}
	public function refuse(){
		$currentuser=getetcurrentuser();
		if(!$currentuser){
			header('location:' . U( 'User/login' ) );
		}
		$this->assign("user",$currentuser);
		$goodkindd=new Company_GoodsModel('CompanyGoods');
		$where['USERID']=$currentuser['id'];
		$where['TYPE']=2;
		if($_POST["start_time"]||$_POST["end_time"])
		{  $star=strtotime($_POST["start_time"]);
		   $end=strtotime($_POST["end_time"]); 
		  $where["GADDTIME"]=array("between",array($star,$end));
		  
		
		}
		if($_POST["keyword"]&&$_POST['keyword']!='请输入关键字'){
			$where["GNAME"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("time_start",$_POST["start_time"]);
		$this->assign("time_end",$_POST["end_time"]);
		$this->assign("keyword",$_POST['keyword']);
		
		$where['STATUS']=0;
		$ds=$goodkindd->where($where)->count();
		$this->assign('all',$ds);//ȫҿ
		
		
		$where['STATUS']=2;//ߐʳ
		$countt=$goodkindd->where($where)->count();//ȫҿ
		$page=new FallPage($countt,10);
		$show=$page->show();	
		$dataset=$goodkindd->where($where)->order('ORD desc, ID desc')->limit($page->firstRow.','.$page->listRows)->select();		
		$this->assign('page',$show);
		
		$this->assign('manu',$dataset);	
		$this->assign('count',$countt);
		$where['STATUS']=1;
		$ds=$goodkindd->where($where)->count();
		$this->assign('ds',$ds);
		
		$this->display();
	}
	public function edit(){
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		if(!$currentuser){
			header('location:' . U( 'User/login' ) );
		}
		$kind=M('Innovation');
		$list=$kind->where("userid=".$currentuser['id'])->select();
		$this->assign("xkind",$list);
		$Prokind=new Company_Goods_kindModel('CompanyGoods_kind');
		$kind=$Prokind->where('KTYPE=0 ')->select();
		
		
		$this->assign('hy',$kind);
		$com=new Company_Goods_kindModel('CompanyGoods_kind');
		$cok=new Company_GoodsKindsModel('CompanyGoodskinds'); 
		$goodkindd=new Company_GoodsModel('CompanyGoods');
		
		
		$goodkind=$com->where("KTYPE=1")->select();
		$this->assign("Prokind1",$goodkind);
		if($_GET['id']){
			$vo=$goodkindd->where("ID=".$_GET['id'])->find();
			$this->assign("article",$vo);
		    $res=$cok->where(array("GOODID"=>$_GET['id']))->select();
		    $resdata;
			foreach($res as $value){
				$resdata[]=$value["kindid"];
			}				
			$this->assign("goodkinds",implode(',',$resdata));
		}
		if($_POST){
			$data=$_POST;
			if($_POST['ID']==''){
				$data['ID']=time();
			    $data['GADDTIME']=time();
				$data['STATUS']=1;
				$data['TYPE']=2;
				$data['USERID']=$currentuser['id'];
				$add=$cok->add($data);
				$adds=$goodkindd->add($data);
				$PRO_KNAMES= $_POST["kindid"];
					$procats="";
					foreach ($PRO_KNAMES as $KINDID){
						$procats=$KINDID;
						$daa=$_POST;
						$daa["KINDID"]=$procats; 
						$daa["GOODID"]=$data['ID'];
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
						$this->success('添加成功',U('Equipment/index'));
						return;
					}else { 
						$this->success('添加成功',U('Equipment/index'));
						return;
					}
			}else{
				$da=$_POST;  
				$da['STATUS']=1;
				$save=$goodkindd->where("ID=".$_POST['ID'])->save($da);
					
				$daa["GOODID"]=$da['ID'];
				$cok->where($daa)->delete();
				$PRO_KNAMES= $_POST["kindid"];
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
						$this->success('修改成功',U('Equipment/index'));
						return;
					}else {
						$this->success('修改失败',U('Equipment/index'));
						return;
					}
			}
			
			
		}
		$this->display();
	}
	public function delete(){
		$cok=new Company_GoodsKindsModel('CompanyGoodskinds'); 
		$goodkindd=new Company_GoodsModel('CompanyGoods');
		if($_GET['id']){
			$delete=$goodkindd->where("ID=".$_GET['id'])->delete();
			$cok->where("GOODID=".$_GET['id'])->delete();
			if($delete){
				$this->success("ɾԽԉ٦");
			}
		}
	}
	
}