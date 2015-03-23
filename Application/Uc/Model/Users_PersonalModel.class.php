<?php
namespace Uc\Model;
use Think\Model;
    class Users_PersonalModel extends Model
{
	
	protected  $fields = array( 
	  	'USERID',
		'UNAME',
		'UGENDER',
		'UBIRTH',
		'UPOST',
		'UPOSTTITLE',
		'UNITNAME',
		'UDEPARTMENT',
		'UADDRESS',
		'UPOSTNO',
		'UMOBIPHONE',
		'UPHONE',
		'UFAX',
		'UEMAIL',
		'CERTIFICATE',
 		'_pk' => 'USERID'
	 );
}
