<?php
/**
 * Created by PhpStorm.
 * User: Easy.D
 * Date: 2016/12/13
 * Time: 下午10:48
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
    "INSERT warehouse_item (warehouseItemName, warehouseItemWeight, warehouseItemWarehouseName) VALUES ('".$_POST["warehouseItemName"]."', '".$_POST["warehouseItemWeight"]."', '".$_POST["warehouseItemWarehouseName"]."')";

$res = $con -> query($sql);

if($res){
    echo "{\"status\":\"Success\",\"message\":\"\",\"data\":[]}";
}else{
    echo "{\"status\":\"Fail\",\"message\":\"". $con -> errno . ":" . $con ->error ."\",\"data\":}";
}

$con -> close();
