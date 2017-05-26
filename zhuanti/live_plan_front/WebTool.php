<?php

/**
 * Created by PhpStorm.
 * User: shaolei
 * Date: 16/9/8
 * Time: 下午4:34
 */
class WebTool
{
    public static function fromPostJSON() {
        $postStr = file_get_contents('php://input');
        return json_decode( $postStr, true );
    }

    /**
     * JSON相应响应消息的模板
     * {"ecode":"0", "emsg","ok",...}
     * @param array $data
     * @param string $ecode
     * @param string $emsg
     * @return string
     */
    public static function respondFormattedJSON( $data=NULL, $ecode='0', $emsg='ok' ) {
        $resp = array(
            'ecode'=>$ecode,
            'emsg'=>$emsg,
            'data'=>$data,
        );
        self::respondJSON( $resp );
    }

    public static function respondJSON( $data ) {
//         header('Content-Type: application/json');
        echo json_encode($data);
    }

    public static function createGuid($namespace, $data = '') {
        static $guid = '';
        $uid = uniqid("", true);
        $data = implode('', array(
            $data,
            $uid,
            $guid,
            $namespace,
            $_SERVER['REQUEST_TIME_FLOAT'],
            $_SERVER['HTTP_USER_AGENT'],
            $_SERVER['REMOTE_ADDR'],
            $_SERVER['REMOTE_PORT'],
        ));
        $guid = md5($data);
        return $guid;
    }

    public static function encodePasswd( $passwd ) {
        return substr(md5($passwd),8,16);
    }

    public static function getSessionId($key) {
        if( isset($_COOKIE[$key]) )
            return $_COOKIE[$key];
        else{
            return false;
        }
    }

    //输入框检查////
    /**
     * 登录用户名验证
     * 3~16个字符,允许使用汉字,字母,数字,-,_,@
     */
    public static function checkUserName($string) {
        $partten = '/^[\x{4e00}-\x{9fbf}a-zA-Z0-9_@\-]{3,16}$/u';
        return preg_match( $partten, $string );
    }

    /**
     * 密码验证
     * 6~16个字符,允许使用汉字,字母,数字,-,_,@
     */
    public static function checkPassword($string){
        $partten = '/^[\x{4e00}-\x{9fa5}a-zA-Z0-9!@#$_\-]{6,16}$/u';
        return preg_match( $partten, $string );
    }

    /**
     * 昵称验证
     * 20个字符,允许使用字母,数字,-,_,@
     */
    public static function checkNickname($string){
        $partten = '/^[\x{4e00}-\x{9fa5}a-zA-Z0-9_\-@]+$/u';
        return preg_match( $partten, $string ) && count($string) < 20;
    }

    /**
     * 所属单位验证
     * 60个字符,允许使用汉字,字母,数字,-,_,@
     */
    public static function checkEmployer($string) {
        $partten = '/^[\x{4e00}-\x{9fa5a}a-zA-Z0-9_\-@]+$/u';
        return preg_match( $partten, $string) && count($string) <= 60;
    }

    /**
     * 手机电话验证
     */
    public static function checkPhone($string){
        $partten = '/^(13|14|15|17|18)[0-9]{9}$/';
        return preg_match( $partten, $string );
    }

    /**
     * 邮箱验证
     * 60个字符以内
     */
    public static function isEmail($string) {
        $partten = '/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/';
        return preg_match($partten, $string) && count($string) < 60;
    }

    /**
     * qq验证
     * 5~20位qq号或邮箱
     */
    public static function checkQq ($string) {
        $partten = '/^([1-9][0-9]{4,19})$/';
        return preg_match($partten, $string) || self::isEmail($string);
    }

    /**
     * qq验证
     * 5~20位qq号或邮箱
     */
    public static function checkAge ($string) {
        $age = intval($string);
        return( $age >= 0 && $age < 100 );
    }

    /**
     * 检查身份证号
     */
    public static function checkIdcard( $string ) {
        $partten = "/^([0-9]{17}[0-9x]{1})$/i";
        return preg_match($partten, $string);
    }
}


