<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科济天下网_在线对接会_已接收预约</title>
<link href="/css/Online/index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/Online/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/Online/index_02.js"></script>
<script>
	$(function(){
	   $(".falg").click(function(){
		  var html=$(".search-01 .lie");
		  if(html.is(":hidden"))
		  {
			 html.show();  
		  } 
		  else
		  {
			  html.hide();  
		  }  
	   }) 
	   $(".search-01 .lie").find("a").click(function(){
		   $(".txt_bg").val($(this).html());
		   $(".search-01 .lie").hide();
		}) 
	})
	$(function(){
	$("#name-0").click(function(){
		$(".show").show();
		})
	$(".show").click(function(){
		$(".show").hide();
		})	
})
</script>
</head>

<body>

<div class="topbg">
  <div class="container">
      <div class="logo"><a href="/index.php/Index/Index/index"><img src="/images/News/logo.jpg"></a></div>
      <div class="top_right">
          <div class="navbar">
             <div class="left"><a href="/index.php/Keji/User/login">登录</a><a href="/index.php/Keji/User/register">免费注册</a>客服热线：400-000-0000</div>
             <div class="right"><a href="#">会员服务</a>|<a href="#">网站导航</a>|<a href="#">English</a></div>
             <div class="clear"></div>
          </div>
          <div class="top_list">
             <table cellpadding="0" cellspacing="0" border="0" width="100%">
                 <tr>
                    <td><a  href="/index.php/News/Tnews/index"  class="link">新闻</a></td>
                    <td width="290" class="tdbg"><a href="/index.php/News/Tnlist/index/sid/1">产经</a>
					  <a href="/index.php/News/Tnlist/index/sid/2">政策</a><a href="/index.php/News/Tnlist/index/sid/3">企业</a>
					  <a href="/index.php/News/Tnlist/index/sid/4">热点</a></td>
                    <td><a href="/index.php/Advisory/Zixun/index" class="link">咨询 </a></td>
                    <td width="170" class="tdbg"><a href="/index.php/Advisory/Zixun/service">融资</a><a href="/index.php/Advisory/Zixun/cxzixun">创新</a></td>
                    <td><a href="/index.php/chxin/chxin/index" class="link">科技创新</a></td>
                    <td><a href="/index.php/chxin/chxin/gaikuang">开放平台</a><a href="/index.php/chxin/chxin/yiqi">仪器共享</a></td>
                 </tr>
                 <tr>
                    <td><a href="/index.php/News/Products/index" class="link">产品</a></td>
                    <td class="tdbg"><a href="/index.php/News/Supply/index">供应</a>
					<a href="/index.php/News/Seller/index">求购</a>
					<a href="/index.php/News/Companys/index">公司</a><a href="/index.php/News/Equipment/index">二手</a></td>
                    <td><a href="/index.php/Chengguo/Chengguo/index" class="link">成果 </a></td>
                    <td class="tdbg"><a href="/index.php/Chengguo/Chengguo/project">技术</a>
					<a href="<?php echo U('Advisory/Zixun/service');?>">项目</a></td>
                    <td><a href="#" class="link">在线对接</a></td>    
                    <td><a href="#">会议申请</a><a href="#">在线会议室</a></td>
                 </tr>
                 <tr>
                   <td colspan="6" class="Hr">&nbsp;</td>
                 </tr>
                 <tr>
                    <td><a href="#" class="link">资料</a></td>            
                    <td class="tdbg"><a href="/index.php/Data/Data/book">图书</a>
					
					<a href="/index.php/Data/Data/ppt">PPT</a>
					<a href="/index.php/Data/Data/paper">论文集</a></td>
                    <td><a href="/index.php/News/Merchants/index" class="link">招商  </a></td>         
                    <td class="tdbg"><a href="/index.php/News/Park/index">园区</a><a href="/index.php/News/Policy/index">政策</a></td>
                    <td><a href="/index.php/Xuehui/Xuehui" class="link">学会集群</a></td>
                    <td><div class="topdiv"><a href="#" class="link">专题行业数据</a></div></td> 
                 </tr>
                 <tr>
                    <td><a href="/index.php/News/Activity/home" class="link">会展</a></td>             
                    <td class="tdbg"><a href="/index.php/News/Activity/index">精品</a><a href="/index.php/News/Activity/gallery">展库</a>
					<a href="/index.php/News/Activity/exhibition">在线会展</a></td>
                    <td><a href="#" class="link">专家  </a></td>         
                    <td class="tdbg"><a href="#"> 访谈</a><a href="#">专家库</a></td>
                    <td ><a href="#" class="link">培训认证</a></td>
                    <td><div class="topdiv"><a href="<?php echo U('Keji/User/islogin');?>"><input type="button" class="btn" value="我有需求"></a></div></td>
                     
                 </tr>
             </table>
            
          </div>
      </div>
      <div class="clear"></div>
  </div>
</div>
 

<div class="headbg">
</div>
<div class="navBox">
	<ul>
    	<li><a href="<?php echo U('index/index');?>" class="currentA">首页</a></li>
        <!-- <li><a href="#">会议申请</a></li>
        <li><a href="#">在线会议室</a></li> -->
    </ul>
</div>
<div class="mainBox">
    <h5>当前位置： <a href="<?php echo U('index/index');?>">首页</a> ><span> 我的对接</span></h5>
    <div class="joint">
        <ul  id="nTabs2">
            <li class="currentLi"><a >已接收预约</a></li>
            <li ><a href="<?php echo U('index/calendar');?>">对接日历</a></li>
            <li ><a href="<?php echo U('index/schedule_apply');?>">已提交预约</a></li>
            <li ><a href="<?php echo U('index/schedule_reject');?>">被拒绝预约</a></li>
            <li ><a href="<?php echo U('index/detail');?>">基础资料</a></li>
        </ul>
        <div class="list">
            <div id="nTabs2_Content0">
                <table width="974" border="1" bordercolor="#f5f5f5" cellspacing="0">
                    <tbody>
                        <tr class="top-tab">
                            <td width="235">预约时间</td>
                            <td width="460">对接人</td>
                            <td>操作</td>
                        </tr>
                        <?php
 $i = 0; foreach($scheduleList as $k => $v){ $i++; ?>
                        <tr class="top-tab<?php echo ($i%2+1); ?>">
                            <td ><?php echo ($dayConfig[$calendarListKV[$v['calendar_id']]['day_id']]); ?>  <?php echo ($timeConfig[$calendarListKV[$v['calendar_id']]['time_id']]); ?></td>
                            <td ><a href="<?php echo U('index/info/'.$v['uid']);?>"><?php echo ($v['uname']); ?></a></td>
                            <?php if($v['status'] == 0){ ?>
                            <td><input type="button" class="but2" value="已拒绝" /></td>
                            <?php }elseif($v['status'] == 1){ ?>
                            <td>
                            	<input type="button" value="确  认" class="but2 green-but" onclick="confirm_submit(<?php echo ($v['id']); ?>,2);">&nbsp;&nbsp;&nbsp;&nbsp;
                            	<input type="button" value="拒绝预约" class="but2" onclick="confirm_submit(<?php echo ($v['id']); ?>,0);">
                            </td>
                            <?php }else{ ?>
                            <td><input type="button" class="but2 green-but" value="已确认" /></td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="page">
				<?php echo ($page); ?>
		        </div>
            </div>
        </div>
    </div>
</div>
<link href="/css/News/common.css" rel="stylesheet" type="text/css" />

<div class="footerbg">
   <div class="container">
       <div class="footer">
          <div class="foot"><a href="#">关于我们</a>|<a href="#">广告咨询</a>|<a href="#">帮助信息</a>|<a href="#">联系我们</a>|<a href="#">会员服务</a>|<a href="#">网站导航</a>|<a href="#">国际站</a></div>
          <p>我们的网站：<a href="#">科济天下网</a>|<a href="#">产品商贸网</a>|<a href="#">技术</a>|<a href="#">会展</a>|<a href="#">招商</a>|<a href="#">咨询评估</a>|<a href="#">创新实验室</a></p>
          <p>客服热线：022-0000 0000   客服传真：022-0000 0000    业务联系：022-0000 0000</p>
          <p>Copyright © 2015, All Rights Reserved. </p>
          <p>中文版权所有－科济天下网网站所有图片、文字未经许可不得拷贝、复制。</p>
       </div>
   </div>
</div>


<script type="text/javascript">
//删除
function confirm_submit(schedule_id,action_type){
	$.post("<?php echo U('index/handleSchedule');?>", {schedule_id : schedule_id, action_type : action_type} , function(msg){
   		alert('操作成功');
	   	location.reload();
	});
}
</script>
</body>
</html>