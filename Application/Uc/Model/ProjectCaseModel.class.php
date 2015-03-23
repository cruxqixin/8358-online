<?php
namespace Admin\Model;
use Think\Model;
    class ProjectCaseModel extends Model{
 
	protected  $fields = array( 
             'PROID','CNAME','ADDTIME','CSORT','CCONTENT',
			 '_pk' => 'ADDTIME'
			 
		);
}
	 
