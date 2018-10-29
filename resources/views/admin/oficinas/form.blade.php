
<div class="card-body">
    <div class="form-group">
        {{ Form::label('nombre', 'Oficina')  }}
        {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese la nombre del área'])  }}
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
            {{ Form::submit(isset($office) ? 'Editar' : 'Guardar', ['class' => 'btn btn-success'])  }}
        </div>
        <div class="col-md-3">
            <a href="{{route('oficinas.index')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</div>
