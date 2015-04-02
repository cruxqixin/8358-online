<?php
namespace online\Controller;
use Think\Controller;
use Think\FallPage;
class AdminController extends Controller {
    public function index(){
        $this->adminCheck();
        $status = intval(I('param.id')) == 1 ? 1 : 0;
        //待审核列表
        $userModel = M('user');
        $count = $userModel->where(array('status'=>$status))->count();
        $page = new FallPage($count,10);
        $show = $page->show();
        $userList = $userModel->where(array('status'=>$status))->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('page',$show);
        $this->assign('userList',$userList);
        $this->assign('count',$count);
        $this->assign('status',$status);
        $this->display('Admin_audit_list');
    }
//     public function audit_list(){
//         $this->adminCheck();
//         $status = intval(I('param.id')) == 1 ? 1 : 0;
//         //待审核列表
//         $userModel = M('user');
//         $count = $userModel->where(array('status'=>$status))->count();
//         $page = new FallPage($count,10);
//         $show = $page->show();
//         $userList = $userModel->where(array('status'=>$status))->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();

//         $this->assign('page',$show);
//         $this->assign('userList',$userList);
//         $this->assign('count',$count);
//         $this->assign('status',$status);
//         $this->display();
//     }
    
    public function audit_info(){
        $this->adminCheck();
        $uid = I('get.uid',0,'intval');
        if(!$uid){
            $this->error('缺少用户id');
        }
        $userModel = M('user');
        $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
        $categoryModel = M('category');
        $userCategoryModel = M('user_category');
        //行业分类
        $categoryList = $categoryModel->where('status=1')->select();
        foreach($categoryList as $k => $v){
            if($v['level'] == 1){
                $fatherList[] = $v;
            }
            if($v['level'] == 2){
                $childList[$v['father']][] = $v;
            }
            $categoryListKV[$v['id']] = $v;
        }
        //组织已选择的category数据
        $userCategoryList = $userCategoryModel->where(array('uid'=>$uid ))->select();
        foreach($userCategoryList as $k=>$v){
            $cidList[] = $v['cid'];
            if(!in_array($categoryListKV[$categoryListKV[$v['cid']]['father']],$choosenFatherList)){
                $choosenFatherList[] = $categoryListKV[$categoryListKV[$v['cid']]['father']];
            }
        }
        foreach($userCategoryList as $k=>$v){
            if(!in_array($categoryListKV[$v['cid']]['father'],$choosenFatherList)){
                $choosenList[$categoryListKV[$v['cid']]['father']][] = $categoryListKV[$v['cid']];
            }
        }
        $this->assign('cidList',$cidList);
        $this->assign('choosenFatherList',$choosenFatherList);
        $this->assign('choosenList',$choosenList);
        $this->assign('onlineUser',$onlineUser);
        $this->assign('fatherList',$fatherList);
        $this->assign('childList',$childList);
        
        if($onlineUser['type'] == 1){
            $this->display('Admin_audit_info_c');
        }else{
            $this->display('Admin_audit_info_b');
        }
    }
    public function audit_pass(){
        $this->adminCheck();
        if($_POST){
            $uid = I('post.uid',0,'intval');
            $status = I('post.status',0,'intval');
            if(!$uid){
                echo '缺少目标uid';die();
            }
            if($status !== 0 && $status !== 1){
                echo '缺少审核标示';die();
            }

            //检查预约数据
            $userModel = M('user');
            $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
            if(!$onlineUser){
                echo '该用户不存在';die();
            }
            if($onlineUser['status'] == $status){
                echo '已完成该操作';die();
            }

            //保存数据
            $data['status'] = $status;
            $data['update_time'] = time();
            $update = $userModel->where("uid=".$uid)->save($data);
            if($update){
                echo json_encode($data);die();
            }else{
                echo '操作失败';die();
            }
        }else{
            echo '操作失败';die();
        }
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