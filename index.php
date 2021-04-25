<!--
Author: David Pavlenko
Date: 4/24/21
This is the controller for the fat free of the dating project
-->

<?php
//this is my controller for the dating project

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define default route
$f3->route('GET /', function(){
    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

//Run Fat-Free
$f3->run();