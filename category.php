<?php
ob_start();
?>
<?php 
	include "login.php"
	?>
<?php 
	include "head.php"
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
	<!--///////////////////Category Page//////////////////-->
	<div id="page-content" class="single-page">
		<div >
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
					<li><a href="index.php">Trang chủ</a></li>
					</ul>
				</div>
			</div>

			<div class="row">
				<div id="main-content" class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<div class="products">
							<?php
							   require 'inc/myconnect.php';
							   //lay san pham theo id
							   $manhasx = $_GET["manhasx"];
							   $result = mysqli_query($conn, 'select count(ID) as total from sanpham where Manhasx = '.$manhasx );
							   $row = mysqli_fetch_assoc($result);
							   $total_records = $row['total'];		
							  				   
							   $offset =1;
							   // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
							
								
							   // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH
							   // Có limit và start rồi thì truy vấn CSDL lấy danh Sách
							   $result = mysqli_query($conn, "SELECT * FROM sanpham where Manhasx = '$manhasx'  " );
	// output data of each row
	while ($row = mysqli_fetch_assoc($result)){

?>

								<div class="col-lg-4 col-md-4 col-xs-12">
								<div class="product">
								<div class="image"><a <?php echo $row["ID"]?>"><img src="images/<?php echo $row["HinhAnh"]?>" style="width:300px;height:300px"/></a></div>
								<div class="caption">
									<div class="name">
									
									<?php
            if (isset($_SESSION['txtus']))  {
				?><h3><a href="product.php?id=<?php echo $row["ID"]?>"><?php echo $row["Ten"]?></a></h3><?php
            } else 
			
			{ 				?><h3><a href="account.php?id=<?php echo $row["ID"]?>"><?php echo $row["Ten"]?></a></h3><?php			}
			
        ?> 			</div>
									
									<div class="price"><?php echo $row["Gia"] ?>.000 VNĐ</div>
								</div>
							</div>
								</div>
								<?php
		}
					?>
							</div>
						</div>
	
					</div>
				
		
				</div>
				
			</div>
		</div>
	</div>	
	
    </body>
</html>

