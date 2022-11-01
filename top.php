<?php 
include "head.php"
?>
<?php
$title ="Shop ";
$name ="Điện thoai";
?>
<body>

<nav id="top">
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<!-- <select class="language">
						<option value="English" selected>VietNam</option>
					</select>
					<select class="currency">
						<option value="USD" selected>VNĐ</option>
					</select> -->
				</div>
				<div class="col-xs-6">
					<ul class="top-link">
						<?php
							 // require "login.php";
							      if(!isset($_SESSION['txtus'])) // If session is not set then redirect to Login Page
							       {
							           printf(' <li><a href="account.php"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
										');
										printf(' <li><a href="account2.php"><span class="glyphicon glyphicon-log-in"></span> Đăng ký</a></li>
										');
							       }
							       else{
							       	echo '<li><span class="glyphicon glyphicon-user"></span> Xin chào ' ; echo '<span style="color:Tomato;"><b>' . $_SESSION['HoTen'] . '</b></span></li>' ;
							       	echo '<li><span class="glyphicon glyphicon-log-out"></span><a href="dangxuat.php"> Đăng xuất!</a></li>';
							       }

							?>
						
					</ul>
				</div>
			</div>
		</div>
    </nav>
    </body>
</html>
