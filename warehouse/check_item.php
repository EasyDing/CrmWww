<?php
/**
 * Created by PhpStorm.
 * User: Easy.D
 * Date: 2016/12/13
 * Time: 下午11:04
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
    "SELECT warehouseItemName, warehouseItemWeight, warehouseItemWarehouseName FROM warehouse_item WHERE warehouseItemName='". $uname ."' AND userpwd='". $upwd ."'";

$con_result = @$con -> query($sql);

if($con_result && $con_result -> num_rows > 0){

    while($row = $con_result -> fetch_assoc()){
        $rows[] = $row;
    }

    echo "{\"status\":\"Success\",\"message\":\"\",\"data\":";
    echo json_encode($rows);
    echo "}";

}else{
    echo "{\"status\":\"Fail\",\"message\":\"该仓库已存在该品类\"}";
}



$con -> close();