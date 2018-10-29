@extends('layouts.errors')
@section('title', 'Error 403')
@section('content')
    <div class="errors-page">
        <h2 class="headline text-warning">403</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-warning"></i> Oops! Acción no autorizada.</h3>

            <p class="error-content">
                Comuniquese con el administrador del sistema para acceder a está operación
                <a href="{{route('admin')}}" class="btn btn-secondary">
                    <i class="fa fa-home"></i>
                    Regresar al dashboard
                </a>
            </p>


        </div>
    </div>
    <!-- /.error-page -->
@endsection



