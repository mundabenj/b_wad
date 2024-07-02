<?php 
    require_once("includes/db_connect.php");
    include_once ("templates/heading.php");
    include_once ("templates/nav.php");

    if(isset($_POST["signup"])){
        $fullname = mysqli_real_escape_string($conn, addslashes($_POST["fullname"]));
        $email_address = mysqli_real_escape_string($conn, addslashes($_POST["email_address"]));
        $username = mysqli_real_escape_string($conn, addslashes($_POST["username"]));
        $passphrase = mysqli_real_escape_string($conn, addslashes($_POST["passphrase"]));
        $genderId = mysqli_real_escape_string($conn, addslashes($_POST["genderId"]));
        $roleId = mysqli_real_escape_string($conn, addslashes($_POST["roleId"]));
        $passphrase = mysqli_real_escape_string($conn, addslashes($_POST["passphrase"]));

        // verify that the fullname contains only letters, space and single quotation

        // verify that the email has the correct format

if(!filter_var($email_address, FILTER_VALIDATE_EMAIL)){
    header("Location: ?wrong_email_format");
    exit();
}

        // verify that the email address domain is authorized (Strathmore.edu, gmail.com, yahoo.com, etc)

        // verify that the new email address does not exist already in the database
        
        // verify that the new username does not exist already in the database
        
        // verify that the password is identical to the repeat password
        
        // verify that the password length is between 6 and 16 characters

        


        $insert_message = "INSERT INTO messages (sender_name, sender_email, subject_line, message) VALUES ('$fullname', '$email_address', '$subject_line', '$message')";

        if ($conn->query($insert_message) === TRUE) {
            header("Location: view_messages.php");
            exit();
        } else {
            echo "Error: " . $insert_message . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>
<div class="banner">
    <h1>Sign Up</h1>
</div>
<div class="row">
    <div class="content">
    <h1>Sign Up Form</h1>
    <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off" class="contact_us">
        <label for="fullname">Fullname:</label><br>
        <input type="text" name="fullname" placeholder="Fullname" maxlength="50" id="fullname" required autofocus ><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" name="email_address" id="email" placeholder="Email Address" maxlength="50" required ><br>
        <?php if(isset($_GET["wrong_email_format"])){print "<span class='error_form'>wrong email format</span>"; } ?>
        <br><!-- Consider using sessions-->

        <label for="username">Username: </label><br>
        <input type="text" name="username" id="username" placeholder="Username" maxlength="50" required ><br><br>

        <label for="password">Password: </label><br>
        <input type="password" name="passphrase" id="password" placeholder="Password" required ><br><br>

        <label for="gender">Gender:</label><br>
           <select name="genderId" id="gender" required>
               <option value="">--Select Gender--</option>
                <?php
                    $sel_gen = "SELECT * FROM genders ORDER BY gender ASC";
                    $sel_gen_res = $conn->query($sel_gen);
                    while($sel_gen_row = $sel_gen_res->fetch_assoc()){
                    ?>
                        <option value="<?php print $sel_gen_row["genderId"]; ?>"><?php print $sel_gen_row["gender"]; ?></option>
                    <?php
                    }
                ?>
            </select>
            <br><br>

        <label for="role">Roles:</label><br>
           <select name="roleId" id="role" required>
               <option value="">--Select Role--</option>
               <?php
                    $sel_rol = "SELECT * FROM roles ORDER BY role ASC";
                    $sel_rol_res = $conn->query($sel_rol);
                    while($sel_rol_row = $sel_rol_res->fetch_assoc()){
                    ?>
                        <option value="<?php print $sel_rol_row["roleId"]; ?>"><?php print $sel_rol_row["role"]; ?></option>
                    <?php
                    }
                    ?>
            </select>
            <br><br>

           <input type="submit" name="signup" value="Sign Up">
    </form>
</div>
<?php include_once("templates/side_bar.php"); ?>
</div>
<?php include_once("templates/footer.php"); ?>