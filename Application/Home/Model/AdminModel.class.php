<?php
namespace Admin\Model;
use Think\Model;
    class AdminModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'USER_NAME',
		'PASSWORD',
		'ADD_TIME',
		'LAST_TIME',
		'IS_DEL',
		'REMARK1',
		'REMARK2',
 		'_pk' => 'ID'
	 );
}
