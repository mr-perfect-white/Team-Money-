<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TeamMeeting;

class TeamMeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamMeeting::create([
            'tm_mtng_nm' => 'Sample Meeting',
            'tm_mtng_purpose' => 'Test Purpose',
            'tm_mtng_details' => 'Some details about the meeting.',
            'tm_mtng_date' => '2025-02-11',
            'tm_mtng_time' => '10:00 AM',
            'tm_mtng_mode' => 'Online',
            'status' => 0,  // Default value
        ]);
    }
}
