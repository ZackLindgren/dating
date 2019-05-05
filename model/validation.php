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
        $f3->set("errors['number']", 'Please enter your PokeNav number');
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
    // gets rid of all special characters in the number string
    // code found on stackoverflow:
    // https://stackoverflow.com/questions/14114411/remove-all-special-characters-from-a-string
    $number = str_replace(' ', '-', $number);
    $number = str_replace('/[^A-Za-z0-9\-]/', '', $number);

    // number must be numeric, and must be 10 digits long (ignoring international numbers)
    return ctype_digit($number) && strlen($number) == 10;
}