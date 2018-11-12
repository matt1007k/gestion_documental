@extends('admin.layout')
@section('title', 'Documentos asignados')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Todos los documentos asignados</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Documentos asignados</li>
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
                            <h3 class="card-title">Documentos</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    @forelse($assigns as $asignado)
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <ul class="list-unstyled clearfix">
                                            <?php
                                            $pathArchivo = str_replace('storage','public',$asignado->document->archivo);
                                            $sizeArchivo = Storage::size($pathArchivo) / 1024;

                                            ?>
                                            @if (explode(".", $asignado->document->archivo)[1] == "pdf")
                                                <li>
                                                    <span class="box-attachment-icon no-padding text-danger"><i class="far fa-file-pdf"></i></span>

                                                    <div class="box-attachment-info">
                                                        <a href="{{$asignado->document->archivo}}" class="box-attachment-name"><i class="fa fa-paperclip"></i> {{explode("/", $asignado->document->archivo)[2]}}</a>
                                                        <span class="box-attachment-size">
                                                        {{ number_format($sizeArchivo, 0, '', ',') }} KB
                                                        <a href="{{$asignado->document->archivo}}" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download-alt"></i></a>
                                                    </span>
                                                    </div>
                                                </li>
                                            @elseif (explode(".", $asignado->document->archivo)[1] == "docx" && "doc")
                                                <li>
                                                    <span class="box-attachment-icon text-primary"><i class="far fa-file-word"></i></span>

                                                    <div class="box-attachment-info">
                                                        <a href="#" class="box-attachment-name"><i class="fa fa-paperclip"></i> {{explode("/", $asignado->document->archivo)[2]}}</a>
                                                        <span class="box-attachment-size">
                                                        {{ number_format($sizeArchivo, 0, '', ',') }} KB
                                                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download-alt"></i></a>
                                                    </span>
                                                    </div>
                                                </li>
                                            @else
                                                <li>
                                                    <span class="box-attachment-icon text-success"><i class="far fa-file-excel"></i></span>

                                                    <div class="box-attachment-info">
                                                        <a href="{{$asignado->document->archivo}}" class="box-attachment-name"><i class="fa fa-paperclip"></i> {{explode("/", $asignado->document->archivo)[2]}}</a>
                                                        <span class="box-attachment-size">
                                                        {{ number_format($asignado->sizeArchivo, 0, '', ',') }} KB
                                                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download-alt"></i></a>
                                                    </span>
                                                    </div>
                                                </li>
                                            @endif

                                        </ul>
                                    </div>
                                    <div class="col-md">
                                        <h5>{{ $asignado->document->titulo }}</h5>
                                        <p>{{ $asignado->document->created_at->format('d, M Y') }}</p>
                                        <p>{{ $asignado->document->origen }} / {{ $asignado->document->destino }}</p>
                                        <p>{{ $asignado->document->asunto }}</p>
                                        <p>
                                            @if ($asignado->document->estado == 'pendiente')
                                                <h5><span class="badge badge-warning">{{ ucfirst($asignado->document->estado) }}</span></h5>
                                            @else
                                                <h5><span class="badge badge-success">{{ ucfirst($asignado->document->estado) }}</span></h5>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center justify-content-center flex-column">
                                        @can('documents.atender')
                                            <a href="#modalAtender" role="button" data-toggle="modal"  class="btn btn-block btn-outline-info btn-flat">
                                                <i class="fas file-medical-alt"></i>
                                                Atender
                                            </a>
                                        @endcan
                                    </div>

                                    <!-- modal atender -->
                                    @include('admin.documentos.atender', ['document' => $asignado->document])
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    @empty
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        No hay documentos asignados...!
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>

            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    {!! $assigns->links() !!}
                </div>
            </div>
        </div>

    </div>
    <!-- /.content -->
@endsection
