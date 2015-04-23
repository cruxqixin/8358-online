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
    public function reg_list(){
        $this->adminCheck();
        $regUserModel = M('reg_user');
        $count = $regUserModel->where()->count();
        $page = new FallPage($count,10);
        $show = $page->show();
        $userList = $regUserModel->where()->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('userList',$userList);
        $this->assign('count',$count);
        $this->display('Admin_reg_list');
    }
    public function schedule_list(){
        $this->adminCheck();
        $scheduleModel = M('schedule');
        $count = $scheduleModel->where('status>0')->count();
        $page = new FallPage($count,10);
        $show = $page->show();
        $scheduleList = $scheduleModel->where('status>0')->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
        foreach($scheduleList as $k => $v){
            $cidList[] = $v['calendar_id'];
        }
        $calendarModel = M('calendar');
        $calendarList = $calendarModel->where('id in ('.implode(',',$cidList).')')->select();
        foreach($calendarList as $k => $v){
            $calendarListKV[$v['id']]= $v;
        }
        $this->assign('calendarListKV',$calendarListKV);
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->assign('page',$show);
        $this->assign('scheduleList',$scheduleList);
        $this->assign('count',$count);
        $this->display('Admin_schedule_list');
    }
    private function adminCheck(){
        //判断kjtx是否登录，否则返回登录页面
        if(!$_SESSION["currentuser"]){
            //跳转到登录
            header("Location:http://".$_SERVER['HTTP_HOST'].'/index.php/Keji/User/Login/?returnurl='.$_SERVER['PHP_SELF']);
            return;
        }
        $uid = $_SESSION["currentuser"]['id'];

        if(!in_array($uid ,array(1419066834,1427168251,1427167469,1427676216))){
            $this->error("此账号没有权限");
        }else{
            return true;
        }
    }
    private $dayConfig = array(
        '1' => '2015-05-05',
        '2' => '2015-05-06',
        '3' => '2015-05-07'
    );
    private $timeConfig = array(
        '1'=>'09:00-09:30',
        '2'=>'09:30-10:00',
        '3'=>'10:00-10:30',
        '4'=>'10:30-11:00',
        '5'=>'11:00-11:30',
        '6'=>'11:30-12:00',
        '7'=>'12:00-12:30',
        '8'=>'12:30-13:00',
        '9'=>'13:00-13:30',
        '10'=>'13:30-14:00',
        '11'=>'14:00-14:30',
        '12'=>'14:30-15:00',
        '13'=>'15:00-15:30',
        '14'=>'15:30-16:00',
        '15'=>'16:00-16:30',
        '16'=>'16:30-17:00'
    );
}