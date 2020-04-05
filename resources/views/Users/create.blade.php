@extends('templates.master')
@section('titulo')Project
@endsection
@section('titulo_pagina', 'Nuevo Usuario')
@section('customcss')
<link href="/plugins/select2/css/select2.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/untitled.css">
<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/bootstrap/css/footer-dark.css">
<link rel="stylesheet" href="/assets/bootstrap/css/cssdos/bootstrap.min.css">
@endsection
@section('customjs')

<script type="text/javascript">
	$(document).ready(function() {
		$('.select2').select2({
	        placeholder: "Selecciona una opción",
	        allowClear: true,
	        language: 'es'
	    });
	});
</script>
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
<div class="row">
    <div class="col-lg-12">

            <div class="card shadow-lg o-hidden border-0 my-5">

                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-flex" style="padding-left: 0px;">
                           <div class="flex-grow-1 bg-register-image" style="background-image: url(/assets/img/03mexico.png); width: 100%; height: 1050px;"></div>
                        </div>
                        <div class="col-lg-7 text-center align-self-center">

                            <div class="p-5">
                                <div class="text-center profile-card" style="margin:55px; background-color:transparent;">
                                    <div><img class="rounded-circle" style="margin-top: -43px;width: 120px;height: 120px;" src="\assets\img\gente.png" height="150px"></div>
                                </div>
                                <div class="text-center">
                                    <h4 class="text-dark mb-4" style="font-size: 33px;">Agregar Usuario</h4>
                                </div>
            <div class="row">
                <div class="col-lg-12">
                                    <form method="POST" action="{{ route('usuarios.store') }}" enctype="multipart/form-data" class="user">
                                    	 	<input type="hidden" name="created_by" value="{{auth()->user()->id}}">
        	                 				@php($default = true)
        	                 				@include('Users.form', ['user' => new App\User])
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
