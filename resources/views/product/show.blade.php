@extends('layout.app')

@extends('layout.navbar.authnavbar')

@section('content')
    <div class="container w-25 border py-4">
        <form action="/product/{{$product->id}}/edit" method="GET">
            @csrf
            <h1>Producto: {{$product->name}}</h1>
            <div class="form-group mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" name="name" id="nombre" class="form-control" placeholder="Nombre" value="{{$product->name}}" disabled>
            </div>
            <div class="form-group mb-3">
                <!-- <label for="descripcion">Descripción</label><br> -->
                <div class="form-floating">
                    <textarea class="form-control" name="description" id="descripcion" style="height: 100px" disabled>{{$product->description}}</textarea>
                    <label for="floatingTextarea2">Descripción</label>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="precio">Precio</label>
                <input type="number" name="price" id="precio" class="form-control" placeholder="Precio" value="{{$product->price}}" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="quantity" id="cantidad" class="form-control" placeholder="Cantidad" value="{{$product->quantity}}" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="medida">Medida</label>
                <input type="text" name="measure" id="medida" class="form-control" placeholder="Nombre" value="{{$product->measure}}" disabled>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Editar producto</button>
            </div>
        </form>
    </div>
    <div class="container w-25 border py-4">
        <form action="/product/{{$product->id}}/delete" method="GET">
            @csrf
            <h2>Eliminar cuenta</h2>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-danger">Eliminar producto</button>
            </div>
        </form>
    </div>
@endsection