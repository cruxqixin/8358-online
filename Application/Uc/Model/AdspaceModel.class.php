<?php
namespace Admin\Model;
use Think\Model;
    class AdspaceModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'TNAME',
		'TSORT',
		'TADDTIME',
 		'_pk' => 'ID'
	 );
}
