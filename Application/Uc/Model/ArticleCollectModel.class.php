<?php 
namespace Home\Model;
use Think\Model;
class ArticleCollectModel extends Model{  
			 protected  $fields = array(  
      'ID',
'CATE_ID',
'NAME',
'ADD_TIME',
'LAST_TIME',
'CHAR_CODE',
'S_URL',
'ORD',
'IS_DEL',
'MATCH_URLS',
'START_MATCH_NUMS',
'END_MATCH_NUMS',
'INC_NUMS',
'URLS',
'START_HTML',
'END_HTML',
'INCLUDE',
'NO_INCLUDE',
'PAGE_RULE',
'S_PAGE',
'TITLE_RULE',
'TITLE_FILTER',
'CONTENT_RULE',
'CONTENT_FILTER',
		 '_pk' => 'ID', '_autoinc' => true  
			 ); 
  		 }  