<?php

    $myfile;
    $course = array(
        "title" => "Javascript Kursu",
        "description" => "ileri Seviye Javascript Dersleri",
        "image" => "2.jpg"
    );

    echo $course['title'];
    
    $jsonString = json_encode($course, JSON_PRETTY_PRINT);


    $myfile = fopen("course2.json","w");
    fwrite($myfile,$jsonString);
    
    fclose($myfile);
    
    $myfile = fopen("course2.json","r");
    $fileSize = filesize("course2.json");
    
    echo fread($myfile,$fileSize);
    
    fclose($myfile);

?>