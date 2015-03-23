<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改资料</title>
<script src="/Public/statics/js/jquery/jquery-1.7.2.min.js"></script>

<link href="/css/Keji/type.css" rel="stylesheet" type="text/css" />
<link href="/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<script src="/js/Keji/jquery.validationEngine.js" type="text/javascript"></script>
<script src="/js/Keji/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="/Public/statics/js/kindeditor4/themes/default/default.css"/>
<script type="text/javascript" src="/Public/statics/js/kindeditor4/kindeditor-min.js"></script>
<script type="text/javascript" src="/js/common.js" language="javascript"></script>
<script type="text/javascript" src="/Public/statics/js/area.js" charset="gbk"></script>
<script type="text/javascript" src="/js/areaw.js" charset="gbk"></script>
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
		if($("[name=UCOUNTRY]:checked").val()=='0'){
			$("#guonei").show();
				$("#guowai").hide();
		}else{
			$("#guonei").hide();
				$("#guowai").show();
		}
		//判断国内外
		$("[name=UCOUNTRY]").click(function(){
			showguoneiwai();
	    })
	    showguoneiwai();
		if($("#coun").val()=='0'){
			$("#s_province").val("<?php echo ($user["gn_prov"]); ?>");
			$("#s_province").change();
			$("#s_city").val("<?php echo ($user["gn_city"]); ?>");
			$("#s_city").change();
			$("#s_county").val("<?php echo ($user["gn_country"]); ?>");
		}else{
			$("#region").val("<?php echo ($user["gw_prov"]); ?>");
			$("#region").change();
			$("#country").val("<?php echo ($user["gw_city"]); ?>");
			$("#country").change();
			$("#city_state").val("<?php echo ($user["gw_country"]); ?>");
			
		} 
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
$(function(){
	var uploadbutton = KindEditor.uploadbutton({
		button : $('#uploadButton')[0],
		fieldName : 'imgFile',
		url : '/Public/statics/js/kindeditor4/php/upload_json.php?dir=image',
		afterUpload : function(data) {
			if (data.error === 0) {
				var url = KindEditor.formatUrl(data.url, 'absolute');
				$('#FACE').val(url);
				$("#imgeface").attr("src",url);
			} else {
				alert(data.message);
			}
		},
		afterError : function(str) {
			alert('网速不给力！');
		}
	});
	uploadbutton.fileBox.change(function(e) {
		uploadbutton.submit();
	});
	
	   $("[name='hyid[]']").change(function(){
			if($("[name='hyid[]']:checked").size()>3){
				$(this).removeAttr("checked");				
			}
			$("#hyname").html("");
				var html="<span>"							
				$("[name='hyid[]']:checked").each(function(){
					html+=$(this).attr("title")
					html+='，';					
				})
				html+="</span>";				
				$("#hyname").html(html);
		})
		
	$("#chongzhi").click(function(){
		$(".text2").val("");
		  $("#s_province").val("省份");
			$("#s_province").change();
			$("#s_city").val("地级市");
			$("#s_city").change();
			$("#s_county").val("市、县级市");
			$("#guonei").show();
			$("#guowai").hide();
			$("#imgeface").attr("src","");
			$("input[@type='radio'][name=UCOUNTRY][@value='1']").attr("checked",true);
			$('input[name="hyid[]"]').each(function () {
				$(this).attr("checked", false);
			});
			$("#hyname").html("");
		
	})
	
	
	
})
$(function(){
		$("#xg").click(function(){
			$("#hys").show();	
		})
		$("#com").click(function(){
			$("#hys").hide();
		})
		("form").submit(function(){
			if($("[name='hyid[]']:checked").size()<1){
				alert("请选择所在行业");
				return;
			}

		})
	})
</script>
</head>

<body>
<script type="text/javascript" src="/Public/statics/js/commonedit.js"></script>
<div class="topBox">
	<div class="top">
    	<h1><a href="<?php echo U('User/login');?>">登录</a>
        	<a href="<?php echo U('User/register');?>">免费注册</a>
            客服热线：400-000-0000
        </h1>
        <p><a href="#">会员服务</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
        	<a href="#">网站导航</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#">English</a>&nbsp;&nbsp;&nbsp;&nbsp;
        </p>
        <div class="logo">
        	<img src="/images/Keji/logo1_02.jpg" />
        </div>
    </div>
</div>
<div class="navBox">
    <div class="nav">
    	<table width="850" border="0" height="140" cellspacing="0";>
          <tr height="44px;">
            <td width="321" class="num1">
            	<dl>
                    <dd class="currentDt"><a href="#">新闻</a></dd>
                    <dt><a href="#">产经</a>&nbsp;&nbsp;&nbsp;
                      <a href="#">政策</a>&nbsp;&nbsp;&nbsp;
                      <a href="#">企业</a>&nbsp;&nbsp;&nbsp;
                      <a href="#">热点</a>&nbsp;&nbsp;
                  <a href="#">新闻专题</a>&nbsp;&nbsp;</dt><br />
                    <dd><a href="#">产品</a></dd>
                    <dt><a href="#">供应</a>&nbsp;
                      <a href="#">求购</a>&nbsp;
                        <a href="#">公司</a>&nbsp;
                        <a href="#">市场分析</a>&nbsp;
                        <a href="#">二手设备</a>&nbsp;&nbsp; &nbsp;</dt> 
                 </dl>
            </td>
            <td width="232"><dl>
                    <dd class="currentDt"><a href="#">咨询评估</a></dd>
                    <dt><a href="#">技术攻关</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#">融资需求</a></dt><br />
                    <dd><a href="#">创新实验室</a></dd>
                    <dt><a href="#">开放实验室</a>&nbsp;&nbsp;&nbsp;
                        <a href="#">仪器共享</a>&nbsp;&nbsp;</dt>
                </dl>
        	</td>
            <td colspan="2" class="current-tr" width="295">
                <dl class="rightDl">
                    <dd class="currentDt"><a href="#">在线对接会</a></dd>
                    <dt><a href="#">会议安排</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#">在线会议室</a>
                    </dt><br />
                    <dd><a href="#">招商</a></dd>
                    <dt><a href="#">园区推荐</a>
                        <a href="#">热点政策</a>
                        <a href="#">融资项目</a>
                    </dt>
                </dl>                    
            </td>
            </tr>
          <tr height="44px;">
            <td width="321" height="44px;">
            	<dl><dd class="currentDt"><a href="#">数据资料</a></dd>
                    <dt><a href="#">图书</a>&nbsp;&nbsp;&nbsp;
                        <a href="#">影音</a>&nbsp;&nbsp;&nbsp;
                        <a href="#">行业报告</a>&nbsp;&nbsp;
                        <a href="#">PPT</a>&nbsp;&nbsp;
                        <a href="#">论文</a>&nbsp;&nbsp;</dt><br />
                    <dd><a href="#">会展</a></dd>
                    <dt><a href="#">精品活动</a>&nbsp;
                        <a href="#">会展库</a>&nbsp;
                        <a href="#">在线会展</a>&nbsp;
                        <a href="#">会展提交</a>&nbsp;&nbsp;</dt>
                </dl>
            </td>
          
            <td colspan="3">
            	<table width="529" border="0">
            	  <tr>
            	    <td width="211">
                        <dl class="footTr">
                          <dd class="currentDt"><a href="#">专家</a></dd>
                            <dt><a href="#">专家库</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">访谈</a></dt><br />
                            <dd><a href="#">技术项目</a></dd>
                            <dt><a href="#">科技成果</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">融资项目</a>&nbsp;&nbsp;</dt>
                        </dl>
                	</td>
            	    <td width="93">
                        <dl class="footTr">
                            <dd class="currentDt icon"><a href="#">培训认证</a></dd><br />
                            <dd class="icon"><a href="#">专题行业数据</a>&nbsp;&nbsp;</dd>
                        </dl>
                	</td>
            	    <td class="current-tr">
                        <dl class="footTr">
                            <dd class="currentDt"><a href="#">学会集群</a></dd>
                            <dt><a href="#">学会介绍</a><a href="#" class="currentA">会员天下</a></dt><br />
                            <dt><input class="but" name="" type="button" value="我有需求"/></dt>
                        </dl>
                    </td>
          	    </tr>
          	  </table>
            	
                
                
            </td>
          </tr>
        </table>
    </div>
</div>
<div class="mainBox">
	<div class="main">
    	<h1>当前位置： 首页 > <span>会员中心</span></h1>
        <div class="main-text">
        	<?php if($user['utype'] == 0): ?><dl>
            	<dd class="current-DD"><a href="#">会员中心</a>
                	<p><a href="<?php echo U('User/upinfo?lb=xg');?>" <?php if($_GET['lb'] == 'xg'): ?>style="color:#c60000"<?php endif; ?>>修改资料</a></p>
                    <p><a href="<?php echo U('User/updatepwd?lb=pwd');?>" <?php if($_GET['lb'] == 'pwd'): ?>style="color:#c60000"<?php endif; ?>>修改密码</a></p>
                </dd>               
                <dd><a href="<?php echo U('News/index?lb=xw');?>" <?php if($_GET['lb'] == 'xw'): ?>class="currentA"<?php endif; ?>>我的新闻</a><a href="<?php echo U('News/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Good/index?lb=cp');?>" <?php if($_GET['lb'] == 'cp'): ?>class="currentA"<?php endif; ?>>我的产品</a><a href="<?php echo U('Good/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Equipment/index?lb=sb');?>" <?php if($_GET['lb'] == 'sb'): ?>class="currentA"<?php endif; ?>>我的二手设备</a><a href="<?php echo U('Equipment/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Project/index?lb=xm');?>" <?php if($_GET['lb'] == 'xm'): ?>class="currentA"<?php endif; ?>>我的技术项目</a><a href="<?php echo U('Project/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Demand/index?lb=xq');?>" <?php if($_GET['lb'] == 'xq'): ?>class="currentA"<?php endif; ?>>我的需求</a><a href="<?php echo U('Demand/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Rongzi/index?lb=rz');?>" <?php if($_GET['lb'] == 'rz'): ?>class="currentA"<?php endif; ?>>我的融资需求</a><a href="<?php echo U('Zixun/Zixun/details');?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Service/index?lb=fwsq');?>" <?php if($_GET['lb'] == 'fwsq'): ?>class="currentA"<?php endif; ?>>我的服务申请</a><a href="<?php echo U('Service/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
				<dd style="display:none"><a href="<?php echo U('Train/index?lb=px');?>" <?php if($_GET['lb'] == 'px'): ?>class="currentA"<?php endif; ?>>我的培训认证</a><a href="<?php echo U('Train/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
              <dd class="current-DD"><a href="#">我的对接咨询</a>
                	<p><a href="">发件箱</a></p>
                    <p><a href="">收件箱</a></p>
                </dd> 
                <dd><a href="<?php echo U('Instrument/index?lb=gx');?>" <?php if($_GET['lb'] == 'gx'): ?>class="currentA"<?php endif; ?>>我的共享仪器</a><a href="<?php echo U('Instrument/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
               <dd><a href="#">我的稿件</a></dd>
                <dd class="current-DD"><a href="#">我的活动</a>
					<p><a href="#">我参加的活动</a></p>
					<p><a href="<?php echo U('Conference/index?lb=lh');?>" <?php if($_GET['lb'] == 'lh'): ?>class="currentA"<?php endif; ?>>我的联合办会</a><a href="<?php echo U('Conference/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a><p>
				</dd>
              <dd style="background:#d9d9d9"><a href="<?php echo U('Caiwu/index?lb=cw');?>" <?php if($_GET['lb'] == 'cw'): ?>class="currentA"<?php endif; ?>>我的财务信息</a><a href="<?php echo U('Caiwu/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                 <dd><a href="<?php echo U('Expert/edit?lb=sq');?>" <?php if($_GET['lb'] == 'sq'): ?>class="currentA"<?php endif; ?>>申请成为专家</a></dd>
				 <dd style="background:#d9d9d9"><a href="<?php echo U('Expert/index?lb=zj');?>" <?php if($_GET['lb'] == 'zj'): ?>class="currentA"<?php endif; ?>>我的专家</a><a href="<?php echo U('Expert/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
               
                <dd><a href="#">我的数据资料</a></dd>
				<dd><a href="<?php echo U('Chxin/index');?>">我的科技创新平台 </a><a href="<?php echo U('Chxin/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
			
            </dl>
	
<?php else: ?>

	<?php if($user['unitnature'] == 1): ?><dl>
            	<dd class="current-DD"><a href="#">会员中心</a>
                	<p><a href="<?php echo U('User/upinfo?lb=xg');?>" class="currentA"<?php endif; if($_GET['lb'] == 'xg'): ?>style="color:#c60000"<?php endif; ?>>修改资料</a></p>
                    <p><a href="<?php echo U('User/updatepwd?lb=pwd');?>" <?php if($_GET['lb'] == 'pwd'): ?>style="color:#c60000"<?php endif; ?>>修改密码</a></p>
                </dd>              
                <dd><a href="<?php echo U('News/index?lb=xw');?>" <?php if($_GET['lb'] == 'xw'): ?>class="currentA"<?php endif; ?>>我的新闻</a><a href="<?php echo U('News/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Good/index?lb=cp');?>" <?php if($_GET['lb'] == 'cp'): ?>class="currentA"<?php endif; ?>>我的产品</a><a href="<?php echo U('Good/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Equipment/index?lb=sb');?>" <?php if($_GET['lb'] == 'sb'): ?>class="currentA"<?php endif; ?>>我的二手设备</a><a href="<?php echo U('Equipment/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
				 <dd><a href="<?php echo U('Buygood/index?lb=sb');?>" <?php if($_GET['lb'] == 'bg'): ?>class="currentA"<?php endif; ?>>我的求购产品</a><a href="<?php echo U('Buygood/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Project/index?lb=xm');?>" <?php if($_GET['lb'] == 'xm'): ?>class="currentA"<?php endif; ?>>我的技术项目</a><a href="<?php echo U('Project/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Demand/index?lb=xq');?>" <?php if($_GET['lb'] == 'xq'): ?>class="currentA"<?php endif; ?>>我的需求</a><a href="<?php echo U('Demand/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Rongzi/index?lb=rz');?>" <?php if($_GET['lb'] == 'rz'): ?>class="currentA"<?php endif; ?>>我的融资需求</a><a href="<?php echo U('Zixun/Zixun/details');?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
				 <dd><a href="<?php echo U('Service/index?lb=fwsq');?>" <?php if($_GET['lb'] == 'fwsq'): ?>class="currentA"<?php endif; ?>>我的服务申请</a><a href="<?php echo U('Service/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd style="display:none"><a href="<?php echo U('Train/index?lb=px');?>" <?php if($_GET['lb'] == 'px'): ?>class="currentA"<?php endif; ?>>我的培训认证</a><a href="<?php echo U('Train/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd class="current-DD"><a href="#">我的对接咨询</a>
                	<p><a href="">发件箱</a></p>
                    <p><a href="">收件箱</a></p>
                </dd> 
                <dd><a href="<?php echo U('Instrument/index?lb=gx');?>" <?php if($_GET['lb'] == 'gx'): ?>class="currentA"<?php endif; ?>>我的共享仪器</a><a href="<?php echo U('Instrument/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="#">我的稿件</a></dd>
                <dd class="current-DD"><a href="#">我的活动</a>
					<p><a href="#">我参加的活动</a></p>
					<p><a href="<?php echo U('Conference/index?lb=lh');?>" <?php if($_GET['lb'] == 'lh'): ?>style="color:#c60000"<?php endif; ?>>我的联合办会</a><a href="<?php echo U('Conference/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a><p>
				</dd>
                <dd style="background:#d9d9d9"><a href="<?php echo U('Caiwu/index?lb=cw');?>" <?php if($_GET['lb'] == 'cw'): ?>class="currentA"<?php endif; ?>>我的财务信息</a><a href="<?php echo U('Caiwu/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Expert/edit?lb=sq');?>" <?php if($_GET['lb'] == 'sq'): ?>class="currentA"<?php endif; ?>>申请成为专家</a></dd>
				 <dd style="background:#d9d9d9"><a href="<?php echo U('Expert/index?lb=zj');?>" <?php if($_GET['lb'] == 'zj'): ?>class="currentA"<?php endif; ?>>我的专家</a><a href="<?php echo U('Expert/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd> 
                <dd><a href="<?php echo U('Business/index?lb=zs');?>" <?php if($_GET['lb'] == 'zs'): ?>class="currentA"<?php endif; ?>>我的招商政策</a><a href="<?php echo U('Business/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="#">我的数据资料</a></dd>
				<dd><a href="<?php echo U('Qy/index');?>">我的企业站</a><a href="<?php echo U('Qy/intro');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
				<dd><a href="<?php echo U('Chxin/index');?>">我的科技创新平台 </a><a href="<?php echo U('Chxin/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
			
            </dl><?php endif; ?>
	<?php if($user['unitnature'] == 2): ?><dl>
            	<dd class="current-DD"><a href="#">会员中心</a>
                	<p><a href="<?php echo U('User/upinfo?lb=xg');?>" <?php if($_GET['lb'] == 'xg'): ?>style="color:#c60000"<?php endif; ?>>修改资料</a></p>
                    <p><a href="<?php echo U('User/updatepwd?lb=pwd');?>" <?php if($_GET['lb'] == 'pwd'): ?>style="color:#c60000"<?php endif; ?>>修改密码</a></p>
                </dd>              
                <dd><a href="<?php echo U('News/index?lb=xw');?>" <?php if($_GET['lb'] == 'xw'): ?>class="currentA"<?php endif; ?>>我的新闻</a><a href="<?php echo U('News/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Good/index?lb=cp');?>" <?php if($_GET['lb'] == 'cp'): ?>class="currentA"<?php endif; ?>>我的产品</a><a href="<?php echo U('Good/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Equipment/index?lb=sb');?>" <?php if($_GET['lb'] == 'sb'): ?>class="currentA"<?php endif; ?>>我的二手设备</a><a href="<?php echo U('Equipment/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                 <dd><a href="<?php echo U('Buygood/index?lb=sb');?>" <?php if($_GET['lb'] == 'bg'): ?>class="currentA"<?php endif; ?>>我的求购产品</a><a href="<?php echo U('Buygood/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
				<dd><a href="<?php echo U('Project/index?lb=xm');?>" <?php if($_GET['lb'] == 'xm'): ?>class="currentA"<?php endif; ?>>我的技术项目</a><a href="<?php echo U('Project/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Demand/index?lb=xq');?>" <?php if($_GET['lb'] == 'xq'): ?>class="currentA"<?php endif; ?>>我的需求</a><a href="<?php echo U('Demand/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Rongzi/index?lb=rz');?>" <?php if($_GET['lb'] == 'rz'): ?>class="currentA"<?php endif; ?>>我的融资需求</a><a href="<?php echo U('Zixun/Zixun/details');?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
               <dd><a href="<?php echo U('Service/index?lb=fwsq');?>" <?php if($_GET['lb'] == 'fwsq'): ?>class="currentA"<?php endif; ?>>我的服务申请</a><a href="<?php echo U('Service/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
			   <dd style="display:none"><a href="<?php echo U('Train/index?lb=px');?>" <?php if($_GET['lb'] == 'px'): ?>class="currentA"<?php endif; ?>>我的培训认证</a><a href="<?php echo U('Train/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd class="current-DD"><a href="#">我的对接咨询</a>
                	<p><a href="">发件箱</a></p>
                    <p><a href="">收件箱</a></p>
                </dd> 
                <dd><a href="<?php echo U('Instrument/index?lb=gx');?>" <?php if($_GET['lb'] == 'gx'): ?>class="currentA"<?php endif; ?>>我的共享仪器</a><a href="<?php echo U('Instrument/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="#">我的稿件</a></dd>
                <dd class="current-DD"><a href="#">我的活动</a>
					<p><a href="#">我参加的活动</a></p>
					<p><a href="<?php echo U('Conference/index?lb=lh');?>" <?php if($_GET['lb'] == 'lh'): ?>class="currentA"<?php endif; ?>>我的联合办会</a><a href="<?php echo U('Conference/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a><p>
				</dd>
                <dd style="background:#d9d9d9"><a href="<?php echo U('Caiwu/index?lb=cw');?>" <?php if($_GET['lb'] == 'cw'): ?>class="currentA"<?php endif; ?>>我的财务信息</a><a href="<?php echo U('Caiwu/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Expert/edit?lb=sq');?>" <?php if($_GET['lb'] == 'sq'): ?>class="currentA"<?php endif; ?>>申请成为专家</a></dd>
				 <dd style="background:#d9d9d9"><a href="<?php echo U('Expert/index?lb=zj');?>" <?php if($_GET['lb'] == 'zj'): ?>class="currentA"<?php endif; ?>>我的专家</a><a href="<?php echo U('Expert/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                
                <dd><a href="<?php echo U('Business/index?lb=zs');?>" <?php if($_GET['lb'] == 'zs'): ?>class="currentA"<?php endif; ?>>我的招商政策</a><a href="<?php echo U('Business/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="#">我的数据资料</a></dd>
				<dd><a href="<?php echo U('Qy/index');?>">我的企业站</a><a href="<?php echo U('Qy/intro');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
				<dd><a href="<?php echo U('Chxin/index');?>">我的科技创新平台 </a><a href="<?php echo U('Chxin/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
			
            </dl><?php endif; ?>
	<?php if($user['unitnature'] == 3): ?><dl>
            	<dd class="current-DD"><a href="#">会员中心</a>
                	<p><a href="<?php echo U('User/upinfo?lb=xg');?>" <?php if($_GET['lb'] == 'xg'): ?>style="color:#c60000"<?php endif; ?>>修改资料</a></p>
                    <p><a href="<?php echo U('User/updatepwd?lb=pwd');?>" <?php if($_GET['lb'] == 'pwd'): ?>style="color:#c60000"<?php endif; ?>>修改密码</a></p>
                </dd>              
                <dd><a href="<?php echo U('News/index?lb=xw');?>" <?php if($_GET['lb'] == 'xw'): ?>class="currentA"<?php endif; ?>>我的新闻</a><a href="<?php echo U('News/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Good/index?lb=cp');?>" <?php if($_GET['lb'] == 'cp'): ?>class="currentA"<?php endif; ?>>我的产品</a><a href="<?php echo U('Good/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Equipment/index?lb=sb');?>" <?php if($_GET['lb'] == 'sb'): ?>class="currentA"<?php endif; ?>>我的二手设备</a><a href="<?php echo U('Equipment/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                 <dd><a href="<?php echo U('Buygood/index?lb=sb');?>" <?php if($_GET['lb'] == 'bg'): ?>class="currentA"<?php endif; ?>>我的求购产品</a><a href="<?php echo U('Buygood/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
				<dd><a href="<?php echo U('Project/index?lb=xm');?>" <?php if($_GET['lb'] == 'xm'): ?>class="currentA"<?php endif; ?>>我的技术项目</a><a href="<?php echo U('Project/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Demand/index?lb=xq');?>" <?php if($_GET['lb'] == 'xq'): ?>class="currentA"<?php endif; ?>>我的需求</a><a href="<?php echo U('Demand/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Rongzi/index?lb=rz');?>" <?php if($_GET['lb'] == 'rz'): ?>class="currentA"<?php endif; ?>>我的融资需求</a><a href="<?php echo U('Zixun/Zixun/details');?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Service/index?lb=fwsq');?>" <?php if($_GET['lb'] == 'fwsq'): ?>class="currentA"<?php endif; ?>>我的服务申请</a><a href="<?php echo U('Service/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
				<dd style="display:none"><a href="<?php echo U('Train/index?lb=px');?>" <?php if($_GET['lb'] == 'px'): ?>class="currentA"<?php endif; ?>>我的培训认证</a><a href="<?php echo U('Train/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd class="current-DD"><a href="#">我的对接咨询</a>
                	<p><a href="">发件箱</a></p>
                    <p><a href="">收件箱</a></p>
                </dd> 
                <dd><a href="<?php echo U('Instrument/index?lb=gx');?>" <?php if($_GET['lb'] == 'gx'): ?>class="currentA"<?php endif; ?>>我的共享仪器</a><a href="<?php echo U('Instrument/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="#">我的稿件</a></dd>
                <dd class="current-DD"><a href="#">我的活动</a>
					<p><a href="#">我参加的活动</a></p>
					<p><a href="<?php echo U('Conference/index?lb=lh');?>" <?php if($_GET['lb'] == 'lh'): ?>class="currentA"<?php endif; ?>>我的联合办会</a><a href="<?php echo U('Conference/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a><p>
				</dd>
                <dd style="background:#d9d9d9"><a href="<?php echo U('Caiwu/index?lb=cw');?>" <?php if($_GET['lb'] == 'cw'): ?>class="currentA"<?php endif; ?>>我的财务信息</a><a href="<?php echo U('Caiwu/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="<?php echo U('Expert/edit?lb=sq');?>" <?php if($_GET['lb'] == 'sq'): ?>class="currentA"<?php endif; ?>>申请成为专家</a></dd>
				 <dd style="background:#d9d9d9"><a href="<?php echo U('Expert/index?lb=zj');?>" <?php if($_GET['lb'] == 'zj'): ?>class="currentA"<?php endif; ?>>我的专家</a><a href="<?php echo U('Expert/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                
                <dd><a href="<?php echo U('Business/index?lb=zs');?>" <?php if($_GET['lb'] == 'zs'): ?>class="currentA"<?php endif; ?>>我的招商政策</a><a href="<?php echo U('Business/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="#">我的数据资料</a></dd>
				<dd><a href="<?php echo U('Qy/index');?>">我的企业站</a><a href="<?php echo U('Qy/intro');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
				
            </dl><?php endif; ?>
	<?php if($user['unitnature'] == 4): ?><dl>
            	<dd class="current-DD"><a href="#">会员中心</a>
                	<p><a href="<?php echo U('User/upinfo?lb=xg');?>" <?php if($_GET['lb'] == 'xg'): ?>style="color:#c60000"<?php endif; ?>>修改资料</a></p>
                    <p><a href="<?php echo U('User/updatepwd?lb=pwd');?>" <?php if($_GET['lb'] == 'pwd'): ?>style="color:#c60000"<?php endif; ?>>修改密码</a></p>
                </dd>               
                 <dd><a href="<?php echo U('News/index?lb=xw');?>" <?php if($_GET['lb'] == 'xw'): ?>class="currentA"<?php endif; ?>>我的新闻</a><a href="<?php echo U('News/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                 <dd><a href="<?php echo U('Demand/index?lb=xq');?>" <?php if($_GET['lb'] == 'xq'): ?>class="currentA"<?php endif; ?>>我的需求</a><a href="<?php echo U('Demand/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd class="current-DD"><a href="#">我的对接咨询</a>
                	<p><a href="">发件箱</a></p>
                    <p><a href="">收件箱</a></p>
                </dd> 
                <dd><a href="<?php echo U('Instrument/index?lb=gx');?>" <?php if($_GET['lb'] == 'gx'): ?>class="currentA"<?php endif; ?>>我的共享仪器</a><a href="<?php echo U('Instrument/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                <dd><a href="#">我的稿件</a></dd>
                 <dd class="current-DD"><a href="#">我的活动</a>
					<p><a href="#">我参加的活动</a></p>
					<p><a href="<?php echo U('Conference/index?lb=lh');?>" <?php if($_GET['lb'] == 'lh'): ?>class="currentA"<?php endif; ?>>我的联合办会</a><a href="<?php echo U('Conference/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a><p>
				</dd>
                 <dd style="background:#d9d9d9"><a href="<?php echo U('Caiwu/index?lb=cw');?>" <?php if($_GET['lb'] == 'cw'): ?>class="currentA"<?php endif; ?>>我的财务信息</a><a href="<?php echo U('Caiwu/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
                
                 <dd><a href="<?php echo U('Business/index?lb=zs');?>" <?php if($_GET['lb'] == 'zs'): ?>class="currentA"<?php endif; ?>>我的招商政策</a><a href="<?php echo U('Business/edit');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
				<dd><a href="#">我的数据资料</a></dd>
				<dd><a href="<?php echo U('Qy/index');?>">我的企业站</a><a href="<?php echo U('Qy/intro');?>">&nbsp;&nbsp;&nbsp;&nbsp;<span>发布</span></a></dd>
				
            </dl><?php endif; ?>
	
</if>
            <div class="shopBox">
            	<ul>
                	<li>会员中心  > <span>修改资料</span></li>
                    <li class="liri"><?php echo ($user['nickname']); ?>&nbsp;  |  &nbsp;<a href="<?php echo U('User/loginout');?>">退出</a></li> 
                </ul>
                <div class="clear"></div>
				<form action="<?php echo U('User/upinfo');?>" method="post"> 
                <table width="750" border="0" cellspacing="0">
                   <tr>
                    <td class="text-nav">头像：</td>
                    <td><img id="imgeface"  style="width:130px; height:130px;" src="<?php if($article['face'] == ''): ?>/images/chosefile.jpg<?php else: echo ($article["face"]); endif; ?>" />
					<br />
					<input type="hidden" name="FACE" id="FACE" class="pub_03 validate[required]" size="60" value="<?php echo ($article["face"]); ?>" />
					<input type="button" id="uploadButton" value="上传图片" />
			       </td>
                  </tr>
                  <tr>
                    <td class="text-nav">用户名：</td>
                    <td><input class="text2" value="<?php echo ($user['nickname']); ?>" name="NICKNAME" /></td>
                  </tr>
                  <tr>
                    <td class="text-nav">电子邮箱：</td>
                    <td><input class="text2" value="<?php echo ($user['email']); ?>" name="EMAIL" /></td>
                  </tr>
                  <tr>
                    <td class="text-nav">姓名：</td>
                    <td><input class="text2" value="<?php echo ($user['lxrname']); ?>" name="LXRNAME"/></td>
                  </tr>
                  <tr>
                    <td class="text-nav">性别：</td>
                    <td><input type="radio" name="sex" id="sex" class="radio_style" value="1" <?php if($article['sex'] != '0'): ?>checked="checked"<?php endif; ?> > &nbsp;男&nbsp;&nbsp;&nbsp;
        	             <input type="radio" name="sex" id="sex" class="radio_style" value="0" <?php if($article['sex'] == '0'): ?>checked="checked"<?php endif; ?>> &nbsp;女
						</td>
                  </tr>
                  <tr>
                    <td class="text-nav">单位名称：</td>
                    <td><input class="text2 validate[required]" value="<?php echo ($user['companyname']); ?>" name="COMPANYNAME"/></td>
                  </tr>
                  <tr>
                    <td class="text-nav">电话:</td>
                    <td><input class="text2 validate[required,custom[phone1]]" value="<?php echo ($user['phone']); ?>" name="PHONE"/></td>
                  </tr>
                  <tr>
                    <td class="text-nav">手机号（选填）：</td>
                    <td><input class="text2 validate[required,custom[shouji]]" value="<?php echo ($user['lxrtelphone']); ?>" name="LXRTELPHONE"/></td>
                  </tr>
                  <tr>
                    <td class="text-nav">部门：</td>
                    <td><input class="text2 validate[required]" value="<?php echo ($user['department']); ?>" name="DEPARTMENT"/></td>
                  </tr>
                  <tr>
                    <td class="text-nav">职位:</td>
                    <td><input class="text2 validate[required]" value="<?php echo ($user['position']); ?>" name="POSITION"/></td>
                  </tr>
                  <tr>
                    <td class="text-nav">国家/地区：</td>
                    <td><input name="UCOUNTRY" type="radio" value="0" <?php if($user['ucountry'] == 0): ?>checked="checked"<?php endif; ?> class="radioBox"/>&nbsp;&nbsp;国内&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    	<input name="UCOUNTRY" type="radio" value="1" <?php if($user['ucountry'] == 1): ?>checked="checked"<?php endif; ?>/>&nbsp;&nbsp;国内<br />
						<input type="hidden" id="coun" value="<?php echo ($user['ucountry']); ?>"/>
					</td>
                  </tr>
				  
				  <tr>
					 <td></td>
					 <td>
					      <span id="guonei">
							<select name="GN_PROV" id="s_province" va="1" class="num2 validate[required]"></select>
							<select name="GN_CITY" id="s_city" va="1" class="num2 validate[required]"></select>
							<select name="GN_COUNTRY" id="s_county" va="1" class="num2 validate[required]"></select>
                      </span>
                       <span id="guowai" style="display:none">
                    Region<select id="region" name="GW_PROV" style="width:100px;height:25px" onChange="set_country(this,country,city_state)">
							<option value="" selected="selected">Select Region</option>
							<script type="text/javascript"> setRegions(this); </script>
						</select>
					Country<select id="country" name="GW_CITY"  style="width:100px;height:25px"  disabled="disabled" onChange="set_city_state(this,city_state)"></select>
					State<select id="city_state" name="GW_COUNTRY" style="width:100px;height:25px"   disabled="disabled"></select>
                </span>
					 </td>
				  </tr>
                  <tr>
                    <td class="text-nav">联系地址：</td>
                    <td><input class="text2 validate[required]" value="<?php echo ($user['address']); ?>" name="ADDRESS"/></td>
                  </tr>
                  <tr>
                    <td class="text-nav">邮编:</td>
                    <td><input class="text2 validate[required,custom[postnum]]" value="<?php echo ($user['code']); ?>" name="CODE"/></td>
                  </tr>
                  <tr>
                    <td class="text-nav">单位性质：</td>
                    <td><select class="num2">
                    		<option value="1" <?php if($user['unitnature'] == 1): ?>selected="selected"<?php endif; ?>>企业</option>
					<option value="2" <?php if($user['unitnature'] == 2): ?>selected="selected"<?php endif; ?>>科研机构</option>
					<option value="3" <?php if($user['unitnature'] == 3): ?>selected="selected"<?php endif; ?>>社会团体及服务机构</option>
					<option value="4" <?php if($user['unitnature'] == 4): ?>selected="selected"<?php endif; ?>>政府机构</option>
                    	</select></td>
                  </tr>
                  <tr>
                    <td class="text-nav">所在行业(最多选择三项)：</td>
                    <td id="hy">
					     <span id="hyname"><?php echo (gethyname($user['industry'])); ?> &nbsp;&nbsp;&nbsp;</span><span style="color:red;width:150px;" id="xg">修改</span>
					     <div id="hys" style="display:none;padding:0 15PX;width:452px;font-size:14px;margin-top:15px;border:1px #666666 solid">
						 <?php if(is_array($hy)): $i = 0; $__LIST__ = $hy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if($val['parentid'] == '0'): ?><label style="word-wrap:break-word;line-height:25px;">
							     <input type="checkbox"  name="hyid[]" value="<?php echo ($val['id']); ?>" title="<?php echo ($val['kname']); ?>" id="kindid" />
                	            <?php echo ($val['kname']); ?>
							</label><?php endif; endforeach; endif; else: echo "" ;endif; ?> <label id="com" style="color:red">确认</label></div>
                    	<input type="hidden" id="cates" value="<?php echo ($user['industry']); ?>"/>
						</td>
                  </tr>
                  <tr>
                    <td class="text-nav"></td>
                    <td>
                    	<div class="butBox">
                    		<input name="" type="submit" class="but redBut" value="确认发布" />
                            <input name="" type="button" id="chongzhi" class="but" value="重置发布" />
                         </div>
                    </td>
                  </tr>
                </table>
            </form>
            </div>
        </div>
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