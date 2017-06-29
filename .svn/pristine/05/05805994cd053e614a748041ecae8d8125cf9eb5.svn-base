<?php
include './db_sqlsrv.php';
include './WebTool.php';
header("Access-Control-Allow-Origin: *");

date_default_timezone_set('PRC');
$conn = new Database();
$time_old = strtotime('- 1 month',time());

$get_sql = "SELECT * FROM live_plan_teacher";
$rows = $conn->select2($get_sql,array());

if ( $rows ) {
    foreach( $rows as &$row ) {
        $row['name'] = iconv("GB2312//IGNORE","UTF-8", $row['name'] );
    }
    WebTool::respondFormattedJSON($rows);
}else{
	WebTool::respondFormattedJSON(null,-1,'查询失败');
}
