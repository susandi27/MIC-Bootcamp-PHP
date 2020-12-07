<?php
    require 'db_connect.php';
    require 'backendheader.php';

    $sql = "SELECT * FROM subcategories ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $subcategories = $stmt->fetchAll();


    $sql1 = "SELECT * FROM brands ORDER BY id DESC";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
    $brands = $stmt1->fetchAll();
?>

<div class="app-title">
    <div>
         <h1> <i class="icofont-list"></i> Item Form </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <a href="item_list.php" class="btn btn-outline-primary">
            <i class="icofont-double-left"></i>
        </a>
    </ul>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <form action="item_add.php" method="POST" enctype="multipart/form-data">                   
                        
                    <div class="form-group row">
                        <label for="name_id" class="col-sm-2 col-form-label"> Code No </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="codeno_id" name="codeno">
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_id" name="name">
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="photo_id" class="col-sm-2 col-form-label"> Price </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="price_id" name="price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="photo_id" class="col-sm-2 col-form-label"> Discount </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="discount_id" name="discount">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="photo_id" class="col-sm-2 col-form-label"> Description </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description_id" name="description">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="photo_id" class="col-sm-2 col-form-label"> Sub-Category </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="subcategoryid">
                                <?php
                                foreach ($subcategories as $subcategory) {
                                    $id =$subcategory['id'];
                                    $name=$subcategory['name'];
                                
                                ?>
                                <option value="<?= $id; ?>">
                                    <?= $name; ?>
                                </option>

                                <?php } ?>
                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="photo_id" class="col-sm-2 col-form-label"> Brand </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="brandid">
                                <?php
                                foreach ($brands as $brand) {
                                    $id =$brand['id'];
                                    $name=$brand['name'];
                                
                                ?>
                                <option value="<?= $id; ?>">
                                    <?= $name; ?>
                                </option>

                                <?php } ?>
                                
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                        <div class="col-sm-10">
                            <input type="file" id="photo_id" name="photo">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">
                                <i class="icofont-save"></i>
                                    Save
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php
    require "backendfooter.php";
?>