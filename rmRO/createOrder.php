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
$sql3=/** @lang text */
    "SELECT classId FROM class WHERE country='巴拿马' AND farm='哈特曼' AND classes='水洗卡杜拉';";

$con_result = @$con -> query($sql1);

if($con_result && $con_result -> num_rows > 0) {

    while ($row = $con_result->fetch_assoc()) {
        $classId = $row["classId"];
    }

    $time = date("Y-m-d H:i:s",strtotime($srcDataStr));

    $sql2 = /** @lang text */
        "INSERT INTO rmRO.`order` (`cId`,`weight`,`date`) VALUES (" . $classId . ",'" . $_POST["weight"] . "',now())";

    $res = @$con->query($sql2);

    if ($res) {
        echo "{\"status\":\"Success\",\"message\":\"\",\"data\":[]}";
    } else {
        echo "{\"status\":\"Fail\",\"message\":\"" . $con->errno . ":" . $con->error . "\",\"data\":}";
    }
}


$con->close();
?>