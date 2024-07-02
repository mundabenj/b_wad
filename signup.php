<?php
    require_once("includes/db_connect.php");
    include_once ("templates/heading.php");
    include_once ("templates/nav.php");

    if(isset($_POST["signup"])){
        $_SESSION["fullname"] = $fullname = mysqli_real_escape_string($conn, ucwords(strtolower($_POST["fullname"])));
        $_SESSION["email_address"] = $email_address = mysqli_real_escape_string($conn, addslashes(strtolower($_POST["email_address"])));
        $_SESSION["username"] = $username = mysqli_real_escape_string($conn, addslashes(strtolower($_POST["username"])));
        $_SESSION["passphrase"] = mysqli_real_escape_string($conn, $_POST["passphrase"]);
        $_SESSION["confpassphrase"] = mysqli_real_escape_string($conn, $_POST["confpassphrase"]);
        $_SESSION["genderId"] = $genderId =  mysqli_real_escape_string($conn, addslashes($_POST["genderId"]));
        $_SESSION["roleId"] = $roleId =  mysqli_real_escape_string($conn, addslashes($_POST["roleId"]));

        unset($_SESSION["error"]);

        // verify that the fullname contains only letters, space and single quotation
        if(ctype_alpha(str_replace(" ", "", str_replace("\'", "", $_SESSION["fullname"]))) === FALSE){
            $_SESSION["nameLetter_err"] = "wrong name format";
            $_SESSION["error"] = "";
        }

        // verify that the email has the correct format
        if(!filter_var($_SESSION["email_address"], FILTER_VALIDATE_EMAIL)){
            $_SESSION["wrong_email_format"] = "wrong email format";
            $_SESSION["error"] = "";
        }

        // verify that the email address domain is authorized (Strathmore.edu, gmail.com, yahoo.com, etc)
        $val_dom = ["strathmore.edu", "gmail.com", "yahoo.com"];
        $em_arr = explode("@", $_SESSION["email_address"]);
        $spot_dom = end($em_arr);
        if(!in_array($spot_dom, $val_dom)){
            $_SESSION["invalid_dom"] = "Invalid Dom " . $spot_dom;
            $_SESSION["error"] = "";
        }

        // verify that the new email address does not exist already in the database
        $spot_em_ex = "SELECT email FROM users WHERE email = '".$_SESSION["email_address"]."' LIMIT 1";
        $spot_em_ex_res = $conn->query($spot_em_ex);
            if ($spot_em_ex_res->num_rows > 0) {
                $_SESSION["email_exixts"] = "email exists";
                $_SESSION["error"] = "";
            }

        // verify that the new username does not exist already in the database
        $spot_un_ex = "SELECT username FROM users WHERE username = '".$_SESSION["username"]."' LIMIT 1";
        $spot_un_ex_res = $conn->query($spot_un_ex);
            if ($spot_un_ex_res->num_rows > 0) {
                $_SESSION["username_exixts"] = "username exists";
                $_SESSION["error"] = "";
            }

        // verify that the password is identical to the repeat password
        if(strcmp($_SESSION["passphrase"], $_SESSION["confpassphrase"]) != 0){
            $_SESSION["matching_pass"] = "Passwords not matching";
            $_SESSION["error"] = "";
        }

        // verify that the password length is between 4 and 8 characters
        if(strlen($_SESSION["passphrase"]) < 4 OR strlen($_SESSION["passphrase"]) > 8 ){
            $_SESSION["error_pass_len"] = "Password length should be between 4 and 8 characters";
            $_SESSION["error"] = "";
        }

if(!isset($_SESSION["error"])){

$hash_pass = PASSWORD_HASH($_SESSION["confpassphrase"], PASSWORD_DEFAULT);

        $insert_user = "INSERT INTO users (fullname, email, username, password, roleId, genderId) VALUES ('$fullname', '$email_address', '$username', '$hash_pass', '$roleId', '$genderId')";

        if ($conn->query($insert_user) === TRUE) {
            header("Location: signup.php");
                // remove all session variables
                session_unset();
            $_SESSION["success"] = "";
            exit();
        } else {
            echo "Error: " . $insert_user . "<br>" . $conn->error;
        }
        $conn->close();
    }
    }
?>
<div class="banner">
    <h1>Sign Up</h1>
</div>
<div class="row">
    <div class="content">
    <h1>Sign Up Form</h1>
    <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off" class="contact_us">
        <?php if(isset($_SESSION["success"])){ print "<span class='success_form'>Record Created Successfuly</span>"; } ?><br>
        <label for="fullname">Fullname:</label><br>
        <input type="text" name="fullname" placeholder="Fullname" maxlength="50" id="fullname" required <?php if(isset($_SESSION["fullname"])){?> value="<?php print $_SESSION["fullname"]; unset($_SESSION["fullname"]); ?>" <?php } ?> autofocus ><br>
        <?php if(isset($_SESSION["nameLetter_err"])){print '<span class="error_form">' . $_SESSION["nameLetter_err"] . '</span>'; unset($_SESSION["nameLetter_err"]); } ?><br>

        <label for="email">Email Address:</label><br>
        <input type="email" name="email_address" id="email" placeholder="Email Address" maxlength="50" required <?php if(isset($_SESSION["email_address"])){?> value="<?php print $_SESSION["email_address"]; unset($_SESSION["email_address"]); ?>" <?php } ?> ><br>
        <?php if(isset($_SESSION["wrong_email_format"])){print '<span class="error_form">' . $_SESSION["wrong_email_format"] . '</span>'; unset($_SESSION["wrong_email_format"]); } ?>
        <?php if(isset($_SESSION["invalid_dom"])){print '<span class="error_form">' . $_SESSION["invalid_dom"] . '</span>'; unset($_SESSION["invalid_dom"]); } ?>
        <?php if(isset($_SESSION["email_exixts"])){print '<span class="error_form">' . $_SESSION["email_exixts"] . '</span>'; unset($_SESSION["email_exixts"]); } ?>
        <br>
        
        <label for="username">Username: </label><br>
        <input type="text" name="username" id="username" placeholder="Username" maxlength="50" required <?php if(isset($_SESSION["username"])){?> value="<?php print $_SESSION["username"]; unset($_SESSION["username"]); ?>" <?php } ?> ><br>
        <?php if(isset($_SESSION["username_exixts"])){print '<span class="error_form">' . $_SESSION["username_exixts"] . '</span>'; unset($_SESSION["username_exixts"]); } ?>
        <br>
        
        <label for="password">Password: </label><br>
        <input type="password" name="passphrase" id="password" placeholder="Password" required <?php if(isset($_SESSION["passphrase"])){?> value="<?php print $_SESSION["passphrase"]; unset($_SESSION["passphrase"]); ?>" <?php } ?> ><br>
        <?php if(isset($_SESSION["error_pass_len"])){print '<span class="error_form">' . $_SESSION["error_pass_len"] . '</span>'; unset($_SESSION["error_pass_len"]); } ?>
        <br>

        <label for="conf_pass">Repeat Password: </label><br>
        <input type="password" name="confpassphrase" id="conf_pass" placeholder="Repeat Password" required ><br>
        <?php if(isset($_SESSION["matching_pass"])){print '<span class="error_form">' . $_SESSION["matching_pass"] . '</span>'; unset($_SESSION["matching_pass"]); } ?>
        <br>

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