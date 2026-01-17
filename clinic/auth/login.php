<?php
session_start();
include("../config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST["username"];
    $p = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $u);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($row = $res->fetch_assoc()) {
        if (password_verify($p, $row["password_hash"])) {
            $_SESSION["user"] = $u;
            header("Location: ../dashboard.php");
            exit;
        }
    }
    $error = "Login failed";
}
?>
<form method="post">
Username <input name="username"><br>
Password <input type="password" name="password"><br>
<button>Login</button>
</form>
<?= $error ?? "" ?>
