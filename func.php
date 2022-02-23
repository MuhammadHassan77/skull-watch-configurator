<?php
$mysqli = new mysqli("localhost", "root", "", "watchnewhere");

// $mysqli = new mysqli("localhost", "mwnn", "SGvGx3i3KWTSiBteCNwF", "wp_mwnn");

// $mysqli = new mysqli("localhost", "u538897927_watchv5", "!egvfvM2", "u538897927_watchv5");


session_start();

// // Turn off all error reporting
// error_reporting(0);

// //Report simple running errors
// error_reporting(E_ERROR | E_WARNING);

// { "pngStyle" : "none" ,"pngSize" : "none" , "pngSkullSrc" : "./data/Skull/skull 66.png" ,  "svgId" : "64" , "svgSize" : "matrix(1.48, 0, 0, 1.48, 0, 0)" , "purple" : "#ff1e26", "gold" : "#E96558", "yellow" : "#FBD373", "skyblue" : "#8DCCC0", "grey" : "#F0EADE" } 

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

function getDynamicComponent($table, $watch_id, $element)
{
    global $mysqli;
    $q = "SELECT * FROM $table WHERE watch_id= $watch_id";
    $res = mysqli_query($mysqli, $q);
    foreach ($res as $rows) {
        $id = $rows['id'];
        $name = $rows['name'];
        $url = $rows['url'];
        $color = $rows['color'];

?>
        <div class="col-1 col-sm-12 p-0 m-0" onclick="document.getElementById('<?= $element ?>').src='<?= $url ?>'">
            <div class="color-box" style="background-color: <?php echo $color ?>"></div>
        </div>
    <?php
        //      echo '
        // <li onclick="document.getElementById(\'' . $element . '\').src=\'' . $url . '\'"
        // 	class="text list-group-item col-xs-12  select-4">
        // 		<span class="chat-img pull-left">
        // 			<img class="img-circle img-responsive" width="50" alt=""
        // 				src="' . $url . '"></span>
        // 	' . $name . '<span class="tab-space"></span><span class="ti-pencil"></span>
        // 	</li>';
    }
}

function getDynamicCaseMen($watch_id)
{
    global $mysqli;
    $q = "SELECT * FROM watchcase WHERE watch_id=" . $watch_id . " AND name like('% Men%')";
    $res = mysqli_query($mysqli, $q);
    foreach ($res as $rows) {
        $id = $rows['id'];
        $name = $rows['name'];
        $url = $rows['url'];
        $color = $rows['color'];
    ?>
        <div class="col-1 col-sm-12 p-0 m-0 forMen Cases" onclick="document.getElementById('case').src='<?php echo $url; ?>'">
            <div class="color-box" style="background-color: <?php echo $color ?>"></div>
        </div>


    <?php
        // echo '
        // <div>
        //  <li onclick="document.getElementById(\'case\').src=\'' . $url . '\'" 
        //  class="text list-group-item col-xs-12  select-6 forMen Cases">
        //          <span class="chat-img pull-left">
        //              <img class="img-circle img-responsive" width="50" alt=""
        //                  src="' . $url . '"></span>
        //      ' . $name . '<span class="tab-space"></span><span class="ti-pencil"></span>
        //      </li>';
    }
}
function getDynamicCaseWomen($watch_id)
{
    global $mysqli;
    $q = "SELECT * FROM watchcase WHERE  watch_id=" . $watch_id . " AND name like('% Women%')";
    $res = mysqli_query($mysqli, $q);
    foreach ($res as $rows) {
        $id = $rows['id'];
        $name = $rows['name'];
        $url = $rows['url'];
        $color = $rows['color'];
    ?>
        <div class="col-1 col-sm-12 p-0 m-0 forWomen Cases" onclick="document.getElementById('case').src='<?php echo $url; ?>'">
            <div class="color-box" style="background-color: <?php echo $color ?>"></div>
        </div>


<?php
        // echo '
        // <li onclick="document.getElementById(\'case\').src=\'' . $url . '\'" 
        //     class="text list-group-item col-xs-12  select-6 forWomen Cases">
        //         <span class="chat-img pull-left">
        //             <img class="img-circle img-responsive" width="50" alt=""
        //                 src="' . $url . '"></span>
        //     ' . $name . '<span class="tab-space"></span><span class="ti-pencil"></span>
        //     </li>';
    }
}
// getDynamicCaseWomen(1);

// HANDLING LOGIN REGISTER CREATE LINK AND LOGOUT
if (isset($_POST['act']) && $_POST['act'] == "register") {

    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["phone"])) {

        $q = "INSERT INTO users(name, email, password, phone) 
        VALUES('" . $_POST['name'] . "','" . $_POST['email'] . "','" . encrypt($_POST['password']) . "','" . $_POST['phone'] . "') ";

        $result = mysqli_query($mysqli, $q);

        if ($result) {
            // foreach ($result as $rows) {
            //     session_start();
            //     $_SESSION["id"] = $rows["id"];
            //     $_SESSION["email"] = $rows["email"];
            //     $password = $rows["password"];
            //     $phone = $rows["phone"];
            // }
            echo "success";
        } else {
            echo "error";
        }
    }
} elseif (isset($_POST['act']) && $_POST['act'] == "login") {


    if (!empty($_POST["email"]) && !empty($_POST["password"])) {

        $q = "SELECT * FROM users WHERE email='" . $_POST["email"] . "' AND password='" . encrypt($_POST["password"]) . "'";

        $result = mysqli_query($mysqli, $q);
        if ($result->num_rows === 1) {
            foreach ($result as $rows) {
                // session_start();
                $_SESSION["id"] = $rows["id"];
                $_SESSION["email"] = $rows["email"];
                // $id = $_SESSION["id"];
                // $email = $_SESSION["email"];
            }
            echo "success";
        } else {
            echo "error";
        }
    }
} elseif (isset($_POST['act']) && $_POST['act'] == "createLink") {

    if (
        !empty($_POST["watch_id"]) && !empty($_POST["bezel"]) &&
        !empty($_POST["case"]) && !empty($_POST["face"]) &&
        !empty($_POST["lumi"]) && !empty($_POST["tip"]) && !empty($_POST["hour"]) &&
        !empty($_POST["min"]) && !empty($_POST["skull"]) && !empty($_POST["strap"]) &&
        !empty($_POST["winder"]) && !empty($_POST["url"])
    ) {
        $watch_id = $_POST['watch_id'];
        $bezel = $_POST['bezel'];
        $case = $_POST['case'];
        $face = $_POST['face'];
        $lumi = $_POST['lumi'];
        $tip = $_POST['tip'];
        $hour = $_POST['hour'];
        $min = $_POST['min'];
        $secHand = $_POST['secHand'];
        $skull = $_POST['skull'];
        $strap = $_POST['strap'];
        $winder = $_POST['winder'];
        $url = $_POST['url'];


        $q = 'INSERT INTO savechanges (watch_id,bezel,watchcase,face,lumi,tip,hour,min,second_hand,skull,strap,winder)
        VALUES ("' . $watch_id . '","' . $bezel . '","' . $case . '","' . $face . '","' . $lumi . '","' . $tip . '"
        ,"' . $hour . '","' . $min . '","' . $secHand . '", \' ' . $skull . ' \' ,"' . $strap . '","' . $winder . '") ';

        $result = mysqli_query($mysqli, $q);

        // echo $q . "<br>";
        // var_dump($result);

        $lastId = $mysqli->insert_id;


        if ($result) {
            $sql = 'INSERT INTO saveurl(url,email,savedate,userid)
            VALUES("' . $url . "?id=" . $lastId . '","abc@exm.com","' . date("h:i:sa d-m-Y") . '", "1" )';
            // VALUES("' . $url . "?id=" . $lastId . '","' . $_SESSION['email'] . '","' . date("h:i:sa d-m-Y") . '", "' . $_SESSION['id'] . '" )';

            $res = mysqli_query($mysqli, $sql);
           
            // echo $sql . "<br>";
            // var_dump($res);
            // exit;

            if ($res)
                echo '{ "result": "success","lastId":"' . $lastId . '"}';
            else
                echo "error";
        } else {
            echo "error";
        }
    }
} elseif (isset($_POST['act']) && $_POST['act'] == "updateProfile") {

    if (!empty($_POST["id"]) && !empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["phone"])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $q = 'UPDATE users SET name="' . $name . '",email="' . $email . '",phone="' . $phone . '" WHERE id="' . $id . '"';

        $result = mysqli_query($mysqli, $q);

        if ($result) {
            echo "success";
        } else {
            echo "error";
        }
    }
} elseif (isset($_POST['act']) && $_POST['act'] == "logout") {

    unset($_SESSION["id"]);
    unset($_SESSION["email"]);
    // $destroyed = session_destroy();
    // if ($destroyed) echo "success";
    if (empty($_SESSION['id']) && empty($_SESSION['email'])) echo "success";
    else echo "error";
}

// if (!empty($_POST["full_name"]) && !empty($_POST["enquiryEmail"]) && !empty($_POST["contactNumber"]) && !empty($_POST["enquiryDetail"]) && isset($_FILES["uploadImage"])) {
if (!empty($_POST["full_name"]) && !empty($_POST["enquiryEmail"]) && !empty($_POST["contactNumber"]) && !empty($_POST["enquiryDetail"])) {

    // $image = $_FILES["uploadImage"]['name'];
    // $targetPath = "./patterns/" . basename($image);
    // $moved = move_uploaded_file($_FILES['uploadImage']['tmp_name'], $targetPath);

    $fullname = $_POST["full_name"];
    $email = $_POST["enquiryEmail"];
    $phone = $_POST["contactNumber"];
    $detail = $_POST["enquiryDetail"];

    $q = "INSERT INTO orders(fullname,email,phone,image,enquirydetail,userid)
        VALUES ('" . $fullname . "','" . $email . "','" . $phone . "','','" . $detail . "','" . $_SESSION['id'] . "' ) ";
    // VALUES ('" . $fullname . "','" . $email . "','" . $phone . "','" . $image . "','" . $detail . "','" . $_SESSION['id'] . "' ) ";

    $result = mysqli_query($mysqli, $q);
    // echo $q;
    // var_dump($result);

    // if ($result && $moved) {
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}
