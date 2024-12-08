    <?php include '../../config.php';
    $admin=new Admin();
    $caid=$_GET['caid'];
    $stmt=$admin->cud("DELETE FROM `category` WHERE `ca_id`='$caid'","delete");
    echo "<script>alert('Data deleted successfully');window.location.href='../category.php';</script>";
    ?>