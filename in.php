<?php
    date_default_timezone_set("Africa/Nairobi");

    echo 'This is my first php code'; //Displaying a string

    print '<br>'; //Using the HTML break line tag

    print "Today is <span style = 'color: #FF0040;'>Tuesday</span>"; //Using css in a sentence

    print '<br>'; //Using the HTML break line tag

    print 45611; //This is an integer

    print '<br>'; //Using the HTML break line tag

    print "45644"; //This is a string

    print '<br>'; //Using the HTML break line tag

    print 4 + 8; //This is an operation using integers

    print '<br>'; //Using the HTML break line tag

    print "8 + 6"; // This is a string

    print '<br>'; //Using the HTML break line tag

    print date('l');

    print '<br>'; //Using the HTML break line tag

    print "Today is " . date('l, jS F Y H:i:s');

    print '<br>'; //Using the HTML break line tag

    print date('l, jS-F-Y', strtotime('+3 days'));

    print '<br>'; //Using the HTML break line tag

    print date('H:i:s');

    print '<br>'; //Using the HTML break line tag

    // Create (Declare) a PHP variable

    $fname = "Alex Okama";//declaration of a string
    print $fname;

    print '<br>'; //Using the HTML break line tag

    $yob = 2007; //declaration of an integer (or a digit)
    print  $fname . " was born in " . $yob;

    print '<br>'; //Using the HTML break line tag

    $current_year = date('Y'); // Declaring the current year
    print $current_year;

    print '<br>'; //Using the HTML break line tag

    //Using the subtruction operator to find the user's age
    $age = $current_year - $yob;
    // print $fname . " is " . $age . " years old";

    print '<br>'; //Using the HTML break line tag

    $user_dob = "$yob-01-03";
    print  $fname . " was, actually, born on " . date('l, F jS Y', strtotime($user_dob));

    $birthday = new DateTime($user_dob);
    $today = new DateTime('today');

    $interval = $birthday->diff($today);

    print '<br>'; //Using the HTML break line tag

    // print '<pre>';
    // print_r($interval);
    // print '</pre>';

    print $fname . " is " . $interval->y . " years, " . $interval->m . " months, and " . $interval->d . " days old.";

    print '<br>'; //Using the HTML break line tag

    //The if... else ... statement
    $adult_age = 18;

    if($interval->y >= $adult_age){
        print $fname . " is an adult"; //{} event in block will be excecuted if the condition is true
    }else{
        print $fname . " is NOT an adult"; //{} event in block will be excecuted if the condition is false
    }

    print '<br><br>'; //Using the HTML break line tag

    //Variable characteristics

    $lname = "Okama";

    echo "My last name is $lname";
    
    print '<br>'; //Using the HTML break line tag
    
    echo 'My last name is $lname';

    print '<br>'; //Using the HTML break line tag

    print $lname;

    print '<br>'; //Using the HTML break line tag

    $call["lname"] = "Okama";
    print $call["lname"];

    print '<br>'; //Using the HTML break line tag

    define('LNAME', 'Okama');
    print LNAME;

?>