<?php
namespace Model;
use Think\Model;
    class ValidateModel extends Model
{
	protected  $fields = array( 
	  	'id',
		'userid',
		'password',
		'key',
		'_pk' => 'id'
	 );
}
