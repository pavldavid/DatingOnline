<?php

class Controller
{
    private $_f3;


    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        // Display the home page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function info(){

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


            if(Validation::validName($infoFirst))
            {
                $_SESSION['fName'] = $infoFirst;
            }else
            {
                $this->_f3->set('errors[fname]', 'Please enter a valid First Name');
            }

            if (Validation::validName($infoLast))
            {
                $_SESSION['lname'] = $infoLast;
            }else
            {
                $this->_f3->set('errors[lname]', 'Please enter a valid Last Name');
            }

            if (Validation::validAge($infoAge))
            {
                $_SESSION['age'] = $infoAge;
            } else {
                $this->_f3->set('errors["age"]', "Please enter a valid age");
            }

            if (Validation::validPhone($infoNum)) {
                $_SESSION['phoneNum'] = $infoNum;
            } else {
                $this->_f3->set('errors["number"]', "Please enter a valid phone number");
            }
            $this->_f3->set('infoFirst', $infoFirst);
            $this->_f3->set('infoLast', $infoLast);
            $this->_f3->set('infoAge', $infoAge);
            $this->_f3->set('infoNum', $infoNum);
            $this->_f3->set('infoGen', $infoGen);
            if (empty($this->_f3->get('errors'))) {
                header('location: profile');
            }
        }

        //we display the information page
        $view = new Template();
        echo $view->render('views/info.html');
    }

    function profile(){
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

            if (Validation::validEmail($profileEmail)){
                $_SESSION['email'] = $profileEmail;
            }else {
                $this->_f3->set('errors["email"]', "Please enter a valid email address");
            }

            $_SESSION['seeking'] = $profileSeeking;
            $_SESSION['state'] = $profileState;
            $_SESSION['bio'] = $profileBio;

            $this->_f3->set('profileEmail', $profileEmail);
            $this->_f3->set('profileState', $profileState);
            $this->_f3->set('profileSeeking', $profileSeeking);
            $this->_f3->set('profileBio', $profileBio);


            if (empty($this->_f3->get('errors'))) {
                header('location: interest');
            }
        }
        $this->_f3->set('states', DatingDatalayer::getStates());
        //we display the profile.html page
        $view = new Template();
        echo $view->render('views/profile.html');
    }

    function interest(){
        $interestIndoor = array();
        $interestOutdoor = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $interestIndoor = $_POST['in_door'];
            $interestOutdoor = $_POST['out_door'];

            var_dump($_POST);
            if(Validation::validIndoor($interestIndoor)){
                $_SESSION['indoor'] = implode(" ", $interestIndoor);
            }else {
                $this->_f3->set('errors["indoor"]', 'Please enter a valid interest');
            }
            if (Validation::validOutdoor($interestOutdoor)) {
                $_SESSION['outdoor'] = implode(", ", $interestOutdoor);
            } else {
                $this->_f3->set('errors["outdoor"]', 'Please enter a valid interest');
            }
            if (empty($this->_f3->get('errors'))) {
                header('location: sumary');
            }

        }
        $this->_f3->set('indoor', DatingDatalayer::getIndoor());
        $this->_f3->set('outdoor', DatingDatalayer::getOutdoor());

        $this->_f3->set('interestIndoor', $interestIndoor);
        $this->_f3->set('interestOutdoor', $interestOutdoor);

        //we display the interests page
        $view = new Template();
        echo $view->render('views/interest.html');
    }

    function summary(){
        $view = new Template();
        echo $view->render('views/summary.html');
    }

}