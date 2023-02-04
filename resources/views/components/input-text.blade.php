<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="text" name="{{ $name }}" id="{{ $name }}" class="form-control @error('{{ $name }}') is-invalid @enderror">
    @error('{{ $name }}')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
