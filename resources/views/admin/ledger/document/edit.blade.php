@extends('layouts.admin')
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4>Edit {{ $data['title'] }}</h4>
                        <a href="{{ route($data['route'].'index', ['type' => $data['type']]) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route($data['route'].'update', ['id' => $data['document']->id, 'type' => $data['type']]) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <x-input type="type" name="filename" label="Nama File" placeholder="Nama File" value="{{ $data['document']->name }}" />
                            </div>
                            <div class="form-group">
                                <x-input-file name="file" label="Dokumen Juklak Juknis" />
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