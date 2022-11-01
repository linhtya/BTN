			
			<div class="row">
			<div class="col-lg-12">
				<div class="heading"><h2>Tất cả sản phẩm</h2></div>

				<div class="products">
				<?php
				
					require 'inc/myconnect.php';
					
					// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE

					
					$query="SELECT * from sanpham ORDER BY ID DESC;";
					$rs = $conn->query($query);
					if ($rs->num_rows > 0) {
					// output data of each row
					while($row = $rs->fetch_assoc()) {

					?>
					<div class="col-lg-3 ">
						<div class="product">
							
							<div class="image"><a <?php echo $row["ID"]?>"><img src="images/<?php echo $row["HinhAnh"]?>" style="width:300px;height:300px"/></div>
							
							
							<div class="caption">
								<div class="name">
								<?php
            if (isset($_SESSION['txtus']))  {
				?><h3><a href="product.php?id=<?php echo $row["ID"]?>"><?php echo $row["Ten"]?></a></h3><?php
            } else 
			
			{ 				?><h3><a href="account.php?id=<?php echo $row["ID"]?>"><?php echo $row["Ten"]?></a></h3><?php			}
			
        ?> 
		</div>
								
								<div class="price"><?php echo $row["Gia"] ?>.000 VNĐ</div>
							</div>
						</div>
					</div>
					<?php
	}
}
				?>
				</div>
				</div>
				<?php

