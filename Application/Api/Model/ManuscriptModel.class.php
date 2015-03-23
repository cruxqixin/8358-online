<?php
namespace Admin\Model;
use Think\Model;
    class ManuscriptModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'MCODE',
		'MTITLE',
		'MTITLE_EN',
		'MSUBDATE',
		'MCHOSETYPE',
		'MCOLLDATE',
		'MWORDS',
		'STATUS',
		'MADDTIME',
		'USERID',
		'KEYWORD',
		'MEETID',
		'JOURNAL',
		'MISSUE',
		'MDIRECTION',
		'MFUND',
		'CLCNUMBER',
		'MARTNAME',
		'MALLNAME',
		'MARTINTRODUCE',
		'MTEAINTRODUCES',
		'ADJUNCT',
		'MONEYSTATUS ',
		'EXTERNALID',
		'ISYJ',
		'JOURNAL2',
		'MEAIL',
		'BH',
		'GF',
 		'_pk' => 'ID'
	 );
}
