<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['username'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $code=$_POST['code'];
    $Phone=$_POST['Phone'];  


$con=new mysqli('localhost','root','','registration');
if($con){
    //echo "connection successful";
    $sql="insert into `info`(username,gender,email,code,Phone)values('$name','$gender',' $email','$code','$Phone')";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "data inserted successfully";
    }else{
        die(mysqli_error($con));
    }
}else{
    die(mysqli_error($con));
}

}
?>