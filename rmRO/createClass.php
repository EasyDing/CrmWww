<?php
/**
 * Created by PhpStorm.
 * User: Easy.D
 * Date: 2017/1/17
 * Time: 下午11:08
 */

require "./config.php";

$con = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME);
if($con ->connect_errno){
    die('Connect Error: '.$con->connect_errno);
}
$con->set_charset('utf8');
$sql = /** @lang text */
    "INSERT class (country, farm, classes) VALUES ('".$_POST["country"]."', '".$_POST["farm"]."', '".$_POST["classes"]."')";

$res = $con -> query($sql);

if($res){
    echo "{\"status\":\"Success\",\"message\":\"\",\"data\":[]}";
}else{
    echo "{\"status\":\"Fail\",\"message\":\"". $con -> errno . ":" . $con ->error ."\",\"data\":}";
}

$con -> close();