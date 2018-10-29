@extends('admin.layout')
@section('title', 'Ver detalle de tipo de documento')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Administración de tipo de documentos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('tipos.index')}}">Tipo de documentos</a></li>
                        <li class="breadcrumb-item active">Detalle de tipo de documento</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">

        <div class="content-fluid">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detalle de tipo de documento</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"><strong>Nombre:</strong></div>
                                <div class="col-md">{{$type->nombre}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><strong>Descripción:</strong></div>
                                <div class="col-md">{{$type->descripcion}}</div>
                            </div>
                        </div>

                        <a href="{{route('tipos.index')}}" class="btn btn-danger">
                            <i class="fa fa-arrow-left"></i>
                            Regresar
                        </a>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

    </div>
    <!-- /.content -->
@endsection