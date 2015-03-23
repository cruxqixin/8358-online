<?php
namespace Model;
use Think\Model;

 class ZhkindModel extends Model
{
	
	protected  $fields = array( 
	  	'id',
		'name',
		'parentid',		
		'_pk' => 'id'
	 );
}


