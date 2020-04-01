<?php

namespace Rgergo67\Laravel\Settings\App\Repositories;

use App\Repositories\Repository;
use Rgergo67\Laravel\Settings\App\Models\Setting;

class SettingRepository
{
    protected $model;
    protected $allSettings;
    protected $settings;

    public function __construct()
    {
        $this->model = new Setting();
        $this->allSettings = $this->model->all();

        foreach($this->allSettings as $setting){
            $this->settings[$setting->key] = $setting->value;
        }
    }

    public function all()
    {
        return $this->allSettings;
    }

    public function find($key)
    {
        return $this->model->retrieve($key)->first();
    }

    public function get($key){
        return $this->settings[$key] ?? null;
    }

    public function set($key, $value)
    {
        $setting = $this->find($key);

        if(!empty($setting)){
            $setting->update(['value' => $value]);
        }else{
            Setting::create([
                'key' => $key,
                'value' => $value,
                'label' => $key,
            ]);
        }
    }

    public function delete($key)
    {
        $setting = $this->find($key);

        if(!empty($setting)){
            $setting->delete();
        }
    }

    /**
     * Call models function directly
     *
     * @param <type> $method The method
     * @param <type> $args The arguments
     *
     * @return <type> ( description_of_the_return_value )
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->model, $method], $args);
    }

}