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
	
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" >
	<!--//////////////////////////////////////////////////-->
	<!--///////////////////Account Page///////////////////-->
	<!--//////////////////////////////////////////////////-->
</head>
	<?php
	
	// include 'ketnoi.php';
	require 'inc/myconnect.php';
        $err = [];
        $name = "" ;
        $email = "" ;
        $dt= "";
        $mk= "";
        $ns = "";
        $kqdk ="";
        $repass ="";

	if(isset($_POST['dangky'])){
		$name  = $_POST['name'] ;
		$email = $_POST['email'];
		$dt = $_POST['phone'];
        $ns = $_POST['ngaysinh'];
		$mk = $_POST['password'];
		$repass = $_POST['repass'];

		if(empty($mk)){
			$err['mk']='bạn chưa  nhập lại mật khẩu!';
		}
        if(strlen($mk)<8){
            $err['mk']='Vui lòng nhập mật khẩu hơn 8 kí tự!';
            $mk = "";
            $repass = "";
        }

		if($mk != $repass){
			$err['repass'] ='Mật khẩu nhập lại không đúng';
		}

		$sql1="SELECT * FROM loginuser WHERE email ='$email'";
		$query1=mysqli_query($conn, $sql1);
		$checkEmail = mysqli_num_rows($query1);
		//kiểm tra email tồn tại chưa
			if($checkEmail >0 ){
				$err['trungmail'] ='Email đã tồn tại';
			
				?>
				<div class="alert alert-danger alert-dismissible">
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				<strong>Email đã tồn tại!!</strong>
			</div> 
			<?php
		
			
		}

    //}
		if(empty($err)){
			// nếu không có lỗi thì insert
			$sql = "INSERT INTO  loginuser(email, matkhau, HoTen, DienThoai, ngaysinh) VALUES ('$email','$mk' ,'$name','$dt', '$ns')";
			$query=mysqli_query($conn, $sql);

            if ($query) {
                $name = "" ;
                $email = "" ;
                $dt = "";
                $ns = "";
                $mk = "";
                $repass ="";
                $kqdk = "Đăng ký thành công";
            } 
            else {
				echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
				}
				mysqli_close($conn);
		} 
    }
?>
<!-- <html>
	<body>
		<style><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> </style> -->

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
					<div class="heading"><h2> Đăng ký tài khoản</h2></div>
					<form name="form2" id="ff2" method="post" action="#">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Họ Tên" name="name" id="firstname" value="<?php echo $name;?>" required >
						</div>
 
						
						<div class="form-group">
                        <input class="text email" type="email" placeholder="Email" name="email" value="" required/>
                        <div class="invalid-feedback">Vui lòng nhập email</div>
						
                        <!-- kiểm tra trùng mail -->
                        <div class="has-error">
                        <span> <?php echo(isset($err['trungmail']))?$err['trungmail']:'' ?></span>
                        </div>
                    </div>

						<div class="input-group">
								<div class="input-group-prepend">
								<div class="input-group-text">+84</div>
								</div>
								<input type="text" class="form-control" name="phone" id="" placeholder="Số điện thoại">
							</div>
						<div class="form-group">
						<input type= "date" class="form-control" placeholder="Ngày sinh" name="ngaysinh" id="ngaysinh" value="<?php echo $ns;?>" required >
						</div>
						<div class="form-group">
						<input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password"  value="<?php echo $mk;?>"required >
                        
                        <div class="has-error">
                            <span> <?php echo(isset($err['mk']))?$err['mk']:'' ?></span>
                        </div>

                    </div>

                    <div class="form-group">
                            <input class="text w3lpass"  type="password" placeholder="Mật khẩu nhập lại" name="repass" value="" required/>
                            <!-- báo lỗi nếu mật khẩu nhập lại không đúng-->
                            <div class="has-error">
                            <span> <?php echo(isset($err['repass']))?$err['repass']:'' ?></span>
                        </div>
 
                    </div>

					<button type="submit" name="dangky" class="btn btn-1">Đăng kí</button>
					<P style="color:red"><?php echo $kqdk; ?></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php ob_end_flush(); ?>
