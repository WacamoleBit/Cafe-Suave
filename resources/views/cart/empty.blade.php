@extends('layout.app')

@extends('layout.navbar.authnavbar')

@section('content')
    <div class="jumbotron jumbotron-fluid p-1">
        <div class="container-fluid">
            <h1 class="display-1">Carrito</h1>
        </div>
    </div>

    <div id="container" class="d-flex align-items-center justify-content-center display-5">
        <p>El carrito está vacio.</p>
    </div>
@endsection