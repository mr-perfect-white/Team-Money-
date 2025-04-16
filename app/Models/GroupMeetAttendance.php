<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupMeetAttendance extends Model
{
    protected $fillabele = ['group_id','meeting_id','member_id'];
}
