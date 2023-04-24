<div class="content">
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['login_id'])) {
        include "topp.php";
    }
    ?>
<div class='registrer'>
    <form method='POST' action="">
        <label for="brukernavn">Brukernavn</label><br>
        <input type="text" name='brukernavn'><br><br>
        <label for="passord">Passord</label><br>
        <input type="password" name='passord'><br><br>
        <input type="submit" name='submit_login' value="Logg på">
    </form>
    <button onclick="document.location='registrer.php'" class=registrer_button> Registrer deg </button>
</div>
    <?php 
        if(isset($_POST['submit_login'])) { # hvis submit_login knappet er trykket
            include "azure.php";
            
            $brukernavn = $_POST['brukernavn'];
            $passord_skjema = $_POST['passord'];
            
            if ($brukernavn != NULL) {
            $sql = "SELECT fornavn, brukernavn, passord, idbruker FROM bruker WHERE brukernavn='$brukernavn'";
            $resultat = $con->query($sql); # henter ut fra DB
 
            $rad = $resultat->fetch_assoc();
                if ($rad['passord'] == $passord_skjema and $passord_skjema != NULL) {
                    echo "<p>Du er logget inn...</p>";

                    $_SESSION['login_id'] = $rad['idbruker'];
                    $_SESSION['brukernavn'] = $rad['brukernavn'];
                    header("Refresh:1; url=index.php", true, 303);

                } else {
                    echo "<p class='rød_text'>Brukernavnet eller passordet er feil</p>";
                }
            } else {
                echo "<p class='rød_text'>Brukernavnet eller passordet er feil</p>";
            }
            
 
            
 
        }
    
    ?>
    </div>
</body>
</html>