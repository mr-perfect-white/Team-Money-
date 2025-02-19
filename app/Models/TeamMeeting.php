<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class TeamMeeting extends Model
{
    use HasFactory;

    protected $fillable  = ['tm_mtng_nm','tm_mtng_purpose','tm_mtng_details','tm_mtng_date','tm_mtng_time','tm_mtng_mode'];
}
