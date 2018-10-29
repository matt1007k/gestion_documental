@extends('admin.layout')
@section('title', 'Ver detalle de usuario')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Administración de usuarios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('usuarios.index')}}">Lista de usuarios</a></li>
                        <li class="breadcrumb-item active">Detalle de usuario</li>
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
                            <h3 class="card-title">Detalle de usuario</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"><strong>Nombre completo:</strong></div>
                                <div class="col-md">{{$user->name}}, {{$user->apellidos}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><strong>El DNI:</strong></div>
                                <div class="col-md">{{$user->dni}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><strong>Dirección:</strong></div>
                                <div class="col-md">{{$user->direccion}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><strong>Correo Electrónico:</strong></div>
                                <div class="col-md">{{$user->email}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><strong>El avatar o imagen:</strong></div>
                                <div class="col-md">
                                    <img src="{{ asset('image/user/'.$user->avatar)}}" class="img-circle"  />
                                </div>
                            </div>
                        </div>

                        <a href="{{route('usuarios.index')}}" class="btn btn-danger">
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