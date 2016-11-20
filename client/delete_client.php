<?php
/**
 * Created by PhpStorm.
 * User: Easy.D
 * Date: 2016/11/20
 * Time: 下午3:23
 */

header("Content-type:text/html; charset=utf-8");

//error_reporting(0);

require "../config.php";
$con = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME);
if($con ->connect_errno){
    die('Connect Error: '.$con->connect_errno);
}
$con->set_charset('utf8');

$sql = /** @lang text */
    "DELETE FROM `client` WHERE `clientId` IN ('".$_POST["clientId"]."');";
$res = $con -> query($sql);

if($res){
    echo "{\"status\":\"Success\",\"message\":\"\",\"data\":[]}";
}else{
    echo "{\"status\":\"Fail\",\"message\":\"". $con -> errno . ":" . $con ->error ."\",\"data\":}";
}
$con->close();
?>


