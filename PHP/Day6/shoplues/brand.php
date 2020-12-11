<?php
	require "frontendheader.php";
	require 'db_connect.php';

	$brandid = $_GET['id'];

	$sql = "SELECT * FROM brands WHERE id=:value2 ORDER BY id DESC";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value2',$brandid);
	$stmt->execute();
	$brands = $stmt->fetch(PDO::FETCH_ASSOC);

	$brand_name=$brands['name'];

	//===============================================

	//items 
	$sql = "SELECT items.*,brands.id, brands.name as bname 
			FROM brands  INNER JOIN items 
			ON brands.id = items.brand_id
			WHERE brands.id=:value2";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value2',$brandid);
	$stmt->execute();
	$items = $stmt->fetch(PDO::FETCH_ASSOC);

	//var_dump($items);
	/*$item_name=$items['name'];
	echo $item_name;die();*/

?>
	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> <?= $brand_name; ?> </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container mt-5">


		<div class="row mt-5">
            <div class="col">
                <div class="bbb_viewed_title_container">
                    <h3 class="bbb_viewed_title"> Brand Category Name  </h3>
                    <div class="bbb_viewed_nav_container">
                        <div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
                        <div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
                    </div>
                </div>
                <div class="bbb_viewed_slider_container">
                    <div class="owl-carousel owl-theme bbb_viewed_slider">
					    <div class="owl-item">
					    	<?php 
									foreach ($items as $item) {
										$i_id = $item['id'];
					                	$i_photo = $item['photo'];
					                	$i_name = $item['name'];
					                	$i_price = $item['price'];
					                	$i_discount=$item['discount'];
					                	$i_codeno = $item['codeno'];
					                	//echo $i_name;die();
										
								?>

					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					        	
					            <div class="pad15">
					        		<img src="<?= $i_photo; ?>" class="img-fluid">
					            	<p class="text-truncate"><?= $i_name; ?></p>
					            	<p class="item-price">
					            	<?php if($i_discount){ ?>
		                        		<strike><?php $i_price; ?> Ks </strike> 
		                        		<span class="d-block"><?php $i_discount; ?> Ks</span>
		                        	<?php }else{ ?>
		                        		<span class="d-block"><?php $i_price; ?> Ks</span>
		                       	 	<?php } ?>
		                       	 	</p>


					                <div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
										</ul>
									</div>

									<a href="shoppingcart.php" class="addtocartBtn text-decoration-none">Add to Cart</a>
					        	</div>
					        
					        </div>
					        <?php } ?>
					    </div>

					</div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="bbb_viewed_title_container">
                    <h3 class="bbb_viewed_title"> <?php $brand_name ?>  </h3>
                    <div class="bbb_viewed_nav_container">
                        <div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
                        <div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
                    </div>
                </div>
                <div class="bbb_viewed_slider_container">
                    <div class="owl-carousel owl-theme bbb_viewed_slider">
					    <div class="owl-item">
					    	<?php 
									foreach ($items as $item) {
										$i_id = $item['id'];
					                	$i_photo = $item['photo'];
					                	$i_name = $item['name'];
					                	$i_price = $item['price'];
					                	$i_discount=$item['discount'];
					                	$i_codeno = $item['codeno'];
					                	//echo $i_name;die();
										
								?>

					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					        		<img src="image/item/saisai_one.jpg" class="img-fluid">
					            	<p class="text-truncate"><?php $i_name ?></p>
					            	<p class="item-price">
					            		<?php if($i_discount){ ?>
		                        		<strike><?php $i_price; ?> Ks </strike> 
		                        		<span class="d-block"><?php $i_discount; ?> Ks</span>
		                        	<?php }else{ ?>
		                        		<span class="d-block"><?php $i_price; ?> Ks</span>
		                       	 	<?php } ?>
					            	</p>

					                <div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
										</ul>
									</div>

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>
					        	</div>
					        </div>
					    <?php } ?>
					    </div>

					    
					

					</div>
                </div>
            </div>
        </div>

	</div>
	

<?php
	require "frontendfooter.php";
?>