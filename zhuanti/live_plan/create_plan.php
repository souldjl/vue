<?php
/**
 * Created by PhpStorm.
 * User: shaolei
 * Date: 2017/4/21
 * Time: 下午5:42
 */
include './WebTool.php';
include './db_sqlsrv.php';
include '../../inc/str.php';
// include '../../inc/str.php';
header("Access-Control-Allow-Origin: *");

date_default_timezone_set('PRC');

$conn = new Database();

$date = requestPost('date');
$end_time = requestPost('end_time');
$room_id = requestPost('room_id');
$secret = requestPost('secret');
$start_time = requestPost('start_time');
$title = requestPost('title');
$type = 1;
$replay_id = requestPost('replay_id');
$teacher_id = requestPost('teacher_id');


$create_sql = "INSERT INTO live_plan VALUES (':title',':date',':start_time',':end_time',':room_id',':secret',':addtime',':type',':replay_id',':teacher_id')";

$data=array(
	'title'=>$title,
	'date'=>strtotime($date),
	'start_time'=>$start_time,
	'end_time'=>$end_time,
	'room_id'=>$room_id,
	'teacher_id'=>$teacher_id,
	'secret'=>$secret,
	'addtime'=>time(),
	'type'=>$type,
	'replay_id'=>$replay_id,
	'teacher_id'=>$teacher_id,
	);

$res = $conn->execute($create_sql,$data);

if ($res['ecode'] == 0) {
	$lastid = $conn->get_lastid();
	$res['data']['id'] = $lastid['id'];
	WebTool::respondFormattedJSON($res['data']);
}else{
	WebTool::respondFormattedJSON(null,-1,'修改失败');

}
