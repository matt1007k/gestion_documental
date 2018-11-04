
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
                    <option selected="selected">Seleccione el tipo de documento</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}" {{  old('tipo', isset($document->type_id)) == $type->id ? 'selected' : '' }}>{{$type->nombre}}</option>
                    @endforeach
                </select>


            </div>
            <div class="form-group">
                {{ Form::label('titulo', 'Título del documento')  }}
                {{ Form::text('titulo', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese el titulo del documento'])  }}
                {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
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
                    <option selected="selected">Seleccione la oficina de origen</option>
                    @foreach($offices as $office)
                        <option value="{{$office->nombre}}"  {{  old('origen', isset($document->origen)) == $office->nombre ? 'selected' : '' }}>{{$office->nombre}}</option>
                    @endforeach
                </select>


            </div>

            <div class="form-group">
                {{ Form::label('destino', 'Destino')  }}
                <select class="form-control select2" name="destino" id="destino">
                    <option selected="selected">Seleccione la oficina de destino</option>
                    @foreach($offices as $office)
                        <option value="{{$office->nombre}}" {{  old('destino', isset($document->destino)) == $office->nombre ? 'selected' : '' }}>{{$office->nombre}}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                {{ Form::label('archivo', 'Archivo del documento') }}
                <div class="input-group input-file {{ $errors->has('archivo') }}" name="archivo">
                    <input type="text" class="form-control" placeholder='Elige un documento...' />
                    <span class="input-group-btn">
        		        <button class="btn btn-info btn-choose" type="button"><i class="fas fa-file-upload"></i></button>
    		        </span>
                </div>
                {!! $errors->first('archivo', '<div class="invalid-feedback">:message</div>') !!}
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
                        @if(isset($document))
                            <i class="fa fa-edit"></i> Editar
                        @else
                            <i class="fa fa-save"></i> Guardar
                        @endif
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



