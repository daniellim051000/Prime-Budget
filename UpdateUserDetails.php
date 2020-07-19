<?php
include("conn.php");

if(isset($_POST['submit']) ){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone_no'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    
    if($password==$cpassword){
      
    $sql="UPDATE `user` SET
    `name`='$name',
    `age`='$age',
    `gender`='$gender',
    `email`='$email',
    `phone_no`='$phone',
     `password`=MD5('$password')
   
    WHERE `user_id`='$id';";
    
   if(!mysqli_query($con,$sql)){
    die('Error:'.mysqli_error($con));
   }
    else{
        echo'<script>alert("Updated Successful!");window.location.href="client_dashboard.php";</script>';
    } 
}}else{
    echo'<script>alert("You have incompleted field, please check before you submit");window.location.href="client_dashboard.php";</script>';
    
}
    mysqli_close($con);
?>

























