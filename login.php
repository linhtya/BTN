<?php
session_start();
$tk = "" ;
$mk = "" ;
$kq = "";
if(isset($_POST['submit']))
{
    require 'inc/myconnect.php';
    $tk = $_POST['txtus'] ;
    $mk = $_POST['txtem'];
    $sql="SELECT * FROM loginuser  where email = '$tk'  and matkhau = '$mk'";
    $result = $conn->query($sql);
    // echo  $mk;
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
        $_SESSION['txtus'] = $tk ;
        $_SESSION['HoTen'] = $row["HoTen"];
        $_SESSION['email'] = $row["email"];
        //$_SESSION['dienthoai'] = $row["DienThoai"];
            header('Location: index.php');
            $row = $result->fetch_assoc();  
        }
        //set cookie để lưu thông tin
        if(isset($_POST['rememberMe']))
        {
            setcookie("email",$tk, time() + (86400 * 30), "/");
            setcookie("matkhau",$mk, time() + (86400 * 30), "/");	
        }	        
    }
    else
    {
        $kq ="Thông tin không đúng vui lòng kiềm tra lại";
    }
}
?>