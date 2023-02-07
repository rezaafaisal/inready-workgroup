@extends('layouts.admin')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4>Edit Data Pengguna</h4>
                            <a href="{{ route('admin.pengguna.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.pengguna.update', ['pengguna' => $data['user']->id]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h5 class="mb-5">Informasi Akun</h5>
                                    <div class="form-group">
                                        <label for="fullname" class="form-label">Nama Lengkap</label>
                                        <input type="text" id="fullname" name="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Masukkan nama lengkap" value="{{ old('fullname') ?? $data['user']->name }}">
                                        @error('fullname')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" id="username" class="form-control @error('fullname') is-invalid @enderror" placeholder="Masukkan username" value="{{ old('username') ?? $data['user']->username }}">
                                        @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <x-input type="email" name="email" label="Email" placeholder="Masukkan email valid" />
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox-inline mb-3">
                                            <label class="checkbox checkbox-outline checkbox-success">
                                                <input type="checkbox" name="lead" {{ $data['user']->profile->is_lead ? 'checked' : '' }}>
                                                <span></span>
                                                Ketua Umum
                                            </label>
                                        </div>
                                        <small class="text-success">*Cetang jika pengguna adalah ketua umum</small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 class="mb-5">Profil Pengguna</h5>
                                    <div class="form-group">
                                        <x-input type="number" name="whatsapp" label="Nomor Whatsapp" placeholder="Nomor whatsapp valid" />
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="major" class="form-label">Jurusan</label>
                                                <select name="major" id="major" class="form-control @error('is-major') is-invalid @enderror" value="2">
                                                    <option value="" selected disabled>Pilih jurusan</option>
                                                    @foreach ($data['major'] as $item)
                                                        <option value="{{ $item->id }}" {{ ($data['user']->profile->major_id == $item->id) ? 'selected' : '' }} {{ old('major') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('major')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="generation" class="form-label @error('generation') is-invalid @enderror">Angkatan ke-</label>
                                                <select name="generation" id="generation" class="form-control">
                                                    <option value="">Angkatan Inready Workgroup</option>
                                                    @foreach ($data['generation'] as $item)
                                                        <option value="{{ $item->id }}" {{ ($data['user']->profile->generation_id == $item->id) ? 'selected' : '' }} {{ old('generation') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('generation')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <x-textarea name="address" label="Alamat Sekarang" placeholder="Masukkan alamat yang valid" value="{{ 'hahahaha' }}" />
                                    </div>
                                </div>
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