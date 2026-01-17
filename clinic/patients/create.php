<?php
include("../config/db.php");

if ($_POST) {
    $name = $_POST["full_name"];
    $phone = $_POST["phone"];

    $stmt = $conn->prepare("INSERT INTO patients VALUES (NULL, ?, ?)");
    $stmt->bind_param("ss", $name, $phone);
    $stmt->execute();
}
?>
<form method="post">
Name <input name="full_name"><br>
Phone <input name="phone"><br>
<button>Add</button>
</form>
