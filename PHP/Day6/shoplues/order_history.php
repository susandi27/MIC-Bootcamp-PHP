<?php
	require 'frontendheader.php';
	require 'db_connect.php';

	$userid = $_SESSION['login_user']['id'];

	$sql = "SELECT * FROM orders WHERE user_id =:value1 ORDER BY orderdate DESC";
	$stmt = $conn->prepare($sql);
	$stmt -> bindparam(':value1',$userid);
	$stmt->execute();

	$orders =$stmt->fetchAll();
?>
	<div class="jumbotorn jumbotorn-fluid subtitle">
		<div class="container p-3">
			<h1 class="text-center text-white">Your Order History</h1>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<?php
				foreach($orders as $order){
					$id = $order['id'];
					$orderdate = $order['orderdate'];
					$voucherno = $order['voucherno'];
					$total = $order['total'];
					$note = $order['note'];
					$status = $order['status'];
			?>
			<div class="col-lg-4 col-md-6 col-sm-12 col-12 p-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title"><?= $voucherno ?></h5>
						<h6 class="card-subtitle mb-2 text-muted"><?= $orderdate?></h6>
						<p class="text-white card-text float-right">
							<?php if($status == "Order") { ?>
								<span class="badge rounded-pill bg-warning"><?= $status ?></span>
							<?php }elseif ($status=="Delete") { ?>
								<span class="badge rounded-pill bg-danger"><?= $status ?></span>
							<?php }else { ?>
							<span class="badge rounded-pill bg-success"><?= $status ?></span>
						<?php } ?>
						</p>
						<a href="#" class="card-link">Detail</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		
	</div>
<?php
	require 'frontendfooter.php';

?>