@extends('layouts.admin')
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    @php
                        $id = $data['id']
                    @endphp
                    <div class="card-header d-flex justify-content-between">
                        <h4>Reset Password Pengguna</h4>
                        <a href="{{ route('admin.pengguna.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="card-body">
                        <span class="d-block mb-5">Reset kata sandi untuk pengguna <span class="font-weight-bold">{{ $data['name'] }}</span></span>
                        <form action="{{ route('admin.pengguna.reseted', ['id' => $id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <x-input type="text" name="password" label="Kata Sandi Baru" value="{{ old('password') }}" />
                            </div>
                            <div class="form-group">
                                <x-input type="text" name="password_confirmation" label="Konfirmasi Kata Sandi"></x-input>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-warning">Reset Kata Sandi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection