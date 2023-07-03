<div class="form-group row d-block">
    <label class="col-sm-12 col-form-label">
        <strong>{{ $label }}</strong>
        @isset($required) <span class="ml-2 badge badge-danger">{{ __('common.required') }}</span> @endisset
    </label>
    <div class="col-sm-12">
        <div id="{{ $id }}">
            {{ $slot }}
        </div>
        <small class="form-text text-muted">{!! $example !!}</small>
    </div>
    <input type="hidden" name="{{ $name }}">
</div>
