<?php
    require 'db_connect.php';
    require ('backendheader.php');
    $sql = "SELECT * FROM brands ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();

    $brands = $stmt->fetchAll();


    //var_dump($categories);
?>
<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Brand </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
    <a href="brand_new.php" class="btn btn-outline-primary">
        <i class="icofont-plus"></i>
    </a>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                            foreach ($brands as $brand) {
                            $cid = $brand['id'];
                            $name = $brand['name'];
                        ?>
                            <tr>
                                <td> <?= $i++; ?> </td>
                                <td> <?= $name; ?>  </td>
                                <td>
                                    <a href="" class="btn btn-warning">
                                        <i class="icofont-ui-settings"></i>
                                    </a>

                                    <a href="" class="btn btn-outline-danger">
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