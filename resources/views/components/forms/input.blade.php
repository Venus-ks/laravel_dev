<div class="form-group row">
    <label class="col-sm-4 col-form-label">
        <strong>{{ $label }}</strong>
        @isset($required)
        <span class="ml-2 badge badge-danger">{{ __('common.required') }}</span>
        @endisset
    </label>
    <div class="col-sm-8">
        <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" class="form-control" placeholder="{{ $placeholder }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
        @if($readonly) readonly @endif
        >
        <small class="form-text text-muted">{{ $example }}</small>
    </div>
</div>
