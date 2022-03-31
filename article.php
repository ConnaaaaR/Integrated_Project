<?php 
// header("Content-Type: text/html; charset=ISO-8859-1");
require_once 'classes/DBConnector.php';
require_once 'utils/utils.php';

try{
    $story = Get::byId('articles', $_GET["id"]);
    if(!$story){
        throw new Exception("Failed to retrieve articles from id!");
    }

}
catch(Exception $e){
    die("Exception: ".$e-> getMessage());
}

  // Small stories
  try{
    // $sideStories = Get::all('articles', 13);

    $worldStories = Get::byCategoryOrderBy('World','date DESC',3);
    $covidStories = Get::byCategoryOrderBy('COVID','date DESC',3);
    $economyStories = Get::byCategoryOrderBy('Economy','date DESC',3);
    $scienceStories = Get::byCategoryOrderBy('Science','date DESC',3);
    $politicsStories = Get::byCategoryOrderBy('Politics','date DESC',3);
    
    //$sideStories = Get::byCategory('Economy');
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
    <!-- Styles -->
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Page Icon -->
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
    <link rel="icon" href="icon.svg">
    

    <title>World News | <?= $story->headline ?></title>
</head>
<body> <div class="container">
    <!-- Navigation Bar -->
    <div class=" width-12 navCont nested">
        <a class="width-2 navButtons" href="index.php">HOME</a>
        <a class="width-2 navButtons" href="updateArticleForm.php?id=<?= $story->id?>">UPDATE</a></button>
        <a class="width-2 navButtons" href="">DELETE</a></button>
        <a class="width-2 navButtons" href="createStoryForm.php">create article</a></button>
        <a class="width-2 navButtons" href="addAuthorForm.php">add author</a></button>
    </div>

    <!-- Logo -->
    <div class="width-12 logo"> <h1>WORLD NEWS</h1> </div>
    <!-- Main Headline -->
        <div class="width-12 headline  nested">

            <div class="width-8 ">
                <div class="banner">
                    <div class="category"><p><?= getCategory($story->genre_id)?></p></div>
                </div>
                <h1> <?= $story->headline ?></h1>
                <h2><?= $story->subtitle ?></h2>
                <div class="nameDate">
                    <p>by&nbsp;</p>
                    <div class="name">
                        <p><?= getAuthor($story->writer_id) ?> </p>
                    </div>
                    <div class="date">
                        <p>&nbsp;•&nbsp;<?= setDate($story) ?>&nbsp;•&nbsp;</p>
                    </div>
                    <div class="date">
                        <p><?= setDate($story, False) ?></p>
                    </div>
                </div>
                <!-- sets the \r\n to new line in html format -->
                <p><?= nl2br($story->article);?></p>
            </div>


        <!-- Side Stories -->
        <div class="width-4 nested">
            <!-- Get Stories From Category World -->
            <div class="width-12">
                <!-- Category & Banner -->
                <div class="banner">
                    <div class="category"><p>World</p></div>
                </div>
            </div>
            <?php
                foreach($worldStories as $worldStory){
            ?>
            <div class="width-12">
                <!-- Headline -->
                <h3 class="artLink"><a href="article.php?id=<?= $worldStory->id?>"><?= $worldStory->short_headline ?></a></h3>
                <!-- Date w/ formatting -->
                <div class="date">
                    <p><?= setDate($worldStory)?></p>
                </div>
            </div> 
            <?php
                }
            ?>


            <!-- Get Stories From Category COVID-->
            <div class="width-12">
                <!-- Category & Banner -->
                <div class="banner">
                    <div class="category"><p>COVID</p></div>
                </div>
            </div>
            <?php
                foreach($covidStories as $covidStory){
            ?>
            <div class="width-12">
                <!-- Headline -->
                <h3 class="artLink"><a href="article.php?id=<?= $covidStory->id?>"><?= $covidStory ->short_headline ?></a></h3 class="artLink">
                <!-- Date w/ formatting -->
                <div class="date">
                    <p><?= setDate($covidStory)?></p>
                </div>
            </div> 
            <?php
                }
            ?>


            <!-- Get Stories From Category Economy-->
            <div class="width-12">
                <!-- Category & Banner -->
                <div class="banner">
                    <div class="category"><p>Economy</p></div>
                </div>
            </div>
            <?php
                foreach($economyStories as $economyStory){
            ?>
            <div class="width-12">
                <!-- Headline -->
                <h3 class="artLink"><a  href="article.php?id=<?= $economyStory->id?>"><?= $economyStory ->short_headline ?></a></h3 class="artLink">
                <!-- Date w/ formatting -->
                <div class="date">
                    <p><?= setDate($economyStory)?></p>
                </div>
            </div> 
            <?php
                }
            ?>


            <!-- Get Stories From Category Science-->
            <div class="width-12">
                <!-- Category & Banner -->
                <div class="banner">
                    <div class="category"><p>Science</p></div>
                </div>
            </div>
            <?php
                foreach($scienceStories as $scienceStory){
            ?>
            <div class="width-12">
                <!-- Headline -->
                <h3 class="artLink"><a href="article.php?id=<?= $scienceStory->id?>"><?= $scienceStory ->short_headline ?></a></h3>
                <!-- Date w/ formatting -->
                <div class="date">
                    <p><?= setDate($scienceStory)?></p>
                </div>
            </div> 
            <?php
                }
            ?>

            <!-- Get Stories From Category Politics-->
            <div class="width-12">
                <!-- Category & Banner -->
                <div class="banner">
                    <div class="category"><p>Politics</p></div>
                </div>
            </div>
            <?php
                foreach($politicsStories as $politicsStory){
            ?>
            <div class="width-12">
                <!-- Headline -->
                <h3 class="artLink"><a href="article.php?id=<?= $politicsStory->id?>"><?= $politicsStory ->short_headline ?></a></h3>
                <!-- Date w/ formatting -->
                <div class="date">
                    <p><?= setDate($politicsStory)?></p>
                </div>
            </div> 
            <?php
                }
            ?>
        </div>
        <!-- End Side Stories -->
    </div>
        
    
</body>
</html>