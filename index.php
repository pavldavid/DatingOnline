<?php
//this is my controller for the dating project

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');
require_once ('model/data-layer.php');
require_once ('model/validation.php');

//start a session
session_start();

//Instantiate Fat-Free and controller
$f3 = Base::instance();

//default route
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});

//redirect to the personal info page

  $f3->route('GET|POST /info', function ($f3) {

      $_SESSION = array();
      $userInfo = array();

      $infoFirst = "";
      $infoLast = "";
      $infoAge = "";
      $infoNum = "";
      $infoGen = "";


      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $infoFirst = $_POST['fname'];
        $infoLast = $_POST['lname'];
        $infoAge = $_POST['age'];
        $infoGen = $_POST['gender'];
        $infoNum = $_POST['phoneNum'];


        if(validName($infoFirst))
        {
            $_SESSION['fName'] = $infoFirst;
        }else
        {
            $f3->set('errors[fname]', 'Please enter a valid First Name');
        }

        if (validName($infoLast))
        {
            $_SESSION['lname'] = $infoLast;
        }else
        {
            $f3->set('errors[lname]', 'Please enter a valid Last Name');
        }

        if (validAge($infoAge))
        {
            $_SESSION['age'] = $infoAge;
        } else {
            $f3->set('errors["age"]', "Please enter a valid age");
        }

          if (validPhone($infoNum)) {
              $_SESSION['phoneNum'] = $infoNum;
          } else {
              $f3->set('errors["number"]', "Please enter a valid phone number");
          }
          $f3->set('infoFirst', $infoFirst);
          $f3->set('infoLast', $infoLast);
          $f3->set('infoAge', $infoAge);
          $f3->set('infoNum', $infoNum);
          $f3->set('infoGen', $infoGen);
          if (empty($f3->get('errors'))) {
              header('location: profile');
          }
    }

    //we display the information page
    $view = new Template();
    echo $view->render('views/info.html');
});

//next redirect to the profile.html page
$f3->route('GET|POST /profile', function ($f3) {
    $profileEmail = "";
    $profileState = "";
    $profileSeeking = "";
    $profileBio = "";


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //var_dump($_POST);
        $profileEmail = $_POST['email'];
        $profileState = $_POST['state'];
        $profileSeeking = $_POST['seeking'];
        $profileBio = $_POST['bio'];

        if (validEmail($profileEmail)){
            $_SESSION['email'] = $profileEmail;
        }else {
            $f3->set('errors["email"]', "Please enter a valid email address");
        }

        $_SESSION['seeking'] = $profileSeeking;
        $_SESSION['state'] = $profileState;
        $_SESSION['bio'] = $profileBio;

        $f3->set('profileEmail', $profileEmail);
        $f3->set('profileState', $profileState);
        $f3->set('profileSeeking', $profileSeeking);
        $f3->set('profileBio', $profileBio);


        if (empty($f3->get('errors'))) {
            header('location: interest');
        }
    }
    $f3->set('states', getStates());
    //we display the profile.html page
    $view = new Template();
    echo $view->render('views/profile.html');
});

$f3->route('GET|POST /interest', function ($f3) {
    $interestIndoor = array();
    $interestOutdoor = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $interestIndoor = $_POST['in_door'];
        $interestOutdoor = $_POST['out_door'];

        var_dump($_POST);
        if(validIndoor($interestIndoor)){
            $_SESSION['indoor'] = implode(" ", $interestIndoor);
        }else {
            $f3->set('errors["indoor"]', 'Please enter a valid interest');
        }
        if (validOutdoor($interestOutdoor)) {
            $_SESSION['outdoor'] = implode(", ", $interestOutdoor);
        } else {
            $f3->set('errors["outdoor"]', 'Please enter a valid interest');
        }
        if (empty($f3->get('errors'))) {
            header('location: sumary');
        }

    }
    $f3->set('indoor', getIndoor());
    $f3->set('outdoor', getOutdoor());

    $f3->set('interestIndoor', $interestIndoor);
    $f3->set('interestOutdoor', $interestOutdoor);

    //we display the interests page
    $view = new Template();
    echo $view->render('views/interest.html');
});

$f3->route('GET /sumary', function () {
    //show the summary page
    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run Fat-Free
$f3->run();