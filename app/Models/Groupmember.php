<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Groupmember extends Model
{
    protected $fillable = [
        'member_id',
        'group_id',
        'role',
    ];
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
    // public function member(): BelongsTo
    // {
    //     return $this->belongsTo(MemberRegister::class);
    // }
    public function role(): BelongsTo
    {
        return $this->belongsTo(MemberRole::class);
    }

    protected $table = 'groupmembers';

    public function member()
    {
        return $this->belongsTo(MemberRegister::class, 'member_id');
    }
}
