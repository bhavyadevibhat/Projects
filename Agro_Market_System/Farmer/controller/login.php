<?php include '../../config.php';
$admin= new Admin();
if(isset($_POST['login']))
{
    $uname=$_POST['u_name'];
    $password=$_POST['f_password'];
    $stmt=$admin->ret("SELECT * FROM `farmer` WHERE `u_name`='$uname' AND `f_password`='$password' ");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $num=$stmt->rowCount();
    if($num>0){
        $id=$row['f_id'];
        $_SESSION['F_id']=$id;
        echo "<script> alert('Login success');window.location.href='../index.php';</script>";

    }
    else{
        echo"<script> alert('Invalid User');window.location.href='../login.php';</script>";
    }
}
?>