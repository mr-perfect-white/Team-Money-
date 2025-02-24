<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MemberRole extends Model
{
    // protected $fillable = [
    //     'role',
    // ];
    protected $table = 'member_roles';

    protected $fillable = ['name', 'status']; // Ensure these are here

    public function grouprole(): HasMany
{
    return $this->hasMany(Groupmember::class);
}
}
