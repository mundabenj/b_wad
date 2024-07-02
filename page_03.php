<?php
session_start();

if(isset($_SESSION["fname"])){
    print 'Yes, Session is alive<br>';
    print '<a href="page_04.php">Destroy Session</a>';
}else{
    print 'No, Session was destroyed<br>';
    print '<a href="page_01.php">Create new Session</a>';
}