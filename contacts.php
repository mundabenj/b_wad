<?php 
    require_once("includes/db_connect.php");
    include_once ("templates/heading.php");
    include_once ("templates/nav.php");

    if(isset($_POST["send_message"])){
        $fullname = mysqli_real_escape_string($conn, addslashes($_POST["fullname"]));
        $email_address = mysqli_real_escape_string($conn, addslashes($_POST["email_address"]));
        $subject_line = mysqli_real_escape_string($conn, addslashes($_POST["subject_line"]));
        $message = mysqli_real_escape_string($conn, addslashes($_POST["message"]));

        $insert_message = "INSERT INTO messages (sender_name, sender_email, subject_line, message) VALUES ('$fullname', '$email_address', '$subject_line', '$message')";

        if ($conn->query($insert_message) === TRUE) {
            header("Location: contacts.php");
            exit();
        } else {
            echo "Error: " . $insert_message . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>
<div class="banner">
    <h1>Talk to Us</h1>
</div>
<div class="row">
    <div class="content">
    <h1>Forms</h1>
    <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off" class="contact_us">
        <label for="fullname">Fullname:</label><br>
        <input type="text" name="fullname" placeholder="Fullname" id="fullname" required ><br><br>
        <label for="email">Email Address:</label><br>
        <input type="email" name="email_address" id="email" placeholder="Email Address" required ><br><br>
        <label for="email">Subject:</label><br>
           <select name="subject_line" id="" required >
            <option value="">--Select Subject--</option>
            <option value="Email Support">Email Support</option>
            <option value="E-learning Support">E-learning Support</option>
            <option value="HTML Support">HTML Support</option>
        </select>
        <br><br>
        <label for="message" class="form-label">Message:</label><br>
        <textarea name="message" id="message" rows="7" required ></textarea>
        <br><br>
           <input type="submit" name="send_message" value="Send Message">
    </form>
</div>
<?php include_once("templates/side_bar.php"); ?>
</div>
<?php include_once("templates/footer.php"); ?>