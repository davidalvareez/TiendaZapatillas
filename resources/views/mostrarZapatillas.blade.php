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
    <title>Mostrar Zapatillas</title>
</head>
<body>
    <div class="menu">
      @if(!Session::get('tipouser'))
        <button onclick="window.location='{{ url("/login")}}'">Iniciar sesion</button>
      @else
      <!--SI EL USUARIO ES ADMIN MOSTRAMOS BOTON DE CREAR ZAPATILLA-->
        @if(Session::get('tipouser') == 'Administrador')
          <form action="{{url('/crearzapatilla')}}" method="GET">
            <button class="" type="submit" name="Crear" value="Crear">Crear</button>
          </form>
        @endif
        <button onclick="window.location='{{ url("/logout")}}'">Cerrar sesion</button>
      @endif
      <button id="myBtn">icono carrito compra</button>
      <!--{{ session()->get('email') }}
      {{ session()->get('tipouser') }}-->
    </div>
    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
      </div>
    </div>  
    <div class="cards" id="cards">
      @foreach($listaZapatillas as $zapatillas)
        <div class="card" id="card">
          <div class="card__image-holder">
            <img class="card__image" src="https://source.unsplash.com/300x225/?wave" alt="wave"/>
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
                <form action="{{url('/eliminarZapatilla'.$zapatillas->id_zapatilla)}}" method="GET">
                  <button class="" type="submit" value="Eliminar">Eliminar</button>
                </form>
                <form action="{{url('/modificarZapatilla'.$zapatillas->id_zapatilla)}}" method="GET">
                  <button class="" type="submit" value="Modificar">Modificar</button>
                </form>
              @else
                <a href="#" class="btn">Añadir al carro</a>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
   
    
      
      
    
    
     
        
        
      
      
        
         
        
      
    
  