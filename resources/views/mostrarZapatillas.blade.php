<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
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
    <!-- DAVID AQUÍ HAZ LA CARTA SIN SER DINAMICO -->
    <div class="cards">

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
          Nike Cortez
          <small>Items sacados de la base de datos</small>
      </h2>
    </div>
    <div class="card-flap flap1">
      <div class="card-description">
        Tallas disponibles (sacada de bbdd/sacada de bbdd/sacada de bbdd/)
        <br>
        <select>
          <option>tallaBBDD</option>
          <option>tallaBBDD</option>
          <option>tallaBBDD</option>
          <option>tallaBBDD</option>
          <option>tallaBBDD</option>
          <option>tallaBBDD</option>
          <option>tallaBBDD</option>
          <option>tallaBBDD</option>
          <option>tallaBBDD</option>
        </select>
        <span class="left"></span>
        <span class="right"></span>
      </div>
    </div>
    </div>
    </div>
</body>
</html>