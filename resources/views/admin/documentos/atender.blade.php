<div class="modal" id="modalAtender" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form method="POST" action="{{route('documento.atendido')}}">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atender documento: </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <p>"{{ $document->titulo  }}"</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="documento" value="{{$document->id}}">
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado del documento</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="">Seleccionar estado</option>
                                    <option value="pendiente" {{ $document->estado == 'pendiente' ? 'selected' : ''  }}>Pendiente</option>
                                    <option value="atendido" {{ $document->estado == 'atendido' ? 'selected' : ''  }}>Atendido</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Atender</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>