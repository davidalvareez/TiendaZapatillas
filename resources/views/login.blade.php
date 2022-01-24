<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario login</title>
</head>
<body>
    <form action="{{url('loginPost')}}" method="POST">
        @csrf
        {{method_field('POST')}}
        <h1>Inicio de sesion</h1><br>
        <p>Usuario:</p>
        <input type="text" class="form-control" name="email_user" placeholder="Introduce nombre...">
        <p>Contraseña:</p>
        <input type="password" class="form-control" name="pass_user" placeholder="Introduce Contraseña...">
        <br>
        <input type="submit" class="btn btn-primary mb-2" value="Entrar">
    </form>
</body>
</html>