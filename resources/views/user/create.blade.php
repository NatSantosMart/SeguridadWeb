
@extends('layouts.main')

@section('title')
    Crear nuevo usuario
@endsection

@section('content')
    <div class="row justify-content-center mt-4">
        <form id="user_create_form" name="user_create_form" method="POST" enctype="multipart/form-data"
            action="{{route('user.store')}}">
            @csrf
            <h1>Crear usuario</h1>

            <div class="form-group">
                <label for="name">Nombre</label>
                <input for="text" class="form-control" name="name" value="{{old('name')}}"/>
            </div>
            <div class="form-group">
                <label for="surnames">Apellidos</label>
                <input for="text" class="form-control" name="surnames" value="{{old('surnames')}}"/>
            </div>
            <button type="submit" class="btn btn-primary">
                Crear usuario
            </button>
        </form>
    </div>
@endsection
