<?php
/**
 * Javascript 代码压缩
 *
 * 网址 : http://julying.com/lab/compress-js-css/
 * 类型： 原创脚本
 * 邮箱 : i@julying.com
 * 发布 : 2012-06-10 22:28 
 * 更新 : 2012-07-22 12:50
 
 * 版权所有 2012 | julying.com
 * 此插件遵循 MIT、GPL2、GNU 许可.
 * 版权:Copyright (c) julying 版权所有，本程序为开源程序(开放源代码)。
 * http://julying.com/code/license/
 *
 ***************************
*/


/*
//去除CSS文件中的注释
*/
function compressCSSFile($buffer = '') {
	/* remove comments */  
	$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
	/* 移除 tabs, spaces, newlines 标记 */  
    $buffer = str_replace(
		array("\r\n"	, "\r"	, "\n"	, "\t"	, '  '	, '    '	, '    '	,'﻿ '), 
		array(""		, ""	, ""	, ""	, ' '	, ' '		, ' '		,''	),
		$buffer
	); 
	return $buffer;
}

/*
//去除JS文件中的注释
*/
function compressJSFile($buffer = '') { 
	include_once('compressJS.class.php');
	$packer = new compressJS($buffer , 'None', true, false);
	return $packer -> pack() ;
}

/*
去除数组的空白项
*/
function array_remove_empty( &$arr = array() ){   
	foreach ($arr as $key => $value) {   
		if(is_array($value)) {   
			$this -> array_remove_empty($arr[$key]);   
		}else{
			if($value == '') unset($arr[$key]);
		}   
	}   
}

/*
去Bom ，防止css无效 /*2012.8.3
*/
function  remove_bom( &$str = '' ){  
    $charset = array();
	$charset [1] =  substr ( $str ,0,1);  
    $charset [2] =  substr ( $str ,1,1);  
    $charset [3] =  substr ( $str ,2,1);  
    if  (ord( $charset [1]) == 239 && ord( $charset [2]) == 187 && ord( $charset [3]) == 191)  
    	$str = substr( $str ,3);
}

/*
获取文件后缀
*/
function getFileExt( &$file_name = '' ){   
	$file_ext = strtolower(substr($file_name, strrpos($file_name, '.') + 1));
	return $file_ext ; 
}
?>