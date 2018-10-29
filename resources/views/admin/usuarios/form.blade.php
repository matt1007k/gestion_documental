
<div class="card-body">
    <div class="form-group">
        {{ Form::label('name', 'Nombre')  }}
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese la nombre del usuario'])  }}
    </div>
    <div class="form-group">
        {{ Form::label('apellidos', 'Apellidos')  }}
        {{ Form::text('apellidos', null, ['class' => 'form-control', 'id' => 'apellidos', 'placeholder' => 'Ingrese los apellidos'])  }}
    </div>
    <div class="form-group">
        {{ Form::label('direccion', 'Dirección')  }}
        {{ Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion', 'placeholder' => 'Ingrese la dirección del usuario'])  }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Correo Electrónico')  }}
        {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Ingrese el correo electrónico'])  }}
    </div>
    <div class="form-group">
        {{ Form::label('dni', 'El dni')  }}
        {{ Form::number('dni', null, ['class' => 'form-control', 'id' => 'dni', 'placeholder' => 'Ingrese el dni del usuario'])  }}
    </div>

    <div class="form-group">
        {{ Form::label('avatar', 'El avatar o imagen')  }}
        {{ Form::file('avatar', null, ['class' => 'form-control', 'id' => 'avatar', 'placeholder' => 'Ingrese el avatar o imagen del usuario'])  }}
    </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <div class="row">
        <div class="col-md-9">
            {{ Form::submit(isset($user) ? 'Editar' : 'Guardar', ['class' => 'btn btn-success'])  }}
        </div>
        <div class="col-md-3">
            <a href="{{route('usuarios.index')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</div>
