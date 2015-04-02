<?php
namespace online\Controller;
use Think\Controller;
use Think\FallPage;
class AdminController extends Controller {
    public function index(){
        $this->adminCheck();
        $userModel = M('user');
        $list = $userModel->where(array('status'=>0))->select();
        echo count($list);
        echo '<br>';
        echo "\n";
        print_r($list);die();
        
//                 $data['status'] = 1;
//                 $data['update_time'] = time();
//                 $update = $userModel->where("id=3")->save($data);
//                 $onlineUser = $userModel->where(array('status'=>1))->select();
//                 print_R($onlineUser);exit();
    }
    public function audit_list(){
        $this->adminCheck();

        //待审核列表
        $userModel = M('user');
        $count = $userModel->where(array('status'=>0))->count();
        $page = new FallPage($count,10);
        $show = $page->show();
        $userList = $userModel->where(array('status'=>0))->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
        print_r($userList);
        $this->assign('page',$show);
        $this->assign('userList',$userList);
        $this->assign('count',$count);
        $this->display();
        die();
//         $data['status'] = 1;
//         $data['update_time'] = time();
//         $update = $userModel->where("id=1")->save($data);
//         $onlineUser = $userModel->where(array('status'=>1))->select();
//         print_R($onlineUser);exit();
    }
    private function adminCheck(){
        //判断kjtx是否登录，否则返回登录页面
        if(!$_SESSION["currentuser"]){
            //跳转到登录
            header("Location:http://".$_SERVER['HTTP_HOST'].'/index.php/Keji/User/Login/?returnurl='.$_SERVER['PHP_SELF']);
            return;
        }
        $uid = $_SESSION["currentuser"]['id'];
        if(!in_array($uid ,array(1419066834,1427168251,1427167469))){
            $this->error("此账号没有权限");
        }else{
            return true;
        }
        
    }
}