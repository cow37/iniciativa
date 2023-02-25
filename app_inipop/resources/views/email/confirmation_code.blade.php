<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>Hola {{ $nombres }}, Gracias por participar  en <strong>esta iniciativa</strong> !</h2>
    <p>Por favor confirma tu correo electrónico para poder realizar el siguiente paso</p>
    <p>Para ello simplemente debes hacer click en el siguiente enlace:</p>

    <a href="{{ url('/register/verify/' . $confirmation_code) }}">
        Clic para confirmar tu email
    </a>
</body>
</html>