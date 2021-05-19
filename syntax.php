<?php

// ********** VARIABLES **********
    $x = 7;
    $y = 3.1416;
    $firstName = "Mike";
    $lastName = "Johnson";
    $heading = "<h1>This is a heading</h1>";

    echo $x;
    // Need to use HTML <br> for newlines since php outputs as html which doesn't recognise '\n'
    echo "<br>";
    echo $y;
    echo "<br>";
    echo $x + $y;
    echo "<br>";
    // '.' is the concatenaiton operator
    echo $x . $y . "<br>";
    echo $firstName . " " .$lastName . "<br>";
    echo $heading . "<br>";
    
    // Constants
    define("MY_CONSTANT", 1000);
    // Constants don't need '$' sign
    echo MY_CONSTANT . "<br>";


// ********** ARRAYS **********

    // Old way
    $myArray = array(1, 3.5, "Seoul", 25);
    // New way
    $anotherArray = [7, "Just a string", 15];
    // Print any variable info in human readable way
    print_r($myArray);
    echo "<br>";
    print_r($anotherArray);
    echo "<br>";
    // Accessing elements
    echo $myArray[2] . "<br>";
    // Associative arrays (Like dictionaries)
    $names = ["firstName"=>"Mike", "lastName"=>"Johnson"];
    echo $names["firstName"] . " " . $names["lastName"] . "<br>";


// ********** CONTROL FLOW **********

    $someNumber = 10;
    if($someNumber > 10){
        echo "The number is greater than ten <br>";
    } else if ($someNumber < 10){
        echo "The number is less than ten <br>";
    } else {
        echo "The number is ten <br>";
    }

    // Equal operator
    if(5 == "5"){
        echo '5 and "5" are equal <br>';
    }else{
        echo '5 and "5" are not equal <br>';
    }

    // Identical operator
    if(5 === "5"){
        echo '5 and "5" are identical <br>';
    }else{
        echo '5 and "5" not identical <br>';
    }

    // Switch statement
    switch($someNumber){
        case 10:
            echo "The number is ten <br>";
            break;
        default:
            echo "The number is something else <br>";
    }


// ********** LOOPS **********

    for($i = 0; $i < 5; $i++){
        echo "i is: $i <br>";
    }

    // Unlike most C-like languages, the variable 'i' remains in the scope
    echo $i . "<br>";

    // while loop syntax is C-like as well

    // foreach loop. Note that array comes first here unlike most C-like languages
    foreach($myArray as $element){
        echo $element . "<br>";
    }


// ********** FUNCTIONS **********

    function foo($a, $b=10){
        return $a + $b;
    }

    echo foo(10, 20) . "<br>";

    $x = 10;
    function anotherFunction(){
        // We need to let php aware that somewhere ouside this funciton, there is a global variable named 'x'
        global $x;
        // Local variables won't be accessible outside
        $y = 5;
        echo ($x + $y) . "<br>";
    }

    anotherFunction();

    // Some built-in functions
    echo pow(2, 2) . "<br>";
    echo rand(1, 1000) . "<br>";

    echo strlen("This is a string") . "<br>";

    $anArray = [5, 1, 24, 1, 68, 12, 5];
    echo max($anArray) . "<br>";
    echo min($anArray) . "<br>";
    sort($anArray);
    print_r($anArray);
    echo "<br>";

    if(in_array(24, $anArray)){
        echo "24 is in that array <br>";
    }
?>