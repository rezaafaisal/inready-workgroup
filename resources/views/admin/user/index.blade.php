@extends('layouts.admin')
@section('body')
<div class="container">
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Data Pengguna
                    <span class="d-block text-muted pt-2 font-size-sm">Data diurutkan berdasarkan yang
                        terbaru</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                </div>
                <!--end::Dropdown-->
                <!--begin::Button-->
                <div class="d-flex" style="gap:10px">
                    <button class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#import">Import
                        Data</button>
                    <a href="{{ route('admin.pengguna.create') }}" class="btn btn-primary font-weight-bolder">Tambah
                        Data</a>

                </div>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Angkatan</th>
                        <th>Whatsapp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
</div>

{{-- import modal --}}
<x-modal target="import" title="Import Pengguna dari Spreadsheet">
    <form id="import_form" action="{{ route('admin.pengguna.import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" placeholder="Pilih gambar artikel">
                <label class="custom-file-label" for="file">Pilih File</label>
                @error('file')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <span>
                Unduh contoh template spreadsheet, <a href="{{ asset('document/template.xlsx') }}" class="font-weight-bold" download="">Disini</a>
            </span>
        </div>
    </form>
</x-modal>

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
            ajax: "{!! route('data.user') !!}",
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
                    data: 'username'
                },
                {
                    data: 'generation'
                },
                {
                    data: 'whatsapp'
                },
                {
                    data: 'action'
                }
            ]
        })
    })
</script>
<script>

    $('#submit_modal_import').click(()=>{
        $('#import_form').submit();
    })
    
    function delete_data(data) {
        const input = $('#delete_form input[name="id"]');
        Swal.fire({
            icon: 'warning',
            title: 'Yakin Hapus?',
            text: 'Data '+data.name+' akan dihapus permanen',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#F64E60',
            cancelButtonColor: '#1BC5BD',
            reverseButtons: true
        }).then((e) => {
            if (e.isConfirmed) {
                input.val(data.id);
                $('#delete_form').submit()
            }
        })
    }
</script>
@endsection
