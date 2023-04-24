<form method="post" enctype="multipart/form-data">
    <label for="file">Profilbilde</label><br>
    <input type="file" name="file"><br>
    <input type="submit" name="submit_profilbilde" value="Upload"><br><br>
</form>
 
<?php
// koble til database
include 'azure.php';
$statusMsg = '';
 
if(isset($_POST["submit_profilbilde"]) && !empty($_FILES["file"]["name"])){
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
            $sql = "UPDATE bruker SET profilbilde='$fileName' WHERE idbruker='$id'";
            $insert = $con->query($sql);
            if($insert){
                $statusMsg = "Filen ".$fileName. " ble lastet opp";
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
    echo "<br><p>$statusMsg</p>";
}
?>