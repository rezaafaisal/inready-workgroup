<div>
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <textarea name="{{ $name }}" class="form-control" id="{{ $name }}" rows="5" placeholder="{{ $placeholder }}">{{ $value }}</textarea>
    @error('{{ $name }}')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
