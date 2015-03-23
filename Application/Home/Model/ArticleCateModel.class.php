<?php
namespace Home\Model;
use Think\Model;
class ArticleCateModel extends Model{
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
'_pk' => 'ID', '_autoinc' => true  
			); 
} 
 