<?php
namespace Home\Controller;
use Think\Controller;
class JsController extends Controller{
	public function getschools(){
	  	$array=M("UsersSchoole")->where("PINYINSHORT is not null")->field("USERID,CNAME,PINYIN,PINYINSHORT,substr(PINYINSHORT,0,1) as s")->order("Pinyinshort")->select();
		$data=array();
		foreach($array as $value){
			$py=substr($value['pinyinshort'],0,1);
			$data[$py][]= $value;			
		}
		
		echo "var schools='".json_encode($data)."';";
		
	}
	public function getcompany(){
	  	$array=M("UsersCompany")->where("PINYINSHORT is not null")->field("USERID,CNAME,PINYIN,PINYINSHORT,substr(PINYINSHORT,0,1) as short")->order("Pinyinshort")->select();
		$data=array();
		foreach($array as $value){
			$py=substr($value['pinyinshort'],0,1);
			$data[$py][]= $value;			
		}
		echo "var companys='".json_encode($data)."';";
	}
}

?>