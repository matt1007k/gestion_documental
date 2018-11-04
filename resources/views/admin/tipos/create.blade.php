@extends('admin.layout')
@section('title', 'Registrar tipo de documento')
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
                        <li class="breadcrumb-item"><a href="{{route('tipos.index')}}">Tipos de documentos</a></li>
                        <li class="breadcrumb-item active">Registrar tipo de documento</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Registrar tipo de documento</h3>
                        </div>
                        <!-- /.card-header -->
                        @include('admin.partials.errors')
                        <!-- form start -->
                        {!! Form::open(['route' => 'tipos.store']) !!}
                            @include('admin.tipos.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection