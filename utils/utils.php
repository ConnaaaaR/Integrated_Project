<?php
    // This file contains functions that I have created
    // to fufil formatting or other requirements for my design.
    require_once 'classes/DBConnector.php';
    date_default_timezone_set('Europe/London');



    class DeleteEntry{
        public static function deleteStory($tableName, $id){
            $sql = 'DELETE FROM ' . $tableName . ' WHERE id='.$id;

            $conn = Connection::getInstance();
            $stmt = $conn -> prepare($sql);

            $succ = $stmt->execute();
            if(!$succ){
                throw new Exception("Failed to run SQL command!");
            }
        }
    }




    //----------------------------------
    // Returns current date in an abbreviated format (used in the browser tab)
    //----------------------------------
    function tabDate(){
        
        return $timestamp = date('D, j M');
    }


    //----------------------------------
    // Format date (Long form date for use in the Headline article and articles.php)
    //----------------------------------
    function setDate($elementId, $date = True){
        // Use the $date bool to switch between time and date, defaults to date
        //Must be given whole table as obj. Date and Time MUST be separate in table.
        if($date){
            $formatDate = strtotime($elementId->date);
            return date('l, j F', $formatDate);
        }else{
            $formatDate = strtotime($elementId->time);
            return date('H:i', $formatDate);
        }
        

        
    }

    //----------------------------------
    // Returns the current London time once, when ran
    //----------------------------------
    function getCurrentTime(){
        $time = date("H:i");
        return $time;
    }
    //----------------------------------
    // Returns category from Id
    //----------------------------------
    function getCategory($id){
        try{
            $categories = Get::byId('genres', $id);
            
            if($categories){
                return $categories->name; 
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
    // Returns combined author name
    //----------------------------------
    function getAuthor($id){
        try{
            $writerId = Get::byId('writers', $id);
            // $nameArr = array(
            //     $writerId->first_name,
            //     $writerId->last_name
            // );
            // $nameStr = implode(" ", $nameArr);
            if($writerId){
                return $writerId->first_name . " " . $writerId->last_name;
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