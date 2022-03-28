<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Formulario login</title>
</head>
<body class="login">
    <div class="row flex-cv all-view">
        <div class="cuadro_login">
            @if($errors->any())
                @error('email_user')
                 <li>{{$message}}</li>
                @enderror
                @error('pass_user')
                 <li>{{$message}}</li>
                @enderror
            @endif
            <form action="{{url('loginPost')}}" method="POST">
                @csrf
                {{method_field('POST')}}
                <h1 class="h1_login">Inicio de sesion</h1>
                <input type="text" class="input_login" name="email_user" placeholder="Introduce nombre...">
                <input type="password" class="input_login" name="pass_user" placeholder="Introduce Contraseña...">
                <button class="boton_login" type="submit" value="register">Iniciar sesión</button>
            </form>
        </div>
    </div>
</body>
</html>