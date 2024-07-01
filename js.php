<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">

    </head>
    <body onload="startTime()">
        <p id="demo"></p>
       <script>
            document.getElementById('demo').innerHTML = "This is my first JS code";
       </script>
        <br><br>

<button type="button" onclick="document.getElementById('MyImg').src='images/bulb_on.jpg'">Turn On</button>
<img src="images/bulb_on.jpg" alt="" style="width:300px;" id="MyImg">
<button type="button" onclick="document.getElementById('MyImg').src='images/bulb_off.jpg'">Turn Off</button>
<br><br>

<p id="Tue"></p>
<button type="button" onclick="myFnc()">Click Me</button>

<script>
    function myFnc(){
        document.getElementById('Tue').innerHTML="Set a paragraph here.";
    }
</script>
<br><br>
<?php date_default_timezone_set("Africa/Nairobi"); ?>
Static Timer: <?php print date("H:i:s"); ?>
<br>
Dynamic Time: <span id="tmr"></span>
<br><br>

<script>
    document.write(5*6);
</script>
<br><br>
<a href="" onclick="return confirm('Are you sure?');">Delete</a>
<br><br>

<script>
    // window.alert('You cannot delete this user!!!');
</script>

<br><br>

<script>
    console.log(25+85);
</script>

<br><br>
<button type="button" onclick="window.print();">Print page</button>
<br><br>
<script>
    const streetname = prompt('What is your streetname?');
    var fullname = "Alex";
    let myAge = 45; 
    document.write(fullname + " A.K.A." + streetname + " is " + myAge + " years old.");

    // alert(firstname);

</script>





        <script src="js/startTime.js"></script>
    </body>
</html>