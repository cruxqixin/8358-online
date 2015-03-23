<?php
namespace Home\Model;
use Think\Model;
 
    class Project_ChoseModel extends Model{
 
	protected  $fields = array( 
            'ID','TITLE_CN','TITLE_EN','TYPEID','SORT','STATUS',
			 '_pk' => 'ID', '_autoinc' => true   
        ); 
}
	 