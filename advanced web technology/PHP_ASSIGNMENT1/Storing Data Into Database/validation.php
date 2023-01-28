<?php
session_start();
$userid = $password = $fname = $address = $country = $zip = $email = $sex = $eng = $noneng = $about = "";
$nameerr = $passworderr = $fnameerr = $addresserr = $countryerr = $ziperr = $emailerr = $sexerr = $langerr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // user id
    if (empty($_POST["uId"])) {
        $nameerr = "User Id is required";
    } else {
        $userid = $_POST['uId'];
        if (!preg_match("/^\w+$/", $userid)) {
            $nameerr = "User id is not valid";
        }
        if ((strlen($userid) < 5) or (strlen($userid) > 12)) {
            $nameerr = "User id should be between 5 and 12";
        }
    }
    // password
    if (empty($_POST["password"])) {
        $passworderr = "Password is required";
    } else {
        $password = $_POST['password'];
        $enc_password = md5($password);
        if ((strlen($password) < 7) or (strlen($password) > 12)) {
            $passworderr = "Password length should be between 7 and 12";
        }
    }

    // first name
    if (empty($_POST["fName"])) {
        $fnameerr = "First name is required";
    } else {
        $fname = $_POST['fName'];
        if (!preg_match("/^[A-Za-z]+$/", $fname)) {
            $fnameerr = "First name should be alphabets only";
        }
    }
    // address
    if (!empty($_POST["address"])) {
        $address = $_POST["address"];
        if (!preg_match("/^\w+$/", $address)) {
            $addresserr = "Address should have only alpha numeric characters";
        }
    }

    //country
    if (empty($_POST["country"])) {
        $countryerr = "Country is required";
    } else {
        $country = $_POST["country"];
    }

    // zip
    if (empty($_POST["zip"])) {
        $ziperr = "Zip code is required";
    } else {
        $zip = $_POST['zip'];
        if (!preg_match("/^\\d+$/", $zip)) {
            $ziperr = "Zip code should be numeric only";
        }
    }

    // email
    if (empty($_POST["email"])) {
        $emailerr = "Email is required";
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerr = "Email is not valid";
        }
    }

    // sex
    if (empty($_POST["sex"])) {
        $sexerr = "Sex is required";
    } else {
        $sex = $_POST["sex"];
    }
    // language
    if (empty($_POST["english"]) and empty($_POST["nonenglish"])) {
        $langerr = "Language is required";
    } else {
        $lang_eng = $_POST["english"];
        if (!empty($_POST["nonenglish"])) {
            $lang_noneng = $_POST["nonenglish"];
        }
    }
    // about
    if (!empty($_POST["about"])) {
        $about = $_POST["about"];
    }

    if (empty($nameerr) && empty($langerr) && empty($sexerr) && empty($emailerr) && empty($ziperr) && empty($countryerr) && empty($addresserr) && empty($fnameerr) && empty($passworderr)) {
        $_SESSION["userid"] = $userid;
        $_SESSION["password"] = $enc_password;
        $_SESSION["fName"] = $fname;
        $_SESSION["address"] = $address;
        $_SESSION["country"] = $country;
        $_SESSION["zip"] = $zip;
        $_SESSION["email"] = $email;
        $_SESSION["sex"] = $sex;
        $_SESSION["lang_eng"] = $lang_eng;
        $_SESSION["lang_noeng"] = $lang_noneng;
        $_SESSION["about"] = $about;
        header("Location:datamanager.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <style>
        form {
            max-width: fit-content;
            margin-inline: auto;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            position: relative;
        }

        p {
            text-align: center;
            font-weight: 600;
        }

        .label {
            display: inline-block;
            width: 150px;
            text-align: right;
            margin-right: 10px;
        }

        input:nth-child(13),
        input:nth-child(18),
        input:nth-child(33) {
            width: 400px;
        }

        div {
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 2em;
        }

        input[type="submit"],
        button {
            appearance: none;
            padding: 7px 10px;
            font-size: 1.2em;
            cursor: pointer;
        }

        .required::after {
            content: " *";
            color: red;
        }

        .error {
            position: absolute;
            color: red;
            display: inline-block;
            width: 300px;
            height: 20px;
            right: -350px;
        }
    </style>
</head>

<body>
    <center>
        <h1>Registration Form</h1>
    </center>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="myForm">
        <p>Use tab keys to move from one input field to the next.</p>
        <label for="uId" class="label required">User Id:</label>
        <input type="text" name="uId" id="uId" value="<?php echo isset($_POST['uId']) ? $_POST['uId'] : '' ?>" /> <label class="error"><?php echo $nameerr; ?></label>
        <br /><br />
        <label for="password" class="label required">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" /><label class="error"><?php echo $passworderr; ?></label>
        <br /><br />
        <label for="fName" class="label required">First Name:</label>
        <input type="text" name="fName" id="fName" value="<?php echo isset($_POST['fName']) ? $_POST['fName'] : '' ?>" /><label class="error"><?php echo $fnameerr; ?></label>
        <br /><br />
        <label for="address" class="label not-required">Address:</label>
        <input type="text" name="address" id="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" /><label class="error"><?php echo $addresserr; ?></label>
        <br /><br />
        <label for="country" class="label required">Country:</label>
        <select name="country" id="country">
            <option value="" disabled selected hidden>Please select a country</option>
            <option value="Australia">Australia</option>
            <option value="Canada">Canada</option>
            <option value="India">India</option>
            <option value="Nepal">Nepal</option>
            <option value="Russia">Russia</option>
            <option value="USA">USA</option>
        </select><label class="error"><?php echo $countryerr; ?></label>
        <br /><br />
        <label for="zip" class="label required">ZIP Code:</label>
        <input type="text" name="zip" id="zip" value="<?php echo isset($_POST['zip']) ? $_POST['zip'] : '' ?>" /><label class="error"><?php echo $ziperr; ?></label>
        <br /><br />
        <label for="email" class="label required">Email:</label>
        <input type="text" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" /><label class="error"><?php echo $emailerr; ?></label>
        <br /><br />
        <label for="sex" class="label required">Sex:</label>
        <input type="radio" name="sex" value="male" id="smale" />
        <label for="smale">Male</label>
        <input type="radio" name="sex" value="female" id="sfemale" />
        <label for="sfemale">Female</label><label class="error"><?php echo $sexerr; ?></label> <br /><br />
        <label for="language" class="label  required">Language:</label>
        <input type="checkbox" name="english" id="english" value="english" />
        <label for="english">English</label>
        <input type="checkbox" name="nonenglish" id="nonenglish" value="nonenglish" />
        <label for="nonenglish">Non English</label> <label class="error"><?php echo $langerr; ?></label><br /><br />
        <label for="about" class="label not-required">About:</label>
        <textarea name="about" id="about" cols="50" rows="10"></textarea>
        <br /><br />
        <div><input type="submit" value="Submit" id="submit" /></div>
    </form>
</body>

</html>
<?php
// !! CODED BY BIBEK SHRESTHA
?>