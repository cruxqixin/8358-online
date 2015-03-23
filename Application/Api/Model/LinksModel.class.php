<?php
namespace Home\Model;
use Think\Model;
    class LinksModel extends Model
{
	
	protected  $fields = array( 
	  	'LINK_ID',
		'LINK_SORT',
		'LINK_URL',
		'LINK_NAME',
		'LINK_TAG',
		'LINK_DESCRIPTION',
		'LINK_VISIBLE',
		'STATUS',
		'ADDTIME',
		
		'_pk' => 'LINK_ID'
	 );
}
