<?php


include './db_sqlsrv.php';
include '../../inc/str.php';
include './WebTool.php';
header("Access-Control-Allow-Origin: *");

$conn = new Database();
$teacher_id = requestPost('teacher_id');

if( !is_numeric($teacher_id) ) {
    WebTool::respondFormattedJSON(null,-1,'教师id不正确');
    return;
}

$del_sql = "DELETE live_plan_teacher WHERE id = ':id'";
$data=array(
	'id'=>$teacher_id,
	);

$res = $conn->execute($del_sql,$data);

if ($res['ecode'] == 0) {
	WebTool::respondFormattedJSON();
}else{
    var_dump($res['emsg']);
	WebTool::respondFormattedJSON(null,-1,'删除失败');
}
