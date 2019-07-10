<?php

ini_set("display_errors",1);

    $app = require __DIR__ . '../bootstrap/app.php';

    $kidsexpressr = Kidsexpress::where("type",'daily')->where("status",1)->get();

    foreach ($kidsexpressr as $kids){

        echo $kids->id."<br /";
    }

?>