<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Inventory</title>
    <!-- Include General Css -->
    <?php include 'include/head-js.php'; ?>
    <!-- link css -->
</head>
<?php include 'include/navbar.php'; ?>

<body style="overflow-x: hidden;">
    <div align="center">
        <div class="col-12">
            <h4 class="subtit ">My Inventory </h4>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Lot</th>
                    <th scope="col">Name</th>
                    <th scope="col">Qty.</th>
                    <th scope="col">Price</th>
                    <th scope="col">Expiration</th>


                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($result)) {
                    foreach ($result as $product) { ?>
                        <tr>
                            <th scope="row"><?php echo $product->id; ?></th>
                            <td><?php echo $product->lot; ?></td>
                            <td><?php echo $product->name; ?></td>
                            <td><?php echo $product->quantity; ?></td>
                            <td><?php echo $product->price; ?></td>
                            <td><?php echo $product->expiration; ?></td>

                        </tr>
                <?php }
                }
                ?>

            </tbody>
        </table>


    </div>
</body>


<script src="js/my-products.js"></script>

</html>