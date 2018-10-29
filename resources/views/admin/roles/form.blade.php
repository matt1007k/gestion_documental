
<div class="card-body">
    <div class="form-group">
        {{ Form::label('name', 'Nombre')  }}
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Ingrese la nombre del rol'])  }}
    </div>
    <div class="form-group">
        {{ Form::label('slug', 'URL Amigable')  }}
        {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug', 'placeholder' => 'Ingrese el slug del rol'])  }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Descripción')  }}
        {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Ingrese la descripción del rol', 'size' => '20x5'])  }}
    </div>
    <hr>
    <h3>Permiso especial</h3>
    <div class="from-group">
        <label>{{ Form::radio('special', 'all-access') }} Acceso total</label>
        <label>{{ Form::radio('special', 'no-access') }} Ningun acceso</label>
    </div>

    <hr>
    <h3>Lista de Permisos</h3>
    <div class="form-group">
        <ul class="list-unstyled">
            @foreach($permissions as $permission)
                <li>
                    <label>
                        {{ Form::checkbox('permissions[]', $permission->id, null)  }}
                        {{ $permission->name }}
                        <em>({{$permission->description ?: 'Sin descripción'}})</em>
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
                @if(isset($role))
                    <i class="fa fa-edit"></i> Editar
                @else
                    <i class="fa fa-save"></i> Guardar
                @endif
            </button>

        </div>
        <div class="col-md-3">
            <a href="{{route('roles.index')}}" class="btn btn-danger">
                <i class="fas fa-ban"></i>
                Cancelar
            </a>
        </div>
    </div>
</div>
