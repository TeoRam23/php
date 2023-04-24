<?php
session_start();

if (!isset($_SESSION['login_id'])) {
    echo "<p class='rød_text'>Du er ikke logget inn, du er død</p>";
    header("Refresh:1; url=login.php", true, 303);
    die();
}
?>