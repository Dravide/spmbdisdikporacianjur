<div {{ $attributes->merge(['class' => 'form-group mt-2']) }}>

    <label for="{{ $id }}">{{ $label }}</label>

    <input
        type="{{ $type }}"
        class="form-control @error($name) is-invalid @enderror"
        name="{{ $name }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"

        @if( $value !== null && $value !== "" )
            value="{{ $value }}"
        @else
            value="{{ old($name) }}"
        @endif

        {{ $isRequired ? 'required' : '' }}
        {{ $readonly ? 'readonly' : '' }}>

    @if($hintText)
        <small class="form-text text-muted">{{ $hintText }}</small>
    @endif

    {{-- Dengan Bantuan Error Bag dari Laravel --}}
    @error($name)
    <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror

</div>
