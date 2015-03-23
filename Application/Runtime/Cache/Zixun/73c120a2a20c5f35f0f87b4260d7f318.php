<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科技天下网——创新咨询服务</title>
<link href="/css/Rongzi/common.css" rel="stylesheet" type="text/css">
<link href="/css/Rongzi/type.css?1231212121231212312123121233312312313112231" rel="stylesheet" type="text/css">
<!---<link href="/css/Rongzi/css.css" rel="stylesheet" type="text/css">--->
<link href="/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/Rongzi/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/Rongzi/common.js?1231" language="javascript"></script>
<script src="/js/Rongzi/jquery.validationEngine.js" type="text/javascript"></script>
<script src="/js/Rongzi/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript">

$(function(){
	 
	$("[id=1]").each(function(){
		 var defaultVal=$(this).val();//将各个input的默认值都保存出来。
		  $(this).focus(function(){
			if($(this).val()==defaultVal)
			  {
				  $(this).val("");//获得焦点时进行判断，如果当前的value值是默认的才进行清空
			  } 
		  })
		  $(this).blur(function(){
			if($(this).val().length==0)
			 {
				 $(this).val(defaultVal);  //失去焦点时进行判断，如果value值的长度等于0（也就是空的时候，//没有输入内容的清空下），将原先保存的value值写入
			 }
		  })
		 
	  })
	  

   
})
$(function(){
	$("form").validationEngine();
})
 function chooseOne(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("stage");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }   
	 function chooseOne1(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("channelsm");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }   
	 function chooseOne2(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("rzchannel");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }   
	 function chooseOne3(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("ispatent");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }   
	  function chooseOne4(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("technique");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }   
	  function chooseOne5(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("stateplan");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }   
	 function chooseOne6(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("fundxm");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }   
	 function chooseOne7(cb){  
         //先取得同name的chekcBox的集合物件  
         var obj = document.getElementsByName("otherdemand");  
         for (i=0; i<obj.length; i++){  
             //判斷obj集合中的i元素是否為cb，若否則表示未被點選  
             if (obj[i]!=cb) obj[i].checked = false;  
             //若是 但原先未被勾選 則變成勾選；反之 則變為未勾選  
            
             else obj[i].checked = true;  
         }  
     }


$(function(){
   	if($("#val").val()){
		$(".showboxbg").show();
		$(".showboxbg").height($(document).height());
	}
	  
	  $("[id=closebox]").each(function(){
			$(this).click(function(){
				$(".showboxbg").hide();
			})
	  })
	    $("#center_product li").click(function(){
		    $(this).attr("class","current").siblings().attr("class","");
			$("#neirong .content").eq($(this).index()).show().siblings().hide();	
	    })
	 $("#chongzhi").click(function(){
		$(".txt").val("");
		
	 })
	 	if($("#val").val()){
		$(".showboxbg").show();
		$(".showboxbg").height($(document).height());
	}
})

</script>
<!--[if lte IE 6]>
<script type="text/javascript" src="/js/PNG.js"></script>
<script type="text/javascript" src="/js/PNGS.js"></script>
<![endif]-->
</head>

<body>
<!-----------------------------------------Top--------------------------------------------->
<div class="topbg">
  <div class="container">
      <div class="logo"><img src="/images/Rongzi/logo.jpg"></div>
      <div class="top_right">
          <div class="navbar">
             <div class="left"><a href="<?php echo U('Keji/User/login');?>">登录</a><a href="<?php echo U('Keji/User/register');?>">免费注册</a>客服热线：400-000-0000</div>
             <div class="right"><a href="#">会员服务</a>|<a href="#">网站导航</a>|<a href="#">English</a></div>
             <div class="clear"></div>
          </div>
          <div class="top_list">
             <table cellpadding="0" cellspacing="0" border="0" width="100%">
                 <tr>
                    <td><a href="#" class="link">新闻</a></td>
                    <td class="tdbg"><a href="#">产经</a><a href="#">政策</a><a href="#">企业</a><a href="#">热点</a><a href="#">新闻专题</a></td>
                    <td><a href="#" class="link">咨询评估 </a></td>
                    <td class="tdbg"><a href="#">技术攻关</a><a href="#">融资需求</a></td>
                    <td><a href="#" class="link">在线对接会</a></td>
                    <td><a href="#">会议安排</a><a href="#">在线会议室</a></td>
                 </tr>
                 <tr>
                    <td><a href="#" class="link">产品</a></td>
                    <td class="tdbg"><a href="#">供应</a><a href="#">求购</a><a href="#">公司</a><a href="#">市场分析</a><a href="#">二手设备</a></td>
                    <td><a href="#" class="link">创新实验室 </a></td>
                    <td class="tdbg"><a href="#">开放实验室</a><a href="#">仪器共享</a></td>
                    <td><a href="#" class="link">招商</a></td>
                    <td><a href="#">园区推荐</a><a href="#">热点政策</a><a href="#">在线招商会</a></td>
                 </tr>
                 <tr>
                   <td colspan="6" class="Hr">&nbsp;</td>
                 </tr>
                 <tr>
                    <td><a href="#" class="link">数据资料</a></td>
                    <td class="tdbg"><a href="#">图书</a><a href="#">影音</a><a href="#">行业报告</a><a href="#">PPT </a><a href="#">论文</a></td>
                    <td><a href="#" class="link">专家  </a></td>
                    <td class="tdbg"><a href="#">专家库</a><a href="#">访谈</a></td>
                    <td class="tdbg"><a href="#" class="link">培训认证</a></td>
                    <td><a href="#" class="link">学会集群</a><a href="#">学会介绍</a><a href="#">会员天下</a></td> 
                 </tr>
                 <tr>
                    <td><a href="#" class="link">会展</a></td>
                    <td class="tdbg"><a href="#">精品活动</a><a href="#">会展库</a><a href="#">在线会展</a><a href="#">会展提交</a></td>
                    <td><a href="#" class="link">技术项目  </a></td>
                    <td class="tdbg"><a href="#"> 科技成果</a><a href="#">融资项目</a></td>
                    <td class="tdbg"><a href="#" class="link">专题行业数据</a></td>
                    <td><input type="button" class="btn" value="我有需求"></td>
                 </tr>
             </table>
            
          </div>
      </div>
      <div class="clear"></div>
  </div>
</div>
<div class="Navbg">
    <div class="container">
        <ul>
            <li id="z_index">
               <a href="<?php echo U('Zixun/index');?>">
                 <div class="default"><img src="/images/Rongzi/index_01.png"><span>首页</span></div>
                 <div class="active"><img src="/images/Rongzi/index_01h.png"><span>首页</span></div>
               </a>
            </li>
             <li id="z_service">
               <a href="<?php echo U('Zixun/service');?>">
                 <div class="default"><img src="/images/Rongzi/index_02.png"><span>融资服务 </span></div>
                 <div class="active"><img src="/images/Rongzi/index_02h.png"><span>融资服务 </span></div>
               </a>
            </li>
             <li id="z_zixun">
               <a href="<?php echo U('Zixun/zixun');?>">
                 <div class="default"><img src="/images/Rongzi/index_03.png"><span> 市场开发咨询</span></div>
                 <div class="active"><img src="/images/Rongzi/index_03h.png"><span> 市场开发咨询</span></div>
               </a>
            </li>
             <li id="z_cxzixun">
               <a href="<?php echo U('Zixun/cxzixun');?>">
                 <div class="default"><img src="/images/Rongzi/index_04.png"><span> 创新能力咨询</span></div>
                 <div class="active"><img src="/images/Rongzi/index_04h.png"><span> 创新能力咨询</span></div>
               </a>
            </li>
             <li id="z_jsh">
               <a href="<?php echo U('Zixun/jsh');?>">
                 <div class="default"><img src="/images/Rongzi/index_05.png"><span>技术研发咨询</span></div>
                 <div class="active"><img src="/images/Rongzi/index_05h.png"><span>技术研发咨询</span></div>
               </a>
            </li>
             <li id="z_dzh">
               <a href="<?php echo U('Zixun/dzh');?>">
                 <div class="default"><img src="/images/Rongzi/index_06.png"><span>企业再发展定制咨询</span></div>
                 <div class="active"><img src="/images/Rongzi/index_06h.png"><span>企业再发展定制咨询</span></div>
               </a>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
 </div>
<!-----------------------------------------Top--------------------------------------------->
<!-----------------------------------------middle--------------------------------------------->
<div class="tab_bg">
  <div class="container">
     <div  class="tab">
	 <div  style="color:#A50000; font-size:24px; font-weight:bold; text-align:center; padding-bottom:3px;">我要申请服务</div>
        <table style=" width:100%"><tr><td style="width:50%;text-align:right; padding-right:70px;">
		<span><img src="/images/Rongzi/215left1.png" id="apic0"></span>
		</td><td style=" padding-left:70px;">
		<span><img src="/images/Rongzi/215right2.png" id="apic1"></span>
		</td></tr></table>
		<ul id="tabLi">
            <li>
               <div name="lidiv" class="box">
                  <div class="title" >融资对接申请</div>
                  <P style=" padding-left:20px; padding-top:5px; padding-bottom:5px;">如果您在项目融资对接方面有需求，请选择融资对接申请服务，填写并提交申请。</P>
               </div>
            </li>
            <li>
               <div name="lidiv" class="box2">
                  <div class="title">创新咨询服务申请</div>
                  <P style=" padding-left:20px; padding-top:5px; padding-bottom:5px;">如果您需要市场开发、创新能力、技术研发、企业再发展等方面的咨询服务，请选择创新咨询服务，填写表单并提交。</P>
               </div>
            </li>
        </ul>
        <div class="clear"></div>
     </div>
  </div>
</div>
<div class="container">
<form action="<?php echo U('Zixun/details');?>" id="form1" method="post" onsubmit="return check()">
  <div class="panner">
   <div  class="con" style="display:block;"> 
    <div class="finance_01">
      <div class="title">融资对接申请表</div>
      <P>单 位：万元</P>
      <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
           <td width="144"></td>
           <td>姓名</td>
           <td>职务</td>
           <td>电话</td>
           <td>传真</td>
           <td>手机</td>
           <td>E－mail</td>
        </tr>
        <tr>
           <td><span style="color:red">*</span>填表人</td>
           <td><input type="text" class="txt validate[required]" name="tbname" id="tbname" value="<?php echo ($article['tbname']); ?>"/></td>
			<td><input type="text" class="txt validate[required]" name="tbzw" id="tbzw" value="<?php echo ($article['tbzw']); ?>"/></td>
			<td><input type="text" class="txt validate[required,custom[phone1]]" name="tbphone" id="tbphone" value="<?php echo ($article['tbphone']); ?>"/></td>
			<td><input type="text" class="txt validate[required,custom[chzh]]" name="tbchzh" id="tbchzh" value="<?php echo ($article['tbchzh']); ?>"/></td>
			<td><input type="text"class="txt validate[required,custom[shouji]]" name="tbtelphone" id="tbtelphone" value="<?php echo ($article['tbtelphone']); ?>"/></td>
			<td><input type="text" class="txt validate[required,custom[email]]" name="tbemail" id="tbemail" value="<?php echo ($article['tbemail']); ?>"/></td>
        </tr>
         <tr>
           <td><span style="color:red">*</span>法人代表</td>
          <td><input type="text" class="txt validate[required]" name="frname" id="frname" value="<?php echo ($article['frname']); ?>"/></td>
			<td><input type="text" class="txt validate[required]" name="frzw" id="frzw" value="<?php echo ($article['frzw']); ?>"/></td>
			<td><input type="text" class="txt validate[required,custom[phone1]]" name="frphone" id="frphone" value="<?php echo ($article['frphone']); ?>"/></td>
			<td><input type="text" class="txt validate[required,custom[chzh]]" name="frchzh" id="frchzh" value="<?php echo ($article['frchzh']); ?>"/></td>
			<td><input type="text"class="txt validate[required,custom[shouji]]" name="frtelphone" id="frtelphone" value="<?php echo ($article['frtelphone']); ?>"/></td>
			<td><input type="text" class="txt validate[required,custom[email]]" name="fremail" id="fremail" value="<?php echo ($article['fremail']); ?>"/></td>
        </tr>
        </tr>
         <tr>
           <td><span style="color:red">*</span>企业名称</td>
           <td colspan="3"><input type="text" class="txt wid validate[required]" name="qyname" id="qyname" value="<?php echo ($article['qyname']); ?>"></td>
           <td><span style="color:red">*</span>企业网址</td>
           <td colspan="2"><input type="text" class="txt wid validate[required]" name="qywz" id="qywz" value="<?php echo ($article['qywz']); ?>"></td>
        </tr>
         <tr>
           <td><span style="color:red">*</span>通讯地址</td>
           <td colspan="3"><input type="text" class="txt wid validate[required]"  name="address" id="address" value="<?php echo ($article['address']); ?>"></td>
           <td><span style="color:red">*</span>邮政编码</td>
           <td colspan="2"><input type="text" class="txt wid validate[required,custom[postnum]]"  name="code" id="code" value="<?php echo ($article['address']); ?>"></td>
        </tr>
         <tr>
           <td><span style="color:red">*</span>注册地</td>
           <td><input type="text" class="txt validate[required]" name="regaddress" id="regaddress" value="<?php echo ($article['regaddress']); ?>"></td>
           <td><span style="color:red">*</span>注册资本/实收资本</td>
           <td><input type="text" class="txt validate[required]" name="funds" id="funds" value="<?php echo ($article['funds']); ?>" ></td>
           <td><span style="color:red">*</span>注册时间</td>
           <td colspan="2"><input type="text " class="txt wid validate[required]" name="regtime" id="regtime" value="<?php echo ($article['regtime']); ?>"></td>
        </tr>
          <tr>
           <td><span style="color:red">*</span>企业性质</td>
           <td colspan="3"><input type="text" class="txt wid validate[required]" name="qyproperty" id="qyproperty" value="<?php echo ($article['qyproperty']); ?>"></td>
           <td rowspan="2"><span style="color:red">*</span>所处阶段</td>
           <td colspan="2" rowspan="2" style="text-align:left;padding-left:5px;">
            <label>
       	      <input type="radio" name="stage" value="1" <?php if($article['stage'] == '1' OR $article['stage'] == ''): ?>checked="checked"<?php endif; ?> onclick="chooseOne(this)" id="CheckboxGroup1_0" />
       	      初创期</label>
       	    <label>
       	      <input type="radio" name="stage" value="2" <?php if($article['stage'] == '2'): ?>checked="checked"<?php endif; ?> onclick="chooseOne(this)" id="CheckboxGroup1_1" />
       	      成长期</label>
            <label>
       	      <input type="radio" name="stage" value="3" <?php if($article['stage'] == '3'): ?>checked="checked"<?php endif; ?> onclick="chooseOne(this)" id="CheckboxGroup1_0" />
       	      扩张期&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
       	    <label>
       	      <input type="radio" name="stage" value="4" <?php if($article['stage'] == '4'): ?>checked="checked"<?php endif; ?>onclick="chooseOne(this)" id="CheckboxGroup1_1" />
       	      成熟期</label>
            <label>
       	      <input type="radio" name="stage" value="5" <?php if($article['stage'] == '5'): ?>checked="checked"<?php endif; ?> onclick="chooseOne(this)" id="CheckboxGroup1_0" />
       	      转型期</label>     
           </td>
        </tr>
          <tr>
           <td><span style="color:red">*</span>所属行业</td>
           <td colspan="3"><input type="text" class="txt wid validate[required]" name="industry" id="industry" value="<?php echo ($article['industry']); ?>"></td>
        </tr>
        <tr class="dtd">
           <td>近三年主要指标</td>                                                                
           <td>总资产</td>
           <td>销售收入</td>
           <td>净利润</td>
           <td>经营性现金流量</td>
           <td>现金净流量</td>
           <td>速动比率</td>
        </tr>
         <tr>
          <td><div class="left"><input class="txt wia" name="year1" id="year1" value="<?php echo ($article['year1']); ?>"/></div><div class="left">&nbsp;年</div></td>
        <td><input class="txt" name="zzc1" id="zzc1" value="<?php echo ($article['zzc1']); ?>"/></td>
        <td><input class="txt" name="xssr1" id="xssr1" value="<?php echo ($article['xssr1']); ?>"/></td>
        <td><input class="txt" name="jlr1" id="jlr1" value="<?php echo ($article['jlr1']); ?>"/></td>
        <td><input class="txt" name="jyxljl1" id="jyxljl1" value="<?php echo ($article['jyxljl1']); ?>"/></td>
        <td><input class="txt" name="xjll1" id="xjll1" value="<?php echo ($article['xjll1']); ?>"/></td>
        <td><input class="txt" name="sdbl1" id="sdbl1" value="<?php echo ($article['sdbl1']); ?>"/></td>
        </tr>
         <tr>
           <td><div class="left"><input class="txt wia" name="year2" id="year2" value="<?php echo ($article['year2']); ?>"/></div><div class="left">&nbsp;年</div></td>
        <td><input class="txt" name="zzc2" id="zzc2" value="<?php echo ($article['zzc2']); ?>"/></td>
        <td><input class="txt" name="xssr2" id="xssr2" value="<?php echo ($article['xssr2']); ?>"/></td>
        <td><input class="txt" name="jlr2" id="jlr2" value="<?php echo ($article['jlr2']); ?>"/></td>
        <td><input class="txt" name="jyxljl2" id="jyxljl2" value="<?php echo ($article['jyxljl2']); ?>"/></td>
        <td><input class="txt" name="xjll2" id="xjll2" value="<?php echo ($article['xjll2']); ?>"/></td>
        <td><input class="txt" name="sdbl2" id="sdbl2" value="<?php echo ($article['sdbl2']); ?>"/></td>
        </tr>
         <tr>
           <td><div class="left"><input class="txt wia" name="year3" id="year3"  value="<?php echo ($article['year3']); ?>"/></div><div class="left">&nbsp;年</div></td>
        <td><input class="txt" name="zzc3" id="zzc3" value="<?php echo ($article['zzc3']); ?>"/></td>
        <td><input class="txt" name="xssr3" id="xssr3" value="<?php echo ($article['xssr3']); ?>"/></td>
        <td><input class="txt" name="jlr3" id="jlr3" value="<?php echo ($article['jlr3']); ?>"/></td>
        <td><input class="txt" name="jyxljl3" id="jyxljl3" value="<?php echo ($article['jyxljl3']); ?>"/></td>
        <td><input class="txt" name="xjll3" id="xjll3" value="<?php echo ($article['xjll3']); ?>"/></td>
        <td><input class="txt" name="sdbl3" id="sdbl3" value="<?php echo ($article['sdbl3']); ?>"/></td>
        </tr>
        <tr class="dtd">
          <td><span style="color:red">*</span>（拟）融资额度</td>
          <td colspan="2"><input  type="text" class="txt wid validate[required]" name="financinged" id="financinged" value="<?php echo ($article['financinged']); ?>"></td>
          <td rowspan="2"><span style="color:red">*</span>资金用途</td>
          <td rowspan="2" colspan="3" style="text-align:left;padding-left:5px;">
            <label>
       	      <input type="radio" name="channelsm" <?php if($article['channelsm'] == '1' OR $article['channelsm'] == ''): ?>checked="checked"<?php endif; ?> value="1" onclick="chooseOne1(this)" id="channelsm" />
       	      产业研发</label>
       	    <label>
       	      <input type="radio" name="channelsm" <?php if($article['channelsm'] == '2'): ?>checked="checked"<?php endif; ?> value="2" onclick="chooseOne1(this)" id="channelsm" />
       	      市场开拓</label>
            <label>
       	      <input type="radio" name="channelsm" value="3" <?php if($article['channelsm'] == '3'): ?>checked="checked"<?php endif; ?> onclick="chooseOne1(this)" id="channelsm" />
       	      扩张期</label>
       	    <label style="margin-right:30px;">
       	      <input type="radio" name="channelsm" value="4" <?php if($article['channelsm'] == '4'): ?>checked="checked"<?php endif; ?> onclick="chooseOne1(this)" id="channelsm" />
       	      资金周转</label>
            <div class="clear"><P><label>
       	      <input type="radio" name="channelsm" value="5" <?php if($article['channelsm'] == '5'): ?>checked="checked"<?php endif; ?> onclick="chooseOne1(this)" id="channelsm" />
       	      其他</label></P><div class="left"><input type="text" class="txt wiz" name="zjytqt" id="" value="<?php echo ($article['zjytqt']); ?>"></div></div>             
         </td>
        </tr>
        <tr>
          <td><span style="color:red">*</span>资金到位时间</td>
          <td colspan="2"><input  type="text" class="txt wid validate[required]" name="zjdwsj" id="zjdwsj" value="<?php echo ($article['zjdwsj']); ?>"></td>
        </tr>
         <tr class="dtd">
          <td><span style="color:red">*</span>已融资额度</td>
          <td colspan="2"><input  type="text" class="txt wid validate[required]" style="height:70px" name="yrongzi" id="yrongzi" value="<?php echo ($article['yrongzi']); ?>"></td>
          <td><span style="color:red">*</span>已融资渠道</td>
          <td colspan="3">
           <label style="margin-right:26px;">
       	      <input type="radio" name="rzchannel" <?php if($article['rzchannel'] == '1' OR $article['rzchannel'] == ''): ?>checked="checked"<?php endif; ?> onclick="chooseOne2(this)" value="1" id="rzchannel" />
       	      银行</label>
       	    <label style="margin-right:200px;">
       	      <input type="radio" name="rzchannel" <?php if($article['rzchannel'] == '2'): ?>checked="checked"<?php endif; ?> onclick="chooseOne2(this)" value="2" id="rzchannel" />
       	      小额贷款公司</label>
            <div class="clear"><P><label>
       	      <input type="radio" name="rzchannel" <?php if($article['rzchannel'] == '3'): ?>checked="checked"<?php endif; ?> onclick="chooseOne2(this)" value="3" id="rzchannel" />
       	      其他：</label></P><div class="left"><input type="text" class="txt wiz" name="yrzqdqt" value="<?php echo ($article['yrzqdqt']); ?>"></div></div>             
         </td>
        </tr>
        <tr>
           <td><span style="color:red">*</span>拟融资项目/<br>拟开发产品介绍</td>
           <td colspan="6"><input type="text" class="txt wix validate[required]" name="xminfo" id="xminfo" value="<?php echo ($article['xminfo']); ?>"></td>
        </tr>
        <tr>
           <td>公司营销情况</td>
           <td colspan="6"><input type="text" class="txt wix" name="mksituation" id="mksituation"  value="<?php echo ($article['mksituation']); ?>"></td>
        </tr>
         <tr>
           <td><span style="color:red">*</span>主要管理团队</td>
           <td colspan="6"><input type="text" class="txt wix validate[required]" name="group" id="group"  value="<?php echo ($article['group']); ?>"></td>
        </tr>
         <tr>
           <td><span style="color:red">*</span>公司股权结构</td>
           <td colspan="6"><input type="text" class="txt wix validate[required]" name="right" id="right"  value="<?php echo ($article['right']); ?>"></td>
        </tr>
         <tr>
           <td><span style="color:red">*</span>主要盈利模式</td>
           <td colspan="6"><input type="text" class="txt wix validate[required]" name="profit" id="profit"  value="<?php echo ($article['profit']); ?>"></td>
        </tr>
        <tr class="dtd">
           <td rowspan="4">科技水平</td>
           <td><span style="color:red">*</span>是否有专利</td>
           <td colspan="5" style="padding-left:5px;text-align:left">
           <label>
       	      <input type="radio" name="ispatent"  <?php if($article['ispatent'] == '1' OR $article['ispatent'] == ''): ?>checked="checked"<?php endif; ?> value="1" onclick="chooseOne3(this)"  id="ispatent" />
       	      发明专利</label>
       	    <label>
       	      <input type="radio" name="ispatent" <?php if($article['ispatent'] == '2'): ?>checked="checked"<?php endif; ?> value="2" onclick="chooseOne3(this)" id="ispatent" />
       	      实用新型专利</label>
            <label>
       	      <input type="radio" name="ispatent" <?php if($article['ispatent'] == '3'): ?>checked="checked"<?php endif; ?> value="3" onclick="chooseOne3(this)" id="ispatent" />
       	      无</label>
       	   
           <label>
       	      <input type="radio" name="ispatent" <?php if($article['ispatent'] == '4'): ?>checked="checked"<?php endif; ?> value="4" onclick="chooseOne3(this)" id="ispatent" />
       	      其他：</label>
            <input type="text" class="txt"  style="width:300px"  name="iszlqt"    value="<?php echo ($article['iszlqt']); ?>">             
           </td>
        </tr>
        <tr >
           <td>技术水平</td>
           <td colspan="5" style="padding-left:5px;text-align:left">                              
           <label>
       	      <input type="radio" name="technique"  <?php if($article['technique'] == '1' OR $article['technique'] == ''): ?>checked="checked"<?php endif; ?> onclick="chooseOne4(this)" value="1" id="technique" />
       	      国际领先</label>
       	    <label>
       	      <input type="radio" name="technique" <?php if($article['technique'] == '2'): ?>checked="checked"<?php endif; ?> onclick="chooseOne4(this)" value="2" id="technique" />
       	      国际先进</label>
            <label>
       	      <input type="radio" name="technique" <?php if($article['technique'] == '3'): ?>checked="checked"<?php endif; ?> onclick="chooseOne4(this)" value="3" id="technique" />
       	      国内领先</label>
       	    <label>
       	      <input type="radio" name="technique" <?php if($article['technique'] == '4'): ?>checked="checked"<?php endif; ?> onclick="chooseOne4(this)" value="4" id="technique" />
       	      国内先进</label>          
           </td>
        </tr>
         <tr>
           <td>是否纳入国家<br>有关计划</td>
           <td colspan="5" style="padding-left:5px;text-align:left">                                                                  
            <label>
       	      <input type="radio" name="stateplan" <?php if($article['stateplan'] == '1' OR $article['stateplan'] == ''): ?>checked="checked"<?php endif; ?> value="1" onclick="chooseOne5(this)" id="stateplan" />
       	      863计划</label>
       	    <label>
       	      <input type="radio" name="stateplan" <?php if($article['stateplan'] == '2'): ?>checked="checked"<?php endif; ?> value="2" onclick="chooseOne5(this)" id="stateplan" />
       	      火炬计划</label>
            <label>
       	      <input type="radio" name="stateplan" <?php if($article['stateplan'] == '3'): ?>checked="checked"<?php endif; ?> value="3" onclick="chooseOne5(this)" id="stateplan" />
       	      重点新产品计划</label>
       	    <label>
       	      <input type="radio" name="stateplan" <?php if($article['stateplan'] == '4'): ?>checked="checked"<?php endif; ?> value="4" onclick="chooseOne5(this)" id="stateplan" />
       	      星火计划</label>
            <label>
       	      <input type="radio" name="stateplan" <?php if($article['stateplan'] == '5'): ?>checked="checked"<?php endif; ?> value="5" onclick="chooseOne5(this)" id="stateplan" />
       	      科技攻关计划</label>
       	    <label>
       	      <input type="radio" name="stateplan" <?php if($article['stateplan'] == '6'): ?>checked="checked"<?php endif; ?> value="6" onclick="chooseOne5(this)" id="stateplan" />
       	      科技成果重点推广计划</label>
			  <P> <label>
       	      <input type="radio" name="stateplan" <?php if($article['stateplan'] == '7'): ?>checked="checked"<?php endif; ?> value="7" onclick="chooseOne5(this)" id="stateplan" />
       	      其他：</label></P><div class="left"><input type="text" class="txt" style="width:395px" name="gjjhqt"  value="<?php echo ($article['gjjhqt']); ?>"></div></div>         
           </td>
        </tr>
         <tr>
           <td><span style="color:red">*</span>获得财政资金<br>资助项目</td>
           <td colspan="5" style="padding-left:5px;text-align:left">  
            <label>
       	      <input type="radio" name="fundxm" <?php if($article['fundxm'] == '1' OR $article['fundxm'] == ''): ?>checked="checked"<?php endif; ?> value="1" onclick="chooseOne6(this)" id="fundxm" />
       	      中小型企业创新基金</label>
       	    <label>
       	      <input type="radio" name="fundxm" value="2" <?php if($article['fundxm'] == '2'): ?>checked="checked"<?php endif; ?> onclick="chooseOne6(this)" id="fundxm" />
       	      挖掘改造基金</label>
            <label>
       	      <input type="radio" name="fundxm" value="3" <?php if($article['fundxm'] == '3'): ?>checked="checked"<?php endif; ?> onclick="chooseOne6(this)" id="fundxm" />
       	      节能贴息</label>
       	    <label>
       	      <input type="radio" name="fundxm" value="4" <?php if($article['fundxm'] == '4'): ?>checked="checked"<?php endif; ?> onclick="chooseOne6(this)" id="fundxm" />
       	      归国留学人员基金</label>
            <label>
       	      <input type="radio" name="fundxm" value="5" <?php if($article['fundxm'] == '5'): ?>checked="checked"<?php endif; ?> onclick="chooseOne6(this)" id="fundxm" />
       	      应用技术研发资金</label>
       	    <label>
       	      <input type="radio" name="fundxm" value="6" <?php if($article['fundxm'] == '6'): ?>checked="checked"<?php endif; ?> onclick="chooseOne6(this)" id="fundxm" />
       	      软件发展基金</label>
            <label style="margin-right:180px;">
       	      <input type="radio" name="fundxm" value="7" <?php if($article['fundxm'] == '7'): ?>checked="checked"<?php endif; ?> onclick="chooseOne6(this)" id="fundxm" />
       	      中小企业国际市场开拓基金</label>
       	   
            <div class="clear">
              <P> <label>
       	      <input type="radio" name="fundxm" value="8" <?php if($article['fundxm'] == '8'): ?>checked="checked"<?php endif; ?> onclick="chooseOne6(this)"  id="fundxm" />
       	      其他：</label></P>
              <div class="left"><input type="text" class="txt" style="width:595px" name="zzxmqt" value="<?php echo ($article['zzxmqt']); ?>"></div>
           </div>         
           </td>
        </tr>
        <tr>
           <td>其他需求</td>
           <td colspan="6">
            <label>
       	      <input type="radio" name="otherdemand" <?php if($article['otherdemand'] == '1' OR $article['otherdemand'] == ''): ?>checked="checked"<?php endif; ?> onclick="chooseOne7(this)" value="1" id="otherdemand" />
       	      产品促销</label>
       	    <label>
       	      <input type="radio" name="otherdemand" <?php if($article['otherdemand'] == '2'): ?>checked="checked"<?php endif; ?> onclick="chooseOne7(this)" value="2" id="otherdemand" />
       	      公共技术开放平台</label>
            <label>
       	      <input type="radio" name="otherdemand" <?php if($article['otherdemand'] == '3'): ?>checked="checked"<?php endif; ?> onclick="chooseOne7(this)" value="3" id="otherdemand" />
       	      企业再发展的定制资讯</label>
       	    <label> 
       	      <input type="radio" name="otherdemand" <?php if($article['otherdemand'] == '4'): ?>checked="checked"<?php endif; ?> onclick="chooseOne7(this)" value="4" id="otherdemand" />
       	      人才培训和招聘</label>
           </td>
        </tr>
      </table>
   </div>
   <div class="finance_02">
      <input type="submit" class="btn" value="确认提交"/>
	   <input type="button" id="chongzhi" class="btn R" value="重置内容"/>
	   <input type="hidden" id="val" value="<?php echo ($id); ?>"/>
	   <input type="hidden" id="id" value="<?php echo ($article['id']); ?>"/>
      <div class="clear"></div>
   </div>
  </div>
  </form>
 
  <div  class="con">
   <form action="<?php echo U('Zixun/sqservice');?>" method="post">
      <div class="asking">
         <div class="title">创新咨询服务</div>
         <div class="box">
		 
            <table cellpadding="0" cellspacing="0" border="0">
               <tr>
                  <td align="right">姓名：</td>
                  <td><input type="text" class="txt validate[required]" name="name" value="<?php echo ($users['name']); ?>"></td>
               </tr>
               <tr>
                  <td align="right">邮箱：</td>
                  <td><input type="text" class="txt validate[required,custom[email]]" name="email" value="<?php echo ($users['email']); ?>"></td>
               </tr>
               <tr>
                  <td align="right">电话：</td>
                  <td><input type="text" class="txt validate[required,custom[shouji]]" name="phone" value="<?php echo ($users['phone']); ?>"></td>
               </tr>
               <tr>
                  <td align="right">咨询类型：</td>
                  <td>
					  <select class="txt" name="type">
							<option value="1">市场开发咨询</option>
							<option value="2">创新能力咨询</option>
							<option value="3">技术研发咨询</option>
							<option value="4">企业在发展定制咨询</option>
					  </select>
				  </td>
               </tr>
               <tr>
                  <td align="right">咨询标题：</td>
                  <td><input type="text" class="txt validate[required]" name="title" value="<?php echo ($article['title']); ?>" style="width:430px"></td>
               </tr>
               <tr>
                  <td align="right">咨询内容 ：</td>
                  <td><textarea  class="txt tn validate[required]" name="info" id="info"></textarea></td>
               </tr>
            </table>
			
         </div>
      </div>
       <div class="finance_02">
		  <input type="submit" class="btn" value="确认提交"/>
		   <input type="button" class="btn R"  id="chongzhi" value="重置内容"/>
		  <div class="clear"></div>
      </div>
	 </form>  
  </div>
  </div> 
  
</div>
<!-----------------------------------------middle--------------------------------------------->
<!-----------------------------------------footer--------------------------------------------->
<div class="footerbg">
   <div class="container">
       <div class="footer">
          <div class="foot"><a href="#">关于我们</a>|<a href="#">广告咨询</a>|<a href="#">帮助信息</a>|<a href="#">联系我们</a>|<a href="#">会员服务</a>|<a href="#">网站导航</a>|<a href="#">国际站</a></div>
          <p>我们的网站：<a href="#">科济天下网</a>|<a href="#">产品商贸网</a>|<a href="#">技术</a>|<a href="#">会展</a>|<a href="#">招商</a>|<a href="#">咨询评估</a>|<a href="#">创新实验室</a></p>
          <p>客服热线022-58168870   客服传真：022-58168885    业务022-58168870</p>
          <p>Copyright © 2015, All Rights Reserved. </p>
          <p>中文版权所有－科济天下网网站所有图片、文字未经许可不得拷贝、复制。</p>
       </div>
   </div>
</div>
<!-----------------------------------------footer--------------------------------------------->
  <div class="showboxbg">
    <div class="showbox">
         <div class="showbox_01"><span>提示</span><a href="#" id="closebox"><img src="/images/Rongzi/icon_62.jpg" /></a></div>
         <div class="showbox_02">
             <p>您的信息已提交，平台专员会尽快与您联系。</p>
         </div>
         <div class="showbox_04">
             <input type="button" class="showbtn" value="返回" id="closebox"/> <input type="button" id="closebox" class="showbtn yellow" value="确定" />
         </div>
    </div>
</div>
</body>
</html>