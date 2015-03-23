<?php
//首页
namespace Home\Controller;
use Think\Controller;
use Home\Model\AdModel;
use Home\Model\SpecialModel;
use Home\Model\ArticleModel;
use Home\Model\Company_Goods_kindModel;
use Home\Model\ArticleCateModel;
use Home\Model\LinksModel;
use Home\Model\Company_GoodsModel;
use Think\Model;
class IndexController extends BaseController {
    public function index(){		
		Load('extend');
		//首页会议专题展示
		$hyzt=new AdModel('Ad');
		$hy=$hyzt->where("ADTYPE=(select ID from TK_ADSPACE where TNAME='会议专题')")->select();
		$this->assign("hyzt",$hy);
		//首页热门专题图片显示
		$spe=new SpecialModel('Special');
		$zt=$spe->select();
		$this->assign("spe",$zt);
		$zt1=$spe->where('SORT=2')->select();
		$this->assign("spe1",$zt1[0]);
		$zt2=$spe->where('SORT=3')->select();
		$this->assign("spe2",$zt2[0]);
		//首页图片显示
		$art=new ArticleModel('Article');
		$com=$art->order('ADD_TIME desc')->where('STATUS=6 and ORD=1')->select();
		$comm=$art->order('ADD_TIME desc')->where('STATUS=6 and ORD=2')->select();
		$this->assign("pic",$com[0]);
		$this->assign("picc",$comm[0]);
		//获取首页最新项目		
		$proManager=M("project");
		$newproject=$proManager->where("STATUS=0")->order("ID desc")->limit("15") ->select();		
		$this->assign('newproject',$newproject);
		//最新专家
		$experts=M("Experts");
		$newexperts=$experts->where("STATUS=0")->order("ID desc")->limit("15") ->select();		
		$this->assign('newexperts',$newexperts);
		//最新产品
		$good=new Company_GoodsModel("CompanyGoods");
		$comgood=$good->where("STATUS=0")->order("ID desc")->limit("15") ->select();		
		$this->assign('newproducts',$comgood);
		
		//获取有效专家和项目的数量
		$count[0]=$proManager->where("STATUS=0")->count();
		$count[1]=$experts->where("STATUS=0")->count();
		$count[2]=$good->where("STATUS=0")->count();
		$this->assign("count",$count);
		
		//分类信息
		$prokindmanager=M("project_kind");
		$allkind=$prokindmanager->where("PARENTID=0")->order("SORT desc,id desc")->limit("12")->select();
		
		foreach($allkind as $i=>$item){
			$itemcount=$item["CNNEXTCOUNT"];
			if(!$itemcount){
				$itemcount=5;
			}
			$kind=new Model('');
			$sql="select PROID AS KID from TK_PROJECT_KS where KID in(".$item["id"].") or KID in(select ID from TK_PROJECT_KIND where PARENTID in(".$item["id"]."))";
			$sw=$kind->query($sql);
			$ids="";
			foreach($sw as $id){
				$ids.=$id['kid'];
				$ids.=",";
			}
			$ids=trim($ids,",");
			
			$sql1="select  distinct EXPID from TK_Expers_KS where KID in (".$item["id"].") or  KID  in(select ID from TK_PROJECT_KIND where PARENTID in(".$item["id"]."))";
			$kinds=$kind->query($sql1);
			
			$expid="";
			foreach($kinds as $id){
				if($id['expid']){
					$expid.=$id['expid'];
				    $expid.=",";
				}
				
			}
			$expid=trim($expid,",");
			
			//print_r($kindids);
			$allkind[$i]["childs"]=$prokindmanager->where("PARENTID=".$item["id"])->order("SORT desc,ID desc")->limit($itemcount)->select();
			$allkind[$i]["counts"]=$proManager->where("STATUS=0 and ID in (".$ids.")")->count();
			if($expid){
			//print_r($expid);
				$allkind[$i]["countsexp"]=$experts->where("STATUS=0 and ID in (".$expid.")")->count();
			//echo $experts->getlastsql();
				
			}else{
				$allkind[$i]["countsexp"]=0;
			}
			
			
		}
		
		$this->assign('allkind',$allkind);
		
		//产品
		//行业类别
		$goodkind=new Company_Goods_kindModel("CompanyGoodsKind");
		$allgoodkind=$goodkind->where("parentid=0 and KTYPE=0")->order("id asc")->select();
		//foreach($allgoodkind as $i=>$item){
		//	$itemcount=$item["CNNEXTCOUNT"];
		//	if(!$itemcount){
		//		$itemcount=5;
		//	}
		//	$allgoodkind[$i]["childs"]=$goodkind->where("PARENTID=".$item["ID"])->order(" id asc ")->limit($itemcount)->select();
		//}				
		$this->assign("goodkind",$allgoodkind);
		
		$allgoodkind=$goodkind->where("parentid=0 and KTYPE=1")->order("id asc")->limit("12")->select();
		foreach($allgoodkind as $i=>$item){
			$itemcount=$item["cnnextcount"];
			if(!$itemcount){
				$itemcount=5;
			}
			$sqls="select GOODID as KINDID from TK_COMPANY_GOODSKINDS where KINDID in(".$item["id"].") or KINDID in(select id from TK_COMPANY_GOODS_KIND where parentid in(".$item["id"]."))";
			$kinds=$kind->query($sqls);
			$proid="";
			foreach($kinds as $id){
				$proid.=$id['kindid'];
				$proid.=",";
			}
			$proid=trim($proid,",");
			
			$allgoodkind[$i]["childs"]=$goodkind->where("PARENTID=".$item["id"])->order(" id asc ")->limit($itemcount)->select();
			if($proid){
			
				$allgoodkind[$i]["procounts"]=$good->where("STATUS=0 and ID in (".$proid.")")->count();
			}else{
				
				$allgoodkind[$i]["procounts"]=0;
			}
			
			
		}				
		$this->assign("goodkindtype",$allgoodkind);
		
		//首页标签
		$tag=M('Tags');
		$datt=$tag->order('TAG_ID desc')->limit("21")->select();
		$this->assign('tag',$datt);
		
		 $Pro=new ArticleCateModel('ArticleCate');   
		
			$da=$Pro->order(' ID desc')->select(); 
			$this->assign('Artb',$da[0]);
		
	 	$this->assign('news',getarticleindex(424,18));
		//首页文章
	 	$this->assign('Art1',getarticleindex(425,9));
	  	$this->assign('Arta',getarticleindex(421,2));
	  	$this->assign('Art2',getarticleindex(461,9));
	  	$this->assign('Artb',getarticleindex(461,2));
	  	$this->assign('Art3',getarticleindex(462,9));
	  	$this->assign('Artc',getarticleindex(462,2));
		$link=new LinksModel('Links');
		$lj=$link->select();
        $this->assign("Artw",$lj);
       $this->buildHtml('1', HTML_PATH . '/index/', 'index', 'utf8');
		$this->display();
    }
	
}