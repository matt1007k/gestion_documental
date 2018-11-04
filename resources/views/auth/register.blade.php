@extends('layouts.app')
@section('title', 'Registrarse')
@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">Crear Cuenta</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-group mb-3">
                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required placeholder="Ingrese su nombre">
                <div class="input-group-append">
                    <span class="fa fa-user input-group-text"></span>
                </div>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos" value="{{ old('apellidos') }}" required placeholder="Ingrese sus apellidos">
                <div class="input-group-append">
                    <span class="fa fa-user input-group-text"></span>
                </div>
                @if ($errors->has('apellidos'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('apellidos') }}</strong>
                    </span>
                @endif
            </div>

            <div class="input-group mb-3">
                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Ingrese su correo electrónico">
                <div class="input-group-append">
                    <span class="fa fa-envelope input-group-text"></span>
                </div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Ingrese su contraseña">
                <div class="input-group-append">
                    <i class="fa fa-lock input-group-text"></i>
                </div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
            </div>

            <div class="input-group mb-3">
                <input type="password" class="form-control" name="password_confirmation" required placeholder="Repita su contraseña">
                <div class="input-group-append">
                    <i class="fa fa-lock input-group-text"></i>
                </div>
            </div>

            <div class="row">
                <div class="col-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="terminos" id="terminos"> <a href="#"> Terminos y Condiciones</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
                </div>
                <!-- /.col -->
            </div>
        </form>



        <p class="mb-0">
            <a href="{{ route('login') }}" class="text-center">Ya tengo una cuenta</a>
        </p>
    </div>

@endsection



