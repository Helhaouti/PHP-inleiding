<?php

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



if ($email != "" and $password != "") {
    $loginfo = array(
        "piet@worldonline.nl" => "doetje123",
        "klaas@carpets.nl" => "snoepje777",
        "truushendriks@wegweg.nl" => "arkiearkie201"
    );

    foreach ($loginfo as $lIemail => $lIpassword ) {

        if ($lIemail == $email and $lIpassword == $password) {
            echo "Welkom";
        }}
} else {
    echo "Sorry, geen toegang.";
}
?>