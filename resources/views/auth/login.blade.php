@extends('layout.app')

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

@section('content')
    <div class="container w-25 border py-4">
        <form action="/login" method="POST">
            @csrf
            <h1>Iniciar sesión</h1>
            <div class="form-group mb-3">
                <label for="usuario">Usuario</label>
                <input type="text" name="username" id="usuario" class="form-control" placeholder="Usuario">
            </div>
            <div class="form-group mb-3">
                <label for="contrasenia">Contraseña</label>
                <input type="password" name="password" id="contrasenia" class="form-control" placeholder="Contraseña">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection