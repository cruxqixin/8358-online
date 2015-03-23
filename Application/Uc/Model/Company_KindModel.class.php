<?php
namespace Home\Model;
use Think\Model;
 class Company_KindModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'TYPE',
		'TNAME',
		'TSORT',
		'TSEO_KEYWORD',
		'TSEO_DESC',
		
		'_pk' => 'ID'
	 );
}


