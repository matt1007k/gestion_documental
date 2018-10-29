
<div class="card-body">
    <div class="form-group">
        {{ Form::label('nombre', 'Tipo de documento')  }}
        {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese el tipo de documento'])  }}
    </div>
    <div class="form-group">
        {{ Form::label('descripcion', 'Descripción')  }}
        {{ Form::textarea('descripcion', null, ['class' => 'form-control', 'id' => 'descripcion', 'placeholder' => 'Ingrese la descripción', 'size' => '20x5'])  }}
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <div class="row">
        <div class="col-md-9">
            <button type="submit" class="btn btn-success">
                @if(isset($type))
                    <i class="fa fa-edit"></i> Editar
                @else
                    <i class="fa fa-save"></i> Guardar
                @endif
            </button>
        </div>
        <div class="col-md-3">
            <a href="{{route('usuarios.index')}}" class="btn btn-danger">
                <i class="fas fa-ban"></i>
                Cancelar
            </a>
        </div>
    </div>
</div>
