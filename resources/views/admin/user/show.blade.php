@extends('layouts.admin')
@section('body')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Detail Pengguna</h4>
                        <a href="{{ route('admin.pengguna.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center overflow-hidden">
                                <img src="{{ asset('images/ui/eren.jpeg') }}" alt="" height="150px" width="150px" style="object-fit: cover;object-position:center" class="rounded">
                            </div>
                            <h5 class="mt-5 text-center">Eren Jeager</h5>
                        </div>
                        <div class="col-12">
                            <table class="table table-hover mt-5 table-borderless">
                                <tr>
                                    <th>Username</th>
                                    <td>{{ $data->username }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $data->gender?->name }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat Tanggal Lahir</th>
                                    <td>{{ $data->profile->birth_place.', '.$data->profile->birth_date }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Whatsapp</th>
                                    <td>{{ $data->profile->whatsapp }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $data->email }}</td>
                                </tr>
                                <tr>
                                    <th>Jurusan</th>
                                    <td>{{ $data->profile->major?->name }}</td>
                                </tr>
                                <tr>
                                    <th>Angkatan Inready</th>
                                    <td>{{ $data->profile->generation?->name }}</td>
                                </tr>
                                <tr>
                                    <th>Pekerjaan</th>
                                    <td>{{ $data->profile->job }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $data->profile->address }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection