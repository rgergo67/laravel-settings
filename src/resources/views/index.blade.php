@extends(View::exists(config('laravel-settings.layout')) ? config('laravel-settings.layout') : 'settings::layout')

@section('template_title', __('settings::settings.title'))

@section('content')
    <h1>@lang('settings::settings.title')
        <a href="{{ route('settings.create') }}" class="btn btn-success btn-sm align-self-center ml-1">
            @lang('settings::settings.add')
        </a>
    </h1>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>@lang('settings::settings.name')</th>
                <th>@lang('settings::settings.type.title')</th>
                <th>@lang('settings::settings.actions')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($settings as $setting)
            <tr>
                <td>{{ $setting->label ?? $setting->key }}</td>
                <td>{{ $setting->type }}</td>
                <td class="text-nowrap">
                    <a class="btn btn-sm btn-info" href="{{ route('settings.show', $setting) }}">@lang('settings::settings.show')</a>

                    <a class="btn btn-sm btn-warning" href="{{ route('settings.edit', $setting) }}">@lang('settings::settings.edit')</a>

                    {{ Form::model($setting, ['method' => 'DELETE', 'route' => ['settings.destroy', $setting], 'class' => 'd-inline delete', 'data-confirm' => __('settings.settings::delete_confirmation')]) }}
                        <button class="btn btn-sm btn-danger" type="submit">@lang('settings::settings.delete')</button>
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
