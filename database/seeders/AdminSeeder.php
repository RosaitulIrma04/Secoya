<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Sisil',
            'email' => 'sisil@admin.com',
            'password' => Hash::make('sisil2505'),
        ]);
    }
    
}

