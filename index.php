<?php include './include/connect.php'; 

if(isset($_POST['submit'])){
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];

$insert_query = "insert into crud (username,email,phone,city) values ('$username','$email','$phone','$city')";

$result =mysqli_query($con,$insert_query);

if($result){
    header("Location: index.php");
}else{
    die(mysqli_error($result));
}
};
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
        <h2>User Registration</h2>
        <div class="form_div">
            <label>Name <span>*</span></label> 
            <input type="text" name="username" placeholder="Enter your name" required>
        </div>
        <div class="form_div">
            <label>Email <span>*</span></label>
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form_div">
            <label>Phone <span>*</span></label>
            <input type="text" name="phone" placeholder="Enter your phone" required>
        </div>
        <div class="form_div">
            <label>City <span>*</span></label>
            <input type="text" name="city" placeholder="Enter your City" required>
        </div>
        <div class="btns">
            <button type="submit" name="submit" class="primary">Submit</button>
            <a href="display.php" class="display_btn">Details</a>
        </div>
    </form>
</body>
</html>
