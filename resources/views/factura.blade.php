<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('../public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('../public/css/fontawesome/css/all.css')}}">
    <title>Factura</title>
</head>
<body>
    <h1>Mi cesta de compra</h1>
    <div>
        <button>SEGUIR COMPRANDO</button>
        <form action="{{url('/pagar')}}" method="GET">
            <input type="hidden" name="correo" value="<?php echo Session::get('email')?>">
            <button class="" type="submit" name="pagar" value="Pagar">Pagar</button>
          </form>
    </div>
    <br><br>
    <table>
        <th>Informacion de tu pedido</th>
        <th>Precio</th>
    </table>
</body>
</html>