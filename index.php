<?php

/*
 * Zachary Lindgren
 * 4/14/19
 * index.php
 * This page is the controller for the Dating project
 */

// starting the session
session_start();

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file & model
require_once('vendor/autoload.php');
require_once('model/validation.php');

//Create an instance of the Base class
$f3 = Base::instance();

// Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

// Setting arrays
$f3->set('genders', array('Male', 'Female'));
$f3->set('regions', array('Kanto', 'Johto', 'Hoenn', 'Sinnoh', 'Unova', 'Kalos', 'Alola'));

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

        $f3->set('name', $name);
        $f3->set('species', $species);
        $f3->set('age', $age);
        $f3->set('gender', $gender);
        $f3->set('number', $number);

        if(validForm1())
        {
            $_SESSION['name'] = $name;
            $_SESSION['species'] = $species;
            $_SESSION['age'] = $age;
            $_SESSION['gender'] = $gender;
            $_SESSION['number'] = $number;

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
$f3 ->route('GET|POST /signup3', function() {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['region'] = $_POST['region'];
    $_SESSION['seeking'] = $_POST['seeking'];
    $_SESSION['bio'] = $_POST['bio'];

    $view = new Template();
    echo $view ->render('views/form3.html');
});

//Define the route to the summary
$f3 ->route('POST /summary', function() {
    $indoor = array();
    $indoor[] = $_POST['tv'];
    $indoor[] = $_POST['movies'];
    $indoor[] = $_POST['cooking'];
    $indoor[] = $_POST['cards'];
    $indoor[] = $_POST['puzzles'];
    $indoor[] = $_POST['reading'];
    $indoor[] = $_POST['contests'];
    $indoor[] = $_POST['videogames'];
    $_SESSION['indoor'] = $indoor;

    $outdoor = array();
    $outdoor[] = $_POST['hiking'];
    $outdoor[] = $_POST['running'];
    $outdoor[] = $_POST['swimming'];
    $outdoor[] = $_POST['battling'];
    $outdoor[] = $_POST['training'];
    $outdoor[] = $_POST['climbing'];
    $_SESSION['outdoor'] = $indoor;

    $view = new Template();
    echo $view ->render('views/summary.html');
});

//Run fat free
$f3 ->run();