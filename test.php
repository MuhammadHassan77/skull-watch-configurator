<?php require_once("./func.php");


$res = mysqli_query($mysqli, "SELECT DISTINCT style_id FROM hands");
$hands_style = array();
foreach ($res as $rows) {
    $style_id = $rows['style_id'];
    $sql = "(SELECT url from hands where style_id=" . $rows['style_id'] . " LIMIT 1) AS url" . $rows['style_id'];

    $res = mysqli_query($mysqli, "SELECT url,$sql FROM hands LIMIT 1");
    foreach ($res as $rows) {
        $hands_style[] = $rows["url" . $style_id] . ",";
?>
        <div class="col-11 model-box p-0 m-0 bothhands" style-id="<?= $hands_style[$style_id]; ?>">
            <img src="<?= str_replace(",", "", $hands_style[--$style_id]); ?>" class="img-fluid">
            <P class="model-text myfont">Hands <?= ++$style_id; ?></P>
        </div>
<?php }
} ?>
<?php
// print_r($hands_style);
exit;
// echo sizeof($hands_style);
$j = 1;
for ($i = 0; $i < sizeof($hands_style); $i++) {
?>
    <div class="col-11 model-box p-0 m-0 bothhands" style-id="<?= $j; ?>">
        <img src="<?= str_replace(",", "", $hands_style[$i]); ?>" class="img-fluid">
        <P class="model-text myfont">Hands 1</P>
    </div>
<?php $j++;
}
exit;


$q = "SELECT DISTINCT style_id from hands";
$res = mysqli_query($mysqli, $q);
foreach ($res as $rows) {
    // $id = $rows['id'];
    // $name = $rows['name'];
    $style_id = $rows['style_id'];
    // $url = $rows['url'];
    // $url2 = $rows['url2'];
    // $url3 = $rows['url3'];
?>
    <!-- start-hands-popup -->
    <div class="color-popup watchhands" style-id="<?= $style_id; ?>">

        <div class="arrow-collapse">
            <div class="ac-inner">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
        </div>

        <div class="overflow-div">

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
                <?php

                }
                ?>
            </div>

        </div>

    </div>
    <!-- end-hands-popup -->
<?php } ?>

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


<!-- INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 24','./data/Second hand/24.png','#751113',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 25','./data/Second hand/25.png','#ff1e26',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 26','./data/Second hand/26.png','#ff6600',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 27','./data/Second hand/27.png','#feba27',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 28','./data/Second hand/28.png','#ffff01',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 29','./data/Second hand/29.png','#0d4f21',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 30','./data/Second hand/30.png','#65ff00',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 31','./data/Second hand/31.png','#47d4e5',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 32','./data/Second hand/32.png','#4f8dfe',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 33','./data/Second hand/33.png','#013ba7',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 34','./data/Second hand/34.png','#ddb168',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 35','./data/Second hand/35.png','#976005',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 36','./data/Second hand/36.png','#8e00ce',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 37','./data/Second hand/37.png','#dc0058',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 38','./data/Second hand/38.png','#ffa7cf',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 39','./data/Second hand/39.png','#ff4864',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 40','./data/Second hand/40.png','#ffffff',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 41','./data/Second hand/41.png','#c0c0c0',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 42','./data/Second hand/42.png','#9a9a9a',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 43','./data/Second hand/43.png','#4e2700',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 44','./data/Second hand/44.png','#000000',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 45','./data/Second hand/45.png','#F4CC71',7);

INSERT INTO second_hand(name,url,style_id) VALUES('Seccond Hand 46','./data/Second hand/46.png','#F2B28F',7); -->

<!-- page 18.5 54 products -->
<!-- page 18.5 to 20 = 30 products -->
<!-- page 21 to 23.25  = 27 products -->
<!-- page  23.25 to 27 = 35 products -->
<!-- page 27 to 29 ki product # 7 = 19 products -->
<!-- page 29 ki product # 7 to 30 = 20 products -->
<!-- page 31  = 12 products -->
<!-- page 32 to 35  = 48 products -->
<!-- page 36 to 39 = 468 all done products -->

<!DOCTYPE html>
<html>

<head>
    <title>3D Configurator by GDH | 3dsium.com</title>

    <style type="text/css">
        #player {
            width: 100%;
            height: 600px;
            border: 1px solid transparent !important;
        }

        #codepen {
            position: fixed;
            top: 0;
            right: 0;
            margin: 5px;
        }

        #content input {
            border: 2px solid #566963;
            font-family: Arial;
            font-size: 15px;
            padding: 5px;
        }

        button,
        select {
            box-shadow: inset 0px 1px 3px 0px #91b8b3;
            background-color: #768d87;
            border-radius: 5px;
            border: 1px solid #566963;
            display: block;
            cursor: pointer;
            color: #ffffff;
            font-family: Arial;
            font-size: 15px;
            font-weight: bold;
            padding: 8px 16px;
            text-decoration: none;
            text-shadow: 0px -1px 0px #2b665e;
            margin: 5px;
        }

        button:hover {
            background-color: #6c7c7c;
        }

        button:active {
            position: relative;
            top: 1px;
        }

        button:disabled {
            background-color: blue;
            text-shadow: none;
            box-shadow: none;
            border-width: 0px;
            color: #ccc;
        }

        button:focus {
            outline: none;
        }

        .roundedButton {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            background-size: contain;
            display: inline-block;
        }

        .highlight {
            color: red;
        }

        hr {
            clear: left;
        }

        .roundedImg {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            background-size: contain;
            display: inline-block;
            cursor: pointer;
            margin: 5px;
            border: 3px solid #566963;
        }

        .outline {
            border: 1px solid blue;
        }

        span,
        svg {
            display: none !important;
        }

        .color-box {
            cursor: pointer;
        }
    </style>
    <script src="https://clara.io/js/claraplayer.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <div id="content" class="col-md-12 container-fluid p-0">

        <div id="player" class="col-md-12 float-left">

        </div>
        <div class="w-100 postion-fixed d-flex justify-content-center">
            <div class="float-left ml-1 color-box" style="background-color: #00a6a6; height: 25px; width: 25px; color: transparent; border-radius:50px; margin-top: 20px;" data-color="#00a6a6">c</div>
            <div class="float-left ml-1 color-box" style="background-color: #ff8400; height: 25px; width: 25px; color: transparent; border-radius:50px; margin-top: 20px;" data-color="#ff8400">c</div>
            <div class="float-left ml-1 color-box" style="background-color: #ea0000; height: 25px; width: 25px; color: transparent; border-radius:50px; margin-top: 20px;" data-color="#ea0000">c</div>
            <div class="float-left ml-1 color-box" style="background-color: #3a69d5; height: 25px; width: 25px; color: transparent; border-radius:50px; margin-top: 20px;" data-color="#3a69d5">c</div>
        </div>


    </div>




    <!-- <input type="color" name="color" id="color">
<button class="color-box2">click</button> -->

<script>
    var sceneId = '6f5c5f23-1741-4bf4-a936-82b603f0702f';
    var api = claraplayer('player');
    api.sceneIO.fetchAndUse(sceneId);
    api.on('loaded', function() {
        console.log('Player is loaded and ready');

    });
    //Change Color

    //->hexToRGB(c)  its a separate function to convert hexa color to RGB

    $('.color-box').click(function() {
        var hex_color = $(this).data('color');
        material = 'Physical';
        c = hex_color.replace('#', '0x');
        color_change = hexToRGB(c)

        api.scene.set({
            name: material,
            plug: 'Material',
            property: 'baseColor'
        }, {
            r: color_change[0] / 255,
            g: color_change[1] / 255,
            b: color_change[2] / 255
        });


    })


    //Color change end


    //Convert a hexidecimal color string to 0..255 R,G,B


    hexToRGB = function(hex) {
        var r = hex >> 16;
        var g = hex >> 8  & 0xFF;
        var b = hex & 0xFF;
        return [r, g, b];
    }


    //hexToRGB end
</script>
</body>

</html>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->


