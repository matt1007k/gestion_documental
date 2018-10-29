@if(session('info'))
    <div class="alert alert-success alert-dismissible mensaje animated fadeInDown">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fa fa-check"></i> Alerta!</h5>
        {{ session('info') }}
    </div>
@endif