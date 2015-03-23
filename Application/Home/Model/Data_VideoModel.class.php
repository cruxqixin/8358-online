<?php
namespace Admin\Model;
use Think\Model;
    class Data_VideoModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'VIDEO',
		'USERID',
		'VADDTIME',
		'STATUS',
		'SORT',
		'TITLE',
		'BCATID',
		'DIGEST',
		'TECH',
		'FIRMS',
		'KIND',
		'IMG',
		'READNUM',
		'KEYWORD',
		'TIME',
		'SOURCE',
		'JIFEN',
		'KINDID',
 		'_pk' => 'ID'
	 );
}
