<div class="form-group d-none">
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
    {{ Form::checkbox('value', 1, null, ['placeholder' => __('settings::settings.value')]) }}
    {{ Form::label('value', __('settings::settings.value')) }}
    @if ($errors->has('value'))
        <span class="invalid-feedback">{{ $errors->first('value') }}</span>
    @endif
</div>

<button type="submit" class="btn btn-success btn-block btn-lg">@lang('settings::settings.submit')</button>
