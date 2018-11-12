@php
    $offices = \App\Office::orderBy('nombre', 'ASC')->get();
    $types = \App\Type::orderBy('nombre', 'ASC')->get();
@endphp

<div class="modal" id="modalFiltro" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="GET" action="{{route('documentos.listado')}}">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Búsqueda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-4" id="result">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Búsqueda general</h5>
                            <div class="form-group">   
                                <input class="form-control" type="search" name="texto" placeholder="Que estás buscando...">
                            </div>
                            <hr>
                            <div class="text-center">O</div>
                            <h5><i class="fas fa-filter"></i> Filtros de búsqueda</h5>
                            <div class="form-group"> 
                                <label for="search">Por título del documento</label>    
                                <input class="form-control" type="search" name="titulo" placeholder="Buscar por título">
                            </div>
                            <div class="form-group"> 
                                <label for="asunto">Por asunto del documento</label>    
                                <input class="form-control" type="search" name="asunto" placeholder="Buscar por asunto de documento">
                            </div>

                            <div class="form-group"> 
                                <label for="origen">Por origen de oficina</label>    
                                <select name="origen" id="origen" class="form-control">
                                    <option value="">Seleccionar origen</option>
                                    @isset($offices)
                                        @foreach($offices as $office)
                                            <option value="{{$office->nombre}}">{{$office->nombre}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="form-group"> 
                                <label for="destino">Por destino de oficina</label>    
                                <select name="destino" id="destino" class="form-control">
                                    <option value="">Seleccionar destino</option>
                                    @isset($offices)
                                        @foreach($offices as $office)
                                            <option value="{{$office->nombre}}">{{$office->nombre}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label for="fecha">Por rango de fecha</label>    
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="date" name="fecha1" id="fecha1" class="form-control">
                                    </div>                                       
                                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                                        a
                                    </div>
                                    <div class="col-md-12">
                                        <input type="date" name="fecha2" id="fecha2" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label for="tipo">Por tipo del documento</label>    
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="">Seleccionar tipo</option>
                                    @isset($types)
                                        @foreach($types as $type)
                                            <option value="{{$type->nombre}}">{{$type->nombre}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="form-group"> 
                                <label for="estado">Por estado del documento</label>    
                                <select name="estado" id="estado" class="form-control">
                                    <option value="">Seleccionar estado</option>
                                    <option value="pendiente">Pendiente</option>
                                    <option value="atendido">Atendido</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Buscar</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
</div>