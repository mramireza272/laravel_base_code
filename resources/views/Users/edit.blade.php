@extends('templates.master')

@section('titulo', 'ACH | Mesas Interinstitucionales')

@section('titulo_pagina', 'Editar Usuario')

@section('customcss')

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

@section('customcss')

@endsection
    <div class="row">
	    <div class="col-lg-12">
	        <div class="panel">
	        	@if(session()->has('info'))
		        	<div class="panel-heading">
			        	<div class="alert alert-success">{{ session('info') }}
			        		<button class="close" data-dismiss="alert">
                            	<i class="pci-cross pci-circle"></i>
                        	</button>
			        	</div>
				    </div>
			    @endif
	        	<form method="POST" action="{{ route('usuarios.update', $user->id) }}" enctype="multipart/form-data" class="panel-body form-horizontal form-padding">
	                  {!! method_field('PUT') !!}
	                  <input type="hidden" name="initial" value="false">
	                  <input type="hidden" name="created_by" value="{{ $user->created_by }}">
	                  @include('Users.form')
				</form>
			</div>
	    </div>
	</div>
@endsection