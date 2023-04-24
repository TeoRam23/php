<?php
$tilfeldig = rand(1,100);
if ($tilfeldig > 50) {
    echo "tallet er over 50";
} else if ($tilfeldig == 50) {
    echo "ehm.. jeg vet ikke, oppgaven sa ikke hva som kulle skje om tallet var 50";
} else {
    echo "tallet er lavere enn 50";
}


?>