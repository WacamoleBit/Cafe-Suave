@extends('layout.app')

@extends('layout.navbar.authnavbar')

@section('content')
    <div class="container w-25 border py-4">
        <form action="/user/edit" method="GET">
            @csrf
            <h1 class="d-flex gap-2 justify-content-center">Mis datos</h1>
            <div class="form-group mb-3">
                <label for="nombres">Nombre(s)</label>
                <input type="text" name="first_name" id="nombres" value="{{ $user->first_name }}" class="form-control" disabled placeholder="Nombre">
            </div>
            <div class="form-group mb-3">
                <label for="apellidos">Apellido(s)</label>
                <input type="text" name="last_name" id="apellidos" value="{{ $user->last_name }}" class="form-control" disabled placeholder="Apellido">
            </div>
            <div class="form-group mb-3">
                <label for="correo">Correo electrónico</label>
                <input type="email" name="email" id="correo" value="{{ $user->email }}" class="form-control" disabled placeholder="Correo electrónico">
            </div>
            <div class="form-group mb-3">
                <label for="usuario">Usuario</label>
                <input type="text" name="username" id="usuario" value="{{ $user->username }}" class="form-control" disabled placeholder="Usuario">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Actualizar datos</button>
            </div>
        </form>
    </div>
    <div class="container w-25 border py-4">
        <form action="/user/destroy" method="GET">
            @csrf
            <h2>Eliminar cuenta</h2>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-danger">Eliminar cuenta</button>
            </div>
        </form>
    </div>
@endsection