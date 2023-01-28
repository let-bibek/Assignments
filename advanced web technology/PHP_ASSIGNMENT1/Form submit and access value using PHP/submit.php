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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
    <style>
        p {
            border: 2px solid black;
            padding: 8px 20px;
            width: 700px;
            margin-inline: auto;
            display: flex;
            /* gap: 10px; */
        }

        label {
            display: inline-block;
            width: 150px;
            text-align: right;
            font-weight: 700;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <center>
        <h1>Submitted Data</h1>
        <h2>The submitted data are listed in a table below:</h2>
    </center>
    <p>
        <label>User Id:</label><?php echo $userId; ?>
    </p>
    <p>
        <label>Password Hash:</label><?php echo $password; ?>
    </p>
    <p>
        <label>First Name:</label><?php echo $fname; ?>
    </p>
    <p>
        <label>Address:</label><?php echo $address; ?>
    </p>
    <p>
        <label>Country:</label><?php echo $country; ?>
    </p>
    <p>
        <label>Zip:</label><?php echo $zip; ?>
    </p>
    <p>
        <label>Email:</label><?php echo $email; ?>
    </p>
    <p>
        <label>Sex:</label><?php echo $sex; ?>
    </p>
    <p>
        <label>Language:</label><?php echo ($eng . " " . $noneng); ?>
    </p>
    <p>
        <label>About:</label>
        <?php echo $about; ?>
    </p>
</body>

</html>
<?php
// !! CODED BY BIBEK SHRESTHA
?>