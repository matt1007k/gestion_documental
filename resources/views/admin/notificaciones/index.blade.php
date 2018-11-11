@extends('admin.layout')
@section('title', 'Notificaciones')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Administración de Notificaciones</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Notificaciones</li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md">
                                    <h3 class="card-title">Todos las notificaciones</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>No leídas</h3>
                                    <ul class="list-group">
                                        @forelse($unreadNotifications as $unread)
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <a href="{{ $unread->data['link'] }}">
                                                            {{$unread->data['text']}}
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <form class="" action="{{ route('notifications.read', $unread->id) }}" method="POST">
                                                            {{ method_field('PUT')  }}
                                                            {{ csrf_field() }}
                                                            <button class="btn btn-danger btn-sm" data-toggle="tooltip" title="Marcar como leída">
                                                                <i class="fas fa-clipboard-check"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <li class="list-group-item">No tienes ninguna notificación!</li>
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h3>Leídas</h3>
                                    <ul class="list-group">
                                        @forelse($readNotifications as $read)
                                            <li class="list-group-item">
                                                <a href="{{ $read->data['link'] }}">
                                                    {{$read->data['text']}}
                                                </a>
                                            </li>
                                        @empty
                                            <li class="list-group-item">No tienes ninguna notificación!</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

    </div>
    <!-- /.content -->
@endsection

