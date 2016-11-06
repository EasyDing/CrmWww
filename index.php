<?php
/**
 * Created by PhpStorm.
 * User: Easy.D
 * Date: 16/8/31
 * Time: 下午2:09
 */

header("Content-type:text/html; charset=utf-8");

if($con = mysqli_connect("localhost","easy", "123456", "easy")){
        echo "Connected";
}else{
    echo "Fail";
}

$sql = "INSERT INTO `user`(`name`, `sex`, `age`)VALUES('赵武', '1', '15')";
if($ins = mysqli_query($con,$sql)){
    mysqli_close($con);
    echo "Insert Success And Closed";
}else{
    mysqli_close($con);
    echo "Insert Error And Closed";
}
?>
