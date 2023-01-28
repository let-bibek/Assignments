<?php
$servername = "localhost";
$username = "root";
$db_password = "";
$db_name = "human_database";
$con = mysqli_connect($servername, $username, $db_password, $db_name);
if (!$con) {
    die("Unable to connect.");
}
$sql = "SELECT * FROM users ORDER BY id DESC";
if ($results = mysqli_query($con, $sql)) {
    echo '<center><h1>Users List</h1></center>';
    echo '<table border="1px" cellpadding="10" cellspacing="0" style="margin-inline:auto;">
        <tr>
            <th>Id</th>
            <th>User Id</th>
            <th>First Name</th>
            <th>Address</th>
            <th>Country</th>
            <th>CountryZIP Code</th>
            <th>Email</th>
            <th>Sex</th>
            <th>Language</th>
        </tr>
    ';
    foreach ($results as $result) {
        echo '<tr>
            <td>' . $result['id'] . '</td>
            <td>' . $result['userid'] . '</td>
            <td>' . $result['fname'] . '</td>
            <td>' . $result['useraddress'] . '</td>
            <td>' . $result['country'] . '</td>
            <td>' . $result['zip'] . '</td>
            <td>' . $result['email'] . '</td>
            <td>' . $result['sex'] . '</td>
            <td>' . $result['userlanguage'] . '</td>
        </tr>';
    }
    echo '</table>';
}
mysqli_close($con);
?>
<?php
// !! CODED BY BIBEK SHRESTHA
?>