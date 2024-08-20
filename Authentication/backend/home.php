<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Wellcome <?=$_SESSION["author_name"]?></h1>
    <h3> ID = <?=$_SESSION["author_id"]=$author["ID"]?>;</h3>
    <h3> Email =<?=$_SESSION["author_email"]=$author["Email"];?></h3>
    
</body>
</html>