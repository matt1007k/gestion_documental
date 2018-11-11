
<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            @if (isset($document))  
                <div class="form-group"> 
                    {{ Form::label('documento', 'El documento a enviar')  }}
                    <p>{{$document->titulo}}</p>
                    {{ Form::hidden('documento', $document->id, ['id' => 'documento']  ) }}             
                </div>
                <div class="form-group">
                    {{ Form::label('oficina', 'La Oficina a enviar')  }}
                    <select class="form-control select2 {{ $errors->has('oficina') ? 'is-invalid' : ''}}" name="oficina" id="oficina">
                        <option value=" " selected="selected">Seleccione la oficina a enviar</option>
                        @foreach($offices as $office)
                            <option value="{{$office->id}}" {{  old('oficina') == $office->id ? 'selected' : '' }}>{{$office->nombre}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('oficina', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            @else
                <div class="form-group">
                    {{ Form::label('documento', 'El documento a enviar')  }}
                    <select class="form-control select2 {{ $errors->has('documento') ? 'is-invalid' : ''}}" name="documento" id="documento">
                        <option value="" selected="selected">Seleccione el documento</option>
                        @foreach($documents as $documento)
                            <option value="{{$documento->id}}" {{  old('documento', isset($document->id)) == $documento->id ? 'selected' : '' }}>{{$documento->titulo}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('documento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
    
                <div class="form-group">
                    {{ Form::label('oficina', 'La oficina a enviar')  }}
                    <select class="form-control select2 {{ $errors->has('oficina') ? 'is-invalid' : ''}}" name="oficina" id="oficina">
                        <option value="" selected="selected">Seleccione la oficina a enviar</option>
                        @foreach($offices as $office)
                            <option value="{{$office->id}}" {{  old('oficina') == $office->id ? 'selected' : '' }}>{{$office->nombre}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('oficina', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('observacion', 'Observacion')  }}
                <textarea name="observacion" id="observacion" 
                        class="form-control {{ $errors->has('observacion') ? 'is-invalid' : '' }}" 
                        cols="30" rows="5" placeholder="Ingrese una observación">{{ old('observacion') }}</textarea>
                {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
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
                        <i class="fas fa-file-export"></i>
                        Enviar
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



