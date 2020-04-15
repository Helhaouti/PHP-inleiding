<?php
    session_start();

    $users = array(
        "admin" => array("pwd" => "admin", "rol" => "Administrator" ),    
        "user"  => array("pwd" => "user",  "rol" => "Gebruiker"     ),                    
        "other" => array("pwd" => "other", "rol" => "Gebruiker"     )    
    );

    if (isset($_GET["loguit"])) {
        $_SESSION = array();
        session_destroy();
    }

    if (isset($_POST["submit"]) 
     && isset($users[$_POST["login"]]) 
     && $users[$_POST["login"]]["pwd"] == $_POST["pwd"]) {

        $_SESSION["user"] = array( 
            "naam" => $_POST["login"],      
            "pwd" => $users[$_POST["login"]]["pwd"],      
            "rol" => $users[$_POST["login"]]["rol"]
        );

        $message = "Welkom "  . $_SESSION["user"]["naam"] . " met de rol: "
                              . $_SESSION["user"]["rol"];

    } else if (isset($_POST["submit"]) && isset($_POST["login"]) != $users || $users[$_POST["login"]]["pwd"] != $_POST["pwd"]) {
        $message = "Je gebruikersnaam of wachtwoord klopt niet, probeer het opnieuw";
    } else {        
        $message = "Inloggen";
    }
?>

<html>
    <body>
        <h1><?php echo $message; ?></h1>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="login">Login: </label>
                <input type="text" name="login" value="" required><br>
                
                <label for="password">Wachtwoord:</label>
                <input type="password"  name="pwd" value="" required><br>

                <input type="submit" name="submit" value="submit">
            </form>
        <p><a href="website.php">website</a></p>
        <p><a href="admin.php">admin</a></p>
        <p><a href="loginpage.php?loguit">uitloggen</a></p>

    </body>
</html>