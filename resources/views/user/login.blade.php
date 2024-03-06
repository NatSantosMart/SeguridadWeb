@extends('layouts.main')

@section('title')
    Iniciar sesión
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form id="login_form" name="login_form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="col-12">
                        <h1 class="text-center">Iniciar sesión</h1>
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
                        <div class="col-12">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required/>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <div class="col-12">
                            <label for="contraseña">Contraseña:</label>
                            <input type="password" class="form-control" name="password" required/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 text-center mt-4 mb-4">
                            <button type="submit" class="btn btn-primary">
                                Iniciar sesión
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
