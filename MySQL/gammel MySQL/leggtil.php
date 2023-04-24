<a href=index.php>Gå tilbake</a><br>
<form method="POST">
    Navn
    <br><input type="text" name="navn"><br>
    År
    <br><input type="number" name="year"><br>
    Versjon
    <br><input type="text" name="versjon"><br>
    Høyde
    <br><input type="text" name="hoyde"><br>
    Lengde
    <br><input type="text" name="lengde"><br>
    Fare
    <br><input type="text" name="fare"><br>
    Drops
    <br><input type="text" name="drops"><br>
    Spawn kondisjon
    <br><input type="text" name="spawn_kondisjon"><br>
    Spawn lokasjon
    <br><input type="text" name="spawn_lokasjon"><br>

    <input type="submit" name="leggtil" value="Legg til mob"><br><br>
</form>


<?php 
include "azure.php";

if(isset($_POST["leggtil"])) {    
    $navn = $_POST["navn"];
    $year = $_POST["year"];
    $versjon = $_POST["versjon"];
    $hoyde = $_POST["hoyde"];
    $lengde = $_POST["lengde"];
    $fare = $_POST["fare"];
    $drops = $_POST["drops"];
    $spawn_kondisjon = $_POST["spawn_kondisjon"];
    $spawn_lokasjon = $_POST["spawn_lokasjon"];

    $sql = "INSERT INTO mobs (navn, year, versjon, hoyde, lengde, fare, drops, spawn_kondisjon, spawn_lokasjon) VALUES ('$navn','$year','$versjon','$hoyde','$lengde','$fare','$drops','$spawn_kondisjon','$spawn_lokasjon')";
    
    if($con->query($sql)) {
        echo "Mob navnet $navn ble lagt til. Året $year ble lagt til";
    }

}


?>
