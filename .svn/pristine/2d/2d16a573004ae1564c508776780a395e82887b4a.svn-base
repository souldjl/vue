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

$teacher_id = requestPost('teacher_id');
$name = trim(requestPost('name'));

if( !is_numeric($teacher_id) ) {
    WebTool::respondFormattedJSON(null,-1,'教师id不正确');
    return;
}

if( strlen($name) == 0 || strlen($name) > 16 ) {
    WebTool::respondFormattedJSON(null,-1,'教师名称格式不正确');
    return;
}


$create_sql = "INSERT INTO live_plan_teacher VALUES (':id',':name')";

$data=array(
	'id'=>$teacher_id,
	'name'=>$name,
	);

$res = $conn->execute($create_sql,$data);

if ($res['ecode'] == 0) {
    WebTool::respondFormattedJSON();
}else if( $res['ecode'] == 2627 ) {
    WebTool::respondFormattedJSON(null,-1, '直播教师ID: '.$teacher_id.' 重复，添加失败');
}else{
	WebTool::respondFormattedJSON(null,-1, '添加失败');
}
