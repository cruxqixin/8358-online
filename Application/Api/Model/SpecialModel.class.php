<?php
namespace Home\Model;
use Think\Model;
    class SpecialModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'SNAME',
		'SLOGO',
		'SEO_TITLE',
		'SEO_KEYWORDS',
		'SEO_DESC',
		'SLOGOSHOW',
		'SDESC',
		'TECHKINDS',
		'EXPERTKINDS',
		'PRODUCTKINDS',
		'SORT',
		'STATUS',
		'SADDTIME',
		'ISSHOW',
		'URL',
		'ZTURL',
		'USERID',
		'_pk' => 'ID'
	 );
}
