<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupMeetAttendance extends Model
{
    protected $fillable = ['group_id','meeting_id','member_id'];
}
