<div class="form-group row">
    <label class="col-sm-4">
        {{ $label }}
        @isset($required)
        <span class="ml-2 badge badge-danger">{{ __('common.required') }}</span>
        @endisset
    </label>
    <div class="col-sm-8">
        <select name="{{ $name }}"
        @foreach($attr as $key=>$val)
        {{ $key }}="{{ $val }}"
        @endforeach
        @if($required) required @endif
        @if($disabled) disabled @endif
        @if($readonly) readonly @endif
        >
            @if($slot!='') <option>{{ $slot }}</option> @endif
            @foreach($option as $key=>$opt)
                <option value="{{ $key }}" @if($key==$value) selected @endif">{{ $opt }}</option>
            @endforeach
        </select>
    </div>
</div>
