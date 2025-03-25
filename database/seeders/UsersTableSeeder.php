<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Ensure you have imported the User model

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Define 10 dummy users
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 1, // Assuming '1' is an admin role
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 2, // Assuming '2' is a user role
            ],
            [
                'name' => 'Michael Johnson',
                'email' => 'michaeljohnson@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emilydavis@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
            ],
            [
                'name' => 'William Brown',
                'email' => 'williambrown@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
            ],
            [
                'name' => 'Olivia Taylor',
                'email' => 'oliviataylor@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 1,
            ],
            [
                'name' => 'Sophia Wilson',
                'email' => 'sophiawilson@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
            ],
            [
                'name' => 'James Anderson',
                'email' => 'jamesanderson@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
            ],
            [
                'name' => 'Mia Thomas',
                'email' => 'miathomas@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
            ],
            [
                'name' => 'Benjamin Moore',
                'email' => 'benjaminmoore@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
            ],
        ];

        // Insert the users into the database
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
