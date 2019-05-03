<?php

namespace App\Models\Configs;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['value'];

    public static function getValue($name, $default = null)
    {
        $value = self::where('name', $name)->value('value');
        if ($value) {
            return $value;
        }
        return $default;
    }
}
