<?php require_once("./func.php");

// FETCHING DATA ON BEHALF PARTICULAR ID
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $q = "SELECT * FROM savechanges WHERE id=" . $id;

    $result = mysqli_query($mysqli, $q);

    if ($result) {
        foreach ($result as $rows) {
            $watchId = $rows['watch_id'];
            $bezel = $rows['bezel'];
            $case = $rows['watchcase'];
            $face = $rows['face'];
            $lumi = $rows['lumi'];
            $tip = $rows['tip'];
            $hour = $rows['hour'];
            $min = $rows['min'];
            $sec_hands = $rows['sec_hands'];
            $skull = $rows['skull'];
            $strap = $rows['strap'];
            $winder = $rows['winder'];
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/72a9c1090f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="shortcut icon" href="./img/favicon.png">

    <!-- <link href="icons/themify-icons/themify-icons.css" rel="stylesheet"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!--<link href="https://db.onlinewebfonts.com/c/67dd7a753cce719a17304beb973d5dfc?family=Keep+Calm+W01+Light" rel="stylesheet" type="text/css" />-->

    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/custom.css" rel="stylesheet">
    <link href="scss/mystyle.css" rel="stylesheet">

    <script src="./js/svg-data.js">
    </script>
    <title>Watch</title>

</head>

<body style="overflow: hidden;">
    <!-- start-header -->
    <div id="loader" class="">
        <img class="loader-img" src="./img/loader.gif" alt="">
        <!-- <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.315px" height="122.88px" viewBox="0 0 122.315 122.88" enable-background="new 0 0 122.315 122.88" xml:space="preserve">
            <g>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M94.754,14.534c8.844,0,16.014,7.17,16.014,16.012 c0,8.844-7.17,16.015-16.014,16.015c-8.843,0-16.013-7.17-16.013-16.015C78.741,21.704,85.911,14.534,94.754,14.534L94.754,14.534z M109.265,52.121c-7.205,0-13.049,5.844-13.049,13.048c0,7.207,5.844,13.049,13.049,13.051c7.207,0,13.051-5.844,13.051-13.051 C122.315,57.965,116.472,52.121,109.265,52.121L109.265,52.121z M94.135,89.903c-5.032,0-9.114,4.082-9.114,9.113 c0,5.032,4.082,9.114,9.114,9.114c5.031,0,9.113-4.082,9.113-9.114C103.248,93.985,99.166,89.903,94.135,89.903L94.135,89.903z M59.275,104.65c-5.032,0-9.114,4.081-9.114,9.113c0,5.034,4.082,9.116,9.114,9.116s9.113-4.082,9.113-9.116 C68.389,108.731,64.308,104.65,59.275,104.65L59.275,104.65z M23.652,90.86c-4.717,0-8.54,3.823-8.54,8.54 c0,4.715,3.823,8.54,8.54,8.54c4.714,0,8.538-3.825,8.538-8.54C32.19,94.684,28.366,90.86,23.652,90.86L23.652,90.86z M9.096,54.872C4.072,54.872,0,58.944,0,63.968c0,5.021,4.072,9.093,9.096,9.093c5.021,0,9.093-4.072,9.093-9.093 C18.189,58.944,14.116,54.872,9.096,54.872L9.096,54.872z M23.652,17.026c-6.354,0-11.508,5.155-11.508,11.509 s5.154,11.506,11.508,11.506s11.506-5.152,11.506-11.506S30.006,17.026,23.652,17.026L23.652,17.026z M59.341,0 c-7.651,0-13.858,6.205-13.858,13.855c0,7.651,6.207,13.856,13.858,13.856s13.856-6.205,13.856-13.856 C73.197,6.205,66.992,0,59.341,0L59.341,0z"></path>
            </g>
        </svg> -->
    </div>
    <div class="row p-0 m-0">
        <div class="col-12 p-0 m-0">
            <div class="logo-text-1">Mwnn</div>
            <div class="myfont tabs position-relative" style="z-index: 2;">
                <span style="z-index: 1000;" class="style-1 style-box-btn stylewatch">Click to Change</span>
                <!-- <span class="d-sm-none swipe" style="z-index: 999;transform: rotate(90deg);position:absolute;right:0%;top:0%">Swipe</span> -->
            </div>
            <div class="dropdown selectCarousel" style="z-index: 999;position:absolute;right:0%;top:5%">
                <span class="d-sm-none fa-lg" id="swipeDropdown" type="button" style="transform: rotate(90deg);" data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
                    Swipe</span>
                <div class="dropdown-menu" aria-labelledby="swipeDropdown">
                    <span class="dropdown-item swipe">CASE</span>
                    <span class="dropdown-item swipe">HANDS</span>
                    <span class="dropdown-item swipe">SKULL</span>
                </div>
            </div>
            <span id="closeCarousel" style="display: none;">&times;</span>
        </div>
    </div>
    <!-- end-header -->
    <!-- start-container -->
    <div class="container-fluid p-0 m-0" style="position: absolute;top: 0;">
        <div class="canvas-div p-0 m-0">
            <div class="range-1">
                <input type="range" min="1" max="4" class="slider" id="myRange" style="display:none;">
            </div>

            <div class="my-option d-none" style="display: none;">
                <i class="fa fa-chevron-left arrow left"></i>
                <i class="fa fa-chevron-right arrow right"></i>
            </div>

            <!-- start-dot-menu -->
            <div class="dot-menu">
                <!-- <span class="dot-btn"><i class="fas fa-circle"></i></span> -->

                <div class="dropdown config-drp">
                    <a class="btn p-0 m-0 w-100" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="dot-btn">
                            <img src="img/plus2.svg" class="img-fluid">
                            <p>Configure</p>
                        </div>
                    </a>

                    <ul class="dropdown-menu dot" aria-labelledby="dropdownMenuLink">
                        <li><a style-id="1" data-watch="svg-lumi" class="dropdown-item newControlMenu" href="javascript:void(0)">Hand Lumi</a></li>
                        <li><a data-watch="svg-tip" class="dropdown-item newControlMenu" href="javascript:void(0)">Hand Tips</a></li>
                        <li><a style-id="1" data-watch="svg-hands" class="dropdown-item newControlMenu" href="javascript:void(0)">Hands</a></li>
                        <li><a data-watch="svg-case" class="dropdown-item newControlMenu" href="javascript:void(0)">Case</a></li>
                        <li><a data-watch="svg-strap" class="dropdown-item newControlMenu" href="javascript:void(0)">Straps</a></li>
                        <li class="toggleSec_hand">
                            <a style-id="1" data-watch="svg-sechand" class="dropdown-item newControlMenu" href="javascript:void(0)">Second Hand</a>
                            <ul class="secHandToggler">
                                <li data-val="on">ON</li>
                                <li data-val="off">OFF</li>
                            </ul>
                        </li>
                        <li><a data-watch="svg-skull" class="dropdown-item newControlMenu" href="javascript:void(0)">skull</a></li>
                        <li><a data-watch="svg-face" class="dropdown-item newControlMenu" href="javascript:void(0)">Face</a></li>
                        <li><a data-watch="svg-bezel" class="dropdown-item newControlMenu" href="javascript:void(0)">Bezel</a></li>
                        <li><a data-watch="svg-winder" class="dropdown-item newControlMenu" href="javascript:void(0)">Winder</a></li>
                    </ul>
                </div>

            </div>
            <!-- end-dot-menu -->


            <div class="row p-0 m-0 justify-content-center">
                <div id="myCanvas" class="col-sm-12 col-md-8 d-flex justify-content-center align-items-center">
                    <div id="desk-sx" class="col-md-6 col-sm-12 tail justify-content-center align-items-center">
                        <!-- <div id="realCanvas" class="w-100 tail justify-content-center align-items-center" style="height: 100vh;"> -->
                        <img id="watchStrap" src="<?php echo (!empty($strap)) ? $strap : './data/Strap/21.png'; ?>" alt="" class="img-responsive" />
                        <img id="winder" src="<?php echo (!empty($winder)) ? $winder : './data/Winder/Black1.png'; ?>" alt="" class="img-responsive " />
                        <img id="face" src="<?php echo (!empty($face)) ? $face : './data/Face/21.png'; ?>" alt="" class="img-responsive" />
                        <img id="bezel" src="<?php echo (!empty($bezel)) ? $bezel : './data/Bezel/21.png'; ?>" alt="" class="img-responsive" />
                        <img id="pngSkull" src="" class="img-responsive">
                        <span id="skull" class="img-responsive w-100 h-100 overflow-hidden">
                            <!-- DATA WILL BE SHOWN BY JQUERY -->
                        </span>
                        <img id="hourHand" src="<?php echo (!empty($hour)) ? $hour : './data/Hands/21.png'; ?>" alt="" class="img-responsive " />
                        <img id="minHand" src="<?php echo (!empty($min)) ? $min : './data/Hands/21.png'; ?>" alt="" class="img-responsive " />
                        <img id="handTip" src="<?php echo (!empty($tip)) ? $tip : './data/Hand tip/21.png'; ?>" alt="" class="img-responsive " />
                        <img id="handLumi" src="<?php echo (!empty($lumi)) ? $lumi : './data/Hand lumi/17.png'; ?>" alt="" class="img-responsive " />
                        <img id="bolt" src="./data/Bolt/bolt.png" alt="" class="img-responsive" />
                        <img id="secHand" src="<?php echo (!empty($sec_hands)) ? $sec_hands : './data/Second hand/21.png'; ?>" alt="" class="img-responsive " />
                        <img id="case" src="<?php echo (!empty($case)) ? $case : './data/Case/men/black1.png'; ?>" alt="" class="img-responsive" />
                        <!-- </div> -->
                        <div id="caseCarousel" class="mycarousel carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                            <div class="carousel-inner carousel-inside">
                                <?php
                                $res = mysqli_query($mysqli, "SELECT DISTINCT watch_id from watchcase");
                                foreach ($res as $rows) {
                                    $watch_id = $rows['watch_id'];
                                ?>
                                    <div class="carousel-item <?= $watch_id == 1 ? "active" : "" ?>" data-watch="<?= $watch_id; ?>">
                                        <img class="carousel-img w-100" src="./data/Case/men/black<?= $watch_id; ?>.png" alt="...">
                                    </div>
                                <?php  }
                                ?>
                            </div>
                            <button class="carousel-control-prev justify-content-start" type="button" data-bs-target="#caseCarousel" data-bs-slide="prev">
                                <i class="fa fa-arrow-left text-secondary"></i>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next justify-content-end" type="button" data-bs-target="#caseCarousel" data-bs-slide="next">
                                <i class="fa fa-arrow-right text-secondary"></i>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <div id="handsCarousel" class="mycarousel carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                            <div class="carousel-inner carousel-inside">
                                <?php
                                $arr = [1, 24, 47, 70, 93, 114, 135, 156, 177, 198, 219, 254, 277];
                                $res = mysqli_query($mysqli, "SELECT  DISTINCT style_id from hands");
                                foreach ($res as $rows) {
                                    $style_id = $rows['style_id'];
                                ?>
                                    <div class="carousel-item <?= $style_id == 1 ? "active" : "" ?>" data-hands="<?= $style_id; ?>">
                                        <img class="carousel-img w-100" src="./data/Hands/<?= $arr[--$style_id]; ?>.png" alt="...">
                                    </div>
                                <?php  }
                                ?>
                            </div>
                            <button class="carousel-control-prev justify-content-start" type="button" data-bs-target="#handsCarousel" data-bs-slide="prev">
                                <i class="fa fa-arrow-left text-secondary"></i>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next justify-content-end" type="button" data-bs-target="#handsCarousel" data-bs-slide="next">
                                <i class="fa fa-arrow-right text-secondary"></i>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <div id="skullCarousel" class="mycarousel carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                            <div class="carousel-inner carousel-inside">
                                <?php
                                $res = mysqli_query($mysqli, "SELECT * from skull");
                                foreach ($res as $rows) {
                                    $id = $rows['id'];
                                    $url = $rows['url'];
                                ?>
                                    <div class="carousel-item <?= $id == 1 ? "active" : "" ?>" data-skull="<?= $id; ?>">
                                        <img class="carousel-img w-100" src="<?= $url; ?>" alt="...">
                                    </div>
                                <?php  }
                                ?>
                                <?php
                                $count = countFiles("./data/Skull_old/");
                                $names = getFileNames("./data/Skull_old/");
                                for ($i = 0; $i < $count; $i++) {
                                    echo "<div class='carousel-item' data-skull='{$i}'>
                                            <img class='carousel-img w-100' src='./data/Skull_old/{$names[$i]}' alt='...'>
                                        </div>";
                                }
                                ?>
                            </div>
                            <button class="carousel-control-prev justify-content-start" type="button" data-bs-target="#skullCarousel" data-bs-slide="prev">
                                <i class="fa fa-arrow-left text-secondary"></i>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next justify-content-end" type="button" data-bs-target="#skullCarousel" data-bs-slide="next">
                                <i class="fa fa-arrow-right text-secondary"></i>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <!-- OVERLAYED WATCH SVG -->
                        <?php
                        if (!empty($watchId)) {
                            echo "<script>document.write(watch" . $watch_id . ")</script>";
                        } else {
                            echo
                            '<svg id="watch-svg1" class="watch-svg watch-svg1" data-watch="1" xmlns:x="http://ns.adobe.com/Extensibility/1.0/" xmlns:i="http://ns.adobe.com/AdobeIllustrator/10.0/" xmlns:graph="http://ns.adobe.com/Graphs/1.0/" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" version="1.1" x="0px" y="0px" width="722.909px" height="1103.862px" viewBox="0 0 722.909 1103.862" enable-background="new 0 0 722.909 1103.862" xml:space="preserve">
                                <g id="svg-case">
                                    <path fill="#60BB46" d="M246.333,349.332V259.5L225,243h-30l-31,127c0,0-48,145.34-48,149s25,132.501,28,137   s64.598,178.577,64.598,178.577l37.734-12L243.5,727.5c0,0,85.5,77.5,215.5,4.5v92l67-12l47-237v-69v-94l-68-139l-47-11l2,84   C460,346,343.665,297.664,246.333,349.332z" />
                                </g>
                                <g id="svg-bezel">
                                    <path fill="#67EF3A" d="M352,338.333c-112.574,0-203.833,91.259-203.833,203.833S239.426,746,352,746   s203.833-91.259,203.833-203.833S464.574,338.333,352,338.333z M352,705.166c-90.022,0-163-72.977-163-162.999s72.978-163,163-163   s163,72.978,163,163S442.022,705.166,352,705.166z" />
                                </g>
                                <g id="svg-strap">
                                    <g>
                                        <path fill="#67EF3A" d="M242.333,729.999l3.333,92.667c0,0-30,143.997-30,154.664s10.667,63.334,15,68.667s73.667,44,89,44    s83.333-11.333,93.333-12s52.001,0.666,59.334-12.667s-14.667-241.333-14.667-241.333l4.666-93.998    C462.333,729.999,342.334,800.668,242.333,729.999z" />
                                        <path fill="#67EF3A" d="M245.667,350.664c0,0,97.333-54.667,212,0l2.667-90L479,181c0,0,40-49,40-55s-15-50-15-50s-22-19-25-19    S352,45,343,45s-55-4-65,0s-58-5-63,11s-8,16-8,29s3,27,0,35s19,55,19,62s-4,4.887,0,14.943S231,217,236,221s12,41,12,41    L245.667,350.664z" />
                                    </g>
                                </g>
                                <g id="svg-winder">
                                    <rect x="572" y="497.5" fill="#67EF3A" width="53.5" height="99.5" />
                                </g>
                                <g id="svg-face">
                                    <circle fill="#67EF3A" cx="352.333" cy="541.167" r="158.833" />
                                </g>
                                <g id="svg-skull">
                                    <path fill="#67EF3A" d="M289.5,653c-7.612-18.591-3.698-44.682-20.663-57.889c-18.75-14.597-14.26-40.655-15.337-61.737   c-0.681-13.336-1.5-26.526-1.5-40.29c0-6.417-1.381-25.686,4.611-29.361c1.046-4.546,0.8-9.185,1.386-13.792   c0.994,1.396,1.708,2.94,2.116,4.587c0.62-4.024,0.646-8.094,1.377-12.104c12.34,5.068,9.938-7.544,11.462-16.018   c2.819,0.042,5.2-0.718,7.545-2.259c5.866-3.853,4.128-9.885,6.002-16.424c13.934-0.444,27.683-7.489,41.502-9.225   c13.804-1.733,28.921-4.78,42.962-2.375c10.057,1.723,23.225,1.691,31.534,7.399c4.152,2.852,8.533,6.213,12.527,9.351   c9.339,7.336,16.746,17.637,24.987,26.137c8.385,8.649,17.151,20.61,17.985,32.915c0.854,12.605,1.632,26.427,0.5,39.097   c-1.068,11.966-9.156,23.646-13.123,34.962c-4.006,11.423-5.256,23.792-7.377,35.625c-0.96,5.358-1.123,11.083-3.971,15.927   c-3.439,5.853-10.816,7.353-14.539,12.5c-2.774,3.837-2.719,9.657-3.403,14.338c-0.799,5.47-1.221,10.913-2.196,16.148   c-0.915,4.91-0.824,11.463-2.852,15.977c-2.27,5.056-7.453,7.228-9.452,12.51c-3.375,8.921-6.957,18.569-16.696,22.599   c-18.766,7.766-44.938,7.262-63.879,0.889c-17.805-5.989-33.39-25.541-33.51-44.985" />
                                </g>
                                <g id="svg-hour" style-id="1">
                                    <path fill="#67EF3A" d="M264.667,484.667c0.876,4.363,6.463,7.201,9.64,9.742c3.016,2.414,4.814,5.171,7.028,8.249   c5.366,7.461,12.99,11.67,19.247,18.099c5.621,5.776,9.318,11.123,17.053,14.577c7.861,3.51,14.129,8.594,21.049,13.332   c2.945,2.016,5.993,3.98,8.575,6.26c2.341,2.068,4.88,4.284,7.742,5.686c2.963,1.451,6.663,2.455,9.984,3.074   c3.39,0.632,9.094,2.617,12.364,0.721c3.087-1.79,2.937-6.218,5.374-8.729c2.583-2.661,4.652-3.838,3.295-8.426   c-1.813-6.125-10.854-9.343-15.766-12.492c-5.025-3.223-7.813-8.523-12.595-12.001c-5.331-3.877-11.571-7.338-17.324-10.758   c-7.363-4.376-14.758-8.297-22.016-12.619c-5.638-3.357-10.129-8.726-15.585-12.166c-4.544-2.864-9.618-4.792-14.364-6.875   c-4.713-2.068-8.938-4.926-14.042-5.681c-4.738-0.701-11.136,0.734-12.333,5.683c-1.691,6.991,6.422,2.946,5.675,8.991" />
                                </g>
                                <g id="svg-min" style-id="1">
                                    <path fill="#67EF3A" d="M315.333,546c3-1.474,4.436-5.149,6.727-7.65c2.78-3.036,7.574-5.217,11.192-7.324   c7.698-4.482,16.193-8.252,24.054-12.09c6.354-3.102,12.436-5.979,18.352-9.586c3.443-2.1,6.955-3.806,10.52-5.692   c4.638-2.455,8.254-4.968,12.841-7.231c8.23-4.06,16.743-7.432,24.723-12.167c7.241-4.296,14.057-8.84,21.26-12.936   c3.859-2.194,5.388-3.872,9.424-2.397c4.904,1.791,5.778,2.506,6.593,7.749c1.374,8.852-2.049,12.865-8.91,17.985   c-7.658,5.715-16.37,9.674-24.211,14.692c-7.625,4.88-14.64,10.874-22.319,15.833c-6.215,4.013-11.386,9.292-17.409,13.499   c-6.525,4.557-13.771,8.22-20.192,12.994c-6.168,4.584-11.095,9.218-17.701,12.749c-5.458,2.918-13.307,6.841-19.942,5.574   c-4.42-0.844-9.882-8.84-11.266-13.267c-1.115-3.567-3.525-14.431-0.399-17.4" />
                                </g>
                                <g id="svg-sechand" style-id="1">
                                    <path fill="red" d="M375.56,497.5l-28.47,22.35c0,0-10.17,12.76-10.17,13.98s-20.34,22.37-22.17,24s-28.27,13.42-29.9,16.27   c-1.63,2.85-27.25,15.05-27.25,18.31c0,3.25-24.81,13.02-26.85,23.19c-2.03,10.17-8.14,17.9,0,23.19   c8.14,5.29,17.49,4.47,19.12,3.66s16.64-15.46,16.64-15.46l27.3-16.27c0,0,11.8-16.27,13.02-17.08   c1.22-0.81,19.12-17.49,22.37-18.31c3.25-0.81,15.05-12.2,17.9-15.46c2.85-3.25,11.39-18.31,12.61-17.7s20.34-16.06,20.34-16.06   s6.82-9.76,8.29-10.98s6.35-3.28,6.76-6.11s-4.47-11.5-4.47-11.5H375.56z"/>
                                    <circle fill="red" cx="295.75" cy="589.27" r="30"/>
                                </g>
                                <g id="svg-tip">
                                    <circle fill="#67EF3A" cx="276.75" cy="485" r="10.25" />
                                    <circle fill="#67EF3A" cx="451" cy="479.25" r="10.25" />
                                </g>
                                <g id="svg-lumi" style-id="1">
                                    <path fill="#67EF3A" d="M339.25,522.625c0,0-6.599-4.418-14.539-9.808c0.1-0.592,0.164-1.196,0.164-1.817   c0-6.006-4.869-10.875-10.875-10.875c-2.03,0-3.923,0.566-5.55,1.535c-4.831-3.369-8.723-6.162-10.2-7.41   c-5.25-4.438-8.375-2.438-10.188,0s0.75,5.313,0.75,5.313s6.567,4.68,14.384,10.222c-0.044,0.399-0.072,0.804-0.072,1.215   c0,6.006,4.869,10.875,10.875,10.875c1.708,0,3.318-0.405,4.757-1.107c5.557,3.897,9.76,6.8,10.118,6.919   c1.125,0.375,5.188,6.688,10.813,3.375S339.25,522.625,339.25,522.625z" />
                                    <path fill="#67EF3A" d="M436.334,488.167c-3.166-5-11.167,1.333-11.167,1.333s-8.224,4.984-18.339,11.103   c-1.651-1.018-3.59-1.615-5.673-1.615c-5.989,0-10.845,4.855-10.845,10.845c0,0.247,0.021,0.488,0.037,0.73   c-9.658,5.829-18.092,10.901-20.181,12.104c-5.5,3.167-1.167,8-1.167,8c4.333,3.333,10-2,10-2s7.1-4.457,15.956-9.942   c1.758,1.228,3.893,1.954,6.199,1.954c5.989,0,10.845-4.855,10.845-10.845c0-0.509-0.047-1.006-0.115-1.497   c8.031-4.868,14.883-8.898,16.782-9.67C434,496.5,439.5,493.167,436.334,488.167z" />
                                </g>
                            </svg>';
                        } ?>
                        <!-- OVERLAYED WATCH SVG END -->
                    </div>
                </div>
            </div>

            <!-- OVERLAYED WATCH SVG END -->
        </div>
    </div>

    <!-- start-right-model-popup -->
    <div class="right-popup watchmodels" style="display:none;">

        <div class="cls-btn">
            <i class="fas fa-times" aria-hidden="true"></i>
        </div>

        <!-- start-dropdown -->
        <div class="dropdown mydropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Click to Select Part
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item case-btn" href="javascript:void(0)">Case</a></li>
                <li><a class="dropdown-item hands-btn" href="javascript:void(0)">Hands</a></li>
                <li><a class="dropdown-item second-hand-btn" href="javascript:void(0)">Second Hands</a></li>
            </ul>
        </div>
        <!-- end-dropdown -->

        <!-- start-arrow -->
        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>
        <!-- end-arrow -->

        <div class="overflow-div">

            <!-- start-case-style -->
            <div class="row justify-content-center case-main-div p-0 m-0 d-none">
                <?php
                $fileNames = getFileNames("./data/models/");
                $i = 0;
                $res = mysqli_query($mysqli, "SELECT * FROM watches");
                foreach ($res as $rows) {
                    $id = $rows['id'];
                    $watch_name = $rows['name'];
                    $name = $rows['name'];
                ?>
                    <div class="col-7 model-box p-0 m-0 applyCase <?php echo ($id == 1) ? 'active-model' : ''; ?>" role="button" data-watch="<?= $id; ?>">
                        <img src="./data/models/<?= $fileNames[$i] ?>" class="img-fluid">
                        <p class="model-text myfont"><?= $name; ?></p>
                    </div>
                <?php $i++;
                } ?>
            </div>
            <!-- end-case-style -->

            <div class="row justify-content-center case-main-div p-0 m-0">
                <div class="col-7 model-box p-0 m-0 applyCase" role="button" data-watch="1">
                    <img src="./data/models/model1.png" class="img-fluid">
                    <p class="model-text myfont">watch1</p>
                </div>
                <div class="col-7 model-box p-0 m-0 applyCase" role="button" data-watch="2">
                    <img src="./data/models/model2.png" class="img-fluid">
                    <p class="model-text myfont">watch2</p>
                </div>
                <div class="col-7 model-box p-0 m-0 applyCase" role="button" data-watch="3">
                    <img src="./data/models/model3.png" class="img-fluid">
                    <p class="model-text myfont">watch3</p>
                </div>
                <div class="col-7 model-box p-0 m-0 applyCase" role="button" data-watch="4">
                    <img src="./data/models/model4.png" class="img-fluid">
                    <p class="model-text myfont">watch4</p>
                </div>
                <div class="col-7 model-box p-0 m-0 applyCase" role="button" data-watch="5">
                    <img src="./data/models/model5.png" class="img-fluid">
                    <p class="model-text myfont">watch5</p>
                </div>
                <div class="col-7 model-box p-0 m-0 applyCase" role="button" data-watch="6">
                    <img src="./data/models/model6.png" class="img-fluid">
                    <p class="model-text myfont">watch6</p>
                </div>
                <div class="col-7 model-box p-0 m-0 applyCase" role="button" data-watch="7">
                    <img src="./data/models/model7.png" class="img-fluid">
                    <p class="model-text myfont">watch7</p>
                </div>
            </div>

            <!-- start-hands-style -->
            <div class="row justify-content-center p-0 m-0 hands-main-div" style="display: none;">
                <?php $res = mysqli_query($mysqli, "SELECT DISTINCT style_id FROM hands");
                $hands_style = array();
                foreach ($res as $rows) {
                    $style_id = $rows['style_id'];
                    $sql = "(SELECT url from hands where style_id=" . $rows['style_id'] . " LIMIT 1)
                    AS url" . $rows['style_id'];
                    $res = mysqli_query($mysqli, "SELECT url,$sql FROM hands LIMIT 1");
                    foreach ($res as $rows) {
                        $hands_style[] = $rows["url" . $style_id] . ",";
                ?>
                        <div class="col-11 model-box p-0 m-0 bothhands" style-id="<?= $style_id; ?>">
                            <img src="<?= str_replace(",", "", $hands_style[--$style_id]); ?>" class="img-fluid">
                            <p class="model-text myfont">Hands <?= ++$style_id; ?></p>
                        </div>
                <?php }
                } ?>
            </div>
            <!-- end-hands-style -->

            <!-- start-hands-style -->
            <div class="row justify-content-center p-0 m-0 sec-hands-div" style="display:none">
                <!-- start-toggle -->
                <label class="myswitch mySwitch3">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
                <!-- end-toggle -->
                <?php $res = mysqli_query($mysqli, "SELECT DISTINCT style_id FROM second_hand");
                $sec_hands = array();
                $i = 0;
                foreach ($res as $rows) {
                    $style_id = $rows['style_id'];
                    $sql = "(SELECT url from second_hand where style_id=" . $rows['style_id'] . " LIMIT 1)
                    AS url" . $rows['style_id'];
                    $res = mysqli_query($mysqli, "SELECT url,$sql FROM second_hand LIMIT 1");
                    foreach ($res as $rows) {
                        $sec_hands[] = $rows["url" . $style_id] . ",";
                ?>
                        <div class="col-11 model-box p-0 m-0 sechand" style-id="<?= $style_id; ?>">
                            <img src="<?= str_replace(",", "", $sec_hands[$i]); ?>" class="img-fluid">
                            <p class="model-text myfont">Second Hand <?= ++$i; ?></p>
                        </div>
                <?php }
                } ?>
                <div class="col-11 p-0 m-0">
                    <img src="" class="img-fluid">
                    <p class="model-text myfont"></p>
                </div>
            </div>
            <!-- end-hands-style -->
        </div>

    </div>
    <!-- end-right-model-popup -->

    <!-- SELECT DYNAMICS HANDS  START-->
    <?php
    $q = "SELECT DISTINCT style_id from hands";
    $res = mysqli_query($mysqli, $q);
    foreach ($res as $rows) {
        $style_id = $rows['style_id'];
    ?>
        <!-- start-hands-popup -->
        <div class="color-popup watchhands" style-id="<?= $style_id; ?>" style="display: none;">

            <div class="arrow-collapse">
                <div class="ac-inner">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </div>
            </div>

            <div class="overflow-div">
                <p class="com-name mb-0 ">Hands</p>
                <div class="row mbl-width-clr p-0 m-0">
                    <?php
                    $q = "SELECT * FROM hands WHERE style_id=$style_id";
                    $res = mysqli_query($mysqli, $q);
                    foreach ($res as $rows) {
                        $id = $rows['id'];
                        $name = $rows['name'];
                        $url = $rows['url'];
                        $color = $rows['color'];

                    ?>
                        <div class="col-1 col-sm-12 p-0 m-0" onclick="document.getElementById('hourHand').src='<?= $url ?>';document.getElementById('minHand').src='<?= $url ?>'; ">
                            <div class="color-box" style="background-color: <?php echo $color ?>"></div>
                        </div>
                    <?php }  ?>
                </div>

            </div>

        </div>
        <!-- end-hands-popup -->
    <?php } ?>
    <!-- SELECT DYNAMICS HANDS END-->

    <!-- SELECT DYNAMICS SECOND HANDS  START-->
    <?php
    $q = "SELECT DISTINCT style_id from second_hand";
    $res = mysqli_query($mysqli, $q);
    foreach ($res as $rows) {
        $style_id = $rows['style_id'];
    ?>
        <!-- start-hands-popup -->
        <div class="color-popup secondhand" style-id="<?= $style_id; ?>" style="display:none ;">

            <div class="arrow-collapse">
                <div class="ac-inner">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </div>
            </div>

            <div class="overflow-div">
                <p class="com-name mb-0 ">Second Hand</p>
                <div class="row mbl-width-clr p-0 m-0">
                    <?php
                    $q = "SELECT * FROM second_hand WHERE style_id=$style_id";
                    $res = mysqli_query($mysqli, $q);
                    foreach ($res as $rows) {
                        $id = $rows['id'];
                        $name = $rows['name'];
                        $url = $rows['url'];
                        $color = $rows['color'];
                    ?>
                        <div class="col-1 col-sm-12 p-0 m-0" onclick="document.getElementById('secHand').src='<?= $url ?>'">
                            <div class="color-box" style="background-color: <?php echo $color ?>"></div>
                        </div>
                    <?php }  ?>
                </div>

            </div>

        </div>
        <!-- end-hands-popup -->
    <?php } ?>
    <!-- SELECT DYNAMICS SECOND HANDS END-->


    <!-- SELECT DYNAMICS STRAP  START-->
    <?php
    $q = "SELECT DISTINCT watch_id from winder";
    $res = mysqli_query($mysqli, $q);
    foreach ($res as $rows) {
        $watch_id = $rows['watch_id'];
    ?>
        <!-- start-strap-popup -->
        <div class="color-popup  watchstrap" data-id="<?= ($watch_id == 3) ? $watch_id = 1 : $watch_id = $watch_id; ?>" style="display: none;">
            <div class="arrow-collapse">
                <div class="ac-inner">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </div>
            </div>
            <div class="overflow-div">
                <p class="com-name mb-0 ">Strap</p>
                <div class="row mbl-width-clr p-0 m-0">
                    <?php getDynamicComponent("strap", $watch_id, "watchStrap"); ?>
                </div>
            </div>
        </div>
        <!-- end-strap-popup -->
    <?php } ?>
    <!-- SELECT DYNAMICS STRAP END-->



    <!-- SELECT DYNAMICS BEZEL START-->
    <?php
    $q = "SELECT DISTINCT watch_id from bezel";
    $res = mysqli_query($mysqli, $q);
    foreach ($res as $rows) {
        $watch_id = $rows['watch_id'];
    ?>
        <!-- start-bezel-popup -->
        <div class="color-popup  watchbezel" data-id="<?= $watch_id; ?>" style="display: none;">
            <div class="arrow-collapse">
                <div class="ac-inner">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </div>
            </div>
            <div class="overflow-div">
                <p class="com-name mb-0 ">Bezel</p>
                <div class="row mbl-width-clr p-0 m-0">
                    <?php getDynamicComponent("bezel", $watch_id, "bezel"); ?>
                </div>
            </div>
        </div>
        <!-- end-bezel-popup -->
    <?php } ?>
    <!-- SELECT DYNAMICS STRAP END-->

    <!-- SELECT DYNAMICS WINDER START-->
    <?php
    $q = "SELECT DISTINCT watch_id from winder";
    $res = mysqli_query($mysqli, $q);
    foreach ($res as $rows) {
        $watch_id = $rows['watch_id'];
    ?>
        <!-- start-watch-wender-popup -->
        <div class="color-popup  watchwinder" data-id="<?= $watch_id; ?>" style="display: none;">

            <div class="arrow-collapse">
                <div class="ac-inner">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </div>
            </div>
            <div class="overflow-div">
                <p class="com-name mb-0 ">Winder</p>
                <div class="row mbl-width-clr p-0 m-0">
                    <?php getDynamicComponent("winder", $watch_id, "winder"); ?>
                </div>
            </div>
        </div>
        <!-- end-watch-wender-popup -->
    <?php } ?>
    <!-- SELECT DYNAMICS WINDER END-->

    <!-- SELECT DYNAMICS CASE START-->
    <?php
    $q = "SELECT DISTINCT watch_id from watchcase";
    $res = mysqli_query($mysqli, $q);
    foreach ($res as $rows) {
        $watch_id = $rows['watch_id'];
    ?>
        <!-- start-watch-case-popup -->
        <div class="color-popup  watchwcases" data-id="<?= $watch_id; ?>" style="display: none;">

            <?php if ($watch_id == 1)
                echo '
                <!-- start-toggle -->
                <label class="myswitch mySwitch2">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
                <!-- end-toggle -->
                ';
            ?>

            <div class="arrow-collapse">
                <div class="ac-inner">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </div>
            </div>

            <div class="overflow-div">
                <p class="com-name mb-0 ">Case</p>
                <div id="menCase">
                    <!-- CASE FOR MEN -->
                    <?php getDynamicCaseMen($watch_id); ?>
                    <!-- CASE FOR MEN -->
                </div>
                <div id="womenCase">
                    <!-- CASE FOR WOMEN -->
                    <?php getDynamicCaseWomen($watch_id); ?>
                    <!-- CASE FOR WOMEN -->
                </div>
                <div class="row mbl-width-clr p-0 m-0">
                    <?php getDynamicComponent("watchcase", $watch_id, "case"); ?>
                </div>
            </div>

        </div>
        <!-- end-watch-watches-popup -->
    <?php } ?>
    <!-- SELECT DYNAMICS CASE END-->


    <!-- SELECT DYNAMICS TIP START-->
    <?php
    $q = "SELECT DISTINCT watch_id from tip";
    $res = mysqli_query($mysqli, $q);
    foreach ($res as $rows) {
        $watch_id = $rows['watch_id'];
    ?>
        <!-- start-watch-tip-popup -->
        <div class="color-popup watchtip" data-id="<?= $watch_id; ?>" style="display: none;">

            <div class="arrow-collapse">
                <div class="ac-inner">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </div>
            </div>
            <div class="overflow-div">
                <p class="com-name mb-0 ">Tip</p>
                <div class="row mbl-width-clr p-0 m-0">
                    <?php
                    $q = "SELECT * FROM tip where watch_id=$watch_id";
                    $res = mysqli_query($mysqli, $q);
                    foreach ($res as $rows) {
                        $id = $rows['id'];
                        $name = $rows['name'];
                        $url = $rows['url'];
                        $color = $rows['color'];
                    ?>
                        <div class="col-1 col-sm-12 p-0 m-0" onclick="document.getElementById('handTip').src= '<?= $url ?>'">
                            <div class="color-box" style="background-color:<?= $color; ?>"></div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
        <!-- end-watch-tip-popup -->
    <?php } ?>
    <!-- SELECT DYNAMICS TIP END-->



    <!-- SELECT DYNAMICS LUMI START-->
    <?php
    $q = "SELECT DISTINCT style_id from lumi";
    $res = mysqli_query($mysqli, $q);
    foreach ($res as $rows) {
        $style_id = $rows['style_id'];
    ?>
        <!-- start-watch-lumi-popup -->
        <div class="color-popup watchlumi" style-id="<?= $style_id ?>" style="display: none;">
            <div class="arrow-collapse">
                <div class="ac-inner">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </div>
            </div>
            <div class="overflow-div">
                <p class="com-name mb-0 ">Lumi</p>
                <div class="row mbl-width-clr p-0 m-0">
                    <?php
                    $q = "SELECT * FROM lumi where style_id=$style_id";
                    $res = mysqli_query($mysqli, $q);
                    foreach ($res as $rows) {
                        $id = $rows['id'];
                        $name = $rows['name'];
                        $url = $rows['url'];
                        $color = $rows['color'];
                    ?>
                        <div class="col-1 col-sm-12 p-0 m-0" onclick="document.getElementById('handLumi').src= '<?= $url ?>'">
                            <div class="color-box" style="background-color:<?= $color; ?>"></div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- end-watch-lumi-popup -->
    <?php } ?>
    <!-- SELECT DYNAMICS LUMI END-->


    <!-- SELECT DYNAMICS FACE START-->
    <?php
    $q = "SELECT DISTINCT watch_id from face";
    $res = mysqli_query($mysqli, $q);
    foreach ($res as $rows) {
        $watch_id = $rows['watch_id'];
    ?>
        <!-- start-face-popup -->
        <div class="color-popup  watchface " data-id="<?= $watch_id; ?>" style="display: none;">
            <div class="arrow-collapse">
                <div class="ac-inner">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </div>
            </div>
            <div class="overflow-div">
                <p class="com-name mb-0 ">Face</p>
                <div class="row mbl-width-clr p-0 m-0">
                    <?php
                    $q = "SELECT * FROM face WHERE watch_id=$watch_id";
                    $res = mysqli_query($mysqli, $q);
                    foreach ($res as $rows) {
                        $id = $rows['id'];
                        $name = $rows['name'];
                        $url = $rows['url'];
                        $color = $rows['color'];
                    ?>
                        <div class="col-1 col-sm-12 p-0 m-0 select-4" onclick="document.getElementById('face').src='<?php echo $url  ?>'">
                            <div class="color-box" style="background-color: <?php echo $color; ?>"></div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- end-face-popup -->
    <?php } ?>
    <!-- SELECT DYNAMICS FACE END-->


    <!-- start-right-model-popup -->
    <div class="right-popup watchskull" style="display:none;">

        <div class="cls-btn">
            <i class="fas fa-times" aria-hidden="true"></i>
        </div>

        <!-- start-arrow -->
        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>
        <!-- end-arrow -->

        <div class="overflow-div">

            <div class="row justify-content-center p-0 m-0">
                <?php
                $res = mysqli_query($mysqli, "SELECT * FROM skull");

                foreach ($res as $rows) {
                    $id = $rows['id'];
                    // $watch_name = $rows['name'];
                    $name = $rows['name'];
                    $url = $rows['url'];

                ?>
                    <div class="col-7 model-box p-0 m-0 mySkull <?= $id == 1 ? "active-model" : "" ?>" role="button" data-skullid="<?= $id; ?>">
                        <img src="<?= $url; ?>" class="img-fluid">
                        <p class="model-text myfont"><?= $name; ?></p>
                    </div>
                <?php

                } ?>

                <?php
                $count = countFiles("./data/Skull_old/");
                $names = getFileNames("./data/Skull_old/");
                $a = 11;
                for ($i = 0; $i < $count; $i++) {
                    echo '<div class="col-7 model-box p-0 m-0 skullPng" role="button" data-url="./data/Skull_old/' . $names[$i] . '">
                        <img src="./data/Skull_old/' . $names[$i] . '" class="img-fluid">
                        <p class="model-text myfont">Skull ' . $a . '</p>
                    </div>';
                    $a++;
                }
                ?>

            </div>

        </div>

    </div>
    <!-- end-right-model-popup -->

    <!-- start-right-model-popup -->
    <div class="color-popup skullParts mob-skull-stl-1" style="display:none;">

        <!-- <div class="cls-btn">
            <i class="fas fa-times" aria-hidden="true"></i>
        </div> -->

        <!-- start-arrow -->
        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>
        <!-- end-arrow -->

        <div class="overflow-div">
            <div style="margin-bottom: 2%;" class="text-white text-center model-text myfont">Skull Layers</div>
            <div class="row mbl-width-clr p-0 m-0">
                <!-- DATA WILL BE ADDED BY JQUERY!!!! -->
            </div>
        </div>

    </div>
    <!-- end-right-model-popup -->


    <!-- start-right-model-popup -->
    <div class="color-popup skullColor mob-skull-stl" style="display:none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">
            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $res = mysqli_query($mysqli, "SELECT DISTINCT color from hands");
                foreach ($res as $rows) {
                    $color = $rows['color'];
                ?>
                    <div class="col-1 col-sm-12 p-0 m-0 select-4 applyColorToSkull" data-color="<?= $color; ?>">
                        <div class="color-box" style="background-color: <?= $color; ?>"></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- end-right-model-popup -->


    <!-- end-container -->

    <!-- start-left-icons -->
    <div class="icon-main">
        <div class="row p-0 m-0">

            <div class="col-12 zoom-btns p-0 m-0 " id="zoomIn">
                <i class="fas fa-plus"></i>
            </div>

            <div class="col-12 zoom-btns p-0 m-0" id="zoomOut">
                <i class="fas fa-minus"></i>
            </div>

            <div class="col-12 icons1 p-0 m-0">
                <img src="img/plus.svg" class="img-fluid zoom-op w-50">
            </div>

            <div class="col-12 icons1 p-0 m-0 resetCanvas">
                <img src="img/reset.svg" class="img-fluid">
            </div>

            <div class="col-12 icons1 p-0 m-0 screenShotBtn">
                <img src="img/download.svg" class="img-fluid w-50">
            </div>

            <div class="col-12 icons1 p-0 m-0">
                <p class="logo-text p-0 m-0">Mwnn</p>
            </div>

        </div>
    </div>
    <!-- end-left-icons -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


    <script src="https://www.jqueryscript.net/demo/detect-swipe-handler/jquerySwipeHandler.js"></script>
    <script src="newmyjs.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/html2canvas.js"></script>
    <script src="./js/canvas2image.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/skull-svg-data.js"></script>
</body>

<!-- INSERTING SKULL SVG AND ITS FUNCTION HANDLING   -->
<script>
    $(document).ready(function() {
        $("span#skull").html(getSkullData(1));
        // $("#secHand,g#svg-sechand").hide();
        $("#loader").addClass("d-none");
        let gId;
        $(`#skull svg g`).each(function() {
            if ($(this).attr("id") != undefined && $(this).attr("id") != "") {
                gId = $(this).attr("id");
                $(".skullParts").find(".row").append(`
                <div class="col-1 col-sm-12 model-box p-0 m-0 skullLayer" data-layer="${gId}" style="background-color:${gId};" role="button">
                    <div class="color-box" style="background-color:${gId}"></div>
                </div>
                `);
                // <p class="text-white text-center">${gId} layer</p>
            }
        });

        $(document).on("click", ".mySkull", function() {
            $("img#pngSkull").hide();
            $("span#skull,#myRange,.skullParts").show();
            let skullId = $(this).data("skullid");
            $("span#skull").html(getSkullData(skullId));

            var div = $(".tail img,.tail svg");
            startAnimation(div);

            $(".skullParts").find(".row").html('');
            $(`#skull svg g`).each(function() {
                if ($(this).attr("id") != undefined && $(this).attr("id") != "") {
                    gId = $(this).attr("id");
                    $(".skullParts").find(".row").append(`
                        <div class="col-1 col-sm-12 model-box p-0 mx-auto skullLayer" data-layer="${gId}" style="background-color:${gId};" role="button">
                            <div class="color-box" style="background-color:${gId}"></div>
                        </div>
                        `);
                    // <p class="text-white text-center">${gId} layer</p>
                }
            });
            $(".skullParts").show();
        })

        let layer;
        $(document).on("click", ".skullLayer", function() {
            layer = $(this).attr("data-layer");
            $(".skullLayer").removeClass("active-clr");
            $(this).addClass("active-clr");
            $(".skullColor").find(".color-box").removeClass("active-clr");
            $(".skullColor").show();
        });

        $(document).on("click", ".applyColorToSkull", function() {
            let color = $(this).data("color");
            $(".skull-svg g#" + layer).find("path").attr("fill", color);
        });

        $(document).on("click", ".skullPng", function() {
            $("#skull,.skullParts,.skullColor").hide();
            $("img#pngSkull,#myRange").show();
            let url = $(this).data("url");
            $("img#pngSkull").attr("src", url);
        });

        $(document).on("click change", "#myRange", function() {
            $("#zoomOut").trigger("click");
            let size = $(this).val();
            if (size == 1)
                $("#skull svg,#pngSkull").css("transform", "scale(0.6,0.6)");
            else if (size == 2)
                $("#skull svg,#pngSkull").css("transform", "scale(0.8,0.8)");
            else if (size == 3)
                $("#skull svg,#pngSkull").css("transform", "scale(1,1)");
            else if (size == 4)
                $("#skull svg,#pngSkull").css("transform", "scale(1.1,1.1)");
        })

        $(document).on("click", ".mySwitch3 input", function() {
            // console.log($(this).prop("checked"));
            if ($(this).prop("checked") == true) {
                ($("#secHand,g#svg-sechand").hide());
            } else if ($(this).prop("checked") == false) {
                ($("#secHand,g#svg-sechand").show());
            }
        })

        $(document).on("click", ".secHandToggler li", function() {
            // console.log($(this).data("val"),$(this));
            if ($(this).data("val") == "on") {
                ($("#secHand,g#svg-sechand").show());
            } else if ($(this).data("val") == "off") {
                ($("#secHand,g#svg-sechand").hide());
            }
        })

    })
</script>

<!-- APPLYING CASE FUNCTION  -->
<script>
    $(document).ready(function() {
        // applying case and svg
        $(document).on("click", ".applyCase", function() {
            let w_id = $(this).data("watch");
            $("#zoomOut").trigger("click");
            // console.log(w_id);
            if (w_id == 1) $(".mySwitch2").show();
            else $(".mySwitch2").hide();

            let lumi_id, hands_id;

            <?php
            $res = mysqli_query($mysqli, "SELECT * FROM watches");
            foreach ($res as $r) {
                $watch_id = $r['id'];
                ($watch_id == 3) ? $strap_id = 1 : $strap_id = $watch_id;

                $q = "SELECT DISTINCT url AS wcase, 
                (SELECT DISTINCT url FROM bezel WHERE watch_id= $watch_id LIMIT 1) AS bezel,
                (SELECT DISTINCT url FROM strap WHERE watch_id= $strap_id LIMIT 1) AS strap,
                (SELECT DISTINCT url FROM winder WHERE watch_id= $watch_id LIMIT 1) AS winder
                FROM watchcase WHERE watch_id= $watch_id LIMIT 1";

                $res = mysqli_query($mysqli, $q);
                foreach ($res as $rows) {
                    $case = $rows['wcase'];
                    $bezel = $rows['bezel'];
                    $strap = $rows['strap'];
                    $winder = $rows['winder'];

            ?>
                    <?= ($watch_id == 1) ? "" : "else "; ?>if(w_id == <?= $watch_id; ?>) {
                        $('#case').attr("src", '<?= $case; ?>');
                        $('#bezel').attr("src", '<?= $bezel; ?>');
                        $('#watchStrap').attr("src", '<?= $strap; ?>');
                        $('#winder').attr("src", '<?= $winder; ?>');

                        hands_id = $("g#svg-min,g#svg-hour").attr("style-id");
                        lumi_id = $("g#svg-lumi").attr("style-id");
                        $(`#desk-sx svg.watch-svg`).replaceWith(watch<?= $watch_id; ?>);
                        $("g#svg-min,g#svg-hour").attr("style-id", hands_id);
                        $("g#svg-lumi").attr("style-id", lumi_id);

                    }
            <?php }
            } ?>
            // var div = $(".tail img,.tail svg");
            // startAnimation(div);
        })

        $(document).on("click", ".arrow.left", function() {
            let i = $(".applyCase.active-model").index();
            $(".applyCase").eq(--i).trigger("click");
            $("#desk-sx svg g[id='svg-case']").trigger("click");
            // console.log($(`.applyCase[data-watch="${++i}"]`).trigger("click"));
        })

        $(document).on("click", ".arrow.right", function() {
            let j = $(".applyCase.active-model").index();
            $(".applyCase").eq(++j).trigger("click");
            $("#desk-sx svg g[id='svg-case']").trigger("click");
            // console.log($(`.applyCase[data-watch="${++i}"]`).trigger("click"));
        })
    });
</script>

<!-- SCREEN SHOT AND SCREEN RESET FUNCTION -->
<script>
    $(document).ready(() => {
        $(document).on("click", ".resetCanvas", function() {
            $("#zoomOut").trigger("click");
            $(this).css("background-color", "inherit");
        })

        // Screen Shot Function
        document.querySelector('.screenShotBtn').addEventListener('click', function() {
            $("#zoomOut").trigger("click");
            $("#loader").removeClass("d-none");
            setTimeout(() => {
                // html2canvas(document.getElementById("realCanvas"), {
                html2canvas(document.getElementById("desk-sx"), {
                    backgroundColor: null
                }).then(function(canvas) {
                    document.body.appendChild(canvas);
                    Canvas2Image.saveAsPNG(canvas);
                    document.body.removeChild(canvas);
                    $("#loader").addClass("d-none");
                });
            }, 1500);
        });
    });
</script>

<!-- <script>
    $(document).ready(() => {

        $(document).on("click", ".bothhands", function() {
            let style_id = $(this).attr('style-id');
            console.log(style_id)

            if (style_id == 1) {
                $("#secHand").hide();
                $("#handLumi,#svg-lumi,#handTip,#svg-tip,li a[data-watch='svg-lumi'],li a[data-watch='svg-tip']").show();
                <?php
                $res = mysqli_query($mysqli, "SELECT url,
                (SELECT url from lumi where style_id=1 LIMIT 1) AS lumi_url FROM hands WHERE style_id=1 LIMIT 1");
                foreach ($res as $rows) {
                    $hands = $rows['url'];
                    $lumi = $rows['lumi_url'];
                } ?>
                $("#handLumi").attr("src", "<?= $lumi; ?>");
                $("#minHand,#hourHand").attr("src", "<?= $hands; ?>");
                $("g#svg-min,g#svg-hour,g#svg-lumi,a[data-watch='svg-lumi'],a[data-watch='svg-hands']").attr("style-id", style_id);
            } else if (style_id == 2) {
                $("#handLumi,#svg-lumi,#handTip,#svg-tip,li a[data-watch='svg-lumi'],li a[data-watch='svg-tip'],#secHand").hide();
                <?php
                $res = mysqli_query($mysqli, "SELECT url FROM hands WHERE style_id=2 LIMIT 1");
                foreach ($res as $rows) {
                    $hands = $rows['url'];
                } ?>
                $("#minHand,#hourHand").attr("src", "<?= $hands; ?>");
                $("g#svg-min,g#svg-hour").attr("style-id", style_id);
            } else if (style_id == 3) {
                $("#handLumi,#svg-lumi,#handTip,#svg-tip,li a[data-watch='svg-lumi'],li a[data-watch='svg-tip'],#secHand").hide();
                <?php
                $res = mysqli_query($mysqli, "SELECT url FROM hands WHERE style_id=3 LIMIT 1");
                foreach ($res as $rows) {
                    $hands = $rows['url'];
                } ?>
                $("#minHand,#hourHand").attr("src", "<?= $hands; ?>");
                $("g#svg-min,g#svg-hour").attr("style-id", style_id);
            } else if (style_id == 4) {
                $("#handLumi,#svg-lumi,#handTip,#svg-tip,li a[data-watch='svg-lumi'],li a[data-watch='svg-tip'],#secHand").hide();
                <?php
                $res = mysqli_query($mysqli, "SELECT url FROM hands WHERE style_id=4 LIMIT 1");
                foreach ($res as $rows) {
                    $hands = $rows['url'];
                } ?>
                $("#minHand,#hourHand").attr("src", "<?= $hands; ?>");
                $("g#svg-min,g#svg-hour").attr("style-id", style_id);
            } else if (style_id == 5) {
                $("#handLumi,#svg-lumi,li a[data-watch='svg-lumi'],#secHand").show();
                $("#handTip,#svg-tip,li a[data-watch='svg-tip']").hide();
                $("#handLumi").attr("src", "./data/Hand lumi/22.png");
                $("#minHand,#hourHand").attr("src", "./data/Hands/93.png");
                $("#secHand").attr("src", "./data/Hands/1.png");
                $("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
                $("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "2");
            } else if (style_id == 6) {
                $("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
                $("#handTip,#svg-tip,li a[data-watch='svg-tip'],#secHand").hide();
                $("#handLumi").attr("src", "./data/Hand lumi/43.png");
                $("#minHand,#hourHand").attr("src", "./data/Hands/114.png");
                $("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
                $("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "3");
            } else if (style_id == 7) {
                $("#handLumi,#svg-lumi,li a[data-watch='svg-lumi'],#secHand").show();
                $("#handTip,#svg-tip,li a[data-watch='svg-tip']").hide();
                $("#handLumi").attr("src", "./data/Hand lumi/64.png");
                $("#minHand,#hourHand").attr("src", "./data/Hands/135.png");
                $("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
                $("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "4");
            } else if (style_id == 8) {
                $("#handLumi,#svg-lumi,li a[data-watch='svg-lumi'],#secHand").show();
                $("#handTip,#svg-tip,li a[data-watch='svg-tip']").hide();
                $("#handLumi").attr("src", "./data/Hand lumi/85.png");
                $("#minHand,#hourHand").attr("src", "./data/Hands/156.png");
                $("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
                $("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "5");
            } else if (style_id == 9) {
                $("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
                $("#handTip,#svg-tip,li a[data-watch='svg-tip'],#secHand").hide();
                $("#handLumi").attr("src", "./data/Hand lumi/106.png");
                $("#minHand,#hourHand").attr("src", "./data/Hands/177.png");
                $("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
                $("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "6");
            } else if (style_id == 10) {
                $("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
                $("#handTip,#svg-tip,li a[data-watch='svg-tip'],#secHand").hide();
                $("#handLumi").attr("src", "./data/Hand lumi/127.png");
                $("#minHand,#hourHand").attr("src", "./data/Hands/198.png");
                $("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
                $("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "7");
            } else if (style_id == 11) {
                $("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
                $("#handTip,#svg-tip,li a[data-watch='svg-tip'],#secHand").hide();
                $("#handLumi").attr("src", "./data/Hand lumi/148.png");
                $("#minHand,#hourHand").attr("src", "./data/Hands/219.png");
                $("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
                $("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "8");
            } else if (style_id == 12) {
                $("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
                $("#handTip,#svg-tip,li a[data-watch='svg-tip'],#secHand").hide();
                $("#handLumi").attr("src", "./data/Hand lumi/183.png");
                $("#minHand,#hourHand").attr("src", "./data/Hands/254.png");
                $("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
                $("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "9");
            } else if (style_id == 13) {
                $("#handLumi,#svg-lumi,li a[data-watch='svg-lumi']").show();
                $("#handTip,#svg-tip,li a[data-watch='svg-tip'],#secHand").hide();
                $("#handLumi").attr("src", "./data/Hand lumi/206.png");
                $("#minHand,#hourHand").attr("src", "./data/Hands/277.png");
                $("g#svg-min,g#svg-hour,a[data-watch='svg-hands']").attr("style-id", style_id);
                $("g#svg-lumi,a[data-watch='svg-lumi']").attr("style-id", "10");
            }
            // $(".watchhands, .watchmodels").hide();
            // ($(".watchhands[style-id='" + style_id + "']").show());
            $("li a[data-watch='svg-hands']").attr("style-id", style_id);
        })

    })
</script> -->

</html>