@extends('layouts.admin')
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4>Tambah Dokumen Juklak Juknis</h4>
                        <a href="{{ route('admin.ledger.juklis.index') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.ledger.juklis.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <x-input type="type" name="filename" label="Nama File" placeholder="Nama File" />
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