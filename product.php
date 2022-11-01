<?php
	session_start();
?>
<?php 
	include "head.php";
	?>
<?php
$title ="Shop hy";
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
	<!--///////////////////Product Page///////////////////-->
	<!--//////////////////////////////////////////////////-->
	<div id="page-content" class="single-page">
	<?php
   require 'inc/myconnect.php';
   //lay san pham theo id
   $id = $_GET["id"];
   $query="SELECT s.ID,s.Ten,s.Gia,s.HinhAnh,s.tacgia,s.Mota, n.Ten as Tennhasx,s.Manhasx
   from sanpham s 
   LEFT JOIN nhaxuatban n on n.ID = s.Manhasx
	WHERE  s.id =".$id;
   $result = $conn->query($query);
$row = $result->fetch_assoc();


?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="#">Sách</a></li>
						<li><a href="#"><?php echo $row["Ten"]?></a></li>
					</ul>
				</div>
			</div>
			<div class="row">

				<div id="main-content" class="col-md-8">
					<div >
						<div class="col-md-6">
							<div class="image">
								<img src="images/<?php echo $row["HinhAnh"]?>" style="width:300px;height:300px" />
								
							</div>
						</div>
						<div class="col-md-6">
							<div class="caption">
								<div class="name"><h5><?php echo $row["Ten"]?></h5></div>
								<div class="info">
									<ul>
										<li>Tác giả: <b><?php echo $row["tacgia"]?></b></li>
										<li>Nhà xuất bản: <a href="/category.php?manhasx=<?php echo $row["Manhasx"]?>"><?php echo $row["Tennhasx"]?></a> <h3></li>
									</ul>
								</div>
									<div class="price"><?php echo $row["Gia"]?>.000 VNĐ<span></span></div>
							
								<div class="modal fade" id="myModal" role="dialog">
							
    <div class="modal-dialog">
    
      <!-- Modal content-->
      
      
    </div>
  </div>
								
								
							</div>
						</div>
						<div class="clear"></div>
					</div>	
					<div class="product-desc">
						<ul class="nav nav-tabs">
							<li class="active"><a >Thông tin sách</a></li>
						</ul>
						<div class="tab-content">
							<div >
								
								<div innerHTML>
                      <p><?php echo $row["Mota"]?></p>
                    </div>						
							</div>
							
						</div>
					</div>
					
	
					</div>
				</div>
				
			</div>
		</div>
	</div>	


</body>
</html>


