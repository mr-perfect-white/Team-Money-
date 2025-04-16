<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MemberRegister extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'firstname', 
        'lastname', 
        'phone', 
        'email', 
        'permanent_addr', 
        'temporary_addr', 
        'document_one',
        'pan_num',
        'pan_doc',
        'adhr_num',
        'adhr_doc',
        'accnt_num',
        'accnt_ifsc_num',
        'accnt_brnch_dtl',
        'monthly_inc',
        'sadh_mem',
        'sadh_mem_id',
        'password',
    ];

    public function getFullNameAttribute()
{
    return $this->firstname . ' ' . $this->lastname;
}

    public function getIsActiveAttribute()
    {
        return $this->status == 1 ? 'New' : 'Added';
    }

    public function registermembers()
    {
        return $this->belongsTo(Groupmember::class,'groupmembers', 'group_id', 'member_id');
      //  return $this->belongsTo(Groupmember::class);
    }

    // MemberRegister Model
public function groupmembers()
{
    return $this->hasMany(Groupmember::class, 'member_id');
}


   

}
