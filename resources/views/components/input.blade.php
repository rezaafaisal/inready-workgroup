<div>
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" placeholder="{{ $placeholder }}" value="{{ $value }}">
    @error($name)
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
