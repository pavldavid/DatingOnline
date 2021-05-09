<?php
//this is my controller for the dating project

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//start a session
session_start();

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

//redirect to the personal info page
$f3->route('GET|POST /info', function () {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['fName'] = $_POST['fName'];
        $_SESSION['lName'] = $_POST['lName'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['phoneNum'] = $_POST['phoneNum'];
        header('location: profile');
    }

    //we display the information page
    $view = new Template();
    echo $view->render('views/personalInfo.html');
});

//next redirect to the profile.html page
$f3->route('GET|POST /profile', function () {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //var_dump($_POST);
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['seeking'] = $_POST['seeking'];
        $_SESSION['bio'] = $_POST['bio'];

        header('location: interest');
    }

    //we display the profile.html page
    $view = new Template();
    echo $view->render('views/profile.html');
});

$f3->route('GET|POST /interest', function () {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //var_dump($_POST);
        $_SESSION['in_door'] = implode(" ", $_POST['in_door']);
        $_SESSION['out_door'] = implode(" ", $_POST['out_door']);

        header('location: summary');
    }
    //we display the interests page
    $view = new Template();
    echo $view->render('views/interest.html');
});

$f3->route('GET /summary', function () {
    //show the summary page
    $view = new Template();
    echo $view->render('views/summary.html');
});
//Run Fat-Free
$f3->run();