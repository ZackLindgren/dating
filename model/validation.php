<?php

/*
 * Zachary Lindgren
 * 5/5/19
 * validation.php
 * The file in the dating website that hold all the validation functions
 */

// returns true if all the data in form 1 is valid
function validForm1()
{
    global $f3;
    $isValid = true;

    // checking the name
    if (!validName($f3->get('name')))
    {
        $isValid = false;
        $f3->set("errors['name']", 'Please enter your name (Cannot include numbers or special characters)');
    }

    // checking the age
    if (!validAge($f3->get('age')))
    {
        $isValid = false;
        $f3->set("errors['age']", 'Please enter your age (Cannot include letters or special characters)');
    }

    // checking the number
    if (!validPhone($f3->get('number')))
    {
        $isValid = false;
        $f3->set("errors['number']", 'Please enter your PokeNav number (Ten numbers, no spaces/special characters)');
    }

    return $isValid;
}

// returns true if all the data in form 2 is valid
function validForm2()
{
    global $f3;
    $isValid = true;

    // checking the email
    if (!validEmail($f3->get('email')))
    {
        $isValid = false;
        $f3->set("errors['email']", 'Please enter a valid email address');
    }

    return $isValid;
}

// returns true if all the data in form 3 is valid
function validForm3()
{
    global $f3;
    $isValid = true;

    // checking the indoor activities
    if (!validIndoor($f3->get('indoor')))
    {
        $isValid = false;
        $f3->set("errors['indoor']", 'Please select valid indoor activities');
    }

    // checking the outdoor activities
    if (!validOutdoor($f3->get('outdoor')))
    {
        $isValid = false;
        $f3->set("errors['outdoor']", 'Please select valid outdoor activities');
    }

    return $isValid;
}

// returns true if the name is all alphabetic
function validName($name)
{
    return ctype_alpha($name);
}

// returns true if the age is all numeric and between 18 and 118
function validAge($age)
{
    return ctype_digit($age) && ($age >= 18 && $age <= 118);
}

// returns true if the number is 'valid'
function validPhone($number)
{
    // number must be numeric, and must be 10 digits long (ignoring international numbers)
    return ctype_digit($number) && strlen($number) == 10;
}

// returns true if the email is valid
function validEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// returns true if the array of indoor activities are valid
function validIndoor($indoor)
{
    global $f3;

    foreach ($indoor as $activity)
    {
        if (!in_array($activity, $f3->get('indoorRow1')) && !in_array($activity, $f3->get('indoorRow2')))
        {
            return false;
        }
    }

    return true;
}

// returns true if the array of outdoor activities are valid
function validOutdoor($outdoor)
{
    global $f3;

    foreach ($outdoor as $activity)
    {
        if (!in_array($activity, $f3->get('outdoorRow1')) && !in_array($activity, $f3->get('outdoorRow2')))
        {
            return false;
        }
    }

    return true;
}