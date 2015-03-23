<?php
namespace Model;
use Think\Model;
    class Company_Goods_kindModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'KNAME',
		'KSORT',
		'KSEO_KEYWORD',
		'KSEO_DESC',
		'PARENTID',
		'KTYPE',
		'CNNEXTCOUNT',
		'_pk' => 'ID'
	 );
}
