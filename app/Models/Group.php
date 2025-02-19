<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Group extends Model
{
    protected $fillable = [
        'name',
        'logo',
    ];

    public function groupmembers(): HasMany
    {
        return $this->hasMany(Groupmember::class);
    }
}
