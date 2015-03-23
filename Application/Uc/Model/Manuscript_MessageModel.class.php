<?php
namespace Admin\Model;
use Think\Model;
class Manuscript_MessageModel extends Model
{
	
	protected  $fields = array( 
	  	'USERID',
		'MID',
		'ADDTIME',
		'MESSAGE',
		'ISREAD',
		'READTIME',
		'LTIME',
		'REVIEW',
		'_pk' => 'USERID'
	 );


}
