@extends('layout.app')

@extends('layout.navbar.authnavbar')

@section('content')
    <div class="jumbotron jumbotron-fluid p-1">
        <div class="container-fluid">
            <h1 class="display-1">Menú</h1>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Medida</th>
                    <th>Agregar a carrito</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td> {{$product->name}}</td>
                    <td> {{$product->description}}</td>
                    <td> {{$product->price}} Pesos</td>
                    <td> {{$product->quantity}}</td>
                    <td> {{$product->measure}}</td>
                    <td>
                        <form action="/cart" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <button class="btn btn-primary float-end" type="submit">Añadir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection