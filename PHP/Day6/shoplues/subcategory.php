<?php
	require "frontendheader.php";
	require 'db_connect.php';

	$subcategory_id = $_GET['id'];

	//subcategory
	$sql = "SELECT subcategories.*,categories.name as cname
			FROM subcategories
			LEFT JOIN categories
			ON subcategories.category_id = categories.id
			WHERE subcategories.id=:value1";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1',$subcategory_id);
	$stmt->execute();
	$subcategory = $stmt->fetch(PDO::FETCH_ASSOC);

	$subcategory_name = $subcategory['name'];
	$category_id = $subcategory['category_id'];
	$category_name = $subcategory['cname'];

	//=================================

	//subcategories
	$sql = "SELECT * FROM subcategories WHERE category_id=:value3 ORDER BY id DESC";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value3',$category_id);
	$stmt->execute();
	$subcategories = $stmt->fetchALL();
	//var_dump($subcategories);die();

	//=============================================
	//items
	$sql = "SELECT * FROM items WHERE subcategory_id=:value2 ORDER BY id DESC";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value2',$subcategory_id);
	$stmt->execute();
	$items = $stmt->fetchALL();
?>
<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"><?= $subcategory_name ?></h1>
  		</div>
	</div>

	<!-- Content -->
	<div class="container">

		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb ">
		  	<ol class="breadcrumb bg-transparent">
		    	<li class="breadcrumb-item">
		    		<a href="index.php" class="text-decoration-none secondarycolor"> Home </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> Category </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> <?= $category_name; ?> </a>
		    	</li>
		    	<li class="breadcrumb-item active" aria-current="page">
					<?= $subcategory_name; ?>
		    	</li>
		  	</ol>
		</nav>

		<div class="row mt-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<ul class="list-group">
				<?php
				foreach ($subcategories as $subcategory) {
					$sid = $subcategory['id'];
					$sname = $subcategory['name'];
				 ?>
				  	<li class="list-group-item <?php if($sid==$subcategory_id) echo "active" ?>" > 
				  		<a href="subcategory.php?id=<?= $sid; ?>" class="text-decoration-none secondarycolor"><?php echo $sname; ?>
				  		</a>
				  	</li>
				  	<?php } ?>
				</ul>
			</div>	


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

				<div class="row">
					<?php 
						foreach ($items as $item) {
							$i_id = $item['id'];
		                	$i_photo = $item['photo'];
		                	$i_name = $item['name'];
		                	$i_price = $item['price'];
		                	$i_discount=$item['discount'];
		                	$i_codeno = $item['codeno'];
						
					?>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<div class="card pad15 mb-3">
						  	<img src="<?= $i_photo; ?>" class="card-img-top" alt="...">
						  	
						  	<div class="card-body text-center">
						    	<h5 class="card-title text-truncate"><?= $i_name; ?> </h5>
						    	
						    	<p class="item-price">
						    		<?php if($i_discount){ ?>
		                        		<strike><?php echo $i_price; ?> Ks </strike> 
		                        		<span class="d-block"><?php echo $i_discount; ?> Ks</span>
		                        	<?php }else{ ?>
		                        		<span class="d-block"><?php echo $i_price; ?> Ks</span>
		                       	 	<?php } ?>
		                        </p>

		                        <div class="star-rating">
									<ul class="list-inline">
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
										<li class="list-inline-item"><i class='bx bxs-star-half'></i></li>
									</ul>
								</div>

								<a href="#" class="addtocartBtn text-decoration-none" data-id='<?= $i_id ?>' data-name='<?= $i_name ?>'  data-photo= '<?= $i_photo ?>' data-codeno='<?= $i_codeno ?>' data-price='<?= $i_price ?>' data-discount='<?= $i_discount ?>' >Add to Cart</a>
						  	</div>
						  
						</div>

					</div>
					<?php } ?>
				</div>
			</div>

			<div class="star-rating">
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-end">
					    <li class="page-item disabled">
					      	<a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="icofont-rounded-left"></i>
					      	</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">1</a>
					    </li>
					    <li class="page-item active">
					    	<a class="page-link" href="#">2</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">3</a>
					    </li>
					    <li class="page-item">
					      	<a class="page-link" href="#">
					      		<i class="icofont-rounded-right"></i>
					      	</a>
					    </li>
					</ul>
				</nav>
			</div>
		</div>	
	</div>

<?php
	require 'frontendfooter.php';
?>