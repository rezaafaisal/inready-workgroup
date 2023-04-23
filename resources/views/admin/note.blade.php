@extends('layouts.admin')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Tulisan UI Dalam Aplikasi
                                <span class="d-block text-muted pt-2 font-size-sm">Data diurutkan berdasarkan yang
                                    terbaru</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <button id="createConfirm" class="btn btn-primary font-weight-bolder">Tambah Tulisan</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom table-checkable" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Catatan</th>
                                    <th>Isi Catatan</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <x-datatable-script />
    <script>
        $(document).ready(function () {
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
            ajax: "{!! route('data.note') !!}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_Row_Index',
                    "className": "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'type'
                },
                {
                    data: 'body'
                },
                {
                    data: 'description'
                },
                {
                    data: 'action'
                }
            ]
        })
        })

    </script>
@endsection