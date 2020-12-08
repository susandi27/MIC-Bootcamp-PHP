<?php
	require 'db_connect.php';
	require ('backendheader.php');

    date_default_timezone_set("Asia/Rangoon");
    $todaydate = date("Y-m-d");

    $orderStatus = "Order";
    $deleteStatus = "confirm";
    $deleteStatus = "Delete";

    //pending
	$sql = "SELECT * FROM orders WHERE orderdate=:value1 
    AND status = :value2 
    ORDER BY id DESC";

	$stmt = $conn->prepare($sql);
    $stmt->bindParam(':value1',$orderdate);
    $stmt ->bindParam(':value2',$orderStatus);
	$stmt->execute();
	$pending_orders = $stmt->fetchAll();

    //confirm
    $sql = "SELECT * FROM orders WHERE orderdate=:value1 
    AND status = :value2 
    ORDER BY id DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value1',$orderdate);
    $stmt ->bindParam(':value2',$confirmStatus);
    $stmt->execute();
    $confirm_orders = $stmt->fetchAll();

    //cancel
    $sql = "SELECT * FROM orders WHERE orderdate=:value1 
    AND status = :value2 
    ORDER BY id DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value1',$orderdate);
    $stmt ->bindParam(':value2',$deleteStatus);
    $stmt->execute();
    $cancel_orders = $stmt->fetchAll();

	//var_dump($orders);
?>
<div class="app-title">
    <div>
    	<h1> <i class="icofont-list"></i> Order </h1>
    </div>
   	<ul class="app-breadcrumb breadcrumb side">
    <a href="category_new.php" class="btn btn-outline-primary">
        <i class="icofont-plus"></i>
    </a>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="col-sm-10">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-pending-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-pending" aria-selected="true">Order - Pending</a>

                                        <a class="nav-link" id="nav-confirm-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-confirm" aria-selected="false">Order - Confirm</a>

                                        <a class="nav-link" id="nav-cancel-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-cancel" aria-selected="false">Order - Cancel</a>
                                    </div>
                                </nav>
                                
                            </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach ($pending_orders as $pending_order) {
                                    $pending_id = $pending_order['id'];
                                    $pending_voucherno = $pending_order['voucherno'];
                                    $pending_total = $pending_order['total'];
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $pending_voucherno; ?></td>
                                <td><?= $pending_total; ?></td>
                                <td>
                                    <a href ="" class="btn btn-outline-info">
                                        <i class="icofont-info"></i>
                                    </a>

                                    <a href ="orderstatus_change.php?id=<?= $pending_id ?>&status=0" class="btn btn-outline-success">
                                        <i class="icofont-check"></i>
                                    </a>

                                    <a href ="" class="btn btn-outline-danger">
                                        <i class="icofont-close"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
	require 'backendfooter.php';
?>