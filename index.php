<?php

/*
 * Zachary Lindgren
 * 4/14/19
 * index.php
 * This page is the controller for the Dating project
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file & model
require_once('vendor/autoload.php');
require_once('model/validation.php');

// starting the session
session_start();

//Create an instance of the Base class
$f3 = Base::instance();

// Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

// Setting arrays
$f3->set('genders', array('Male', 'Female'));
$f3->set('regions', array('Kanto', 'Johto', 'Hoenn', 'Sinnoh', 'Unova', 'Kalos', 'Alola'));
$f3->set('indoorRow1', array('TV', 'Movies', 'Cooking', 'Card games'));
$f3->set('indoorRow2', array('Puzzles', 'Reading', 'Contests', 'Video games'));
$f3->set('outdoorRow1', array('Hiking', 'Running', 'Swimming', 'Battling'));
$f3->set('outdoorRow2', array('Training', 'Climbing'));

//Define a default route
$f3 ->route('GET /', function() {
    $view = new Template();
    echo $view ->render('views/home.html');
});

//Define the route to the start of the form
$f3 ->route('POST /signup', function($f3) {

    if(!empty($_POST))
    {
        $name = $_POST['name'];
        $species = $_POST['species'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $number = $_POST['number'];
        $isPremium = !empty($_POST['premium']);

        $f3->set('name', $name);
        $f3->set('species', $species);
        $f3->set('age', $age);
        $f3->set('gender', $gender);
        $f3->set('number', $number);
        $f3->set('isPremium', $isPremium);

        if(validForm1())
        {
            $_SESSION['isPremium'] = $isPremium;

            if ($isPremium)
            {
                $_SESSION['newMember'] = new PremiumMember($name, $species, $age, $gender, $number);
            }
            else
            {
                $_SESSION['newMember'] = new Member($name, $species, $age, $gender, $number);
            }

            $f3->reroute('signup2');
        }
    }

    $view = new Template();
    echo $view ->render('views/form1.html');
});

//Define the route to the second part of the form
$f3 ->route('GET|POST /signup2', function($f3) {

    if(!empty($_POST))
    {
        $email = $_POST['email'];
        $region = $_POST['region'];
        $seeking = $_POST['seeking'];
        $bio = $_POST['bio'];

        $f3->set('email', $email);
        $f3->set('region', $region);
        $f3->set('seeking', $seeking);
        $f3->set('bio', $bio);

        if(validForm2())
        {
            $_SESSION['email'] = $email;
            $_SESSION['region'] = $region;
            $_SESSION['seeking'] = $seeking;
            $_SESSION['bio'] = $bio;

            $f3->reroute('signup3');
        }
    }

    $view = new Template();
    echo $view ->render('views/form2.html');
});

//Define the route to the third part of the form
$f3 ->route('GET|POST /signup3', function($f3) {

    if(!empty($_POST))
    {
        $indoor = $_POST['indoor'];
        $outdoor = $_POST['outdoor'];

        $f3->set('indoor', $indoor);
        $f3->set('outdoor', $outdoor);

        if(validForm3())
        {
            $_SESSION['indoor'] = $indoor;
            $_SESSION['outdoor'] = $outdoor;

            $f3->reroute('summary');
        }
    }

    $view = new Template();
    echo $view ->render('views/form3.html');
});

//Define the route to the summary
$f3 ->route('GET|POST /summary', function() {

    $view = new Template();
    echo $view ->render('views/summary.html');
});

//Run fat free
$f3 ->run();