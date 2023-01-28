<?php
// !! CODED BY BIBEK SHRESTHA
?>
<?php
session_start();
?>
<?php
if (isset($_SESSION['userid'])) {
    if ((time() - $_SESSION['login_timestamp']) > 900) {
        header("Location:login.php");
    } else {
        $_SESSION['login_timestamp'] = time();
    }
} else {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            text-transform: uppercase;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .timer2 {
            font-weight: 600;
            font-size: 2em;
        }

        .timer {
            text-align: center;
            height: 60vh;
            display: grid;
            place-items: center;
        }
    </style>

</head>

<body>
    <div class="timer-container">
        <div class="timer2">session expires in</div>
        <div class="timer2 timer" id="timer">hello <?php echo $_SESSION['userid']; ?></div>
    </div>
    <script>
        const timer = document.querySelector(".timer");
        let timerTime = 15,
            timerTime2 = 15,
            minute, second = 60,
            flag;

        let timerInterval;

        timerInterval = setInterval(startTimer, 1000);
        timerTime2 = timerTime2 - 1;

        function startTimer() {
            second--;
            if (timerTime2 > 0) {
                if (second == 0) {
                    second = 59;
                    timerTime2 = timerTime2 - 1;
                }
                timer.innerHTML = timerTime2 + ":" + second;
            } else {
                if (second == 0) {
                    clearInterval(timerInterval);
                    timerTime2 = 0;
                }
                timer.innerHTML = timerTime2 + ":" + second;
            }
            if (timerTime2 == 0 && second == 0) {
                alert("Session expired");
                window.location.href = "login.php";
            }
        }
    </script>

</body>

</html>
<?php
// !! CODED BY BIBEK SHRESTHA
?>