<nav id="menu" class="navbar">

			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Trang chủ</a></li>
					<li class="dropdown"><a>Nhà xuất bản</a>
						<div class="dropdown-menu">
							<div class="dropdown-inner">
								<ul class="list-unstyled">
								<?php
  //lay id nha san xuat
  require 'inc/myconnect.php';
$laydanhsachnhasx="SELECT ID as manhasx,Ten from nhaxuatban";
$rstennhasx = $conn->query($laydanhsachnhasx);
   if ($rstennhasx->num_rows > 0) {
	   // output data of each row
	   while($row = $rstennhasx->fetch_assoc()) {

?>
									<li><a href="category.php?manhasx=<?php echo $row["manhasx"]?>"><?php echo $row["Ten"]?></a></li>
									<?php
		}
	}
					?>
								
			</div>
		</div>
	</nav>