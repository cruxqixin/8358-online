<?php
/**
 * Javascript 代码压缩
 *
 * 网址 : http://julying.com/lab/compress-js-css/
 * 类型： 原创脚本
 * 邮箱 : i@julying.com
 * 发布 : 2012-06-10 22:28 
 * 更新 : 2012-08-10 10:22
 
 * 版权所有 2012 | julying.com
 * 此插件遵循 MIT、GPL2、GNU 许可.
 * 版权:Copyright (c) julying 版权所有，本程序为开源程序(开放源代码)。
 * http://julying.com/code/license/
 * 
 * 此程序会自动去除 注释，并且会对文件名进行安全检测、去重复、存在判定等操作，只允许 .js/.css 文件，并且不允许包含远程文件。
 ***************************
 *
 * 压缩多个 js 方法：<script type="text/javascript" src="http://julying.com/lab/compress-js-css/file=/lab/coffee/js/jQuery.js,/lab/coffee/js/jquery.coffee.js"></script>
 *
 * 压缩多个 CSS 方法：<link rel="stylesheet" media="all" href="http://julying.com/lab/compress-js-css/file=/lab/coffee/layerImages/layer.css,/lab/coffee/css/main.css" />
*/
	include('fun.base.php');
	include('miniJsCss.class.php');
	$miniJsCss = new miniJsCss();
	
	$files = isset( $_GET['file']) ? $_GET['file'] : '' ;
	
	
	$miniJsCss -> show( $files );
?>