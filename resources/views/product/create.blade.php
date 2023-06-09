@extends('layout.app')

@extends('layout.navbar.authnavbar')

@section('content')
    <div class="container w-25 border py-4">
        <form action="/product" method="POST">
            @csrf
            <h1>Nuevo producto</h1>
            <div class="form-group mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" name="name" id="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group mb-3">
                <label for="descripcion">Descripción</label><br>
                <div class="form-floating">
                    <textarea class="form-control" name="description" placeholder="Descipción" id="descripcion" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Descipcion</label>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="precio">Precio</label>
                <input type="number" name="price" id="precio" class="form-control" placeholder="Precio">
            </div>
            <div class="form-group mb-3">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="quantity" id="cantidad" class="form-control" placeholder="Cantidad">
            </div>
            <div class="form-group mb-3">
                <label for="medida">Medida</label>
                <input type="text" name="measure" id="medida" class="form-control" placeholder="Nombre">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection