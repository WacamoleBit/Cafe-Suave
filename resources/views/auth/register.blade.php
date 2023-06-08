@extends('layout.app')

@extends('layout.navbar.noauthnavbar')

@section('content')
    <div class="container w-25 border py-4">
        <form action="/register" method="POST">
            @csrf
            <h1>Formato de registro</h1>
            <div class="form-group mb-3">
                <label for="nombres">Nombre(s)</label>
                <input type="text" name="first_name" id="nombres" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group mb-3">
                <label for="apellidos">Apellido(s)</label>
                <input type="text" name="last_name" id="apellidos" class="form-control" placeholder="Apellido">
            </div>
            <div class="form-group mb-3">
                <label for="correo">Correo electrónico</label>
                <input type="email" name="email" id="correo" class="form-control" placeholder="Correo electrónico">
            </div>
            <div class="form-group mb-3">
                <label for="usuario">Usuario</label>
                <input type="text" name="username" id="usuario" class="form-control" placeholder="Usuario">
            </div>
            <div class="form-group mb-3">
                <label for="contrasenia">Contraseña</label>
                <input type="password" name="password" id="contrasenia" class="form-control" placeholder="Contraseña">
            </div>
            <div class="form-group mb-3">
                <input type="password" name="password_confirmation" id="contrasenia_confirmacion" class="form-control" placeholder="Repetir contraseña">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection