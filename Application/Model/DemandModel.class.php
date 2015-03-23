<?php
namespace Model;
use Think\Model;
    class DemandModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'DNAME',
		'DCOMPANY',
		'DPHONE',
		'DEMAIL',
		'DUSERID',
		'DTITLE',
		'DESCRIBE',
		'DBUDGET',
		'DKEYWORD',
		'DHYCATEGORY',
		'DEADLINE',
		'DSTATUS',
		'DADDTIME',
		'DESCRIBEA',
		'DESCRIBEB',
		'DESCRIBEC',
		'DHYCATEGORYID',
		'READNUM',
		'DTYPE',
		'DCHULI',
		'DSUGGESTION',
		
		'_pk' => 'ID'
	 );
}
