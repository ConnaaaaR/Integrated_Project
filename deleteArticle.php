<?php
require_once 'classes/DBConnector.php';
require_once 'utils/utils.php';
require_once 'validation.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_GET["id"];
    if (empty($errors)){
        try{
            //deletes article using class from utils.php
            DeleteEntry::deleteStory('articles', $id);
            header("Location: index.php");
        } 
        catch (Exception $e) {
            die("Exception: ". $e->getMessage());
        }
    }else{
        header("Location: deleteArticleForm.php?id=$id");
    }
}
?>