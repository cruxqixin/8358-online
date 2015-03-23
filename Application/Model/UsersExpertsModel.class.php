<?php
namespace Model;
use Think\Model;
    class UsersExpertsModel extends Model
{
	
	protected  $fields = array( 
		'ID',
	  	'USERID',
		'ENAME',
		'EGENDER',
		'EBIRTH',
		'EKINDS',
		'EKINDMARK',
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
		'ADMINID',
		'STIME',
		'ECODE',
		'ETAKEOFFICE',
		'EWINNING',
		'ESCIENTIFIC',
		'EBOOKS',
		'EINTRO',
		'EADDTIME',
		'ECATS_OTHER',
		'ECOUNTRY',
		'ISLAB','LABNAME','ISPROJECT','PROJECTNAME','ISJOURNAL','JOURNAL','ZYYJ','PARTIES',
		'_pk' => 'ID'
	 );
}
