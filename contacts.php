<?php require_once("includes/db_connect.php"); ?>
<?php include_once ("templates/heading.php"); ?>
<?php include_once ("templates/nav.php"); ?>
<div class="banner">
    <h1>Talk to Us</h1>
</div>
<div class="row">
    <div class="content">
    <h1>Forms</h1>
    <form action="" autocomplete="off" class="contact_us">
        <label for="fullname">Fullname:</label><br>
        <input type="text" name="fullname" placeholder="Fullname" id="fullname"><br><br>
        <label for="email">Email Address:</label><br>
        <input type="email" name="email_address" id="email" placeholder="Email Address"><br><br>
        <label for="email">Subject:</label><br>
           <select name="" id="">
            <option value="">--Select Subject--</option>
            <option value="">Email Support</option>
            <option value="">E-learning Support</option>
            <option value="">HTML Support</option>
        </select>
        <br><br>
        <label for="message" class="form-label">Message:</label><br>
        <textarea name="" id="message" rows="10"></textarea>
        <br><br>
           <input type="submit" value="Send Message">
    </form>
</div>
<?php include_once("templates/side_bar.php"); ?>
</div>
<?php include_once("templates/footer.php"); ?>