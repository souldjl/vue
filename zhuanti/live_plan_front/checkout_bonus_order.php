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

$id = requestPost('id');
$vcode = requestPost('vcode');

$third_trade_no = requestPost('third_trade_no');
$buyer_contact = requestPost('buyer_contact');

if( !is_numeric($id) ) {
    WebTool::respondFormattedJSON(null,-1,'id format invalid');
    return;
}

if( strlen($vcode) != 16 ) {
    WebTool::respondFormattedJSON(null,-1,'vcode invalid');
    return;
}

if( strlen($third_trade_no) > 64 ) {
    WebTool::respondFormattedJSON(null,-1,'third_trade_no format invalid');
    return;
}

if( strlen($buyer_contact) > 50 ) {
    $buyer_contact = substr($buyer_contact, 0, 50);
}

$get_sql = "SELECT out_trade_no, utime FROM live_plan_bonus WHERE id = ':id' AND deal = 0";
$conn = new Database();
$data = $conn->select($get_sql, array(
    'id'=>$id
));

if ($data['ecode'] == 0) {
    if( empty( $data['data'] ) ) {
        WebTool::respondFormattedJSON(null,-1,'提交失败');
        return;
    }

    $row = $data['data'][0];
    $verify = md5($id.'dashang?htkey'.$row['out_trade_no'].$row['utime']);
    $verify = substr($verify, 3, 16);
    //验证vcode
    if( $vcode !== $verify ){
        WebTool::respondFormattedJSON(null,-1,'vcode invalid');
        return;
    }else{
        ;//good
    }
}else{
    WebTool::respondFormattedJSON(null,-1,'提交失败');
    return;
}

//修改订单状态=》支付成功






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

$update_sql = <<<SQL
UPDATE live_plan_bonus SET deal = 1, third_trade_no = ':third_trade_no', buyer_contact = ':buyer_contact' WHERE id=':id'
SQL;
$data=array(
    'id'=>$id,
    'third_trade_no'=>$third_trade_no,
    'buyer_contact'=>$buyer_contact,
);

$res = $conn->execute($update_sql,$data);

if ($res['ecode'] == 0) {
    WebTool::respondFormattedJSON();
}else{
    WebTool::respondFormattedJSON(null,-1, '支付失败');
}

