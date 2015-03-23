<?php
namespace Uc\Model;
use Think\Model;
    class UsersModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'NICKNAME',
		'PASSWORD',
		'PWDMING',
		'EMAIL',
		'PHONE',
		'STATUS',
		'UTYPE',
		'REVIEW',
		'UTYPESENIOR',
		'ANNEX',
		'ENINFO',
		'CNINFO',
		'FACE',
		'UTYPEREVIEW',
		'ISHAVE',
		'ISEMAILVAL',
	    'ISPHONEVAL',
		'UADDTIME',
 		'_pk' => 'ID'
	 );
}
