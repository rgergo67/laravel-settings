<?php

namespace Rgergo67\Laravel\Settings\App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Rgergo67\Laravel\Settings\App\Models\Setting;
use Rgergo67\Laravel\Settings\App\Repositories\SettingRepository;

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