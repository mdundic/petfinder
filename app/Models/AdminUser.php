<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class AdminUser extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Hash the password
     *
     * @param  string  $value
     *
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Overrides the method to ignore the remember token.
     */
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();

        if (!$isRememberTokenAttribute) {
            parent::setAttribute($key, $value);
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function resolveId()
    {
        return Auth::check() ? Auth::user()->getAuthIdentifier() : null;
    }
}
