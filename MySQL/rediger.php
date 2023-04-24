<div class="content">
 <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rediger profil</title>
</head>
<body>

<?php 
include "azure.php";
include "loggedin.php";

include "topp.php"; 
$id = $_SESSION['login_id'];

echo "
<div class='registrer'>

    <h2>Rediger profil </h2>
    <a href='profil.php?bruker_id=$id'> Tilbake </a>";

$sql = "SELECT * FROM bruker WHERE idbruker='$id' ";
$resultat = $con->query($sql);

$rad = $resultat->fetch_assoc();

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
include "upload profil.php";

echo "
<form method='POST'>
    <label for='brukernavn'>Brukernavn*</label><br>
    <input type='text' name='brukernavn' value='$brukernavn'><br><br>
    <label for='fornavn'>Fornavn*</label><br>
    <input type='text' name='fornavn' value='$fornavn'><br><br>
    <label for='etternavn'>Etternavn</label><br>
    <input type='text' name='etternavn' value='$etternavn'><br><br>
    <label for='bio'>Bio</label><br>
    <input type='text' name='bio' value='$bio'><br><br>
    <label for='passord'>Passord*</label><br>
    <input type='password' name='passord' value='$passord'><br><br>
    <label for='epost'>Epost*</label><br>
    <input type='text' name='epost' value='$epost'><br><br>
    <label for='tlf'>Tlf</label><br>
    <input type='text' name='tlf' value='$tlf'><br><br>
    <label for='skole'>Skole</label><br>
    <input type='text' name='skole' value='$skole'><br><br>
    <label for='bosted'>Bosted</label><br>
    <input type='text' name='bosted' value='$bosted'><br><br>
    <label for='fodselsdato'>Fødselsdato*</label><br>
    <input type='date' name='fodselsdato' value='$fodselsdato'><br><br>

    <input type='submit' name='rediger' value='Rediger profil'>
    <input type='reset'><br><br>
</form>
";




if(isset($_POST["rediger"])) {
    $brukernavn = $_POST["brukernavn"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $bio = $_POST["bio"];
    $passord = $_POST["passord"];
    $epost = $_POST["epost"];
    $tlf = $_POST["tlf"];
    $skole = $_POST["skole"];
    $bosted = $_POST["bosted"];
    $fodselsdato = $_POST["fodselsdato"];

    echo "<p> Profilen din ble redigert </p>";

    if ($brukernavn != NULL) {
        $sql = "UPDATE bruker SET brukernavn='$brukernavn' WHERE idbruker='$id'";
        $insert = $con->query($sql);
    }

    if ($fornavn != NULL) {
        $sql = "UPDATE bruker SET fornavn='$fornavn' WHERE idbruker='$id'";
        $insert = $con->query($sql);
    }

    if ($etternavn != NULL) {
        $sql = "UPDATE bruker SET etternavn='$etternavn' WHERE idbruker='$id'";
        $insert = $con->query($sql);
    }

    if ($bio != NULL) {
        $sql = "UPDATE bruker SET bio='$bio' WHERE idbruker='$id'";
        $insert = $con->query($sql);
    }

    if ($passord != NULL) {
        $sql = "UPDATE bruker SET passord='$passord' WHERE idbruker='$id'";
        $insert = $con->query($sql);
    }

    if ($epost != NULL) {
        $sql = "UPDATE bruker SET epost='$epost' WHERE idbruker='$id'";
        $insert = $con->query($sql);
    }

    if ($tlf != NULL) {
        $sql = "UPDATE bruker SET tlf='$tlf' WHERE idbruker='$id'";
        $insert = $con->query($sql);
    }

    if ($skole != NULL) {
        $sql = "UPDATE bruker SET skole='$skole' WHERE idbruker='$id'";
        $insert = $con->query($sql);
    }

    if ($bosted != NULL) {
        $sql = "UPDATE bruker SET bosted='$bosted' WHERE idbruker='$id'";
        $insert = $con->query($sql);
    }

    if ($fodselsdato != NULL) {
        $sql = "UPDATE bruker SET fodselsdato='$fodselsdato' WHERE idbruker='$id'";
        $insert = $con->query($sql);
    }

    
}
?>
    </div>
</div>
</body>
</html>