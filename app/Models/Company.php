<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \App\User[] users
 */
class Company extends Model
{

    protected $hidden = ['pivot'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(\App\User::class,'company_users');
    }
}
