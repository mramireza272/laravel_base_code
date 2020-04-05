@extends('templates.master')

@section('titulo')
	Project
@endsection

@section('titulo_pagina')
	Bitácora de sistema
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
    #example td {
        white-space:inherit;
    }
</style>
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/js/brands.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/js/all.js">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
@endsection

@section('customjs')
<script src="/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js "></script>
<script type="text/javascript">
var today = new Date();
var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date+' '+time;
    $(document).ready(function() {
        BindItemTable();
    });
    function BindItemTable() {
        myTable = $('#bitacora').DataTable({
            "destroy": true,
            "processing": true,
            "deferRender": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            "dom": 'lBfrtip',
            "buttons": [
                {
                    extend: 'excelHtml5',
                    title: 'Peso y Talla '+ date,
                    footer: true,
                    messageTop: 'Fecha de descarga '+ dateTime
                },
                {
                    extend: 'csvHtml5',
                    title: 'Peso y Talla '+ date,
                    footer: true,
                    messageTop: 'Fecha de descarga '+ dateTime
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Peso y Talla '+ date,
                    footer: true,
                    messageTop: 'Fecha de descarga '+ dateTime
                }
            ]
        });
    }
</script>
@endsection
@section('content')
<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group table-responsive">
                    <table id="bitacora" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>URL</th>
                                <th>Descripción</th>
                                <th>Modulo</th>
                                <th>Usuario</th>
                            </tr>
                        </thead>
                        <tbody id="data">
                            @foreach($logs as $item)
                                @php( $data = collect(json_decode($item->data)) )
                                <tr>
                                    <td>{{ $item->created_at->format('d-m-Y h:m A') }}</td>
                                    <td>{{ $data->pull('host') }}</td>
                                    <td>
                                        {{ $data->pull('type') }}
                                    </td>
                                    <td>
                                        {{ $data->pull('module') }}
                                    </td>
                                    <td>
                                        @php($user = \App\User::find($data->pull('user_id')))
                                        {{ (isset($user->name))?$user->name:'' }} {{ (isset($user->paterno))?$user->paterno:'' }} {{ (isset($user->materno))?$user->materno:'' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Fecha</th>
                                <th>URL</th>
                                <th>Descripción</th>
                                <th>Modulo</th>
                                <th>Usuario</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
&nbsp;
<br>
</br>
<br>
</br>
@endsection