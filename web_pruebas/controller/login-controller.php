<?php
include_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass = $_POST['pass'];
    $email = $_POST['email'];

    if (empty($pass) || empty($email)) {
        echo "Los campos no pueden estar vacíos";
    } else {
        $sql = "SELECT * FROM `usuarios` WHERE email = '$email' AND contrasena = '$pass'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $result->fetch_assoc()['nombre'];
            header("Location: ../views/dashboard.php");
        } else {
            echo "Email o contraseña incorrectos";
        }
    }
}
