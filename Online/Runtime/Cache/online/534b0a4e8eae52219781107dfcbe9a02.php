<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科济天下网_在线对接会_基础资料</title>
<link href="/css/Online/index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/Online/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#news li").click(function(){
	  $(this).attr("class","current").siblings().attr("class","");
	  $("#news_content .fixnone").eq($(this).index()).show().siblings().hide();	
	})
})
$(function(){
	$("#tech li").click(function(){
	  $(this).attr("class","current").siblings().attr("class","");
	  $("#tech_content .fixnone").eq($(this).index()).show().siblings().hide();	
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
    <div class="joint" style="height:auto;">
          <ul id="news">
             <li ><a href="<?php echo U('index/schedule_accept');?>">已接收预约</a></li>
          	 <li ><a href="<?php echo U('index/calendar');?>">对接日历</a></li>
          	 <li ><a href="<?php echo U('index/schedule_apply');?>">已提交预约</a></li>
          	 <li ><a href="<?php echo U('index/schedule_reject');?>">被拒绝预约</a></li>
          	 <li class="currentLi" ><a >基础资料</a></li>
          </ul>
          <div class="index1_05" id="news_content">
              <div class="fixnone">
       	        <div class="company-01" style="margin:0 auto;">
		       	  <h1><?php echo ($onlineUser['company_name']); ?></h1>
		            <div class="company-02">
		            	<table width="746" border="0" cellspacing="0">
		                	<tbody>
		                    	<tr class="top-tab">
		                        	<td colspan="3"><p><span><?php echo date('Y-m-d',$onlineUser['add_time']);?></span> 发布</p>
		                            				<h2>展位号：<span>【<?php echo ($onlineUser['exhibition_number']); ?>】</span></h2>
		                            </td>
		                        </tr>
		                        <tr>
		                        	<td width="262" colspan="3">公司名称：<a ><?php echo ($onlineUser['company_name']); ?></a></td>
		                            
		                        </tr>
		                        
		                        <tr>
		                        	<td width="262" colspan="2">网站：<a ><?php echo ($onlineUser['company_website']); ?></a></td>
		                            <td>邮政编码：<a ><?php echo ($onlineUser['company_post_code']); ?></a></td>
		                        </tr>
		                        
		                        <tr>
		                        	<td width="262">电话：<a ><?php echo ($onlineUser['company_tel']); ?></a></td>
		                            <td width="242">传真：<a ><?php echo ($onlineUser['company_fax']); ?> </a></td>
		                            <td>EMAIL：<a ><?php echo ($onlineUser['company_email']); ?></a></td>
		                        </tr>
		                        <tr>
		                        	<td width="262" colspan="3">地址：<a ><?php echo ($onlineUser['company_address']); ?></a></td>
		                        </tr>
		                    </tbody>
		                </table>
		            </div>
		            <div class="company-02">
		            	<table width="746" border="0" cellspacing="0">
		                	<tbody>
		                    	<tr class="top-tab">
		                        	<td colspan="3"><h3>企业联系人详细资料</h3></td>
		                        </tr>
		                        <tr>
		                        	<td width="262">性别：<a ><?php echo ($onlineUser['gender']); ?> </a></td>
		                            <td width="242">姓名：<a ><?php echo ($onlineUser['name']); ?> </a></td>
		                            <td>职位：<a ><?php echo ($onlineUser['position']); ?> </a></td>
		                        </tr>
		                        <tr>
		                        	<td>手机：<a ><?php echo ($onlineUser['mobile']); ?></a></td>
		                            <td colspan="2">直拨电话：<a ><?php echo ($onlineUser['tel']); ?></a></td>
		                        </tr>
		                        <tr>
		                        	<td>传真：<a ><?php echo ($onlineUser['fax']); ?> </a></td>
		                            <td colspan="2">电子信箱：<a ><?php echo ($onlineUser['email']); ?></a></td>
		                        </tr>
		                    </tbody>
		                </table>
		            </div>
		            
		        </div>
               <div class="company-03" style="margin:20px auto;">
                    <ul id="tech">
                        <li class="current">产品技术及服务</li>
                        <li>B2B 商务洽谈</li>
                    </ul>
                    <div class="company-06">
                        <div id="tech_content">
                            <div class="fixnone company-04">
                                <?php
 foreach($choosenFatherList as $father){ ?>
		                        <div class="company-05">
		                            <h1>▪ <?php echo $father['cname']; if($father['ename'] != ''){ echo '/'.$father['ename'];} ?></h1>
		                            <?php  foreach($choosenList[$father['id']] as $k=>$v){ ?>
		                            <p><?php echo ($v['cname']); echo ($v['ename']); ?></p>
		                            <?php
 } ?>
		                        </div>
		                        <?php
 } ?>
                            </div>
                            <div class="fixnone company-04" style="display:none;">
                                <div class="company-05">
           	                        <p><strong>能提供的核心产品及技术合作：</strong><?php echo ($onlineUser['cooperation_offer']); ?></p>
			                        <p><strong>已实现的应用：</strong><?php echo ($onlineUser['implemented_application']); ?></p>
		                            <p><strong>需要何种合作或帮助：</strong><?php echo ($onlineUser['cooperation_need']); ?></p>
		                            <p><strong>是否有投融资需求：</strong><?php echo ($onlineUser['fund_demand']==1 ? '是' : '否'); ?></p>
                            
                                </div>

                            </div>
                        </div>
                        <div class="company-08">
                            <h1>对接时间表（红色表示当前已确定预约，黄色表示有待定预约，绿色表示无预约）</h1>
                            <div class="company-07">
                                <?php
 foreach($dayConfig as $day_k => $day_v){ ?>
			                        <dl>
			                            <dd><?php echo ($day_v); ?></dd>
			                            <dt>
			                            <?php
 foreach($timeConfig as $time_k => $time_v){ if(in_array($calendarListDay[$day_k][$time_k]['id'],$scheduleListCid) || $calendarListDay[$day_k][$time_k]['status']==0){ $pic = $scheduleListCidKV[$calendarListDay[$day_k][$time_k]['id']] == 1 ? 'yellow' : 'red'; $checkable = 0; }else{ $pic = 'green'; $checkable = 1; } ?>
			                            	<a class="time_block">
			                            	<img src="/images/Online/icon_<?php echo ($pic); ?>.jpg" />
			                            	&nbsp;&nbsp;<?php echo ($time_v); ?>
			                            	</a>
			                            <?php
 } ?>
			                            </dt>
			                        </dl>
			                    <?php
 } ?>
<style>
.but-box a {
    background-color: #990033;
    border: medium none;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    height: 38px;
    width: 120px;
}
</style>
                                <div class="but-box">
                                	<a href="<?php echo U('index/modify');?>" ><input type="button" value="修改资料" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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


</body>
</html>