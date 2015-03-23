<?php
namespace Uc\Controller;
use Think\Controller;
use Think\FallPage;
use Model\Company_Goods_kindModel;
use Model\DemandModel;
class DemandController extends BaseController {
	
	
	public function Dlist(){
		
		Load('extend');
		//判断是否完善信息
		$currentuser=getetcurrentuser();
	
		$demand=M("Demand");
		//获取当前项目信息
		$where["DUSERID"]=$currentuser["id"];	
		
		$type=$_GET["type"];
		if(!$type){
			$type="0";
		}
		
		
		
		$where["DSTATUS"]=$type;		
		//$newdemand=$demand->where($where)->order("id desc")->limit("5") ->select();		
		
		
		$where["DSTATUS"]=0;
		$count[0]=$demand->where($where)->count();
		$where["DSTATUS"]=1;
		$count[1]=$demand->where($where)->count();
		$where["DSTATUS"]=2;
		$count[2]=$demand->where($where)->count();
		$where["DSTATUS"]=10;
		$count[3]=$demand->where($where)->count();
		
		
		$this->assign('count',$count);	
		//搜索	
		if($_POST["keyword"]){
			$where["DTITLE"]=array("like","%".$_POST["keyword"]."%");
			
		}
		$this->assign("keyword",$_POST["keyword"]);
		if($_POST["time_start"]||$_POST["time_end"])
		{  $star=strtotime($_POST["time_start"]);
		   $end=strtotime($_POST["time_end"]);
		   
		  $where["DADDTIME"]=array("between",array($star,$end));
		
		}
		$this->assign("time_start",$_POST["time_start"]);
		$this->assign("time_end",$_POST["time_end"]);
		//分页展示
		
		import("@.ORG.FallPage"); // 导入分页类
		$countt=$demand->where($where)->count();
		$page=new FallPage($countt,10);
		$show=$page->show();
		$rewhre=$_GET["type"];
		if(!$rewhre){$rewhre=0;}
		$where["DSTATUS"]=$rewhre;	
		$dataset=$demand->where($where)->order(' ID desc')->limit($page->firstRow.','.$page->listRows)->select();	
	
		$this->assign('page',$show);
		$this->assign('newdemand',$dataset);	
		//$this->assign('newdemand',$newdemand);	
		
	
		
		$this->display();
	}
	
	
	//需求信息
	public function demand()
	{
	
		$currentuser=getetcurrentuser();
		$xq=new DemandModel('Demand');
		 $comgood=new Company_Goods_kindModel('CompanyGoods_kind');
		 $com=$comgood->where('KTYPE=0')->select();
		 $this->assign("hy",$com);
		if($_POST["submit"])
		{  
		   
		   	$data=$_POST;
		 
		  	$data["DUSERID"]=$currentuser["id"];
			if($data["ID"]){
				if($data["ISSHOW"]=="10"){
					$data["DSTATUS"]="10";
				}else{
						$data["DSTATUS"]="1";
						}
						$save=$xq->save($data);
						 
						 
						if($save){
							$this->success('修改成功！',U('Uc/User/center'));
						}else { 
							$this->error($Demand->getError());
				}
				 
			}else{
				 $data["ID"]=time();
				  if($data["ISSHOW"]=="10"){
						$data["DSTATUS"]="10";
					}else{
						$data["DSTATUS"]="1";
					}
					$data["DEADLINE"]=time();
					//$data["DUSERID"]= $currentuser("ID");
			   $row=$xq->add($data);
			
			   if($row)
			   {
				 $this->success('需求提交成功！',U('User/center'));
				exit();
			   }
			}
		
       }
	   
	   if($_GET["ID"]){
	   
			$where["DUSERID"]=$currentuser["id"];
		  	$where["ID"]=$_GET["ID"];
		 	$sel=$xq->where($where)->select();
		
		 	$this->assign("expertss",$sel[0]);
	   	    
	   }
	   
	   
	  	$this->display();
	}
}