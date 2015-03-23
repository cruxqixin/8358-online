<?php
namespace Zixun\Controller;
use Think\Controller;
use Model\FinancingModel;
use Think\Word;
class ZixunController extends Controller{
	public function index(){
		$this->display();
	}
	public function service(){
		$this->display();
	}
	public function zixun(){
		$this->display();
	}
	public function cxzixun(){
		$this->display();
	}
	public function jsh(){
		$this->display();
	}
	public function dzh(){
		$this->display();
	}
	public function details(){
		$manu=M('Financing');
		$currentuser=getetcurrentuser();
		$this->assign("user",$currentuser);
		if($_GET['ids']){
			
			$vo=$manu->where("id=".$_GET['ids'])->select();
			$this->assign("article",$vo[0]);
		}
		if($_GET['id']){
			$this->assign("id",$_GET['id']);
		}
		
		if($_POST){
		   if($_POST['id']==''){
			    $data=$_POST;
				$data['id']=time();
				$data['addtime']=time();
				$data['status']=1;
				$data['email']=$_POST['tbemail'];
				$add=$manu->add($data);
				//判断邮箱是否已经注册
				$da['EMAIL']=$_POST['tbemail'];
				$list=M('users')->where($da)->select();
				if($list){//如果存在
					$url='http://'.$_SERVER['HTTP_HOST'].  U('Keji/User/login');
					SendMail($da["EMAIL"],"用户登录","请点击链接 {$url} 继续操作");	
				}else{//如果不存在发送的链接为生成用户名和密码的连接，在点击链接后则用户名和密码入库并
				      //跳到登录的界面
					$url='http://'.$_SERVER['HTTP_HOST'].  U('Keji/User/newregister?email='.$da["EMAIL"]);
					SendMail($da["EMAIL"],"新注册用户","请点击链接 {$url} 继续操作");	
				}
				if($add){
					
					$this->redirect($_SERVER['HTTP_HOST'].'/Zixun/Zixun/details/id/1');
				}else{
					$this->error("提交失败");
				}
		   }else{
			  $manu->where("id=".$_POST['id'])->save($data);
			  $this->error("修改失败");
		   }
			
		}
		$this->display();
	}
	public function word(){
		$word=new Word();
		$html=$_GET['html'];
		$word->start(); 
		$wordname = '/Uploads/融资.doc'; 
		echo $html;
		$list=$word->save($wordname);
		
        echo json_encode($list);		
	}
	public function sqservice(){
		$manu=M('service');
		if($_POST){
			$data=$_POST;
			//判断邮箱是否已经注册
				$da['EMAIL']=$_POST['email'];
				$list=M('users')->where($da)->select();
				if($list){//如果存在
					$url='http://'.$_SERVER['HTTP_HOST'].  U('Keji/User/login');
					SendMail($da["EMAIL"],"用户登录","请点击链接 {$url} 继续操作");	
				}else{//如果不存在发送的链接为生成用户名和密码的连接，在点击链接后则用户名和密码入库并
				      //跳到登录的界面
					$url='http://'.$_SERVER['HTTP_HOST'].  U('Keji/User/newregister?email='.$da["EMAIL"]);
					SendMail($da["EMAIL"],"新注册用户","请点击链接 {$url} 继续操作");	
				}
			$data['addtime']=time();
			$data['status']=1;
			$data['uemail']=$_POST['email'];
			$manu->add($data);
			$this->success("提交成功");
		}

	}
}