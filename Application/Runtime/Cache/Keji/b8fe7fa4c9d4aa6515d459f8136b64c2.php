<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科技天下网-验证邮箱</title>
<script src="/Public/statics/js/jquery/jquery-1.7.2.min.js"></script>
<link href="/css/Keji/css.css" rel="stylesheet" type="text/css" />
<link href="/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<script src="/js/Keji/jquery.validationEngine.js" type="text/javascript"></script>
<script src="/js/Keji/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript" src="/js/common.js" language="javascript"></script>
<!--[if lte IE 6]>
<script type="text/javascript" src="js/PNG.js"></script>
<script type="text/javascript" src="js/PNGClass.js"></script>
<![endif]-->
<script type="text/javascript">
$(function(){
	$("form").validationEngine();
})
</script>

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
	
	<div class="main mianText">
		
			<form action="<?php echo U('User/Verifyemail');?>" method="post">
			<input type="hidden" name="keycode" value="<?php echo ($keycode); ?>" />
				<table width="200" border="0" id="table">
					<tr>
					<td class="currentTd"  width="212px" class="currentTd">昵称：</td>
					<td><input type="text" class="text1 validate[required]" name="NICKNAME" id="NICKNAME"/></td>
				  </tr>
				  <tr>
					<td class="currentTd">邮箱：</td>
					<td><input type="text" class="text1 validate[required,custom[email]]" name="EMAIL"/></td>
				  </tr>
				   <tr>
					<td class="currentTd">&nbsp;</td>
					<td><input name="" type="submit" class="butIn red" value="提交" id="btndui" />
						<input name="" class="butIn" type="reset" value="重置" /></td>
				  </tr>
				</table>
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
        客服热线：022-0000 0000   客服传真：022-0000 0000    业务联系：022-0000 0000<br />
        Copyright © 2015, All Rights Reserved. <br />
        中文版权所有－科济天下网网站所有图片、文字未经许可不得拷贝、复制。</p>
</div>
<div class="showboxbg">
    <div class="showbox">
         <div class="showbox_01"><img src="images/img_20.jpg" /></div>
         <div class="showbox_02">
             <h1>感谢您的注册，用户名需要激活！</h1>
             <p>请您<a href="#"> 登录邮箱</a>，点击激活链接。<br />
             	页面将在5秒钟之后跳转至登录前的网页。<br />
				<a href="#">点击这里</a>立即跳转。
             </p>
         </div>
    </div>
</div>
</body>
</html>