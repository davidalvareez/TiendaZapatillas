<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Zapatillas</title>
</head>
<body>
    <div class="menu" style="float: right">
        <button>Iniciar sesion</button>
        <button>icono cesta (desplegable modal box)</button>
    </div>
    <div>
        <table class="table table-striped">
            <tr>
                <th>MARCA</th>
                <th>MODELO</th>
                <th>COLOR</th>
                <th>TALLA</th>
                <th>PRECIO</th>
                <th>FOTO</th>
                <th>ACCIÓN</th>
            </tr>
            @foreach($listaZapatillas as $zapatillas)
                <tr>
                    <td>{{$zapatillas->marca_zapatilla}}</td>
                    <td>{{$zapatillas->modelo_zapatilla}}</td>
                    <td>{{$zapatillas->color_zapatilla}}</td>
                    <td>{{$zapatillas->talla_zapatilla}}</td>
                    <td>{{$zapatillas->precio_zapatilla}}</td>
                    <td>{{$zapatillas->foto_zapatilla}}</td>
                    <td><button>Comprar</button></td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>