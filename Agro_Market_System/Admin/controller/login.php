<?php include '../../config.php';
$admin= new Admin();
if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $stmt=$admin->ret("SELECT * FROM `admin` WHERE `a_email`='$email' AND `a_password`='$password' ");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $num=$stmt->rowCount();
    if($num>0){
        $id=$row['a_id'];
        $_SESSION['a_id']=$id;
        echo "<script> alert('Login success');window.location.href='../index.php';</script>";


    }else{
        echo"<script> alert('Invalid User');window.location.href='../login.php';</script>";
    }
}
?>