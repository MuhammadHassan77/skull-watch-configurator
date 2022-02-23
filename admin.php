<?php
require_once("./admin_func.php");

// echo "<script>console.log.log({$_SESSION["admin_id"]},{$_SESSION["admin_email"]})</script>";
// echo $_SESSION["admin_id"] . "<br>" . $_SESSION["admin_email"];
// exit;

if (isset($_SESSION["admin_id"]) && isset($_SESSION["admin_email"])) {

?>

    <!DOCTYPE html>
    <html lang="en">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.84.0">
        <title>MAN WITH NO NAME</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">



        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Favicons -->
        <link rel="icon" href="./img/favicon.png" sizes="16x16" type="image/png">
        <link rel="icon" href="./img/favicon.png">
        <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <meta name="theme-color" content="#7952b3">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            .img-responsive {
                height: auto;
                display: block;
                max-width: 100%;
                position: absolute;
                padding: 0;
                margin: 0 auto;
            }

            .list-group-item {
                cursor: pointer;
                border: none;
            }

            div.overflow-auto::-webkit-scrollbar {
                display: none !important;
            }

            .close {
                position: absolute;
                right: 6%;
                top: 20%;
                z-index: 100;
                font-size: 2em;
                cursor: pointer;
                display: none;
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="./css/dashboard.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/72a9c1090f.js" crossorigin="anonymous"></script>

    </head>

    <body class="text-muted">

        <header class="navbar sticky-top bg-light flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 p-0 text-center text-dark bg-white fa-2x" href="">
                MWNN
                <!-- <img class="img-fluid" src="./img/logo.png" style="width: 100%;height:60px;" alt=""> -->
            </a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <button type="button" class="btn btn-outline-dark px-3 me-2 logoutBtn" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active navigator" aria-current="page" href="#dash-tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home" aria-hidden="true">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navigator" href="#order-tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart" aria-hidden="true">
                                        <circle cx="9" cy="21" r="1"></circle>
                                        <circle cx="20" cy="21" r="1"></circle>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                    </svg>
                                    Orders
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link navigator" href="#addWatch-tab">
                                    <i class="far fa-clock"></i>
                                    Add Watch
                                </a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link navigator" href="#daimond-tab">
                                    <i class="fa fa-cog text-muted feather"></i>
                                    Daimond Bezel
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link navigator" href="#bezel-tab">
                                    <i class="fa fa-cog text-muted feather"></i>
                                    Bezel
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navigator" href="#case-tab">
                                    <i class="fa fa-cog text-muted feather"></i>
                                    Case
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navigator" href="#face-tab">
                                    <i class="fa fa-cog text-muted feather"></i>
                                    Face
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navigator" href="#lumi-tab">
                                    <i class="fa fa-cog text-muted feather"></i>
                                    Hand Lumi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navigator" href="#tip-tab">
                                    <i class="fa fa-cog text-muted feather"></i>
                                    Hand Tip
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link navigator" href="#hour-tab">
                                    <i class="fa fa-cog text-muted feather"></i>
                                    Hour Hand
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navigator" href="#min-tab">
                                    <i class="fa fa-cog text-muted feather"></i>
                                    Minute Hand
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link navigator" href="#hands-tab">
                                    <i class="fa fa-cog text-muted feather"></i>
                                    Hands
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navigator" href="#second-hand-tab">
                                    <i class="fa fa-cog text-muted feather"></i>
                                    Second Hand
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navigator" href="#skull-tab">
                                    <i class="fa fa-cog text-muted feather"></i>
                                    Skull
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navigator" href="#strap-tab">
                                    <i class="fa fa-cog text-muted feather"></i>
                                    Strap
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navigator" href="#winder-tab">
                                    <i class="fa fa-cog text-muted feather"></i>
                                    Winder
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navigator" href="#upload-tab">
                                    <i class="fa fa-cloud-upload-alt text-muted feather"></i>
                                    Upload Components
                                </a>
                            </li>
                        </ul>

                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                    <div class="container-fluid tab " id="dash-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-home"></i> Dashboard</h1>
                                </div>
                                <div class="row p-5">
                                    <div class="card col-4 border-0">
                                        <div class="card-body bg-primary shadow navigator" style="border-radius:.375rem" href="#order-tab">
                                            <h5 class="card-title py-4 text-white fa-2x" role="button">
                                                <i class="fa fa-shopping-cart"></i> Orders
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- <div class="card col-4 border-0">
                                        <div class="card-body bg-success shadow navigator" style="border-radius:.375rem" href="#component-tab">
                                            <h5 class="card-title py-4 text-white fa-2x" role="button">
                                                <i class="fa fa-cog"></i> Components
                                            </h5>
                                        </div>
                                    </div> -->
                                    <div class="card col-4 border-0">
                                        <div class="card-body bg-info shadow navigator" style="border-radius:.375rem" href="#upload-tab">
                                            <h5 class="card-title py-4 text-white fa-2x" role="button">
                                                <i class="fa fa-cloud-upload-alt"></i> Upload
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- <div class="card col-4 border-0">
                                        <div class="card-body bg-success shadow navigator" style="border-radius:.375rem" href="#save-tab">
                                            <h5 class="card-title py-4 text-white fa-2x" role="button">
                                                <i class="fa fa-shopping-cart"></i> Products
                                            </h5>
                                        </div>
                                    </div> -->
                                    <!-- <div class="card col-4 border-0">
                                        <div class="card-body bg-info shadow navigator" style="border-radius:.375rem" href="#profile-tab">
                                            <h5 class="card-title py-4 text-white fa-2x" role="button">
                                                <i class="fa fa-user-edit"></i> Profile
                                            </h5>
                                        </div>
                                    </div> -->
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="container-fluid d-none tab" id="order-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-shopping-cart"></i> Orders</h1>
                                </div>

                                <table class="table table-striped table-sm" id="order_table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <!-- <th scope="col">Image</th> -->
                                            <th scope="col">Enquiry Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM orders";
                                        $result = mysqli_query($mysqli, $q);
                                        // print_r($result);
                                        $i = 1;
                                        foreach ($result as $rows) {
                                            $orderid = $rows['orderid'];
                                            $name = $rows['fullname'];
                                            $email = $rows['email'];
                                            $phone = $rows['phone'];
                                            // $image = $rows['image'];
                                            $detail = $rows['enquirydetail'];
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $phone; ?></td>
                                                <!-- <td> <img class="img-fluid" width="100" height="100" src="./img/<?php //echo $image; 
                                                                                                                        ?>" alt=""></td> -->
                                                <td><?php echo $detail; ?></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid d-none tab" id="addWatch-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 m-0 border-bottom">
                                    <h1 class="h2"><i class="far fa-clock"></i> Add Watch</h1>
                                </div>
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-center" style="height: 75vh;">
                                        <div class="col-6 d-flex justify-content-center align-items-center p-0 m-0 position-relative flex-wrap">
                                            <img id="watchStrap" src="<?php echo (!empty($strap)) ? $strap : './data/Strap/1.png'; ?>" alt="" class="img-responsive" />
                                            <img id="winder" src="<?php echo (!empty($winder)) ? $winder : './data/Winder/Black1.png'; ?>" alt="" class="img-responsive " />
                                            <img id="case" src="<?php echo (!empty($case)) ? $case : './data/Case/men/black1.png'; ?>" alt="" class="img-responsive" />
                                            <img id="face" src="<?php echo (!empty($face)) ? $face : './data/Face/1.png'; ?>" alt="" class="img-responsive" />
                                            <img id="bezel" src="<?php echo (!empty($bezel)) ? $bezel : './data/Bezel/1.png'; ?>" alt="" class="img-responsive" />
                                            <img id="skull" src="<?php echo (!empty($skull)) ? $skull : './data/Skull/skull 1.svg'; ?>" alt="" class="img-responsive" />
                                            <img id="Hands" src="<?php echo (!empty($hour)) ? $hour : './data/Hands/1.png'; ?>" alt="" class="img-responsive " />
                                            <!-- <img id="hourHand" src="<?php echo (!empty($hour)) ? $hour : './data/Hour hand/1.png'; ?>" alt="" class="img-responsive " />
                                            <img id="minHand" src="<?php echo (!empty($min)) ? $min : './data/Min hand/1.png'; ?>" alt="" class="img-responsive " /> -->
                                            <img id="handTip" src="<?php echo (!empty($tip)) ? $tip : './data/Hand tip/1.png'; ?>" alt="" class="img-responsive " />
                                            <img id="handLumi" src="<?php echo (!empty($lumi)) ? $lumi : './data/Hand lumi/1.png'; ?>" alt="" class="img-responsive " />
                                            <img id="bolt" src="./data/Bolt/bolt.png" alt="" class="img-responsive" />
                                        </div>
                                    </div>
                                    <div class="col-6 overflow-auto" style="height: 75vh;">
                                        <h3>Watch Components</h3>
                                        <span class="close">&times;</span>
                                        <ul class="list-group watch-parts" id="all-parts">
                                            <li class="list-group-item fa-lg select-part" data-part="#Bezel">Bezel</li>
                                            <li class="list-group-item fa-lg select-part" data-part="#Men-Case">Men Case</li>
                                            <li class="list-group-item fa-lg select-part" data-part="#Women-Case">Women Case</li>
                                            <li class="list-group-item fa-lg select-part" data-part="#Diamond">Diamond Bezel</li>
                                            <li class="list-group-item fa-lg select-part" data-part="#Face">Face</li>
                                            <li class="list-group-item fa-lg select-part" data-part="#Lumi">Lumi</li>
                                            <li class="list-group-item fa-lg select-part" data-part="#Tip">Tip</li>
                                            <li class="list-group-item fa-lg select-part" data-part="#Hands">Hands</li>
                                            <!-- <li class="list-group-item fa-lg select-part" data-part="#Hour">Hour Hand</li>
                                            <li class="list-group-item fa-lg select-part" data-part="#Min">Minute Hand</li> -->
                                            <li class="list-group-item fa-lg select-part" data-part="#Skull">Skull</li>
                                            <li class="list-group-item fa-lg select-part" data-part="#Strap">Strap</li>
                                            <li class="list-group-item fa-lg select-part" data-part="#Winder">Winder</li>
                                        </ul>
                                        <ul class="list-group watch-parts d-none" id="Bezel">
                                            <?php // getDynamicComponent("bezel", "bezel"); 
                                            ?>
                                        </ul>
                                        <ul class="list-group watch-parts d-none" id="Men-Case">
                                            <?php // getDynamicComponent("watchcase", "case"); 
                                            ?>
                                        </ul>
                                        <ul class="list-group watch-parts d-none" id="Women-Case">
                                            <?php // getDynamicComponent("watchcase", "case"); 
                                            ?>
                                        </ul>
                                        <ul class="list-group watch-parts d-none" id="Diamond">
                                            <?php // getDynamicComponent("daimond_bezel", "bezel"); 
                                            ?>
                                        </ul>
                                        <ul class="list-group watch-parts d-none" id="Face">
                                            <?php // getDynamicComponent("face", "face"); 
                                            ?>
                                        </ul>
                                        <ul class="list-group watch-parts d-none" id="Lumi">
                                            <?php // getDynamicComponent("lumi", "handLumi"); 
                                            ?>
                                        </ul>
                                        <ul class="list-group watch-parts d-none" id="Tip">
                                            <?php // getDynamicComponent("tip", "handTip"); 
                                            ?>
                                        </ul>
                                        <ul class="list-group watch-parts d-none" id="Hands">
                                            <?php // getDynamicComponent("tip", "handTip"); 
                                            ?>
                                        </ul>
                                        <!-- <ul class="list-group watch-parts d-none" id="Hour">
                                            <?php // getDynamicComponent("hour", "hourHand"); 
                                            ?>
                                        </ul>
                                        <ul class="list-group watch-parts d-none" id="Min">
                                            <?php // getDynamicComponent("minute", "minHand"); 
                                            ?>
                                        </ul> -->
                                        <ul class="list-group watch-parts d-none" id="Skull">
                                            <?php // getDynamicComponent("skull", "skull"); 
                                            ?>
                                        </ul>
                                        <ul class="list-group watch-parts d-none" id="Strap">
                                            <?php // getDynamicComponent("strap", "watchStrap"); 
                                            ?>
                                        </ul>
                                        <ul class="list-group watch-parts d-none" id="Winder">
                                            <?php // getDynamicComponent("winder", "winder"); 
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid d-none tab" id="bezel-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-cog"></i> Bezel</h1>
                                </div>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Component Name</th>
                                            <!-- <th scope="col">Url</th> -->
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM bezel";
                                        $result = mysqli_query($mysqli, $q);
                                        // print_r($result);
                                        $i = 1;
                                        foreach ($result as $rows) {
                                            $com_id = $rows['id'];
                                            $name = $rows['name'];
                                            $image = $url = $rows['url'];
                                        ?>
                                            <tr>
                                                <!-- <input type="hidden" id="<?php //echo $com_id; 
                                                                                ?>"> -->
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <!-- <td><?php //echo $url; 
                                                            ?></td> -->
                                                <td> <img class="img-fluid" style="width:50px;height:70px;margin:-1px 0px;" src="<?php echo $image; ?>" alt=""></td>
                                                <td><i class="fa fa-pencil text-muted edit-com" role="button" data-bs-toggle="modal" data-bs-target="#editModal" table-name="bezel" com-id="<?php echo $com_id; ?>" com-name="<?php echo $name; ?>" com-url="<?php echo $url; ?>"></i></td>
                                                <td><i class="fa fa-trash-alt  text-danger delete-com" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" table-name="bezel" com-id="<?php echo $com_id; ?>"></i></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="container-fluid d-none tab" id="case-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-cog"></i> Men And Women Case</h1>
                                </div>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Component Name</th>
                                            <!-- <th scope="col">Url</th> -->
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM watchcase";
                                        $result = mysqli_query($mysqli, $q);
                                        // print_r($result);
                                        $i = 1;
                                        foreach ($result as $rows) {
                                            $com_id = $rows['id'];
                                            $name = $rows['name'];
                                            $image = $url = $rows['url'];
                                        ?>
                                            <tr>
                                                <!-- <input type="hidden" id="<?php //echo $com_id; 
                                                                                ?>"> -->
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <!-- <td><?php //echo $url; 
                                                            ?></td> -->
                                                <td> <img class="img-fluid" style="width:50px;height:70px;margin:-1px 0px;" src="<?php echo $image; ?>" alt=""></td>
                                                <td><i class="fa fa-pencil text-muted edit-com" role="button" data-bs-toggle="modal" data-bs-target="#editModal" table-name="watchcase" com-id="<?php echo $com_id; ?>" com-name="<?php echo $name; ?>" com-url="<?php echo $url; ?>"></i></td>
                                                <td><i class="fa fa-trash-alt  text-danger delete-com" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" table-name="watchcase" com-id="<?php echo $com_id; ?>"></i></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="container-fluid d-none tab" id="daimond-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-cog"></i> Daimond Bezel</h1>
                                </div>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Component Name</th>
                                            <!-- <th scope="col">Url</th> -->
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM daimond_bezel";
                                        $result = mysqli_query($mysqli, $q);
                                        // print_r($result);
                                        $i = 1;
                                        foreach ($result as $rows) {
                                            $com_id = $rows['id'];
                                            $name = $rows['name'];
                                            $image = $url = $rows['url'];
                                        ?>
                                            <tr>
                                                <!-- <input type="hidden" id="<?php //echo $com_id; 
                                                                                ?>"> -->
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <!-- <td><?php //echo $url; 
                                                            ?></td> -->
                                                <td> <img class="img-fluid" style="width:50px;height:70px;margin:-1px 0px;" src="<?php echo $image; ?>" alt=""></td>
                                                <td><i class="fa fa-pencil text-muted edit-com" role="button" data-bs-toggle="modal" data-bs-target="#editModal" table-name="daimond_bezel" com-id="<?php echo $com_id; ?>" com-name="<?php echo $name; ?>" com-url="<?php echo $url; ?>"></i></td>
                                                <td><i class="fa fa-trash-alt  text-danger delete-com" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" table-name="daimond_bezel" com-id="<?php echo $com_id; ?>"></i></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="container-fluid d-none tab" id="face-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-cog"></i> Face</h1>
                                </div>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Component Name</th>
                                            <!-- <th scope="col">Url</th> -->
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM face";
                                        $result = mysqli_query($mysqli, $q);
                                        // print_r($result);
                                        $i = 1;
                                        foreach ($result as $rows) {
                                            $com_id = $rows['id'];
                                            $name = $rows['name'];
                                            $image = $url = $rows['url'];
                                        ?>
                                            <tr>
                                                <!-- <input type="hidden" id="<?php //echo $com_id; 
                                                                                ?>"> -->
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <!-- <td><?php //echo $url; 
                                                            ?></td> -->
                                                <td> <img class="img-fluid" style="width:50px;height:70px;margin:-1px 0px;" src="<?php echo $image; ?>" alt=""></td>
                                                <td><i class="fa fa-pencil text-muted edit-com" role="button" data-bs-toggle="modal" data-bs-target="#editModal" table-name="face" com-id="<?php echo $com_id; ?>" com-name="<?php echo $name; ?>" com-url="<?php echo $url; ?>"></i></td>
                                                <td><i class="fa fa-trash-alt  text-danger delete-com" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" table-name="face" com-id="<?php echo $com_id; ?>"></i></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="container-fluid d-none tab" id="lumi-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-cog"></i> Hand Lumi</h1>
                                </div>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Component Name</th>
                                            <!-- <th scope="col">Url</th> -->
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM lumi";
                                        $result = mysqli_query($mysqli, $q);
                                        // print_r($result);
                                        $i = 1;
                                        foreach ($result as $rows) {
                                            $com_id = $rows['id'];
                                            $name = $rows['name'];
                                            $image = $url = $rows['url'];
                                        ?>
                                            <tr>
                                                <!-- <input type="hidden" id="<?php //echo $com_id; 
                                                                                ?>"> -->
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <!-- <td><?php //echo $url; 
                                                            ?></td> -->
                                                <td> <img class="img-fluid" style="width:50px;height:70px;margin:-1px 0px;" src="<?php echo $image; ?>" alt=""></td>
                                                <td><i class="fa fa-pencil text-muted edit-com" role="button" data-bs-toggle="modal" data-bs-target="#editModal" table-name="lumi" com-id="<?php echo $com_id; ?>" com-name="<?php echo $name; ?>" com-url="<?php echo $url; ?>"></i></td>
                                                <td><i class="fa fa-trash-alt  text-danger delete-com" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" table-name="lumi" com-id="<?php echo $com_id; ?>"></i></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="container-fluid d-none tab" id="tip-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-cog"></i> Hand Tip</h1>
                                </div>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Component Name</th>
                                            <!-- <th scope="col">Url</th> -->
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM tip";
                                        $result = mysqli_query($mysqli, $q);
                                        // print_r($result);
                                        $i = 1;
                                        foreach ($result as $rows) {
                                            $com_id = $rows['id'];
                                            $name = $rows['name'];
                                            $image = $url = $rows['url'];
                                        ?>
                                            <tr>
                                                <!-- <input type="hidden" id="<?php //echo $com_id; 
                                                                                ?>"> -->
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <!-- <td><?php //echo $url; 
                                                            ?></td> -->
                                                <td> <img class="img-fluid" style="width:50px;height:70px;margin:-1px 0px;" src="<?php echo $image; ?>" alt=""></td>
                                                <td><i class="fa fa-pencil text-muted edit-com" role="button" data-bs-toggle="modal" data-bs-target="#editModal" table-name="tip" com-id="<?php echo $com_id; ?>" com-name="<?php echo $name; ?>" com-url="<?php echo $url; ?>"></i></td>
                                                <td><i class="fa fa-trash-alt  text-danger delete-com" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" table-name="tip" com-id="<?php echo $com_id; ?>"></i></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="container-fluid d-none tab" id="hands-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-cog"></i> Hands</h1>
                                </div>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Component Name</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM hands";
                                        $result = mysqli_query($mysqli, $q);
                                        $i = 1;
                                        foreach ($result as $rows) {
                                            $com_id = $rows['id'];
                                            $name = $rows['name'];
                                            $image = $url = $rows['url'];
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td> <img class="img-fluid" style="width:50px;height:70px;margin:-1px 0px;" src="<?php echo $image; ?>" alt=""></td>
                                                <td><i class="fa fa-pencil text-muted edit-com" role="button" data-bs-toggle="modal" data-bs-target="#editModal" table-name="hands" com-id="<?php echo $com_id; ?>" com-name="<?php echo $name; ?>" com-url="<?php echo $url; ?>"></i></td>
                                                <td><i class="fa fa-trash-alt  text-danger delete-com" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" table-name="hands" com-id="<?php echo $com_id; ?>"></i></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="container-fluid d-none tab" id="second-hand-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-cog"></i> Second Hand</h1>
                                </div>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Component Name</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM second_hand";
                                        $result = mysqli_query($mysqli, $q);
                                        $i = 1;
                                        foreach ($result as $rows) {
                                            $com_id = $rows['id'];
                                            $name = $rows['name'];
                                            $image = $url = $rows['url'];
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td> <img class="img-fluid" style="width:50px;height:70px;margin:-1px 0px;" src="<?php echo $image; ?>" alt=""></td>
                                                <td><i class="fa fa-pencil text-muted edit-com" role="button" data-bs-toggle="modal" data-bs-target="#editModal" table-name="second_hand" com-id="<?php echo $com_id; ?>" com-name="<?php echo $name; ?>" com-url="<?php echo $url; ?>"></i></td>
                                                <td><i class="fa fa-trash-alt  text-danger delete-com" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" table-name="second_hand" com-id="<?php echo $com_id; ?>"></i></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <!-- <div class="container-fluid d-none tab" id="hour-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-cog"></i> Hour Hand</h1>
                                </div>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Component Name</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM hour";
                                        $result = mysqli_query($mysqli, $q);
                                        $i = 1;
                                        foreach ($result as $rows) {
                                            $com_id = $rows['id'];
                                            $name = $rows['name'];
                                            $image = $url = $rows['url'];
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td> <img class="img-fluid" style="width:50px;height:70px;margin:-1px 0px;" src="<?php echo $image; ?>" alt=""></td>
                                                <td><i class="fa fa-pencil text-muted edit-com" role="button" data-bs-toggle="modal" data-bs-target="#editModal" table-name="hour" com-id="<?php echo $com_id; ?>" com-name="<?php echo $name; ?>" com-url="<?php echo $url; ?>"></i></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="container-fluid d-none tab" id="min-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-cog"></i> Minute Hand</h1>
                                </div>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Component Name</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM minute";
                                        $result = mysqli_query($mysqli, $q);
                                        $i = 1;
                                        foreach ($result as $rows) {
                                            $com_id = $rows['id'];
                                            $name = $rows['name'];
                                            $image = $url = $rows['url'];
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td> <img class="img-fluid" style="width:50px;height:70px;margin:-1px 0px;" src="<?php echo $image; ?>" alt=""></td>
                                                <td><i class="fa fa-pencil text-muted edit-com" role="button" data-bs-toggle="modal" data-bs-target="#editModal" table-name="minute" com-id="<?php echo $com_id; ?>" com-name="<?php echo $name; ?>" com-url="<?php echo $url; ?>"></i></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> -->

                    <div class="container-fluid d-none tab" id="skull-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-cog"></i> Skull</h1>
                                </div>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Component Name</th>
                                            <!-- <th scope="col">Url</th> -->
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM skull";
                                        $result = mysqli_query($mysqli, $q);
                                        // print_r($result);
                                        $i = 1;
                                        foreach ($result as $rows) {
                                            $com_id = $rows['id'];
                                            $name = $rows['name'];
                                            $image = $url = $rows['url'];
                                        ?>
                                            <tr>
                                                <!-- <input type="hidden" id="<?php //echo $com_id; 
                                                                                ?>"> -->
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <!-- <td><?php //echo $url; 
                                                            ?></td> -->
                                                <td> <img class="img-fluid" style="width:50px;height:70px;margin:-1px 0px;" src="<?php echo $image; ?>" alt=""></td>
                                                <td><i class="fa fa-pencil text-muted edit-com" role="button" data-bs-toggle="modal" data-bs-target="#editModal" table-name="skull" com-id="<?php echo $com_id; ?>" com-name="<?php echo $name; ?>" com-url="<?php echo $url; ?>"></i></td>
                                                <td><i class="fa fa-trash-alt  text-danger delete-com" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" table-name="skull" com-id="<?php echo $com_id; ?>"></i></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="container-fluid d-none tab" id="strap-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-cog"></i> Strap</h1>
                                </div>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Component Name</th>
                                            <!-- <th scope="col">Url</th> -->
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM strap";
                                        $result = mysqli_query($mysqli, $q);
                                        // print_r($result);
                                        $i = 1;
                                        foreach ($result as $rows) {
                                            $com_id = $rows['id'];
                                            $name = $rows['name'];
                                            $image = $url = $rows['url'];
                                        ?>
                                            <tr>
                                                <!-- <input type="hidden" id="<?php //echo $com_id; 
                                                                                ?>"> -->
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <!-- <td><?php //echo $url; 
                                                            ?></td> -->
                                                <td> <img class="img-fluid" style="width:50px;height:70px;margin:-1px 0px;" src="<?php echo $image; ?>" alt=""></td>
                                                <td><i class="fa fa-pencil text-muted edit-com" role="button" data-bs-toggle="modal" data-bs-target="#editModal" table-name="strap" com-id="<?php echo $com_id; ?>" com-name="<?php echo $name; ?>" com-url="<?php echo $url; ?>"></i></td>
                                                <td><i class="fa fa-trash-alt  text-danger delete-com" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" table-name="strap" com-id="<?php echo $com_id; ?>"></i></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="container-fluid d-none tab" id="winder-tab">
                        <div class="row m-2">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                    <h1 class="h2"><i class="fa fa-cog"></i> Winder</h1>
                                </div>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Component Name</th>
                                            <!-- <th scope="col">Url</th> -->
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = "SELECT * FROM winder";
                                        $result = mysqli_query($mysqli, $q);
                                        // print_r($result);
                                        $i = 1;
                                        foreach ($result as $rows) {
                                            $com_id = $rows['id'];
                                            $name = $rows['name'];
                                            $image = $url = $rows['url'];
                                        ?>
                                            <tr>
                                                <!-- <input type="hidden" id="<?php //echo $com_id; 
                                                                                ?>"> -->
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <!-- <td><?php //echo $url; 
                                                            ?></td> -->
                                                <td> <img class="img-fluid" style="width:50px;height:70px;margin:-1px 0px;" src="<?php echo $image; ?>" alt=""></td>
                                                <td><i class="fa fa-pencil text-muted edit-com" role="button" data-bs-toggle="modal" data-bs-target="#editModal" table-name="winder" com-id="<?php echo $com_id; ?>" com-name="<?php echo $name; ?>" com-url="<?php echo $url; ?>"></i></td>
                                                <td><i class="fa fa-trash-alt text-danger delete-com" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" table-name="winder" com-id="<?php echo $com_id; ?>"></i></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="container-fluid tab d-none" id="upload-tab">
                        <div class="row m-2">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1 class="h2"><i class="fa fa-cloud-upload-alt"></i> Upload</h1>
                                <!-- <div class="btn-toolbar mb-2 mb-md-0 ">
                                    <div class="btn-group me-2">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                                    </div>
                                </div> -->
                            </div>

                            <h2>Upload Watch Components</h2>
                            <!-- Bezel -->
                            <form class="p-2" action="./admin.php" id="bezelForm" method="post" enctype="multipart/form-data">
                                <div id="bezelNotify">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <label for="uploadBezel" class="form-label">Upload Bezel</label>
                                        <input class="form-control" type="file" id="uploadBezel" name="Bezel">
                                        <div class="form-text">Upload only PNG images.</div>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label">Select Watch</label>
                                        <select class="form-select" name="watch">
                                            <option value="" selected>Select Watch</option>
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT * FROM watches");
                                            foreach ($res as $rows) {
                                                $watchId = $rows['id'];
                                                $watchName = $rows['name'];
                                            ?>
                                                <option value="<?php echo $watchId; ?>"><?php echo $watchName; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label slctColor" style="cursor:pointer">Select Color</label> /
                                        <label class="form-label addColor" style="cursor:pointer">Add Color</label>
                                        <select class="form-select" name="color">
                                            <option value="" selected>Select color</option>
                                            <!-- <option value="new">Add New</option> -->
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT DISTINCT(color) FROM watchcase");
                                            foreach ($res as $rows) {
                                                $color = $rows['color'];
                                            ?>
                                                <option value="<?php echo $color; ?>" style="background-color:<?= $color; ?>">
                                                    <?= $color; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <input class="form-control d-none" type="color" name="newColor" placeholder="Enter Hex code">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary" id="addBezel"><i class="fa fa-plus mx-2"></i> Add Bezel</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Case FOR MEN-->
                            <form class="p-2" action="./admin.php" id="menCaseForm" method="post" enctype="multipart/form-data">
                                <div id="menCaseNotify">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <label for="uploadMenCase" class="form-label">Upload Men Case</label>
                                        <input class="form-control" type="file" id="uploadMenCase" name="MenCase">
                                        <div class="form-text">Upload only PNG images.</div>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label">Select Watch</label>
                                        <select class="form-select" name="watch">
                                            <option value="" selected>Select Watch</option>
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT * FROM watches");
                                            foreach ($res as $rows) {
                                                $watchId = $rows['id'];
                                                $watchName = $rows['name'];
                                            ?>
                                                <option value="<?php echo $watchId; ?>"><?php echo $watchName; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label slctColor" style="cursor:pointer">Select Color</label> /
                                        <label class="form-label addColor" style="cursor:pointer">Add Color</label>
                                        <select class="form-select" name="color">
                                            <option value="" selected>Select color</option>
                                            <!-- <option value="new">Add New</option> -->
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT DISTINCT(color) FROM watchcase");
                                            foreach ($res as $rows) {
                                                $color = $rows['color'];
                                            ?>
                                                <option value="<?php echo $color; ?>" style="background-color:<?= $color; ?>">
                                                    <?= $color; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <input class="form-control d-none" type="color" name="newColor" placeholder="Enter Hex code">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary" id="addMenCase"><i class="fa fa-plus mx-2"></i> Add Men Case</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Case FOR WOMEN-->
                            <form class="p-2" action="./admin.php" id="womenCaseForm" method="post" enctype="multipart/form-data">
                                <div id="womenCaseNotify">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <label for="uploadWomenCase" class="form-label">Upload Women Case</label>
                                        <input class="form-control" type="file" id="uploadWomenCase" name="WomenCase">
                                        <div class="form-text">Upload only PNG images.</div>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label">Select Watch</label>
                                        <select class="form-select" name="watch">
                                            <option value="" selected>Select Watch</option>
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT * FROM watches");
                                            foreach ($res as $rows) {
                                                $watchId = $rows['id'];
                                                $watchName = $rows['name'];
                                            ?>
                                                <option value="<?php echo $watchId; ?>"><?php echo $watchName; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label slctColor" style="cursor:pointer">Select Color</label> /
                                        <label class="form-label addColor" style="cursor:pointer">Add Color</label>
                                        <select class="form-select" name="color">
                                            <option value="" selected>Select color</option>
                                            <!-- <option value="new">Add New</option> -->
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT DISTINCT(color) FROM watchcase");
                                            foreach ($res as $rows) {
                                                $color = $rows['color'];
                                            ?>
                                                <option value="<?php echo $color; ?>" style="background-color:<?= $color; ?>">
                                                    <?= $color; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <input class="form-control d-none" type="color" name="newColor" placeholder="Enter Hex code">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary" id="addWomenCase"><i class="fa fa-plus mx-2"></i> Add Wonen Case</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Daimond Bezel -->
                            <form class="d-none p-2" action="./admin.php" id="daimondBezelForm" method="post" enctype="multipart/form-data">
                                <div id="daimondBezelNotify">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <label for="uploadDaimondBezel" class="form-label">Upload Daimond Bezel</label>
                                        <input class="form-control" type="file" id="uploadDaimondBezel" name="DaimondBezel">
                                        <div class="form-text">Upload only PNG images.</div>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label">Select Watch</label>
                                        <select class="form-select" name="watch">
                                            <option value="" selected>Select Watch</option>
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT * FROM watches");
                                            foreach ($res as $rows) {
                                                $watchId = $rows['id'];
                                                $watchName = $rows['name'];
                                            ?>
                                                <option value="<?php echo $watchId; ?>"><?php echo $watchName; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label slctColor" style="cursor:pointer">Select Color</label> /
                                        <label class="form-label addColor" style="cursor:pointer">Add Color</label>
                                        <select class="form-select" name="color">
                                            <option value="" selected>Select color</option>
                                            <!-- <option value="new">Add New</option> -->
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT DISTINCT(color) FROM bezel");
                                            foreach ($res as $rows) {
                                                $color = $rows['color'];
                                            ?>
                                                <option value="<?php echo $color; ?>" style="background-color:<?= $color; ?>">
                                                    <?= $color; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <input class="form-control d-none" type="color" name="newColor" placeholder="Enter Hex code">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary" id="addDiamondBezel"><i class="fa fa-plus mx-2"></i> Add Diamond Bezel</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Face -->
                            <form class="p-2" action="./admin.php" id="faceForm" method="post" enctype="multipart/form-data">
                                <div id="faceNotify">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <label for="uploadFace" class="form-label">Upload Face</label>
                                        <input class="form-control" type="file" id="uploadFace" name="Face">
                                        <div class="form-text">Upload only PNG images.</div>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label">Select Watch</label>
                                        <select class="form-select" name="watch">
                                            <option value="" selected>Select Watch</option>
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT * FROM watches");
                                            foreach ($res as $rows) {
                                                $watchId = $rows['id'];
                                                $watchName = $rows['name'];
                                            ?>
                                                <option value="<?php echo $watchId; ?>"><?php echo $watchName; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label slctColor" style="cursor:pointer">Select Color</label> /
                                        <label class="form-label addColor" style="cursor:pointer">Add Color</label>
                                        <select class="form-select" name="color">
                                            <option value="" selected>Select color</option>
                                            <!-- <option value="new">Add New</option> -->
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT DISTINCT(color) FROM face");
                                            foreach ($res as $rows) {
                                                $color = $rows['color'];
                                            ?>
                                                <option value="<?php echo $color; ?>" style="background-color:<?= $color; ?>">
                                                    <?= $color; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <input class="form-control d-none" type="color" name="newColor" placeholder="Enter Hex code">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary" id="addFace"><i class="fa fa-plus mx-2"></i> Add Face</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Hand Lumi -->
                            <form class="p-2" action="./admin.php" id="lumiForm" method="post" enctype="multipart/form-data">
                                <div id="lumiNotify">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <label for="uploadLumi" class="form-label">Upload Hand Lumi</label>
                                        <input class="form-control" type="file" id="uploadLumi" name="Lumi">
                                        <div class="form-text">Upload only PNG images.</div>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label">Select Style</label>
                                        <select class="form-select" name="style">
                                            <option value="" selected>Select Style</option>
                                            <option value="new">Add New</option>
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT DISTINCT(style_id) FROM lumi");
                                            foreach ($res as $rows) {
                                                $style_id = $rows['style_id'];
                                            ?>
                                                <option value="<?php echo $style_id; ?>"><?php echo $style_id; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label slctColor" style="cursor:pointer">Select Color</label> /
                                        <label class="form-label addColor" style="cursor:pointer">Add Color</label>
                                        <select class="form-select" name="color">
                                            <option value="" selected>Select color</option>
                                            <!-- <option value="new">Add New</option> -->
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT DISTINCT(color) FROM lumi");
                                            foreach ($res as $rows) {
                                                $color = $rows['color'];
                                            ?>
                                                <option value="<?php echo $color; ?>" style="background-color:<?= $color; ?>">
                                                    <?= $color; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <input class="form-control d-none" type="color" name="newColor" placeholder="Enter Hex code">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary" id="addLumi"><i class="fa fa-plus mx-2"></i> Add Lumi</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Hand Tip -->
                            <form class="p-2" action="./admin.php" id="tipForm" method="post" enctype="multipart/form-data">
                                <div id="tipNotify">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <label for="uploadTip" class="form-label">Upload Hand Tip</label>
                                        <input class="form-control" type="file" id="uploadTip" name="Tip">
                                        <div class="form-text">Upload only PNG images.</div>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label">Select Watch</label>
                                        <select class="form-select" name="watch">
                                            <option value="" selected>Select Watch</option>
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT * FROM watches");
                                            foreach ($res as $rows) {
                                                $watchId = $rows['id'];
                                                $watchName = $rows['name'];
                                            ?>
                                                <option value="<?php echo $watchId; ?>"><?php echo $watchName; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label slctColor" style="cursor:pointer">Select Color</label> /
                                        <label class="form-label addColor" style="cursor:pointer">Add Color</label>
                                        <select class="form-select" name="color">
                                            <option value="" selected>Select color</option>
                                            <!-- <option value="new">Add New</option> -->
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT DISTINCT(color) FROM tip");
                                            foreach ($res as $rows) {
                                                $color = $rows['color'];
                                            ?>
                                                <option value="<?php echo $color; ?>" style="background-color:<?= $color; ?>">
                                                    <?= $color; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <input class="form-control d-none" type="color" name="newColor" placeholder="Enter Hex code">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary" id="addTip"><i class="fa fa-plus mx-2"></i> Add Tip</button>
                                    </div>
                                </div>
                            </form>

                            <!--  Both Hands -->
                            <form class="p-2" action="./admin.php" id="handsForm" method="post" enctype="multipart/form-data">
                                <div id="handsNotify">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <!-- <div class="mb-3"> -->
                                        <label for="uploadHands" class="form-label">Upload Hands</label>
                                        <input class="form-control" type="file" id="uploadHands" name="Hands">
                                        <div class="form-text">Upload only PNG images.</div>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label">Select Style</label>
                                        <select class="form-select" name="style">
                                            <option value="" selected>Select Style</option>
                                            <option value="new">Add New</option>
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT DISTINCT style_id FROM hands");
                                            foreach ($res as $rows) {
                                                $style_id = $rows['style_id'];
                                                // $watchName = $rows['name'];
                                            ?>
                                                <option value="<?php echo $style_id; ?>"><?php echo $style_id; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label slctColor" style="cursor:pointer">Select Color</label> /
                                        <label class="form-label addColor" style="cursor:pointer">Add Color</label>
                                        <select class="form-select" name="color">
                                            <option value="" selected>Select color</option>
                                            <!-- <option value="new">Add New</option> -->
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT DISTINCT(color) FROM second_hand");
                                            foreach ($res as $rows) {
                                                $color = $rows['color'];
                                            ?>
                                                <option value="<?php echo $color; ?>" style="background-color:<?= $color; ?>">
                                                    <?= $color; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <input class="form-control d-none" type="color" name="newColor" placeholder="Enter Hex code">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary" id="addHands"><i class="fa fa-plus mx-2"></i> Add Hands</button>
                                    </div>
                                </div>
                            </form>

                            <!--  Second Hand -->
                            <form class="p-2" action="./admin.php" id="secondHandForm" method="post" enctype="multipart/form-data">
                                <div id="secondHandNotify">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <!-- <div class="mb-3"> -->
                                        <label for="uploadSecondHand" class="form-label">Upload Second Hand</label>
                                        <input class="form-control" type="file" id="uploadSecondHand" name="SecondHand">
                                        <div class="form-text">Upload only PNG images.</div>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label">Select Style</label>
                                        <select class="form-select" name="style">
                                            <option value="" selected>Select Style</option>
                                            <option value="new">Add New</option>
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT DISTINCT style_id FROM second_hand");
                                            foreach ($res as $rows) {
                                                $style_id = $rows['style_id'];
                                            ?>
                                                <option value="<?php echo $style_id; ?>"><?php echo $style_id; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label slctColor" style="cursor:pointer">Select Color</label> /
                                        <label class="form-label addColor" style="cursor:pointer">Add Color</label>
                                        <select class="form-select" name="color">
                                            <option value="" selected>Select color</option>
                                            <!-- <option value="new">Add New</option> -->
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT DISTINCT(color) FROM second_hand");
                                            foreach ($res as $rows) {
                                                $color = $rows['color'];
                                            ?>
                                                <option value="<?php echo $color; ?>" style="background-color:<?= $color; ?>">
                                                    <?= $color; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <input class="form-control d-none" type="color" name="newColor" placeholder="Enter Hex code">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary" id="addSecondHand"><i class="fa fa-plus mx-2"></i> Add Hands</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Hour Hand -->
                            <!-- <form class="p-2" action="./admin.php" id="hourForm" method="post" enctype="multipart/form-data">
                                <div id="hourNotify">
                                </div>
                                <div class="mb-3">
                                    <label for="uploadHour" class="form-label">Upload Hour Hand</label>
                                    <input class="form-control" type="file" id="uploadHour" name="Hour">
                                    <div class="form-text">Upload only PNG images.</div>
                                </div>
                                </form> -->

                            <!-- Minute Hand -->
                            <!-- <form class="p-2" action="./admin.php" id="minForm" method="post" enctype="multipart/form-data">
                                <div id="minNotify">
                                </div>
                                <div class="mb-3">
                                    <label for="uploadMin" class="form-label">Upload Minute Hand</label>
                                    <input class="form-control" type="file" id="uploadMin" name="Min">
                                    <div class="form-text">Upload only PNG images.</div>
                                </div>
                                </form> -->



                            <!-- Strap -->
                            <form class="p-2" action="./admin.php" id="strapForm" method="post" enctype="multipart/form-data">
                                <div id="strapNotify">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <label for="uploadStrap" class="form-label">Upload Strap</label>
                                        <input class="form-control" type="file" id="uploadStrap" name="Strap">
                                        <div class="form-text">Upload only PNG images.</div>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label">Select Watch</label>
                                        <select class="form-select" name="watch">
                                            <option value="" selected>Select Watch</option>
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT * FROM watches");
                                            foreach ($res as $rows) {
                                                $watchId = $rows['id'];
                                                $watchName = $rows['name'];
                                            ?>
                                                <option value="<?php echo $watchId; ?>"><?php echo $watchName; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label slctColor" style="cursor:pointer">Select Color</label> /
                                        <label class="form-label addColor" style="cursor:pointer">Add Color</label>
                                        <select class="form-select" name="color">
                                            <option value="" selected>Select color</option>
                                            <!-- <option value="new">Add New</option> -->
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT DISTINCT(color) FROM strap");
                                            foreach ($res as $rows) {
                                                $color = $rows['color'];
                                            ?>
                                                <option value="<?php echo $color; ?>" style="background-color:<?= $color; ?>">
                                                    <?= $color; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <input class="form-control d-none" type="color" name="newColor" placeholder="Enter Hex code">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary" id="addStrap"><i class="fa fa-plus mx-2"></i> Add Strap</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Winder -->
                            <form class="p-2" action="./admin.php" id="winderForm" method="post" enctype="multipart/form-data">
                                <div id="winderNotify">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <label for="uploadWinder" class="form-label">Upload Winder</label>
                                        <input class="form-control" type="file" id="uploadWinder" name="Winder">
                                        <div class="form-text">Upload only PNG images.</div>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label">Select Watch</label>
                                        <select class="form-select" name="watch">
                                            <option value="" selected>Select Watch</option>
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT * FROM watches");
                                            foreach ($res as $rows) {
                                                $watchId = $rows['id'];
                                                $watchName = $rows['name'];
                                            ?>
                                                <option value="<?php echo $watchId; ?>"><?php echo $watchName; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label class="form-label slctColor" style="cursor:pointer">Select Color</label> /
                                        <label class="form-label addColor" style="cursor:pointer">Add Color</label>
                                        <select class="form-select" name="color">
                                            <option value="" selected>Select color</option>
                                            <!-- <option value="new">Add New</option> -->
                                            <?php
                                            $res = mysqli_query($mysqli, "SELECT DISTINCT(color) FROM winder");
                                            foreach ($res as $rows) {
                                                $color = $rows['color'];
                                            ?>
                                                <option value="<?php echo $color; ?>" style="background-color:<?= $color; ?>">
                                                    <?= $color; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <input class="form-control d-none" type="color" name="newColor" placeholder="Enter Hex code">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary" id="addWinder"><i class="fa fa-plus mx-2"></i> Add Winder</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Skull -->
                            <form class="p-2" action="./admin.php" id="skullForm" method="post" enctype="multipart/form-data">
                                <div id="skullNotify">
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="uploadSkull" class="form-label">Upload Skull</label>
                                        <input class="form-control" type="file" id="uploadSkull" name="Skull">
                                        <div class="form-text">Upload only PNG/SVG images.</div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary" id="addSkull"><i class="fa fa-plus mx-2"></i> Add Skull</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- hidden fields -->
        <input type="hidden" id="currentEmail" value="<?php echo (!empty($_SESSION['admin_email'])) ? $_SESSION['admin_email'] : ""; ?>">
        <!-- hidden fields -->

        <!-- edit component Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Component</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="editNotify"></div>
                        <div class="mb-3">
                            <input type="hidden" id="com-id">
                            <input type="hidden" id="table-name">
                            <label for="com-name" class="form-label">Component Name</label>
                            <input type="text" class="form-control" id="com-name">
                        </div>
                        <div class="">
                            <label for="com-img" class="form-label">Component Image</label>
                            <img class="img-fluid" id="com-img" style="height:300px !important;margin:-13px 0px" src="" alt="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary saveChangesBtn">Save changes</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit component Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Component</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="deleteNotify"></div>
                        <h5 class="modal-title">Are You Sure?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary deleteComponent" table-name="" com-id="">Delete Component</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Log out Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <h4 class="modal-title text-success">Logout Successsfully!!</h4>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="./js/upload.js"></script>

        <!-- <script src="./js/dashboard.js"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script> -->


    </body>
    <script>
        $(document).ready(function() {

            $(document).on("click", ".select-part", function() {
                $(".close").show();
                $(".watch-parts").addClass("d-none");
                $($(this).data("part")).removeClass("d-none");
            })

            $(document).on("click", ".close", function() {
                $(this).hide();
                $(".watch-parts").addClass("d-none");
                $("#all-parts").removeClass("d-none");
            })

            // adding data in modal for editing
            $(document).on("click", ".edit-com", function() {
                let id = $(this).attr('com-id');
                let name = $(this).attr('com-name');
                let url = $(this).attr('com-url');
                let table_name = $(this).attr('table-name');
                $("#com-id").val(id);
                $("#com-name").val(name);
                $("#com-img").attr("src", url);
                $("#table-name").val(table_name);
                // console.log(id, name, url, table_name);
            })

            // adding data in modal for editing
            $(document).on("click", ".delete-com", function() {
                let id = $(this).attr('com-id');
                let table_name = $(this).attr('table-name');
                $(".deleteComponent").attr("com-id", id);
                $(".deleteComponent").attr("table-name", table_name);
                // console.log(id, table_name);
            })

            $(document).on('click', '.deleteComponent', function() {
                let com_id = $(this).attr('com-id');
                let table_name = $(this).attr('table-name');
                // console.log(com_id, table_name);
                $.ajax({
                    type: "POST",
                    url: "./admin_func.php",
                    data: `act=deleteComponent&componentId=${com_id}&table=${table_name}`,
                    success: (res) => {
                        console.log(res);
                        if (res == "success") {
                            $(".deleteNotify").html(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Component Deleted Successfully!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            `);
                        }
                        $('.deleteComponent').attr('com-id', '');
                        $('.deleteComponent').attr('table-name', '');
                    },
                    error: (err) => {
                        $(".deleteNotify").html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Something Went Wrong!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                        $('.deleteComponent').attr('com-id', '');
                        $('.deleteComponent').attr('table-name', '');
                        console.log(err);
                    }
                })
            })


            // handling savechanges btn
            $(".saveChangesBtn").click(function() {
                let edit_id = $("#com-id").val();
                let edit_name = $("#com-name").val();
                let table_name = $("#table-name").val();
                if (edit_id == "" || edit_name == "" || table_name == "") {
                    $(".editNotify").html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Component Name Required!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    `);
                } else {
                    let dataString = `act=updateComponent&com_id=${edit_id}&com_name=${edit_name}&table_name=${table_name}`;
                    // console.log(dataString);
                    $.ajax({
                        url: "./admin_func.php",
                        method: "POST",
                        data: dataString,
                        caches: false,
                        success: (res) => {
                            // console.log(res);
                            if (res == "success") {
                                $(".editNotify").html(`
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Component Updated Successfully!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                `);
                                $("#com-id").val('');
                                $("#com-name").val('');
                            }
                        },
                        error: (err) => {
                            console.log(err);
                        }
                    })
                }
            })

            // handling logout button
            $(document).on("click", ".logoutBtn", function() {
                let dataString = `act=adminlogout`;
                $.ajax({
                    url: "./admin_func.php",
                    method: "POST",
                    data: dataString,
                    caches: false,
                    success: (res) => {
                        if (res == "success") {
                            setTimeout(function() {
                                window.location.href = "./login.php";
                            }, 1000)
                        }
                    },
                    error: (err) => {
                        console.log(err);
                    }
                })
            })

            $('table').DataTable();

        });
    </script>

    </html>
<?php
} else {
    echo "<script>window.location.href='./login.php'</script>";
}
?>