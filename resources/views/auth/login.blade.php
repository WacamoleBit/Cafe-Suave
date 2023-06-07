@extends('app')

@extends('noauthnavbar')

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