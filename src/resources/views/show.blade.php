@extends(View::exists(config('laravel-settings.layout')) ? config('laravel-settings.layout') : 'settings::layout')

@section('template_title', __('settings::settings.title'))

@section('content')
    <h1>
        <a href="{{ route('settings.index') }}">@lang('settings::settings.index')</a>
        {{ $setting->label ?? $setting->key }}
    </h1>

    <div class="alert alert-info">{!! $setting->description !!}</div>

    @if($setting->type == 'checkbox')
        <p>{{ $setting->value ? __('settings::settings.true') : __('settings::settings.false') }}</p>
    @elseif($setting->type == 'textarea')
        <p>{!! $setting->value !!}</p>
    @else
        <p>{{ $setting->value }}</p>
    @endif

@endsection
