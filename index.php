<?php
    //----------------------------------
    // retreive stories
    //----------------------------------
    
    require_once 'classes/DBConnector.php';
     // small side stories
    try{
        $sideStories = Get::all('articles', 7);
    }
    catch(Exeption $e){
        die("Exception: ".$e-> getMessage());
    }

    // medium stories
    try{
        $medStories = Get::all('articles', 4);
    }
    catch(Exeption $e){
        die("Exception: ".$e-> getMessage());
    }


    //----------------------------------
    // Format date
    //----------------------------------
    function setDate($elementId){
        $formatDate = strtotime($elementId->date);
        return date('l, j F', $formatDate);
    }

    //----------------------------------
    // Returns category from Id
    //----------------------------------
    function getCategory($id){
        try{
            $categories = Get::byId('genres', $id);
            
            if($categories){
                return $categories->genre; 
            }
            else{
                throw new Exception("Failed to retrieve genre!");  
            } 
        }
        catch(PDOException $e){
            echo "error: " . $e->getMessage();
        }
    }
    //----------------------------------
    // Gets author first and last name and combines and prints
    //----------------------------------
    function getAuthor($id){
        try{
           
            $writerId = Get::byId('writers', $id);
            $nameArr = array(
                $writerId->first_name,
                $writerId->last_name
            );
            $nameStr = implode(" ", $nameArr);
            if($writerId){
                return $nameStr;
            }
            else{
                throw new Exception("Failed to retrieve author!");  
            } 
        }
        catch(PDOException $e){
            echo "error: " . $e->getMessage();
        }
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
    

    <title>Document</title>
</head>
<body>
    <div class="container">
    <!-- main headline -->
        <div class="width-8 headline nested">
            <div class="width-12">
                <div class="banner">
                    <div class="category"><p>HEALTH</p></div>
                </div>
                <h1>Children aged 12 to 15 to be offered booster jab</h1>
                <h2>Stephen Donnelly said the move follows advice from the National Immunisation Advisory Committee</h2>
                <div class="nameDate">
                    <div class="name">
                        <p>by Stephan McGhee &nbsp;•&nbsp;</p>
                    </div>
                    <div class="date">
                        <p>Thursday, 3 March</p>
                    </div>
                </div>
                <p>MPs will get a £2,200 pay rise from next month, the parliamentary spending watchdog has announced, sparking a backlash given the change will coincide with the national insurance hike and a growing “cost of living crisis”.</p>
                <p>The 2.7% increase in MPs' salaries is nearly half the current rate of inflation, effectively meaning they will get a real-terms pay cut, but comes against a backdrop of significant economic hardship for many and the Bank of England urging workers not to ask for sizeable pay rises to try to stop prices spiralling out of control.</p>
            </div>
        <!-- end main headline -->
        <!-- medium stories -->
        <?php
            foreach($medStories as $medStory){
        ?>
            <div class="width-6">
                <div class="banner">
                    <div class="category"><p><?= getCategory($medStory->genre_id) ?></p></div>
                </div>
                <h3><?= $medStory->headline ?></h3>
                <div class="date">
                    <p><?= setDate($medStory) ?></p>
                </div>
                <p><?= $medStory->article?></p>
                
            </div>
        <?php
            }
        ?>

            <!-- <div class="width-6">
                <div class="banner">
                    <div class="category"><p>POLITICS</p></div>
                </div>
                <h3>Ukraine crisis: Joe Biden accuses Russia of running ‘false flag operation’ to justify invasion</h3>
                <div class="date">
                    <p>Thursday, 3 March</p>
                </div>
                <p>MPs will get a £2,200 pay rise from next month, the parliamentary spending watchdog has announced, sparking a backlash given the change will coincide with the national insurance hike and a growing “cost of living crisis”.</p>
                <p>The 2.7% increase in MPs' salaries is nearly half the current rate of inflation, effectively meaning they will get a real-terms pay cut, but comes against a backdrop of significant economic hardship for many and the Bank of England urging workers not to ask for sizeable pay rises to try to stop prices spiralling out of control.</p>
            </div>
            <div class="width-6">
                <div class="banner">
                    <div class="category"><p>POLITICS</p></div>
                </div>
                <h3>Ukraine crisis: Joe Biden accuses Russia of running ‘false flag operation’ to justify invasion</h3>
                <div class="date">
                    <p>Thursday, 3 March</p>
                </div>
                <p>MPs will get a £2,200 pay rise from next month, the parliamentary spending watchdog has announced, sparking a backlash given the change will coincide with the national insurance hike and a growing “cost of living crisis”.</p>
                <p>The 2.7% increase in MPs' salaries is nearly half the current rate of inflation, effectively meaning they will get a real-terms pay cut, but comes against a backdrop of significant economic hardship for many and the Bank of England urging workers not to ask for sizeable pay rises to try to stop prices spiralling out of control.</p>
            </div>
            <div class="width-6">
                <div class="banner">
                    <div class="category"><p>POLITICS</p></div>
                </div>
                <h3>Ukraine crisis: Joe Biden accuses Russia of running ‘false flag operation’ to justify invasion</h3>
                <div class="date">
                    <p>Thursday, 3 March</p>
                </div>
                <p>MPs will get a £2,200 pay rise from next month, the parliamentary spending watchdog has announced, sparking a backlash given the change will coincide with the national insurance hike and a growing “cost of living crisis”.</p>
                <p>The 2.7% increase in MPs' salaries is nearly half the current rate of inflation, effectively meaning they will get a real-terms pay cut, but comes against a backdrop of significant economic hardship for many and the Bank of England urging workers not to ask for sizeable pay rises to try to stop prices spiralling out of control.</p>
            </div> -->
        </div>
        <!-- end medium stories -->
        <!-- sidebar -->
        <div class="width-4 nested">
            <?php
                foreach($sideStories as $sideStory){
            ?>
            <div class="width-12">
                <!-- Category & banner -->
                <div class="banner">
                    <div class="category"><p><?=getCategory($sideStory->genre_id)?></p></div>
                </div>
                <!-- Headline -->
                <h3><?= $sideStory ->short_headline ?></h3>
                <!-- Date w/ formatting -->
                <div class="date">
                    <p><?= setDate($sideStory)?></p>
                </div>
            </div> 
            <?php
                }
            ?>
            <!-- <div class="width-12">
                <div class="banner">
                    <div class="category"><p>POLITICS</p></div>
                </div>
                <h3>'Constant shelling' as Russian forces lay siege to key Ukrainian cities</h3>
                <div class="date">
                    <p>Thursday, 3 March</p>
                </div>
            </div> 
            <div class="width-12">
                <div class="banner">
                    <div class="category"><p>POLITICS</p></div>
                </div>
                <h3>'Constant shelling' as Russian forces lay siege to key Ukrainian cities</h3>
                <div class="date">
                    <p>Thursday, 3 March</p>
                </div>
            </div> 
            <div class="width-12">
                <div class="banner">
                    <div class="category"><p>POLITICS</p></div>
                </div>
                <h3>'Constant shelling' as Russian forces lay siege to key Ukrainian cities</h3>
                <div class="date">
                    <p>Thursday, 3 March</p>
                </div>
            </div> 
            <div class="width-12">
                <div class="banner">
                    <div class="category"><p>POLITICS</p></div>
                </div>
                <h3>'Constant shelling' as Russian forces lay siege to key Ukrainian cities</h3>
                <div class="date">
                    <p>Thursday, 3 March</p>
                </div>
            </div> 
            <div class="width-12">
                <div class="banner">
                    <div class="category"><p>POLITICS</p></div>
                </div>
                <h3>UK and New Zealand sign free trade deal</h3>
                <div class="date">
                    <p>Thursday, 3 March</p>
                </div>
            </div> 
            <div class="width-12">
                <div class="banner">
                    <div class="category"><p>POLITICS</p></div>
                </div>
                <h3>People of colour fleeing Ukraine attacked by Polish nationalists</h3>
                <div class="date">
                    <p>Thursday, 3 March</p>
                </div>
            </div> 
            <div class="width-12">
                <div class="banner">
                    <div class="category"><p>POLITICS</p></div>
                </div>
                <h3>EU carbon permit prices crash after Russian invasion of Ukraine</h3>
                <div class="date">
                    <p>Thursday, 3 March</p>
                </div>
            </div>  -->


        </div>
    </div>
   
</body>
</html>