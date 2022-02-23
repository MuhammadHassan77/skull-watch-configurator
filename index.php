<?php require_once("./func.php");

// FETCHING DATA ON BEHALF PARTICULAR ID
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $q = "SELECT * FROM savechanges WHERE id=" . $id;

    $result = mysqli_query($mysqli, $q);

    if ($result) {

        foreach ($result as $rows) {
            $w_id = $rows['watch_id'];
            $bezel = $rows['bezel'];
            $case = $rows['watchcase'];
            $face = $rows['face'];
            $lumi = $rows['lumi'];
            $tip = $rows['tip'];
            $hour = $rows['hour'];
            $min = $rows['min'];
            $sec_hands = $rows['second_hand'];
            $skull = $rows['skull'];
            $strap = $rows['strap'];
            $winder = $rows['winder'];
            // echo $skull;
            // exit;
        }
    }
    // $skull = '{ "pngStyle" : "none" ,"pngSize" : "none" , "pngSkullSrc" : "./data/Skull/skull 60.png" ,
    //     "handStyleId" : "2" ,"sechandStyleId" : "2" , "lumiStyleId" : "1" ,
    //     "sechandStyle" : "inline" , "tipStyle" : "none" ,"lumiStyle" : "none" ,  "svgId" : "64" , "svgSize" : "matrix(1.48, 0, 0, 1.48, 0, 0)" , "purple" : "#ff1e26", "gold" : "#E96558", "yellow" : "#FBD373", "skyblue" : "#8DCCC0", "grey" : "#F0EADE" }';
}
// $s = '{ "pngSkull" : "none" , "pngSkullSrc" : "./data/Skull/skull 14.png" , "svgId" : "1" , "white" : "#4f8dfe", "orange" : "#0d4f21", "blue" : "#3D4C96", "black" : "#ff6600", "yellow" : "#dc0058", "pink" : "#013ba7", "green" : "#ffff01", "red" : "#013ba7"}';
// echo "<script>console.log({$s})</script>";

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
    <link href="./scss/mystyle.css" rel="stylesheet">
    <script src="./js/svg-data.js"></script>

    <title>Watch</title>

</head>

<body style="overflow: hidden;">
    <!-- PAGE LOADER -->
    <div id="loader" class="">
        <div class="loading-page">
            <div class="counter text-white text-center">
                <h2>Loading Model</h2>
                <h1>0%</h1>
                <hr style="width: 100%;height:5px;color:red;">
            </div>
        </div>

        <!-- <img class="loader-img" src="./img/loader.gif" alt="loader"> -->
        <!-- <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.315px" height="122.88px" viewBox="0 0 122.315 122.88" enable-background="new 0 0 122.315 122.88" xml:space="preserve">
            <g>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M94.754,14.534c8.844,0,16.014,7.17,16.014,16.012 c0,8.844-7.17,16.015-16.014,16.015c-8.843,0-16.013-7.17-16.013-16.015C78.741,21.704,85.911,14.534,94.754,14.534L94.754,14.534z M109.265,52.121c-7.205,0-13.049,5.844-13.049,13.048c0,7.207,5.844,13.049,13.049,13.051c7.207,0,13.051-5.844,13.051-13.051 C122.315,57.965,116.472,52.121,109.265,52.121L109.265,52.121z M94.135,89.903c-5.032,0-9.114,4.082-9.114,9.113 c0,5.032,4.082,9.114,9.114,9.114c5.031,0,9.113-4.082,9.113-9.114C103.248,93.985,99.166,89.903,94.135,89.903L94.135,89.903z M59.275,104.65c-5.032,0-9.114,4.081-9.114,9.113c0,5.034,4.082,9.116,9.114,9.116s9.113-4.082,9.113-9.116 C68.389,108.731,64.308,104.65,59.275,104.65L59.275,104.65z M23.652,90.86c-4.717,0-8.54,3.823-8.54,8.54 c0,4.715,3.823,8.54,8.54,8.54c4.714,0,8.538-3.825,8.538-8.54C32.19,94.684,28.366,90.86,23.652,90.86L23.652,90.86z M9.096,54.872C4.072,54.872,0,58.944,0,63.968c0,5.021,4.072,9.093,9.096,9.093c5.021,0,9.093-4.072,9.093-9.093 C18.189,58.944,14.116,54.872,9.096,54.872L9.096,54.872z M23.652,17.026c-6.354,0-11.508,5.155-11.508,11.509 s5.154,11.506,11.508,11.506s11.506-5.152,11.506-11.506S30.006,17.026,23.652,17.026L23.652,17.026z M59.341,0 c-7.651,0-13.858,6.205-13.858,13.855c0,7.651,6.207,13.856,13.858,13.856s13.856-6.205,13.856-13.856 C73.197,6.205,66.992,0,59.341,0L59.341,0z"></path>
            </g>
        </svg> -->
    </div>
    <!-- PAGE LOADER END -->

    <!-- start-header -->
    <div class="row p-0 m-0">
        <div class="col-12 p-0 m-0">
            <div class="logo-text-1">Mwnn</div>
            <div class="myfont tabs" style="position: relative; z-index: 2;">
                <span style="z-index: 10000;" class="style-1 style-box-btn stylewatch">Click to Change</span>
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

            <!-- <div class="my-option d-sm-none" style="display: none;">
                    <i class="fa fa-chevron-left arrow left"></i>
                    <i class="fa fa-chevron-right arrow right"></i>
                </div> -->


            <!-- start-dot-menu -->
            <div class="dot-menu">
                <!-- <span class="dot-btn"><i class="fas fa-circle"></i></span> -->
                <div class="dropdown config-drp dropstart">
                    <a class="btn p-0 m-0 w-100" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="dot-btn">
                            <img src="img/plus2.svg" class="img-fluid plus2 mx-auto">
                            <img src="img/plus.svg" class="img-fluid plus1">
                            <p>Configure</p>
                        </div>
                    </a>

                    <ul class="dropdown-menu dot" aria-labelledby="dropdownMenuLink">
                        <li><a style-id="1" data-watch="svg-lumi" class="dropdown-item newControlMenu" href="javascript:void(0)">Hand Lumi</a></li>
                        <li><a data-watch="svg-tip" class="dropdown-item newControlMenu" href="javascript:void(0)">Hand Tips</a></li>
                        <li><a class="dropdown-item hand-style" href="javascript:void(0)">Hands Style</a></li>
                        <li><a style-id="1" data-watch="svg-hands" class="dropdown-item newControlMenu" href="javascript:void(0)">Hands Color</a></li>
                        <li><a class="dropdown-item case-style" href="javascript:void(0)">Case Style</a></li>
                        <li><a data-watch="svg-case" class="dropdown-item newControlMenu" href="javascript:void(0)">Case Color</a></li>
                        <li><a data-watch="svg-strap" class="dropdown-item newControlMenu" href="javascript:void(0)">Straps</a></li>
                        <li><a class="dropdown-item second-hand-style" href="javascript:void(0)">Second Hand Style</a></li>
                        <li class="toggleSec_hand">
                            <a style-id="1" data-watch="svg-sechand" class="dropdown-item newControlMenu" href="javascript:void(0)">Second Hand Color</a>
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
                        <img id="watchStrap" src="<?php echo (!empty($strap)) ? $strap : './data/Strap/105.png'; ?>" alt="" class="img-responsive" />
                        <img id="winder" src="<?php echo (!empty($winder)) ? $winder : './data/Winder/black6.png'; ?>" alt="" class="img-responsive " />
                        <img id="case" src="<?php echo (!empty($case)) ? $case : './data/Case/men/black6.png'; ?>" alt="" class="img-responsive" />
                        <img id="face" src="<?php echo (!empty($face)) ? $face : './data/Face/21.png'; ?>" alt="" class="img-responsive" />
                        <img id="bezel" src="<?php echo (!empty($bezel)) ? $bezel : './data/Bezel/38.png'; ?>" alt="" class="img-responsive" />
                        <img id="pngSkull" src="./data/Skull/skull 66.png" class="img-responsive">
                        <span id="skull" class="img-responsive">
                            <!-- DATA WILL BE SHOWN BY JQUERY -->
                        </span>
                        <img id="hourHand" src="<?php echo (!empty($hour)) ? $hour : './data/Hands/21.png'; ?>" alt="" class="img-responsive " />
                        <img id="minHand" src="<?php echo (!empty($min)) ? $min : './data/Hands/21.png'; ?>" alt="" class="img-responsive " />
                        <img id="handTip" src="<?php echo (!empty($tip)) ? $tip : './data/Hand tip/21.png'; ?>" alt="" class="img-responsive " />
                        <img id="handLumi" src="<?php echo (!empty($lumi)) ? $lumi : './data/Hand lumi/17.png'; ?>" alt="" class="img-responsive " />
                        <img id="bolt" src="./data/Bolt/bolt.png" alt="" class="img-responsive" />
                        <img id="secHand" src="<?php echo (!empty($sec_hands)) ? $sec_hands : './data/Second hand/21.png'; ?>" alt="" class="img-responsive " />
                        <!-- OVERLAYED WATCH SVG -->
                        <?php
                        if (!empty($w_id)) {
                            echo "<script class='svgscript'>document.write(watch" . $w_id . ")</script>";
                        } else {
                            echo "<script class='svgscript'>document.write(watch6)</script>";
                        }
                        ?>
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
            <div class="row justify-content-center p-0 m-0 skullTypeSelection">
                <div class="col-10 skull-btn-main">
                    <h3 class="model-text myfont">Editable Skull</h3>
                    <p>In this section you'll be able to change Skull with your own Coloring Customized Parts!</p>
                    <button type="button" class="btn showSvgSkull">Editable skull</button>
                </div>
                <div class="col-10 skull-btn-main">
                    <h3 class="model-text myfont">Non Editable</h3>
                    <p>In this section you'll not be able to customized any single part of Skull color in it! you'll get pre made, preset skull collections here.</p>
                    <button type="button" class="btn showPngSkull">Non Editable</button>
                </div>
            </div>
            <div class="row justify-content-center p-0 m-0 skullSelection">
                <?php
                $res = mysqli_query($mysqli, "SELECT * FROM skull where type='svg' ORDER BY id desc");

                foreach ($res as $rows) {
                    $id = $rows['id'];
                    $name = $rows['name'];
                    $url = $rows['url'];
                    $type = $rows['type'];

                ?>
                    <div class="col-7 model-box p-0 m-0 mySkull d-none" role="button" data-skullid="<?= $id; ?>" data-url="<?= $url; ?>">
                        <img src="<?= $url; ?>" class="img-fluid">
                        <p class="model-text myfont"><?= $name; ?></p>
                    </div>
                <?php } ?>

                <?php
                $res = mysqli_query($mysqli, "SELECT * FROM skull where type='png'  ORDER BY id desc");

                foreach ($res as $rows) {
                    $id = $rows['id'];
                    $name = $rows['name'];
                    $url = $rows['url'];
                    $type = $rows['type'];

                ?>
                    <div class="col-7 model-box p-0 m-0 skullPng d-none" role="button" data-url="<?= $url; ?>">
                        <img src="<?= $url; ?>" class="img-fluid">
                        <p class="model-text myfont"><?= $name; ?></p>
                    </div>

                <?php } ?>

                <?php
                // $count = countFiles("./data/Skull_old/");
                // $names = getFileNames("./data/Skull_old/");
                // $a = countFiles("./data/Skull/");
                // for ($i = 0; $i < $count; $i++) {
                //     echo '<div class="col-7 model-box p-0 m-0 skullPng" role="button" data-url="./data/Skull_old/' . $names[$i] . '">
                //         <img src="./data/Skull_old/' . $names[$i] . '" class="img-fluid">
                //         <p class="model-text myfont">Skull ' . ++$a . '</p>
                //     </div>';
                // }
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

            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changes-modal">
                Launch demo modal
            </button>-->

            <div class="col-12 zoom-btns p-0 m-0 " id="zoomIn">
                <i class="fas fa-plus"></i>
            </div>

            <div class="col-12 zoom-btns p-0 m-0" id="zoomOut">
                <i class="fas fa-minus"></i>
            </div>

            <div class="col-12 icons1 p-0 m-0">
                <img src="img/plus.svg" class="img-fluid zoom-op w-75">
            </div>

            <div class="col-12 icons1 p-0 m-0 resetCanvas">
                <img src="img/reset.png" class="img-fluid w-75">
            </div>

            <div class="col-12 icons1 p-0 m-0 createLink">
                <i class="fa fa-globe"></i>
            </div>

            <div class="col-12 icons1 p-0 m-0 screenShotBtn">
                <img src="img/download.svg" class="img-fluid w-75">
            </div>

            <div class="col-12 icons1 p-0 m-0">
                <p class="logo-text p-0 m-0">Mwnn</p>
            </div>

        </div>
    </div>
    <!-- end-left-icons -->

    <!-- HIDDEN FIElDS -->
    <input type="hidden" id="skullDetails" value='<?= !empty($skull) ? $skull : '' ?>'>

    <!-- HIDDEN FIElDS -->

    <!-- CHANGES MODAL -->
    <div class="modal fade" id="changes-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Save Changes</h5>
                    <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="changesNotify"></div>
                    <div class="form-group">
                        <label for="saveChanges">Click Ok to open with Save Changes.</label>
                        <input type="text" class="form-control" id="saveChanges" readonly />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary mybtn2" id="applyChangesBtn">Ok</button>
                    <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- CHANGES MODAL END -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>-->


    <script src="./js/main.js"></script>
    <script src="./newmyjs.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/html2canvas.js"></script>
    <script src="./js/canvas2image.js"></script>
    <!-- <script src="./js/skull-svg-data.js"></script> -->
</body>

<script>
    function getSkullData(imgId) {
        $.get(`./data/Skull/skull ${imgId}.svg`, null, function(data) {
            let svgdata = $(data).find("svg")[0];
            $(svgdata).attr({
                "id": imgId,
                "width": "723px",
                "height": "1040px"
            })
            $("span#skull").html(svgdata);

        });
    }

    function getSkullDetails() {

        let svgId = $("span#skull svg").attr("id");
        let svgSize = $("span#skull svg").css("transform");

        // let pngSkullSrc = $("#pngSkull").attr("src");
        // detail = "{";
        // detail += ` "pngSkullSrc" : "${pngSkullSrc}" ,`;
        // detail += ` "pngStyle" : "${pngStyle}" , "pngSkullSrc" : "${pngSkullSrc}" ,`;

        detail = ` "svgId" : "${svgId}" ,`;
        detail += ` "svgSize" : "${svgSize}" ,`;
        $("#skull svg g").each(function() {
            if ($(this).attr("id") != undefined) {
                let key = $(this).attr("id");
                let value = $(this).find("path").attr("fill");
                detail += ` "${$(this).attr("id")}" : "${$(this).find("path").attr("fill")}",`;
            }
        });
        detail = detail.substr(0, detail.lastIndexOf(","))
        // detail += " }";
        $("#skullDetails").val(detail);
        // console.log(detail);

    }
</script>

<!-- INSERTING SKULL SVG AND ITS FUNCTION HANDLING   -->
<script>
    $(document).ready(function() {
        // $("span#skull").html(getSkullData(1));


        <?php if (!empty($skull)) { ?>
            let s = JSON.parse(`<?= $skull ?>`);
            // let s = JSON.parse(``);
            console.log(s);
            getSkullData(s['svgId']);
            $("#zoomOut").trigger("click");

            $("#handTip,.watch-svg g#svg-tip").css("display", s['tipStyle']);
            $("#handLumi,.watch-svg g#svg-lumi").css("display", s['lumiStyle']);
            $("#secHand,.watch-svg g#svg-sechand").css("display", s['sechandStyle']);

            $(".watch-svg g#svg-lumi").attr("style-id", s['lumiStyleId']);
            $(".watch-svg g#svg-hour,.watch-svg g#svg-min,.newControlMenu[data-watch='svg-hands']").attr("style-id", s['handStyleId']);
            $(".watch-svg g#svg-sechand,.newControlMenu[data-watch='svg-sechand']").attr("style-id", s['sechandStyleId']);


            if (s['pngStyle'] == "none") {
                $("#pngSkull").attr("src", s['pngSkullSrc']);
                $("#pngSkull").hide();
                setTimeout(() => {
                    $(`#skull svg#${s['svgId']} g`).each(function() {
                        if ($(this).attr("id") != undefined) {
                            let key = $(this).attr("id");
                            let value = $(this).find("path").attr("fill");
                            // console.log("key=>" + key, "\t\tvalue=>" + value, "\t\ts[key]=>" + s[key])
                            if (value != s[key])
                                $(this).find("path").attr("fill", s[key]);
                        }
                    });
                    $(`#skull svg`).css("transform", s['svgSize']);
                    $(".resetCanvas").trigger("click");
                }, 500);
                $("span#skull").show();
            } else if (s['pngStyle'] == "block") {
                $("span#skull").hide();
                $("#pngSkull").attr("src", s['pngSkullSrc']);
                $("#pngSkull").css("transform", s['pngSize']);
                $(".resetCanvas").trigger("click");
                $("#pngSkull").show();
            }

        <?php  } else { ?>
            // getSkullData(1);
            // setTimeout(() => {
            //     $("span#skull svg").hide();
            // }, 1000);
        <?php  } ?>

        // $("#secHand,g#svg-sechand").hide();
        // $("#loader").addClass("d-none");
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

            // $("span#skull").html(getSkullData(skullId));
            getSkullData(skullId);

            setTimeout(() => {

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

                getSkullDetails();
                var div = $(".tail img,.tail svg");
                startAnimation(div);
            }, 200);

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
        let detail;
        $(document).on("click", ".applyColorToSkull", function() {
            let color = $(this).data("color");
            $("#skull svg g#" + layer).find("path").attr("fill", color);

            getSkullDetails();
        });

        $(document).on("click", ".skullPng", function() {
            $("#skull,.skullParts,.skullColor").hide();
            $("img#pngSkull,#myRange").show();
            let url = $(this).data("url");
            $("img#pngSkull").attr("src", url);
            var div = $(".tail img,.tail svg");
            startAnimation(div);
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
        $(".svgscript").remove();

        // applying case and svg
        $(document).on("click", ".applyCase", function() {
            let w_id = $(this).data("watch");
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

        $(document).on("click", ".close-modal", function() {
            $(this).parent().parent().parent().parent().css('opacity', '0');
            $(this).parent().parent().parent().parent().hide();
        })

        $(document).on("click", ".resetCanvas", function() {
            $("#zoomOut").trigger("click");
            $(this).css("background-color", "inherit");
        })

        // Screen Shot Function
        document.querySelector('.screenShotBtn').addEventListener('click', function() {
            $("#zoomOut").trigger("click");
            $("#loader").removeClass("d-none");
            let c = 0;
            let i = setInterval(function() {
                $(".loading-page .counter h1").html(c + "%");
                $(".loading-page .counter hr").css("width", c + "%");
                c++;
                if (c == 101) {
                    clearInterval(i);
                    $("#loader").addClass("d-none");
                }
            }, 40);

            setTimeout(() => {
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

</html>