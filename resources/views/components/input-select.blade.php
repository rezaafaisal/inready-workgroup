<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror">
        {{ $slot }}
    </select>
    @error($name)
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
