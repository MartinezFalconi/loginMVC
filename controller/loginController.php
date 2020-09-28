<?php
include "../model/user.php";
include "../model/connection.php";
$email=$_POST ['email'];
$password=$_POST ['password'];
//echo "email es {$femail} y la pass es {$fpassword}
//creo objeto user (la primera mayuscula porque es una clase)
$user=new User($email, $password);
echo $user->getEmail();
echo "<br>";
echo $user->getPassword();
$sql="SELECT * FROM tbl_user WHERE email = ? AND pass = ?";
$smt=$pdo->prepare ($sql);
$smt->bindParam (1, $email);
$smt->bindParam (2, $password);
$smt->execute();
$numUser=$smt->rowCount();

if($numUser==1){
    header("location:../view/home.php");
} else{
    header("location:../view/vista_login.html");
}





