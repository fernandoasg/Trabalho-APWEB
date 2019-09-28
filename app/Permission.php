<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($permission_id)
 */
class Permission extends Model
{

    public function user()
    {
        return $this->hasMany(User::class);
    }

}
