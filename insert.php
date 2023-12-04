<?php
$username = $_POST['username'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$code = $_POST['code'];
$Phone = $_POST['Phone'];

if (!empty($username) || !empty($gender) || !empty($email) || !empty($code) || !empty($Phone)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "registration";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if(mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }else{
        $SELECT = "SELECT email From info Where email = ?Limit 1";
        $INSERT = "INSERT Into info (username, gender, email, phonecode, Phone) values(?,?,?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum==0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssii", $username, $gender, $email, $phonecode, $Phone);
            $stmt->execute();
            echo "New record inserted";
        }else{
            echo "Email registered already";
        }
        $stmt ->close();
        $conn ->close();
    }
}else{
    echo "Please enter valid inputs";
    die();
}
?>