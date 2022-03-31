<?php
require_once 'classes/DBConnector.php';
require_once 'validation.php';

require_once 'classes/DBConnector.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    [$data, $errors] = article_validate($_POST,Connection::getInstance()); 

    if (empty($errors)){
        try{
            $data = [
                'headline' => $_POST['headline'],
                'short_headline' => $_POST['short_headline'],
                'subtitle' => $_POST['subtitle'],
                'article' => $_POST['article'],
                'summary' => $_POST['summary'],
                'date' => $_POST['date'],
                'time' => $_POST['time'],
                'genre_id' => $_POST['genre'],
                'writer_id' => $_POST['author']
              ];
              
            Post::create('articles', $data);
            header("Location: index.php");
        } 
        catch (Exception $e) {
            die("Exception: ". $e->getMessage());
        }
    }else{
        session_start();
        $_SESSION["data"] = $data;
        $_SESSION["errors"] = $errors;
        header("Location: createStoryForm.php");
    }
}



?>