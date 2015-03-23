<?php
namespace Admin\Model;
use Think\Model;
class Datae_CalistModel extends Model{
	protected $fields=array(
		'ID',
		'NAME',
		'PARENTID',
		'ADDTIME',
		'STATUS',
		'ARTICLE_NUMS',
		'PK'=>'ID',
	);
}