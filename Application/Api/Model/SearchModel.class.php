<?php
namespace Home\Model;
use Think\Model;
    class SearchModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'SEARCHCONTENT',
		'SEARCHDESP',
		'TYPEID',
		'ITEMID',
		'STITLE',
		'_pk' => 'ID'
	 );
}
