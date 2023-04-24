<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mob</title>
</head>
<body>
<?php
include "azure.php";

$id = $_GET['mob_id'];

$sql = "SELECT * FROM mobs WHERE idmobs='$id' ";
$resultat = $con->query($sql);

$rad = $resultat->fetch_assoc();

$idmobs = $rad['idmobs'];
$navn = $rad['navn'];
$year = $rad['year'];
$versjon = $rad['versjon'];
$hoyde = $rad['hoyde'];
$lengde = $rad['lengde'];
$fare = $rad['fare'];
$drops = $rad['drops'];
$spawn_kondisjon = $rad['spawn_kondisjon'];
$spawn_lokasjon = $rad['spawn_lokasjon'];
$bilde = $rad['bilde'];

echo "<a href='index.php'> Tilbake </a>
    <h1>$navn </h1>
    <h2>kom ut i $year </h2>
    <img src='$bilde' alt='bilde'><br>
    ";
if ($hoyde != NULL) {
    echo "<p>$navn er $hoyde høy.</p>";
}
if ($lengde != NULL) {
    echo "<p>$navn er $lengde tjukk og lang.</p>";
}
if ($fare != NULL) {
    echo "<p>$navn er en $fare mob.</p>";
}
if ($drops != NULL) {
    echo "<p>Når $navn dør kan den droppe $drops.</p>";
}
if ($spawn_kondisjon != NULL) {
    echo "<p>$navn kan spawne ved $spawn_kondisjon.</p>";
}
if ($spawn_lokasjon != NULL) {
    echo "<p>$navn kan spawne i $spawn_lokasjon.</p>";
}

?>



    
</body>
</html>