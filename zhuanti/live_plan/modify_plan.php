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
$id = requestPost('id');
$date = requestPost('date');
$end_time = requestPost('end_time');
$room_id = requestPost('room_id');
$secret = requestPost('secret');
$start_time = requestPost('start_time');
$title = requestPost('title');
$type = 1;
$replay_id = requestPost('replay_id');
$teacher_id = requestPost('teacher_id');

$update_sql = "UPDATE live_plan SET title=':title',date=':date',start_time=':start_time',end_time=':end_time',room_id=':room_id',secret=':secret',addtime=':addtime',type=':type',replay_id=':replay_id',teacher_id=':teacher_id' where id = $id";

$data=array(
	'title'=>$title,
	'date'=>strtotime($date),
	'start_time'=>$start_time,
	'end_time'=>$end_time,
	'room_id'=>$room_id,
	'secret'=>$secret,
	'addtime'=>time(),
	'type'=>$type,
	'replay_id'=>$replay_id,
    'teacher_id'=>$teacher_id,
	);
$res = $conn->execute($update_sql,$data);
// var_dump($data);die;
if ($res['ecode'] == 0) {
	WebTool::respondFormattedJSON();
}else{
	WebTool::respondFormattedJSON(null,-1,'修改失败');

}



