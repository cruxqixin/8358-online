<?php
namespace Model;
use Think\Model;
    class Project_kindModel extends Model{
 
	protected  $fields = array( 
             'ID','CNNAME','ENNAME','CNPROFILE','ENPROFILE','PARENTID','SORT','STATE','ADDTIME','SEO_TITLE_CN','SEO_TITLE_EN','SEO_KEYWORD_CN','SEO_KEYWORD_EN','SEO_DESC_CN','SEO_DESC_EN',
			 'CNNEXTCOUNT',
			 'ENNEXTCOUNT',
			 '_pk' => 'ID', '_autoinc' => true   
		);
}
	 