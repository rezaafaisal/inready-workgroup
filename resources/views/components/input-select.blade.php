<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="form-control @error('{{ $name }}') is-invalid @enderror" name="{{ $name }}" id="{{ $name }}">
        <option value="" disabled selected>{{ $option }}</option>
        @foreach($data_select as $row)
            <option value="{{ $row->id }}">{{ $row->name }}</option>
        @endforeach
    </select>
    @error('{{ $name }}')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
