<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        //ایجاد کاربر مدیر
        User::create([
            'name' => 'Admin',
            'email' => 'admin@tasksflow.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        //ایجاد کاربر رهبر تیم
        User::create([
            'name' => 'Team Leader',
            'email' => 'teamleader@tasksflow.com',
            'password' => Hash::make('password'),
            'role' => 'team_leader',
            'email_verified_at' => now(),
        ]);

        //ایجاد 10 کاربر کارمند
        $workers=[
            ['name' => 'Worker1','email' => 'worker1@tasksflow.com'],
            ['name' => 'Worker2','email' => 'worker2@tasksflow.com'],
            ['name' => 'Worker3','email' => 'worker3@tasksflow.com'],
            ['name' => 'Worker4','email' => 'worker4@tasksflow.com'],
            ['name' => 'Worker5','email' => 'worker5@tasksflow.com'],
            ['name' => 'Worker6','email' => 'worker6@tasksflow.com'],
            ['name' => 'Worker7','email' => 'worker7@tasksflow.com'],
            ['name' => 'Worker8','email' => 'worker8@tasksflow.com'],
            ['name' => 'Worker9','email' => 'worker9@tasksflow.com'],
            ['name' => 'Worker10','email' => 'worker10@tasksflow.com'],
        ];

        foreach ($workers as $worker) {
            User::create([
                'name' => $worker['name'],
                'email' => $worker['email'],
                'password' => Hash::make('password'),
                'role' => 'worker',
                'email_verified_at' => now(),
            ]);
        }
    }
}
