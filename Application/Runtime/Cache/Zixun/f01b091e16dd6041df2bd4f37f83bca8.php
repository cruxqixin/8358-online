<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科技天下网——融资服务</title>
<link href="/css/Rongzi/common.css" rel="stylesheet" type="text/css">
<link href="/css/Rongzi/type.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/js/Rongzi/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/Rongzi/common.js" language="javascript"></script>
<!--[if lte IE 6]>
<script type="text/javascript" src="/js/PNG.js"></script>
<script type="text/javascript" src="/js/PNGS.js"></script>
<![endif]-->
</head>

<body id="service">
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
<div class="server_01">
   <img src="/images/Rongzi/2_02.jpg">
</div>
<div class="server_02">
  <img src="/images/Rongzi/2_03.jpg">
</div>  
<div class="server_03">
  <img src="/images/Rongzi/2_04.jpg">
</div>
<div class="server_02">
   <div class="server_03">
  <img src="/images/Rongzi/2_05.jpg">
 </div>
</div>
<div class="server_04">
  <img src="/images/Rongzi/2_06.jpg">
</div>
<div class="server_05">
   <div class="container">
       <div class="server_04"><img src="/images/Rongzi/2_09.jpg"></div>
       <div class="server_06">
           <ul>
               <li class="cur" style="margin-right:115px">
                   <div class="norpic" style="display:none;"><img src="/images/Rongzi/2_12.png"></div>
                   <div class="acpic" style="display:block;"><img src="/images/Rongzi/2_15.png"></div>
                   <div class="title">第一阶段<span> 立 项</span></div>
               </li>
                <li style="margin-right:115px">
                   <div class="norpic"><img src="/images/Rongzi/2_13.png"></div>
                   <div class="acpic"><img src="/images/Rongzi/2_16.png"></div>
                   <div class="title">第二阶段<span> 执 行</span></div>
               </li>
                <li>
                   <div class="norpic"><img src="/images/Rongzi/2_14.png"></div>
                   <div class="acpic"><img src="/images/Rongzi/2_17.png"></div>
                   <div class="title">第三阶段<span> 管 理</span></div>
               </li>
               
           </ul>
           <div class="clear"></div>
       </div>
       <div class="server_07">
          <div class="con" style="display:block;"><img src="/images/Rongzi/2_18.jpg"></div>
          <div class="con"><img src="/images/Rongzi/2_19.jpg"></div>
          <div class="con"><img src="/images/Rongzi/2_20.jpg"></div>
       </div>
   </div>
</div>
<div class="server_08"><img src="/images/Rongzi/2_21.jpg"></div>
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
 <div class="index_15"><a href="<?php echo U('Zixun/details');?>" class="btn"></a></div>
</body>
</html>