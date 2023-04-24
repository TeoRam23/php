<!doctype html>
<html>
<head>
    <title> php </title>
    <meta charset="UTF-8">

    <style> 
    table {
        border-collapse: collapse;
    }
    th, td {
        border-style: solid;
        padding: 5px;
    }
    img {
        height: 200px;
    }
    </style>

</head>

<body>
<?php
$tall1 = 17;
$tall2 = 9;
$tekst1 = "Karl";
$tekst2 = "Johan";

$sum = $tall1 + $tall2;
$differanse = $tall1 - $tall2;
$produkt = $tall1 * $tall2;
$kvotient = $tall1 / $tall2;

$langTekst = $tekst1 . $tekst2;
$bedreTekst = $tekst1 . " " . $tekst2 . "s gate";

echo "Summen blir $sum <br>";
echo "Differansen blir $differanse <br>";
echo "Produktet blir $produkt <br>";
echo "Kvotienten blir $kvotient <br>";

echo"<br><br>";

echo "$langTekst <br>";
echo "$bedreTekst <br><br>";

echo "<a href='https://en.wikipedia.org/wiki/Link_(The_Legend_of_Zelda)'>Link</a> <br>";

echo"<br>";

$måned = date("m");
if ($måned == 1) {
    $måned = "januar";
} else if ($måned == 2) {
    $måned = "februar";
} else if ($måned == 3) {
    $måned = "mars";
} else if ($måned >= 4) {
    $måned = "senere på året enn mars";
}

echo "Vi er i måneden $måned <br>";


$fødsel = 2006;
$år = date("Y");
if ($år - $fødsel > 18) {
    echo "Du er over 18 år <br>";
} else {
    echo "Du er ikke over 18 år... baby <br>";
}

$tilfeldig = rand(1,2);
if ($tilfeldig == 1) {
    echo "du får ingen svar <br>";
} else if ($tilfeldig == 2) {
    echo "du får ikke et svar til spørmåket ditt <br>";
}

echo"<br>";

while ($tall1 <= 100) {
    $tall = rand(0,1);
    echo "$tall ";
    $tall1 += 1;
}
echo"<br>";
$tall = 1;
while ($tall <= 15) {
    echo "$tall ";
    $tall++;
}
echo"<br>";
for ($i = 1; $i <= 15; $i++) {
    echo "$i ";
}
echo"<br>";
$tall = 1;
while ($tall <= 42) {
    echo "IT1 ";
    $tall++;
}
echo"<br>";
for ($i = 1; $i <= 42; $i++) {
    echo "IT1 ";
}
echo"<br>";
for ($i = 2; $i <= 20; $i += 2) {
    echo "$i ";
}
echo"<br>";

echo "<table>";
for ($i = 1; $i <=25; $i += 1) {
    echo "<tr>
                <td> noe </td>
                <td>  noe mer </td>
        </tr>";
}
echo "</table>";

$factor1 = 1;
$tall = 1;
$factor2 = 1;
$tabell = 10;
echo "<table>";
for ($i = 1; $i <= $tabell; $i++) {
    $factor1 = 1;
    echo "<tr>";
    for ($o = 1; $o <= $tabell; $o++) {
        $tall = $factor1 * $factor2;
        echo "<td> $tall </td>";
        $factor1++;
    }
    echo "</tr>";
    $factor2++;
}
echo "</table>";
echo"<br>";

echo "<table>";
for ($i = 1; $i <= $tabell; $i++) {
    echo "<tr>";
    echo "<td> $i gangen </td>";
    for ($o = 1; $o <= $tabell; $o++) {
        $tall = $o*$i;
        echo "<td> $o * $i = $tall </td>";
    }
}
echo "</table>";
echo"<br>";

$figurer = array("Langbein", "Asterix", "Skrue McDuck", "Forstørrelsesglass-mannen", "Figur Figuren");

echo "<h3>Noen tegneseriefigurer</h3>";
for ($i=0; $i < count($figurer); $i++) {
    echo "Figur med indeks $i: $figurer[$i] <br>";
}
echo '<h3>Arrayen $figurer</h3>';
var_dump($figurer);
echo $figurer[2];
echo"<br>";

$art = array("Langbein"=>"Hund", "Asterix"=>"Menneske", "Skrue McDuck"=>"And", "Forstørrelsesglass-mannen"=>"Romvesen", "Figur Figuren"=>"Figur");

$tilfeldig = rand(0,4);
echo "<p>$figurer[$tilfeldig]: " . $art["$figurer[$tilfeldig]"] . "</p>";
echo '<h3>Array $art</h3>';
var_dump($art);
echo"<br>";

$tall = array(20, 58, 23, 6, 1000);
$sum = 0;
for ($i = 1; $i <= count($tall); $i++) {
    $sum += $tall[$i-1];
}
echo "$sum<br>";
$sum = array_sum($tall);
echo "$sum<br>";

$kort_type = array("♥", "♤", "♧", "♢");
$tilfeldig1 = rand(0, 3);
$tilfeldig2 = rand(1,13);
if ($tilfeldig2 == 11) {
    $tilfeldig2 = "knekt";
} else if ($tilfeldig2 == 12) {
    $tilfeldig2 = "dronning";
} else if ($tilfeldig2 == 13) {
    $tilfeldig2 = "konge";
}
echo "<p>$kort_type[$tilfeldig1] " . $tilfeldig2 . "</p>";

$path ='bilder/';
$kortstokk = scandir($path);
$random = rand(2,count($kortstokk)-1);
$kort = $kortstokk[$random];
echo "<img src='bilder/$kort'><br>";
echo $kortstokk[$random];
echo"<br>";

$array = array(33,3,23,5,25,0,10,-50);
for ($i = 0; $i <= count($array)-1; $i++) {
    $tall = $array[$i];
    if ($tall >= 10) {
        echo "$tall ";
    }}
echo"<br><br>";

$variabel = "jah";
$mer = "jåhå";
echo "<a href='noe.php?variabel=$variabel&mer=$mer'>noe</a><br><br>";

?>
<form action="noe.php" method="GET">
    Ditt navn
    <input type="text" name="dittnavn">
    Hva er din favorittfilm?
    <input type="text" name="favorittfilm">
    <input type="submit" name="sendinn" value="Send inn">
</form>

<?php
if (isset($_GET["sendinn"])) {
    $etternavn = $_GET["dittetternavn"];
    $spill = $_GET["favorittspill"];
    echo "<p>Etternavnet ditt er $etternavn, og ditt favorittspill er $spill.</p>";
}
echo "<br>";
?>
<form method="GET">
    Ditt etternavn
    <input type="text" name="dittetternavn">
    Hva er ditt favorittspill?
    <input type="text" name="favorittspill">
    <input type="submit" name="sendinn" value="Send inn">
</form>

<?php
if (isset($_GET["sendinn2"])) {
    $fugl1 = $_GET["favorittfugl1"];
    $fugl2 = $_GET["favorittfugl2"];
    $fugl3 = $_GET["favorittfugl3"];
    echo "<p>Dine top 3 favoritt fugler:</p>";
    echo "<lo>
            <li> $fugl1 </li>
            <li> $fugl2 </li>
            <li> $fugl3 </li>
        </lo>";
}
echo "<br>";
?>
<form method="GET">
    Hva er dine top 3 favorittfugler?
    <input type="text" name="favorittfugl1">
    <input type="text" name="favorittfugl2">
    <input type="text" name="favorittfugl3">
    <input type="submit" name="sendinn2" value="Send inn">
</form>

<?php
include "inkluder.php"

?>

</body>
</html>