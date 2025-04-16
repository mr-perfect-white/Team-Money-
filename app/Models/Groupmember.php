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
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
    
    public function member()
    {
        return $this->belongsTo(MemberRegister::class, 'member_id');
    }
    
    public function roleRelation(){
        return $this->belongsTo(MemberRole::class,'role');
    }

  
}
