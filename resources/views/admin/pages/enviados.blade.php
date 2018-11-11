@extends('admin.layout')
@section('title', 'Documentos enviados')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Todos los documentos enviados</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Documentos enviados</li>
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
                            <h3 class="card-title">Documentos enviados</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    @forelse($emisions as $emision)
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <ul class="list-unstyled clearfix">
                                            <?php
                                            $pathArchivo = str_replace('storage','public',$emision->document->archivo);
                                            $sizeArchivo = Storage::size($pathArchivo) / 1024;

                                            ?>
                                            @if (explode(".", $emision->document->archivo)[1] == "pdf")
                                                <li>
                                                    <span class="box-attachment-icon no-padding text-danger"><i class="far fa-file-pdf"></i></span>

                                                    <div class="box-attachment-info">
                                                        <a href="{{$emision->document->archivo}}" class="box-attachment-name"><i class="fa fa-paperclip"></i> {{explode("/", $emision->document->archivo)[2]}}</a>
                                                        <span class="box-attachment-size">
                                                        {{ number_format($sizeArchivo, 0, '', ',') }} KB
                                                        <a href="{{$emision->document->archivo}}" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download-alt"></i></a>
                                                    </span>
                                                    </div>
                                                </li>
                                            @elseif (explode(".", $emision->document->archivo)[1] == "docx" && "doc")
                                                <li>
                                                    <span class="box-attachment-icon text-primary"><i class="far fa-file-word"></i></span>

                                                    <div class="box-attachment-info">
                                                        <a href="{{$emision->document->archivo}}" class="box-attachment-name"><i class="fa fa-paperclip"></i> {{explode("/", $emision->document->archivo)[2]}}</a>
                                                        <span class="box-attachment-size">
                                                        {{ number_format($sizeArchivo, 0, '', ',') }} KB
                                                        <a href="{{$emision->document->archivo}}" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download-alt"></i></a>
                                                    </span>
                                                    </div>
                                                </li>
                                            @else
                                                <li>
                                                    <span class="box-attachment-icon text-success"><i class="far fa-file-excel"></i></span>

                                                    <div class="box-attachment-info">
                                                        <a href="{{$emision->document->archivo}}" class="box-attachment-name"><i class="fa fa-paperclip"></i> {{explode("/", $emision->document->archivo)[2]}}</a>
                                                        <span class="box-attachment-size">
                                                        {{ number_format($sizeArchivo, 0, '', ',') }} KB
                                                        <a href="{{$emision->document->archivo}}" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download-alt"></i></a>
                                                    </span>
                                                    </div>
                                                </li>
                                            @endif

                                        </ul>
                                    </div>
                                    <div class="col-md">
                                        <h5>{{ $emision->document->titulo }}</h5>
                                        <p>{{ $emision->document->created_at->format('d, M Y') }}</p>
                                        <p>{{ $emision->document->origen }} / {{ $emision->document->destino }}</p>
                                        <p>{{ $emision->document->asunto }}</p>
                                        <p>
                                            @if ($emision->document->estado == 'pendiente')
                                                <h5><span class="badge badge-warning">{{ ucfirst($emision->document->estado) }}</span></h5>
                                            @else
                                                <h5><span class="badge badge-success">{{ ucfirst($emision->document->estado) }}</span></h5>
                                            @endif
                                        </p>
                                    </div>
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
                                        No hay documentos enviados...!
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>

            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    {!! $emisions->links() !!}
                </div>
            </div>
        </div>

    </div>
    <!-- /.content -->
@endsection
