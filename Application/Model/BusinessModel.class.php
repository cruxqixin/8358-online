<?php
namespace Model;
use Think\Model;
    class BusinessModel extends Model
{
	
	protected  $fields = array( 
	  	'id',
		'userid',
		'status',
		'start_time',
		'end_time',
		'companyname',
		'content',
		'addtime',
		'ord',
		'suggestion',
		'_pk' => 'id'
	 );
}
