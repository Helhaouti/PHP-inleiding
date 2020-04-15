<?php
$servername = "localhost";
$username = "testPHP";
$password = "testPHP";
$dbname = "PHPschool";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM cursist";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo 
    "
    <html><head>
    <style>
    th {
        border: 2px solid black;
    }
    td {
        border: solid 1px black;
    }
    </style>
    </head>" .

    "<body><table>
    <tr>
    <th>Cursist nummer</th>
    <th>Naam</th>
    <th>Roepnaam</th>
    <th>Straat</th>
    <th>Postcode</th>
    <th>Plaats</th>
    <th>Geslacht</th>
    <th>Geboortedatum</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo 
        "<tr><td>" . $row["cursistnr"]
        . "<td>" . $row["naam"]
        . "<td>" . $row["roepnaam"]
        . "<td>" . $row["straat"]
        . "<td>" . $row["postcode"]
        . "<td>" . $row["plaats"]
        . "<td>" . $row["geslacht"]
        . "<td>" . $row["geb_datum"]
        . "</tr>"
        ;
    }
    echo "</table></body></html>";
} else {
    echo "0 results";
}
$conn->close();
?>

