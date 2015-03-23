<?php
namespace Admin\Model;
use Think\Model;
    class UsersExpertsModel extends Model
{
	
	protected  $fields = array( 
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
		'_pk' => 'USERID'
	 );
}
