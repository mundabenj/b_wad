<?php 
require_once("includes/db_connect.php");
include_once ("templates/heading.php");
include_once ("templates/nav.php");
 ?>
        <div class="banner">
            <h1>View Messages</h1>
        </div>
        <div class="row">
            <div class="content">
    <h1>People</h1>

<table>
    <thead>
        <tr>
            <th>Fullname</th>
            <th>Email</th>
            <th>Subject Line</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
<?php

$select_messages = "SELECT * FROM messages ORDER BY datecreated DESC";
$sel_mes_res = $conn->query($select_messages);

if ($sel_mes_res->num_rows > 0) {
  // output data of each row
  while($sel_mes_row = $sel_mes_res->fetch_assoc()) {
?>
    <tr>
        <td><?php print $sel_mes_row["sender_name"]; ?></td>
        <td><?php print $sel_mes_row["sender_email"]; ?></td>
        <td><?php print $sel_mes_row["subject_line"] . " " . substr($sel_mes_row["message"], 0, 15) . "..."; ?></td>
        <td><?php print date("d-M-Y H:i", strtotime($sel_mes_row["datecreated"])); ?></td>
    </tr>
    <?php
  }
} else {
    echo "0 results";
}
?>
</tbody>    
    <thead>
        <tr>
            <th>Fullname</th>
            <th>Email</th>
            <th>Subject Line</th>
            <th>Time</th>
        </tr>
    </thead>
</table>

</div>
<?php include_once("templates/side_bar.php"); ?>
</div>
<?php include_once("templates/footer.php"); ?>