<?php
	require 'backendheader.php';
	require 'db_connect.php';

	

	date_default_timezone_set("Asia/Rangoon");
    $todaydate = date('Y-m-d');

    $sql = "SELECT orders.*, users.*
		FROM orders INNER JOIN users
		ON orders.user_id=users.id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value1',$orderid);
	$stmt->execute();
	$orders = $stmt->fetchall();


?>
	
    <div class="app-title">
        <div>
         	<h1><i class="fa fa-file-text-o"></i> Invoice</h1>
          	<!-- <p>A Printable Invoice Format</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb">
          	<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          	<li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ul>
    </div>
     <div class="row">
        <div class="col-md-12">
          	<div class="tile">
            	<section class="invoice">
             	 	<div class="row mb-4">
                	<div class="col-6">
                  		<h2 class="page-header"><i class="fa fa-globe"></i> Shoplues Online Shop</h2>
                	</div>
                	<div class="col-6">
                  		<h5 class="text-right">Date: <?= $todaydate; ?></h5>
                	</div>
            </div>
            <div class="row invoice-info">
                <div class="col-12">
                	<p></p>
                </div>
            </div>
             
             <div class="row">
                <div class="col-12 table-responsive">
                  	<table class="table table-striped">
                    	<thead>
                      		<tr>
		                        <th>#</th>
		                        <th>Customer Name</th>
		                        <th>Address</th>
		                        <th>Order Date</th>
		                        <th>Voucherno</th>
		                        <th>Total</th>
	                      	</tr>
                    	</thead>
                   		<tbody>
                   			<?php
                   				$j=1;
                   				foreach ($orders as $order) {
                   					$id = $order['id'];
                   					$orderdate = $order['orderdate'];
                   					$name = $order['name'];
                   					$address= $order['address'];
                   					$voucherno = $order['voucherno'];
                   					$total = $order['total'];
                   				
                   			?>
			                    <tr>
			                        <td><?php echo $j++ ?></td>
			                        <td><?php echo $name; ?></td>
			                        <td><?php echo $address; ?></td>
			                        <td><?php echo $orderdate; ?></td>
			                        <td><?php echo $voucherno; ?></td>
			                        <td><?php echo $total; ?></td>
			                    </tr>
		                <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
              </div>
            </section>
          </div>
        </div>
      </div>
    
<?php
	require 'backendfooter.php';
?>