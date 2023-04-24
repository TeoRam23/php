<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minecraft Mobs</title>
</head>
<body>

<a href=leggtil.php>Legg til/delete mob</a><br>

<?php
include "azure.php";


$sql = "SELECT * FROM mobs";
$resultat = $con->query($sql);



$table = 1;
if ($table == 0) {
    while($rad = $resultat->fetch_assoc()){
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

        echo "$navn, $year, $versjon, $hoyde, $lengde, $fare, $drops, $spawn_kondisjon, $spawn_lokasjon <br>";
    }
}

echo "<table>";
echo "<tr class='grass'>";
    echo "<th>Navn</th>";
    echo "<th>År</th>";
    echo "<th>Versjon</th>";
    echo "<th>Høyde</th>";
    echo "<th>Lengde</th>";
    echo "<th>Fare</th>";
    echo "<th>Drops</th>";
    echo "<th>Spawn kondisjon</th>";
    echo "<th>Spawn lokasjon</th>";
echo "</tr>";

while($rad = $resultat->fetch_assoc()){
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

    echo "<tr class='dirt'>";
        echo "<td><a href='mob.php?mob_id=$idmobs'> $navn </a></td>
            <td>$year</td>
            <td>$versjon</td>
            <td>$hoyde</td>
            <td>$lengde</td>
            <td>$fare</td>
            <td>$drops</td>
            <td>$spawn_kondisjon</td>
            <td>$spawn_lokasjon</td>
            <td> <form method='POST'>
                <input type='hidden' name='slett_id' value='$idmobs'>
                <input type='submit' value='Delete' class='delete'><br><br>
            </form> </td>
        </tr>";
}

echo "</table>";

include "slett.php";

?>

</body>
</html>