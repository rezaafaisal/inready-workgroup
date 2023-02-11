@extends('layouts.admin')
@section('body')
<div class="container">
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Petunjuk Teknis dan Petunjuk Lanjutan
                    <span class="d-block text-muted pt-2 font-size-sm">Data diurutkan berdasarkan yang terbaru</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('admin.ledger.juklis.create') }}" class="btn btn-primary font-weight-bolder">Tambah Data</a>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokumen</th>
                        <th>Dokumen</th>
                        <th>Periode Angkatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
</div>
<x-forms.delete action="{{ $data['destroy_route'] }}" />
@endsection
@section('scripts')
    <x-datatable-script />
    <script>
        $('#table').DataTable({
            responsive: true,
            lengthChange: true,
            processing: true,
            serverSide: true,
            oLanguage: {
                sZeroRecords: "Tidak Ada Data",
                sSearch: "Pencarian _INPUT_",
                sLengthMenu: "_MENU_",
                sInfo: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                sInfoEmpty: "0 data",
                oPaginate: {
                    sNext: "<i class='fa fa-angle-right'></i>",
                    sPrevious: "<i class='fa fa-angle-left'></i>"
                }
            },
            ajax: "{!! route('data.juklis') !!}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_Row_Index',
                    "className": "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name'
                },
                {
                    data: 'file'
                },
                {
                    data: 'generation'
                },
                {
                    data: 'status'
                },
                {
                    data: 'action'
                }
            ]
        })
    </script>
@endsection
