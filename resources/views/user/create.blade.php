@extends('layouts.main')

@section('title')
    Crear nuevo usuario
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form id="user_create_form" name="user_create_form" method="POST" enctype="multipart/form-data"
                    action="{{route('user.store')}}">
                    @csrf
                    <div class="col-12">
                        <h1 class="text-center">Crear usuario</h1>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h5>Error</h5>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group row mt-4">
                        <div class="col-6">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
                        </div>
                        <div class="col-6">
                            <label for="surnames">Apellidos:</label>
                            <input type="text" class="form-control" name="surnames" value="{{old('surnames')}}"/>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-6">
                            <label for="dni">Dni:</label>
                            <input type="text" class="form-control" name="dni" value="{{old('dni')}}"/>
                        </div>
                        <div class="col-6">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" value="{{old('email')}}"/>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-6">
                            <label for="password">Contraseña:</label>
                            <input type="text" class="form-control" name="password" value="{{old('password')}}"/>
                        </div>
                        <div class="col-6">
                            <label for="repeatPassword">Contraseña repetida:</label>
                            <input type="text" class="form-control" name="repeatPassword" id="repeatPassword" value="{{old('repeatPassword')}}"/>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-6">
                            <label for="phone">Teléfono:</label>
                            <input type="text" class="form-control" name="phone" value="{{old('phone')}}"/>
                        </div>
                        <div class="col-6">
                            <label for="country">País:</label>
                            <input type="text" class="form-control" name="country" value="{{old('country')}}"/>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-12">
                            <label for="IBAN">Número de cuenta bancaria:</label>
                            <input type="text" class="form-control" name="IBAN" value="{{old('IBAN')}}"/>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-12">
                            <label for="aboutYou">Sobre ti:</label>
                            <textarea type="text" class="form-control" name="aboutYou" value="{{old('aboutYou')}}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 text-center mt-4 mb-4">
                            <button type="submit" class="btn btn-primary">
                                Crear usuario
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Desactivar el pegado en el campo de contraseña repetida
        document.getElementById('repeatPassword').addEventListener('paste', function(e) {
            e.preventDefault();
            alert('No se permite pegar en este campo.');
        });
    </script>
@endsection
