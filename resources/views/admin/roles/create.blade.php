@extends('admin.layout')
@section('title', 'Registrar role')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Administración de roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Lista de roles</a></li>
                        <li class="breadcrumb-item active">Registrar role</li>
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
                <div class="col-md-8 offset-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Registrar role</h3>
                        </div>
                        <!-- /.card-header -->
                        @include('admin.partials.errors')
                        <!-- form start -->
                        {!! Form::open(['route' => 'roles.store']) !!}
                            @include('admin.roles.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection