<?php
namespace Model;
use Think\Model;
    class ExpertsModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'ENAME',
		'EGENDER',
		'EBIRTH',
		'EKINDS',
		'EKINDMARK',
		'ETAKEOFFICE',
		'EWINNING',
		'ESCIENTIFIC',
		'EBOOKS',
		'EPOST',
		'EPOSTTITLE',
		'ENITNAME',
		'EDEPARTMENT',
		'EADDRESS',
		'EPOSTNO',
		'EMOBIPHONE',
		'EPHONE',
		'EFAX',
		'EEMAIL',
		'SORT',
		'CPROV',
		'CCITY',
		'COUNTY',
		'STATUS',
		'EINTRO',
		'USERID',
		'ADMINID',
		'STIME',
		'ECODE',
		'EFACE',
		'HITS',
		'EADDTIME',
		'EGDATE',
		'ECATS_OTHER',
		'ECOUNTRY',
		'ISPERSONAL',
		'ISLAB','LABNAME','ISPROJECT','PROJECTNAME','ISJOURNAL','JOURNAL','ZYYJ','PARTIES',
		'TIZW','DWYJ','SUGGESTION','IS_CHXIN','CHXINID',
		'_pk' => 'ID'
	 );
}
