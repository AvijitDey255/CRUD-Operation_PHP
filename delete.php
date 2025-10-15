<?php 
include './include/connect.php';

if(isset($_GET['del_id'])){
    $did = $_GET['del_id'];

    $delete_query = "delete from crud where id=$did";
    $result =mysqli_query($con,$delete_query);
    if($result){
        header('Location:display.php');
    }else{
        die(mysqli_error($result));
    }
}

?> 