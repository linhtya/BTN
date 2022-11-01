<?php
ob_start();
session_start();
 ?>


<?php 
	include "head.php"
	?>
<?php
$title ="Shop ";
$name ="Điện thoai";
?>
<?php 
	include "top.php"
    ?>
    <?php 
	include "header.php"
	?>
	<?php 
	include "navigation.php"
	?>
	<!--//////////////////////////////////////////////////-->
	<!--///////////////////Account Page///////////////////-->
	<!--//////////////////////////////////////////////////-->
	<?php
$tk = "" ;
$mk = "" ;
$kq = "";
if(isset($_POST['submit']))
{
    require 'inc/myconnect.php';
    $tk = $_POST['txtus'] ;
    $mk = $_POST['txtem'];
    $sql="SELECT * FROM loginuser  where email = '$tk'  and matkhau = '$mk'  ";
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
<?php
$name = "" ;
$email = "" ;
$dt= "";
$mk= "";
$kqdk ="";
$repass ="";

if(isset($_POST['dangky']))
{
    require 'inc/myconnect.php';
    $name  = $_POST['fullname'] ;
    $email = $_POST['email'];
    $dt = $_POST['phone'];
    $mk = $_POST['password'];
    $repass = $_POST['repass'];
    if($repass != $mk  )
    {
        $kqdk = "Mật khẩu nhập lại không chính xác";
    }
    else
    {
        $sql="INSERT INTO  loginuser (email,matkhau,hoten,DienThoai) 
        VALUES ('$email','$mk' ,'$name','$dt') ";
        // echo  $mk;
        if (mysqli_query($conn, $sql)) {
            $name = "" ;
            $email = "" ;
            $dt= "";
            $mk= "";
            $repass ="";
            $kqdk = "Đăng ký thành công";
        } else {
            $kqdk = "Đăng ký không thành công xin hay kiểm tra lại thông tin";
        }
    }

    
    mysqli_close($conn);
}
?>
	<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><a href="account.php">Account</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="heading"><h2>Đăng nhập</h2></div>
					<form name="form1" id="ff1" method="POST" action="#">
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email" name="txtus" required value="">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Mật khẩu" name="txtem"required value="">
						</div>
						<!--tạo checkbox lưu thông tin-->
						<div class="form-group"> 
						<div class="custom-control custom-checkbox ">
							<input type="checkbox" class="custom-control-input" id="rememberMe">
							<label class="custom-control-label" for="rememberMe">Lưu thông tin</label>
						</div>
						<button type="submit" name="submit" class="btn btn-1" name="login" id="login">Đăng nhập</button>
						<P style="color:red"><?php echo $kq; ?></p>
						<a href="#"></a>
						<br>
					<i>* Bạn chưa có tài khoản? <a href="account2.php">Vui lòng đăng ký</a>.</i>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>
<?php ob_end_flush(); ?>
