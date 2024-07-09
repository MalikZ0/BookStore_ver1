<?php
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/')+1 );  // get the current page name
?>
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="../index.php"
            target="_blank">
            <img src="assets/img/rocket-white.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">EComm</span>
        </a>
    </div>


    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">


            <li class="nav-item">
                <a class="nav-link text-white <?= $page == 'index.php' ? "bg-gradient-primary active":""?>" href="../admin/index.php">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>

                    <span class="nav-link-text ms-1 ">Dashboard</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white <?= $page == 'addCategory.php' ? "bg-gradient-primary active":""?>" href="../admin/addCategory.php">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">add</i>
                    </div>

                    <span class="nav-link-text ms-1">Add Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == 'category.php' ? "bg-gradient-primary active":""?>" href="../admin/category.php">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>

                    <span class="nav-link-text ms-1">View Category</span>
                </a>
            </li>

            
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == 'addProducts.php' ? "bg-gradient-primary active":""?>" href="../admin/addProducts.php">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">add</i>
                    </div>

                    <span class="nav-link-text ms-1">Add Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == 'products.php' ? "bg-gradient-primary active":""?>" href="../admin/products.php">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>

                    <span class="nav-link-text ms-1">View Products</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white <?= $page == 'orders.php' ? "bg-gradient-primary active":""?>" href="orders.php">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>

                    <span class="nav-link-text ms-1">Orders</span>
                </a>
            </li>


            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= $page == 'profile.php' ? "bg-gradient-primary active":""?>" href="../functions/profile.php">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>

                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white <?= $page == 'logout.php' ? "bg-gradient-primary active":""?>" href="../user/logout.php">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>

                    <span class="nav-link-text ms-1">Sign Out</span>
                </a>
            </li>


        </ul>
    </div>

    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary w-100" href="#" type="button">Upgrade to pro</a>
        </div>

    </div>

</aside>