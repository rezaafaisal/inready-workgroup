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
                <button id="createConfirm" class="btn btn-primary font-weight-bolder">Tambah Angkatan</button>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Angkatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $i => $item)
                        <tr>
                            <td>{{ $i+1}}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ($item->active == true)
                                    <span class="label label-inline label-success">Pengurus Aktif</span>
                                @else
                                    <span class="label label-inline label-danger">Bukan Pengurus</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->active == true)
                                    <button class="btn btn-sm btn-warning">Selesaikan</button>
                                @else
                                    <button class="btn btn-sm btn-primary">Aktifkan</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <x-datatable-script />
    <script>
        $(document).ready(function () {
            $('#table').DataTable()
        })
    </script>

    <script>
        $(document).ready(function(){
            $('#createConfirm').click(()=>{
                Swal.fire({
                    icon:'question',
                    title:'Yakin Tambah?',
                    text:'Tekan iya jika sudah terdapat anggota baru yang sudah dilantik',
                    showCancelButton:true,
                }).then((e)=>{
                    if(e.isConfirm){
                        
                    }
                })
            })
        })
    </script>
@endsection
