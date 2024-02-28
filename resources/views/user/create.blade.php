@extends('layouts.main')

@section('title')
    Crear nuevo usuario
@endsection

@section('content')
    <div class="row justify-content-center mt-4">
        <form id="user_create_form" name="user_create_form" method="POST" enctype="multipart/form-data"
            action="{{route('user.store')}}">
            @csrf
            <div class="col-12">
                <h1>Crear usuario</h1>
            </div>

            <div class="form-group col-6 mt-4">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
            </div>
            <div class="form-group col-6 mt-4">
                <label for="surnames">Apellidos</label>
                <input type="text" class="form-control" name="surnames" value="{{old('surnames')}}"/>
            </div>
            <div class="form-group col-6 mt-4">
                <label for="dni">Dni</label>
                <input type="text" class="form-control" name="dni" value="{{old('dni')}}"/>
            </div>
            <div class="form-group col-6 mt-4">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="{{old('email')}}"/>
            </div>
            <div class="form-group col-12 mt-4">
                <button type="submit" class="btn btn-primary">
                    Crear usuario
                </button>
            </div>
        </form>
    </div>
@endsection
