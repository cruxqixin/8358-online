<?php
namespace Admin\Model;
use Think\Model;
    class SuggestionsModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'USERID',
		'STITLE',
		'SCONTENT',
		'IP',
		'STATUS',
		
		'_pk' => 'ID'
	 );
}
