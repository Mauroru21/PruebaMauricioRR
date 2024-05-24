<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_unset();
    session_destroy();
    header("location: ../index.php");
    exit;
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../index.php");

    exit;
}
?>

<form method="post">
    <button type="submit" style="float: right;
        background: #ec0d0d;
        color: white;
        width: 88px;
        height: 40px;
        font-size: 16px;
        ">Cerrar</button>
</form>

<div style="margin: auto;
    text-align: center;">
    <h1>Hola, <?php echo $_SESSION['name']; ?>. Bienvenido al Dashboard.</h1>
</div>