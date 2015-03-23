<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的新闻</title>
<link href="/css/Keji/type.css" rel="stylesheet" type="text/css" />
<link href="/css/content.css" rel="stylesheet" type="text/css" />
<script src="/Public/statics/js/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/Public/statics/js/WdatePicker.js"></script>
<script type="text/javascript">
$(function(){
	var defaultVal=$(".text").val();
	$(".text").focus(function(){
		if($(this).val()==defaultVal){
			$(this).val("");
		}
	})
	$(".text").blur(function(){
		if($(this).val().length==0){
			$(this).val(defaultVal);
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
                	<li>会员中心  > <span>我的新闻</span></li>
                    <li class="liri"><?php echo ($user['nickname']); ?>&nbsp;  |  &nbsp;<a href="<?php echo U('User/loginout');?>">退出</a></li> 
                </ul>
                <div class="searchBox">
				    <form action="<?php echo U('News/index');?>" method="post">
						<input type="text" class="time" name="start_time" onfocus="{WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})}" value="<?php echo ($time_start); ?>">
						<span>至</span>
						<input type="text" class="time" name="end_time" onfocus="{WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})}" value="<?php echo ($time_end); ?>">
						<input class="text" name="keyword" value="<?php if($keyword == ''): ?>请输入关键字<?php else: echo ($keyword); endif; ?>" />
						<input name="" type="submit" class="redbut"  value="查 询"/>
                    </form>
					<a href="<?php echo U('News/edit');?>"><input name="" style="cursor:pointer" type="button" class="redbut redbut2" value="我要发布" /></a>
                </div>
                <div class="search">
				  <ul style="border:none">
                	<li style="float:left"><a href="<?php echo U('News/index');?>" class="currentA">已发布<span>（<?php echo ($count); ?>）</span></a></li>
                    <li style="float:left"><a href="<?php echo U('News/indexx');?>" >待审核<span>（<?php echo ($daishen); ?>）</span></a></li>
                    <li style="float:left"><a href="<?php echo U('News/refuse');?>">未通过审核<span>（<?php echo ($weishen); ?>）</span></a></li>
				  </ul>
                </div>
				<table width="750" border="0" class="list-tab" cellspacing="0" id="liebiao">
				  <tr>
                    <td width="395">文章标题</td>
                    <td width="127">发布时间</td>
                    <td width="125">浏览量</td>
                    <td>操作</td>
                  </tr>
				  
				<?php if(is_array($manu)): $i = 0; $__LIST__ = $manu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                    <td width="395"><?php echo ($val['title']); ?></td>
                    <td width="127"><?php echo (date("Y-m-d",$val['add_time'])); ?></td>
                    <td width="125"><?php echo ($val['readnum']); ?></td>
                    <td><a href="<?php echo U('News/edit?id='.$val['id']);?>">修改</a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="if(!confirm('确定要删除吗？')){return false;}" href="<?php echo U('News/delete?id='.$val['id']);?>">删除</a></td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
				
				<div class="iconBox page">
                	<?php echo ($page); ?>
                </div>
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