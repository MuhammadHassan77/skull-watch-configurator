<?php require_once("./func.php");





// FETCHING DATA ON BEHALF PARTICULAR ID
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $q = "SELECT * FROM savechanges WHERE id=" . $id;

    $result = mysqli_query($mysqli, $q);

    if ($result) {
        foreach ($result as $rows) {
            $watch_id = $rows['watch_id'];
            $bezel = $rows['bezel'];
            $case = $rows['watchcase'];
            $face = $rows['face'];
            $lumi = $rows['lumi'];
            $tip = $rows['tip'];
            $hour = $rows['hour'];
            $min = $rows['min'];
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
    <link href="icons/themify-icons/themify-icons.css" rel="stylesheet">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!--<link href="https://db.onlinewebfonts.com/c/67dd7a753cce719a17304beb973d5dfc?family=Keep+Calm+W01+Light" rel="stylesheet" type="text/css" />-->


    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="scss/mystyle.css">
    <script src="./js/svg-data.js"></script>
    <title>Watch</title>

    <style type="text/css">
        .choose-img {
            width: 200px;
            height: auto;
        }

        .chooseWatch {
            justify-content: center;
        }

        .watch-svg {
            position: absolute;
            z-index: 100;
            opacity: 0;
            width: 100%;
            height: auto;
        }

        svg.watch-svg g {
            cursor: pointer;
        }

        .skull-svg {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0%;
            left: 0%;
        }

        /*.right-popup,*/
        /*.color-popup {*/
        /*    z-index: 3;*/
        /*}*/

        /*.icon-main {
            z-index: 1;
        }*/

        @media only screen and (max-width: 576px) {


            #menCase,
            #womenCase {
                display: flex;
                flex-wrap: nowrap;
                overflow: auto hidden;
                margin-bottom: 1% !important;
            }

            #menCase {
                margin-top: 1% !important;
                margin-bottom: 0px !important;
            }

            #menCase .col-1,
            #womenCase .col-1 {
                width: 15%;
                margin: 0px 1% !important;
            }

            /*.icon-main {
                width: 8%;
                bottom: unset;
                top: 1%;
                z-index: 2;

            }*/

        }
    </style>

</head>

<body style="overflow: hidden;">
    <!-- start-header -->
    <div class="row p-0 m-0">
        <div class="col-12 p-0 m-0">
            <div class="logo-text-1">Mwnn</div>
            <div class="myfont tabs" style="position: relative; z-index: 2;">
                <span class="style-1 style-box-btn stylewatch">Click to Change</span>
                <!-- <span>/</span> -->
                <!-- <span class="style-1 desgin-box-btn styledesign">Design</span> -->
            </div>

        </div>
    </div>
    <!-- end-header -->
    <!-- start-container -->
    <div class="container-fluid p-0 m-0" style="position: absolute;top: 0;">
        <div class="canvas-div p-0 m-0">
            <div class="range-1">
                <input type="range" min="1" max="4" class="slider" id="myRange" style="display:none;">
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

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a style-id="1" data-watch="svg-lumi" class="dropdown-item newControlMenu" href="javascript:void(0)">Hand Lumi</a></li>
                        <li><a data-watch="svg-tip" class="dropdown-item newControlMenu" href="javascript:void(0)">Hand Tips</a></li>
                        <li><a style-id="1" data-watch="svg-hands" class="dropdown-item newControlMenu" href="javascript:void(0)">Hands</a></li>
                        <li><a data-watch="svg-skull" class="dropdown-item newControlMenu" href="javascript:void(0)">skull</a></li>
                        <li><a data-watch="svg-face" class="dropdown-item newControlMenu" href="javascript:void(0)">Face</a></li>
                        <li><a data-watch="svg-bezel" class="dropdown-item newControlMenu" href="javascript:void(0)">Bezel</a></li>
                        <li><a data-watch="svg-case" class="dropdown-item newControlMenu" href="javascript:void(0)">Case</a></li>
                        <li><a data-watch="svg-winder" class="dropdown-item newControlMenu" href="javascript:void(0)">Winder</a></li>
                        <li><a data-watch="svg-strap" class="dropdown-item newControlMenu" href="javascript:void(0)">Straps</a></li>
                    </ul>
                </div>

            </div>
            <!-- end-dot-menu -->


            <div class="row p-0 m-0 justify-content-center">
                <div id="myCanvas" class="col-sm-12 col-md-8" style="display: flex; justify-content: center;">
                    <div id="desk-sx" class="col-md-6 col-sm-12 tail" style="justify-content: center;">
                        <img id="watchStrap" src="<?php echo (!empty($strap)) ? $strap : './data/Strap/21.png'; ?>" alt="" class="img-responsive" />
                        <img id="winder" src="<?php echo (!empty($winder)) ? $winder : './data/Winder/Black1.png'; ?>" alt="" class="img-responsive " />
                        <img id="case" src="<?php echo (!empty($case)) ? $case : './data/Case/men/black1.png'; ?>" alt="" class="img-responsive" />
                        <img id="face" src="<?php echo (!empty($face)) ? $face : './data/Face/21.png'; ?>" alt="" class="img-responsive" />
                        <img id="bezel" src="<?php echo (!empty($bezel)) ? $bezel : './data/Bezel/21.png'; ?>" alt="" class="img-responsive" />
                        <!-- <img id="skull" src="<?php //echo (!empty($skull)) ? $skull : './data/Skull/1.png'; 
                                                    ?>" alt="" class="img-responsive" /> -->
                        <span id="skull" class="img-responsive">
                            <!-- DATA WILL BE SHOWN BY JQUERY -->
                        </span>
                        <img id="hourHand" src="<?php echo (!empty($hour)) ? $hour : './data/Hands/88.png'; ?>" alt="" class="img-responsive " />
                        <img id="minHand" src="<?php echo (!empty($min)) ? $min : './data/Hands/88.png'; ?>" alt="" class="img-responsive " />
                        <img id="handTip" src="<?php echo (!empty($tip)) ? $tip : './data/Hand tip/21.png'; ?>" alt="" class="img-responsive " />
                        <img id="handLumi" src="<?php echo (!empty($lumi)) ? $lumi : './data/Hand lumi/17.png'; ?>" alt="" class="img-responsive " />
                        <img id="bolt" src="./data/Bolt/bolt.png" alt="" class="img-responsive" />
                        <!-- OVERLAYED WATCH SVG -->
                        <?php
                        if (!empty($watch_id)) {
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

        <div class="cls-btn"> <i class="fas fa-times" aria-hidden="true"></i>
        </div>

        <!-- start-dropdown -->
        <div class="dropdown mydropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Click to Select Part
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item case-btn" href="javascript:void(0)">Case</a></li>
                <li><a class="dropdown-item hands-btn" href="javascript:void(0)">Hands</a></li>
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

            <div class="row justify-content-center case-main-div p-0 m-0">

                <?php
                $res = mysqli_query($mysqli, "SELECT *FROM watches");

                foreach ($res as $rows) {
                    $id = $rows['id'];
                    $watch_name = $rows['name'];
                    $name = $rows['name'];
                    if ($watch_name == "watch1") {
                ?>
                        <div class="col-7 model-box p-0 m-0 applyCase" style="cursor: pointer;" data-watch="<?php echo $id; ?>">
                            <img src="./data/models/1627734124884.png" class="img-fluid">
                            <P class="model-text myfont"><?php echo $name; ?></P>
                        </div>
                    <?php
                    } else if ($watch_name == "watch2") {
                    ?>
                        <div class="col-7 model-box p-0 m-0 applyCase" style="cursor: pointer;" data-watch="<?php echo $id; ?>">
                            <img src="./data/models/1627734140181.png" class="img-fluid">
                            <P class="model-text myfont"><?php echo $name; ?></P>
                        </div>

                    <?php
                    } else if ($watch_name == "watch3") {
                    ?>
                        <div class="col-7 model-box p-0 m-0 applyCase" style="cursor: pointer;" data-watch="<?php echo $id; ?>">
                            <img src="./data/models/1627734146772.png" class="img-fluid">
                            <P class="model-text myfont"><?php echo $name; ?></P>
                        </div>
                    <?php
                    } else if ($watch_name == "watch4") {
                    ?>
                        <div class="col-7 model-box p-0 m-0 applyCase" style="cursor: pointer;" data-watch="<?php echo $id; ?>">
                            <img src="./data/models/1627734153763.png" class="img-fluid">
                            <P class="model-text myfont"><?php echo $name; ?></P>
                        </div>
                    <?php
                    } else if ($watch_name == "watch5") {
                    ?>
                        <div class="col-7 model-box p-0 m-0 applyCase" style="cursor: pointer;" data-watch="<?php echo $id; ?>">
                            <img src="./data/models/1627734160032.png" class="img-fluid">
                            <P class="model-text myfont"><?php echo $name; ?></P>
                        </div>
                    <?php
                    } else if ($watch_name == "watch6") {
                    ?>
                        <div class="col-7 model-box p-0 m-0 applyCase" style="cursor: pointer;" data-watch="<?php echo $id; ?>">
                            <img src="./data/models/1627734168034.png" class="img-fluid">
                            <P class="model-text myfont"><?php echo $name; ?></P>
                        </div>

                    <?php
                    } else if ($watch_name == "watch7") {
                    ?>
                        <div class="col-7 model-box p-0 m-0 applyCase" style="cursor: pointer;" data-watch="<?php echo $id; ?>">
                            <img src="./data/models/1627734175310.png" class="img-fluid">
                            <P class="model-text myfont"><?php echo $name; ?></P>
                        </div>

                <?php
                    }
                } ?>


            </div>

            <!-- start-hands -->
            <div class="row justify-content-center p-0 m-0 hands-main-div" style="display: none;">
                <?php
                $arr = array(70, 1, 24, 47, 93, 114, 135, 156, 177, 198, 219, 254, 277);
                $res = mysqli_query($mysqli, "SELECT DISTINCT(style_id)  FROM hands");
                foreach ($res as $rows) {
                    $style_id = $rows['style_id'];
                ?>
                    <div class="col-11 model-box p-0 m-0 bothhands" style-id="<?= $style_id; ?>">
                        <img src="data/Hands/<?= $arr[--$style_id]; ?>.png" class="img-fluid">
                        <P class="model-text myfont">Hands <?= $style_id; ?></P>
                    </div>
                <?php  } ?>
                <!-- <div class="col-11 model-box p-0 m-0 bothhands" style-id="2">
                        <img src="data/Hands/1.png" class="img-fluid">
                        <P class="model-text myfont">Hands 2</P>
                    </div>

                    <div class="col-11 model-box p-0 m-0 bothhands" style-id="3">
                        <img src="data/Hands/24.png" class="img-fluid">
                        <P class="model-text myfont">Hands 3</P>
                    </div>

                    <div class="col-11 model-box p-0 m-0 bothhands" style-id="4">
                        <img src="data/Hands/47.png" class="img-fluid">
                        <P class="model-text myfont">Hands 4</P>
                    </div>

                    <div class="col-11 model-box p-0 m-0 bothhands" style-id="5">
                        <img src="data/Hands/93.png" class="img-fluid">
                        <P class="model-text myfont">Hands 5</P>
                    </div>

                    <div class="col-11 model-box p-0 m-0 bothhands" style-id="6">
                        <img src="data/Hands/114.png" class="img-fluid">
                        <P class="model-text myfont">Hands 6</P>
                    </div>

                    <div class="col-11 model-box p-0 m-0 bothhands" style-id="7">
                        <img src="data/Hands/135.png" class="img-fluid">
                        <P class="model-text myfont">Hands 7</P>
                    </div>

                    <div class="col-11 model-box p-0 m-0 bothhands" style-id="8">
                        <img src="data/Hands/156.png" class="img-fluid">
                        <P class="model-text myfont">Hands 8</P>
                    </div>

                    <div class="col-11 model-box p-0 m-0 bothhands" style-id="9">
                        <img src="data/Hands/177.png" class="img-fluid">
                        <P class="model-text myfont">Hands 9</P>
                    </div>

                    <div class="col-11 model-box p-0 m-0 bothhands" style-id="10">
                        <img src="data/Hands/198.png" class="img-fluid">
                        <P class="model-text myfont">Hands 10</P>
                    </div>

                    <div class="col-11 model-box p-0 m-0 bothhands" style-id="11">
                        <img src="data/Hands/219.png" class="img-fluid">
                        <P class="model-text myfont">Hands 11</P>
                    </div>

                    <div class="col-11 model-box p-0 m-0 bothhands" style-id="12">
                        <img src="data/Hands/254.png" class="img-fluid">
                        <P class="model-text myfont">Hands 12</P>
                    </div>

                    <div class="col-11 model-box p-0 m-0 bothhands" style-id="13">
                        <img src="data/Hands/277.png" class="img-fluid">
                        <P class="model-text myfont">Hands 13</P>
                </div> -->
            </div>
            <!-- end-hands -->

        </div>

    </div>
    <!-- end-right-model-popup -->



    <!-- start-hands-popup -->
    <div class="color-popup watchhands" style-id="1" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM hands WHERE style_id= 4";
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
                <?php

                }
                ?>
            </div>

        </div>

    </div>
    <!-- end-hands-popup -->

    <!-- start-hands-popup -->
    <div class="color-popup  watchhands" style-id="2" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM hands WHERE style_id= 1";
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
                <?php

                }
                ?>
            </div>

        </div>

    </div>
    <!-- end-hands-popup -->

    <!-- start-hands-popup -->
    <div class="color-popup  watchhands" style-id="3" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM hands WHERE style_id= 2";
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
                <?php

                }
                ?>
            </div>

        </div>

    </div>
    <!-- end-hands-popup -->

    <!-- start-hands-popup -->
    <div class="color-popup  watchhands" style-id="4" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM hands WHERE style_id= 3";
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
                <?php

                }
                ?>
            </div>

        </div>

    </div>
    <!-- end-hands-popup -->

    <!-- start-hands-popup -->
    <div class="color-popup watchhands" style-id="5" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM hands WHERE style_id= 5";
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
                <?php

                }
                ?>
            </div>

        </div>

    </div>
    <!-- end-hands-popup -->


    <!-- start-hands-popup -->
    <div class="color-popup watchhands" style-id="6" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM hands WHERE style_id= 6";
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
                <?php

                }
                ?>
            </div>

        </div>

    </div>
    <!-- end-hands-popup -->


    <!-- start-hands-popup -->
    <div class="color-popup watchhands" style-id="7" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM hands WHERE style_id= 7";
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
                <?php

                }
                ?>
            </div>

        </div>

    </div>
    <!-- end-hands-popup -->

    <!-- start-hands-popup -->
    <div class="color-popup watchhands" style-id="8" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM hands WHERE style_id= 8";
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
                <?php

                }
                ?>
            </div>

        </div>

    </div>
    <!-- end-hands-popup -->


    <!-- start-hands-popup -->
    <div class="color-popup watchhands" style-id="9" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM hands WHERE style_id= 9";
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
                <?php

                }
                ?>
            </div>

        </div>

    </div>
    <!-- end-hands-popup -->


    <!-- start-hands-popup -->
    <div class="color-popup watchhands" style-id="10" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM hands WHERE style_id= 10";
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
                <?php

                }
                ?>
            </div>

        </div>

    </div>
    <!-- end-hands-popup -->


    <!-- start-hands-popup -->
    <div class="color-popup watchhands" style-id="11" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM hands WHERE style_id= 11";
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
                <?php

                }
                ?>
            </div>

        </div>

    </div>
    <!-- end-hands-popup -->

    <!-- start-hands-popup -->
    <div class="color-popup watchhands" style-id="12" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM hands WHERE style_id= 12";
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
                <?php

                }
                ?>
            </div>

        </div>

    </div>
    <!-- end-hands-popup -->

    <!-- start-hands-popup -->
    <div class="color-popup watchhands" style-id="13" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM hands WHERE style_id= 13";
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
                <?php

                }
                ?>
            </div>

        </div>

    </div>
    <!-- end-hands-popup -->




    <!-- start-strap-popup -->
    <div class="color-popup  watchstrap watchone" data-id="1" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("strap", 1, "watchStrap"); ?>

                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->

            </div>

        </div>

    </div>
    <!-- end-strap-popup -->


    <!-- start-strap-popup -->

    <div class="color-popup  watchstrap watchtwo" data-id="2" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("strap", 2, "watchStrap"); ?>

                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->

            </div>

        </div>

    </div>
    <!-- end-strap-popup -->


    <!-- start-strap-popup -->

    <div class="color-popup  watchstrap watchthree" data-id="1" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("strap", 1, "watchStrap"); ?>

                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->

            </div>

        </div>

    </div>
    <!-- end-strap-popup -->



    <!-- start-strap-popup -->

    <div class="color-popup  watchstrap watchfour" data-id="4" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("strap", 4, "watchStrap"); ?>

                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->

            </div>

        </div>

    </div>
    <!-- end-strap-popup -->



    <!-- start-strap-popup -->

    <div class="color-popup  watchstrap watchfive" data-id="5" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("strap", 5, "watchStrap"); ?>

                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->

            </div>

        </div>

    </div>
    <!-- end-strap-popup -->



    <!-- start-strap-popup -->

    <div class="color-popup  watchstrap watchsix" data-id="6" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("strap", 6, "watchStrap"); ?>

                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->

            </div>

        </div>

    </div>
    <!-- end-strap-popup -->


    <!-- start-strap-popup -->

    <div class="color-popup  watchstrap watchseven" data-id="7" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("strap", 7, "watchStrap"); ?>

                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->

            </div>

        </div>

    </div>
    <!-- end-strap-popup -->






    <!-- start-bezel-popup -->

    <div class="color-popup  watchbezel watchone" data-id="1" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("bezel", 1, "bezel"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-bezel-popup -->


    <!-- start-bezel-popup -->
    <div class="color-popup  watchbezel watchtwo" data-id="2" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("bezel", 2, "bezel"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-bezel-popup -->

    <!-- start-bezel-popup -->
    <div class="color-popup  watchbezel watchthree" data-id="3" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("bezel", 3, "bezel"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                <div class="color-box" style="background-color: #751113;"></div>
            </div> -->
            </div>

        </div>

    </div>
    <!-- end-bezel-popup -->

    <!-- start-bezel-popup -->
    <div class="color-popup  watchbezel watchfour" data-id="4" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("bezel", 4, "bezel"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                <div class="color-box" style="background-color: #751113;"></div>
            </div> -->
            </div>

        </div>

    </div>
    <!-- end-bezel-popup -->

    <!-- start-bezel-popup -->
    <div class="color-popup  watchbezel watchfive" data-id="5" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("bezel", 5, "bezel"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                <div class="color-box" style="background-color: #751113;"></div>
            </div> -->
            </div>

        </div>

    </div>
    <!-- end-bezel-popup -->

    <!-- start-bezel-popup -->
    <div class="color-popup  watchbezel watchsix" data-id="6" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("bezel", 6, "bezel"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                <div class="color-box" style="background-color: #751113;"></div>
            </div> -->
            </div>

        </div>

    </div>
    <!-- end-bezel-popup -->

    <!-- start-bezel-popup -->
    <div class="color-popup  watchbezel watchseven" data-id="7" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("bezel", 7, "bezel"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                <div class="color-box" style="background-color: #751113;"></div>
            </div> -->
            </div>

        </div>

    </div>
    <!-- end-bezel-popup -->


    <!-- start-watch-wender-popup -->

    <div class="color-popup  watchwinder watch" data-id="1" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("winder", 1, "winder"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-watch-wender-popup -->

    <!-- start-watch-wender-popup -->

    <div class="color-popup  watchwinder watchtwo" data-id="2" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>



        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("winder", 2, "winder"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-watch-wender-popup -->





    <!-- start-watch-wender-popup -->

    <div class="color-popup  watchwinder watchthree" data-id="3" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("winder", 3, "winder"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-watch-wender-popup -->




    <!-- start-watch-wender-popup -->

    <div class="color-popup  watchwinder watchfour" data-id="4" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("winder", 4, "winder"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-watch-wender-popup -->



    <!-- start-watch-wender-popup -->

    <div class="color-popup  watchwinder watchfive" data-id="5" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("winder", 5, "winder"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-watch-wender-popup -->



    <!-- start-watch-wender-popup -->

    <div class="color-popup  watchwinder six" data-id="6" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("winder", 6, "winder"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-watch-wender-popup -->





    <!-- start-watch-wender-popup -->

    <div class="color-popup  watchwinder watchseven" data-id="7" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("winder", 7, "winder"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-watch-wender-popup -->





    <!-- start-watch-case-popup -->

    <div class="color-popup  watchwcases watchone" data-id="1" style="display: none;">
        <!-- start-toggle -->
        <label class="myswitch mySwitch2">
            <input type="checkbox">
            <span class="slider round"></span>
        </label>
        <!-- end-toggle -->

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">
            <div id="menCase">
                <!-- CASE FOR MEN -->
                <?php getDynamicCaseMen(1); ?>
                <!-- CASE FOR MEN -->
            </div>

            <div id="womenCase">
                <!-- CASE FOR WOMEN -->
                <?php getDynamicCaseWomen(1); ?>
                <!-- CASE FOR WOMEN -->
            </div>
            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("watchcase", 1, "case"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-watch-watches-popup -->


    <!-- start-watch-case-popup -->

    <div class="color-popup  watchwcases watchtwo" data-id="2" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("watchcase", 2, "case"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-watch-watches-popup -->


    <!-- start-watch-case-popup -->

    <div class="color-popup  watchwcases watchthree" data-id="3" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("watchcase", 3, "case"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-watch-watches-popup -->


    <!-- start-watch-case-popup -->

    <div class="color-popup  watchwcases watchfour" data-id="4" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("watchcase", 4, "case"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-watch-watches-popup -->

    <!-- start-watch-case-popup -->

    <div class="color-popup  watchwcases watchfive" data-id="5" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("watchcase", 5, "case"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-watch-watches-popup -->

    <!-- start-watch-case-popup -->

    <div class="color-popup  watchwcases watchsix" data-id="6" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("watchcase", 6, "case"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-watch-watches-popup -->

    <!-- start-watch-case-popup -->

    <div class="color-popup  watchwcases watchseven" data-id="7" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php getDynamicComponent("watchcase", 7, "case"); ?>
                <!--                     <div class="col-1 col-sm-12 p-0 m-0">
                        <div class="color-box" style="background-color: #751113;"></div>
                    </div> -->
            </div>

        </div>

    </div>
    <!-- end-watch-watches-popup -->


    <!-- start-watch-tip-popup -->

    <div class="color-popup watchtip" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM tip";
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


    <!-- start-watch-lumi-popup -->
    <div class="color-popup watchlumi" style-id="1" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM lumi where style_id=1";
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

    <!-- start-watch-lumi-popup -->
    <div class="color-popup watchlumi" style-id="2" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM lumi where style_id=2";
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


    <!-- start-watch-lumi-popup -->
    <div class="color-popup watchlumi" style-id="3" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM lumi where style_id=3";
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


    <!-- start-watch-lumi-popup -->
    <div class="color-popup watchlumi" style-id="4" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM lumi where style_id=4";
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


    <!-- start-watch-lumi-popup -->
    <div class="color-popup watchlumi" style-id="5" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM lumi where style_id=5";
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


    <!-- start-watch-lumi-popup -->
    <div class="color-popup watchlumi" style-id="6" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM lumi where style_id=6";
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

    <!-- start-watch-lumi-popup -->
    <div class="color-popup watchlumi" style-id="7" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM lumi where style_id=7";
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

    <!-- start-watch-lumi-popup -->
    <div class="color-popup watchlumi" style-id="8" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM lumi where style_id=8";
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

    <!-- start-watch-lumi-popup -->
    <div class="color-popup watchlumi" style-id="9" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM lumi where style_id=9";
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

    <!-- start-watch-lumi-popup -->
    <div class="color-popup watchlumi" style-id="10" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM lumi where style_id=10";
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

    <!-- start-watch-hour-hand-popup -->
    <!-- <div class="color-popup watch-hour-mint" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php

                $q = "SELECT *,(SELECT id FROM hour where minute.id = hour.id) AS hour_id,
            (SELECT name FROM hour where minute.id = hour.id) AS hour_name,
            (SELECT url FROM hour where minute.id = hour.id) AS hour_url FROM minute";
                $res = mysqli_query($mysqli, $q);
                foreach ($res as $rows) {

                    $id_min = $rows['id'];
                    $id_hour = $rows['hour_id'];
                    $name_min = $rows['name'];
                    $name_hour = $rows['hour_name'];
                    $url_min = $rows['url'];
                    $url_hour = $rows['hour_url'];
                    $color = $rows['color'];

                ?>

                    <div class="col-1 col-sm-12 p-0 m-0" onclick="document.getElementById('minHand').src='<?php echo $url_min ?>'; document.getElementById('hourHand').src='<?php echo $url_hour; ?>'; " class="text list-group-item col-xs-12  select-4" >
                        <div class="color-box" style="background-color:<?= $color; ?>"></div>
                    </div>

                <?php
                }
                ?>
            </div>

        </div>

    </div> -->
    <!-- end-watch-hour-hand-popup -->



    <!-- start-face-popup -->

    <div class="color-popup  watchface watchone" style="display: none;">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

            <div class="row mbl-width-clr p-0 m-0">
                <?php
                $q = "SELECT * FROM face";
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
                    <div class="col-7 model-box p-0 m-0 mySkull" role="button" data-skullid="<?= $id; ?>">
                        <img src="<?php echo $url; ?>" class="img-fluid">
                        <P class="model-text myfont"><?php echo $name; ?></P>
                    </div>
                <?php

                } ?>


            </div>

        </div>

    </div>
    <!-- end-right-model-popup -->

    <!-- start-right-model-popup -->
    <div class="right-popup skullParts" style="right: 20% !important;width: 10% !important;padding: 1% 2% 1%;display:none;">

        <div class="cls-btn">
            <i class="fas fa-times" aria-hidden="true"></i>
        </div>

        <!-- start-arrow -->
        <div class="arrow-collapse" style="width: 20%;left:-20%">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>
        <!-- end-arrow -->

        <div class="overflow-div">
            <div class="row justify-content-center p-0 m-0">
                <!-- DATA WILL BE ADDED BY JQUERY!!!! -->
            </div>
        </div>

    </div>
    <!-- end-right-model-popup -->


    <!-- start-right-model-popup -->
    <div class="color-popup skullColor" style="right: 30% !important;width: 7% !important;display:none;">

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


    <script type="text/javascript" src="newmyjs.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/summary.js"></script>
    <script src="./js/utility.js"></script>
    <script src="./js/navigation.js"></script>
    <script src="./js/html2canvas.js"></script>
    <script src="./js/canvas2image.js"></script>
    <script src="./js/nomanwork.js"></script>
    <script src="./js/skull-svg-data.js"></script>
</body>

<script>
    $(document).ready(function() {
        $("span#skull").html(getSkullData(1));
        let gId;
        $(`#skull svg g`).each(function() {
            if ($(this).attr("id") != undefined && $(this).attr("id") != "") {
                gId = $(this).attr("id");
                // console.log($(this).html());
                $(".skullParts").find(".row").append(`
                <div class="col-8 model-box p-5 m-0 skullLayer" data-layer="${gId}" style="background-color:${gId};" role="button">
                </div>
                <p class="text-white text-center">${gId} layer</p>
                `);
            }
        });

        $(document).on("click", ".mySkull", function() {
            let skullId = $(this).data("skullid");
            $("span#skull").html(getSkullData(skullId));
            $(".skullParts").find(".row").html('');
            $(`#skull svg g`).each(function() {
                if ($(this).attr("id") != undefined && $(this).attr("id") != "") {
                    gId = $(this).attr("id");
                    $(".skullParts").find(".row").append(`
                <div class="col-8 model-box p-5 mx-auto skullLayer" data-layer="${gId}" style="background-color:${gId};" role="button"></div>
                <p class="text-white text-center">${gId} layer</p>
                `);
                }
            });
            $(".skullParts").show();
        })

        let layer;
        $(document).on("click", ".skullLayer", function() {
            layer = $(this).attr("data-layer");
            $(".skullColor").find(".color-box").removeClass("active-clr");
            console.log($(".skullColor").show());
        });

        $(document).on("click", ".applyColorToSkull", function() {
            let color = $(this).data("color");
            $(".skull-svg g#" + layer).find("path").attr("fill", color);
        });

        $(document).on("click change", "#myRange", function() {
            let size = $(this).val();
            // console.log(size)
            // $("#skull").css("transform", `scale(${size},${size})`);
            if (size == 1)
                $("#skull svg").css("transform", "scale(0.6,0.6)");
            else if (size == 2)
                $("#skull svg").css("transform", "scale(0.8,0.8)");
            else if (size == 3)
                $("#skull svg").css("transform", "scale(1,1)");
            else if (size == 4)
                $("#skull svg").css("transform", "scale(1.1,1.1)");
        })

        // applying case and svg
        $(document).on("click", ".applyCase", function() {
            let w_id = $(this).data("watch");
            // console.log(w_id);
            // ($(".applyCase").hide());
            ($(".applyStrap").hide());
            ($(".applyBezel").hide());
            ($(".applyWinder").hide());
            let lumi_id, hands_id;
            let i = w_id - 1;
            if (w_id == 1) {
                $('#case').attr("src", './data/Case/men/steel1.png');
                $('#bezel').attr("src", './data/Bezel/1.png');
                $('#watchStrap').attr("src", './data/Strap/1.png');
                $('#winder').attr("src", './data/Winder/Steel1.png');
                hands_id = $("g#svg-min,g#svg-hour").attr("style-id");
                lumi_id = $("g#svg-lumi").attr("style-id");
                console.log($(`#desk-sx svg`).replaceWith(watch1));
                hands_id = $("g#svg-min,g#svg-hour").attr("style-id", hands_id);
                lumi_id = $("g#svg-lumi").attr("style-id", lumi_id);

            } else if (w_id == 2) {
                $('#case').attr("src", './data/Case/men/steel2.png');
                $('#bezel').attr("src", './data/Bezel/25.png');
                $('#watchStrap').attr("src", './data/Strap/22.png');
                $('#winder').attr("src", './data/Winder/Steel2.png');
                hands_id = $("g#svg-min,g#svg-hour").attr("style-id");
                lumi_id = $("g#svg-lumi").attr("style-id");
                console.log($(`#desk-sx svg`).replaceWith(watch2));
                hands_id = $("g#svg-min,g#svg-hour").attr("style-id", hands_id);
                lumi_id = $("g#svg-lumi").attr("style-id", lumi_id);

            } else if (w_id == 3) {
                $('#case').attr("src", './data/Case/men/steel3.png');
                $('#bezel').attr("src", './data/Bezel/29.png');
                $('#watchStrap').attr("src", './data/Strap/1.png');
                $('#winder').attr("src", './data/Winder/Steel3.png');
                hands_id = $("g#svg-min,g#svg-hour").attr("style-id");
                lumi_id = $("g#svg-lumi").attr("style-id");
                console.log($(`#desk-sx svg`).replaceWith(watch3));
                hands_id = $("g#svg-min,g#svg-hour").attr("style-id", hands_id);
                lumi_id = $("g#svg-lumi").attr("style-id", lumi_id);

            } else if (w_id == 4) {
                $('#case').attr("src", './data/Case/men/steel4.png');
                $('#bezel').attr("src", './data/Bezel/33.png');
                $('#watchStrap').attr("src", './data/Strap/43.png');
                $('#winder').attr("src", './data/Winder/Steel4.png');
                hands_id = $("g#svg-min,g#svg-hour").attr("style-id");
                lumi_id = $("g#svg-lumi").attr("style-id");
                console.log($(`#desk-sx svg`).replaceWith(watch4));
                hands_id = $("g#svg-min,g#svg-hour").attr("style-id", hands_id);
                lumi_id = $("g#svg-lumi").attr("style-id", lumi_id);

            } else if (w_id == 5) {
                $('#case').attr("src", './data/Case/men/steel5.png');
                $('#bezel').attr("src", './data/Bezel/37.png');
                $('#winder').attr("src", './data/Winder/steel5.png');
                $('#watchStrap').attr("src", './data/Strap/64.png');
                hands_id = $("g#svg-min,g#svg-hour").attr("style-id");
                lumi_id = $("g#svg-lumi").attr("style-id");
                console.log($(`#desk-sx svg`).replaceWith(watch5));
                hands_id = $("g#svg-min,g#svg-hour").attr("style-id", hands_id);
                lumi_id = $("g#svg-lumi").attr("style-id", lumi_id);

            } else if (w_id == 6) {
                $('#case').attr("src", './data/Case/men/steel6.png');
                $('#bezel').attr("src", './data/Bezel/41.png');
                $('#watchStrap').attr("src", './data/Strap/85.png');
                $('#winder').attr("src", './data/Winder/steel6.png');
                hands_id = $("g#svg-min,g#svg-hour").attr("style-id");
                lumi_id = $("g#svg-lumi").attr("style-id");
                console.log($(`#desk-sx svg`).replaceWith(watch6));
                hands_id = $("g#svg-min,g#svg-hour").attr("style-id", hands_id);
                lumi_id = $("g#svg-lumi").attr("style-id", lumi_id);

            } else if (w_id == 7) {
                $('#case').attr("src", './data/Case/men/steel7.png');
                $('#bezel').attr("src", './data/Bezel/45.png');
                $('#watchStrap').attr("src", './data/Strap/106.png');
                $('#winder').attr("src", './data/Winder/steel7.png');
                hands_id = $("g#svg-min,g#svg-hour").attr("style-id");
                lumi_id = $("g#svg-lumi").attr("style-id");
                console.log($(`#desk-sx svg`).replaceWith(watch7));
                hands_id = $("g#svg-min,g#svg-hour").attr("style-id", hands_id);
                lumi_id = $("g#svg-lumi").attr("style-id", lumi_id);

            }
        })

    });
</script>

<script>
    $(document).ready(() => {
        // Screen Shot Function
        document.querySelector('.screenShotBtn').addEventListener('click', function() {
            html2canvas(document.getElementById("desk-sx"), {
                backgroundColor: null
            }).then(function(canvas) {
                document.body.appendChild(canvas);
                Canvas2Image.saveAsPNG(canvas);
                (document.body.removeChild(canvas));
            });
        });
    });
</script>

<!-- <script type="text/javascript">
    $(document).ready(function () {
$(document).on('click','.applyCase',function () {
    w_id = $(this).attr('data-watch');
   console.log("<?php echo $global ?>" = w_id);
    })
})
</script> -->
</body>

</html>