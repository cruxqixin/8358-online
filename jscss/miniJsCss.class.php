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
 ***************************
*/

class miniJsCss{
	private $DS = DIRECTORY_SEPARATOR ;
	private $charset = 'UTF-8';
	private $offset = 3600 ; //css文件的距离现在的过期时间，
	private $rootPath = ''; //网站所在的根目录的物理路径
	private $rootPathLen = 0;
	
	function __construct(){
		$this -> getRootPath();
	}	
	/*
	@public function show() 输出文件
	*/
	public function show( &$files ){		
		//检查文件
		$filesPath =  $this -> getFilesPath($files) ;
		
		//开始发送 header
		$this -> getShowType( $filesPath ) ;
		//包含文件
		$fileString = '';
		$string = '';
		
		$file = isset( $files[0]) ? $files[0] : '';
		$fileTxt = strtolower( getFileExt( $file ));
		switch(  $fileTxt  ){
			case 'css' : {
				header("content-type: text/css; Charset: ". $this -> charset);				 
			}
			break ;
			
			case 'js' : {
				header ("content-type:application/javascript; Charset: ". $this -> charset);
			}
			break ;		
		}
		
		foreach( $filesPath as $path ){
			if( @file_exists( $path) ){
				$string = @file_get_contents( $path ) ;
				$fileTxt = strtolower( getFileExt( $path )) ;
				if( 'css' == $fileTxt ){
					$string = compressCSSFile( $string );			
					//如果因为 php safe_mode 模式不允许包含，或者文件不存在等问题，字符串为空。防止报错、暴路径
					//修正 css 的 背景图片路径
					$string = $this -> correctImagePath( $string , $path ) ."\n\n";
				}elseif( 'js' == $fileTxt ){
					$string = compressJSFile( $string );
				}
				remove_bom( $string ) ;
				$fileString .= $string ;
			}
		}		
		echo $fileString ; 		
		//if(extension_loaded('zlib')){
//			ob_end_flush();
//		}
	}
	
	/*
	@public function correctImagePath() //修正背景图片的路径
	*/
	private function correctImagePath( $cssString = '' , &$cssPath = '' ) {
		$cssUrl = $this -> getFileUrl( $cssPath) ;
		//修正背景路径, background :url()  , behavior: url(iepngfix.htc)
		$pattern = '/(\s*)url(\s*)\((\s*)(\'|"){0,1}([^\'|^"|^http])/i';
		$replacement = ' url(${4}'. $cssUrl .'${5}' ;
		$cssString = preg_replace( $pattern , $replacement , $cssString );
		
		//修正 @import url() 路径;
		$pattern = '/@import(\s*)url\((\s*)(\'|"){0,1}(^http])/i';
		$replacement = '@import url(${3}'. $cssUrl .'${4}' ;
		$cssString = preg_replace( $pattern , $replacement , $cssString );
		return  $cssString ;
	}
	
	/*
	@public function getShowType() 获取文件类型，输出 header
	*/
	private function getShowType( &$files = array()){ 
		$file = isset( $files[0]) ? $files[0] : '';
		$fileTxt = strtolower( getFileExt( $file )) ;		
		switch(  $fileTxt  ){
			case 'css' : {
				header("content-type: text/css; Charset: ". $this -> charset);				 
			}
			break ;
			
			case 'js' : {
				header ("content-type:application/javascript; Charset: ". $this -> charset);
			}
			break ;		
		}
		
		header("Pragma: public");
		header("Cache-Control:max-age=". $this -> offset ." , public");
		
		$expire = "expires: " . gmdate ("D, d M Y H:i:s", time() + $this -> offset) . " GMT";
		header ($expire);
		//if(extension_loaded('zlib')){
			//switch(  $fileTxt  ){
//				case 'css' : ob_start('compressCSSFile'); 
//				break ;				
//				case 'js' : ob_start('compressJS'); 
//				break ;	
//			}			
		//}
	}
	/*
	@public function getFilesPath() //得到文件物理路径
	*/
	private function getFilesPath( &$f = '' ) {
		$root = $this -> rootPath ;		
		$files = explode( ',' , $f );
		//去除重复
		$files = array_unique($files);				
		//去除空白项
		array_remove_empty( $files );			
		// 重新分配数字索引
		$files = array_values( $files );				
		$files_len = count( $files );
		for($i = 0 ; $i <= $files_len ; $i++ ){
			//判断后缀 ，只允许 js，css
			$fileExt = strtolower( getFileExt( $files[$i] ));
			if( ! in_array( $fileExt   , array( 'css' , 'js' ) ) ){
				unset( $files[$i] );
				continue ;
			}			
			//只允许本地文件，不允许网络文件
			if(  !( strrpos( $files[$i] , ":" ) === FALSE )){
				unset( $files[$i] );
				continue ;
			}			
			$files[$i] = $root . str_replace( '/' , $this -> DS  ,  $files[$i] );
			$files[$i] = str_replace(  '\\\\' , '\\' , $files[$i] );
		}
		return $files ;
	}
	
	/*
	@private function getRootPath 得到 miniJsCss 根目录物理路径
	*/
	private function getRootPath(){
		$myPath = dirname(__FILE__) ;
		$myPath_len =  strlen( $myPath );		
		$myUrl = str_replace( '/' , $this -> DS , dirname( $_SERVER['PHP_SELF']  ) ) ; 
		$myUrl_len = strlen( $myUrl );		
		$this -> rootPath = substr( $myPath , 0 , $myPath_len - $myUrl_len ) . $this -> DS ;
		$this -> rootPathLen = strlen( $this -> rootPath ) ;
	}
	
	/*
	@private function getFileUrl css 路径
	*/	
	private function getFileUrl( &$path = '' ){		
		$cssPath = str_replace( '/' , $this -> DS , dirname( $path ) ) ; 
		$cssUrl_len = strlen( $cssPath );		
		$rootPath_len = $this -> rootPathLen ;		
		$cssUrl = substr( $cssPath , $rootPath_len - 1 ) . $this -> DS ;
		$cssUrl =  str_replace( $this -> DS , '/' ,  $cssUrl ) ; 
		return $cssUrl ;
	}
}
?>