
<?php
    require_once("includes/db_connect.php");

if(isset($_POST["query"])){

    $search = mysqli_real_escape_string($conn, $_POST["query"]);

    $spot_students = "SELECT * FROM students WHERE username LIKE '%$search%' OR  fullname  LIKE '%$search%' ORDER BY fullname ASC";
}else{

    $spot_students = "SELECT * FROM students ORDER BY fullname ASC";
}


    $spot_std_res = $conn->query($spot_students);
?>
<table class="table table-dark table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Fullname</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody>
<?php
$sn=0;
while($spot_std_row = $spot_std_res->fetch_assoc()){
$sn++;
?>
<tr>
    <th scope=""><?php print $sn; ?> </th>
    <td><?php print $spot_std_row["username"]; ?></td>
    <td><?php print $spot_std_row["fullname"]; ?></td>
    <td><?php print $spot_std_row["email"]; ?></td>
</tr>
<?php
}
?>
    </tbody>
</table>