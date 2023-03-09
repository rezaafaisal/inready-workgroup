@extends('layouts.admin')
@section('body')
<div class="container">
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Data Periode</h3>
                <select name="" id="periods" class="form-control" style="width:130px">
                    @foreach ($data['period'] as $item)
                        <option value="{{ $item->id }}">{{ $item->period }}</option>
                    @endforeach
                </select>
            </div>
            <div class="card-toolbar">
                <button id="createPeriod" class="btn btn-primary font-weight-bolder">Tambah</button>
            </div>
        </div>
        <div class="card-body">
            halo
        </div>
    </div>
</div>
@endsection
