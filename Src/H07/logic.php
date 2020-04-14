<?php
$servername = "localhost";
$username = "testPHP";
$password = "testPHP";
$dbname = "PHPlogin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM accounts";
$result = $conn->query($sql);

$loginfo = array();

while($row = $result->fetch_array())
{
$rows[] = $row;
}
foreach ($rows as $miniArrays) {
    $loginfo += [ $miniArrays["emailadres"] => $miniArrays["wachtwoord"] ];
}


$email  =   $password   = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email      = test_input( $_POST[ "email"    ]  );
    $password   = test_input( $_POST[ "password" ]  );
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$status_Logged_In = false;
if ($result->num_rows > 0) {
    foreach ($loginfo as $lIemail => $lIpassword ) {
            if ($lIemail == $email and $lIpassword == $password) {
                echo "Welkom";
                $status_Logged_In = true;
            } 
        }
    }

if ($status_Logged_In == false) {
    echo "Sorry, geen toegang.";
}

$conn->close();
?>