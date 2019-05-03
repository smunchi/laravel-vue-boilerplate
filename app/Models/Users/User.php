<?php

namespace App\Models\Users;

use App\Models\Contact;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Address;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles;

    protected $fillable = ['email', 'name', 'password', 'is_active'];

    protected $hidden = ['password'];

    //-------------------------------Relationships-----------------------------
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

    public function lender()
    {
        return $this->hasOne(Lender::class);
    }

    public function buckets()
    {
        return $this->hasMany(\App\Models\Buckets\Bucket::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function incomeExpense()
    {
        return $this->hasMany(IncomeExpense::class);
    }

    public function banks()
    {
        return $this->hasMany(Bank::class);
    }

    public function employments()
    {
        return $this->hasMany(Employment::class);
    }

    public function commsPreference()
    {
        return $this->hasOne(CommsPreference::class);
    }

    //--------------------------Accessors------------------------------------
    public function getPrimaryContactAttribute()
    {
        return $this->contacts()->where('type', 'primary')->latest()->first();
    }

    public function getCurrentAddressAttribute()
    {
        return $this->addresses->where('type', 'current')->first();
    }

    public function getPreviousAddressAttribute()
    {
        return $this->addresses->where('type', 'previous')->first();
    }
}
