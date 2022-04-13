<?php
require_once 'classes/DBConnector.php';
require_once 'utils/utils.php';
require_once 'validation.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_GET["id"];
    if (empty($errors)){
        try{
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



// try{
//     $id = $_GET["id"];
//     $data = [
//         'headline' => $_POST['headline'],
//         'short_headline' => $_POST['short_headline'],
//         'subtitle' => $_POST['subtitle'],
//         'article' => $_POST['article'],
//         'summary' => $_POST['summary'],
//         'date' => $_POST['date'],
//         'time' => $_POST['time'],
//         'genre_id' => $_POST['genre'],
//         'writer_id' => $_POST['author']
//       ];
      
//     Post::edit('articles',$id ,$data);
//     header("Location: index.php");
// } 
// catch (Exception $e) {
//     die("Exception: ". $e->getMessage());
// }
?>