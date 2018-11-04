@extends('admin.layout')
@section('title', 'Ver detalle de oficina')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Administración de oficinas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('oficinas.index')}}">Todas las oficinas</a></li>
                        <li class="breadcrumb-item active">Detalle de oficina</li>
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
                            <h3 class="card-title">Detalle de oficina</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"><strong>Nombre:</strong></div>
                                <div class="col-md">{{$office->nombre}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><strong>Descripción:</strong></div>
                                <div class="col-md">{{$office->descripcion}}</div>
                            </div>
                        </div>

                        <a href="{{route('oficinas.index')}}" class="btn btn-danger">
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