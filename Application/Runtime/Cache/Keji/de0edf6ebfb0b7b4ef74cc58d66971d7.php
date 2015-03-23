<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科技天下网-用户注册</title>
<script src="/Public/statics/js/jquery/jquery-1.7.2.min.js"></script>
<link href="/css/Keji/css.css" rel="stylesheet" type="text/css" />
<link href="/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<script src="/js/Keji/jquery.validationEngine.js" type="text/javascript"></script>
<script src="/js/Keji/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="UTF-8"></script>

<script type="text/javascript" src="/js/common.js" language="javascript"></script>
<script type="text/javascript" src="/Public/statics/js/area.js" charset="gbk"></script>
<script type="text/javascript" src="/js/areaw.js" charset="gbk"></script>
<!--[if lte IE 6]>
<script type="text/javascript" src="js/PNG.js"></script>
<script type="text/javascript" src="js/PNGClass.js"></script>
<![endif]-->
<script type="text/javascript">
	var s=["s_province","s_city","s_county"];//三个select的id
	var opt0 = ["省份","地级市","市、县级市"];//初始值
	function _init_area(){  //初始化函数
		for(i=0;i<s.length-1;i++){
			document.getElementById(s[i]).onchange=new Function("change("+(i+1)+")");	
		}
		change(0);
	}
	$(function(){
		$("form").validationEngine();
		_init_area();
		//判断国内外
		$("[name=UCOUNTRY]").click(function(){
			showguoneiwai();
	    })
	    showguoneiwai();
	})
	function showguoneiwai(){
	    switch($("[name=UCOUNTRY]:checked").val()){
			case "0":
				$("#guonei").show();
				$("#guowai").hide();
			break;
			case "1":
				$("#guonei").hide();
				$("#guowai").show();
			break;
		}
}
function changeVerify(){
		var src=$("#img_checkcode").attr("verify_action");
		//alert(src);
		var url_model=$("#img_checkcode").attr("url_model");
		//alert(url_model);
		if(url_model==0){
			var nowTime="&nowTime="+new Date().getTime();
		}else if(url_model==2){
			var nowTime="?nowTime="+new Date().getTime();
		}
		$("#img_checkcode").attr("src",src+nowTime);
	}

$(function(){
	$("[name='hyid[]']").change(function(){
			if($("[name='hyid[]']:checked").size()>3){
				$(this).removeAttr("checked");
			}
		})
		
		if($("#hy_cates").val()){
			var pros=($("#hy_cates").val()+"0").split(",");
			for(var pro in pros){
				$("[name='hyid[]'][value="+pros[pro]+"]").attr("checked","checked");
			}
		}
	if($("#type").val()){
		$("#chenggong").show();
		daojishi();
	}else{
		$("#chenggong").hide();
	}
	$("#chongzhi").click(function(){
		$(".text1").val("");
		$("[name='hyid[]']").removeAttr("checked");
		if($("[name=UCOUNTRY]:checked").val()=='1'){
				$(this).removeAttr("checked");
			}
		$("#guowai").hide();
		$("#guonei").show();
			$("#s_province").val("省份");
			$("#s_city").val("地级市");
			$("#s_county").val("市、县级市");
		
				
	})

})

function checkpwdd(){
	$("#pwd").blur(function(){
		if($("#pwd").val=='')
	{
		
		$("#pwdinfo").html("密码没有填写");
	}
	});
	
	
	
}  
function checkConfirm(){ 
$("#NICKNAME").blur(function(){  
  if($("#NICKNAME").val() != ""){
    $.ajax({
    url: "<?php echo U('Keji/ajax/reg?ac=kl_tjyj');?>",
    type:'POST',
    dataType: 'json',
    data: {nickname: $("#NICKNAME").val()},
    success: function(msg) {
    if (msg.status == "1")
    { 
       $("#gradeInfo").html("该名称已存在"); 
	   $('#gradeInfo').addClass('cuowu');   
    }
	else
	{ 
	   if ($("#NICKNAME").val().length >=3&&$("#NICKNAME").val().length <=16) {
            $('#gradeInfo').html('');
            $('#gradeInfo').addClass('zhengque');
            ck = false;
            return;
        }
		else
		{
		  if ($("#NICKNAME").val().length < 3) {
            $('#gradeInfo').html('用户名长度最少3位');
            $('#gradeInfo').addClass('cuowu');
            ck = false;
            return;
           }
		    if ($("#NICKNAME").val().length >16) {
            $('#gradeInfo').html('用户名长度最多16位');
            $('#gradeInfo').addClass('cuowu');
            ck = false;
            return;
           }
		}
      
	  // $('#gradeInfo').addClass('zhengque');  
    }

  }
});

}
else
{
  $("#gradeInfo").html("用户名未填写"); 
  $('#gradeInfo').addClass('cuowu');
}
});    
} 	
function show(i){
	if(i==2){
		$("#botmtext").show();
	}
	if(i==1){
		$("#botmtext").hide();
	}
}


var qtime=5;
function daojishi(){
	if(qtime>0){
		$("#miao").html(qtime);
		qtime=qtime-1;
		setTimeout("daojishi()",1000);
	}else{
		$("#chenggong").hide();
	}
}
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
	<form action="<?php echo U('User/register');?>" method="post">
	
	<div class="main mianText">
    	<table width="200" border="0" id="table">
          <tr>
            <td width="212px" class="currentTd">用户名：</td>
            <td><input class="text1 validate[required]" name="NICKNAME" id="NICKNAME"/><span style="color:red" id="gradeInfo"></span></td>
          </tr>
          <tr>
            <td class="currentTd">选择：</td>
            <td>
            	<select name="UTYPE" onchange="show(this.value)">
            		
                    <option value="1" >机构用户</option>
					<option  value="0" >个人用户</option>
            	</select>
            </td>
          </tr>
          <tr>
            <td class="currentTd">单位名称：</td>
            <td><input class="text1 validate[required]" name="COMPANYNAME" id="COMPANYNAME"/></td>
          </tr>
          <tr id="botmtext" style="display:none;">
            <td class="currentTd">组织机构代码证号：</td>
            <td><input class="text3 validate[required]" name="CERTIFICATECODE" id="CERTIFICATECODE"/><span>注：请填写正式信息，我们会验证您单位的正式性</span></td>
          </tr>
          <tr>
            <td class="currentTd">（从业）单位性质：</td>
            <td>
            	<select name="UNITNATURE">
            		<option value="1">企业</option>
					<option value="2">科研机构</option>
					<option value="3">社会团体及服务机构</option>
					<option value="4">政府机构</option>
					
            	</select>
            </td>
          </tr>
          <tr>
            <td height="78" class="currentTd">国家/地区：</td>
            <td>
            	<span><input name="UCOUNTRY" type="radio" id="gn" checked="checked" value="0" />国内&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            		  <input name="UCOUNTRY" type="radio" value="1" />国外
            	</span>
               
				
            </td>
          </tr>
		  <tr>
            <td class="currentTd"></td>
            <td>
			 <span id="guonei">
                    <select name="GN_PROV" id="s_province" va="1" class=" validate[required]"></select>
					<select name="GN_CITY" id="s_city" va="1" class=" validate[required]"></select>
					<select name="GN_COUNTRY" id="s_county" va="1" class=" validate[required]"></select>
                </span>
			<span id="guowai" style="display:none">
                    Region<select id="region" name="GW_PROV" onChange="set_country(this,country,city_state)">
							<option value="" selected="selected">Select Region</option>
							<script type="text/javascript"> setRegions(this); </script>
						</select>
					Country<select id="country" name="GW_CITY" disabled="disabled" onChange="set_city_state(this,city_state)"></select>
					State<select id="city_state" name="GW_COUNTRY" disabled="disabled"></select>
                </span>
			</td>
          </tr>
          <tr>
            <td class="currentTd">联系地址：</td>
            <td><input class="text1 validate[required]" name="ADDRESS" id="ADDRESS"/></td>
          </tr>
          <tr>
            <td class="currentTd">邮编：</td>
            <td><input class="text1 validate[required,custom[postnum]]" name="CODE" id="CODE"/></td>
          </tr>
          <tr>
            <td height="260" class="currentTd">所在行业(最多选择三项)：</td>
            <td>
            	<ul>
                	 <?php if(is_array($hy)): $i = 0; $__LIST__ = $hy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li style="float:left;width:160px;">
                	    <label>
                	      <input type="checkbox" name="hyid[]" value="<?php echo ($val['id']); ?>" id="CheckboxGroup1_0" />
                	      <?php echo ($val['kname']); ?>
                        </label>
                	</li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </td>
          </tr>
          <tr>
            <td class="currentTd">联系人姓名：</td>
            <td><input class="text1 validate[required]" name="LXRNAME"/></td>
          </tr>
		 
          <tr>
            <td class="currentTd">性别：</td>
            <td>
            	<span><input name="SEX" type="radio" value="0" checked="checked"/>男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            		  <input name="SEX" type="radio" value="1" />女
            	</span>
            </td>
          </tr>
          <tr>
            <td class="currentTd">电话：</td>
            <td><input class="text1 validate[required,custom[phone1]]" name="PHONE"/></td>
          </tr>
          <tr>
            <td class="currentTd">手机号：</td>
            <td><input class="text1 validate[required,custom[shouji]]" name="LXRTELPHONE"/></td>
          </tr>
          <tr>
            <td class="currentTd">部门：</td>
            <td><input class="text1 validate[required]" name="DEPARTMENT"/></td>
          </tr>
          <tr>
            <td class="currentTd">职位：</td>
            <td><input class="text1 validate[required]" name="POSITION"/></td>
          </tr>
          <tr>
            <td class="currentTd">邮箱：</td>
            <td><input class="text1 validate[required,custom[email]]" name="EMAIL"/></td>
          </tr>
          <tr>
            <td class="currentTd">密码：</td>
            <td><input type="password" class="text1 validate[required]" name="PASSWORD" id="PASSWORD"/></td>
          </tr>
          <tr>
            <td class="currentTd">确认密码：</td>
            <td><input type="password" class="text1 validate[required,equals[PASSWORD]]" name=""/></td>
          </tr>
          <tr>
            <td class="currentTd">验证码：</td>
            <td><input class="text2 validate[required,ajax[ajaxCode]]" /><img id="img_checkcode"  isblank="true" src="<?php echo U('home/Base/verify?noarc=1');?>"  verify_action="<?php echo U('home/Base/verify?noarc=1');?>" url_model="<?php echo C(url_model);?>"  width="100"><span style="float:left;color:#046aab;font-size:16px;line-height:34px;text-decoration:underline" onclick="changeVerify()">换一张</span></td>
          </tr>
          <tr>
            <td class="currentTd">&nbsp;</td>
            <td><input name="" type="submit" class="butIn red" value="提交注册" id="btndui" />
				<input name="" class="butIn" type="reset" id="chongzhi" value="重置内容" />
				<input id="type" value="<?php echo ($type); ?>" type="hidden"/>
			</td>
         
		 </tr>
        </table>

    </div>
	</form>
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
<div class="showboxbg" id="chenggong">
    <div class="showbox">
         <div class="showbox_01"><img src="/images/Keji/img_20.jpg" /></div>
         <div class="showbox_02">
             <h1>感谢您的注册，用户名需要激活！</h1>
             <p>请您<a href="https://mail.qq.com/cgi-bin/loginpage"> 登录邮箱</a>，点击激活链接。<br />
             	页面将在<span id="miao"></span>秒钟之后跳转至登录前的网页。<br />
				<a href="#">点击这里</a>立即跳转。
             </p>
         </div>
    </div>
</div>
</body>
</html>