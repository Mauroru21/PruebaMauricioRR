<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Pruebas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <main class="main-register">

        <form class="container-form_register" action="../controller/register-controller.php" method="post" onsubmit="return validateForm()">
            <h1 style="text-align: center; margin:5px;margin-top:5%">Formulario de registro</h1>
            <input type="text" id="name" name="name" placeholder="Nombre">
            <input type="text" id="email" name="email" placeholder="Email">
            <input type="password" id="pass" name="pass" placeholder="Contraseña">
            <input type="submit" value="Registrar Usuario">
            <div id="error" style="color: red;"></div>
        </form>

    </main>

</body>
<script>
    function validateForm() {
        const name = document.getElementById('name').value;
        const pass = document.getElementById('pass').value;
        const email = document.getElementById('email').value;
        if (name == "") {
            document.getElementById('error').innerHTML = "Nombre no puede estar vacío";
            return false;
        } else if (pass == "") {
            document.getElementById('error').innerHTML = "Contraseña no puede estar vacía";
            return false;
        } else if (email == "") {
            document.getElementById('error').innerHTML = "Correo no puede estar vacío";
            return false;
        }
        return true;
    }
</script>

</html>