<form class="form-login" action="controller/login-controller.php" method="post" onsubmit="return validateForm()">
    <h1 style="text-align: center; margin:5px;margin-top:5%">Formulario de ingreso</h1>
    <input type="text" id="email" name="email" placeholder="Email" value="maria.gomez@ejemplo.com">
    <input type="password" id="pass" name="pass" placeholder="Contraseña" value="nuevacontraseña123">
    <input type="submit" value="Ingresar">
    <div>
        <a class="btn-register" href="views/register.php">Registrate</a>
    </div>

</form>

<div style="background-color: #ffffff;;display: flex;align-items: center">
    <h2 style="color: #000000c2;text-align: center">
        Bienvenido a nuestra página web, por favor ingrese sus datos para continuar.
    </h2>

</div>


<script>
    function validateForm() {
        const pass = document.getElementById('pass').value;
        const email = document.getElementById('email').value;
        if (pass == "") {
            document.getElementById('error').innerHTML = "Contraseña no puede estar vacía";
            return false;
        } else if (email == "") {
            document.getElementById('error').innerHTML = "Correo no puede estar vacío";
            return false;
        }
        return true;
    }
</script>