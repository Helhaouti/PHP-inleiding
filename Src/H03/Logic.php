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
} else {
    // Only for testing    
    $sellected = $Bomen;
}


foreach ($sellected as $value) {
    if ($sellected == $Bomen) {
        echo '<img src="Resources/Bomen/'; echo $value . '">' . '<br>';
    } elseif ($sellected == $Apen) {
        echo '<img src="Resources/Apen/'; echo $value . '">' . '<br>';
    }
}
?>