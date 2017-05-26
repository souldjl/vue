<?php
include "./WebTool.php";
include './db_sqlsrv.php';

//WebTool::respondJSON( array('name'=>'sl') );
date_default_timezone_set('PRC');

function getAll(){
	$conn = new Database();
	$time = strtotime(date('Y-m-d',time()))+86400;

	$get_sql = "SELECT * FROM live_plan WHERE date = $time AND type = 1 order by start_time";
	$data = $conn->select($get_sql,array());
	$arr = array();
	$time_now = time();
	if ($data['ecode'] == 0) {
		foreach ($data['data'] as $key => $value) {
			$arr[$key] = $value;
		}
		WebTool::respondJSON($arr);
	}else{
		WebTool::respondJSON($data['emsg']);

	}

}

$action = isset($_GET['action'])?$_GET['action']:'';
if ($action == 'getAll') {
	getAll();
}
