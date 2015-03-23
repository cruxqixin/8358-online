<?php
namespace Model;
use Think\Model;
    class Company_GoodsKindsModel extends Model
{
	
	protected  $fields = array( 
	  	'GOODID',
		'KINDID',
		'TYPEID',
		
		'_pk' => 'GOODID'
	 );
}
