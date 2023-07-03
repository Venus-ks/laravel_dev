<div class="form-group row">
    <label class="col-sm-3 col-form-label">
        <strong>{{ $label }}</strong>
        @isset($required)
        <span class="ml-2 badge badge-danger">{{ __('common.required') }}</span>
        @endisset
    </label>
    <div class="col-sm-12">
        <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" class="form-control"
            placeholder="{{ $placeholder }}" @isset($required) required @endisset @isset($disabled) disabled @endisset>
        <small class="form-text text-muted">{{ $example }}</small>
    </div>
</div>
