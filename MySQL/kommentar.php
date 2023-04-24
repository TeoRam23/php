<?php

$sql = "SELECT * FROM innlegg_kommentar JOIN bruker ON bruker.idbruker=innlegg_kommentar.idbruker 
        WHERE idinnlegg='$idinnlegg' ORDER BY date DESC ";
$resultat_kommentar = $con->query($sql);

while($kom = $resultat_kommentar->fetch_assoc()) {
    $kom_tekst = $kom['tekst'];
    $dato_opprettet = $kom['date'];
    $bruker_kommentar = $kom['brukernavn'];
  

    echo "<p class='breaker'><b>$bruker_kommentar</b> - $dato_opprettet:<br> $kom_tekst</p>";
}
?>