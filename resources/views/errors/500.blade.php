<?php
@extends('layouts.errors')
@section('title', 'error 403')
@section('content')
    <div class="errors-page">
        <h2 class="headline text-danger">500</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-danger"></i> Oops! Hubo un error en el servidor.</h3>

            <p class="error-content">
                Comuniquese con el administrador del sistema para resolver el problema.
                <a href="{{route('admin')}}" class="btn btn-secondary">
                    <i class="fa fa-home"></i>
                    Regresar al dashboard
                </a>
            </p>


        </div>
    </div>
    <!-- /.error-page -->
@endsection

