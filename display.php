<?php include './include/connect.php';?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #333; color: white; }
        tr:nth-child(even) { background: #f2f2f2; }
        .header {
        display: flex;
        gap: 10px;       
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;

        }
        .header h2 {
        margin: 0;
        }
        .header a {
        text-decoration: none;
        background: #007bff;
        color: white;
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 14px;
        }
        .header a:hover {
        background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
    <h2>Registered Users data</h2>
    <a href="index.php">Go back</a>
    </div>
    <?php if (isset($_GET['deleted'])): ?>
    <div class="msg">✅ Record deleted successfully!</div>
  <?php endif; ?>
    <table>
       
        <!--  -->

        <?php
        $select_query = "select * from crud";
        $result =mysqli_query($con,$select_query);
        $numofrows = mysqli_num_rows($result);
        $i=1;
        
        if($result){
        if($numofrows>0){
            echo " <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>City</th>
            <th>Action</th>
        </tr>";
        while($row =mysqli_fetch_assoc($result)){
        
        $id = $row['id'];
        $username = $row['username'];
        $email = $row['email'];
        $phone = $row['phone'];
        $city = $row['city'];
        echo "<tr>
                <td>$i</td>
                <td>$username</td>
                <td>$email</td>
                <td>$phone</td>
                <td>$city</td>
                <td>
                    <a class='btn update' href='update.php?update_id=$id'>Update</a>
                    <a class='btn delete' href='delete.php?del_id=$id'>Delete</a>
                </td>
                </tr>";
                $i++;
            
        }
        }else{
            echo "<h3>No Data found</h3>";
        }
        }else{
            die(mysqli_error($result));
        }
        
        ?>
    </table>
</body>
</html>
