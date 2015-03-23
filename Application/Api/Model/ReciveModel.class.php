<?php
namespace Admin\Model;
use Think\Model;
class ReciveModel extends Model{
	protected $fields=array(
		'ID',
		'DANHAO',
		'SHFS',
		'MONEY',
		'ZFFS',
		'STATUS',
		'DANHAO',
		'USERID',
		'ADDRESS',
		'PAY',
		'TOTAL',
		'COFIRSTATE',
		'RECSTATE',
		'CONFIRM',
		'DELIVERY',
		'DISTRIBUTE',
		'SEND',
		'_pk' => 'ID'
	);
}