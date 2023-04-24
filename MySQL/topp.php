<?php
$login_id = $_SESSION['login_id']; ?>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="topp">
    <button onclick="document.location='index.php'" class="knapp"> Hjem 
    </button>
    <button onclick="document.location='profil.php?bruker_id=<?php echo $login_id; ?>'" class="knapp"> Min profil
    </button>
    <button onclick="document.location='registrer.php'" class="knapp"> Registrer deg 
    </button>
    <button onclick="document.location='login.php'" class="knapp"> Bytt bruker
    </button>
</div>
<br>

</body>