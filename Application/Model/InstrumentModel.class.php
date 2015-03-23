<?php
namespace Model;
use Think\Model;
    class InstrumentModel extends Model
{
	
	protected  $fields = array( 
	  	'id',
		'userid',
		'addtime',
		'status',
		'is_show',
		'sort',
		'img',
		'original',
		'paramenter',
		'cate_id',
		'industry_id',
		'lxr',
		'lxrphone',
		'email',
		'title',
		'csxh',
		'suggestion',
		'is_chxin',
		'is_chxin',
 		'_pk' => 'id'
	 );
}
