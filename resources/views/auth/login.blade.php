@extends('layouts.app')

@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">Iniciar sesión</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
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
            <div class="row">
                <div class="col-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


        <p class="mb-1">
            <a href="{{ route('password.request') }}">Olvide mi contraseña</a>
        </p>
        <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center">Crear una cuenta</a>
        </p>
    </div>
@endsection
