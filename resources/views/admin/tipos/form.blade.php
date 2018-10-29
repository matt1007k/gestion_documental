
<div class="card-body">
    <div class="form-group">
        {{ Form::label('nombre', 'Tipo de documento')  }}
        {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese el tipo de documento'])  }}
    </div>
    <div class="form-group">
        {{ Form::label('descripcion', 'Descripción')  }}
        {{ Form::textarea('descripcion', null, ['class' => 'form-control', 'id' => 'descripcion', 'placeholder' => 'Ingrese la descripción', 'row' => '3'])  }}
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <div class="row">
        <div class="col-md-9">
            {{ Form::submit(isset($type) ? 'Editar' : 'Guardar', ['class' => 'btn btn-success'])  }}
        </div>
        <div class="col-md-3">
            <a href="{{route('tipos.index')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</div>
