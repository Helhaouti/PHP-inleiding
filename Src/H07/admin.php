<?php
    session_start();

    if (isset($_SESSION["user"]) && $_SESSION["user"]["rol"] == "Administrator") {
        echo "<h1> Welkom " . $_SESSION["user"]["naam"] . " op het admingedeelte van de website </h1>";
        echo '<p> <a href="loginpage.php">login</a> </p>';

    } else if (isset($_SESSION["user"]) && $_SESSION["user"]["rol"] == "Gebruiker") {
        echo "<h1>" . $_SESSION["user"]["naam"] . ", onvoldoende rechten,  deze pagina is alleen voor administrators. <h1>";
        echo '<p> <a href="loginpage.php">login</a> </p>';

    }  else {
        header("location: loginpage.php");
    }
?>