<?php
class PerfectAction extends BaseAction {
	
	public function personal() {
	 $currentuser=getetcurrentuser();
	 $userper=new Users_PersonalModel('UsersPersonal');
	 $user=new UsersModel('Users');
     $id='';
	 $where["ID"]=$currentuser["ID"];
	 $sqlwhere["USERID"]=$currentuser["ID"];
	 $com=$user->where($where)->select();
	 $this->assign("user",$com[0]);
	 $con=$userper->where($sqlwhere)->select();
	 $this->assign("userper",$con[0]);
		
			//post回传处理
			if ($_POST['submit'])
			{ 
				//添加或编辑
				if($_POST['ID']=='') 
				{ 		
					
					// 添加			
					$da=$_POST;  
								
					$da['USERID']=$currentuser["ID"];
					
					$row=$userper->add($da);   
					 //添加头像
				    $us['FACE']=$da['FACE'];  
				    $where["ID"]=$currentuser["ID"];
				    $sa=$user->where($where)->save($us);
					if ($row){ 
						
							$this->success('保存成功！');
							exit();
					
					}else { 
						
						$this->error($Project->getError());
						exit();
					}
				}
				else
				{	 
					//编辑		
					$da=$_POST;   
					$us['FACE']=$da['FACE'];  
				   $where["ID"]=$currentuser["ID"];
				   $sa=$user->where($where)->save($us);
				   
					$sqlwhere["USERID"]=$currentuser["ID"];
					$save=$userper->where($sqlwhere)->save($da);
					if($save){
						$this->success('保存成功！');
						exit();
					}else {
						
						$this->error($Project->getError());
						exit();
					}
					
				}
				
			}
		
	    $this->display();
		}
		public function company() {
		 $currentuser=getetcurrentuser();
		 //行业、企业性质绑定
		 $com=new Company_KindModel('CompanyKind');
		 $date=$com->order("ID desc")->where("TYPE=0")->select();
		 $this->assign("xz",$date);
		 $da=$com->order("ID desc")->where("TYPE=1")->select();
		 $this->assign("hy",$da);
		 //用户基本信息绑定
		
	 $userper=new Users_CompanyModel('UsersCompany');
	 $user=new UsersModel('Users');
     $id='';
	 $where["ID"]=$currentuser["ID"];
	 $sqlwhere["USERID"]=$currentuser["ID"];
	 $com=$user->where($where)->select();
	 $this->assign("user",$com[0]);
	 $con=$userper->where($sqlwhere)->select();
	 $this->assign("userper",$con[0]);
		
			//post回传处理
			if ($_POST['submit'])
			{  
			  
				//添加或编辑
				if($_POST['ID']=='') 
				{ 		
				  
					// 添加			
					$da=$_POST;  
								
					$da['USERID']=$currentuser["ID"];
					
					$row=$userper->add($da);   
					 //添加头像
				    $us['FACE']=$da['FACE'];  
				    $where["ID"]=$currentuser["ID"];
				    $sa=$user->where($where)->save($us);
				  
					if ($row){ 
						
							$this->success('保存成功！');
							exit();
					
					}else { 
						
						$this->error($Project->getError());
						exit();
					}
				}
				else
				{	 
				   $user=new UsersModel('Users');
					//编辑		
					$da=$_POST; 
					$us['FACE']=$da['FACE'];  
				   $where["ID"]=$currentuser["ID"];
				   $sa=$user->where($where)->save($us);
				   
					$sqlwhere["USERID"]=$currentuser["ID"];
					$save=$userper->where($sqlwhere)->save($da);
					if($save){
						$this->success('保存成功！');
						exit();
					}else {
						
						$this->error($Project->getError());
						exit();
					}
					
				}
				
			}
	    $this->display();
	
		}
		public function gov() {
		 $currentuser=getetcurrentuser();
		 //用户基本信息绑定
		
	 $userper=new UsersGovModel('UsersGov');
	 $user=new UsersModel('Users');
     $id='';
	 $where["ID"]=$currentuser["ID"];
	 $sqlwhere["USERID"]=$currentuser["ID"];
	 $com=$user->where($where)->select();
	 $this->assign("user",$com[0]);
	 $con=$userper->where($sqlwhere)->select();
	 $this->assign("userper",$con[0]);
		
			//post回传处理
			if ($_POST['submit'])
			{ 
				//添加或编辑
				if($_POST['ID']=='') 
				{ 		
					
					// 添加			
					$da=$_POST;  
								
					$da['USERID']=$currentuser["ID"];
					
					$row=$userper->add($da);   
					 //添加头像
				    $us['FACE']=$da['FACE'];  
				    $where["ID"]=$currentuser["ID"];
				    $sa=$user->where($where)->save($us);
					if ($row){ 
						
							$this->success('保存成功！');
							exit();
					
					}else { 
						
						$this->error($Project->getError());
						exit();
					}
				}
				else
				{	 
					//编辑		
					$da=$_POST;   
					$us['FACE']=$da['FACE'];  
				   $where["ID"]=$currentuser["ID"];
				   $sa=$user->where($where)->save($us);
				   
					$sqlwhere["USERID"]=$currentuser["ID"];
					$save=$userper->where($sqlwhere)->save($da);
					if($save){
						$this->success('保存成功！');
						exit();
					}else {
						
						$this->error($Project->getError());
						exit();
					}
					
				}
				
			}
	    $this->display();
	
		}
		public function school() {
		 $currentuser=getetcurrentuser();
		 //用户基本信息绑定
		
	 $userper=new UsersSchooleModel('UsersSchoole');
	 $user=new UsersModel('Users');
     $id='';
	 $where["ID"]=$currentuser["ID"];
	 $sqlwhere["USERID"]=$currentuser["ID"];
	 $com=$user->where($where)->select();
	 $this->assign("user",$com[0]);
	 $con=$userper->where($sqlwhere)->select();
	 $this->assign("userper",$con[0]);
		
			//post回传处理
			if ($_POST['submit'])
			{ 
				//添加或编辑
				if($_POST['ID']=='') 
				{ 		
					
					// 添加			
					$da=$_POST;  
								
					$da['USERID']=$currentuser["ID"];
					
					$row=$userper->add($da);   
					
					 //添加头像
				    $us['FACE']=$da['FACE'];  
				    $where["ID"]=$currentuser["ID"];
				    $sa=$user->where($where)->save($us);
					if ($row){ 
						
							$this->success('保存成功！');
							exit();
					
					}else { 
						
						$this->error($Project->getError());
						exit();
					}
				}
				else
				{	 
					//编辑		
					$da=$_POST;   
					$us['FACE']=$da['FACE'];  
				   $where["ID"]=$currentuser["ID"];
				   $sa=$user->where($where)->save($us);
					$sqlwhere["USERID"]=$currentuser["ID"];
					$save=$userper->where($sqlwhere)->save($da);
					if($save){
						$this->success('保存成功！');
						exit();
					}else {
						
						$this->error($Project->getError());
						exit();
					}
					
				}
				
			}
	    $this->display();
	
		}
		public function caste() {
		 $currentuser=getetcurrentuser();
		 //用户基本信息绑定
		
	 $userper=new UserCasteModel('UserCaste');
	 $user=new UsersModel('Users');
     $id='';
	 $where["ID"]=$currentuser["ID"];
	 $sqlwhere["USERID"]=$currentuser["ID"];
	 $com=$user->where($where)->select();
	 $this->assign("user",$com[0]);
	 $con=$userper->where($sqlwhere)->select();
	 $this->assign("userper",$con[0]);
		
			//post回传处理
			if ($_POST['submit'])
			{ 
				//添加或编辑
				if($_POST['ID']=='') 
				{ 		
					
					// 添加			
					$da=$_POST;  
								
					$da['USERID']=$currentuser["ID"];
					
					$row=$userper->add($da);   
					 //添加头像
				    $us['FACE']=$da['FACE'];  
				    $where["ID"]=$currentuser["ID"];
				    $sa=$user->where($where)->save($us);
					if ($row){ 
						
							$this->success('保存成功！');
							exit();
					
					}else { 
						
						$this->error($Project->getError());
						exit();
					}
				}
				else
				{	 
					//编辑		
					$da=$_POST;  
					$us['FACE']=$da['FACE'];  
				   $where["ID"]=$currentuser["ID"];
				   $sa=$user->where($where)->save($us); 
					$sqlwhere["USERID"]=$currentuser["ID"];
					$save=$userper->where($sqlwhere)->save($da);
					if($save){
						$this->success('保存成功！');
						exit();
					}else {
						
						$this->error($Project->getError());
						exit();
					}
					
				}
				
			}
	    $this->display();
	
		}
		}
		?>