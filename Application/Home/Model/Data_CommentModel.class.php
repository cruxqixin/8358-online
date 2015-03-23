<?php
namespace Admin\Model;
use Think\Model;
    class Data_CommentModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'USERID',
		'COM1',
		'COM2',
		'COM3',
		'COM4',
		'COM5',
		'COMMENTS',
		'STATUS',
		'ARTID',
		'COUNT',
		'COMMNET',
		'IS_COM',
		'PARENTID',
 		'_pk' => 'ID'
	 );
}
