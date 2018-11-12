@extends('admin.layout')
@section('title', 'Elaborar documento')
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
                        <li class="breadcrumb-item active">Elaborar documento</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Elaborar documento</h3>
                        </div>
                        <!-- /.card-header -->
                        @include('admin.partials.errors')
                        <!-- form start -->
                        {!! Form::open(['route' => 'documento.elaborado']) !!}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('cod_documento', 'Código del documento')  }}
                                        {{ Form::text('cod_documento', null, ['class' => 'form-control', 'id' => 'cod_documento', 'placeholder' => 'Ingrese el código del documento'])  }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('tipo', 'Tipo de documento')  }}
                                        <select class="form-control select2" name="tipo" id="tipo">
                                            <option value="" selected="selected">Seleccione el tipo de documento</option>
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}" {{  old('tipo', isset($document->type_id)) == $type->id ? 'selected' : '' }}>{{$type->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('titulo', 'Título del documento')  }}
                                        {{ Form::text('titulo', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese el titulo del documento'])  }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('asunto', 'Asunto')  }}
                                        {{ Form::textarea('asunto', null, ['class' => 'form-control', 'id' => 'asunto', 'placeholder' => 'Ingrese el asunto', 'size' => '20x5'])  }}
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        {{ Form::label('origen', 'Origen')  }}
                                        <select class="form-control select2" name="origen" id="origen">
                                            <option value="" selected="selected">Seleccione la oficina de origen</option>
                                            @foreach($offices as $office)
                                                <option value="{{$office->nombre}}"  {{  old('origen', isset($document->origen)) == $office->nombre ? 'selected' : '' }}>{{$office->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('destino', 'Destino')  }}
                                        <select class="form-control select2" name="destino" id="destino">
                                            <option value="" selected="selected">Seleccione la oficina de destino</option>
                                            @foreach($offices as $office)
                                                <option value="{{$office->nombre}}" {{  old('destino', isset($document->destino)) == $office->nombre ? 'selected' : '' }}>{{$office->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group ">
                                        {{ Form::label('documentos', 'Adjuntar Documento')  }}
                                        <select class="form-control select2" multiple="multiple" name="documentos[]" data-placeholder="Seleccione los documentos">
                                            @if($documents->count() > 0)
                                                @foreach($documents as $documento)
                                                    <option
                                                            value="{{$documento->id}}"
                                                            {{ collect(old('documentos', isset($document) ? $document->documentos->pluck('id') : ''))->contains($documento->id) ? 'selected' : '' }}
                                                    >
                                                        {{$documento->titulo}}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option disabled>No hay documento registrados!</option>
                                            @endif
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-save"></i> Elaborar
                                            </button>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="{{route('documentos.index')}}" class="btn btn-danger">
                                                <i class="fas fa-ban"></i>
                                                Cancelar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('script')
    <script src="{{asset('adminlte/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        })

    </script>
@endpush