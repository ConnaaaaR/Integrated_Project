<?php
require_once 'classes/DBConnector.php';

try{
    $data = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'link' => $_POST['link']
      ];
      
    Post::create('stories', $data);
    //header("Location: index.php");

    // $Post = new Post();
    // $Post->create('writers', $data);

} catch (Exception $e) {
    die("Exception: ". $e->getMessage());
}
?>