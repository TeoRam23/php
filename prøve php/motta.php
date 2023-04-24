<?php
$navn = $_GET["navn"];

$inntekt2020 = $_GET["inntekt2020"];
$inntekt2021 = $_GET["inntekt2021"];
$inntekt2022 = $_GET["inntekt2022"];

echo "Din inntekt i 2020: $inntekt2020 <br>";
echo "Din inntekt i 2021: $inntekt2021 <br>";
echo "Din inntekt i 2022: $inntekt2022 <br>";

$samlet = $inntekt2020 + $inntekt2021 + $inntekt2022;
echo "Din samlet inntekt: $samlet <br>";

$gjennomsnitt = $samlet/3;
echo "Din gjennomsnitts inntekt: $gjennomsnitt <br>";

if ($gjennomsnitt > 610000) {
    echo "Gjennomsnitts inntekten din er høyere enn gjennomsnittet i Norge";
} else if ($gjennomsnitt < 610000) {
    echo "Gjennomsnitts inntekten din er lavere enn gjennomsnittet i Norge";
}

?>