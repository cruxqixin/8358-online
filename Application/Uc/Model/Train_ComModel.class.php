<?php
namespace Admin\Model;
use Think\Model;
class Train_ComModel extends Model{
	protected $fields=array(
		'ID',
		'ADDTIME',
		'USERID',
		'COM1',
		'COM2',
		'COM3',
		'COMMENTS',
		'COURID',
		'STATUS',
		
		'PK'=>'ID',
	);
}