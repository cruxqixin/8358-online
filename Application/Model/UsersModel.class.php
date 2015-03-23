<?php
namespace Model;
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
		'COMPANYNAME',
		'CERTIFICATECODE',
		'UNITNATURE',
		'UCOUNTRY','GN_PROV','GN_CITY','GN_COUNTRY','GW_PROV','GW_CITY','GW_COUNTRY',
		'ADDRESS','CODE','GN_CITY','INDUSTRY','LXRNAME','DEPARTMENT','TELPHONE',
		'POSITION','CODE','SEX','LXRTELPHONE',
 		'_pk' => 'ID'
	 );
}
