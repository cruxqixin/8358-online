<?php
namespace Home\Model;
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
		'_pk' => 'ID'
	 );
}
