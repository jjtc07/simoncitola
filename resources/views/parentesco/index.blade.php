@extends('layouts.base')

@section('contenido')	
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            <h1 class="">Listado de Parentescos</h1>
        </div>
    </div>

    @include('parentesco._modal')
    @include('parentesco._table', ['parentescos' => $parentescos])
@endsection

