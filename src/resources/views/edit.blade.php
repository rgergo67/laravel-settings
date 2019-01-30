@extends(View::exists(config('laravel-settings.layout')) ? config('laravel-settings.layout') : 'settings::layout')

@section('template_title', __('settings::settings.title'))

@section('template_linked_css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
@append

@section('footer-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <script src="{{ asset('/vendor/rgergo67/laravel-settings/settings.js') }}"></script>
@append

@section('content')
    <h1>
        <a href="{{ route('settings.index') }}">@lang('settings::settings.index')</a>
        @lang('settings::settings.edit') {{ $setting->label ?? $setting->key }}
    </h1>

    {{ Form::model($setting, ['route' => ['settings.update', $setting], 'method' => 'PUT', 'id' => 'settings-form']) }}

        @include('settings::_form')

    {{ Form::close() }}

@endsection
