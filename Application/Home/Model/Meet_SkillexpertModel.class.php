<?php
namespace Admin\Model;
use Think\Model;
class Meet_SkillexpertModel extends Model{
	protected $fields=array(
		'ID',
		'ADDTIME',
		'SKILLID',
		'NAME',
		'IMG',
		'ZJZW',
		'JYBJ',
		'INFO',
		'KIND',
		'STATUS',
		'PK'=>'ID',
	);
}