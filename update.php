<?php 
include './include/connect.php';

if(isset($_GET['update_id'])){
    $uid = $_GET['update_id'];

    $select_query = "Select * from crud where id=$uid";
    $result =mysqli_query($con,$select_query);
    if($result){
    $row =mysqli_fetch_assoc($result);
    $username = $row['username'];
    $email = $row['email'];
    $phone = $row['phone'];
    $city = $row['city'];
    // update query
    if(isset($_POST['update'])){
    $username_update = $_POST['username'];
    $email_update = $_POST['email'];
    $phone_update = $_POST['phone'];
    $city_update = $_POST['city'];

    $update_query = "update crud set username='$username_update',email='$email_update',phone='$phone_update',city='$city_update' where id = $uid";

    $result_query =mysqli_query($con,$update_query);

    if($result_query){
        header('Location: display.php');
    }
    }
    }else{
        die(mysqli_error($result));
    }

    
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="POST">
        <h2>Update user data</h2>
        <div class="form_div">
            <label>Name <span>*</span></label> 
            <input type="text" name="username" placeholder="Enter your name" autocomplete="off" value= <?php echo $username?> required>
        </div>
        <div class="form_div">
            <label>Email <span>*</span></label>
            <input type="email" name="email" placeholder="Enter your email" autocomplete="off" value= <?php echo $email?> required>
        </div>
        <div class="form_div">
            <label>Phone <span>*</span></label>
            <input type="text" name="phone" placeholder="Enter your phone" autocomplete="off" value= <?php echo $phone?> required>
        </div>
        <div class="form_div">
            <label>City <span>*</span></label>
            <input type="text" name="city" placeholder="Enter your City" autocomplete="off" value= <?php echo $city?> required>
        </div>
        <div class="btns">
            <button type="submit" name="update" class="primary">Update</button>
            
        </div>
    </form>
</body>
</html>
