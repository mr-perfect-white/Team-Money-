<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupMeeting extends Model
{
    protected $fillable =[
        'group_id',
        'gp_mtng_nm',
        'gp_mtng_purpose',
        'gp_mtng_details',
        'gp_mtng_date',
        'gp_mtng_time',
        'gp_mtng_mode',
    ];
}
