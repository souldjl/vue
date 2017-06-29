<?php
/**
 * Created by PhpStorm.
 * User: shaolei
 * Date: 2017/6/21
 * Time: 上午9:41
 */

include './db_sqlsrv.php';
include './WebTool.php';
header("Access-Control-Allow-Origin: *");

date_default_timezone_set('PRC');
$conn = new Database();

/*
CREATE TABLE live_plan_bonus
(
    id BIGINT PRIMARY KEY NOT NULL IDENTITY,
    teacher_id INT NOT NULL,
    plan_id INT NOT NULL,
    customer VARCHAR(50) NOT NULL,
    fee FLOAT DEFAULT 0 NOT NULL,
    deal TINYINT DEFAULT 0,
    utime INT NOT NULL,
    pay_type TINYINT NOT NULL,
    buyer_contact VARCHAR(50),
    third_trade_no VARCHAR(64),
    out_trade_no VARCHAR(24) NOT NULL
);
CREATE INDEX live_plan_bonus_teacher_id_index ON live_plan_bonus (teacher_id);
*/

/**
 * 参数列表
 * teacher_id
 * plan_id
 * time_begin
 * time_end
 * customer
 * out_trade_no
 * third_trade_no
 * page 指定第几页, 从1计数，page>0时，offset无效
 * offset 指定偏移行号，从0计数
 * limit 指定每页多少行数据
 */
$allParamList = array(
    'deal', 'fee', 'teacher_id', 'plan_id', 'time_begin', 'time_end', 'customer', 'out_trade_no', 'third_trade_no', 'offset', 'limit', 'page', 'order'
);

$conds = array();
$page = 0;
$offset = 0;
$limit = 50;
$order = array();
$anti_order = array();
$intermediaKeys = array('id');

if ( !empty($_GET) ) foreach( $_GET as $key => $value ) {
    if( !in_array($key, $allParamList) ) {
        continue;
    }

    switch( $key ) {
        case 'deal':
            if( $value == 0 ) {
                $conds[] = "deal = 0";
            }else if( $value == 1 ) {
                $conds[] = "deal = 1";
            }
            break;
        case 'teacher_id':
        case 'plan_id':
            if( is_numeric($value) ) {
                $conds[] = "$key = $value";
            }
            break;
        case 'time_begin':
            if( is_numeric($value) ) {
                $conds[] = "utime >= $value";
            }
            break;
        case 'time_end':
            if( is_numeric($value) ) {
                $conds[] = "utime < $value";
            }
            break;
        case 'customer':
            if( strlen($value) > 50 ) {
                $value = substr($value, 0, 50);
            }
            $value = iconv("UTF-8", "GB2312//IGNORE", $value );
            $conds[] = "$key = '$value'";
            break;
        case 'order':
            if( is_array($value) ) {
                $columns = array('id', 'fee', 'deal', 'teacher_id', 'plan_id', 'time_begin', 'time_end', 'customer', 'out_trade_no', 'third_trade_no');
                foreach( $value as $item ) {
                    if( is_array($item) ){
                        foreach( $item as $column=>$s ) {
                            if( in_array( $column, $columns ) ) {
                                if( $s !== 'desc' ) {
                                    $s = 'asc';
                                    $s_anti = 'desc';
                                }else{
                                    $s = 'desc';
                                    $s_anti = 'asc';
                                }
                                $intermediaKeys[] = $column;
                                $order[] = "$column $s";
                                $anti_order[] = "$column $s_anti";
                            }
                        }
                    }
                }
            }
            break;
        case 'page':
            if( is_numeric($value) && $value > 0 ) {
                $page = $value;
            }
            break;
        case 'offset':
            if( is_numeric($value) && $value >= 0 ) {
                $offset = $value;
            }
            break;
        case 'limit':
            if( is_numeric($value) && $value > 0 ) {
                $limit = $value;
            }
            break;
        default:
            $conds[] = "$key = '$value'";
    }
}

$where = implode(' AND ', $conds);
if( !empty($conds) ) {
    $where = " WHERE ".$where;
}


if( $page == 0 ) {
    $page = floor($offset / $limit) + 1;
}

$get_total = "SELECT COUNT(1) AS total FROM live_plan_bonus $where";
//echo $get_total;
$result = $conn->select2($get_total, array());
$total = $result[0]['total'];

//计算分页的top值
if( $page * $limit <= $total ) {
    $top = $limit;
}else{
    $top = $total % $limit;
}

//默认按id降序
if( empty($order) ) {
    $order = "id desc";
    $anti_order = "id asc";
}else{
    $order = implode(',', $order );
    $anti_order = implode(',', $anti_order );
}
$intermediaKeys = implode( ',', $intermediaKeys );

//sql2005
//$get_sql =<<<SQL
//with #pager as
//(
//    SELECT
//      *,
//      ROW_NUMBER()
//      OVER (
//        ORDER BY $order) AS rowid
//    FROM live_plan_bonus
//    $where
//)
//select * from #pager where rowid between ($limit * ($page-1)+1) and $limit * $page
//SQL;
//echo $get_sql;

//sql2000
$topOffset = $page * $limit;
$get_sql =<<<SQL
SELECT * FROM live_plan_bonus w1 WHERE ID in
(
    SELECT TOP $top ID FROM
    (
        SELECT TOP $topOffset  $intermediaKeys FROM live_plan_bonus $where ORDER BY $order
    ) w ORDER BY $anti_order
) ORDER BY $order
SQL;

//var_dump($get_sql);
$data = $conn->select2($get_sql,array());

//获取教师数据
$get_teacher = "select id, name AS teacher_name from live_plan_teacher";
$teachers = $conn->select2($get_teacher,array());
$teacherMap = array();

foreach( $teachers as $teacher ) {
    $teacherMap[$teacher['id']] = iconv("GB2312//IGNORE","UTF-8", $teacher['teacher_name'] );
}

//$conn->select2($get_teacher, array('teacher_id'))
foreach( $data as &$row ){
    $row['date'] = date('Y-m-d', $row['utime']);
    $row['time'] = date('H:i:s', $row['utime']);
    $row['customer'] = iconv("GB2312//IGNORE","UTF-8", $row['customer'] );
    $row['teacher_name'] = $teacherMap[$row['teacher_id']];
    $row['lesson_title'] = getLessonTitle($conn, $row['plan_id']);
}
WebTool::respondFormattedJSON( array( 'rows'=>$data, 'total'=>$total ) );



//////////FUNCTIONS
function getLessonTitle($conn, $plan_id) {
    static $titleMap = array();
    if( isset($titleMap[$plan_id]) ) {
        //从缓存中取出
        return $titleMap[$plan_id];
    }

    //从数据库中取出
    $get_title = "SELECT title FROM live_plan WHERE id = ':plan_id'";
    $result = $conn->select2($get_title, array('plan_id'=>$plan_id));

    if( $result && count($result[0]) > 0 ) {
        $titleMap[$plan_id] =  iconv("GB2312//IGNORE","UTF-8", $result[0]['title'] );
        return $titleMap[$plan_id];
    }

    //未找到
    return "";
}