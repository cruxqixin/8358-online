<?php
namespace Model;
use Think\Model;
    class FinancingModel extends Model
{
	protected  $fields = array( 
	  	'id',
		'email',
		'tbname',
		'tbzw',
		'tbphone',
		'tbchzh',
		'tbtelphone',
		'tbemail',
		'frname',
		'frzw',
		'frchzh',
		'frphone',
		'frtelphone',
		'fremail',
		
		'qyname',
		'qywz',
		'address',
		'code',
		'regaddress','funds','regtime','qyproperty','stage','industry','financinged','rzchannel','channelsm','xminfo',
		'mksituation','group','right','profit','ispatent','technique','stateplan','fundxm','fundschannel',
		'fullyfund','financing','otherdemand','status','addtime','yrongzi','zjdwsj',
		'year1','zzc1','xssr1','jlr1','jyxljl1','xjll1','sdbl1',
		'year2','zzc2','xssr2','jlr2','jyxljl2','xjll2','sdbl2',
		'year3','zzc3','xssr3','jlr3','jyxljl3','xjll3','sdbl3',
		'zjytqt','yrzqdqt','iszlqt','gjjhqt','zzxmqt','readnum',
		'_pk' => 'id'
	 );
}
