<?php
include './db_sqlsrv.php';
include './WebTool.php';
header("Access-Control-Allow-Origin: *");

date_default_timezone_set('PRC');
$conn = new Database();
$time_old = strtotime('- 1 month',time());

$get_sql = "SELECT * FROM live_plan WHERE date > $time_old AND type = 1";
$data = $conn->select($get_sql,array());
if ($data['ecode'] == 0) {
	WebTool::respondFormattedJSON($data['data']);
}else{
	WebTool::respondFormattedJSON(null,-1,'查询失败');

}
