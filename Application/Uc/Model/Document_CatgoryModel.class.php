<?php
namespace Admin\Model;
use Think\Model;
class Document_CatgoryModel extends Model{
protected  $fields = array( 
      'ID',
'NAME',
'STATUS',
'ARTICLE_NUMS',
'ORD',
'SEO_TITLE',
'SEO_KEYS',
'SEO_DESC',
'IS_DEL',
'REMARK1',
'REMARK2',
'PARENTID',
'ADDTIME',
'_pk' => 'ID', '_autoinc' => true  
			); 
} 
 