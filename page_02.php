<?php
session_start();
if(isset($_SESSION["fname"])){
print 'Hey ' . $_SESSION["fname"];
?>
<br>
<a href="page_03.php">Go to page 3</a>

<?php
}else{
    header("Location: page_03.php");
}