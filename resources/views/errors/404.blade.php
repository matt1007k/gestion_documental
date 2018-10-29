@extends('layouts.errors')
@section('title', 'Error 404')
@section('content')
    <div class="errors-page">
        <h2 class="headline text-warning">404</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-warning"></i> Oops! La página no existe.</h3>

            <p class="error-content">
                Esta página no ha sido encontrada, realice la búsqueda correctamente.
                <a href="{{route('admin')}}" class="btn btn-secondary">
                    <i class="fa fa-home"></i>
                    Regresar al dashboard
                </a>
            </p>


        </div>
    </div>
    <!-- /.error-page -->
@endsection