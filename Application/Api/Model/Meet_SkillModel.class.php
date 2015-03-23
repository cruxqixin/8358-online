<?php
namespace Admin\Model;
use Think\Model;
class Meet_SkillModel extends Model{
	protected $fields=array(
		'ID',
		'USERID',
		'ADDTIME',
		'STARTTIME',
		'ENDTIME',
		'TITLE',
		'SPEAKER',
		'COMPANY',
		'WORKS',
		'PAYS',
		'PPT',
		'INFO',
		'GIFT_IMG',
		'IMG',
		'ZLMC',
		'GIFT_INFO',
		'GYZT',
		'STATUS',
		'ZDTJ',
		'CPROV',
		'BANNER',
		'PK'=>'ID'
	);
}