<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Shopping</title>
    <!-- Include General Css -->
    <?php include 'include/head-js.php'; ?>
    <!-- link css -->
</head>
<?php include 'include/navbar.php'; ?>

<body style="overflow-x: hidden;">
    <div align="center">

        <div class="col-12">
            <h4 class="subtit ">My Shopping </h4>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Qty.</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Expiration</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($result)) {
                    foreach ($result as $product) { ?>
                        <tr>
                            <th scope="row"><?php echo $product->id; ?></th>
                            <td><?php echo $product->name; ?></td>
                            <td><?php echo $product->quantity; ?></td>
                            <td><?php echo $product->price; ?></td>
                            <td><?php echo $product->total; ?></td>
                            <td><?php echo $product->expiration; ?></td>
                            <td>
                                <a class="btn btn-danger" onclick="Cancel(<?php echo $product->id; ?>)">Cancel</a>
                            </td>

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