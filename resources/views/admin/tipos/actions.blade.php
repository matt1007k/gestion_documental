<a href="{{route('tipos.show', $id)}}" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="Ver detalle">
    <i class="fa fa-eye"></i>
</a>
<a href="{{route('tipos.edit', $id)}}" class="btn btn-outline-info btn-sm" data-toggle="tooltip" title="Editar">
    <i class="fa fa-edit"></i>
</a>
<a href="#" data-remote="{{route('tipos.destroy', $id)}}" class="btn btn-outline-danger btn-sm btn-delete" data-toggle="tooltip" title="Eliminar">
    <i class="fa fa-trash-alt"></i>
</a>
