<?php
/**
 * Created by PhpStorm.
 * User: shaolei
 * Date: 2017/6/19
 * Time: 上午9:21
 */
include './WebTool.php';
include './db_sqlsrv.php';
include '../../inc/str.php';
// include '../../inc/str.php';
header("Access-Control-Allow-Origin: *");

date_default_timezone_set('PRC');

$conn = new Database();

$teacher_id = requestPost('teacher_id');
$plan_id = requestPost('plan_id');
$trade_no = requestPost('out_trade_no');
$customer = requestPost('customer');
$fee = requestPost('fee');
$deal = requestPost('deal');
$pay_type = requestPost('pay_type');


if( !is_numeric($teacher_id) ) {
    WebTool::respondFormattedJSON(null,-1,'teacher_id format invalid');
    return;
}

if( !is_numeric($plan_id) ) {
    WebTool::respondFormattedJSON(null,-1,'plan_id format invalid');
    return;
}

if( strlen($trade_no) != 21 ) {
    WebTool::respondFormattedJSON(null,-1,'out_trade_no format invalid');
    return;
}

if( strlen($customer) <= 0 || strlen($customer) > 50 ) {
    WebTool::respondFormattedJSON(null,-1,'customer format invalid');
    return;
}

if( !is_numeric($fee) ) {
    WebTool::respondFormattedJSON(null,-1,'fee format invalid');
    return;
}else{
    $fee = number_format(floatval($fee), 2, '.', '');

    if( floatval($fee) < 0.01){
        WebTool::respondFormattedJSON(null,-1,'fee should >= 0.01');
        return;
    }
}

if( $pay_type == 'wx' ) {
    $pay_type = 1;
}else if( $pay_type == 'alipay' ) {
    $pay_type = 2;
}else{
    WebTool::respondFormattedJSON(null,-1,'pay_type wx or alipay');
    return;
}

//CREATE TABLE live_plan_bonus
//(
//    id BIGINT PRIMARY KEY NOT NULL IDENTITY,
//    teacher_id INT NOT NULL,
//    plan_id INT NOT NULL,
//    trade_no VARCHAR(24) NOT NULL,
//    customer VARCHAR(50) NOT NULL,
//    fee FLOAT DEFAULT 0 NOT NULL,
//    deal TINYINT DEFAULT 0,
//    utime INT NOT NULL,
//    pay_type TINYINT NOT NULL
//);
//CREATE INDEX live_plan_bonus_teacher_id_index ON live_plan_bonus (teacher_id);
$create_sql = <<<SQL
INSERT INTO live_plan_bonus(teacher_id,plan_id,out_trade_no,customer,fee,deal,utime,pay_type) 
VALUES (':teacher_id',':plan_id',':out_trade_no',':customer',':fee','0', ':utime', ':pay_type');
SQL;

$trade_time = time();
$data=array(
    'teacher_id'=>$teacher_id,
    'plan_id'=>$plan_id,
    'out_trade_no'=>$trade_no,
    'customer'=>$customer,
    'fee'=>$fee,
    'utime'=>time(),
    'pay_type'=>$pay_type,
);

$res = $conn->execute($create_sql,$data);

if ($res['ecode'] == 0) {
    $result = $conn->get_lastid();
    $lastid = $result['id'];
    $vcode = md5($lastid.'dashang?htkey'.$trade_no.$trade_time);
    $vcode = substr($vcode, 3, 16);

    WebTool::respondFormattedJSON(
        array(
            'id'=>$lastid,
            'vcode'=>$vcode
        )
    );
}else{
    WebTool::respondFormattedJSON(null,-1, '添加失败');
}

