@extends('templates.master')

@section('titulo')
	Project
@endsection

@section('titulo_pagina')
	Roles
@endsection
@section('customcss')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="/plugins/datatables/media/css/dataTables.bootstrap.min.css">
<link href="/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css">
<link href="/plugins/datatables/extensions/Buttons/css/buttons.dataTables.min.css">
<style>
    table td {
        word-wrap: break-word;
        max-width: 400px;
    }
    #table td {
        white-space:inherit;
    }
</style>
@endsection

@section('customjs')
<script src="/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js "></script>
<script type="text/javascript">
var today = new Date();
var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+' '+time;
$(document).ready(function(){
    BindItemTable();
    $("#table").on('click', '.delete', function(e){
        e.preventDefault();
        var $form = $(this);
        $('#confirm').modal({ backdrop: 'static', keyboard: false })
            .on('click', '#delete-btn', function(){
                $form.submit();
        });
    });
});
function BindItemTable() {
    $('#table').DataTable({
      "destroy": true,
      "responsive": true,
      "processing": true,
      "deferRender": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "order": [[ 1, "desc" ]],
      "info": true,
      "autoWidth": true,
      "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
      },
      "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
      "dom": 'lBfrtip',
      "buttons": [
          {
              extend: 'excelHtml5',
              title: 'Dependencias '+ date,
              footer: true,
              messageTop: 'Fecha de descarga '+ dateTime,
              exportOptions: {
                  columns: [ 0, 1]
              }
          },
          {
              extend: 'csvHtml5',
              title: 'Dependencias '+ date,
              footer: true,
              messageTop: 'Fecha de descarga '+ dateTime,
              exportOptions: {
                  columns: [ 0, 1]
              }
          },
          {
              extend: 'pdfHtml5',
              title: 'Dependencias '+ date,
              footer: true,
              messageTop: 'Fecha de descarga '+ dateTime,
              exportOptions: {
                  columns: [ 0, 1]
              }
          }
      ]
  	});
}
</script>
@endsection
@section('content')
<div class="panel">
    <div class="panel-body">
        @can('create_roles')
        <a href="{{ route('roles.create') }}" class="btn btn-primary">
            Nuevo Rol
        </a>
        @endcan
		<div class="row">
            <div class="table-responsive">
                <table id="table" class="display table table-hover table-vcenter" style="width:100%" >
                    <thead>
                        <tr>
                            <th></th>
			    			<th>Rol</th>
			    			<th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
			                <tr>
			                    <td>{{ $role->id }}</td>
			                    <td>{{ $role->name }}</td>
			                    <td>
			                        @can('show_roles')
			                            <a href="{{ route('roles.show', $role->id)}}" class="btn btn-sm btn-primary">
			                                Ver
			                            </a>
			                        @endcan
			                        @can('edit_roles')
			                            <a href="{{ route('roles.edit', $role->id)}}" class="btn btn-sm btn-warning">
			                                Editar
			                            </a>
			                        @endcan
			                        @can('delete_roles')
			                            <form action="{{ route('roles.destroy', $role->id) }}"
				        					  style="display: inline;" method="POST" class="delete">
				        					{!! method_field('DELETE') !!}
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
					        				<button title="Eliminar" class="btn btn-sm btn-danger">
					        					Eliminar
					        				</button>
					        			</form>
			                        @endcan
			                    </td>
			                </tr>
		                @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
			    			<th>Rol</th>
			    			<th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="confirm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" style="text-align: center;">Atención</h4>
            </div>
            <div class="modal-body" style="text-align: center;">
                <p>¿Está seguro(a) de eliminar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-sm btn-danger" id="delete-btn">Eliminar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endsection