<?php

    //----------------------------------
    // Returns current date
    //----------------------------------
    function tabDate(){
        date_default_timezone_set('Europe/Dublin');
        return $timestamp = date('D, j M');
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