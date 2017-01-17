<?php
/**
 * Created by PhpStorm.
 * User: Easy.D
 * Date: 2016/12/13
 * Time: 下午11:04
 */

header("Content-type:text/html; charset=utf-8");

//error_reporting(0);

require "./config.php";
$con = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME);
if($con ->connect_errno){
    die('Connect Error: '.$con->connect_errno);
}
$con->set_charset('utf8');

$sql = /** @lang text */
    "SELECT * FROM class WHERE country='". $_POST["country"] ."' AND farm='". $_POST["farm"] ."' AND class='". $_POST["classes"] ."'";

$con_result = @$con -> query($sql);

if($con_result && $con_result -> num_rows > 0){

    while($row = $con_result -> fetch_assoc()){
        $rows[] = $row;
    }


    echo "{\"status\":\"Success\",\"message\":\"系统中存在该品类\"}";

//    echo "{\"status\":\"Success\",\"message\":\"\",\"data\":";
//    echo json_encode($rows);
//    echo "}";

}else{
    echo "{\"status\":\"Fail\",\"message\":\"系统中不存在该品类，允许插入\"}";
}



$con -> close();