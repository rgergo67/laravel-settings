<div class="form-group">
    {{ Form::label('key', __('settings::settings.key')) }}
    {{ Form::text('key', null, ['class' => 'form-control' . ($errors->has('key') ? ' is-invalid' : ''), 'placeholder' => __('settings::settings.key')]) }}
    @if ($errors->has('key'))
        <span class="invalid-feedback">{{ $errors->first('key') }}</span>
    @endif
</div>

<div class="form-group">
    {{ Form::label('label', __('settings::settings.label')) }}
    {{ Form::text('label', null, ['class' => 'form-control' . ($errors->has('label') ? ' is-invalid' : ''), 'placeholder' => __('settings::settings.label')]) }}
    @if ($errors->has('label'))
        <span class="invalid-feedback">{{ $errors->first('label') }}</span>
    @endif
</div>

<div class="form-group">
    {{ Form::label('description', __('settings::settings.description')) }}
    {{ Form::textarea('description', null, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => __('settings::settings.description')]) }}
    @if ($errors->has('description'))
        <span class="invalid-feedback">{{ $errors->first('description') }}</span>
    @endif
</div>

<div class="form-group">
    {{ Form::label('type', __('settings::settings.type.title')) }}
    {{ Form::select('type', ['text' => __('settings::settings.type.text'), 'textarea' => __('settings::settings.type.textarea'), 'checkbox' => __('settings::settings.type.checkbox')], null, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : '')]) }}
    @if ($errors->has('type'))
        <span class="invalid-feedback">{{ $errors->first('type') }}</span>
    @endif
</div>

<div class="form-group value-input text">
    {{ Form::label('value', __('settings::settings.value')) }}
    {{ Form::text('value', null, ['class' => 'form-control' . ($errors->has('value') ? ' is-invalid' : ''), 'placeholder' => __('settings::settings.value')]) }}
    @if ($errors->has('value'))
        <span class="invalid-feedback">{{ $errors->first('value') }}</span>
    @endif
</div>

<div class="form-group value-input textarea">
    {{ Form::label('value', __('settings::settings.value')) }}
    {{ Form::textarea('value', null, ['class' => 'form-control' . ($errors->has('value') ? ' is-invalid' : ''), 'placeholder' => __('settings::settings.value')]) }}
    @if ($errors->has('value'))
        <span class="invalid-feedback">{{ $errors->first('value') }}</span>
    @endif
</div>

<div class="form-group value-input checkbox">
    {{ Form::hidden('value', 0) }}
    {{ Form::checkbox('value', $setting->value ?? 0, null, ['placeholder' => __('settings::settings.value')]) }}
    {{ Form::label('value', __('settings::settings.value')) }}
    @if ($errors->has('value'))
        <span class="invalid-feedback">{{ $errors->first('value') }}</span>
    @endif
</div>

<button type="submit" class="btn btn-success btn-block btn-lg">@lang('settings::settings.submit')</button>
