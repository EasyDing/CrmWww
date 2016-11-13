<?php
/**
 * Created by PhpStorm.
 * User: Easy.D
 * Date: 2016/11/6
 * Time: 下午3:19
 */


header("Content-type:text/json; charset=utf-8");

//error_reporting(0);

require "../config.php";

$uname = $_POST["uname"];
$upwd = $_POST["upwd"];

$con = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME);
if($con ->connect_errno){
    die('Connect Error: '.$con->connect_errno);
}

$con->set_charset('utf8');
//此处插入数据库操作

$sql = /** @lang text */
    "SELECT username, userpwd FROM user WHERE username='". $uname ."' AND userpwd='". $upwd ."'";

$con_result = @$con -> query($sql);

if($con_result && $con_result -> num_rows > 0){

    while($row = $con_result -> fetch_assoc()){
        $rows[] = $row;
    }

    echo "{\"status\":\"Success\",\"message\":\"\",\"data\":";
    echo json_encode($rows);
    echo "}";

}else{
    echo "{\"status\":\"Fail\",\"message\":\"该用户不存在\"}";
}

$con->close();

?>