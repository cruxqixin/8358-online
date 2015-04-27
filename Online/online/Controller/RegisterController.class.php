<?php
namespace online\Controller;
use Think\Controller;
use Think\FallPage;

class RegisterController extends Controller {
    public function index(){
        $kArray = array_keys($this->sourceConfig);
        $source = intval(I('param.source'));
        if(!in_array($source,$kArray)){
            $source = 0;
        }
        $this->assign('source',$source);
        $this->display();
    }
    public function register(){
        $regUserModel = M('reg_user');
        if($_POST){
            $name = strip_tags(trim(I('post.name')));
            $mobile = strip_tags(trim(I('post.mobile')));
            $email = strip_tags(trim(I('post.email')));
            $company = strip_tags(trim(I('post.company')));
            $source = intval(I('post.source'));
            if(!$name || !$mobile || !$email){
                echo json_encode(array('msg' => '信息不能为空','status' => false));die();
            }
            if(!isMobile($mobile)){
                echo json_encode(array('msg' => '手机格式错误','status' => false));die();
            }
            if(!isEmail($email)){
                echo json_encode(array('msg' => '邮箱格式错误','status' => false));die();
            }
            // 先检查手机是否重复
            $existUser = $regUserModel->where(array('mobile'=>$mobile ))->find();
            if($existUser){
                echo json_encode(array('msg' => '用户已注册','status' => false));die();
            }else{
                $data['name'] = $name;
                $data['mobile'] = $mobile;
                $data['email'] = $email;
                $data['company'] = $company;
                $data['source'] = $source;
                $data['add_time'] = time();
                $add = $regUserModel->add($data);
                if($add){
                    echo json_encode(array('msg' => '注册成功','status' => true));die();
                }else{
                    echo json_encode(array('msg' => '注册失败','status' => false));die();
                }
            }
        }

    }
    private $sourceConfig = array(
        '0' => '默认',
        '1' => '军民融合项目对接洽谈会',
        '2' => '2015年无人机任务系统与设备大会暨交流展洽会',
        '3' => '2015年智能电网技术及应用研讨会',
        '4' => '国家科学技术奖获奖项目报告会',
    );
}