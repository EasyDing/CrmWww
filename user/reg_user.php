<?php
/**
 * Created by PhpStorm.
 * User: Easy.D
 * Date: 2016/11/6
 * Time: 下午12:26
 */

header("Content-type:text/html; charset=utf-8");

require "../config.php";

$con = @new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME);
if($con ->connect_errno){
    die('Connect Error: '.$con->connect_errno);
}

$con->set_charset('utf8');
//此处插入数据库操作

$sql = "INSERT user(username,userpwd,identity) VALUES ('". $_POST["username"] ."','". $_POST["userpwd"] ."','". $_POST["identity"] ."');";
$res = @$con->query($sql);

if($res){
    echo "Insert Success";
}else{
    echo "ERROR ".$con -> errno. ":" .$con -> error;
}

$con->close();

?>