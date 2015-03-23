<?php
namespace Home\Model;
use Think\Model;
    class ConsultationModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'TYPEID',
		'OBJID',
		'STATUS',
		'USERID',
		'CCONTENT',
		'IP',
		'OBJNAME',
		'ADDTIME',
		'UTYPE',
		'_pk' => 'USERID'
	 );
}
