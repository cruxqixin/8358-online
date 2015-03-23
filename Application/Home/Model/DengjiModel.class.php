<?php
namespace Admin\Model;
use Think\Model;
class DengjiModel extends Model{
	protected $fields=array(
		'ID',
		'USERID',
		'SKILLID',
		'STATUS',
		'ADDTIME',
		'PK'=>'ID',
	);
}