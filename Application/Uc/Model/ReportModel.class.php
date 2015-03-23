<?php
namespace Admin\Model;
use Think\Model;
    class ReportModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'LINK',
		'JBYY',
		'PROOREXPER',
		'JBZL',
		'USERID',
		'PROOREXPERID',
		'STATUS',
		'SCONENT',
		'CATEGORY',
		'ADDTIME',
		'UTYPE',
 '_pk' => 'ID'
	 );
}
