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

switch ($_POST["var"]){
    case "country":
        $sql = /** @lang text */
            "SELECT DISTINCT country FROM class";
        break;
    case "farm":
        $sql = /** @lang text */
            "SELECT DISTINCT farm FROM class WHERE country='".$_POST["country"]."'";
        break;
    case "class":
        $sql = /** @lang text */
            "SELECT DISTINCT classes FROM class WHERE country='".$_POST["country"]."' AND farm='".$_POST["farm"]."'";
        break;

}


$con_result = @$con -> query($sql);

if($con_result && $con_result -> num_rows > 0){

    while($row = $con_result -> fetch_assoc()){
        $rows[] = $row;
    }

    echo "{\"status\":\"Success\",\"message\":\"\",\"data\":";
    echo json_encode($rows);
    echo "}";

}else{
    echo "{\"status\":\"Fail\",\"message\":\"未查询到数据\"}";
}





$con -> close();

?>