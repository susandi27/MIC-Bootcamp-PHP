<?php
    require 'db_connect.php';
    require ('backendheader.php');
    $sql = "SELECT items.*,subcategories.id as cid,subcategories.name as cname, 
            brands.id as bid, brands.name as bname
            FROM items INNER JOIN subcategories 
            ON items.subcategory_id=subcategories.id
            INNER JOIN brands ON items.brand_id=brands.id
            ORDER BY id DESC";

    $stmt = $conn->prepare($sql);
    
    $stmt->execute();

    $items = $stmt->fetchAll();


    //var_dump($subcategories);
?>
<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Item </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
    <a href="item_new.php" class="btn btn-outline-primary">
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
                                <th>Code No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Description</th>
                                <th>Sub Category</th>
                                <th>Brand</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                            foreach ($items as $item) {
                            $id=$item['id'];
                            $codeno = $item['codeno'];
                            $name = $item['name'];
                            $price = $item['price'];
                            $discount = $item['discount'];
                            $description = $item['description'];
                            $cid= $item['subcategory_id'];
                            $bid = $item['brand_id'];
                            $cname=$item['cname'];
                            $bname = $item['bname'];

                        ?>
                            <tr>
                                <td> <?= $i++; ?> </td>
                                <td> <?= $codeno; ?>  </td>
                                <td> <?= $name; ?></td>
                                <td> <?= $price; ?> </td>
                                <td><?= $discount; ?></td>
                                <td><?= $description; ?></td>
                                <td><?= $cname; ?></td>
                                <td><?= $bname; ?></td>
                               <td>
                                    <a href="item_edit.php?id=<?= $id; ?>" class="btn btn-warning">
                                        <i class="icofont-ui-settings"></i>
                                    </a>

                                    <a href="item_delete.php?id=<?= $id; ?>" class="btn btn-outline-danger">
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