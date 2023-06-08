@extends('layout.app')

@auth
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="/">Café Suave</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endauth

@guest
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="/">Café Suave</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Registrarse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endguest

@section('content')
    <div class="jumbotron jumbotron-fluid p-1">
        <div class="container-fluid">
            <h1 class="display-1">Vista de inicio</h1>
            <p class="lead">Sistema "Escuela" versión Laravel</p>
        </div>
    </div>
@endsection