<?php

//导出excel
 function exportexcel($data=array(),$title=array(),$filename='report')
	   {
       header("Content-type:application/octet-stream,charset=UTF-8");
       header("Accept-Ranges:bytes");
       header("Content-type:application/vnd.ms-excel,charset=UTF-8" );  
       header("Content-Disposition:attachment;filename=".$filename.".xls");
       header("Pragma: no-cache");
       header("Expires: 0");
    //导出xls 开始
    if (!empty($title)){
        foreach ($title as $k => $v) {
            $title[$k]=iconv("UTF-8", "GBK",$v);
        }
        $title= implode("\t", $title);
        echo "$title\n";
    }
    if (!empty($data)){
        foreach($data as $key=>$val){
            foreach ($val as $ck => $cv) {
                $data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
            }
            $data[$key]=implode("\t", $data[$key]);
            
        }
        echo implode("\n",$data);
      }
     }
	

//邮件发送
function SendMail($address,$title,$message)
{
    vendor('PHPMailer.classphpmailer');	
    $mail=new PHPMailer();
    // 设置PHPMailer使用SMTP服务器发送Email
    $mail->IsSMTP();
    // 设置邮件的字符编码，若不指定，则为'UTF-8'
    $mail->CharSet='UTF-8'; 
    // 添加收件人地址，可以多次使用来添加多个收件人
    $mail->AddAddress($address); 
    // 设置邮件正文
    $mail->Body=$message;
    // 设置邮件头的From字段。
    $mail->From=C('MAIL_ADDRESS'); 
    // 设置发件人名字
    $mail->FromName='科技天下网邮件服务'; 
    // 设置邮件标题
    $mail->Subject=$title; 
    // 设置SMTP服务器。
    $mail->Host=C('MAIL_SMTP'); 
    // 设置为"需要验证"
    $mail->SMTPAuth=true; 
    // 设置用户名和密码。
    $mail->Username=C('MAIL_LOGINNAME');
    $mail->Password=C('MAIL_PASSWORD');	
    // 发送邮件。
    return($mail->Send());
}
//短信接口
function SendSMS($phoneno,$content){
	$content=urlencode(mb_convert_encoding($content."【泰科网】", 'gb2312', 'utf-8'));  
	$url="http://60.28.240.121:8009/apisms/SendMessAPI.aspx?username=taike&password=123321&messusername=taike&messpassword=123321&returntype=json";
	$url.="&phoneno=".$phoneno."&cont=".$content;
	$res=file_get_contents($url);
	$json=json_decode($res);
	
	if($json->STATE=="0000"){
		return 0;	
	}else{
		return 1;
	}
}
//获取用户类型
function getutype($userid)
{
   $code=new UsersModel('Users');
	$com=$code->field("UTYPE")->where( "ID=".$userid)->find();
	return $com["UTYPE"];
}
//获取广告位名称
function getadsname($ID)
{
    $code=new Admin\Model\AdspaceModel('Adspace');
	$com=$code->field("TNAME")->where("id=".$ID)->find();
	return $com["TNAME"];
}
function getexcel($url){
	vendor('Excel.PHPExcel');	
	$encode='utf-8';
	$filename=$_SERVER['DOCUMENT_ROOT'].$url;
	
	  $objReader = PHPExcel_IOFactory::createReader('Excel5');
      $objReader->setReadDataOnly(true);
      $objPHPExcel = $objReader->load($filename);
      $objWorksheet = $objPHPExcel->getActiveSheet();
      $highestRow = $objWorksheet->getHighestRow();
      $highestColumn = $objWorksheet->getHighestColumn();
      $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
      $excelData = array();
      for ($row = 1; $row<= $highestRow;$row++){
          for ($col=0;$col<$highestColumnIndex;$col++) {
              $excelData[$row][]=(string)$objWorksheet->getCellByColumnAndRow($col,$row)->getValue();
          }
      }
	  
	  //print_r($excelData);
	  
      return $excelData;     
}
function orderpro ($key)
{
  $ret= intval($key/3)%2;
  $resulturl=$ret==0?"<img src='/images/fb_05.jpg' width='6px' height='13px' />":"<img src='/images/index_12.jpg ' width='6px' height='13px'/>";
  return $resulturl;
}
//添加专家研究领域
function addyj($expertid)
{
  $expertkind=new Home\Model\Expers_KsModel('ExpersKs'); 
   $da["EXPID"]=$expertid;
   $da["KID"]=1390012918;
   $expertkind->add($da);
   $expert=new Think\Model('');
   $expert->execute("update TK_EXPERTS set EKINDS='1390012918' where ID=".$expertid);
 
}
//获取权限id
function getqxid($id)
{
	 $code=new AdminGroupModel('AdminGroup');
	$com=$code->field("GRIGHT")->where( "GROUPID=".$id)->find();
	return $com["GRIGHT"];
}
//添加项目合作方式域
function addhz($projectid)
{
 /* $expertkind=new Expers_KsModel('ExpersKs'); 
   $da["EXPID"]=$expertid;
   $da["KID"]=1390012918;
   $expertkind->add($da);*/
   $expert=new \Think\Model('');
   $expert->execute("update TK_PROJECT set PRO_COOPTYPE_NAME='技术,成果转让' where ID=".$projectid);
 
}

function getpinyin($zh,$isfull){
	
	vendor('pinyin.ChineseSpell');
	$ok=new ChineseSpell();
	
	$str='%^&《》：“{}AGDFasdfas===取汉字所有拼音';
	$ret="";
	if($isfull)
	{
		echo 123;
		$ret= $ok->getFullSpell($zh);
	}else{
		$ret= $ok->pinyinshow($zh);
	}
    return $ret;
}


// 获取相对目录
function get_base_path($filename){
	$base_path = $_SERVER['PHP_SELF'];
	$base_path = substr($base_path,0,strpos($base_path,$filename));
	return $base_path;
}
//获取商品图片连接
function get_img($img,$size){
	$type = end(explode( '.', $img));
	if(strpos($img, 'http') === false){
		return $img.'_'.$size.'x1000'.'.'.$type;
	}elseif(strpos($img, 'taobao')!==false|| strpos($img, 'tmall') !==false){
		return $img.'_'.$size.'x1000'.'.'.$type;
	}elseif(strpos($img, 'paipaiimg')!==false){
		$img_arr=explode( '.', $img);
		unset($img_arr[count($img_arr)-1]);
		$newimg_pre=implode(".",$img_arr);
		if($size==500){
			$newimg=$newimg_pre.'.'.$type;
		}elseif($size==210){
			$newimg=$newimg_pre.".200x200.".$type;
		}elseif($size==350){
			$newimg=$newimg_pre.".300x300.".$type;
		}elseif($size==100){
			$newimg=$newimg_pre.".160x160".".".$type;
		}
		return $newimg;
	}
}

//获取广告
function get_ad($id){
	$ad=M('Ad');
	$where['id']=$id;
	$where['is_del']=0;
	$data=$ad->field('start_time,end_time,code')->where($where)->find();
	$now=time();
	if ($now < $data['start_time'] || $now > $data['end_time']){
		return false;
	}else{
		return $data['code'];
	}
}

//格式化商品链接
function match_url($url){
	$url=trim($url);
	$url=urldecode($url);
	preg_match('/^(http\:\/\/)/', $url, $result);
	if (!isset($result)){
		$rs = '';
	}else{
		$rs = @$result[1];
	}
	if (strlen($rs)==0) {
		$url = "http://".$url;
	}
	return $url;
}

//获取商品来源,例如taobao、tmall...
function gain_domain($url){
	$rs= parse_url($url);
	$host = isset($rs['host']) ? $rs['host'] : "none";
	$host = explode('.',$host);
	$host = array_slice($host,-2);
	return $domain = implode('.',$host);
}

// 数组保存到文件
function arr2file($filename, $arr=''){
	if(is_array($arr)){
		$con = var_export($arr,true);
	} else{
		$con = $arr;
	}
	$con = "<?php\nreturn $con;\n?>"; //生成配置文件内容

	$dir = dirname($filename);
	if(!is_dir($dir)){
		mkdir($dir);
	}
	return @file_put_contents($filename,$con); //写入./config.php中
}

/**
 * 获取路径
 *
 * @param $module 模块
 * @param $action 操作
 * @param $id     id
 * @param $aid    aid
 * @return url    url
 */
function get_url($action, $id='', $module='', $aid='',$price=''){

	//用户相关页
	if ($module=='user'){

		//静态页
		if(C('url_html')==1 && $action=='albumDetail' && $id){
			$url = C('web_path').C('url_dir_album').'/'.$id.C('home.html_file_suffix');
			return $url;
		}

		if (C('home.url_model')==0){ //普通模式下
			if ($id && $aid==''){
				$url = U('Home/Uc/'.$action,array('id'=>$id));
			}elseif ($aid){
				$url = U('Home/Uc/'.$action,array('id'=>$id,'aid'=>$aid));
			}else {
				$url = U('Home/Uc/'.$action);
			}
		}else { //REWRITE模式下,操作为index则省略index
			if ($action=='index'){
				if ($id && $aid==''){
					$url = C('web_path').C('home.url_rewrite_user').'/'.$id;
				}elseif ($aid){
					$url = C('web_path').C('home.url_rewrite_user').'/'.$id.'/'.$aid;
				}else {
					$url = C('web_path').C('home.url_rewrite_user');
				}
			}else{
				if ($id && $aid==''){
					$url = C('web_path').C('home.url_rewrite_user').'/'.$action.'/'.$id;
				}elseif ($aid){
					$url = C('web_path').C('home.url_rewrite_user').'/'.$action.'/'.$id.'/'.$aid;
				}else {
					$url = C('web_path').C('home.url_rewrite_user').'/'.$action;
				}
			}
		}
		return $url;
	}

	//店铺相关页
	if ($module=='shop'){

		//静态页
		if(C('url_html')==1 && $aid==''){
			$url = C('web_path').C('url_dir_shop').'/'.$id.C('home.html_file_suffix');
			return $url;
		}

		if (C('home.url_model')==0){ //普通模式下
			if ($id && $aid==''){
				$url = U('Home/Shop/'.$action,array('id'=>$id));
			}elseif($aid) {
				$url = U('Home/Shop/'.$action,array('id'=>$id,'sortby'=>$aid,'price'=>$price));
			}
		}else { //REWRITE模式下,操作为index则省略index
			if ($id && $aid==''){
				$url = C('web_path').C('home.url_rewrite_shop').'/'.$id.C('home.html_url_suffix');
			}elseif($aid) {
				$url = C('web_path').C('home.url_rewrite_shop').'/'.$id.'/'.$aid.'/'.$price.C('home.html_url_suffix');
			}
		}
		return $url;
	}

	//专辑相关页
	if ($module=='album'){

		//静态页
		if(C('url_html')==1 && $action=='index'){
			if ($id){
				$url = C('web_path').C('url_dir_albumCate').'/'.$id.C('home.html_file_suffix');
			}else{
				$url = C('web_path').C('url_dir_albumCate').'/0	'.C('home.html_file_suffix');
			}
			return $url;
		}

		if (C('home.url_model')==0){ //普通模式下
			if ($id){
				$url = U('Home/Album/'.$action,array('id'=>$id));
			}else {
				$url = U('Home/Album/'.$action);
			}
		}else { //REWRITE模式下,操作为index则省略index
			if ($action=='index'){
				if ($id){
					$url = C('web_path').C('home.url_rewrite_album').'/'.$id.C('home.html_url_suffix');
				}else {
					$url = C('web_path').C('home.url_rewrite_album').C('home.html_url_suffix');
				}
			}else {
				if ($id){
					$url = C('web_path').C('home.url_rewrite_album').'/'.$action.'/'.$id.C('home.html_url_suffix');
				}else {
					$url = C('web_path').C('home.url_rewrite_album').'/'.$action.C('home.html_url_suffix');
				}
			}
		}
		return $url;
	}

	//商品相关页
	if ($module=='item'){

		//静态页
		if(C('url_html')==1 && $action=='index'){
			$url = C('web_path').C('url_dir_item').'/'.$id.C('home.html_file_suffix');
			return $url;
		}

		if (C('home.url_model')==0){ //普通模式下
			if ($id && $aid==''){
				$url = U('Home/Item/'.$action,array('id'=>$id));
			}elseif($aid){
				$url = U('Home/Item/'.$action,array('id'=>$id,'p'=>$aid));
			}else {
				$url = U('Home/Item/'.$action);
			}
		}else { //REWRITE模式下,操作为index则省略index
			if ($action=='index'){
				if ($id){
					$url = C('web_path').C('home.url_rewrite_item').'/'.$id.C('home.html_url_suffix');
				}elseif($aid){
					$url = C('web_path').C('home.url_rewrite_item').'/'.$id.'/'.$aid.C('home.html_url_suffix');
				}else {
					$url = C('web_path').C('home.url_rewrite_item').C('home.html_url_suffix');
				}
			}else {
				if ($id){
					$url = C('web_path').C('home.url_rewrite_item').'/'.$action.'/'.$id.C('home.html_url_suffix');
				}elseif($aid){
					$url = C('web_path').C('home.url_rewrite_item').'/'.$action.'/'.$id.'/'.$aid.C('home.html_url_suffix');
				}else {
					$url = C('web_path').C('home.url_rewrite_item').'/'.$action.C('home.html_url_suffix');
				}
			}
		}
		return $url;
	}

	//分类相关页
	if ($module=='cate'){

		//静态页
		if(C('url_html')==1 && $action=='index' && $aid==''){
			$url = C('web_path').C('url_dir_cate').'/'.$id.C('home.html_file_suffix');
			return $url;
		}
		//静态页
		if(C('url_html')==1 && $action=='tag' && $aid==''){
			$url = C('web_path').C('url_dir_tag').'/'.$id.C('home.html_file_suffix');
			return $url;
		}

		if (C('home.url_model')==0){ //普通模式下
			if ($id && $aid==''){
				$url = U('Home/Cate/'.$action,array('id'=>$id));
			}elseif($aid) {
				$url = U('Home/Cate/'.$action,array('id'=>$id,'sortby'=>$aid,'price'=>$price));
			}
		}else { //REWRITE模式下,操作为index则省略index
			if ($action=='index'){
				if ($id && $aid==''){
					$url = C('web_path').C('home.url_rewrite_cate').'/'.$id.C('home.html_url_suffix');
				}elseif($aid) {
					$url = C('web_path').C('home.url_rewrite_cate').'/'.$id.'/'.$aid.'/'.$price.C('home.html_url_suffix');
				}
			}else {
				if ($id && $aid==''){
					$url = C('web_path').C('home.url_rewrite_tag').'/'.$id.C('home.html_url_suffix');
				}elseif($aid) {
					$url = C('web_path').C('home.url_rewrite_tag').'/'.$id.'/'.$aid.'/'.$price.C('home.html_url_suffix');
				}
			}
		}
		return $url;
	}

	//搜索相关页
	if ($module=='search'){
		if (C('home.url_model')==0){ //普通模式下
			if ($id && $aid==''){
				$url = U('Home/Search/'.$action,array('keywords'=>$id));
			}elseif($aid) {
				$url = U('Home/Search/'.$action,array('sortby'=>$aid,'keywords'=>$id));
			}else{
				$url = U('Home/Search/'.$action);
			}
		}else { //REWRITE模式下,操作为index则省略index
			if ($id && $aid==''){
				$url = C('web_path').C('home.url_rewrite_search').'/'.$id;
			}elseif($aid) {
				$url = C('web_path').C('home.url_rewrite_search').'/'.$aid.'/'.$id;
			}else{
				$url = C('web_path').'index.php?a=index&m=Search&g=Home';
			}
		}
		return $url;
	}

	//文章相关页
	if ($module=='article'){

		//静态页
		if(C('url_html')==1){
			if($action=='index'){
				if ($id){
					$url = C('web_path').C('url_dir_articleCate').'/'.$id.C('home.html_file_suffix');
				}else{
					$url = C('web_path').C('url_dir_articleCate').'/0'.C('home.html_file_suffix');
				}
			}else {
				$url = C('web_path').C('url_dir_article').'/'.$id.C('home.html_file_suffix');
			}
			return $url;
		}

		if (C('home.url_model')==0){ //普通模式下
			if ($id){
				$url = U('Home/Article/'.$action,array('id'=>$id));
			}else{
				$url = U('Home/Article/'.$action);
			}
		}else { //REWRITE模式下,操作为index则省略index
			if($action=='index'){
				if ($id){
					$url = C('web_path').C('home.url_rewrite_article').'/list/'.$id.C('home.html_url_suffix');
				}else{
					$url = C('web_path').C('home.url_rewrite_article').'/list'.C('home.html_url_suffix');
				}
			}else {
				$url = C('web_path').C('home.url_rewrite_article').'/'.$id.C('home.html_url_suffix');
			}

		}
		return $url;
	}

	//主站相关页
	if ($module=='index'){
		if (C('home.url_model')==0){ //普通模式下
			$url = U('Home/Index/'.$action);
		}else { //REWRITE模式下,操作为index则省略index
			if ($action=='index'){
				$url = C('web_path').C('home.url_rewrite_index').C('home.html_url_suffix');
			}else {
				$url = C('web_path').C('home.url_rewrite_index').'/'.$action.C('home.html_url_suffix');
			}
		}
		return $url;
	}

}

//POST请求函数
 function post($url, $postFields = null)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FAILONERROR, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		if (is_array($postFields) && 0 < count($postFields))
		{
			$postBodyString = "";
			foreach ($postFields as $k => $v)
			{
				$postBodyString .= "$k=" . urlencode($v) . "&"; 
			}
			unset($k, $v);
			curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);  
 			curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0); 
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString,0,-1));
		}
		$reponse = curl_exec($ch);
		if (curl_errno($ch)){
			throw new Exception(curl_error($ch),0);
		}
		else{
			$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		}
		curl_close($ch);
		return $reponse;
	}

//返回404
function get_404(){
	header('HTTP/1.1 404 Not Found'); 
	header("status: 404 Not Found"); 
	$url=get_url('notfound','','user');
	header("Location:$url");
}

/*
 * curl获取内容，且最长时间为5秒
 * */
function curHtml($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url); 
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	return curl_exec($ch);
	curl_close($ch);
}

/**
 * 获取客户端IP
 */
function getClientIp(){
    $onlineip = '';
    if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
        $onlineip = getenv('HTTP_CLIENT_IP');
    }

    elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')){
        $onlineip = getenv('HTTP_X_FORWARDED_FOR');
    }

    elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
        $onlineip = getenv('REMOTE_ADDR');
    }

    elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $onlineip = $_SERVER['REMOTE_ADDR'];
    }
     return $onlineip;
}

//反转义
function strclean($data){
	$str=$data;
	if (ini_get('magic_quotes_gpc')) {
		return clean($data);
	}else {
		return $data;
	}
}
function clean($data) {
	if (is_array($data)) {
		foreach ($data as $key => $value) {
			$data[clean($key)] = clean($value);
		}
	} else {
		$data =stripslashes($data);
	}
	return $data;
}
//获取随机字符串加密
function str_rand(){
	$arr=array_merge(range('a', 'z'),range('A', 'Z'),range(0, 9));
	shuffle($arr);
	$str='';
	for ($i=0;$i<10;$i++){
		$str .= $arr[$i];
	}
	return $str=md5($str);
}

/*插件部分begin*/
//获取激活的插件信息（从配置文件获取）
function get_active_plugins(){	
	//$config = require './App/Conf/config.php';
	// $active_plugins=unserialize($C('active_plugin'));//反序列化激活的插件信息
	// $cmsHooks = array();
	// if ($active_plugins && is_array($active_plugins)) {
		// foreach($active_plugins as $plugin) {
			// if(true === checkPlugin($plugin)) {//plugin/plugin.php
				// include_once(CMS_ROOT . 'Public/Plugins/' . $plugin);
			// }
		// }
	// }
}
//检查插件
function checkPlugin($plugin) {
	if (is_string($plugin) && preg_match('/^[\w\-\/]+\.php$/', $plugin) && file_exists(CMS_ROOT . 'Public/Plugins/' . $plugin)) {
		return true;
	} else {
		return false;
	}
}
//该函数在插件中调用,挂载插件函数到预留的钩子上
function addAction($hook, $actionFunc) {
	global $cmsHooks;
	if (!@in_array($actionFunc, $cmsHooks[$hook])) {
		$cmsHooks[$hook][] = $actionFunc;
	}
	return true;
}

// 执行挂在钩子上的函数,//支持多参数 eg:doAction('post_comment', $author, $email, $url, $comment);?
function doAction($hook) {
	global $cmsHooks;
	$args = array_slice(func_get_args(), 1);
	if (isset($cmsHooks[$hook])) {
		foreach ($cmsHooks[$hook] as $function) {
			$string = call_user_func_array($function, $args);
		}
	}
}
/*插件部分end*/
function sourcenumber($sourceNumber){
	return substr(strval($sourceNumber+100000),1,6);	
}

function sourcenumber2($sourceNumber){
	return substr(strval($sourceNumber+10000000),1,8);	
}

//获取项目编号
function getprono($type){
	$code=M("ProjectCode");
	$res=$code->where(array("ZNO"=>$type))->select();
	
	return $res[0]["CODE"].sourcenumber($res[0]["CNO"]);
}

function getgoodno(){
	$code=M("ProjectCode");
	$res=$code->where(array("ZNO"=>8))->select();
	return $res[0]["CODE"].sourcenumber2($res[0]["CNO"]);	
}

function changeprono($type){
	$code=new \Think\Model();
	$code->execute("update tk_project_code set CNO=CNO+1 where ZNO=".$type);
}

//获取用户信息
function setcurrentuser($data){
	
	$_SESSION["currentuser"]=$data;
}
function getetcurrentuser(){
	return  $_SESSION["currentuser"];
}
//退出
function exitcurrentuser(){
	unset($_SESSION["currentuser"]);	
}
//后台
function setcurrentadminuser($data){
	$_SESSION["currentadminuser"]=$data;
}
function getetcurrentadminuser(){
	return  $_SESSION["currentadminuser"];
}
//退出
function exitcurrentadminuser(){
	unset($_SESSION["currentadminuser"]);	
}

function getusertype(){
	return array("个人","企业","政府","高校","社会团体及服务");	
}
function adminpage(){
	return array("Admin/User/userpersonal","Admin/User/company","Admin/User/gov","Admin/User/school","Admin/User/caste");	
}

//项目状态
function projectstats(){
	$res[0]="已审核";
	$res[1]="待审核";
	$res[2]="审核未通过";
	$res[3]="已删除";
	$res[10]="草稿";	
	return $res;	
}
 function getprocount($userid)
{ 
   $code=new ProjectModel('Project');
	$com=$code->where( "USERID=".$userid)->count();
	return $com;
}
function getusername($userid)
{
   
   $code=new Admin\Model\UsersModel('Users');
   if($userid){
	$com=$code->field("NICKNAME")->where("ID=".$userid)->find();
	return $com["nickname"];
   }else{
		return;
   }
	
	
	
}
function getuserid($username)
{
   $code=new UsersModel('Users');
	$com=$code->field("ID")->where( "NICKNAME=".$username)->find();
	
	return $com["ID"];
}
function getprjtname($id)
{  
 
  $kind=new Model('');
			$sql='select PRO_NAME from TK_PROJECT where id in(select PROID from tk_project_ks where kid in ('.rtrim($id,",").'))';
			$ex=$kind->query($sql);
			
	$kind="";
	
	foreach ($ex as $KNAME){
		$kind.='<html></html>'.$KNAME["PRO_NAME"].'<br/>';
	}
	return $kind;
}

 function getexpcount($userid)
{ 
   $code=new ExpertsModel('Experts');
	$com=$code->where( "USERID=".$userid)->count();
	return $com;
}

 function getcompanyname($id)
{ 
   $code=new Admin\Model\Users_CompanyModel('UsersCompany');
 
   if($id){
	$com=$code->field("CNAME")->where("userid=".$id)->find();
	//$com=$code->field("TNAME")->where("id=".$ID)->find();
	return $com["cname"];
   }else{
	  return;
   }
	
}

function getcompanyid($name){
    $code=new Users_CompanyModel('UsersCompany');
	$com=$code->field("USERID")->where( "CNAME=".$name)->find();
	return $com["USERID"];

}
function getGoodsname($names){
	$code=new Company_GoodsModel('CompanyGoods');
	$com=$code->field("ID")->where( "GNAME=".$name)->find();
	return $com["GNAME"];
}

function getkindname($id)
{  
 
  $kind=new \Think\Model('');
 
	$sql='select KNAME from tk_company_goods_kind where ktype=1 and id in(select kindid from tk_company_goodskinds where goodid='.$id.')';
   $ex=$kind->query($sql);
	$kind="";
	
	foreach ($ex as $KNAME){
		$kind.=$KNAME["kname"].",";
	}
	return $kind;
}
function getkname($id)
{  
 
    $kind=new \Think\Model('');
			if($id==''){
				$kind="";
			}else{
				$sql='select cnname,id from TK_PROJECT_KIND  where id in('.rtrim($id,",").') group by cnname,id ';
			$ex=$kind->query($sql);
			$kind="";
	
			foreach ($ex as $KNAME){
				$kind.=$KNAME["cnname"].",";
			}
	}
	return $kind;
}

function getprojectname($id)
{  
 
  $kind=new \Think\Model('');
			$sql='select CNNAME,ID from TK_PROJECT_KIND  where id in(select KID from TK_PROJECT_KS where PROID='.$id.') group by ID,CNNAME ';
			$ex=$kind->query($sql);
	$kind="";
	
	foreach ($ex as $KNAME){
		$kind.=$KNAME["CNNAME"].",";
	}
	return $kind;
}
//获取企业性质
function getcompanykind($id)
{ 
   $code=new Company_KindModel('CompanyKind');
	$com=$code->field("TNAME")->where( "ID=".$id)->find();
	return $com["TNAME"];
}

function getkindid($name)
{ 
   $code=new Company_Goods_kindModel('CompanyGoods_kind');
	$com=$code->field("ID")->where( "KNAME=".$name)->find();
	return $com["ID"];
}
function getkinddid($name)
{ 
   $code=new Company_Goods_kindModel('CompanyGoods_kind');
	$com=$code->field("ID")->where( "KTYPE=0 and KNAME=".$name)->find();
	return $com["ID"];
}
function getkindsname($id)
{ 
   $kind=new \Think\Model('');
   $id=trim($id,",");
			$sql='select KNAME from tk_company_goods_kind where ktype=0 and id in(select kindid from tk_company_goodskinds where goodid='.$id.')';
			$ex=$kind->query($sql);
	$kind="";
	
	foreach ($ex as $KNAME){
		$kind.=$KNAME["kname"].",";
	}
	return $kind;
}
function gethyname($id)
{ 
   $kinds=new \Think\Model('');
   $id=trim($id,",");
   $arr=explode(",",$id);
   $kind="";
   foreach($arr as $value){
     if($value){
		$sql='select KNAME from tk_company_goods_kind where id='.$value;
	    $ex=$kinds->query($sql);
		$kind.=$ex[0]['kname'];
		$kind.=",";
	 }
		
   }
	return $kind;
}

//赋值
function getparaurl($param,$key,$value){
	 $param[$key]=$value;
	return  $param;
}

function getparaurl2($param,$key,$value,$arr){
	$array=$arr;
	
	if(in_array($value,$array)){
		unset($array[$value]);
	}else{
		$array[$value]=$value;
	}
	$param[$key]=implode(',',$array);
	return  $param;
}

function getgjmc($id){
	 $code=new ManuscriptModel('Manuscript');
	$com=$code->field("MTITLE")->where( "ID=".$id)->find();
	return $com["MTITLE"];
}

function getstatus($status)
{
   $res[1]="未处理";
   $res[15]="送审中";
   $res[2]="退修";
   $res[3]="已修回";
   $res[30]="已通过";
   $res[35]="已退稿";
	return $res;	
}
//文章标题
function arttitle($id)
{
    $code=new Admin\Model\Data_PaperModel('DataPaper');
	$com=$code->field("TITLE")->where("ID=".$id)->find();
	return $com["title"];
}
//视频名称
function vdtitle($id)
{
    $code=new Data_VideoModel('DataVideo');
	$com=$code->field("TITLE")->where("ID=".$id)->find();
	return $com["TITLE"];
}
//文档类型
function getcatname($id)
{
  $code=new Admin\Model\Datae_CalistModel('DataeCalist');
  if($id){
	$com=$code->field("NAME")->where("ID=".$id)->find();
	return $com["name"];
  }else{
	return;
  }
	
}

function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true){

  if(function_exists("mb_substr")){

     if($suffix){

      return mb_substr($str, $start, $length, $charset)."...";

     }else{

      return mb_substr($str, $start, $length, $charset);

     }

  }elseif(function_exists('iconv_substr')) {

       if($suffix){

            return iconv_substr($str,$start,$length,$charset)."...";

       }else{

        return iconv_substr($str,$start,$length,$charset);

       }

  }

    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";

    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";

    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";

    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";

    preg_match_all($re[$charset], $str, $match);

    $slice = join("",array_slice($match[0], $start, $length));

    if($suffix){ 

        return $slice."...";

    }else{

        return $slice;

    }

}

function getarticleindex($catid,$rownum){
	$Article=new Home\Model\ArticleModel('Article');   
	return $datae=$Article->order('ID desc')->where('CATE_ID='.$catid)->limit($rownum)->select(); 	
}

function word($html){
		$word=new \Think\Word();
		$html=$_GET['html'];
		$word->start(); 
		$wordname = '/Uploads/融资.doc'; 
		echo $html;
		$list=$word->save($wordname);
		
       return 123;		
		 
	}
//下载
function download($filepath,$filename)
{
	if (file_exists($filepath.$filename)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($filename));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($filepath.$filename));
		ob_clean();
		flush();
		readfile($filepath.$filename);
		
		exit;
		} 
		else
		{
			echo "文件不存在";
		}
}
	