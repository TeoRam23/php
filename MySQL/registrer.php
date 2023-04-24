<div class="content">
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrer deg</title>
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION['login_id'])) {
        include "topp.php";
    }
?>
<div class='registrer'>

<h2>Registrer deg</h2>
<form method="POST">
    <label for="brukernavn">Brukernavn*</label><br>
    <input type="text" name="brukernavn"><br><br>
    <label for="fornavn">Fornavn*</label><br>
    <input type="text" name="fornavn"><br><br>
    <label for="etternavn">Etternavn</label><br>
    <input type="text" name="etternavn"><br><br>
    <label for="bio">Bio</label><br>
    <input type="text" name="bio"><br><br>
    <label for="passord">Passord*</label><br>
    <input type="password" name="passord"><br><br>
    <label for="epost">Epost*</label><br>
    <input type="text" name="epost"><br><br>
    <label for="tlf">Tlf</label><br>
    <input type="text" name="tlf"><br><br>
    <label for="skole">Skole</label><br>
    <input type="text" name="skole"><br><br>
    <label for="bosted">Bosted</label><br>
    <input type="text" name="bosted"><br><br>
    <label for="fodselsdato">Fødselsdato*</label><br>
    <input type="date" name="fodselsdato"><br><br>

    <input type="submit" name="leggtil" value="Registrer deg"><br><br>
</form>
<?php
if (!isset($_SESSION['login_id'])) {
    ?><button onclick='document.location="login.php"' class=login_button> Logg inn </button> <?php
}

include "azure.php";

if(isset($_POST["leggtil"])) {
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

    if ($brukernavn != NULL and $fornavn != NULL and $passord != NULL and $epost != NULL and $fodselsdato != NULL) {
        $sql = "INSERT INTO bruker (brukernavn, fornavn, etternavn, bio, passord, epost, tlf, skole, bosted, fodselsdato, profilbilde) VALUES ('$brukernavn','$fornavn','$etternavn','$bio','$passord','$epost','$tlf','$skole','$bosted','$fodselsdato', 'default.png')";
        if($con->query($sql)) {
            $sql = "SELECT fornavn, brukernavn, passord, idbruker FROM bruker WHERE brukernavn='$brukernavn'";
            $resultat = $con->query($sql); # henter ut fra DB
    
            $rad = $resultat->fetch_assoc();
            $_SESSION['login_id'] = $rad['idbruker'];
            $_SESSION['brukernavn'] = $rad['brukernavn'];
            echo "<p>Profilen din ble lagt til!</p>";
            header("Refresh:1; url=index.php", true, 303);
        }
    } else {
        echo "<p> Du fylte ikke inn alle de obligatoriske feltene * </p>";
    }
}
?>
    </div>
</div>
</body>
</html>