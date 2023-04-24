<form method='POST'>
        <label for='innlegg'>Skriv ditt innlegg:</label><br>
        <textarea name="tekst_innlegg" cols="30" rows="5" name='innlegg'></textarea><br>   
        <input type="submit" name='submit_innlegg' value='Legg ut'><br><br>
    </form>
<?php 
if(isset($_POST["submit_innlegg"])) {
    include "azure.php";
    $tekst = $_POST["tekst_innlegg"];
    $sql = "INSERT INTO innlegg (tekst, idbruker, date) VALUES ('$tekst','$idbruker', now() )";
 
    # sjekk om feil eller ble lagt til
    if($con->query($sql)) {
    } else {
        echo "Feilmelding: $con->error";
    }
}
