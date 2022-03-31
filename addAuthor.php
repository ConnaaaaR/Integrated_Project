<?php
require_once 'validation.php';
require_once 'classes/DBConnector.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    [$author, $errors] = author_validate($_POST,Connection::getInstance()); 

    if (empty($errors)){
        try{
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'author_link' => $_POST['author_link']
              ];
              
            Post::create('writers', $data);
            header("Location: index.php");
        } 
        catch (Exception $e) {
            die("Exception: ". $e->getMessage());
        }
    }else{
        session_start();
        $_SESSION["author"] = $author;
        $_SESSION["errors"] = $errors;
        header("Location: addAuthorForm.php");
    }
}

?>