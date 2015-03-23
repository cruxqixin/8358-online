<?php
namespace Model;
use Think\Model;
    class Company_GoodsModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'USERID',
		'GNAME',
		'GDESC',
		'GUSER',
		'GPHONE',
		'STATUS',
		'HITS',
		'GPIC',
		'GADDTIME',
		'GCOMNAME',
		'GCODE',
		'TYPE',
		'QYNAME',
		'READNUM',
		'IS_SHOW',
		'SUGGESTION',
		'ORD',
		'POSITION',
		'IS_CHXIN',
		'CHXINID',
		'_pk' => 'ID'
	 );
}
