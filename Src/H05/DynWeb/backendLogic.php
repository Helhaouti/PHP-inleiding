<?php

$name       = "";             
$address    = "";
$email      = "";
$password   = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name       = test_input( $_POST[ "name"     ]  );
    $address    = test_input( $_POST[ "address"  ]  );
    $email      = test_input( $_POST[ "email"    ]  );
    $password   = test_input( $_POST[ "password" ]  );
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}




if ($name != "" and $address != "" and $email != "" and $password != "") {
        echo "Naam:      " . $name . "<br>";
        echo "Adres:     " . $address . "<br>";
        echo "E-mail:    " . $email . "<br>";
        echo "Wachtwoord:" . $password . "<br>";
    } else {
        echo "Vul het Formulier volledig in!";
    }
?>