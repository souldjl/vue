<?php
/**
 * Created by PhpStorm.
 * User: shaolei
 * Date: 2017/6/21
 * Time: 上午9:41
 */
include './db_sqlsrv.php';
include './WebTool.php';
include '../../inc/str.php';
header("Access-Control-Allow-Origin: *");

date_default_timezone_set('PRC');
$conn = new Database();

$day = requestGet('day');


$dayBegin = strtotime( $day );
$dayEnd = strtotime( '+1 days -1 seconds', $dayBegin );

//echo $dayBegin, ' ', $dayEnd, date('Y-m-d H:i:s',$dayBegin), ' ', date('Y-m-d H:i:s',$dayEnd);

//获取教师数据
$get_sum = "select sum(fee) as sum_fee from live_plan_bonus where deal=1 and utime>=$dayBegin and utime <=$dayEnd";
$result = $conn->select2($get_sum,array());
$sum = $result[0]['sum_fee'];
WebTool::respondFormattedJSON( array( 'sum'=>$sum ) );


