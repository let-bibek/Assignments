<?php
session_start();
?>
<?php
$userId = $_SESSION["userid"];
$password = $_SESSION["password"];
$fname = $_SESSION["fName"];
$address = $_SESSION["address"];
$country = $_SESSION["country"];
$zip = $_SESSION["zip"];
$email = $_SESSION["email"];
$sex = $_SESSION["sex"];
$eng = $_SESSION["lang_eng"];
$noneng = $_SESSION["lang_noeng"];
$about = $_SESSION["about"];
$errmsg = "";
if (empty($eng)) {
    $language = $noneng;
} else {
    $language = $eng;
}
$servername = "localhost";
$username = "root";
$db_password = "";
$db_name = "human_database";

$con = mysqli_connect($servername, $username, $db_password, $db_name);
if (!$con) {
    die("Connection failed" . mysqli_connect_error());
}
$sql = "INSERT INTO users (userid,userpassword,fname,useraddress,country,zip,email,sex,userlanguage,about) 
VALUES ('$userId','$password','$fname','$address','$country','$zip','$email','$sex','$language','$about')
";
if (mysqli_query($con, $sql)) {
    echo '<script>
         window.alert("Congratulation!! Data inserted successfully.");
         window.location.href="users-list.php";
    </script>';
} else {
    $errmsg = mysqli_error($con);
    echo '<script>
         window.alert("Sorry!! Couldn\'t insert the data. Reason for failure:"' . $errmsg . ';
    </script>';
}
?>

<?php
mysqli_close($con);
?>

<?php
// !! CODED BY BIBEK SHRESTHA
?>