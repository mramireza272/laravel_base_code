@extends('templates.master')

@section('titulo', 'Project')

@section('titulo_pagina', 'Usuarios')

@section('customcss')
@endsection

@section('content')
@if(session()->has('info'))
    <div class="panel-heading">
        <div class="alert alert-success">{{ session('info') }}
            <button class="close" data-dismiss="alert">
                <i class="pci-cross pci-circle"></i>
            </button>
        </div>
    </div>
@endif
@can('create_user')
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Crear usuario</a>
@endcan
<input type="text" id="search" name="search" placeholder="Buscar por nombre, apellido paterno, apellido materno, correo electrónico" class="form-control" value="{{ $search }}" autofocus autocomplete="off">
@endsection
@section('customjs')

<script>
    $(".delete").on('click', function(e){
    	e.preventDefault();
        var $form = $(this);
	    $('#confirm').modal({ backdrop: 'static', keyboard: false })
	        .on('click', '#delete-btn', function(){
	            $form.submit();
	    });
    });
</script>

@endsection



