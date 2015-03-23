<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科技天下网——用户登录</title>
<link href="/css/Keji/css.css" rel="stylesheet" type="text/css" />
<script src="/Public/statics/js/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/Keji/common.js" language="javascript"></script>
<script type="text/javascript">
$(function(){
	 var defaultVal=$("#name").val();//将各个input的默认值都保存出来。
		  $("#name").focus(function(){
			if($("#name").val()==defaultVal)
			  {
				  $("#name").val("");//获得焦点时进行判断，如果当前的value值是默认的才进行清空
			  } 
		  })
		  $("#name").blur(function(){
			if($("#name").val().length==0)
			 {
				 $("#name").val(defaultVal);  //失去焦点时进行判断，如果value值的长度等于0（也就是空的时候，//没有输入内容的清空下），将原先保存的value值写入
			 }
		  })
})
function check(){
	if($("#name").val()==="邮箱/用户名"){
		alert('请输入邮箱或者用户名');
		return false;
	}
	if($("#password").val()===""){
		alert('请输入密码');
		return false;
	}
}
</script>
<!--[if lte IE 6]>
<script type="text/javascript" src="/js/PNG.js"></script>
<script type="text/javascript" src="/js/PNGClass.js"></script>
<![endif]-->
</head>

<body>
<div class="topBox">
	<div class="top">
    	<h1>
        	<a href="<?php echo U('User/login');?>">登录</a>
        	<a href="<?php echo U('User/register');?>">免费注册</a>
            客服热线：400-000-0000
        </h1>
        <p>
        	<a href="#">&nbsp;&nbsp;会员服务&nbsp;&nbsp;</a>|
            <a href="#">&nbsp;&nbsp;网站导航&nbsp;&nbsp;</a>|
            <a href="#">&nbsp;&nbsp;English&nbsp;&nbsp;</a>
        </p>
    </div>
</div>
<div class="logoBox">
    <a href="<?php echo U('User/login');?>"><img src="/images/Keji/logo_06.jpg" /></a>
    <span><a href="#">返回首页</a></span>
</div>
<div class="mainBox">
	<div class="main">
    	<p> ▪ 整合科技资源，助力自主创新<br />
            ▪ 阅读精彩的行业深度分析文章以及新闻资讯<br />
            ▪ 收到由专业编辑精心打造的资讯速递<br />
            ▪ 与高科技行业同行精英沟通，交流心得体会<br />
            ▪ 获得专家的帮助，为您解疑答惑<br />
            ▪ 行业权威资料下载
        </p>
		<form action="<?php echo U('User/login');?>" method="post" onsubmit="return check()">
        <div class="textBox">
		<div style="color:red"><?php echo ($error); ?></div>
        	<div class="text">
            	<h1>账号</h1>
                <input class="field" name="name" id="name" value="邮箱/用户名" />
            </div>
            <div class="text">
            	<h1>密码</h1>
                <input class="field password" name="password" id="password" type="password"/>
            </div>
            <dl>
            	<dd><input name="" type="checkbox" value="" />记住我的登录状态</dd>
                <dt><a href="<?php echo U('User/forgetpass');?>">忘记密码?</a></dt>
            </dl>
            <div class="botm">
                <input name="" type="submit" class="but" value="登  录" onclick="return check()"/>
            </div>
            <div class="search">
            	<span>还没有帐号：</span>
                <a href="<?php echo U('User/register');?>"><input name="" type="button" value="免费快速注册" /></a>
            </div>
        </div>
		</form>
    </div>
</div>
<div class="footer">
	<h1><a href="#">关于我们</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
    	<a href="#">广告咨询</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#">帮助信息</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#">联系我们</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#">会员服务</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#">网站导航</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#">国际站</a>&nbsp;&nbsp;&nbsp;&nbsp;
    </h1>
    <p> 我们的网站：科济天下网 | 产品商贸网 | 技术 | 会展 | 招商 | 咨询评估 | 创新实验室<br />
        客服热线：022-5816 8870   客服传真：022-5816 8870    业务联系：022-5816 8870<br />
        Copyright © 2015, All Rights Reserved. <br />
        中文版权所有－科济天下网网站所有图片、文字未经许可不得拷贝、复制。</p>
</div>
</body>
</html>