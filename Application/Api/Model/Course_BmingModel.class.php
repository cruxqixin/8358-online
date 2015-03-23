<?php
namespace Home\Model;
use Think\Model;
class Course_BmingModel extends Model{
	protected $fields=array(
		'ID',
		'ADDTIME',
		'USERID',
		'ZSNAME',
		'COMPANY',
		'EMAIL',
		'TEL',
		'PHONE',
		'STATUS',
		'COURID',
		'PK'=>'ID',
	);
}