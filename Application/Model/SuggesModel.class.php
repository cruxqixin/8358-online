<?php
namespace Model;
use Think\Model;
    class SuggesModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'SNAME',
		'SCONTACT',
		'SUGGES',
		'STATUS',
		'IP',
		
 '_pk' => 'ID'
	 );
}
