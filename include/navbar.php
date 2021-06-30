<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
    <a class="navbar-brand" href="index.php">Tomatoes</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if ($_SESSION['rol'] == 2) {  ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo $helper->url("iniciar", "deliver"); ?>">Deliver product</a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $helper->url("iniciar", "shopping"); ?>">My Shopping</a>
            </li>
            <?php if ($_SESSION['rol'] == 2) {  ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $helper->url("iniciar", "sales"); ?>">My Sales</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $helper->url("iniciar", "inventory"); ?>">My Inventory</a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $helper->url("usuarios", "cerrarSesion"); ?>">Logout</a>
            </li>
            <!-- 
            <li class=" nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li> -->
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
</nav>