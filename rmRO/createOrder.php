<?php
/**
 * Created by PhpStorm.
 * User: Easy.D
 * Date: 2017/1/20
 * Time: 上午9:16
 */


require "./config.php";

$con = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME);
if($con ->connect_errno){
    die('Connect Error: '.$con->connect_errno);
}
$con->set_charset('utf8');

$sql1=/** @lang text */
    "SELECT classId FROM class WHERE country='". $_POST["country"]."' AND farm='".$_POST["farm"]."' AND classes='".$_POST["classes"]."';";

$con_result = @$con -> query($sql);

if($con_result && $con_result -> num_rows > 0) {

    while ($row = $con_result->fetch_assoc()) {
        $rows[] = $row;
    }
}
$sql2 =/** @lang text */
    "INSERT INTO order (cId,weight) VALUES (".$rows[0].",".$_POST["weight"].")";

$res = @$con -> query($sql2);

if($res){
    echo "{\"status\":\"Success\",\"message\":\"\",\"data\":[]}";
}else{
    echo "{\"status\":\"Fail\",\"message\":\"". $con -> errno . ":" . $con ->error ."\",\"data\":}";
}



$con->close();
?>