<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product update</title>
    <!-- Include General Css -->
    <?php include 'include/head-js.php'; ?>
    <!-- link css -->
</head>
<?php include 'include/navbar.php'; ?>

<body style="overflow-x: hidden;">
    <div align="center">
        <div class="col-12">
            <h4 class="subtit ">Deliver product </h4>
        </div>
        <div class="row">
            <div class="col-10 m-auto">
                <form action="<?php echo $helper->url("iniciar", "crearProducto"); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6 form-group">
                            <label for="exampleFormControlSelect1">Name of product</label>
                            <input type="text" class="form-control product_select" placeholder="Name of product" name="name_product">
                        </div>
                        <div class="col-6">
                            <label>Quantity</label>
                            <input type="number" class="form-control product_cant" placeholder="Quantity" name="quantity_product">
                        </div>
                        <div class="col-6">
                            <label>Lot number</label>
                            <input type="number" class="form-control product_lot_num" placeholder="Lot number" name="lot_product">
                        </div>
                        <div class="col-6">
                            <label>Expiration date</label>

                            <input class="form-control product_expiration" type="date" name="expiration_product" id="">
                        </div>
                        <div class="col-6">
                            <label>Price</label>
                            <input type="number" class="form-control product_price" placeholder="Price" name="price_product">
                        </div>
                        <div class="col-6">
                            <label>Cover photo</label>
                            <input type="file" class="form-control product_photo" name="photo_product">
                        </div>

                    </div>
                    <button class="btn btn-primary btn_update_product my-3" type="submit">Create product</button>
                </form>

            </div>
        </div>

    </div>
</body>


<script src="js/product-create.js"></script>

</html>