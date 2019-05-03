<?php

namespace App\Models\Configs;

use Illuminate\Database\Eloquent\Model;

class LoanPurpose extends Model
{
    protected $fillable = ['name', 'description', 'slug'];

    public $timestamps = false;

    /** Get applications relation */
    public function applications()
    {
        return $this->hasMany(\App\Models\Applications\Application::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
