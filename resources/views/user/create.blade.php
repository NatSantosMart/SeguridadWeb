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

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h5>Error:</h5>
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
                            <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" value="{{old('nombre')}}" required/>
                        </div>
                        <div class="col-6">
                            <label for="surnames">Apellidos:</label>
                            <input type="text" class="form-control {{ $errors->has('apellidos') ? 'is-invalid' : '' }}" name="apellidos" value="{{old('apellidos')}}" required/>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-6">
                            <label for="dni">Dni:</label>
                            <input type="text" class="form-control {{ $errors->has('dni') ? 'is-invalid' : '' }}" name="dni" value="{{old('dni')}}" required/>
                        </div>
                        <div class="col-6">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{old('email')}}" required/>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-6">
                            <label for="contraseña">Contraseña:</label>
                            <input type="text" class="form-control  {{ $errors->has('contraseña') ? 'is-invalid' : '' }}" name="contraseña" value="{{old('contraseña')}}" required/>
                        </div>
                        <div class="col-6">
                            <label for="contraseñaRepetida">Contraseña repetida:</label>
                            <input type="text" class="form-control  {{ $errors->has('contraseñaRepetida') ? 'is-invalid' : '' }}" name="contraseñaRepetida" id="contraseñaRepetida" value="{{old('contraseñaRepetida')}}" required/>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-6">
                            <label for="phone">Teléfono:</label>
                            <input type="text" class="form-control  {{ $errors->has('telefono') ? 'is-invalid' : '' }}" name="telefono" value="{{old('telefono')}}"/>
                        </div>
                        <div class="col-6">
                            <label for="pais">País:</label>
                            <select class="form-control  {{ $errors->has('pais') ? 'is-invalid' : '' }}" name="pais">
                                <option value="">Selecciona un país</option>
                                @foreach ($countries as $id => $name)
                                    <option value="{{ $name }}" {{ old('pais') == $name ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>                        
                        
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-12">
                            <label for="iban">Número de cuenta bancaria:</label>
                            <input type="text" class="form-control {{ $errors->has('iban') ? 'is-invalid' : '' }}" name="iban" value="{{old('iban')}}" required/>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-12">
                            <label for="sobreTi">Sobre ti:</label>
                            <textarea type="text" class="form-control {{ $errors->has('sobreTi') ? 'is-invalid' : '' }}" name="sobreTi">{{ old('sobreTi') }}</textarea>
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
        document.getElementById('contraseñaRepetida').addEventListener('paste', function(e) {
            e.preventDefault();
            alert('No se permite pegar en este campo.');
        });
    </script>
@endsection
