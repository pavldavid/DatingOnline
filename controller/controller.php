<?php

class Controller
{
    private $_f3; //router

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        //Display the home page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function personal()
    {
        $_SESSION = array();
        $_SESSION['profile'] = new Profile();

        $userFirstName = "";
        $userLastName = "";
        $userAge = "";
        $userPhoneNum = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //var_dump($_POST);
            $_SESSION['fName'] = $_POST['fName'];
            $_SESSION['lName'] = $_POST['lName'];
            $_SESSION['age'] = $_POST['age'];
            $_SESSION['gender'] = $_POST['gender'];
            $_SESSION['phoneNum'] = $_POST['phoneNum'];
        }

        if(Validation::validName($userFirstName) && Validation::validName($userLastName)) {
            $_SESSION['profile']->setName($userFirstName,$userLastName);
        }
        else{
            ////////FIX///////////
            $this->_f3->set('errors["name"]', 'Please enter a valid Name');
        }

        if(Validation::validAge($userAge)) {
            $_SESSION['profile']->setAge($userAge);
        }
        else{
            ////////FIX///////////
            $this->_f3->set('errors["age"]', 'Please enter a correct age');
        }

        if(Validation::validPhone($userPhoneNum)) {
            $_SESSION['profile']->setPhone($userPhoneNum);
        }
        else{
            ////////FIX///////////
            $this->_f3->set('errors["phone"]', 'Please enter a correct US phone number');
        }
        if(empty($this->_f3->get('errors'))){
            header('location: profile');
        }

        $this->_f3->set('userfName', $userFirstName);
        $this->_f3->set('userlName', $userLastName);
        $this->_f3->set('userAge', $userAge);
        $this->_f3->set('userGender', $_SESSION['gender']);
        $this->_f3->set('user_pNum', $userPhoneNum);

        $view = new Template();
        echo $view->render('views/personalInfo.html');
    }

    function profile(){
        $_SESSION = array();

        $_SESSION['profile'] = new Profile();

        $userEmail = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //var_dump($_POST);
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['state'] = $_POST['state'];
            $_SESSION['seeking'] = $_POST['seeking'];
            $_SESSION['bio'] = $_POST['bio'];
        }

        if(Validation::validEmail($userEmail)) {
            $_SESSION['profile']->setEmail($userEmail);
        }

        else {
            // FIX THIS LATER
            $this->_f3->set('errors["email"]', 'Please enter a valid email');
        }

        if (empty($this->_f3->get('errors'))) {
            header('location: interest');
        }

        $this->_f3->set('userEmail', $userEmail);
        $this->_f3->set('userState', $_SESSION['state']);
        $this->_f3->set('userSeeking', $_SESSION['seeking']);
        $this->_f3->set('userBio', $_SESSION['bio']);

        $view = new Template();
        echo $view->render('views/profile.html');
    }

    function interest()
    {
        $userOutdoor = array();
        $userIndoor = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_POST['interest'])) {

                if (Validation::validOutdoor($userOutdoor)) {
                    $_SESSION['out_door']->setOutDoor(implode(", ", $userOutdoor));
                }
                else {
                    $this->_f3->set('errors["activity"]', 'Invalid selection');
                }

                if (Validation::validOutdoor($userIndoor)) {
                    $_SESSION['in_door']->setInDoor(implode(", ", $userIndoor));
                }
                else {
                    $this->_f3->set('errors["activity"]', 'Invalid selection');
                }
                if (empty($this->_f3->get('errors'))) {
                    header('location: sumary');
                }
            }
        }

        $this->_f3->set('outdoor', DataLayer::getOutdoor());
        $this->_f3->set('indoor', DataLayer::getIndoor());

        $this->_f3->set('userOutdoorIntrest', $userOutdoor);
        $this->_f3->set('userIndoorIntrest', $userIndoor);

        // Display the Interest page
        $view = new Template();
        echo $view->render('views/interest.html');
    }

    function sumary(){
        $view = new Template();
        echo $view->render('views/sumary.html');

        unset($_SESSION['profile']);
    }
}