@extends(View::exists(config('laravel-settings.layout')) ? config('laravel-settings.layout') : 'settings::layout')

@section('template_title', __('settings::settings.title'))

@section('content')
    <h1>@lang('settings::settings.title')</h1>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>@lang('settings::settings.name')</th>
                <th>@lang('settings::settings.actions')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($settings as $setting)
            <tr>
                <td>{{ $setting->label ?? $setting->key }}</td>
                <td class="text-nowrap">
                    <a class="btn btn-sm btn-info" href="{{ route('settings.show', $setting) }}">@lang('settings::settings.show')</a>

                    <a class="btn btn-sm btn-warning" href="{{ route('settings.edit', $setting) }}">@lang('settings::settings.edit')</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
