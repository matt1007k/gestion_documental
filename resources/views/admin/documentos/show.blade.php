@extends('admin.layout')
@section('title', 'Ver detalle de documento')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Administración de documentos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('tipos.index')}}">Todos los documentos</a></li>
                        <li class="breadcrumb-item active">Detalle de documento</li>
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detalle de documento</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">                            
                            <div class="row">
                                <div class="col-md-4 text-right"><strong>Código:</strong></div>
                                <div class="col-md">{{$document->cod_documento}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-right"><strong class="">Título:</strong></div>
                                <div class="col-md">{{$document->titulo}}</div>
                            </div>                            
                            <div class="row">
                                <div class="col-md-4 text-right"><strong>Tipo de documento:</strong></div>
                                <div class="col-md">{{$document->type->nombre}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-right"><strong>Origen:</strong></div>
                                <div class="col-md">{{$document->origen}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-right"><strong>Destino:</strong></div>
                                <div class="col-md">{{$document->destino}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-right"><strong>Asunto:</strong></div>
                                <div class="col-md">{{$document->asunto}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-right"><strong>Fecha de registro:</strong></div>
                                <div class="col-md">{{$document->created_at->format('m/d/Y')}}</div>
                            </div>                            
                            <div class="row">
                                <div class="col-md-4 text-right"><strong>Estado:</strong></div>
                                <div class="col-md">
                                    @if ($document->estado == "pendiente")
                                        <div class="badge badge-warning">{{ucfirst($document->estado)}}</div>
                                    @else
                                        <div class="badge badge-success">{{ucfirst($document->estado)}}</div>
                                    @endif
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-4 text-right"><strong>Documentos adjuntados:</strong></div>
                                <div class="col-md">
                                    <ul class="list-unstyled"> 
                                        @if ($document->documentos->count() > 0)
                                            @foreach ($document->documentos as $adjuntado)
                                            <li><i class="fa fa-check"></i> <a href="{{$adjuntado->archivo}}">{{$adjuntado->titulo}}</a></li>
                                            @endforeach
                                        @else
                                            <li><i class="fa fa-exclamation"></i> No tienes ningún documento adjuntado.</li>
                                        @endif                                       
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Archivo del Documento</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="mailbox-attachments clearfix">
                                        @if (explode(".", $document->archivo)[1] == "pdf")
                                            <li>
                                                <span class="mailbox-attachment-icon text-danger"><i class="far fa-file-pdf"></i></span>
                            
                                                <div class="mailbox-attachment-info">
                                                <a href="{{$document->archivo}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{explode("/", $document->archivo)[2]}}</a>
                                                    <span class="mailbox-attachment-size">
                                                        {{ number_format($sizeArchivo, 0, '', ',') }} KB
                                                        <a href="{{$document->archivo}}" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download-alt"></i></a>
                                                    </span>
                                                </div>
                                            </li> 
                                        @elseif (explode(".", $document->archivo)[1] == "docx" && "doc")
                                            <li>
                                                <span class="mailbox-attachment-icon text-primary"><i class="far fa-file-word"></i></span>
                            
                                                <div class="mailbox-attachment-info">
                                                <a href="{{$document->archivo}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{explode("/", $document->archivo)[2]}}</a>
                                                    <span class="mailbox-attachment-size">
                                                        {{ number_format($sizeArchivo, 0, '', ',') }} KB
                                                        <a href="{{$document->archivo}}" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download-alt"></i></a>
                                                    </span>
                                                </div>
                                            </li> 
                                        @else
                                            <li>
                                                <span class="mailbox-attachment-icon text-success"><i class="far fa-file-excel"></i></span>
                            
                                                <div class="mailbox-attachment-info">
                                                <a href="{{$document->archivo}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{explode("/", $document->archivo)[2]}}</a>
                                                    <span class="mailbox-attachment-size">
                                                        {{ number_format($sizeArchivo, 0, '', ',') }} KB
                                                        <a href="{{$document->archivo}}" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download-alt"></i></a>
                                                    </span>
                                                </div>
                                            </li> 
                                        @endif
                                            
                                    </ul>
                                </div> 
                            </div>                          
                        </div>

                       
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{route('documentos.index')}}" class="btn btn-danger">
                        <i class="fa fa-arrow-left"></i>
                        Regresar
                    </a>
                </div>
            </div>
        </div>

    </div>
    <!-- /.content -->
@endsection