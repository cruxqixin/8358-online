<?php
namespace Admin\Model;
use Think\Model;
class Train_CourseModel extends Model{
	protected $fields=array(
		'ID',
		'ADDTIME',
		'USERID',
		'STARTTIME',
		'ENDTIME',
		'COURTIME',
		'ADDRESS',
		'TEACHER',
		'CURSKIND',
		'PERSON',
		'PROFIT',
		'CERTIFICATE',
		'INFO',
		'TEAINFO',
		'TITLE',
		'STATUS',
		'KEYWORD',
		'CPROV',
		'CCITY',
		'NUM',
		'IMG',
		'PK'=>'ID',
	);
}