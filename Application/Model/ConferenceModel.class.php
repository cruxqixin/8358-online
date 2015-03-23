<?php
namespace Model;
use Think\Model;
    class ConferenceModel extends Model{
 
	protected  $fields = array( 
             
        'id',
		'title',
		'theme',
		'starttime',
		'endtime',
		'country',
		'gn_prov',
		'gn_city',
		'gn_country',
		'gw_prov',
		'gw_city',
		'gw_country',
		'unit',
		'lxr',
		'lxrphone',
		'status',
		'addtime',
		'userid',
		'suggestion',
		'isshow',
		'readnum',
'_pk' => 'id', 
        ); 
}
	 