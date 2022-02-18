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
        <form action="{{url('/')}}" method="GET">
            <button>SEGUIR COMPRANDO</button>
        </form>
    </div>
    <br><br>
    <table>
        <?php $carro = Session::get('carroCompra');?>
        <tr>
            <th></th>
            <th>Informacion de tu pedido</th>
            <th>Precio</th>
        </tr>
        @if(Session::get('carroCompra'))
            @foreach ($carro as $cart)
            <tr>
                <td><img class="" width="298px" height="223px" src="{{asset('storage').'/'.$cart['foto_zapatilla']}}"/></td>
                <td>{{$cart['modelo_zapatilla']}}</td>
                <td>{{$cart['precio_zapatilla']}}</td>
              </tr>
              <?php 
              $total=0;
              $total=$total+$cart['precio_zapatilla'] ?>
            @endforeach
        @endif
        
        <form action="{{url('pagar/'.$total)}}" method="GET">
            @if(Session::get('carroCompra'))
                @foreach ($carro as $cart)
                    <input type="hidden" name="correo" value="<?php echo Session::get('email')?>">
                    <button class="" type="submit" name="pagar" value="Pagar">Pagar</button>
                @endforeach
            @endif
        </form>
    </table>
</body>
</html>