<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Zapatilla</title>
</head>
<body>
    <form action="{{url('modificarZapatilla')}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <p>Marca</p>
        <input type="text" name="marca_zapatilla" value="{{$zapatilla->marca_zapatilla}}">
        <br>
        <p>Modelo</p>
        <input type="text" name="modelo_zapatilla" value="{{$zapatilla->modelo_zapatilla}}">
        <br>
        <p>Color</p>
        <input type="text" name="color_zapatilla" value="{{$zapatilla->color_zapatilla}}">
        <br>
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
        <br>
        <p>Precio</p>
        <input type="number" name="precio_zapatilla" value="{{$zapatilla->precio_zapatilla}}">
        <br>
        <p>Foto</p>
        <input type="file" name="foto_zapatilla"><br>
        <p>Proveedor</p>
        <select name="id_proveedor">
            <option value="1" selected>Nike</option>
            <option value="2" selected>Adidas</option>
            <option value="3" selected>Reebok</option>
        </select><br>
        <input type="hidden" name="id" value="{{$zapatilla->id}}">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>