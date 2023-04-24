<!doctype html>
<html>
<head>
    <title> noe </title>
    <meta charset="UTF-8">
</head>

<body>
<?php
if (isset($_GET["variabel"])) {
    echo $_GET["variabel"];
} else {
    echo "nah";
}
echo "<br>";
if (isset($_GET["mer"])) {
    echo $_GET["mer"];
} else {
    echo "nåhå";
}
echo "<br>";

if (isset($_GET["sendinn"])) {
    $navn = $_GET["dittnavn"];
    $film = $_GET["favorittfilm"];

    echo "<p>Du heter $navn, og din favorittfilm er $film.";
}
?>
</body>
</html>