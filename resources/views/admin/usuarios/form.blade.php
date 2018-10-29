
<div class="card-body">
    <div class="form-group">
        {{ Form::label('name', 'Nombre')  }}
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese la nombre del usuario'])  }}
    </div>
    <div class="form-group">
        {{ Form::label('apellidos', 'Apellidos')  }}
        {{ Form::text('apellidos', null, ['class' => 'form-control', 'id' => 'apellidos', 'placeholder' => 'Ingrese los apellidos'])  }}
    </div>
    <hr>
    <h3>Lista de Roles</h3>
    <div class="form-group">
        <ul class="list-unstyled">
            @foreach($roles as $role)
                <li>
                    <label>
                        {{ Form::checkbox('roles[]', $role->id, null)  }}
                        {{ $role->name }}
                        <em>({{$role->description ?: 'Sin descripción'}})</em>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <div class="row">
        <div class="col-md-9">
            <button type="submit" class="btn btn-success">
                @if(isset($user))
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
