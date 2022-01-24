<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Zapatilla</title>
</head>
<body>
    <form action="{{url('/modificarZapatilla')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Marca</p>
        <input type="text" name="marca_zapatilla" value="{{$zapatilla->marca_zapatilla}}">
        @error('marca_zapatilla')
        <br>
        {{$message}}
        @enderror
        <p>Modelo</p>
        <input type="text" name="modelo_zapatilla" value="{{$zapatilla->modelo_zapatilla}}">
        @error('modelo_zapatilla')
        <br>
        {{$message}}
        @enderror
        <p>Color</p>
        <input type="text" name="color_zapatilla" value="{{$zapatilla->color_zapatilla}}">
        @error('color_zapatilla')
        <br>
        {{$message}}
        @enderror
        <p>Talla</p>
        <select name="talla_zapatilla">
            <option value="35" selected>35</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
            <option value="44">44</option>
            <option value="45">45</option>
          </select>
        @error('talla_zapatilla')
        <br>
        {{$message}}
        @enderror
        <p>Precio</p>
        <input type="number" name="precio_zapatilla" value="{{precio_zapatilla}}">
        @error('precio_zapatilla')
        <br>
        {{$message}}
        @enderror
        <p>Foto</p>
        <input type="file" name="foto_zapatilla">
        @error('foto_zapatilla')
        <br>
        {{$message}}
        @enderror
        <p>Proveedor</p>
        <select name="id_proveedor">
            <option value="1" selected>Nike</option>
            <option value="2" selected>Adidas</option>
            <option value="3" selected>Reebok</option>
        </select>
        @error('id_proveedor')
        <br>
        {{$message}}
        @enderror
        <input type="submit" value="Enviar">
    </form>
</body>
</html>