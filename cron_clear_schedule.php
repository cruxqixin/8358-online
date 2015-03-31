<?php
$start_time = microtime ( true );
/**
 * DB
 */

$online_db = new PDO ( "mysql:dbname=online;host=127.0.0.1", 'root', '' );

$now = time();
$sql = 'select count(*) as num from online_schedule where add_time <=';
$sql .= $now + 86400*2;
$sql .= ' and status =1' ;

$sth = $online_db->prepare ( $sql );
$sth->execute ();
$result_count= $sth->fetch ( PDO::FETCH_ASSOC );
echo '共有'.$result_count['num'].'个过期的待处理预约'."\n";
$sql = 'update online_schedule set status = 0 where add_time <=';
$sql .= $now + 86400*2;
$sql .= ' and status=1' ;
$sth = $online_db->prepare ( $sql );

$result_update= $sth->execute ();


$end_time = microtime(true);
echo ($end_time-$start_time) . "\n" ;exit;
