<?php
namespace api;
use Think\Model;
use Think\Db\Driver;
use \Application\Model\UsersModel;
$username=$_GET['username'];
$passwd=$_GET['password'];
$sign=md5($username+$passwd);
$user=new $UsersModel('Users');
$info=$user->where("NICKNAME='".$uname."'")->select();
echo $user->getlastsql();
print_r($info);


