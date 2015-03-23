<?php
namespace Home\Controller;
use Think\Controller;
use Model\SuggesModel;
class TiyiController extends BaseController{
	public function index(){
	   $this->display();
	}
	
	
	public function submit()
{  
  $ly=new SuggesModel('Sugges'); 
   if($_POST["submitt"]){
			$data=$_POST;
	
			//添加
			        $data["IP"]=get_client_ip();
              
				    $data['ID']=date("Ymd");
					 $data['STATUS']=0;
					
				$row=$ly->add($data);
				
			  if($row)
			  {
			  
			    $this->success('添加成功！',U('Tiyi/index'));
			  }
			
			
		}
		else
		{
		  print_r(空值);
		}
}
		
}




?>