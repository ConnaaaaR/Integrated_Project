<?php
require_once 'classes/DBConnector.php';
require_once 'validation.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_GET["id"];
    [$data, $errors] = article_validate($_POST,Connection::getInstance()); 

    // echo '<pre>';
    // print_r($_POST);
    // print_r($data);
    // print_r($errors);
    // print_r(empty($errors));
    // echo '</pre>';
    

    if (empty($errors)){
        try{
            // $data = [
            //     'headline' => $_POST['headline'],
            //     'short_headline' => $_POST['short_headline'],
            //     'subtitle' => $_POST['subtitle'],
            //     'article' => $_POST['article'],
            //     'summary' => $_POST['summary'],
            //     'date' => $_POST['date'],
            //     'time' => $_POST['time'],
            //     'genre_id' => $_POST['genre'],
            //     'writer_id' => $_POST['author']
            //   ];
            
            Post::edit('articles', $id ,$data);
            header("Location: index.php");
        } 
        catch (Exception $e) {
            die("Exception: ". $e->getMessage());
        }
    }else{
        session_start();

        $_SESSION["data"] = $data;
        $_SESSION["errors"] = $errors;
        header("Location: updateArticleForm.php?id=$id");
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