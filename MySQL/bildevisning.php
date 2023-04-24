<div class="content">
<?php
include "azure.php";
include "loggedin.php";

include "topp.php";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilde</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
$media_id_fra_link = $_GET['media_id']; # id fra link på bilde

$sql = "SELECT * FROM media WHERE idmedia='$media_id_fra_link' ";
$resultat = $con->query($sql); 

$rad = $resultat->fetch_assoc();
$idmedia = $rad['idmedia'];  
$dato = $rad['date'];  
$media_navn = $rad['media_navn'];  
$idbruker = $rad['idbruker'];


echo "<a href='profil.php?bruker_id=$idbruker'>Tilbake</a>
<img class='bildevisning' src='img/$media_navn'> ";
            
?>
<div class='innlegg'>
<div class='box'>
<?php 
$sql = "SELECT * FROM media_kommentar JOIN bruker ON media_kommentar.idbruker=bruker.idbruker WHERE idmedia='$media_id_fra_link' ORDER BY date DESC";
$resultat_media_kommentar = $con->query($sql); # henter ut fra DB

echo "<h4>Kommentarer:</h4>
<form method='POST'>
    <input name='tekst_kommentar' value='kommentar'>
    <input name='idmedia' type='hidden' value='$media_id_fra_link'> 
    <input type='submit' name='submit_kommentar' value='Svar'>
</form>";

while($kom = $resultat_media_kommentar->fetch_assoc()) { # loop gjennom alle kommentarer
    $innlegg_tekst = $kom['text']; 
    $dato_opprettet = $kom['date'];
    $brukernavn = $kom['brukernavn'];

    echo "<p class='breaker'><b>$brukernavn</b> - $dato_opprettet:<br> $innlegg_tekst</p>";
}


if(isset($_POST["submit_kommentar"])) { # hvis svar knapp er trykket
    $tekst = $_POST["tekst_kommentar"];
    $idmedia = $_POST["idmedia"];
    $id = $_SESSION['login_id'];

    $sql = "INSERT INTO media_kommentar (text, idbruker, idmedia, date) VALUES ('$tekst','$id', $media_id_fra_link, now() )";
    
    # sjekk om feil eller ble lagt til
    if($con->query($sql)) {
        header("Refresh:1; url=bildevisning.php?media_id=$media_id_fra_link", true, 303);
    } else {
        echo "Feilmelding: $conn->error";
    }
}
?>
</div>
</div>
</div>

</body>