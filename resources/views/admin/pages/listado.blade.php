@extends('admin.layout')
@section('title', 'Lista de documentos')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Todos los documentos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Todos los documentos</li>
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
                            <h3 class="card-title">Resultado de la búsqueda</h3>                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    @foreach ($documents as $document)
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">                             
                            <div class="row">
                                <div class="col-md-2">
                                    <ul class="list-unstyled clearfix">
                                        <?php
                                            $pathArchivo = str_replace('storage','public',$document->archivo);
                                            $sizeArchivo = Storage::size($pathArchivo) / 1024;
                                                                                     
                                        ?>
                                        @if (explode(".", $document->archivo)[1] == "pdf")
                                            <li>
                                                <span class="box-attachment-icon no-padding text-danger"><i class="far fa-file-pdf"></i></span>
                            
                                                <div class="box-attachment-info">
                                                <a href="{{$document->archivo}}" class="box-attachment-name"><i class="fa fa-paperclip"></i> {{explode("/", $document->archivo)[2]}}</a>
                                                    <span class="box-attachment-size">
                                                        {{ number_format($sizeArchivo, 0, '', ',') }} KB
                                                        <a href="{{$document->archivo}}" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download-alt"></i></a>
                                                    </span>
                                                </div>
                                            </li> 
                                        @elseif (explode(".", $document->archivo)[1] == "docx" && "doc")
                                            <li>
                                                <span class="box-attachment-icon text-primary"><i class="far fa-file-word"></i></span>
                            
                                                <div class="box-attachment-info">
                                                <a href="{{$document->archivo}}" class="box-attachment-name"><i class="fa fa-paperclip"></i> {{explode("/", $document->archivo)[2]}}</a>
                                                    <span class="box-attachment-size">
                                                        {{ number_format($sizeArchivo, 0, '', ',') }} KB
                                                        <a href="{{$document->archivo}}" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download-alt"></i></a>
                                                    </span>
                                                </div>
                                            </li> 
                                        @else
                                            <li>
                                                <span class="box-attachment-icon text-success"><i class="far fa-file-excel"></i></span>
                            
                                                <div class="box-attachment-info">
                                                <a href="{{$document->archivo}}" class="box-attachment-name"><i class="fa fa-paperclip"></i> {{explode("/", $document->archivo)[2]}}</a>
                                                    <span class="box-attachment-size">
                                                        {{ number_format($sizeArchivo, 0, '', ',') }} KB
                                                        <a href="{{$document->archivo}}" class="btn btn-default btn-sm float-right"><i class="fa fa-cloud-download-alt"></i></a>
                                                    </span>
                                                </div>
                                            </li> 
                                        @endif
                                            
                                    </ul>    
                                </div>
                                <div class="col-md">
                                    <h5>{{ $document->titulo }}</h5>
                                    <p>{{ $document->created_at->format('d, M Y') }}</p>
                                    <p>{{ $document->origen }} / {{ $document->destino }}</p>
                                    <p>{{ $document->asunto }}</p>
                                    <p>
                                        @if ($document->estado == 'pendiente')
                                            <h5><span class="badge badge-warning">{{ ucfirst($document->estado) }}</span></h5>
                                        @else
                                            <h5><span class="badge badge-success">{{ ucfirst($document->estado) }}</span></h5>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-2 d-flex align-items-center justify-content-center flex-column">
                                    @if ($document->estado == 'pendiente')
                                        <a href="{{ route('documento.asignar', $document->id) }} " class="btn btn-block btn-outline-info btn-flat">
                                            <i class="fas fa-file-signature"></i>
                                            Asignar
                                        </a>
                                        <a href="{{ route('documento.emitir', $document->id) }} " class="btn btn-block btn-outline-primary btn-flat">
                                            <i class="fas fa-file-export"></i>
                                            Enviar
                                        </a>
                                    @else                                        
                                        <a href="{{ route('documento.emitir', $document->id) }} " class="btn btn-block btn-outline-primary btn-flat">
                                            <i class="fas fa-file-export"></i>
                                            Enviar
                                        </a>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    @endforeach 
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    {!! $documents->links() !!}
                </div>
            </div>
        </div>

    </div>
    <!-- /.content -->
@endsection
