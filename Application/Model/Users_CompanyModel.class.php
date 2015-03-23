<?php
namespace Model;
use Think\Model;
    class Users_CompanyModel extends Model{
	
	protected  $fields = array( 
	  	'USERID',
'CNAME',
'CPROV',
'CCITY',
'COUNTY',
'CADDRESS',
'CNATUREID',
'CNATURE',
'CINDUSTRYID',
'CINDUSTRY',
'CTHEMAIN',
'CFIELD',
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
'COMBIRTH',
'CTURNOVER',
'CGENUS',
'ADDTIME',
'PINYIN',
'PINYINSHORT',
'HITS',
'COUNTRY',
'LICENSE',
'AUTHORIZATION',
 '_pk' => 'USERID'
	 );
}
