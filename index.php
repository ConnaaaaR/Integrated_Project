<?php
    require_once 'classes/DBConnector.php';
    require_once 'utils/utils.php';
    //----------------------------------
    // retreive stories
    //----------------------------------


    // Large Story
    try{
        $largeStories = Get::all('articles', 1);
    }
    catch(Exeption $e){
        die("Exception: ".$e-> getMessage());
    }

    // Medium stories
    try{
        $medStories = Get::all('articles', 6);
    }
    catch(Exeption $e){
        die("Exception: ".$e-> getMessage());
    }

     // Small stories
    try{
        // $sideStories = Get::all('articles', 13);

        $worldStories = Get::byCategory('World',3);
        $covidStories = Get::byCategory('COVID',3);
        $economyStories = Get::byCategory('Economy',3);
        $scienceStories = Get::byCategory('Science',3);
        
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
    

    <title>World News | <?= tabDate(); ?></title>
</head>
<body>
    <div class="container">
    <!-- main headline -->
    <?php foreach($largeStories as $largeStory){ ?>
        <div class="width-8 headline nested">
            <div class="width-12">
                
                <div class="banner">
                    <div class="category"><p><?= getCategory($largeStory->genre_id)?></p></div>
                </div>
                <h1 class="artLink"> <a href="article.php?id=<?= $largeStory->id ?>"><?= $largeStory->headline ?></a></h1>
                <h2><?= $largeStory->summary ?></h2>
                <div class="nameDate">
                    <div class="name">
                        <p>by <?= getAuthor($largeStory->id) ?> &nbsp;•&nbsp;</p>
                    </div>
                    <div class="date">
                        <p><?= setDate($largeStory) ?></p>
                    </div>
                </div>
                <p><?= $largeStory->article ?></p>
                
            </div>
            <?php } ?>
        <!-- end main headline -->
        <!-- medium stories -->
        <?php
            foreach($medStories as $medStory){
        ?>
            <div class="width-6">
                <div class="banner">
                    <div class="category"><p><?= getCategory($medStory->genre_id) ?></p></div>
                </div>
                <h3 class="artLink"> <a href="article.php?id=<?= $medStory->id ?>"> <?= $medStory->headline ?></a></h3>
                <div class="date">
                    <p><?= setDate($medStory) ?></p>
                </div>
                <p><?= $medStory->article?></p>
                
            </div>
        <?php
            }
        ?>
        </div>
        <!-- end medium stories -->
        <!-- sidebar -->
        <div class="width-4 nested">
            <div class="width-12">
                <!-- Category & banner -->
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

            <div class="width-12">
                <!-- Category & banner -->
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

            <div class="width-12">
                <!-- Category & banner -->
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


            <div class="width-12">
                <!-- Category & banner -->
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



        </div>
    </div>
   
</body>
</html>