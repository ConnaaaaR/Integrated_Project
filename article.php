<?php 
require_once 'classes/DBConnector.php';

try{
    $story = Get::byId('articles', $_GET["id"]);
    
}
catch(Exeption $e){
    die("Exception: ".$e-> getMessage());
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>Document</title>
</head>
<body>
    <?= $story->headline ?>
</body>
</html>