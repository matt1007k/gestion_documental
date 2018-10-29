@if ($errors->any())
    <div class="errors-data">
        <div class="alert alert-danger no-margin">
            <h5>!Oops {{$errors->count() > 1 ? $errors->count(). ' errores' : $errors->count().' error'}} al realizar está operación:</h5>
            <ul class="no-margin">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif