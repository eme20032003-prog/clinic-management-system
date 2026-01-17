<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: auth/login.php");
}
?>
<h2>Welcome <?= $_SESSION["user"] ?></h2>
<a href="patients/index.php">Patients</a>
