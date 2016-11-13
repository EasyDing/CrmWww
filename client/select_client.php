<?php
/**
 * Created by PhpStorm.
 * User: Easy.D
 * Date: 2016/11/13
 * Time: 下午7:49
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
    "SELECT * FROM client;";

$result = $con -> query($sql);
if($result && $result -> num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    echo "{\"status\":\"Success\",\"message\":\"\",\"data\":";
    echo json_encode($rows,JSON_UNESCAPED_UNICODE);
    echo "}";
}else{
    echo "{\"status\":\"Fail\",\"message\":\"查询失败\"}";
}




$con -> close();
?>