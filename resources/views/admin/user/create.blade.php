@extends('layouts.admin')
@section('body')
    <div class="container">
        <div class="row">
            {{-- fungsi tambah --}}
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.pengguna.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="fullname" class="form-label">Nama Lengkap</label>
                                <input type="text" id="fullname" name="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Masukkan nama lengkap" value="{{ old('fullname') }}">
                                @error('fullname')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control @error('fullname') is-invalid @enderror" placeholder="Masukkan username" value="{{ old('username') }}">
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="major" class="form-label">Jurusan</label>
                                        <select name="major" id="major" class="form-control @error('is-major') is-invalid @enderror">
                                            <option value="" selected disabled>Pilih jurusan</option>
                                            @foreach ($data['major'] as $item)
                                                <option value="{{ $item->id }}" {{ old('major') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('major')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="generation" class="form-label @error('generation') is-invalid @enderror">Angkatan ke-</label>
                                        <select name="generation" id="generation" class="form-control">
                                            <option value="">Angkatan Inready Workgroup</option>
                                            @foreach ($data['generation'] as $item)
                                                <option value="{{ $item->id }}" {{ old('generation') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('generation')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                    </div>
                                </div>
                            </div>
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
                            <div class="form-group">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection