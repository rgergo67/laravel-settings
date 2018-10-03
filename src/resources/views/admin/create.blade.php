@extends(View::exists(config('laravel-settings.layout')) ? config('laravel-settings.layout') : 'settings::layout')

@section('template_title', __('settings::settings.title'))

@section('template_linked_css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
@append

@section('footer-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <script src="{{ asset('/js/rgergo67/laravel-settings/settings.js') }}"></script>
@append

@section('content')
    <h1>
        <a href="{{ route('settings-admin.index') }}">@lang('settings::settings.index')</a>
        @lang('settings::settings.add') @lang('settings::settings.title')
    </h1>

    {{ Form::open(['route' => ['settings-admin.store'], 'id' => 'settings-form']) }}

        @include('settings::admin._form')

    {{ Form::close() }}

@endsection
