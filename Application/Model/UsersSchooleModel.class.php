<?php
namespace Model;
use Think\Model;
    class UsersSchooleModel extends Model
{
	
	protected  $fields = array( 
	  	'USERID',
		'CNAME',
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
		'CLABORATORY',
		'PINYIN',
		'PINYINSHORT',
		'LICENSE',
		'AUTHORIZATION',
		'_pk' => 'USERID'
	 );
}
