@extends('layouts.admin')
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4>Tambah {{ $data['title'] }}</h4>
                        <a href="{{ route($data['route'].'index', ['type' => $data['type']]) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route($data['route'].'store', ['type' => $data['type']]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Periode Angkatan</label>
                                        <select name="period" id="period" class="form-control @error('period') is-invalid @enderror">
                                            <x-slot:name>Period</x-slot:name>
                                            <option selected disabled>Pilih Periode</option>
                                            @foreach ($data['period'] as $row)
                                                <option value="{{ $row->id }}">{{ $row->period }}</option>
                                            @endforeach
                                        </select>
                                        @error('period')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <x-input-file name="file" label="Dokumen Juklak Juknis" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection