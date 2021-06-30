<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Shopping</title>
    <!-- Include General Css -->
    <?php include 'include/head-js.php'; ?>
    <!-- link css -->
    <!-- <link rel="stylesheet" href="../css/index.css"> -->
</head>


<body style="overflow-x: hidden;">
    <div align="center">
        <div class="row">
            <div class="col-6 m-auto">
                <form action="<?php echo $helper->url("iniciar", "sesion"); ?>" method="post">
                    <div class="row">
                        <div class="col-12 my-3">
                            <h2>Login</h2>
                        </div>
                        <div class="col-12">
                            <label for="">Nickname</label>
                            <input class="form-control" type="text" name="correo" id="nickname" required>
                        </div>
                        <div class="col-12">
                            <label for="">Nickname</label>
                            <input class="form-control" type="password" name="contrasena" placeholder="password" required>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</body>


<script src="js/login.js"></script>

</html>