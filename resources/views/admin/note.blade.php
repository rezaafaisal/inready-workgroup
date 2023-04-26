@extends('layouts.admin')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
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
                            <button id="create" data-toggle="modal" data-target="#create_note" class="btn btn-primary font-weight-bolder">Tambah Tulisan</button>
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

    {{-- modal --}}
    <x-modal-large target="create_note" title="Tambahkan Catatan dalam Aplikasi">
        <form id="create_note_form" action="{{ route('admin.note.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="type" class="form-label">Jenis Catatan</label>
                        <input type="text" name="type" id="type" class="form-control font-lowercase @error('type') is-invalid @enderror">
                        @error('type')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Deskripsi (tidak wajib)</label>
                        <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="body" class="form-label">Catatan</label>
                        <textarea id="summernote" name="body" class="summernote form-control @error('body') is-invalid @enderror">
                            {{ old('body') ?? '' }}
                        </textarea>
                    </div>
                </div>
            </div>
        </form>
    </x-modal-large>

    <x-modal-large target="edit_note" title="Tambahkan Catatan dalam Aplikasi">
        <form id="edit_note_form" action="{{ route('admin.note.update') }}" method="post">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="type" class="form-label">Jenis Catatan</label>
                        <input type="text" id="type" class="form-control font-lowercase">
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Deskripsi (tidak wajib)</label>
                        <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="body" class="form-label">Catatan</label>
                        <textarea id="body" name="body" class="form-control summernote"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </x-modal-large>
    <form id="delete_form" action="{{ route('admin.note.destroy') }}" method="post">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" id="id">
    </form>
@endsection
@section('scripts')
    <script>
        // set note on edit
       
        $(document).ready(()=>{
            // submit create note
            $('#submit_modal_create_note').click(()=>{
                $('#create_note_form').submit();
            })

            // submit edit note
            $('#submit_modal_edit_note').click(()=>{
                $('#edit_note_form').submit();
            })

            
        })
    </script>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height:300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
        });

        // set note for edit
         function setNote(data){
            const form = '#edit_note_form'
            $(form+' #id').val(data.id)
            $(form + ' #type').val(data.type)
            $(form+' #description').val(data.description)
            $(form+' #body').summernote('code', data.body)
        }

        // confirm delete note
        function deleteNote(id){
            Swal.fire({
            icon: 'warning',
            title: 'Yakin Hapus?',
            text: 'Data akan dihapus permanen',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#F64E60',
            cancelButtonColor: '#1BC5BD',
            reverseButtons: true
        }).then((e) => {
            if (e.isConfirmed) {
                $('#delete_form #id').val(id)
                $('#delete_form').submit()
            }
        })
        }
    </script>
@endsection