<?php 
$Bomen = dirToArray("Resources/Bomen");
$Apen = dirToArray("Resources/Apen");

$input = "";
$sellected = "";

function dirToArray($dir) {
  
    $result = array();
 
    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
       if (!in_array($value,array(".","..")))
       {
          if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
          {
             $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
          }
          else
          {
             $result[] = $value;
          }
       }
    }
   
    return $result;
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input   = test_input(   $_POST["keuzeMenu"]  );
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($input == "Bomen") {
    $sellected = $Bomen;
    } elseif ($input == "Apen") {
    $sellected = $Apen;
    } elseif ($input == "Kerstboom") {
    $sellected = "Kerstboom";
    } elseif ($input == "forLoop") {
    $sellected = "forLoop";     
    } elseif ($input == "controlestructurEnLoops") {
        $sellected = "controlestructurEnLoops";     
}


foreach ($sellected as $value) {
    if ($sellected == $Bomen) {
        echo '<img src="Resources/Bomen/'; echo $value . '">' . '<br>';
    } elseif ($sellected == $Apen) {
        echo '<img src="Resources/Apen/'; echo $value . '">' . '<br>';
    }
}

if ($sellected == "Kerstboom") {
    $asteriskPerLine = 1;
    $spacesPerLine = 9;
    for($line = 0; $line < 9; $line++) {

        for($spaces = 0; $spaces < $spacesPerLine; $spaces++){
            echo "&nbsp;";
        }
        for($asterisk = 0; $asterisk < $asteriskPerLine; $asterisk++){
            echo " * ";
        }
        
        $spacesPerLine--;
        $asteriskPerLine++;
        echo "<br>";
    }
}

if ($sellected == "forLoop") { 
    for ($x = 35; $x >= 25; $x--) {
        echo "hoppelepee";
    }
}

if ($sellected == "controlestructurEnLoops") {
    $monkeycounter = 0;
    $style = 0;

    foreach ($Apen as $value) {
        $monkeycounter++;
            echo '<img style="display: inline; '; 

            if ( $style == 0) { echo "border: solid 3px green;"; $style++;
            } elseif ( $style == 1) { echo "border: solid 3px red;"; $style = 0;
            } elseif ( $style == 2) { echo "border: solid 3px red; margin-left: 150px;"; $style = 0; }

            echo '" src="Resources/Apen/'; echo $value . '">';

            if ($monkeycounter == 5) { echo "<br>"; $style = 2; }
    }
}


?>