<?php
namespace Admin\Model;
use Think\Model;
    class MeetingModel extends Model
{
	
	protected  $fields = array( 
	  	'ID',
		'CPROV',
		'MEETTITLE',
		'MEETCATGORY',
		'JOURNALS',
		'AGENDA',
		'STATUS',
		'ADDTIME',
		'PROMOTER',
		'EXPERTSIN',
		'COMPANYIN',
		'ACRONYM',
		'ISENG',
		'ISVALID',
		'MANUSCRIPTHEAD',
		'ISVENUE',
		'PAYMENT',
		'CONFERENCEFEE',
		'HYJC',
		'HYADDRESS',
		'HYHOST',
		'HYUNITS',
		'HYSUPPORT',
		'HYZHW',
		'HYREPORT',
		'HYDATA',
		'LIVE',
		'HYZHJG',
		'HYTGZN',
		'HYRCH',
		
		'MEETTITLEENG',
		'HYJCENG',
		'HYADDRESSENG',
		'HYHOSTENG',
		'HYUNITSENG',
		'HYSUPPORTENG',
		'HYZHWENG',
		'HYREPORTENG',
		'HYDATAENG',
		'HYCONTACT',
		
		'LIVEENG',
		'HYZHJGENG',
		'HYTGZNENG',
		'HYRCHENG',
		'HYBANNERENG',
		'HYCONTACTENG',
		
		'HYIMG',
		'HYZL',
		'HYBANNER',
		'HYBQT',
		'STARTTIME',
		'ENDTIME',
		
		
		'USERID',
		'IS_TJ',
		
		'HYWXQ',
		'_pk' => 'ID'
	 );
}
