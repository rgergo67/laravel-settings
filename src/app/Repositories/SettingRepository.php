<?php

namespace Rgergo67\LaravelSettings\App\Repositories;

use App\Repositories\Repository;
use Rgergo67\LaravelSettings\App\Models\Setting;

class SettingRepository
{
    protected $setting;

    public function __construct()
    {
        $this->setting = new Setting();
    }

    public function all()
    {
        return $this->setting->all();
    }

    public function find($key)
    {
        return $this->setting->retrieve($key)->first();
    }

    public function get($key){
        $setting = $this->setting->retrieve($key)->first();
        if(empty($setting)){
            return null;
        }

        return $setting->value;
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
        return call_user_func_array([$this->setting, $method], $args);
    }

}