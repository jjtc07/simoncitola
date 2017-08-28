@extends('layouts.base')

@section('contenido')	
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            <h1 class="">Listado de Usuarios</h1>
        </div>
    </div>

    @include('usuario._modal')
    @include('usuario._table', ['usuarios' => $usuarios])
@endsection

