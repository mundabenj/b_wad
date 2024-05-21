<h1>Loops</h1>

<h4>while Loop</h4>
<?php
    // while loop
    $min = 0;
    while($min < 10){
        print $min . "<br>";
        $min++;
    }
?>
<h4>do-while loop</h4>
<?php
    // do-while loop
    $x = 4;
    do{
        print $x . "<br>";
        $x++;
    }while($x < 7);
?>
<h4>for loop</h4>
<?php
    //for loop
    for($r=3; $r<12; $r++){
        print $r . "<br>";
    }
?>

<h4>for loop</h4>
<?php
    //for loop
    for($n=14; $n<24; $n+=2){
        print $n . "<br>";
    }
?>

<h4>foreach</h4>
<select name="" id="">
<?php
    //foreach
$months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

foreach($months AS $month){
    ?>
    <option value=""><?php print $month; ?></option>
    <?php 
}
?>
</select> 
<select name="" id="">
<?php
    // while loop
    $y = 2014;
    while($y < 2030){
        $y++;
?>
<option value=""><?php print $y; ?></option>
<?php
    }
?>
</select>

<br>
<br>
<br>
<br>