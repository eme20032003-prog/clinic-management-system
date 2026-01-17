<?php
include("../config/db.php");
$res = $conn->query("SELECT * FROM patients");
while ($p = $res->fetch_assoc()) {
    echo $p["full_name"] . " - " . $p["phone"] . "<br>";
}
?>
<a href="create.php">Add Patient</a>
