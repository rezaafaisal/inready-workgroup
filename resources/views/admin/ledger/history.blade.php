@extends('layouts.admin')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('body')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Sejarah Inready Workgroup</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.ledger.history.update') }}" id="history_form" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <textarea id="summernote" name="history" class="form-control">
                        {!! $data->body ?? '' !!}
                    </textarea>
                    @error('history')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
      <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height:300
            });
        });
    </script>
@endsection
