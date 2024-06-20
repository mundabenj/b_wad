<?php 
    require_once("includes/db_connect.php");
    include_once ("templates/heading.php");
    include_once ("templates/nav.php");

$messageId = $_GET["messageId"];

$spot_message = "SELECT * FROM messages WHERE messageId = '$messageId' LIMIT 1";
$spot_mes_res = $conn->query($spot_message);

$spot_mes_row = $spot_mes_res->fetch_assoc();

if(isset($_POST["update_message"])){
    $fullname = mysqli_real_escape_string($conn, addslashes($_POST["fullname"]));
    $email_address = mysqli_real_escape_string($conn, addslashes($_POST["email_address"]));
    $subject_line = mysqli_real_escape_string($conn, addslashes($_POST["subject_line"]));
    $message = mysqli_real_escape_string($conn, ($_POST["message"]));
    $UmessageId = mysqli_real_escape_string($conn, addslashes($_POST["messageId"]));

    $update_message = "UPDATE messages SET sender_name='$fullname', sender_email='$email_address', subject_line='$subject_line', message='$message' WHERE messageId='$UmessageId' LIMIT 1";

    if ($conn->query($update_message) === TRUE) {
    header("Location: view_messages.php");
    } else {
      echo "Error updating record: " . $conn->error;
    }
}
    
?>
<div class="banner">
    <h1>Talk to Us</h1>
</div>
<div class="row">
    <div class="content">
    <h1>Edit Forms</h1>
    <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off" class="contact_us">
        <label for="fullname">Fullname:</label><br>
        <input type="text" name="fullname" placeholder="Fullname" id="fullname" required value="<?php print $spot_mes_row["sender_name"];?>"><br><br>
        <label for="email">Email Address:</label><br>
        <input type="email" name="email_address" id="email" placeholder="Email Address" required value="<?php print $spot_mes_row["sender_email"];?>" ><br><br>
        <label for="email">Subject:</label><br>
           <select name="subject_line" id="" required >
            <option value="<?php print $spot_mes_row["subject_line"];?>"><?php print $spot_mes_row["subject_line"];?></option>
            <option value="Email Support">Email Support</option>
            <option value="E-learning Support">E-learning Support</option>
            <option value="HTML Support">HTML Support</option>
        </select>
        <br><br>
        <label for="message" class="form-label">Message:</label><br>
        <textarea name="message" id="message" rows="7" required ><?php print $spot_mes_row["message"];?></textarea>
        <br><br>
           <input type="submit" name="update_message" value="Update Message">
           <input type="hidden" name="messageId" value="<?php print $spot_mes_row["messageId"];?>">
    </form>
</div>
<?php include_once("templates/side_bar.php"); ?>
</div>
<?php include_once("templates/footer.php"); ?>