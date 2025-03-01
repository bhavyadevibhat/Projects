<?php include '../../config.php';
$admin= new Admin();
if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $stmt=$admin->ret("SELECT * FROM `customer` WHERE `c_email`='$email' AND `c_password`='$password' ");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $num=$stmt->rowCount();
    if($num>0){
        $id=$row['c_id'];
        $_SESSION['c_id']=$id;
        echo "<script> alert('Login success');window.location.href='../index.php';</script>";


    }else{
        echo"<script> alert('Invalid User');window.location.href='../login.php';</script>";
    }
}
?>