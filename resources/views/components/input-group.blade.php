<div class="form-group @error('{{ $name }}') has-error @enderror">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $name }}"
        placeholder="{{ $placeholder }}">
</div>

@error('{{ $name }}')
    <div class="invalid-feedback">
        {{ $message ?? '' }}
    </div>
@enderror
