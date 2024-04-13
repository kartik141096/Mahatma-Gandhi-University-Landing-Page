<?php


function sanitize($var){

    $var = preg_replace_callback("/&#([0-9]+);/u", 
        function($m){
            return iconv('cp1250', 'utf-8', chr($m[1]));
        }, 
        html_entity_decode($var)
    );

    return htmlspecialchars(strip_tags(trim($var)), ENT_QUOTES, 'utf-8');
    
    if (!get_magic_quotes_gpc()) {
        return addslashes(htmlentities(strip_tags(trim($var)),ENT_QUOTES,'UTF-8'));
    } 
    else {
        return htmlentities(strip_tags(trim($var)),ENT_QUOTES,'UTF-8');
    }
}



?>