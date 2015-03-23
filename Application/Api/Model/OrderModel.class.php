<?php
namespace Admin\Model;
use Think\Model;
class OrderModel extends Model{
	protected $fields=array(
		'ID',
		'GOODID',
		'NUM',
		'USERID',
		'MONEY',
		'STATE',
		'DANHAO',
		
		
		'XIAOJI',
		'PK'=>'ID',
	);
}