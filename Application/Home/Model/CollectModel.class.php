<?php
namespace Home\Model;
use Think\Model;
    class CollectModel extends Model
{
	protected  $fields = array( 
	  	'USERID',
		'TYPEID',
		'OBJID',
		'ADDTIME',
		'_pk' => 'USERID'
	 );
}
