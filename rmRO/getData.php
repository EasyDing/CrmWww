<?php
/**
 * Created by PhpStorm.
 * User: Easy.D
 * Date: 2017/1/18
 * Time: 上午9:56
 */

require "./config.php";
$con = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME);
if($con ->connect_errno){
    die('Connect Error: '.$con->connect_errno);
}
$con->set_charset('utf8');


$sql = /** @lang text */
        "SELECT DISTINCT ". $_POST["country"]." FROM class";

$con_result = @$con -> query($sql);

if($con_result && $con_result -> num_rows > 0){

    while($row = $con_result -> fetch_assoc()){
        $rows[] = $row;
    }

    echo "{\"status\":\"Success\",\"message\":\"\",\"data\":";
    echo json_encode($rows);
    echo "}";

}else{
    echo "{\"status\":\"Fail\",\"message\":\"查询失败\"}";
}





$con -> close();

?>