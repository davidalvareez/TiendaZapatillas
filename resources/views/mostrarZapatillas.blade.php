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
                    <td><button>Añadir carrito</button></td>
                </tr>
            @endforeach
        </table>
    </div>
    <!-- CARTA DINAMICA -->
    <div class="cards">
      @foreach($listaZapatillas as $zapatillas)
          <div class="card">
            <div class="card__image-holder">
              <img class="card__image" src="https://source.unsplash.com/300x225/?wave" alt="wave" />
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
              <div class="card-flap flap2">
                <div class="card-actions">
                  <a href="#" class="btn">Añadir al carro</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      