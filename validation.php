<?php
    require_once 'classes/DBConnector.php';

    function sanitize_input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
    
        return $data;
    }

    function validate_name($name){
        $regex = "/^[a-zA-Z-' ]*$/";
        return preg_match($regex, $name);
    }

    function validate_url($url){
        $regex = 
        "/^(https?:\/\/)?([\da-z\.-]+\.[a-z\.]{2,6}|[\d\.]+)([\/:?=&#]{1}[\da-z\.-]+)*[\/\?]?$/im";
        return preg_match($regex, $url);
    }

    function validate_date($date){
        $regex = "/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/";
        return preg_match($regex, $date);
    }

    function validate_time($time){
        $regex = "/^([0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/";
        return preg_match($regex, $time);
    }

    function validate_text($text){
        $regex = "/^[a-zA-Z0-9áéí'‘’%.;:,!?\"“”\-\/[\]()\… —\r\n€£\$–]*$/";
        return preg_match($regex, $text);
    }

    function author_validate($data){

        $errors = [];
        $author= [];



        //first_name validation
        if (empty($data["first_name"])){
            $errors["first_name"] = "The first name field is required.(PHP VALIDATION ERROR)";
        }else{
            $author["first_name"] = sanitize_input($data["first_name"]);
            if(!validate_name($author["first_name"])){
                $errors["first_name"] = "Only letters and spaces are allowed. (PHP VALIDATION ERROR)";
            }
        }

        //last_name validation
        if (empty($data["last_name"])){
            $errors["last_name"] =
             "The last name field is required.(PHP VALIDATION ERROR)";
        }else{
            $author["last_name"] = sanitize_input($data["last_name"]);
            if(!validate_name($author["last_name"])){
                $errors["last_name"] = 
                "Only letters and spaces are allowed. (PHP VALIDATION ERROR)";
            }
        }

        //author_link validation
        if (empty($data["author_link"])){
            $errors["author_link"] = "The url field is required.(PHP VALIDATION ERROR)";
        }else{
            $author["author_link"] = sanitize_input($data["author_link"]);
            if(!validate_url($author["author_link"])){
                $errors["author_link"] = 
                "URL should be in standard domain formats. (PHP VALIDATION ERROR)";
            }
        }
    
        return[
            $author,
            $errors
        ];
    }

    function article_validate($data){

        $errors = [];
        $data= [];



        //headline validation
        if (empty($data["headline"])){
            $errors["headline"] = "The headline field is required.(PHP VALIDATION ERROR)";
        }else{
           $data["headline"] = sanitize_input($data["headline"]);
            if(!validate_text($data["headline"])){
                $errors["headline"] = "Only letters, numbers and common punctuation is allowed. (PHP VALIDATION ERROR)";
            }
        }

        //short_headline validation
        if (empty($data["short_headline"])){
            $errors["short_headline"] =
             "The short headline field is required.(PHP VALIDATION ERROR)";
        }else{
           $data["short_headline"] = sanitize_input($data["short_headline"]);
            if(!validate_text($data["short_headline"])){
                $errors["short_headline"] = 
                "Only letters, numbers and common punctuation is allowed. (PHP VALIDATION ERROR)";
            }
        }

        //subtitle validation
        if (empty($data["subtitle"])){
            $errors["subtitle"] = "The subtitle field is required.(PHP VALIDATION ERROR)";
        }else{
           $data["subtitle"] = sanitize_input($data["subtitle"]);
            if(!validate_text($data["subtitle"])){
                $errors["subtitle"] = 
                 "Only letters, numbers and common punctuation is allowed. (PHP VALIDATION ERROR)";
            }
        }

        //article validation
        if (empty($data["article"])){
            $errors["article"] = "The article field is required.(PHP VALIDATION ERROR)";
        }else{
           $data["article"] = sanitize_input($data["article"]);
            if(!validate_text($data["article"])){
                $errors["article"] = 
                 "Only letters, numbers and common punctuation is allowed. (PHP VALIDATION ERROR)";
            }
        }

        //summary validation
        if (empty($data["summary"])){
            $errors["summary"] = "The summary field is required.(PHP VALIDATION ERROR)";
        }else{
           $data["summary"] = sanitize_input($data["summary"]);
            if(!validate_text($data["summary"])){
                $errors["summary"] = 
                 "Only letters, numbers and common punctuation is allowed. (PHP VALIDATION ERROR)";
            }
        }
    
        return[
           $data,
            $errors
        ];
    }

?>