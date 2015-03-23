<?php
namespace Admin\Model;
use Think\Model;
    class Data_PaperModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'TITLE',
		'AUTHOR',
		'KEYWORD',
		'DIGEST',
		'ADDTIME',
		'USERID',
		'SORT',
		'STATUS',
		'PUBLICKW',
		'LUNWCOUNT',
		'BCATID',
		'METID',
		'IMG',
		'READNUM',
		'DOWNNUM',
		'WORKPLACE',
		'JOURNALS',
		'REMARK',
		'PARENTIDS',
		'TAG',
		'JIFEN',
		'PAGES',
		'IS_TJ',
		'JIFEN',
		'KINDID',
 		'_pk' => 'ID'
	 );
}
