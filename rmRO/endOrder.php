<?php
/**
 * Created by PhpStorm.
 * User: Easy.D
 * Date: 2017/1/21
 * Time: 下午12:55
 */

require "./config.php";
$con = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME);
if($con ->connect_errno){
    die('Connect Error: '.$con->connect_errno);
}
$con->set_charset('utf8');

$sql=/** @lang text */
    "UPDATE `order` SET flag = 1 WHERE cId = ".$_POST["cId"].";";



$res = $con -> query($sql);

if($res){
    echo "{\"status\":\"Success\",\"message\":\"\",\"data\":[]}";
}else{
    echo "{\"status\":\"Fail\",\"message\":\"". $con -> errno . ":" . $con ->error ."\",\"data\":}";
}
$con->close();
?>