<form method="post" enctype="multipart/form-data">
    <label for='file'>Last opp bilde:</label><br>
    <input type="file" name="file"><br>
    <input type="submit" name="submit_media" value="Last opp"><br><br>
</form>
 
<?php
// koble til database
include 'azure.php';
$statusMsg = '';
 
if(isset($_POST["submit_media"]) && !empty($_FILES["file"]["name"])){
    // File upload path
    $targetDir = "img/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
 
    // id til bruker, som skal tilhøre bildet
    //$id = $_POST['id'];
 
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $sql = "INSERT into media (media_navn, idbruker, date) VALUES ('$fileName', '$idbruker', NOW())";
            $insert = $con->query($sql);
            if($insert){
                header("Refresh:1; url=profil.php?bruker_id=$idbruker", true, 303);
            }else{
                $statusMsg = "Filen ble ikke lastet opp, prøv igjen <br>($con->error)";
                
            } 
        }else{
            $statusMsg = "Beklager, det var en error med filen din";
        }
    }else{
        $statusMsg = 'Bare JPG, JPEG, PNG, GIF, & PDF er aksepterte filer';
    }
}else{
    $statusMsg = NULL;
}
 
// Display status message
if ($statusMsg != NULL){
    echo "<p>$statusMsg</p>";
}
?>