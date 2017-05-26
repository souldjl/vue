<?php


include './db_sqlsrv.php';
include '../../inc/str.php';
include './WebTool.php';
header("Access-Control-Allow-Origin: *");

$conn = new Database();
$id = requestPost('id');

$del_sql = "UPDATE live_plan SET type = 2 WHERE id = $id";
$data = $conn->execute($del_sql);

if ($data['ecode'] == 0) {
	WebTool::respondFormattedJSON();
}else{
	WebTool::respondFormattedJSON(null,-1,'删除失败');	
}
