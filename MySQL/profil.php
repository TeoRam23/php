<div class="content">
<?php
include "azure.php";
include "loggedin.php";

include "topp.php";
$id_fra_link = $_GET['bruker_id'];


$sql = "SELECT * FROM bruker WHERE idbruker='$id_fra_link' ";
$resultat = $con->query($sql);

$rad = $resultat->fetch_assoc();

$idbruker = $rad['idbruker'];
$brukernavn = $rad['brukernavn'];
$fornavn = $rad['fornavn'];
$etternavn = $rad['etternavn'];
$bio = $rad['bio'];
$passord = $rad['passord'];
$epost = $rad['epost'];
$tlf = $rad['tlf'];
$skole = $rad['skole'];
$bosted = $rad['bosted'];
$fodselsdato = $rad['fodselsdato'];
$profilbilde = $rad['profilbilde'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $brukernavn ?></title>
</head>
<body>

<div class= profil>

<?php

$spin = rand(1,100);
if (isset($profilbilde)) {
    if ($spin == 23) {
    echo "<img class='profil_spin'src='img/$profilbilde'>";
    } else {
        echo "<img class='profilprofilbilde'src='img/$profilbilde'>";
    }
} else {
    if ($spin == 25) {
        echo "<img class='profil_spin'src='img/default.png'>";
        } else {
            echo "<img class='profilprofilbilde'src='img/default.png'>";
        }
}

if ($_SESSION['login_id'] == $idbruker) {
    echo "<a href='rediger.php'> Rediger profil </a>";
}

echo "<h1>$brukernavn</h1>";
echo "<h2>$fornavn $etternavn</h2>";

echo "<p>$epost</p>";


echo "<p>Fødselsdato: $fodselsdato</p>";


if ($bio != NULL) {
    echo "<p>$bio</p>";
} else {
    echo "<p>$brukernavn har ikke satt et bio enda</p>";
}

if ($tlf != NULL) {
    echo "<p>Tlf: $tlf</p>";
}

if ($skole != NULL) {
    echo "<p>Skole: $skole</p>";
}

if ($bosted != NULL) {
    echo "<p>Bosted: $bosted</p>";
}

echo "<br>";

if ($_SESSION['login_id'] == $idbruker) {
    echo "<div class='legg_ut'> <div>";
    include "upload.php";
    echo "</div> <div>";
    include "innlegg.php";
    echo "</div> </div>";
}
?>


<div class='bilde_div'>
    <?php
        $sql = "SELECT * FROM media WHERE idbruker='$idbruker' ";
        $resultat = $con->query($sql); # henter ut fra DB

        while($rad = $resultat->fetch_assoc()) { # loop gjennom alle brukere
            $idmedia = $rad['idmedia'];
            $media_navn = $rad['media_navn'];  
            echo "<a href='bildevisning.php?media_id=$idmedia'>
                <img class='bilder'src='img/$media_navn'>
                </a>";
        }

    ?>
</div>

<?php
if(isset($_POST["submit_kommentar"])) {
    $tekst = $_POST["tekst_kommentar"];
    $idinnlegg = $_POST["idinnlegg"];
    $login_id = $_SESSION['login_id'];
    $sql = "INSERT INTO innlegg_kommentar (tekst, idbruker, idinnlegg, date) VALUES ('$tekst','$login_id', '$idinnlegg', now() )";
 
    # sjekk om feil eller ble lagt til
    if($con->query($sql)) {
    } else {
        echo "Feilmelding: $con->error";
    }
}?>
<div class='innlegg'>
    <?php
    $sql = "SELECT * FROM innlegg WHERE idbruker='$idbruker' ORDER BY date DESC";
    $resultat = $con->query($sql);

    while($rad = $resultat->fetch_assoc()) {
        echo "<div class='box'>";
        $innlegg_tekst = $rad['tekst'];
        $dato_opprettet = $rad['date'];
        $idinnlegg = $rad['idinnlegg'];
        echo "<h4>$brukernavn - $dato_opprettet </h4>
              <p class='breaker'> $innlegg_tekst</p><br> <div class=kommentar>
              <h4>Kommentarer:</h4>

        <form method='POST'>
            <input name='tekst_kommentar' value='kommentar'>
            <input name='idinnlegg' type='hidden' value='$idinnlegg'>
            <input type='submit' name='submit_kommentar' value='Kommenter'>
        </form>
        ";

        include "kommentar.php";
        echo "</div></div>";

        
    }


    echo "</div>";
    ?>

</div>
</body>
</html>