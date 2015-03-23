<?php
class ExcelAction extends BaseAction {
	public function importexcel() {
		
	
		$exceldata=getexcel();
		
		$experts=new ExpertsModel("Experts");
		$data=array();
		$count=0;
		foreach($exceldata as $key=>$value){
			$data["ENAME"]=$value[1];
			if($value[2]=="男"){
				$data["EGENDER"]="0";	
			}else{
				$data["EGENDER"]="1";	
			}
			$data["EBIRTH"]=$value[3];
			//$data["EBIRTH"]=$value[4];
			$data["ETAKEOFFICE"]=$value[5];
			$data["EWINNING"]=$value[6];
			$data["ESCIENTIFIC"]=$value[7];
			$data["EBOOKS"]=$value[8];
			$data["EPOST"]=$value[9];
			$data["EPOSTTITLE"]=$value[10];
			$data["ENITNAME"]=$value[11];
			$data["EDEPARTMENT"]=$value[12];
			$data["EADDRESS"]=$value[13];
			$data["EPOSTNO"]=$value[14];
			$data["EMOBIPHONE"]=$value[15];
			$data["EFAX"]=$value[16];
			$data["EEMAIL"]=$value[17];
			$data["ID"]=time();
			$data["STATUS"]=0;
			
		
			if(!$experts->add($data)){
				$error.=$key.",";	
			}else{
				$count++;
			}
			sleep(1);
		}
		echo "导入".$count."条数据,错误数据是".$error;
	}
	
}