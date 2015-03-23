<?php
namespace Home\Model;
use Think\Model;
class Course_KindModel extends Model{
	protected $fields=array(
		'ID',
		'ADDTIME',
		'PARENTID',
		'TITLE',
		'STATE',
		'PK'=>'ID',
	);
}