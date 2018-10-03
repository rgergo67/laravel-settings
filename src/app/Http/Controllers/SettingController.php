<?php

namespace Rgergo67\LaravelSettings\App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Rgergo67\LaravelSettings\App\Models\Setting;
use Rgergo67\LaravelSettings\App\Repositories\SettingRepository;

class SettingController extends Controller
{

    private $setting;

    /**
     * Create a new EmailRuleController instance.
     *
     * @param  \App\Repositories\SettingRepository $setting
     */
    public function __construct(SettingRepository $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->all();

        return view('settings::index', [
            'settings' => $settings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->setting->create($request->all());

        return redirect()->route('settings.index')
                        ->with('success', __('form.saved'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('settings::show', [
            'setting' => $this->setting->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = $this->setting->findOrFail($id);
        return view('settings::edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $setting->update($request->all());

        return redirect()->route('settings.index')
                        ->with('success', __('form.saved'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = $this->setting->findOrFail($id);
        $setting->delete();

        return redirect()->route('settings.index')->withSuccess(__('form.deleted'));
    }

}