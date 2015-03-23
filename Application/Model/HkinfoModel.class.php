<?php
namespace Model;
use Think\Model;
    class HkinfoModel extends Model
{
	protected  $fields = array( 
	  	'id',
		'userid',
		'name',
		'status',
		'hktime',
		'money',
		'hkzh',
		'title',
		'xmid',
		'recipients',
		'phone',
		'frphone',
		'address',
		'addtime',
		'iskfp',
		'files',
		'_pk' => 'id'
	 );
}
