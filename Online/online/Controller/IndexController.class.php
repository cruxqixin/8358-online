<?php
namespace online\Controller;
use Think\Controller;
use Think\FallPage;
class IndexController extends Controller {
    public function index(){
        $userModel = M('user');
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
        }
        if($_GET['fid']>0 && $_GET['cid']>0){
            $cid = intval($_GET['cid']);
            $userCategoryList = $userCategoryModel->where('cid='.$cid)->select();
            foreach($userCategoryList as $k => $v){
                $uidList[] = $v['uid'];
            }
            $this->assign('chosenCid',$_GET['cid']);
            $this->assign('chosenfid',$_GET['fid']);
            if($uidList){
                $where[] = 'uid in ('.implode(',',$uidList).') ';
            }else{
                $where[] = 'uid = 0';
            }
        }
        $where['type'] = 2;
        $where['status'] = 1;
        $count = $userModel->where($where)->count();
        $page = new FallPage($count,10);
        $show = $page->show();
        $userList = $userModel->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('userList',$userList);
        $this->assign('count',$count);
        $this->assign('fatherList',$fatherList);
        $this->assign('childList',$childList);
        $this->display();
    }
    /**
     * 填写申请(个人)
     */
    public function apply_c(){
        $uid = $this->kjtxLoginCheck();
        $userModel = M('user');
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
        //表单处理
        if($_POST){
            $inputArray = $this->cInputArray;
            foreach($inputArray as $k => $v){
                if(empty($_POST[$k])){
                    $this->error($v."不能为空");
                }
            }
            foreach($_POST as $k => $v){
                if(is_string($v)){
                    $data[$k] = strip_tags($v);
                }else{
                    $data[$k] = $v;
                }
            
            }
            if($_POST['id']==''){
                $data['type'] = 1;//个人类型
                $data['uid'] = $uid;
                $data['add_time'] = time();
                $add = $userModel->add($data);
                if($add){
                    $this->saveCategory($uid,$data['category']);
                    $this->createCalendar($uid);
                    $this->redirect('http://'.$_SERVER['HTTP_HOST'].'.php/index/calendar');
                }else{
                    $this->error("提交失败");
                }
            }else{
                $data['type'] = 1;//个人类型
                $data['uid'] = $uid;
                $data['update_time'] = time();
                $update = $userModel->where("id=".$_POST['id'])->save($data);
                $save = $this->saveCategory($uid,$data['category']);
                if($update || $save){

                    $this->redirect('http://'.$_SERVER['HTTP_HOST'].'.php/index/calendar');
                }else{
                    $this->error("修改失败");
                }
            }
        }
        //组织已选择的category数据
        $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
        if($onlineUser){
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
        }

        $this->assign('onlineUser',$onlineUser);
        $this->assign('fatherList',$fatherList);
        $this->assign('childList',$childList);
        
        $this->display();
    }
    /**
     * 填写申请(公司)
     */
    public function apply_b(){
        $uid = $this->kjtxLoginCheck();
        $userModel = M('user');
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

        //表单处理
        if($_POST){
            $inputArray = $this->bInputArray;
            foreach($inputArray as $k => $v){
                if(empty($_POST[$k])){
                    $this->error($v."不能为空");
                }
                
            }
            foreach($_POST as $k => $v){
                if(is_string($v)){
                    $data[$k] = strip_tags($v);
                }else{
                    $data[$k] = $v;
                }
            
            }
            if($_POST['id']==''){
                $data['type'] = 2;//公司类型
                $data['uid'] = $uid;
                $data['add_time'] = time();
                $add = $userModel->add($data);
                if($add){
                    $this->saveCategory($uid,$data['category']);
                    $this->createCalendar($uid);
                    $this->redirect('http://'.$_SERVER['HTTP_HOST'].'.php/index/calendar');
                }else{
                    $this->error("提交失败");
                }
            }else{
                $data['type'] = 2;//公司类型
                $data['uid'] = $uid;
                $data['update_time'] = time();
                $update = $userModel->where("id=".$_POST['id'])->save($data);
                $save = $this->saveCategory($uid,$data['category']);
                if($update || $save){
                    $this->redirect('http://'.$_SERVER['HTTP_HOST'].'.php/index/calendar');
                }else{
                    $this->error("修改失败");
                }
            }
        }
        //组织已选择的category数据
        $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
        if($onlineUser){
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
        }
        $this->assign('onlineUser',$onlineUser);
        $this->assign('fatherList',$fatherList);
        $this->assign('childList',$childList);
        
        $this->display();
    }
    /**
     * 修改企业/个人信息
     */
    public function modify(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        if($onlineUser['type'] == 1){
            $this->redirect('Index/apply_c');
        }else{
            $this->redirect('Index/apply_b');
        }
    }
    /**
     * 企业/个人资料（他人查看,可以预约）
     */
    public function info(){
        $uid = intval($_GET['uid']);
        if(!$uid){
            $this->error('缺少用户id');
        }
        $userModel = M('user');
        $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
        if($onlineUser['status'] != 1){
            $this->error('用户待审核');
        }
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
        
        //日历数据
        $calendarModel = M('calendar');
        $calendarList = $calendarModel->where('uid='.$uid)->order('day_id,time_id')->getField('id,day_id,time_id,status');
        foreach($calendarList as $k => $v){
            $calendarListDay[$v['day_id']][$v['time_id']] = $v; //按day_id聚合用于输出模板
            $calendarListBefore[] = $k.'_'.$v['status']; //id=>status 数组用于比较修改数据
        }
        
        //预约数据
        $scheduleModel = M('schedule');
        $scheduleList = $scheduleModel->where('accept_uid='.$uid.' and status>0')->select();
        foreach($scheduleList as $k => $v){
            $scheduleListCidKV[$v['calendar_id']] = $v['status']; //按calendar_id聚合用于输出模板,判断按钮状态
            $scheduleListCid[] = $v['calendar_id']; //按calendar_id聚合用于输出模板,判断按钮状态
        }
        
        $this->assign('cidList',$cidList);
        $this->assign('choosenFatherList',$choosenFatherList);
        $this->assign('choosenList',$choosenList);
        
        $this->assign('onlineUser',$onlineUser);
        $this->assign('calendarListDay',$calendarListDay);
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->assign('scheduleListCidKV',$scheduleListCidKV);
        $this->assign('scheduleListCid',$scheduleListCid);
        
        if($onlineUser['type'] == 1){
            $this->display('Index_info_c');
        }else{
            $this->display('Index_info_b');
        }
    }
    /**
     * 提交对接预约
     */
    public function setSchedule(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $userModel = M('user');
        if($_POST){
            if(!$_POST['accept_uid']){
                $this->error('目标用户未找到');
            }
            $onlineAcceptUser = $userModel->where(array('uid'=>intval($_POST["accept_uid"]) ))->find();
            if(!$onlineAcceptUser){
                $this->error('目标用户未找到');
            }
            if($onlineUser['type'] == 1 && $onlineAcceptUser['type'] == 1){
                $this->error('只有企业身份用户才可与专家观众预约');
            }
            //检查日历
            $calendarModel = M('calendar');
            $calendarInfo = $calendarModel->where('id='.intval($_POST['calendar_id']).' and status=1')->find();

            if(!$calendarInfo){
                $this->error('目标用户未开放该时间点');
            }
            //检查预约数据
            $scheduleModel = M('schedule');
            $scheduleInfo = $scheduleModel->where('uid='.$uid.' and accept_uid='.intval($_POST["accept_uid"]).' and status>0')->find();
            if($scheduleInfo){
                $this->error('您已经预约过了');
            }
            //保存数据
            $data['uid'] = $uid;
            $data['uname'] = $_SESSION["currentuser"]['nickname'];
            $data['umobile'] = $onlineUser['mobile'];
            $data['calendar_id'] = intval($_POST['calendar_id']);
            $data['accept_uid'] = intval($_POST["accept_uid"]);
            $data['accept_name'] = $onlineAcceptUser['type'] == 1 ? $onlineAcceptUser['name'] : $onlineAcceptUser['company_name'];
            $data['accept_mobile'] = $onlineAcceptUser['mobile'];
            $data['umobile'] = $onlineUser['mobile'];
            $data['status'] = 1;
            $data['add_time'] = time();
            $add = $scheduleModel->add($data);
            if($add){
                $this->redirect('http://'.$_SERVER['HTTP_HOST'].'.php/index/info/'.$_POST["accept_uid"]);
            }else{
                $this->error("提交失败");
            }
        }
    }
    /**
     * 处理预约
     * 确认：action=2
     * 拒绝：action=0
     * action  action_type  schedule_id
     */
    public function handleSchedule(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $uid = $onlineUser['uid'];
        $userModel = M('user');
        
        if($_POST){
            //检查预约数据
            $scheduleModel = M('schedule');
            $scheduleInfo = $scheduleModel->where('id='.intval($_POST["schedule_id"]).' and accept_uid='.$uid.' and status=1')->find();
            if(!$scheduleInfo){
                echo '该预约不存在或该预约不是待处理状态';die();
            }
            //保存数据
            $data['status'] = intval($_POST['action_type']);
            $data['update_time'] = time();
            $update = $scheduleModel->where("id=".intval($_POST['schedule_id']))->save($data);
            if($update){
                echo json_encode($data);die();
            }else{
                echo '操作失败';die();
            }
        }
    }
    /**
     * 企业/个人基础信息（自己查看）
     */
    public function detail(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $uid = $onlineUser['uid'];
        $userModel = M('user');

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
        
        //日历数据
        $calendarModel = M('calendar');
        $calendarList = $calendarModel->where('uid='.$uid)->order('day_id,time_id')->getField('id,day_id,time_id,status');
        foreach($calendarList as $k => $v){
            $calendarListDay[$v['day_id']][$v['time_id']] = $v; //按day_id聚合用于输出模板
            $calendarListBefore[] = $k.'_'.$v['status']; //id=>status 数组用于比较修改数据
        }
        
        //预约数据
        $scheduleModel = M('schedule');
        $scheduleList = $scheduleModel->where('accept_uid='.$uid.' and status>0')->select();
        foreach($scheduleList as $k => $v){
            $scheduleListCidKV[$v['calendar_id']] = $v['status']; //按calendar_id聚合用于输出模板,判断按钮状态
            $scheduleListCid[] = $v['calendar_id']; //按calendar_id聚合用于输出模板,判断按钮状态
        }

        $this->assign('cidList',$cidList);
        $this->assign('choosenFatherList',$choosenFatherList);
        $this->assign('choosenList',$choosenList);
        
        $this->assign('onlineUser',$onlineUser);
        $this->assign('calendarListDay',$calendarListDay);
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->assign('scheduleListCidKV',$scheduleListCidKV);
        $this->assign('scheduleListCid',$scheduleListCid);
        
        
        if($onlineUser['type'] == 1){
            $this->display('Index_detail_c');
        }else{
            $this->display('Index_detail_b');
        }
        
    }
    /**
     * 日历表,提交申请表单后进入本页确认日历
     */
    public function calendar(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $uid = $onlineUser['uid'];
        $userModel = M('user');
        //日历数据
        $calendarModel = M('calendar');
        $calendarList = $calendarModel->where('uid='.$uid)->order('day_id,time_id')->getField('id,day_id,time_id,status');
        foreach($calendarList as $k => $v){
            $calendarListDay[$v['day_id']][$v['time_id']] = $v; //按day_id聚合用于输出模板
            $calendarListBefore[] = $k.'_'.$v['status']; //id=>status 数组用于比较修改数据
        }
        //表单处理
        if($_POST){
            foreach($_POST as $k => $v){
                $id = str_replace('calendar_','',$k);
                $calendarListAfter[] = $id.'_'.$v ;
            }
            $dataDiff = array_diff($calendarListAfter,$calendarListBefore);
            foreach($dataDiff as $diffStr){
                $diffArr = explode('_',$diffStr);
                $data['status'] = $diffArr[1];
                $calendarModel->where("id=".$diffArr[0])->setField($data);
            }
            //跳转到用户基础资料页
            $this->redirect('Index/detail');
        }

        $this->assign('calendarListDay',$calendarListDay);
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->display();
    }
    /**
     * 接收到的预约日程表
     */
    public function schedule_accept(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $uid = $onlineUser['uid'];
        //预约数据
        $scheduleModel = M('schedule');
        $count = $scheduleModel->where('accept_uid='.$uid)->count();
        $page = new FallPage($count,10);
        $show = $page->show();
        $scheduleList = $scheduleModel->where('accept_uid='.$uid)->order('calendar_id')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('scheduleList',$scheduleList);
        $this->assign('count',$count);
        
        foreach($scheduleList as $k => $v){
            $cidList[] = $v['calendar_id'];
        }
        //日历数据
        if($count>0){
            $calendarModel = M('calendar');
            $calendarList = $calendarModel->where('id in ('.implode(',',$cidList).')')->select();
            foreach($calendarList as $k => $v){
                $calendarListKV[$v['id']]= $v;
            }
            $this->assign('calendarListKV',$calendarListKV);
        }

        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->assign('scheduleList',$scheduleList);

        $this->display();
    }
    /**
     * 发出的预约日程表
     */
    public function schedule_apply(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $uid = $onlineUser['uid'];
        //预约数据
        $scheduleModel = M('schedule');
        $count = $scheduleModel->where('uid='.$uid.' and status>0')->count();
        $page = new FallPage($count,10);
        $show = $page->show();
        $scheduleList = $scheduleModel->where('uid='.$uid.' and status>0')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('scheduleList',$scheduleList);
        $this->assign('count',$count);
        
        foreach($scheduleList as $k => $v){
            $cidList[] = $v['calendar_id'];
        }
        //日历数据
        if($count>0){
            $calendarModel = M('calendar');
            $calendarList = $calendarModel->where('id in ('.implode(',',$cidList).')')->select();
            foreach($calendarList as $k => $v){
                $calendarListKV[$v['id']]= $v;
            }
            $this->assign('calendarListKV',$calendarListKV);
        }
        
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->assign('scheduleList',$scheduleList);
        $this->display();
    }
    /**
     * 被拒的预约日程表
     */
    public function schedule_reject(){
        $uid = $this->kjtxLoginCheck();
        $onlineUser = $this->onlineLoginCheck($uid);
        $uid = $onlineUser['uid'];

        //预约数据
        $scheduleModel = M('schedule');
        $count = $scheduleModel->where('uid='.$uid.' and status=0')->count();
        $page = new FallPage($count,10);
        $show = $page->show();
        $scheduleList = $scheduleModel->where('uid='.$uid.' and status=0')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('scheduleList',$scheduleList);
        $this->assign('count',$count);
        
        foreach($scheduleList as $k => $v){
            $cidList[] = $v['calendar_id'];
        }
        //日历数据
        if($count>0){
            $calendarModel = M('calendar');
            $calendarList = $calendarModel->where('id in ('.implode(',',$cidList).')')->select();
            foreach($calendarList as $k => $v){
                $calendarListKV[$v['id']]= $v;
            }
            $this->assign('calendarListKV',$calendarListKV);
        }
        
        $this->assign('dayConfig',$this->dayConfig);
        $this->assign('timeConfig',$this->timeConfig);
        $this->assign('scheduleList',$scheduleList);
        
        $this->display();
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
    private $cInputArray = array(
        'name' => '姓名',
        'position' => '职位',
        'department' => '部门',
        'company_cname' => '单位中文名称',
        'tel' => '电话',
        'company_ename' => '单位英文名称',
        'mobile' => '手机',
        'company_website' => '单位网址',
        'email' => 'Email',
        'company_address' => '单位地址',
        'industry' => '所属行业',
        'category' => '技术服务类别',
        'cooperation_need' => '需要何种合作或帮助',
//         'fund_demand' => '是否有投融资需求',
    );
    private $bInputArray = array(
        'company_name' => '公司名称',
        'exhibition_number' => '展位号',
        'company_address' => '地址',
        'company_post_code' => '邮政编码',
        'company_tel' => '公司电话',
        'company_fax' => '公司传真',
        'company_email' => '公司邮箱',
        'company_website' => '公司网站',
        'gender' => '性别',
        'name' => '姓名',
        'position' => '职位',
        'tel' => '直拨电话',
        'mobile' => '手机',
        'fax' => '传真',
        'email' => 'Email',
        'category' => '技术服务类别',
        'cooperation_offer' => '能提供的核心产品及技术合作',
        'implemented_application' => '已实现的应用',
        'cooperation_need' => '需要何种合作或帮助',
//         'fund_demand' => '是否有投融资需求',
    );
    private function kjtxLoginCheck(){
        //判断kjtx是否登录，否则返回登录页面
        if(!$_SESSION["currentuser"]){
            //跳转到登录
            header("Location:http://".$_SERVER['HTTP_HOST'].'/index.php/Keji/User/Login/?returnurl='.$_SERVER['PHP_SELF']); 
			return;
        }
        return $_SESSION["currentuser"]['id'];;
    }
    private function onlineLoginCheck($uid){
        //获取当前登录uid，判断online_user是否已经有数据
        $userModel = M('user');
        $onlineUser = $userModel->where(array('uid'=>$uid ))->find();
        if(!$onlineUser){
            $this->redirect('Index/apply_b');
        }
        return $onlineUser;
    }
    
    private function saveCategory($uid,$cids){
        $userCategoryModel = M('user_category');
        $userCategoryModel->where('uid='.$uid)->delete();
        foreach($cids as $cid){
            $dataList[] = array('uid'=>$uid, 'cid'=>$cid);
        }
        return $userCategoryModel->addAll($dataList);
    }
    private function createCalendar($uid){
        $calendarModel = M('calendar');
        $dataList[] = array('time_id'=>1 ,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>2 ,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>3 ,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>4 ,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>5 ,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>6 ,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>7 ,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>8 ,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>9 ,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>10,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>11,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>12,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>13,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>14,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>15,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>16,'day_id'=>'1','uid'=>$uid);
        $dataList[] = array('time_id'=>1 ,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>2 ,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>3 ,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>4 ,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>5 ,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>6 ,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>7 ,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>8 ,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>9 ,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>10,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>11,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>12,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>13,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>14,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>15,'day_id'=>'2','uid'=>$uid);
        $dataList[] = array('time_id'=>16,'day_id'=>'2','uid'=>$uid);
		$dataList[] = array('time_id'=>1 ,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>2 ,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>3 ,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>4 ,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>5 ,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>6 ,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>7 ,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>8 ,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>9 ,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>10,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>11,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>12,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>13,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>14,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>15,'day_id'=>'3','uid'=>$uid);
        $dataList[] = array('time_id'=>16,'day_id'=>'3','uid'=>$uid);
        return $calendarModel->addAll($dataList);
    }
}