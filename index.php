<?php
    require_once 'classes/DBConnector.php';
    // utils.php is an aggregation of function I made for this site.
    require_once 'utils/utils.php'; 


    //----------------------------------
    // retreive stories
    //----------------------------------


    // Large Story
    try{
        $largeStories = Get::allOrderBy('articles','date DESC', 1);
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
    
    <!-- 
        tabDate displays the date in an abbreviated format and is used in the tab to show the user
        the current date.
    -->
    <title>World News | <?= tabDate(); ?></title>
</head>
<body>
    <div class="container">
    <!-- Navigation Bar -->
    <div class=" width-12 navCont nested">
        <a class="width-2 navButtons" href="index.php">HOME</a>
        <a class="width-2 navButtons" href="createStoryForm.php">create article</a></button>
        <a class="width-2 navButtons" href="addAuthorForm.php">add author</a></button>
    </div>
    <!-- Logo -->
    <div class="width-12 logo"> <h1>WORLD NEWS</h1> </div>
    <!-- Main Headline -->
    <?php foreach($largeStories as $largeStory){ ?>
        <div class="width-8 headline nested">
            <div class="width-12 story">
                
                <div class="banner">
                    <div class="category"><p><?= getCategory($largeStory->genre_id)?></p></div>
                </div>
                <h1 class="artLink"> <a href="article.php?id=<?= $largeStory->id ?>"><?= $largeStory->headline ?></a></h1>
                <h3><?=nl2br($largeStory->subtitle) ?></h3>
                <div class="nameDate">
                    <div class="name">
                        <p>by <?= getAuthor($largeStory->writer_id) ?> &nbsp;•&nbsp;</p>
                    </div>
                    <div class="date">
                        <p><?= setDate($largeStory) ?></p>
                    </div>
                </div>
                <p><?= nl2br($largeStory->summary) ?></p>
                
            </div>
            <?php } ?>
        <!-- End Main Headline -->
        <!-- Medium Stories -->
        <?php
            foreach($medStories as $medStory){
        ?>
            <div class="width-6 story">
                <div class="banner">
                    <div class="category"><p><?= getCategory($medStory->genre_id) ?></p></div>
                </div>
                <h2 class="artLink"> <a href="article.php?id=<?= $medStory->id ?>"> <?= $medStory->headline ?></a></h2>
                <div class="date">
                    <p><?= setDate($medStory) ?></p>
                </div>
                <p><?=nl2br($medStory->summary)?></p>
                
            </div>
        <?php
            }
        ?>
        </div>
        <!-- End Medium Stories -->
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