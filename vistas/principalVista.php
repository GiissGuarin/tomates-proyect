<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Store</title>
    <!-- Include General Css -->
    <?php include 'include/head-js.php'; ?>
    <!-- link css -->
    <link rel="stylesheet" href="css/index.css">
</head>
<?php include 'include/navbar.php'; ?>

<body style="overflow-x: hidden;">
    <?php

    ?>
    <div align="center">
        <a id="redirect" href="<?php echo $helper->url("iniciar", "shopping"); ?>"></a>
        <div class="row">
            <div class="col-8 m-auto">
                <div class="col-12">
                    <h4 class="subtit ">Promotions </h4>
                </div>

                <div class="row row-content  list_favoritos_user_product">
                    <?php
                    if (isset($result)) {
                        foreach ($result as $product) { ?>
                            <div class="col-4  my-3">
                                <div class="card" style="width: 80%;">
                                    <img class="card-img-top" src="<?php echo $product->photo; ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $product->name; ?></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><?php echo $product->price; ?></li>
                                        <li class="list-group-item">
                                            <label for="input-quantity">Qty.</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button id="minus_" class="btn btn-outline-secondary btn_less" onclick="minus(<?php echo $product->id; ?>)" type="button">-</button>
                                                </div>
                                                <input type="number" value="1" class="form-control input_quantity_<?php echo $product->id; ?>" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary btn_more" onclick="more(<?php echo $product->id; ?>)" type="button">+</button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="#" onclick="addToCart('<?php echo $product->name; ?>',<?php echo $product->id; ?>, <?php echo $product->price; ?>,<?php echo $product->uid_owner; ?>,
                                                                                                                                                                    <?php echo $_SESSION['idUsuario'] ?>)" class="card-link">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    }
                    ?>
                </div>

            </div>
            <div class="col-4">
                <form action="<?php echo $helper->url("iniciar", "sesion"); ?>" method="post" id="dataForm">
                    <div class="card" style="width: 20rem;position: sticky;position: -webkit-sticky; top: 0;"">
                        <div class=" card-body">
                        <h5 class="card-title">Shopping Cart</h5>
                    </div>



                    <ul class="list-group list-group-flush group_list_cart">
                        <!-- <li class="list-group-item" style="display:flex">
                            <p class="m-auto">Audifonos</p>
                            <p class="m-auto">2</p>
                        </li>
                        <li class="list-group-item" style="display:flex">
                            <p class="m-auto">Audifonos</p>
                            <p class="m-auto">2</p>
                        </li> -->

                    </ul>
                    <p> Total</p>
                    <p class="total_price_cart"> 0</p>

                    <div class="card-body">
                        <a onclick="payCart()" id="pay_cart" class="btn btn-primary">Buy it</a>
                    </div>

            </div>
            </form>
        </div>
    </div>


    </div>
</body>


<script src="js/principal.js"></script>

</html>