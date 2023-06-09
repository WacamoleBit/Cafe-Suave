@extends('layout.app')

@extends('layout.navbar.authnavbar')

@section('content')
    <div class="container w-25 border py-4">
        <form action="/product/{{$product->id}}" method="POST">
            @method('DELETE')
            @csrf
            <h1 class="d-flex gap-2 justify-content-center">¿Borrar producto del inventario?</h1>
            <div class="d-flex gap-2 justify-content-center">
                <button class="btn btn-primary" value="confirm" name="submitbutton" type="submit">Confirmar</button>
                <button class="btn btn-danger" value="'cancel" name="submitbutton" type="submit">Cancelar</button>
            </div>
        </form>
    </div>   
@endsection