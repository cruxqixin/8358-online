<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>科济天下网_在线对接会_申请对接</title>
<link href="/css/Online/index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/Online/jquery-1.7.2.min.js"></script>
<script type="text/ecmascript" src="/js/Online/index_02.js"></script>
<link href="/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/Rongzi/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/js/Rongzi/common.js?1231" language="javascript"></script>
<script src="/js/Rongzi/jquery.validationEngine.js" type="text/javascript"></script>
<script src="/js/Rongzi/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript">

$(function(){
	$("#news li").click(function(){
	  $(this).attr("class","current").siblings().attr("class","");
	  $("#news_content .fixnone").eq($(this).index()).show().siblings().hide();	
	})
})
$(function(){
	$("#testdiv input[type=checkbox]").click(function(){
		if($("#testdiv input[type=checkbox]:checked").size()>10)
		{
			$(this).removeAttr("checked");
			return;
		}
		//ajax操作
		//var dthtml='<dt>\
        //                <div class="text-list-01">▪ 激光器及激光应用、激光材料Lasers and laser applications, laser material</div>\
        //                <div class="text-list-02">半导体激光器Semiconductor lasers    /   固体激光器Solid lasers</div>\
        //           </dt>';
		//$(".application-05").append(dthtml);
	})
	$("#btndui").click(function(){
		  $(".showboxbg").show();
		  $(".showboxbg").height($(document).height());
	  }) 
	  $("#closebox").click(function(){
		   $(".showboxbg").hide();
	   }) 
})
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
<script type="text/javascript">
    $(function(){
	   $("#testdiv .application-06 .title-01 input").click(function(){  
		 var temp=$(this).parent().parent().find("ul");  
		 if(temp.is(":hidden"))
		  {
			 temp.show(); 
			 $(this).val("收起");
		  }
		  else
		  {
		    temp.hide();
			$(this).val("展开");
		  }   
	   })		
     })
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
    	<li><a href="<?php echo U('index');?>" class="currentA">首页</a></li>
        <!-- <li><a href="#">会议申请</a></li>
        <li><a href="#">在线会议室</a></li> -->
    </ul>
</div>
<div class="mainBox">
    <h5>当前位置： <a href="<?php echo U('index');?>">首页</a> ><span> 我的对接</span></h5>
    <div class="top-text">
    	<h1>我要申请对接</h1>
        <ul id="news">
        	<a style="color: #fff;" href="<?php echo U('index/apply_c');?>"><li  style="margin-left:0;">专家/观众（个人）对接申请</li></a>
            <a style="color: #fff;" href="<?php echo U('index/apply_b');?>"><li class="current" >企业对接申请</li></a>
        </ul>
    </div>
    <div class="application">
	<div class="fixnone" style="display:block;">
    	<h1>在线对接申请表</h1>

        <form action="<?php echo U('index/apply_b');?>" id="form1" method="post" >
            <div class="application-01">
                <div class="application-02">
                    <h2>公司名称</h2>
                    <div class="textBox-01">
                        <input class="text1 validate[required]" type='text' name='company_name' value="<?php echo $onlineUser['company_name'];?>"/>
                    </div>
                    <h2>展位号</h2>
                    <div class="textBox-06">
                        <input class="text8 validate[required]" type='text' name='exhibition_number' value="<?php echo ($onlineUser['exhibition_number']); ?>"/>
                    </div>
                </div>
                <div class="application-02">
                    <h2>地址</h2>
                    <div class="textBox-03">
                        <input class="validate[required]" type='text' name='company_address' value="<?php echo ($onlineUser['company_address']); ?>"/>
                    </div>
                    <h2>邮政编码</h2>
                    <div class="textBox-04">
                        <input class="validate[required]" type='text' name='company_post_code' value="<?php echo ($onlineUser['company_post_code']); ?>"/>
                    </div>
                </div>
                <div class="application-02">
                    <h2>电话</h2>
                    <div class="textBox-05">
                        <input class="validate[required]" type='text' name='company_tel' value="<?php echo ($onlineUser['company_tel']); ?>"/>
                    </div>
                    <h2>传真</h2>
                    <div class="textBox-05">
                        <input class="validate[required]" type='text' name='company_fax' value="<?php echo ($onlineUser['company_fax']); ?>"/>
                    </div>
                    <h2>电子信箱</h2>
                    <div class="textBox-05">
                        <input class="validate[required]" type='text' name='company_email' value="<?php echo ($onlineUser['company_email']); ?>"/>
                    </div>
                    <h2>公司网站</h2>
                    <div class="textBox-04">
                        <input class="validate[required]" type='text' name='company_website' value="<?php echo ($onlineUser['company_website']); ?>"/>
                    </div>
                </div>
                <div class="application-03">企业联系人详细资料</div>
                <div class="application-02">
                    <h2>性别</h2>
                    <div class="textBox-05">
                        <input name="gender" type="radio" value="M" class="radio" <?php if($onlineUser['gender']=='M' || !isset($onlineUser['gender'])){ echo 'checked="checked"';} ?>/><p>男</p>
                        <input name="gender" type="radio" value="F" class="radio" <?php if($onlineUser['gender']=='F'){ echo 'checked="checked"';} ?>/><p>女</p>
                    </div>
                    <h2>姓名</h2>
                    <div class="textBox-05">
                        <input class="validate[required]" type='text' name='name' value="<?php echo ($onlineUser['name']); ?>"/>
                    </div>
                    <h2>职位</h2>
                    <div class="textBox-05">
                        <input class="validate[required]" type='text' name='position' value="<?php echo ($onlineUser['position']); ?>"/>
                    </div>
                    <h2>手机</h2>
                    <div class="textBox-04">
                        <input class="validate[required]" type='text' name='mobile' value="<?php echo ($onlineUser['mobile']); ?>"/>
                    </div>
                </div>
                <div class="application-02">
                    <h2>直拨电话</h2>
                    <div class="textBox-05">
                        <input class="validate[required]" type='text' name='tel' value="<?php echo ($onlineUser['tel']); ?>"/>
                    </div>
                    <h2>传真</h2>
                    <div class="textBox-05">
                        <input class="validate[required]" type='text' name='fax' value="<?php echo ($onlineUser['fax']); ?>"/>
                    </div>
                    <h2>电子信箱</h2>
                    <div class="textBox-07">
                        <input class="validate[required]" type='text' name='email' value="<?php echo ($onlineUser['email']); ?>"/>
                    </div>
                </div>
                <div class="application-03">贵公司可以为客户提供的具体产品技术及服务/ PRODICTS AND SERVICES OFFERED<span>*最多可选10项</span></div>
                <!-- <div class="application-05">
                    <dl>
                        <dd>已选择：</dd>
                        <?php
 foreach($choosenFatherList as $father){ ?>
                        <dt>
                            <div class="text-list-01">▪ <?php echo $father['cname']; if($father['ename'] != ''){ echo '/'.$father['ename'];} ?></div>
                            <?php  foreach($choosenList[$father['id']] as $k=>$v){ ?>
                            <div class="text-list-02"><?php echo ($v['cname']); echo ($v['ename']); ?></div>
                            <?php
 } ?>
                        </dt>
                        <?php
 } ?>
                    </dl>
                </div>
                 -->
				<div id="testdiv"> 
              <?php
 $i = 0; foreach($fatherList as $father_k => $father_v){ $i++; if($i < 11){ ?>
               <div class="application-06">
                  <div class="title-01">
                        <div class="title-02">▪ <?php echo $father_v['cname']; if($father_v['ename'] != ''){ echo '/'.$father_v['ename'];} ?></div>
                        <input name="" type="button" class="but1" value="<?php echo $i==1?'收起':'展开'; ?>" />
                  </div>
                  <ul <?php if($i != 1){ echo "style='display:none;'"; }?>>
                  <?php
 foreach($childList[$father_v['id']] as $child_k => $child_v){ ?>
                      <li><input name="category[]" type="checkbox" value="<?php echo $child_v['id'];?>" <?php if(in_array($child_v['id'],$cidList)){ echo 'checked="checked"';} ?>/><p><?php echo ($child_v['cname']); echo ($child_v['ename']); ?></p></li>
                  <?php
 } ?>
                  </ul>
                </div>
                <?php } ?>
                <?php
 } ?>
               </div>
                <div class="application-06 application-07">
                    <div class="title-01">
                            <div class="title-02">▪ <?php echo $father_v['cname']; if($father_v['ename'] != ''){ echo '/'.$father_v['ename'];} ?>:
                            <input class="text5" name="other_category" type="text" value="<?php echo ($onlineUser['other_category']); ?>" /></div>
                      </div>
                </div>

				
                <div class="application-03">B2B 商务洽谈</div>
                <div class="application-08">
                    <h1>请认真填写贵公司的合作需求（如希望在展会约见相关展商或关键人，请在此处详细列出，组委会将尽力为您实现）：</h1>
                    <dl>
                        <dd>▪ 能提供的核心产品及技术合作：</dd>
                        <dt><input class="validate[required]" name="cooperation_offer" type="text" value="<?php echo ($onlineUser['cooperation_offer']); ?>"/></dt>
                        <dd>▪ 已实现的应用：</dd>
                        <dt><input class="validate[required]" name="implemented_application" type="text" value="<?php echo ($onlineUser['implemented_application']); ?>"/></dt>
                        <dd>▪ 需要何种合作或帮助：</dd>
                        <dt><input class="validate[required]" name="cooperation_need" type="text" value="<?php echo ($onlineUser['cooperation_need']); ?>"/></dt>
                        <dd>▪ 是否有投融资需求（如有需求组委会会尽力为您安排与投融资机构面谈）： 
                            <lable><input style="float:none;" name="fund_demand" type="radio" value="1" <?php if($onlineUser['fund_demand']==1 || !isset($onlineUser['fund_demand'])){ echo 'checked="checked"';} ?> class="radio2" />是 </lable>
                            <lable><input style="float:none;" name="fund_demand" type="radio" value="0" <?php if($onlineUser['fund_demand']==0){ echo 'checked="checked"';} ?> class="radio2" />否 </lable>
                            <input class="text6" style="float:none" name="fund_amount" type="text" value="<?php echo ($onlineUser['fund_amount']); ?>"/>万元（RMB）
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="application-09">
                <div class="but-01">
		    		<input type='hidden' name='id' value="<?php echo ($onlineUser['id']); ?>"/>
                    <input type="submit" class="but-02 rad-but" value="下一步" />
                    <input type="button" class="but-02" id="chongzhi" value="重置内容" />

                </div>
            </div>
	</form>
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


<div class="showboxbg">
	<div class="show">
        <div class="show-03">
            <h1>提示信息</h1>
            <a href="#" id="closebox">关闭</a>
        </div>
        <div class="show-01">
            <p>内容为空,不可提交</p>
        </div>
        <div class="show-02">
            <input name="" type="button" class="but" value="确定"/>
        </div>
     </div>
</div>
</body>
</html>