<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_listings')->insert([
            [
                'title' => 'Sr. Full Stack Developer',
                'company_name' => 'DWebPixel Technologies Pvt. Ltd.',
                'location' => 'Remote',
                'experience' => '4-5 Yrs',
                'salary_range' => '4.5-8 Lacs PA',
                'tags' => json_encode(['Remote', 'Full-Time']),
                'description' => 'You will be responsible for designing, developing, and maintaining robust and scalable web applications from end to end.',
                'technologies' => json_encode(['Laravel', 'Inertia', 'Vue', 'Livewire', 'Alpine', 'TailwindCSS']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Sr. Frontend Developer',
                'company_name' => 'Devsbuddy Technologies Pvt. Ltd.',
                'location' => 'Remote',
                'experience' => '3-4 Yrs',
                'salary_range' => '2.5-4 Lacs PA',
                'tags' => json_encode(['Remote', 'Full-Time', 'Flexible Timing']),
                'description' => 'You will leverage your expertise in modern frontend technologies and best practices to create exceptional user experiences.',
                'technologies' => json_encode(['Laravel', 'Vue', 'Alpine', 'TailwindCSS']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}