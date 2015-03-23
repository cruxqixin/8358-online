<?php
class ServiceAction extends BaseAction {
	public function index() {
	   Load('extend');
	   $xq=new DemandModel('Demand');
	   $sel=$xq->limit("50")->select();
	   $this->assign("experts",$sel);
	   $this->assign("hotexperts",$sel);
		$this->display();
	}
	
	public function detials()
	{ 
		Load('extend');
		 $xq=new DemandModel('Demand');
		   $sel=$xq->limit("50")->select();
			$this->assign("model",$sel[0]);
		  
		   $sel=$xq->limit("10")->select();
		   $this->assign("hotexperts",$sel);
		  $this->display();
		}
	
	}
	?>