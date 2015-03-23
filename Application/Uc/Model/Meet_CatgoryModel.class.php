<?php
namespace Admin\Model;
use Think\Model;
    class Meet_CatgoryModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'CNAME',
		'CADDTIME',
		'STATUS',
		'PARENTID',
 		'_pk' => 'ID'
	 );
}
