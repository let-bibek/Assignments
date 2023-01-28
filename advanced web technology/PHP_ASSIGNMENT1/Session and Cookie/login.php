<?php
// !! CODED BY BIBEK SHRESTHA
?>
<?php
$emlerr = $passerr = $error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['useremail'])) {
        $useremail = $_POST['useremail'];
    } else {
        $emlerr = "Please enter email";
    }
    if (!empty($_POST['userpassword'])) {
        $userpassword = md5($_POST['userpassword']);
    } else {
        $passerr = "Please enter password";
    }

    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $db_name = "human_database";
    $con = mysqli_connect($servername, $username, $db_password, $db_name);

    if (!$con) {
        die("Unable to connect to the database");
    }
    if (!(empty($useremail) && empty($userpassword))) {

        $sql = "SELECT * FROM users WHERE email='$useremail' AND userpassword='$userpassword'";


        if ($results = mysqli_query($con, $sql)) {
            $res_count = mysqli_num_rows($results);
            if (!$res_count == 0) {
                session_start();
                foreach ($results as $result) {
                    $username = $result['userid'];
                }
                $_SESSION['userid'] = $username;
                $_SESSION["login_timestamp"] = time();
                header("Location:home.php");
            } else {
                $error = 'Invalid username or password';
            }
        }
        mysqli_close($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        .form-container {
            width: 400px;
            margin-inline: auto;
            padding: 20px;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f4f4f4;
            border: 1px solid #979797;
        }

        input {
            width: 250px;
            padding: 5px 10px;
        }

        label {
            display: inline-block;
            width: 70px;
            text-align: right;
            font-size: 18px;
            margin-right: 20px;
        }

        span {
            color: red;
            display: inline-block;
            padding: 5px;
            width: 100%;
            text-align: center;
            margin-inline: auto;

        }

        .btn-container {
            display: grid;
            place-items: center;
            margin-top: 50px;
        }

        button {
            display: inline-block;
            width: 100px;
            padding: 5px 15px;
        }

        .error {
            padding: 10px;
            text-align: center;
            color: red;
        }
    </style>
</head>

<body>
    <center>
        <h1>User Login</h1>
    </center>
    <div class="error"><span><?php echo $error; ?></span></div>
    <div class="form-container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <span><?php echo $emlerr; ?></span>
            <br>
            <label for="useremail">Email:</label>
            <input type="email" name="useremail" id="useremail" value="<?php echo isset($_POST['useremail']) ? $_POST['useremail'] : '' ?>">
            <br><br>
            <span><?php echo $passerr; ?></span>
            <br>
            <label for="userpassword">Password:</label>
            <input type="password" name="userpassword" id="userpassword" value="<?php echo isset($_POST['userpassword']) ? $_POST['userpassword'] : ''; ?>">
            <br><br>
            <div class="btn-container">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>

</html>
<?php
// !! CODED BY BIBEK SHRESTHA
?>