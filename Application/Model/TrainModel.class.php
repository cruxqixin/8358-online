<?php
namespace Model;
use Think\Model;
    class TrainModel extends Model
{
	
	protected  $fields = array( 
	  	'id',
		'userid',
		'addtime',
		'status',
		'is_show',
		'sort',
		'title',
		'name',
		'sex',
		'company',
		'phone',
		'department',
		'position',
		'cateids',
		'starttime',
		'endtime',
		'content',
	    'achievement',
		'readnum',
		'suggestion',
		
 		'_pk' => 'id'
	 );
}
