<?php
require_once 'classes/DBConnector.php';
require_once 'utils/utils.php';
session_start();

//set data to $_session if session contains data, else set $data & $errors to empty arrays
if (isset($_SESSION["data"]) && isset($_SESSION["errors"])) {
    $data = $_SESSION["data"];
    $errors = $_SESSION["errors"];
}else{
    $data = [];
    $errors = [];

}

try{
    $authors = Get::All('writers');
    
    if(!$authors){
        throw new Exception("Failed to retreive author IDs!");
    }
}catch(Exception $e){
    die("Exception: ".$e->getMessage());
}

try{
    $genres = Get::All('genres');
    
    if(!$genres){
        throw new Exception("Failed to retreive genre IDs!");
    }
}catch(Exception $e){
    die("Exception: ".$e->getMessage());
}


try{
    $story = Get::byId('articles', $_GET["id"]);
    if(!$story){
        throw new Exception("Failed to retrieve articles from id!");
    }

    $time = strtotime($story->time);

}
catch(Exception $e){
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
    <link rel="stylesheet" href="css/form.css">
    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Page Icon -->
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
    <link rel="icon" href="icon.svg">

    <title>WORLD NEWS | Delete a Article</title>
</head>
<body>

    <div class="container">
    <!-- Navigation Bar -->
    <div class=" width-12 navCont nested">
        <a class="width-2 navButtons" href="index.php">HOME</a>
        <a class="width-2 navButtons" href="updateArticleform.php?id=<?= $story->id?>">UPDATE</a></button>
        <a class="width-2 navButtons" href="createStoryForm.php">create article</a></button>
        <a class="width-2 navButtons" href="addAuthorForm.php">add author</a></button>
    </div>
    <!-- Logo and Subtitle -->
    <div class="width-12 logo"> <h1>WORLD NEWS</h1> </div>
    <h2 class='width-12'> <b>Delete a Article</b> </h2>

    <!-- Form Start -->
        <div class="width-12 nested">
            <form method="POST" action="deleteArticle.php?id=<?= $story->id?>" class="width-12 nested">
            <?php
            // echo "<pre>";
            // print_r($story);
            // echo "</pre>"
            ?>
                <!-- Headline -->
                <div class= "width-12 margin-t20">
                    <label>Headline</label><br>
                    <input disabled id="headline"type="text" name="headline" class="textInput" value="<?= $story->headline ?>">
                    <div class="error" id="headline_error"><?php if (isset($errors["headline"])) echo $errors["headline"];?></div>
                </div>
                
                <!-- Short Headline -->
                <div class= "width-12 margin-t20">
                    <label>Short Headline</label><br>
                    <input disabled id="short_headline"type="text" name="short_headline" class="textInput" value="<?= $story->short_headline ?>">
                    <div class="error" id="short_headline_error"><?php if (isset($errors["short_headline"])) echo $errors["short_headline"];?></div>
                </div>
                
                <!-- Subtitle -->
                <div class= "width-12 margin-t20">
                    <label>Subtitle</label><br>
                    <input disabled id="subtitle" type="text" name="subtitle" class="textInput" value="<?= $story->subtitle ?>">
                    <div class="error" id="subtitle_error"><?php if (isset($errors["subtitle"])) echo $errors["subtitle"];?></div>
                </div>
                
                <!-- Article -->
                <div class= "width-12 margin-t20">
                    <label>Article</label><br>
                    <textarea disabled id="article" type="text" name="article"class="textInput largeInput" value=""><?= $story->article?></textarea>
                    <!-- <input  id="article" type="text" name="article" class="textInput"> -->
                    <div class="error" id="article_error"><?php if (isset($errors["article"])) echo $errors["article"];?></div>
                </div>
                
                <!-- Summary -->
                <div class= "width-12 margin-t20">
                    <label>Summary</label><br>
                    <textarea disabled id="summary" type="text" name="summary" class="textInput largeInput" value=""><?= $story->summary?></textarea>
                    <div class="error" id="summary_error"><?php if (isset($errors["summary"])) echo $errors["summary"];?></div>
                </div>
                
                <!-- Date -->
                <div class= "width-6 margin-t20">
                    <label>Date</label><br>
                    <input disabled id="date" type="date" name="date" class="textInput"value="<?= $story->date  ?>">
                    <div class="error" id="date_error"><?php if (isset($errors["date"])) echo $errors["date"];?></div>
                </div>

                <!-- Time -->
                <div class= "width-6 margin-t20">
                    <label>Time </label><br>
                    <input disabled id="time" type="time" name="time" class="textInput" value="<?= date('H:i',$time)?>">
                    <div class="error" id="time_error"><?php if (isset($errors["time"])) echo $errors["time"];?></div>
                </div>

                <!-- Genre -->
                <div class= "width-6 margin-t20">
                    <label>Category</label><br>
                    <div>
                        <select disabled name="genre" id="genre">
                            <?php foreach($genres as $genre){ ?>
                            <option 
                            value="<?php 
                            if(isset($data["genre"]) && $data["genre"] === $genre["id"]) {echo "selected";}else{echo $genre->id;}
                             ?>">
                            

                            <?= $genre->name?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="error" id="genre_error"><?php if (isset($errors["genre"])) echo $errors["genre"];?></div>
                </div>


                <!-- Author -->
                <div class= "width-6 margin-t20">
                    <label>Author</label><br>
                    <div>
                        <select disabled name="author" id="author" >
                            <?php foreach($authors as $author){ ?>
                            <option 
                            value="<?= $author->id ?>"
                            <?php 
                            if($author->id === $story->writer_id) echo "selected";
                             ?>>

                            <?= getAuthor($author->id) ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div id="author_error"><?php if (isset($errors["author"])) echo $errors["author"];?></div>
                </div>

                <!-- Cancel / Submit -->
                <input type="reset" class="formButton width-6 margin-t20" value="Reset Fields"></button>
                <input  id="submit_btn" type="submit" class="formButton width-6 margin-t20" >
            </form>
        </div>
    <!-- Form End -->
            <!-- Footer -->
            <div class="footer width-12">
            <div><p class="footerText">Copyright World News 2022</p></div>
            <ul class="footerLinks">
                <li><a href="index.php">Home</a></li>
                <li><a href="createStoryForm.php">Create New Story</a></li>
                <li><a href="addAuthorForm.php">Add a New Author</a></li>
            </ul>
        </div>
        <!-- End Footer -->
    </div>
</body>
</html>
<?php
    if(isset($_SESSION["data"]) && isset($_SESSION["errors"])){
        unset($_SESSION["data"]);
        unset($_SESSION["errors"]);
    }
 ?>