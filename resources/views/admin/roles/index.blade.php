@extends('admin.layout')
@section('title', 'Lista de roles')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Administración de roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Todos los roles</li>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md">
                                    <h3 class="card-title">Lista de roles</h3>
                                </div>
                                <div class="col-md-2">
                                    @can('roles.create')
                                        <a href="{{route('roles.create')}}" class="btn btn-success btn-sm pull-right">
                                            <i class="fa fa-plus"></i> Agregar role
                                        </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table-roles" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th></th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

    </div>
    <!-- /.content -->
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush

@push('script')
    <!-- DataTables -->
    <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables/dataTables.bootstrap4.js')}}"></script>

    <script>
          $(document).ready(function () {
              $("#table-roles").DataTable({
                  "serverSide": true,
                  "ajax": "{{ url('api/roles') }}",
                  "columns": [
                      {data: 'id'},
                      {data: 'name'},
                      {data: 'description'},
                      {data: 'btn'},
                  ],
                  language: {
                      "sProcessing":     "Procesando...",
                      "sLengthMenu":     "Mostrar _MENU_ registros",
                      "sZeroRecords":    "No se encontraron resultados",
                      "sEmptyTable":     "Ningún dato disponible en esta tabla",
                      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                      "sInfoPostFix":    "",
                      "sSearch":         "Buscar:",
                      "sUrl":            "",
                      "sInfoThousands":  ",",
                      "sLoadingRecords": "Cargando...",
                      "oPaginate": {
                          "sFirst":    "Primero",
                          "sLast":     "Último",
                          "sNext":     "Siguiente",
                          "sPrevious": "Anterior"
                      },
                      "oAria": {
                          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                      }
                  }
              });

              $("#table-roles").on('click', '.btn-delete[data-remote]', function (e) {
                  e.preventDefault();
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  var url = $(this).data('remote');
                  // confirm then
                  window.swal({
                      title: '¿Estás seguro de eliminar el registro?',
                      text: "No podrás revertir esta acción!",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Si, eliminar!'
                  }).then((result) => {
                      if (result.value) {
                          $.ajax({
                              url: url,
                              type: 'DELETE',
                              dataType: 'json',
                              data: {method: '_DELETE', submit: true}
                          }).always(function (data) {
                              $('#table-roles').DataTable().draw(false);
                              swal(
                                  'Eliminado!',
                                  'El registro ha sido eliminado.',
                                  'success'
                              )


                          });

                      }
                  })
              });

              $('#table-roles').on('draw.dt', function() {
                  $('[data-toggle="tooltip"]').tooltip();
              })
          });

    </script>

@endpush