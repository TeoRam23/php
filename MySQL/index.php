<div class="content">
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hjem</title>
</head>
<body>
<?php
include "azure.php";
include "loggedin.php";

include "topp.php";

$sql = "SELECT idbruker, brukernavn, profilbilde FROM bruker";
$resultat = $con->query($sql);
echo "<h2>Alle brukere</h2>";

#resultat inneholder all informasjon fra bruker og gjør hver av linjene (brukerne) til en array 
while($rad = $resultat->fetch_assoc()){
    $idbruker = $rad["idbruker"];
    $brukernavn = $rad['brukernavn'];
    $profilbilde = $rad["profilbilde"];

    if ($profilbilde != NULL) {
        echo "<a href='profil.php?bruker_id=$idbruker'><img class='profilbilde' src='img/$profilbilde'></a>";
    } else {
        echo "<a href='profil.php?bruker_id=$idbruker'><img class='profilbilde'src='img/default.png'></a>";
    }
        

    echo "<a href='profil.php?bruker_id=$idbruker'> $brukernavn </a><br><br>";
}

?>
</div>
</body>
</html>