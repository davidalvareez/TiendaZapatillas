<?php $cantidadCarrito = 0; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../public/js/script.js"></script>
    <link rel="stylesheet" href="{{asset('../public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('../public/css/fontawesome/css/all.css')}}">
    <title>Mostrar Zapatillas</title>
</head>
<body>
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close" id="closeModal">&times;</span>
      <h1>En tu carro:</h1>
      <div>
        <!--Poner lo que ha comprado el usuario!-->
        @if(Session::get('carroCompra'))
          <?php $carro = Session::get('carroCompra');?>
          <table>
        @foreach($carro as $cart)
          <tr>
            <td class="tdcarro"><img class="imagencarro" width="298px" height="223px" src="{{asset('storage').'/'.$cart['foto_zapatilla']}}"/></td>
            <td class="tdcarro">{{$cart['modelo_zapatilla']}}</td>
            <td class="tdcarro">{{$cart['precio_zapatilla']}}€</td>
          </tr>
          <?php 
            $cantidadCarrito++;
          ?>
        @endforeach
      </table>
        <button class="botoncarrito" onclick="window.location.href='{{url('/factura')}}'">Finalizar el pedido</button>
        @endif
      </div>
    </div>
  </div>
    <div class="menu" id="menu">
      @if(!Session::get('tipouser'))
        <i onclick="window.location='{{url("/login")}}'" style="margin-right:10px;" class="fas fa-user fa-2x"></i>
      @else
      <!--SI EL USUARIO ES ADMIN MOSTRAMOS BOTON DE CREAR ZAPATILLA-->
        @if(Session::get('tipouser') == 'Administrador')
          <form action="{{url('/crearzapatilla')}}" method="GET">
            <button class="" type="submit" name="Crear" value="Crear">Crear</button>
          </form>
        @else
          @if ($cantidadCarrito != 0)
          <i class="fas fa-shopping-cart fa-2x" id="myBTN"><?php echo $cantidadCarrito ?></i>
          @else
          <i class="fas fa-shopping-cart fa-2x" id="myBTN"></i>
          @endif
        @endif
        <i onclick="window.location='{{url("/logout")}}'" class="fas fa-sign-out-alt fa-2x"></i>
      @endif
      <!--{{ session()->get('email') }}
      {{ session()->get('tipouser') }}-->
    </div>
    <div class="cards" id="cards">
      <form method="post" onsubmit="return false">
        <input type="hidden" name="_method" value="POST" id="postFiltro">
        <!--<div class="form-outline">
            <input type="search" id="search" name="nombre" class="form-control" placeholder="Buscar por nombre..." aria-label="Search" onkeyup="filtro(); return false;"/>
        </div>!-->
      </form>
      @foreach($listaZapatillas as $zapatillas)
        <div class="card" id="card">
          <div class="card__image-holder">
            <img class="card__image" width="298px" height="223px" src="{{asset('storage').'/'.$zapatillas->foto_zapatilla}}"/>
          </div>
          <div class="card-title">
            <a href="#" class="toggle-info btn">
              <span class="left"></span>
              <span class="right"></span>
            </a>
            <h2>
              
              {{$zapatillas->marca_zapatilla}} {{$zapatillas->modelo_zapatilla}}
              <small>{{$zapatillas->color_zapatilla}}</small>
              <small>{{$zapatillas->precio_zapatilla}}€ </small>
            </h2>
          </div>
          <div class="card-flap flap1">
            <div class="card-description">
              Tallas disponibles:
              <select class="talla_zapatilla" name="talla_zapatilla">
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
              </select>
            </div>
          </div>
          <div class="card-flap flap2">
            <div class="card-actions">
              <!--Si es administrador podrá eliminar y modificar, si es cliente solo agregar al carrito y si no hay sesion no mostramos nada-->
              @if(Session::get('tipouser') == 'Administrador')
                  <button onclick="window.location.href = '{{url('/eliminarZapatilla/'.$zapatillas->id)}}'" class="" type="submit" value="Eliminar">Eliminar</button>
                  <button onclick="window.location.href = '{{url('/modificarZapatilla/'.$zapatillas->id)}}'" class="" type="submit" value="Modificar">Modificar</button>
              @elseif (Session::get('tipouser') == 'Cliente')
                <a href="#" class="btn" onclick="window.location.href = '{{url('/addCart/'.$zapatillas->id)}}'">Añadir al carro <i class="fas fa-cart-plus"></i></a>
              @else
                <a href="#" class="btn" onclick="window.location.href = '{{url('/login')}}'">Añadir al carro <i class="fas fa-cart-plus"></i></a>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
   
    
      
      
    
    
     
        
        
      
      
        
         
        
      
    
  