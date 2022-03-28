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
<body class="bodyfactura">
    <h1>Mi cesta de compra</h1>
    <div>
        <button class="botoncarrito" onclick="window.location.href='{{url('/')}}'">SEGUIR COMPRANDO</button>
    </div>
    <br><br>
    <table>
        <?php $carro = Session::get('carroCompra');?>
        <tr>
            <th>Imagen del producto</th>
            <th>Nombre del producto</th>
            <th>Coste unidad</th>
        </tr>
        @if(Session::get('carroCompra'))
        <?php 
        $total=0;?>
            @foreach ($carro as $cart)
            <tr>
                <td class="tdcarrito"><img class="" width="298px" height="223px" src="{{asset('storage').'/'.$cart['foto_zapatilla']}}"/></td>
                <td class="tdcarrito">{{$cart['modelo_zapatilla']}}</td>
                <td class="tdcarrito">{{$cart['precio_zapatilla']}}</td>
              </tr>
              <?php $total=$total+$cart['precio_zapatilla'] ?>
            @endforeach
        @endif
        
        <form action="{{url('pagar/'.$total)}}" method="GET">
            @if(Session::get('carroCompra'))
                <input type="hidden" name="correo" value="<?php echo Session::get('email')?>">
                <button class="botoncarrito" type="submit" name="pagar" value="Pagar">Total a pagar: <?php echo $total?>€</button>
            @endif
        </form>
    </table>
</body>
</html>