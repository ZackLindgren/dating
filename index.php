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

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

// Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3 ->route('GET /', function() {
    $view = new Template();
    echo $view ->render('views/home.html');
});

//Define the route to the start of the form
$f3 ->route('POST /signup', function() {
    $view = new Template();
    echo $view ->render('views/form1.html');
});

//Define the route to the second part of the form
$f3 ->route('POST /signup2', function() {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['species'] = $_POST['species'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['number'] = $_POST['number'];

    $view = new Template();
    echo $view ->render('views/form2.html');
});

//Define the route to the third part of the form
$f3 ->route('POST /signup3', function() {
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