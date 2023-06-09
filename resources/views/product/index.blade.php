@extends('layout.app')

@extends('layout.navbar.authnavbar')

@section('content')
    <div class="jumbotron jumbotron-fluid p-1">
        <div class="container-fluid">
            <h1 class="display-1">Sección de alumnos</h1>
            <p class="lead">En esta sección se muestran los datos de los alumnos en una tabla.</p>
        </div>
    </div>

    <div class="container-fluid">
        <form action="/product/create" method="GET">
            <button class="btn btn-primary float-end mb-3" type="submit">
                Nuevo producto
            </button>
        </form>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Medida</th>
                    <th colspan="3">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td> {{$product->name}} </td>
                    <td> {{$product->price}} </td>
                    <td> {{$product->quantity}} </td>
                    <td> {{$product->measure}} </td>
                    <td>
                        <form action="/product/{{$product->id}}/edit" method="GET">
                            @csrf
                            <button class="btn btn-warning float-end" type="submit">Editar</button>
                        </form>
                    </td>
                    <td>
                        <form action="/product/{{$product->id}}" method="GET">
                            <button class="btn btn-info float-end" type="submit">Detalles</button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn sm float-end">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection