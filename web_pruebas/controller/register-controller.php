<?php
try {
    include_once '../config/db.php';

    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $contrasena = $_POST['pass'];

    if (empty($nombre)) {
        throw new Exception("El nombre no puede estar vacío");
    }
    if (empty($email)) {
        throw new Exception("El correo no puede estar vacío");
    }
    if (empty($contrasena)) {
        throw new Exception("La contraseña no puede estar vacía");
    }

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $nombre, $email, $contrasena);
    $stmt->execute();

    echo "Usuario registrado con éxito";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
