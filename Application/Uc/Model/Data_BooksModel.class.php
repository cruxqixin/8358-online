<?php
namespace Admin\Model;
use Think\Model;
    class Data_BooksModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'BOOKS',
		'USERID',
		'TAG',
		'EVALUATION',
		'BADDTIME',
		'BCATID',
		'STATUS',
		'SORT',
		'TITLE',
		'HITS',
		'DDESC',
		'IMG',
		'AUTHOR',
		'DIGEST',
		'PRICE',
		'LXR',
		'EMAIL',
		'PHONE',
		'KEYWORD',
		'JIFEN',
		'KINDID',
 		'_pk' => 'ID'
	 );
}
