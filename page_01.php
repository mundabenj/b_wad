<form action="" method="post">
    <input type="text" name="fname" id=""><br>
    <input type="submit" name="create_session" value="Create">
</form>

<?php
session_start();

if(isset($_POST["create_session"])){
    $_SESSION["fname"] = $_POST["fname"];

    print $_SESSION["fname"];
    print '<br><a href="page_02.php">Go to page 2</a>';
}