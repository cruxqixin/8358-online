<?php
namespace Model;
use Think\Model;
    class UserCasteModel extends Model
{
	
	protected  $fields = array( 
	  	'USERID',
		
		'CPROV',
		'CCITY',
		'CADDRESS',
		'CONTACTS',
		'CMOBILEPHONE',
		'CPHONE',
		'CBIRTH',
		'CENDER',
		'CPOST',
		'CPOSTNO',
		'CFAX',
		'CEMAIL',
		'CDOMAIN',
		'ADDTIME',
		'CDEPARTMENT',
		'CNAME',
		'CINTRO',
'PINYIN',
'PINYINSHORT',
'LICENSE',
'AUTHORIZATION',
		'_pk' => 'USERID'
	 );
}
