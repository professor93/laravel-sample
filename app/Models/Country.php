<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Company[] companies
 * @method \Illuminate\Database\Eloquent\Builder whereName(string $name)
 */
class Country extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function companies()
    {
        return $this->hasMany('App\Models\Company');
    }
}
