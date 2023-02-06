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
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>Export</button>
                    <!--begin::Dropdown Menu-->
                    <!--end::Dropdown Menu-->
                </div>
                <!--end::Dropdown-->
                <!--begin::Button-->
                <a href="{{ route('admin.pengguna.create') }}" class="btn btn-primary font-weight-bolder">Tambah
                    Data</a>
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

{{-- modal --}}

{{-- create modal --}}
{{-- <x-modal target="create" title="Tambah Pengelola">
    <form id="add_form" action="{{ route('admin.pengguna.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="fullname">Nama Lengkap</label>
                    <input type="text" name="fullname" id="fullname"
                        class="form-control @error('fullname') is-invalid @enderror"
                        value="{{ old('fullname') }}">
                    @error('fullname')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username"
                        class="form-control @error('username') is-invalid @enderror"
                        value="{{ old('username') }}" />
                    @error('username')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="generation" class="form-label">Angkatan Ke-</label>
                    <select name="generation" id="" class="form-control @error('generation') is-invalid @enderror">
                        <option value="">Angkatan Inready Workgroup</option>
                        @foreach($data['generation'] as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('generation')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="password">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password_confirmation')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="checkbox-inline mb-3">
                        <label class="checkbox checkbox-outline checkbox-success">
                            <input type="checkbox" name="lead">
                            <span></span>
                            Ketua Umum
                        </label>
                    </div>
                    <small class="text-success">*Cetang jika pengguna adalah ketua umum</small>
                </div>
            </div>
        </div>
    </form>
</x-modal> --}}

{{-- update modal --}}
{{-- <x-modal target="update" title="Tambah Pengelola">
    <form id="update_form" action="{{ route('admin.pengguna.update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="fullname">Nama Lengkap</label>
                    <input type="text" name="fullname" id="fullname"
                        class="form-control @error('fullname') is-invalid @enderror"
                        value="{{ old('fullname') }}">
                    @error('fullname')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username"
                        class="form-control @error('username') is-invalid @enderror"
                        value="{{ old('username') }}" />
                    @error('username')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="generation" class="form-label">Angkatan Ke-</label>
                    <select name="generation" id="" class="form-control @error('generation') is-invalid @enderror">
                        <option value="">Angkatan Inready Workgroup</option>
                        @foreach($data['generation'] as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('generation')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="password">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password_confirmation')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="checkbox-inline mb-3">
                        <label class="checkbox checkbox-outline checkbox-success">
                            <input type="checkbox" name="lead">
                            <span></span>
                            Ketua Umum
                        </label>
                    </div>
                    <small class="text-success">*Cetang jika pengguna adalah ketua umum</small>
                </div>
            </div>
        </div>
    </form>
</x-modal> --}}



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
@endsection
