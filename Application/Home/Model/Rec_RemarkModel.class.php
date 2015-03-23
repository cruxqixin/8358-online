<?php
namespace Admin\Model;
use Think\Model;
class Rec_RemarkModel extends Model{
	protected $fields=array(
		'ID',
		'DANHAO',
		'USERID',
		'STATUS',
		'ADDTIME',
		'REMARK',
		'PK'=>'ID',
	);
}