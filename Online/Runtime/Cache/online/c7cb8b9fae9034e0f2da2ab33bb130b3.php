<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科济天下网_在线对接会_首页</title>
<link href="/css/Online/index.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/js/Online/jquery-1.7.2.min.js"></script>
<script src="/js/Online/index_02.js"></script>
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
    <div class="main-left">
    	<div class="main-left-01">
        	<h1>在线对接</h1>
            <div class="techlist_04">
          <table cellpadding="0" cellspacing="0" border="0">
              <tr valign="top">
                 <td width="60"><span>行业类别</span></td>
                 <td>
                     <div class="techlist_05">
                         <ul id="list">
                         	<?php  foreach($fatherList as $father_k => $father_v){ $i++; if($i < 11){ ?>
                            <li>
                               <div class="normal"><span <?php if($father_v['id'] == $_GET['fid']){?>class="curr"<?php }?>></span><a class="sub-link">&nbsp;&nbsp;<?php echo mb_substr($father_v['cname'],0,24); ?></a></div>
                               <div class="sbox">
                                  <ol>
                                  <?php
 foreach($childList[$father_v['id']] as $child_k => $child_v){ ?>
                                      <li><font <?php if($child_v['id'] == $_GET['cid']){?>class="curr"<?php }?>></font><a href="?fid=<?php echo ($father_v['id']); ?>&cid=<?php echo ($child_v['id']); ?>" class="link2"><?php echo ($child_v['cname']); ?> </a></li>
                                  <?php } ?>
                                  </ol>
                               </div>
                            </li>
                            <?php } } ?>
                         </ul>
                     </div>
                 </td>
             </tr>
          </table>
       </div>
        </div>
        <div class="main-left-02">
        	<?php foreach($userList as $k => $v){ ?>
        	<dl>
            	<dd>
                	<h1><a href="<?php echo U('index/info/'.$v['uid']);?>">【<?php echo ($v['exhibition_number']); ?>】<?php echo ($v['company_name']); ?></a></h1>
                    <span>发布时间：<?php echo date('Y-m-d',$v['add_time']);?></span>
                </dd>
                <dt><span>能提供的核心产品及技术合作：</span><?php echo ($v['cooperation_offer']); ?>
                </dt>
                <dt><span>已实现的应用：</span><?php echo ($v['implemented_application']); ?>
                </dt>
                <dt><span>需要何种合作或帮助：</span><?php echo ($v['cooperation_need']); ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('index/info/'.$v['uid']);?>">详细信息>></a>
                </dt>
            </dl>
            <?php } ?>
            <div class="numBox">
            	<?php echo ($page); ?>
            </div>
        </div>
    </div>
    <div class="main-right">
    	<div class="iconBox">
        	<div class="icon">
            	<img src="/images/Online/icon_07.jpg" />
                <div class="icon-text">
                	<h1><a href="<?php echo U('index/apply_b');?>">申请对接</a></h1>
                    <p>Apply docking</p>
                </div>
                <span></span>
            </div>
        </div>
        <div class="iconBox" style="margin-top: 10px;">
            <div class="icon">
            	<img src="/images/Online/icon_myduijie.jpg" />
                <div class="icon-text">
                	<h1><a href="<?php echo U('index/detail');?>">我的对接</a></h1>
                    <p>Apply docking</p>
                </div>
                <span></span>
            </div>
        </div>
        <!-- <div class="news-text">
        	<h1>推荐企业</h1>
            <ul>
            	<li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
                <li class="currentLi"><a href="#"><span>[ 推荐 ]</span> NANO科技北京有限公司</a></li>
            </ul>
        </div> -->
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