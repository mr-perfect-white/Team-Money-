<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teamattendance extends Model
{
  protected  $fillable = ['meeting_id','member_id'];

  public function meeting(){
    return $this->belongsTo(TeamMeeting::class, 'meeting_id');
  }

  public function meetingmember(){
    return $this->belongsTo(MemberRegister::class, 'member_id');
  }
}
