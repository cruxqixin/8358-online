<?php
namespace Home\Model;
use Think\Model;
    class AdModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'ADNAME',
		'ORD',
		'IS_DEL',
		'CODE',
		'ADTYPE',
		'ADURL',
		'ADIMG',
		'ADDTIME',
 		'_pk' => 'ID'
	 );
}
