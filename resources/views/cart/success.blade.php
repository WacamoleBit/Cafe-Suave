@extends('layout.app')

@extends('layout.navbar.authnavbar')

@section('content')
    <div class="container w-20 border py-4">
        <form action="/menu" method="GET">
            @csrf
            <h1 class="d-flex gap-2 justify-content-center">Compra realizada exitosamente</h1>
            <div class="d-flex gap-2 justify-content-center">
                <button class="btn btn-primary" value="confirm" name="submitbutton" type="submit">Volver al menu</button>
            </div>
        </form>
    </div>   
@endsection