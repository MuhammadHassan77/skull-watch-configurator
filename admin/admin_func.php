<?php

$mysqli = new mysqli("localhost", "root", "", "watchnewhere");

// $mysqli = new mysqli("localhost", "mwnn", "SGvGx3i3KWTSiBteCNwF", "wp_mwnn");

// $mysqli = new mysqli("localhost", "u538897927_watchv5", "!egvfvM2", "u538897927_watchv5");

session_start();


// // Turn off all error reporting
// error_reporting(0);

// //Report simple running errors
// error_reporting(E_ERROR | E_WARNING);

function getFileNames($folderPath)
{
    $fileNames = array();
    if ($handle = opendir($folderPath)) {

        while (false !== ($entry = readdir($handle))) {

            if ($entry != "." && $entry != "..") {
                $fileNames[] = $entry;
                // echo "$entry" . "<br>";
            }
        }
        return $fileNames;

        closedir($handle);
    }
}


function countFiles($folderPath)
{
    $dir = opendir($folderPath); # This is the directory it will count from
    $i = 0; # Integer starts at 0 before counting

    # While false is not equal to the filedirectory
    while (false !== ($file = readdir($dir))) {
        if (!in_array($file, array('.', '..')) && !is_dir($file)) $i++;
    }
    return $i;
    // echo "There were $i files"; # Prints out how many were in the directory
}
// print_r(countFiles("./data/Face"));


// ENCRPYTION EMAIL
function encrypt($password)
{
    // Store the cipher method 
    $ciphering = "AES-128-CTR";

    // Use OpenSSl Encryption method 
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;

    // Non-NULL Initialization Vector for encryption 
    $encryption_iv = '1234567891011121';

    // Store the encryption key 
    $encryption_key = "scraping";

    // Use openssl_encrypt() function to encrypt the data 
    $encrypt_pass = openssl_encrypt(
        $password,
        $ciphering,
        $encryption_key,
        $options,
        $encryption_iv
    );

    return $encrypt_pass;
}

// echo encrypt("m.hassanshaikh77@gmail.com");

function decrypt($encrypt_pass)
{
    $ciphering = "AES-128-CTR";

    $options = 0;

    // Non-NULL Initialization Vector for decryption 
    $decryption_iv = '1234567891011121';

    // Store the decryption key 
    $decryption_key = "scraping";

    // Use openssl_decrypt() function to decrypt the data 
    $decrypt_pass = openssl_decrypt(
        $encrypt_pass,
        $ciphering,
        $decryption_key,
        $options,
        $decryption_iv
    );

    return $decrypt_pass;
}
// echo decrypt("ZmdmgRzOr8haTw==");
// exit;

function getDynamicComponent($table, $element)
{
    global $mysqli;
    $q = "SELECT * FROM $table";
    $res = mysqli_query($mysqli, $q);
    foreach ($res as $rows) {
        $id = $rows['id'];
        $name = $rows['name'];
        $url = $rows['url'];
        echo '
			<li onclick="document.getElementById(\'' . $element . '\').src=\'' . $url . '\'"
				class="list-group-item d-flex justify-content-between align-items-center">
						<img class="img-circle" width="150" alt=""src="' . $url . '">	
                      <h6>' . $name . '</h6>
			</li>';
    }
}


if (isset($_POST['act']) && $_POST['act'] == "adminlogin") {
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {

        $q = "SELECT * FROM admin WHERE email='" . $_POST["email"] . "' AND password='" . encrypt($_POST["password"]) . "'";

        $result = mysqli_query($mysqli, $q);
        if ($result->num_rows === 1) {
            foreach ($result as $rows) {
                // session_start();
                $_SESSION["admin_id"] = $rows["id"];
                $_SESSION["admin_email"] = $rows["email"];
                // $id = $_SESSION["id"];
                // $email = $_SESSION["email"];
            }
            echo "success";
        } else {
            echo "error";
        }
    }
} elseif (isset($_POST['act']) && $_POST['act'] == "updateComponent") {
    if (!empty($_POST["com_id"]) && !empty($_POST["com_name"]) && !empty($_POST["table_name"])) {
        $id = $_POST['com_id'];
        $name = $_POST['com_name'];
        $table = $_POST['table_name'];
        $q = "UPDATE $table SET name='" . $name . "' WHERE id='" . $id . "' ";

        $res = mysqli_query($mysqli, $q);
        if ($res) echo "success";
        else echo "error";
    }
} elseif (isset($_POST['act']) && $_POST['act'] == "adminlogout") {

    unset($_SESSION["admin_id"]);
    unset($_SESSION["admin_email"]);
    // $destroyed = session_destroy();

    // if ($destroyed) echo "success";
    if (empty($_SESSION['admin_id']) && empty($_SESSION['admin_email'])) echo "success";
    else echo "error";
} elseif (isset($_POST['act']) && $_POST['act'] == "deleteComponent") {
    $id = $_POST['componentId'];
    $table = $_POST['table'];
    // print_r($_POST);

    $res = mysqli_query($mysqli, "DELETE FROM $table WHERE id=$id");
    if ($res) {
        echo "success";
    } else {
        echo "error";
    }
}



// UPLOADING WATCH COMPONENTS HANDLING
if (isset($_FILES) && !empty($_FILES)) {
    if ($_GET['act'] == "uploadBezel") {
        $valid_extensions = array('png');
        // valid extensions
        // print_r($_FILES);
        // print_r($_POST);
        // exit;


        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['Bezel']['name'], PATHINFO_EXTENSION));

        // checking file with same exists???
        if (in_array($_FILES['Bezel']['name'], getFileNames("./data/Bezel/"))) {
            echo '{ "result" : "Error" }';
        } else {
            // check's valid format 
            if (in_array($ext, $valid_extensions) && !empty($_POST['watch'])) {

                $Bezel = pathinfo($_FILES['Bezel']['name']);

                $watchId = $_POST['watch'];

                if (empty($_POST['color']))
                    $color = $_POST['newColor'];
                else if (empty($_POST['newColor']))
                    $color = $_POST['color'];

                // counting files in folder
                // $i = countFiles("./data/Bezel");
                // giving desired name to file 
                // $Bezel =  ++$i . "." . $ext;

                $Bezel =  strtolower($_FILES['Bezel']['name']);
                $name = substr($Bezel, 0, strpos($Bezel, ".png"));

                $q = "INSERT INTO bezel(name,url,color,watch_id)
                VALUES('" . $name . "','./data/Bezel/" . $Bezel . "','" . $color . "','" . $watchId . "' )";
                $res = mysqli_query($mysqli, $q);
                // echo $q; exit;

                //Move uploaded file to a nice directory
                $targetPath = "./data/Bezel/" . basename($Bezel);
                $saved = move_uploaded_file($_FILES['Bezel']['tmp_name'], $targetPath);
                if ($saved && $res) {
                    echo '{ "result" : "Uploaded", "status":"200" }';
                }
            } else {
                echo '{ "result" : "Error" }';
            }
        }
    } elseif ($_GET['act'] == "uploadMenCase") {

        $valid_extensions = array('png');
        // valid extensions
        // print_r($_FILES);

        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['MenCase']['name'], PATHINFO_EXTENSION));

        // checking file with same exists???
        if (in_array($_FILES['MenCase']['name'], getFileNames("./data/Case/men/"))) {
            echo '{ "result" : "Error" }';
        } else {
            // check's valid format
            if (in_array($ext, $valid_extensions) && !empty($_POST['watch'])) {

                $MenCase = strtolower($_FILES['MenCase']['name']);
                // $MenCase = pathinfo($_FILES['MenCase']['name']);
                $watchId = $_POST['watch'];

                if (empty($_POST['color']))
                    $color = $_POST['newColor'];
                else if (empty($_POST['newColor']))
                    $color = $_POST['color'];
                // counting files in folder
                // $i = countFiles("./data/Case/men");
                // giving desired name to file 
                // $MenCase =  ++$i . "." . $ext;

                $name = substr($MenCase, 0, strpos($MenCase, ".png"));

                $q = "INSERT INTO watchcase(name,url,color,watch_id)
                VALUES('" . $name . "','./data/Case/men/" . $MenCase . "','" . $color . "','" . $watchId . "' )";
                $res = mysqli_query($mysqli, $q);

                //Move uploaded file to a nice directory
                $targetPath = "./data/Case/men/" . basename($MenCase);
                $saved = move_uploaded_file($_FILES['MenCase']['tmp_name'], $targetPath);
                if ($saved && $res) {
                    echo '{ "result" : "Uploaded", "status":"200" }';
                }
            } else {
                echo '{ "result" : "Error" }';
            }
        }
    } elseif ($_GET['act'] == "uploadWomenCase") {

        $valid_extensions = array('png');
        // valid extensions
        // print_r($_FILES);

        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['WomenCase']['name'], PATHINFO_EXTENSION));

        // checking file with same exists???
        if (in_array($_FILES['WomenCase']['name'], getFileNames("./data/Case/women/"))) {
            echo '{ "result" : "Error" }';
        } else {
            // check's valid format
            if (in_array($ext, $valid_extensions) && !empty($_POST['watch'])) {

                $WomenCase = strtolower($_FILES['WomenCase']['name']);

                $watchId = $_POST['watch'];

                if (empty($_POST['color']))
                    $color = $_POST['newColor'];
                else if (empty($_POST['newColor']))
                    $color = $_POST['color'];
                // counting files in folder
                // $i = countFiles("./data/Case/women");
                // giving desired name to file 
                // $WomenCase =  ++$i . "." . $ext;
                // $WomenCase .= $ext;

                $name = substr($MenCase, 0, strpos($MenCase, ".png"));

                $q = "INSERT INTO watchcase(name,url,color,watch_id)
                VALUES('" . $name . "','./data/Case/women/" . $WomenCase . "','" . $color . "','" . $watchId . "' )";
                $res = mysqli_query($mysqli, $q);

                //Move uploaded file to a nice directory
                $targetPath = "./data/Case/women/" . basename($WomenCase);
                $saved = move_uploaded_file($_FILES['WomenCase']['tmp_name'], $targetPath);
                if ($saved && $res) {
                    echo '{ "result" : "Uploaded", "status":"200" }';
                }
            } else {
                echo '{ "result" : "Error" }';
            }
        }
    } elseif ($_GET['act'] == "uploadDiamondBezel") {

        $valid_extensions = array('png');
        // valid extensions
        // print_r($_FILES);

        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['DiamondBezel']['name'], PATHINFO_EXTENSION));

        // checking file with same exists???
        if (in_array($_FILES['DiamondBezel']['name'], getFileNames("./data/Diamond Bezel/"))) {
            echo '{ "result" : "Error" }';
        } else {
            // check's valid format
            if (in_array($ext, $valid_extensions)) {

                // $DiamondBezel = pathinfo($_FILES['DiamondBezel']['name']);

                // counting files in folder
                // $i = countFiles("./data/Diamond Bezel");
                // giving desired name to file 
                // $DiamondBezel =  ++$i . "." . $ext;
                $DiamondBezel = strtolower($_FILES['DiamondBezel']['name']);
                $name = substr($DiamondBezel, 0, strpos($DiamondBezel, ".png"));

                $watchId = $_POST['watch'];

                if (empty($_POST['color']))
                    $color = $_POST['newColor'];
                else if (empty($_POST['newColor']))
                    $color = $_POST['color'];

                $q = "INSERT INTO Diamond_bezel(name,url,color,watch_id)
                VALUES('" . $name . "','./data/Diamond Bezel/" . $DiamondBezel . "', '" . $color . "', '" . $watch_id . "')";
                $res = mysqli_query($mysqli, $q);


                //Move uploaded file to a nice directory
                $targetPath = "./data/Diamond Bezel/" . basename($DiamondBezel);
                $saved = move_uploaded_file($_FILES['DiamondBezel']['tmp_name'], $targetPath);
                if ($saved && $res) {
                    echo '{ "result" : "Uploaded", "status":"200" }';
                }
            } else {
                echo '{ "result" : "Error" }';
            }
        }
    } elseif ($_GET['act'] == "uploadFace") {

        $valid_extensions = array('png');
        // valid extensions
        // print_r($_FILES);

        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['Face']['name'], PATHINFO_EXTENSION));

        // checking file with same exists???
        if (in_array($_FILES['Face']['name'], getFileNames("./data/Face/"))) {
            echo '{ "result" : "Error" }';
        } else {
            // check's valid format
            if (in_array($ext, $valid_extensions)) {

                // $Face = pathinfo($_FILES['Face']['name']);

                // counting files in folder
                // $i = countFiles("./data/Face");
                // giving desired name to file 
                // $Face =  ++$i . "." . $ext;
                $Face = strtolower($_FILES['Face']['name']);
                $name = substr($Face, 0, strpos($Face, ".png"));

                $watchId = $_POST['watch'];

                if (empty($_POST['color']))
                    $color = $_POST['newColor'];
                else if (empty($_POST['newColor']))
                    $color = $_POST['color'];

                $q = "INSERT INTO face(name,url,color,watch_id)
                VALUES('" . $name . "','./data/Face/" . $Face . "','" . $color . "','" . $watch_id . "')";
                $res = mysqli_query($mysqli, $q);


                //Move uploaded file to a nice directory
                $targetPath = "./data/Face/" . basename($Face);
                $saved = move_uploaded_file($_FILES['Face']['tmp_name'], $targetPath);
                if ($saved && $res) {
                    echo '{ "result" : "Uploaded", "status":"200" }';
                }
            } else {
                echo '{ "result" : "Error" }';
            }
        }
    } elseif ($_GET['act'] == "uploadTip") {

        $valid_extensions = array('png');
        // valid extensions
        // print_r($_FILES);

        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['Tip']['name'], PATHINFO_EXTENSION));

        // checking file with same exists???
        if (in_array($_FILES['Tip']['name'], getFileNames("./data/Hand tip/"))) {
            echo '{ "result" : "Error" }';
        } else {
            // check's valid format
            if (in_array($ext, $valid_extensions)) {

                // $Tip = pathinfo($_FILES['Tip']['name']);

                // counting files in folder
                // $i = countFiles("./data/Hand tip");
                // giving desired name to file 
                // $Tip =  ++$i . "." . $ext;
                $Tip = strtolower($_FILES['Tip']['name']);
                $name = substr($Tip, 0, strpos($Tip, ".png"));

                $watchId = $_POST['watch'];

                if (empty($_POST['color']))
                    $color = $_POST['newColor'];
                else if (empty($_POST['newColor']))
                    $color = $_POST['color'];

                $q = "INSERT INTO tip(name,url,color,watch_id)
                VALUES('" . $name . "','./data/Hand tip/" . $Tip . "','" . $color . "','" . $watchId . "' )";
                $res = mysqli_query($mysqli, $q);

                //Move uploaded file to a nice directory
                $targetPath = "./data/Hand tip/" . basename($Tip);
                $saved = move_uploaded_file($_FILES['Tip']['tmp_name'], $targetPath);
                if ($saved && $res) {
                    echo '{ "result" : "Uploaded", "status":"200" }';
                }
            } else {
                echo '{ "result" : "Error" }';
            }
        }
    } elseif ($_GET['act'] == "uploadLumi") {

        $valid_extensions = array('png');
        // valid extensions
        // print_r($_FILES);

        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['Lumi']['name'], PATHINFO_EXTENSION));

        // checking file with same exists???
        if (in_array($_FILES['Lumi']['name'], getFileNames("./data/Hand lumi/"))) {
            echo '{ "result" : "Error" }';
        } else {        // check's valid format
            if (in_array($ext, $valid_extensions)) {

                // $Lumi = pathinfo($_FILES['Lumi']['name']);

                // counting files in folder
                // $i = countFiles("./data/Hand lumi");
                // giving desired name to file 
                // $Lumi =  ++$i . "." . $ext;
                $Lumi = strtolower($_FILES['Lumi']['name']);
                $name = substr($Lumi, 0, strpos($Lumi, ".png"));

                $style_id = $_POST["style"];
                if ($style_id == "new") {
                    $r = mysqli_query($mysqli, "SELECT COUNT(DISTINCT style_id) AS total_style FROM lumi");
                    foreach ($r as $row) {
                        $total_style = $row['total_style'];
                    }
                    $style_id = $total_style + 1;
                }

                $color = '';
                if (empty($_POST['color']))
                    $color = $_POST['newColor'];
                else if (empty($_POST['newColor']) || $_POST['newColor'] == "#000000")
                    $color = $_POST['color'];

                $q = "INSERT INTO lumi(name,url,color,style_id)
                VALUES('" . $name . "','./data/Hand lumi/" . $Lumi . "','" . $color . "','" . $style_id . "' )";
                $res = mysqli_query($mysqli, $q);

                //Move uploaded file to a nice directory
                $targetPath = "./data/Hand lumi/" . basename($Lumi);
                $saved = move_uploaded_file($_FILES['Lumi']['tmp_name'], $targetPath);
                if ($saved && $res) {
                    echo '{ "result" : "Uploaded", "status":"200" }';
                }
            } else {
                echo '{ "result" : "Error" }';
            }
        }
    } elseif ($_GET['act'] == "uploadHands") {

        $valid_extensions = array('png');
        // valid extensions
        // print_r($_FILES);
        // print_r($_POST);
        // exit;

        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['Hands']['name'], PATHINFO_EXTENSION));
        // checking file with same exists???
        if (in_array($_FILES['Hands']['name'], getFileNames("./data/Hands/"))) {
            echo '{ "result" : "Error" }';
        } else {
            // check's valid format
            if (in_array($ext, $valid_extensions)) {

                $style_id = $_POST["style"];
                if ($style_id == "new") {
                    $r = mysqli_query($mysqli, "SELECT COUNT(DISTINCT style_id) AS total_style FROM hands");
                    foreach ($r as $row) {
                        $total_style = $row['total_style'];
                    }
                    $style_id = $total_style + 1;
                }

                $color = '';
                if (empty($_POST['color']))
                    $color = $_POST['newColor'];
                else if (empty($_POST['newColor']) || $_POST['newColor'] == "#000000")
                    $color = $_POST['color'];
                // $Hands = pathinfo($_FILES['Hands']['name']);

                // counting files in folder
                // $i = countFiles("./data/Hands hand");
                // giving desired name to file 
                // $Hands =  ++$i . "." . $ext;
                $Hands = strtolower($_FILES['Hands']['name']);
                $name = substr($Hands, 0, strpos($Hands, ".png"));

                $q = "INSERT INTO hands(name,url,color,style_id)
                VALUES('" . $name . "','./data/Hands/" . $Hands . "','" . $color . "','" . $style_id . "')";
                $res = mysqli_query($mysqli, $q);

                //Move uploaded file to a nice directory
                $targetPath = "./data/Hands/" . basename($Hands);
                $saved = move_uploaded_file($_FILES['Hands']['tmp_name'], $targetPath);
                if ($saved && $res) {
                    echo  '{ "result" : "Uploaded", "status":"200" }';
                }
            } else {
                echo '{ "result" : "Error" }';
            }
        }
    } elseif ($_GET['act'] == "uploadSecondHand") {

        $valid_extensions = array('png');
        // valid extensions
        // print_r($_FILES);
        // print_r($_POST);
        // exit;

        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['SecondHand']['name'], PATHINFO_EXTENSION));

        // checking file with same exists???
        if (in_array($_FILES['SecondHand']['name'], getFileNames("./data/Second hand/"))) {
            echo '{ "result" : "Error" }';
        } else {
            // check's valid format
            if (in_array($ext, $valid_extensions)) {

                $style_id = $_POST["style"];

                if ($style_id == "new") {
                    $r = mysqli_query($mysqli, "SELECT COUNT(DISTINCT style_id) AS total_style FROM hands");
                    foreach ($r as $row) {
                        $total_style = $row['total_style'];
                    }
                    $style_id = $total_style + 1;
                }

                $color = '';
                if (empty($_POST['color']))
                    $color = $_POST['newColor'];
                else if (empty($_POST['newColor']) || $_POST['newColor'] == "#000000")
                    $color = $_POST['color'];

                $SecondHand = strtolower($_FILES['SecondHand']['name']);
                $name = substr($SecondHand, 0, strpos($SecondHand, ".png"));

                $q = "INSERT INTO second_hand(name,url,color,style_id)
                VALUES('" . $name . "','./data/Second hand/" . $SecondHand . "','" . $color . "','" . $style_id . "')";
                $res = mysqli_query($mysqli, $q);

                //Move uploaded file to a nice directory
                $targetPath = "./data/Second hand/" . basename($SecondHand);
                $saved = move_uploaded_file($_FILES['SecondHand']['tmp_name'], $targetPath);

                if ($saved && $res) {
                    echo  '{ "result" : "Uploaded", "status":"200" }';
                }
            } else {
                echo '{ "result" : "Error" }';
            }
        }
    } elseif ($_GET['act'] == "uploadStrap") {

        $valid_extensions = array('png');
        // valid extensions
        // print_r($_FILES);

        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['Strap']['name'], PATHINFO_EXTENSION));

        // checking file with same exists???
        if (in_array($_FILES['Strap']['name'], getFileNames("./data/Strap/"))) {
            echo '{ "result" : "Error" }';
        } else {
            // check's valid format
            if (in_array($ext, $valid_extensions) && !empty($_POST['watch'])) {

                // $Strap = pathinfo($_FILES['Strap']['name']);

                // counting files in folder
                // $i = countFiles("./data/Strap");
                // giving desired name to file 
                // $Strap =  ++$i . "." . $ext;
                $Strap = strtolower($_FILES['Strap']['name']);
                $name = substr($Strap, 0, strpos($Strap, ".png"));

                $watchId = $_POST['watch'];

                if (empty($_POST['color']))
                    $color = $_POST['newColor'];
                else if (empty($_POST['newColor']))
                    $color = $_POST['color'];

                $q = "INSERT INTO strap(name,url,color,watch_id)
                VALUES('" . $name . "','./data/Strap/" . $Strap . "','" . $color . "','" . $watchId . "' )";
                $res = mysqli_query($mysqli, $q);

                //Move uploaded file to a nice directory
                $targetPath = "./data/Strap/" . basename($Strap);
                $saved = move_uploaded_file($_FILES['Strap']['tmp_name'], $targetPath);
                if ($saved && $res) {
                    echo '{ "result" : "Uploaded", "status":"200" }';
                }
            } else {
                echo '{ "result" : "Error" }';
            }
        }
    } elseif ($_GET['act'] == "uploadWinder") {

        $valid_extensions = array('png');
        // valid extensions
        // print_r($_FILES);

        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['Winder']['name'], PATHINFO_EXTENSION));

        // checking file with same exists???
        if (in_array($_FILES['Winder']['name'], getFileNames("./data/Winder/"))) {
            echo '{ "result" : "Error" }';
        } else {
            // check's valid format
            if (in_array($ext, $valid_extensions) && !empty($_POST['watch'])) {

                // $Winder = pathinfo($_FILES['Winder']['name']);

                // counting files in folder
                // $i = countFiles("./data/Winder");
                // giving desired name to file 
                // $Winder =  ++$i . "." . $ext;
                $Winder = strtolower($_FILES['Winder']['name']);
                $name = substr($Winder, 0, strpos($Winder, ".png"));

                $watchId = $_POST['watch'];

                if (empty($_POST['color']))
                    $color = $_POST['newColor'];
                else if (empty($_POST['newColor']))
                    $color = $_POST['color'];

                $q = "INSERT INTO winder(name,url,color,watch_id)
                VALUES('" . $name . "','./data/Winder/" . $Winder . "','" . $color . "','" . $watchId . "')";
                $res = mysqli_query($mysqli, $q);

                //Move uploaded file to a nice directory
                $targetPath = "./data/Winder/" . basename($Winder);
                $saved = move_uploaded_file($_FILES['Winder']['tmp_name'], $targetPath);
                if ($saved && $res) {
                    echo '{ "result" : "Uploaded", "status":"200" }';
                }
            } else {
                echo '{ "result" : "Error" }';
            }
        }
    } elseif ($_GET['act'] == "uploadSkull") {

        $valid_extensions = array('png', 'svg');
        // $valid_extensions = array('svg');
        // valid extensions
        // print_r($_FILES);

        // get uploaded file's extension
        $ext = strtolower(pathinfo($_FILES['Skull']['name'], PATHINFO_EXTENSION));
        // checking file with same exists???
        if (in_array($_FILES['Skull']['name'], getFileNames("./data/Skull/"))) {
            echo '{ "result" : "File already exists" }';
        } else {
            // check's valid format
            if (in_array($ext, $valid_extensions)) {

                // counting files in folder
                $i = countFiles("./data/Skull");

                if ($ext == "png") {

                    $Skull = strtolower($_FILES['Skull']['name']);
                    $Skull =  "skull " . ++$i . ".png";
                    $targetPath = "./data/Skull/" . basename($Skull);

                    $q = "INSERT INTO skull(name,url,type)
                    VALUES('skull " . $i  . "','./data/Skull/" . $Skull . "','png')";

                    $res = mysqli_query($mysqli, $q);

                    $saved = move_uploaded_file($_FILES['Skull']['tmp_name'], $targetPath);
                    if ($saved && $res) {
                        echo '{ "result" : "Uploaded", "status":"200" }';
                    }
                } elseif ($ext == 'svg') {

                    $Skull = strtolower($_FILES['Skull']['name']);
                    // giving desired name to file 
                    $Skull =  "skull " . ++$i . ".svg";
                    // $name = substr($Skull, 0, strpos($Skull, ".svg"));

                    $q = "INSERT INTO skull(name,url,type)
                    VALUES('skull " . $i  . "','./data/Skull/" . $Skull . "','svg')";

                    $res = mysqli_query($mysqli, $q);

                    // Move uploaded file to a nice directory
                    $targetPath = "./data/Skull/" . basename($Skull);
                    $saved = move_uploaded_file($_FILES['Skull']['tmp_name'], $targetPath);

                    if ($saved && $res) {
                        echo '{ "result" : "Uploaded", "status":"200" }';
                    }
                }
            } else {
                echo '{ "result" : "Error" }';
            }
        }
    }
}


//  elseif ($_GET['act'] == "uploadHour") {

//     $valid_extensions = array('png');
//     // valid extensions
//     // print_r($_FILES);

//     // get uploaded file's extension
//     $ext = strtolower(pathinfo($_FILES['Hour']['name'], PATHINFO_EXTENSION));

//     // checking file with same exists???
//     if (in_array($_FILES['Hour']['name'], getFileNames("./data/Hour hand/"))) {
//         echo '{ "result" : "Error" }';
//     } else {
//         // check's valid format
//         if (in_array($ext, $valid_extensions)) {

//             // $Hour = pathinfo($_FILES['Hour']['name']);

//             // counting files in folder
//             // $i = countFiles("./data/Hour hand");
//             // giving desired name to file 
//             // $Hour =  ++$i . "." . $ext;
//             $Hour = strtolower($_FILES['Hour']['name']);
//             $name = substr($Hour, 0, strpos($Hour, ".png"));

//             $q = "INSERT INTO hour(name,url)
//             VALUES('" . $name . "','./data/Hour hand/" . $Hour . "')";
//             $res = mysqli_query($mysqli, $q);

//             //Move uploaded file to a nice directory
//             $targetPath = "./data/Hour hand/" . basename($Hour);
//             $saved = move_uploaded_file($_FILES['Hour']['tmp_name'], $targetPath);
//             if ($saved && $res) {
//                 echo '{ "result" : "Uploaded", "status":"200" }';
//             }
//         } else {
//             echo '{ "result" : "Error" }';
//         }
//     }
// } elseif ($_GET['act'] == "uploadMin") {

//     $valid_extensions = array('png');
//     // valid extensions
//     // print_r($_FILES);

//     // get uploaded file's extension
//     $ext = strtolower(pathinfo($_FILES['Min']['name'], PATHINFO_EXTENSION));
//     // checking file with same exists???
//     if (in_array($_FILES['Min']['name'], getFileNames("./data/Min hand/"))) {
//         echo '{ "result" : "Error" }';
//     } else {
//         // check's valid format
//         if (in_array($ext, $valid_extensions)) {

//             // $Min = pathinfo($_FILES['Min']['name']);

//             // counting files in folder
//             // $i = countFiles("./data/Min hand");
//             // giving desired name to file 
//             // $Min =  ++$i . "." . $ext;
//             $Min = strtolower($_FILES['Min']['name']);
//             $name = substr($Min, 0, strpos($Min, ".png"));

//             $q = "INSERT INTO minute(name,url)
//             VALUES('" . $name . "','./data/Min hand/" . $Min . "')";
//             $res = mysqli_query($mysqli, $q);


//             //Move uploaded file to a nice directory
//             $targetPath = "./data/Min hand/" . basename($Min);
//             $saved = move_uploaded_file($_FILES['Min']['tmp_name'], $targetPath);
//             if ($saved && $res) {
//                 echo '{ "result" : "Uploaded", "status":"200" }';
//             }
//         } else {
//             echo '{ "result" : "Error" }';
//         }
//     }
// }




////////////////////////////////////////////////////////////////////////////////
// $count = countFiles('./watch6/Bezel/');
// $names = getFileNames('./watch6/Bezel/');
// // for ($i = 0; $i < $count; $i++) {
// $j = 46;
// for ($i = 1; $i <= $count; $i++) {
//     $q = "INSERT INTO bezel(name,url,watch_id)
//     VALUES('Bezel " . $j . "','./data/Bezel/" . $j . ".png',7);";
//     echo "<br>" . $q . "<br>";
//     // $res = mysqli_query($mysqli, $q);
//     // var_dump($res);
//     // echo   $names[$i]."<br>";
//     $j++;
// }
// exit;


// $c = [
// '#751113', '#ff1e26', '#ff6600', '#feba27', '#ffff01', '#0d4f21', '#65ff00', '#47d4e5', '#4f8dfe', '#013ba7', '#ddb168', '#976005', '#8e00ce', '#dc0058', '#ffa7cf', '#ff4864', '#ffffff', '#c0c0c0', '#9a9a9a', '#4e2700', '#000000',
// '#F4CC71','#F2B28F',
// // // '#751113', '#ff1e26', '#ff6600', '#feba27', '#ffff01', '#0d4f21', '#65ff00', '#47d4e5', '#4f8dfe', '#013ba7', '#ddb168', '#976005', '#8e00ce', '#dc0058', '#ffa7cf', '#ff4864', '#ffffff', '#c0c0c0', '#9a9a9a', '#4e2700', '#000000','#F4CC71','#F2B28F',
// // // '#751113', '#ff1e26', '#ff6600', '#feba27', '#ffff01', '#0d4f21', '#65ff00', '#47d4e5', '#4f8dfe', '#013ba7', '#ddb168', '#976005', '#8e00ce', '#dc0058', '#ffa7cf', '#ff4864', '#ffffff', '#c0c0c0', '#9a9a9a', '#4e2700', '#000000','#F4CC71','#F2B28F',
// ];

// // $count = countFiles('./data/Hour min hand/style 13/hands/');
// // $names = getFileNames('./data/Hour min hand/style 13/hands/');

// $count = countFiles('./data/Second hand/');
// $names = getFileNames('./data/Second hand/');
// // // for ($i = 0; $i < $count; $i++) {
// $j = 1;
// $k = 0;
// for ($i = 1; $i <= $count; $i++) {
//     // $q = "INSERT INTO hands(name,url,color,style_id)
//     //     VALUES('Hands " . $j . "','./data/Hands/" . $j . ".png','" . $c[$k] . "',13);";
//     $q = "INSERT INTO second_hand(name,url,color,style_id)
//     VALUES('Seccond Hand " . $j . "','./data/Second hand/" . $j . ".png','" . $c[$k] . "',8);";
//     // // $q="UPDATE lumi set url='./data/Hand lumi/" . $k . ".png',name='" . $k . "' where id=" . $k . ";" ;
//     // $q="UPDATE second_hand set color='" . $c[$j] . "' where id=" . $i . ";" ;
//     echo "<br>" . $q . "<br>" ; 
//     // $res=mysqli_query($mysqli, $q); 
//     // // var_dump($res); // // echo $names[$i]."<br>";
//     $j++;
//     $k++;
// }
// exit;

// $count = countFiles('./data/new hands/style 7/hands/');
// $names = getFileNames('./data/ rename("./data/new hands/style 7/hands/" . $names[$k], "./data/new hands/style 7/hands/" . $j . ".png");
// $j++;
// $k++;
// }
// exit;



    // $count = countFiles('./data/Case/men/');
    // $names = getFileNames('./data/Case/men/');
    // $count = countFiles('./watch7/case');
    // $names = getFileNames('./watch7/case');
    // $watch_id = 1;
    // for ($i = 0; $i < $count; $i++) { // $q="INSERT INTO watchcase(name,url,watch_id)
//     VALUES('" . substr($names[$i], 0, strpos($names[$i], ".png" )) . " Case Men','./data/Case/men/" . $names[$i] . "',1);" ; // echo "<br>" . $q . "<br>" ; // // $res=mysqli_query($mysqli, $q); // // var_dump($res); // // echo substr($names[$i],0,strpos($names[$i],".png"))."<br>";
        // }
        // exit;

        // $count = countFiles('./data/Case/women/');
        // $names = getFileNames('./data/Case/women/');
        // for ($i = 0; $i < $count; $i++) { // $q="INSERT INTO watchcase(name,url,watch_id)
//     VALUES('" . substr($names[$i], 0, strpos($names[$i], ".png" )) . " Case Women','./data/Case/women/" . $names[$i] . "',1)" ; // // echo $q."<br>";
            // // $res = mysqli_query($mysqli, $q);
            // // var_dump($res);
            // // echo substr($names[$i],0,strpos($names[$i],".png"))."<br>";
            // }
            // exit;

            // $count = countFiles('./data/Diamond Bezel/');
            // $names = getFileNames('./data/Diamond Bezel/');
            // // for ($i = 0; $i < $count; $i++) { // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO daimond_bezel(name,url)
//     VALUES('Diamond Bezel " . $i . "','./data/Diamond Bezel/" . $i . ".png');" ; // echo "<br>" . $q . "<br>" ; // $res=mysqli_query($mysqli, $q); // var_dump($res); // // echo $names[$i]."<br>";
                // }

                // $count = countFiles('./data/Face/');
                // $names = getFileNames('./data/Face/');
                // // for ($i = 0; $i < $count; $i++) { // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO face(name,url)
//     VALUES('Face " . $i . "','./data/Face/" . $i . ".png')" ; // $res=mysqli_query($mysqli, $q); // var_dump($res); // // echo $names[$i]."<br>";
                    // }

                    // $count = countFiles('./data/Hand lumi/');
                    // $names = getFileNames('./data/Hand lumi/');
                    // // for ($i = 0; $i < $count; $i++) { // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO lumi(name,url)
//     VALUES('Hand lumi " . $i . "','./data/Hand lumi/" . $i . ".png')" ; // $res=mysqli_query($mysqli, $q); // var_dump($res); // // echo $names[$i]."<br>";
                        // }

                        // $count = countFiles('./data/Hand tip/');
                        // $names = getFileNames('./data/Hand tip/');
                        // // for ($i = 0; $i < $count; $i++) { // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO tip(name,url)
//     VALUES('Hand tip " . $i . "','./data/Hand tip/" . $i . ".png')" ; // $res=mysqli_query($mysqli, $q); // var_dump($res); // // echo $names[$i]."<br>";
                            // }

                            // $count = countFiles('./data/Hour hand/');
                            // $names = getFileNames('./data/Hour hand/');
                            // // for ($i = 0; $i < $count; $i++) { // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO hour(name,url)
//     VALUES('Hour Hand " . $i . "','./data/Hour hand/" . $i . ".png')" ; // $res=mysqli_query($mysqli, $q); // var_dump($res); // // echo $names[$i]."<br>";
                                // }

                                // $count = countFiles('./data/Min hand/');
                                // $names = getFileNames('./data/Min hand/');
                                // // for ($i = 0; $i < $count; $i++) { // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO minute(name,url)
//     VALUES('Minute Hand " . $i . "','./data/Min hand/" . $i . ".png')" ; // $res=mysqli_query($mysqli, $q); // var_dump($res); // // echo $names[$i]."<br>";
                                    // }

                                    // $count = countFiles('./data/Skull/');
                                    // $names = getFileNames('./data/Skull/');
                                    // // for ($i = 0; $i < $count; $i++) { // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO skull(name,url)
//     VALUES('Skull " . $i . "','./data/Skull/" . $i . ".png')" ; // $res=mysqli_query($mysqli, $q); // var_dump($res); // // echo $names[$i]."<br>";
                                        // }

                                        // $count = countFiles('./watch7/Strap/');
                                        // $names = getFileNames('./watch7/Strap/');
                                        // // for ($i = 0; $i < $count; $i++) { // $j=106; // for ($i=1; $i <=$count; $i++) { // $q="INSERT INTO strap(name,url,watch_id)
//     VALUES('Strap " . $j . "','./data/Strap/" . $j . ".png',7);" ; // echo "<br>" . $q . "<br>" ; // // $res=mysqli_query($mysqli, $q); // // var_dump($res); // // echo $names[$i]."<br>";
                                            // $j++;
                                            // }
                                            // exit;

                                            // $count = countFiles('./watch6/winder/');
                                            // $names = getFileNames('./watch6/winder/');
                                            // for ($i = 0; $i < $count; $i++) { // $q="INSERT INTO winder(name,url,watch_id)
//     VALUES('" . substr($names[$i], 0, strpos($names[$i], ".png" )) . " Winder','./data/Winder/" . $names[$i] . "',1)" ; // echo "<br>" . $q . "<br>" ; // // $res=mysqli_query($mysqli, $q); // // var_dump($res); // // echo $names[$i]."<br>";
                                                // }

                                                // $k = 18;
                                                // for ($i = 2; $i < 19; $i++) { // echo 'UPDATE `winder` SET `id` = ' . $i . ' WHERE `winder`.`id` =' . $k . ";<br>" ; // $k++; // } // exit; // function uploadComponent($ext, $files,$path,$post) // { // global $mysqli; // $valid_extensions=array('png'); // $ext=strtolower(pathinfo($files, PATHINFO_EXTENSION)); // // checking file with same exists??? // if (in_array($files, getFileNames($path))) { // echo '{ "result" : "Error" }' ; // } else { // // check's valid format // if (in_array($ext, $valid_extensions) && !empty($post)) { // $com_name=pathinfo($files); // $watchId=$post; // // counting files in folder // // $i=countFiles("./data/com_name"); // // giving desired name to file // // $com_name=++$i . "." . $ext; // $com_name=strtolower($files); // $name=substr($com_name, 0, strpos($com_name, ".png" )); // $q="INSERT INTO bezel(name,url,watch_id)
//             VALUES('" . $name . "','./data/Bezel/" . $com_name . "','" . $watchId . "' )" ; // $res=mysqli_query($mysqli, $q); // //Move uploaded file to a nice directory // $targetPath=$path . basename($com_name); // $saved=move_uploaded_file($_FILES['Bezel']['tmp_name'], $targetPath); // if ($saved && $res) { // echo '{ "result" : "Uploaded", "status":"200" }' ; // } // } else { // echo '{ "result" : "Error" }' ; // } // } // }