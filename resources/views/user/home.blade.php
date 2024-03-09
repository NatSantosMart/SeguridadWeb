@extends('layouts.main')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="text-center">
            <h1>Bienvenid@, {{ auth()->user()->name }} ha iniciado sesión con éxito</h1>
            <img style="margin-top:40px; width: 900px; height: 300px;" src="https://www.piensasolutions.com/blog/file/uploads/2022/08/seguridad-web-1.jpg">
        </div>
    </div>
@endsection
