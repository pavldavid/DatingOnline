<?php
//this is my controller for the dating project

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');

//start a session
session_start();

//Instantiate Fat-Free and controller
$f3 = Base::instance();
$con = new Controller($f3);

//Define a default route
$f3->route('GET /', function () {
    $GLOBALS['con']->home();
});

$f3->route('GET|POST /personal', function () {
    $GLOBALS['controller']->personal();
});

$f3->route('GET|POST /profile', function () {
    $GLOBALS['controller']->profile();
});

$f3->route('GET|POST /interest', function () {
    $GLOBALS['controller']->interest();
});

$f3->route('GET /summary', function () {
    $GLOBALS['controller']->summary();
});


//redirect to the personal info page
/**
 * $f3->route('GET|POST /personalInfo', function () {

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

        header('location: sumary');
    }
    //we display the interests page
    $view = new Template();
    echo $view->render('views/interest.html');
});

$f3->route('GET /sumary', function () {
    //show the summary page
    $view = new Template();
    echo $view->render('views/sumary.html');
});*/

//Run Fat-Free
$f3->run();