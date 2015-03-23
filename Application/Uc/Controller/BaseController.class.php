<?php
//首页
namespace Uc\Controller;
use Think\Controller;
class BaseController extends Controller {

	public function _initialize() {
		header("Content-Type:text/html; charset=UTF-8");
		get_active_plugins();
		//验证用户信息
		$array=array("reg","login","loginout");
		if(!in_array(ACTION_NAME, $array)){			
			$currentuser=getetcurrentuser();
			if($currentuser==null){
				header('location:'.U('Uc/User/login?returnurl='.urlencode(__SELF__)) );
				$this->display();
				return;
			}
			
			$this->assign("currentuser",$currentuser);	
		}		
		
		//验证用户是否信息完善 如果没有完善信息需要首先完善
		if($currentuser["review"]==""||$currentuser["review"]=="0"){
				header('location:' . U( 'Uc/User/suretype' ) );
				$this->display();
				return;
		}
		
		//替换模板title的值
		$seo['title']=C("site_title");
		$seo['keys']=C("site_keyword");
		$seo['desc']=C("site_description");
		$this->assign("seo",$seo);	
		//底部文章信息
		
	}
	
	
}