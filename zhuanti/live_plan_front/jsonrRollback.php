<?php
include "./WebTool.php";
include './db_sqlsrv.php';

//WebTool::respondJSON( array('name'=>'sl') );
date_default_timezone_set('PRC');

function getAll(){

	$conn = new Database();
	$time = strtotime(date('Y-m-d',time()));

//var_dump ( $time );
	$get_sql = "SELECT * FROM live_plan WHERE date = $time AND type = 1 order by start_time";
	$data = $conn->select($get_sql,array());
//var_dump( $data );
	$arr = array();
	$time_now = time();
	if ($data['ecode'] == 0) {
		foreach ($data['data'] as $key => $value) {
			unset($value['date'],$value['addtime']);
			$arr[$key] = $value;
			$replay_id = $value['replay_id'];
			if($replay_id){
				$arr[$key]['type'] = 'vod';
			}else{
				$arr[$key]['type'] = 'live';
			}
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
