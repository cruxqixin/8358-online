<?php
namespace Model;
use Think\Model;
    class KjuserModel extends Model
{
	
	protected  $fields = array( 
	  	'id',
		'name',
		'password',
		'pwdming',
		'email',
		'position',
		'department',
		'telphone',
		'phone',
		'sex',
		'lxrname',
		'industry',
		'code',
		'address',
		'gw_country',
		'gw_city',
		'gw_prov',
	    'gn_city',
		'gn_prov',
		'ucountry','unitnature','companyname','type','name','addtime',
 		'_pk' => 'ID'
	 );
}
