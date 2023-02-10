<div>
    <label>{{ $label }}</label>
    <div></div>
    <div class="custom-file">
        <input type="file" name="{{ $name }}" class="custom-file-input @error($name) is-invalid @enderror" id="{{ $name }}" placeholder="{{ $placeholder }}" />
        <label class="custom-file-label" for="{{ $name }}">Pilih File</label>
    </div>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
