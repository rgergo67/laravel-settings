<?php

namespace Rgergo67\LaravelSettings\App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [
        'key',
        'label',
        'description',
        'value',
        'type',
    ];

    public function scopeRetrieve($query, $key)
    {
        return $query->where('key', $key);
    }

}
