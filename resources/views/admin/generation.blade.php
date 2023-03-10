@extends('layouts.admin')
@section('body')
<div class="container">
    <div class="row">
        <div class="col col-12 col-lg-7 mb-5">
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Data Angkatan
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
                                <th>Angkatan</th>
                                {{-- <th>Jumlah Anggota</th> --}}
                                <th>Status</th>
                                <th style="width:150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['generation'] as $i => $item)
                                <tr>
                                    <td>Angkatan {{ $item->name }}</td>
                                    <td>
                                        @if($item->status == 'active')
                                            <span class="label label-inline label-success">Pengurus</span>
                                        @elseif($item->status == 'outgoing')
                                            <span class="label label-inline label-danger">Demisioner</span>
                                        @else
                                            <span class="label label-inline label-primary">Anggota</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status == 'active')
                                            <button onclick="setOutgoing('{{ \Crypt::encryptString($item->name) }}')" class="btn btn-block btn-sm btn-primary">Jadikan Demisioner</button>
                                        @elseif($item->status == 'member')
                                            <button onclick="setActive('{{ \Crypt::encryptString($item->name) }}')"
                                                class="btn btn-sm btn-block btn-info">Jadikan Pengurus</button>
                                        @else
                                            <button class="btn btn-sm btn-block btn-secondary" disabled>Mantan Pengurus</button>
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
        <div class="col col-12 col-lg-5">
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Data Periode
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <button id="createPeriod" class="btn btn-primary font-weight-bolder">Tambah</button>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="period_table">
                        <thead>
                            <tr>
                                <th>Periode</th>
                                <th>Jumlah Pengurus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['period'] as $item)
                                <tr>
                                    <td>{{ $item->period }}</td>
                                    <td>99</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
    </div>

</div>

{{-- hidden form --}}
<form id="create_generation" action="{{ route('admin.generation.create') }}" method="post">
    @csrf
    <input type="hidden" name="latest" value="{{ $data['generation']->first()->name }}">
</form>

{{-- form set active --}}
<form id="set" action="{{ route('admin.generation.set') }}" method="post">
    @csrf
    <input type="hidden" id="set_status" name="status">
    <input type="hidden" id="set_id" name="id">
</form>

<script>
    function setActive(id) {
        Swal.fire({
            icon: 'question',
            title: 'Konfirmasi Jadikan Pengurus?',
            text: 'Perubahan tidak bisa dikembalikan jadi pertimbangkan baik-baik',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((e) => {
            if (e.isConfirmed) {
                $('#set_id').val(id)
                $('#set_status').val('active')
                $('#set').submit()
            }
        })
    }
    function setOutgoing(id) {
        Swal.fire({
            icon: 'question',
            title: 'Konfirmasi Jadikan Demisioner?',
            text: 'Silahkan tekan iya jika telah selesai menjadi pengurus',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((e) => {
            if (e.isConfirmed) {
                $('#set_id').val(id)
                $('#set_status').val('outgoing')
                $('#set').submit()
            }
        })
    }

</script>
@endsection
@section('scripts')
<x-datatable-script />
<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "ordering":false,
        })
        $('#period_table').DataTable({
            "ordering":false
            "searching": false,
        })
    })

</script>

<script>
    $(document).ready(function () {

        $('#createConfirm').click(() => {
            Swal.fire({
                icon: 'warning',
                title: 'Yakin Tambah?',
                text: 'Tekan iya jika sudah terdapat ANGGOTA BARU yang sudah DILANTIK',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((e) => {
                if (e.isConfirmed) {
                    $('#create_generation').submit()
                }
            })
        })

        $('#createPeriod').click(()=>{
            Swal.fire({
                icon: 'warning',
                title: 'Yakin Tambah Periode?',
                text: 'Tekan iya jika sudah melaksanakan MUBES dan terdapat formatur terbaru',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((e) => {
                if (e.isConfirmed) {
                    window.location.href="{{ route('admin.generation.createPeriod') }}"
                }
            })
        })
    })

</script>
@endsection
